<?php

class Twitter_data extends CI_Controller {
	var $consumer_key = 'D834CXI1EcqcmpmX7AWhXILrT';
	var $consumer_secret = 'sfJA4uSG0CiG7Qw9QhSJnbB0UwRVUEPEiheWyXVIRSSjKAgl9r';
	
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('user'))
		{
			redirect('Home/login');
		}
	}
	

	function tw_likes()
	{
		$data['tw_post']=$this->Twitter_model->get_pages();
		$data['social_tw']=$this->Twitter_model->get_tw_data();
		$this->load->view('tw_likes',$data);
		//echo "return twitter";
	}
	function tw_login(){
		$userData = array();
		//Include the twitter oauth php libraries
		include_once APPPATH."/libraries/twitter-oauth/twitteroauth.php";
		//Twitter API Configuration
		
		$consumerKey = $this->consumer_key;
		$consumerSecret = $this->consumer_secret;
		$oauthCallback = site_url().'/twitter_data/tw_callback';
		
		//Get existing token and token secret from session
		$sessToken = $this->session->userdata('token');
		$sessTokenSecret = $this->session->userdata('token_secret');
		
		//Get status and user info from session
		$sessStatus = $this->session->userdata('status');
		$sessUserData = $this->session->userdata('userData');
		
		//unset token and token secret from session
		$this->session->unset_userdata('token');
		$this->session->unset_userdata('token_secret');
		
		//Fresh authentication
		$connection = new TwitterOAuth($consumerKey, $consumerSecret);
		$requestToken = $connection->getRequestToken($oauthCallback);
		
		//Received token info from twitter
		$this->session->set_userdata('token',$requestToken['oauth_token']);
		$this->session->set_userdata('token_secret',$requestToken['oauth_token_secret']);
		
		//Any value other than 200 is failure, so continue only if http code is 200
		if($connection->http_code == '200'){
			//redirect user to twitter
			$twitterUrl = $connection->getAuthorizeURL($requestToken['oauth_token']);
			redirect($twitterUrl);
		}else{
			$data['oauthURL'] = site_url().'twitter_data/tw_login';
			echo 'Error connecting to twitter! try again later! or click on '.$data['oauthURL'];
		}
	}
	
	public function tw_callback(){
		$userData = array();
		//Include the twitter oauth php libraries
		include_once APPPATH."/libraries/twitter-oauth/twitteroauth.php";
		//Twitter API Configuration
		$consumerKey = $this->consumer_key;
		$consumerSecret = $this->consumer_secret;
		$oauthCallback = site_url().'/twitter_data/tw_likes';
		
		//Get existing token and token secret from session
		$sessToken = $this->session->userdata('token');
		$sessTokenSecret = $this->session->userdata('token_secret');
		
		//Get status and user info from session
		$sessStatus = $this->session->userdata('status');
		$sessUserData = $this->session->userdata('userData');
		
		if(isset($sessStatus) && $sessStatus == 'verified'){
			//Connect and get latest tweets
			$connection = new TwitterOAuth($consumerKey, $consumerSecret, $sessUserData['accessToken']['oauth_token'], $sessUserData['accessToken']['oauth_token_secret']); 
			$data['tweets'] = $connection->get('statuses/user_timeline', array('screen_name' => $sessUserData['username'], 'count' => 5));

			//User info from session
			$userData = $sessUserData;
		}elseif(isset($_REQUEST['oauth_token']) && $sessToken == $_REQUEST['oauth_token']){
			//Successful response returns oauth_token, oauth_token_secret, user_id, and screen_name
			$connection = new TwitterOAuth($consumerKey, $consumerSecret, $sessToken, $sessTokenSecret); //print_r($connection);die;
			$accessToken = $connection->getAccessToken($_REQUEST['oauth_verifier']);
			if($connection->http_code == '200'){
				//Get user profile info
				$userInfo = $connection->get('account/verify_credentials');
				echo '<pre>';//print_r($userInfo); print_r(json_encode($accessToken));  
				//Preparing data for database insertion
				$name = explode(" ",$userInfo->name);
				$first_name = isset($name[0])?$name[0]:'';
				$last_name = isset($name[1])?$name[1]:'';
				$userData = array(
					'oauth_provider' => 'twitter',
					'oauth_uid' => $userInfo->id,
					'username' => $userInfo->screen_name,
					'first_name' => $first_name,
					'last_name' => $last_name,
					'locale' => $userInfo->lang,
					'profile_url' => 'https://twitter.com/'.$userInfo->screen_name,
					'picture_url' => $userInfo->profile_image_url
				);
				
		//		print_r($userData); die; 
				$u=$this->session->userdata('user');
				
				$count=0;
				$count=$this->Twitter_model->get_social_data();
				$this->session->set_userdata('tw_id',$userInfo->id);
				if($count>0)
				{
					//update
					$arr=array('social_id'=>$userInfo->id_str,'name'=>$userInfo->name,'email'=>$userInfo->screen_name,'picture'=>$userInfo->profile_image_url,'token'=>json_encode($accessToken),'social_type'=>'twitter');
					$this->Twitter_model->tw_update($arr);					
					$this->session->set_userdata('tw_user','loggedin');	
				}else {
					//insert
					$arr=array('user_id'=>$u,'social_id'=>$userInfo->id_str,'name'=>$userInfo->name,'email'=>$userInfo->screen_name,'picture'=>$userInfo->profile_image_url,'token'=>json_encode($accessToken),'social_type'=>'twitter');
				$this->Twitter_model->tw_insert($arr);
				$this->session->set_userdata('tw_user','loggedin');
				}
				
				
				//Store status and user profile info into session
				$userData['accessToken'] = $accessToken;
				$this->session->set_userdata('status','verified');
				$this->session->set_userdata('userData',$userData);
				
				//Get latest tweets
				//$data['tweets'] = $connection->get('statuses/user_timeline', array('screen_name' => $userInfo->screen_name, 'count' => 5));
			}else{
				$data['error_msg'] = 'Some problem occurred, please try again later!';
			}
		}else{
			echo 'something went wrong.please try again later.';
		}
		redirect('Twitter_data/tw_likes');
    }
	
	public function tw_logout() {
		$this->session->unset_userdata('token');
		$this->session->unset_userdata('token_secret');
		$this->session->unset_userdata('status');
		$this->session->unset_userdata('userData');
        $this->session->unset_userdata('tw_user');
		$this->session->unset_userdata('tw_id');
		redirect('Twitter_data/tw_likes');
    }
	
	
	function get_ajax_callback(){
		
		$tw_id=$this->input->post('tw_id');
		include_once APPPATH."/libraries/twitter-oauth/twitteroauth.php";
		//Twitter API Configuration
		$consumerKey = $this->consumer_key;
		$consumerSecret = $this->consumer_secret;
		$user_info=$this->Twitter_model->get_tw_data();
		$token = $user_info['token'];
		$token_arr = json_decode($token,true);
		$oauth_token = $token_arr['oauth_token'];
		$oauth_token_secret = $token_arr['oauth_token_secret'];
		$connection = new TwitterOAuth($consumerKey, $consumerSecret, $oauth_token, $oauth_token_secret);
		$tweetInfo = $connection->get('statuses/show.json?id='.$tw_id);
		//echo '<pre>';print_r($tweetInfo);die;
		echo $tweetInfo->favorited; 
		//$url = $this->input->post('url');
		//$type = $this->input->post('page_type');
		
	}
	
	
	function get_ajax_callback_follows(){
		$tw_id=$this->input->post('tw_id');
		include_once APPPATH."/libraries/twitter-oauth/twitteroauth.php";
		//Twitter API Configuration
		$consumerKey = $this->consumer_key;
		$consumerSecret = $this->consumer_secret;
		$user_info=$this->Twitter_model->get_tw_data();
		$token = $user_info['token'];
		$token_arr = json_decode($token,true);
		$oauth_token = $token_arr['oauth_token'];
		$oauth_token_secret = $token_arr['oauth_token_secret'];
		$connection = new TwitterOAuth($consumerKey, $consumerSecret, $oauth_token, $oauth_token_secret);
		$tweetInfo = $connection->get('friends/list.json?user_id='.$tw_id);
		
		$url=$this->input->post('url');
		$s_name=substr($url,20);
		$flag=0;
		foreach($tweetInfo->users as $data)
		{
			if($data->screen_name == $s_name)
			{
				$flag=1;
				break;	
			}
			//echo $i.' = ';print_r($data->screen_name);	$i++;
		}
		echo $flag;
	}
	

	function tw_follows(){
		$data['social_tw']=$this->Twitter_model->get_tw_data();
		$data['tw_follows']=$this->Twitter_model->get_follows();
		$this->load->view('tw_follows',$data);	
	}
	
	
	
	function tw_tweet(){
		$data['social_tw']=$this->Twitter_model->get_tw_data();
		$data['tw_tweet']=$this->Twitter_model->get_tweets();
		$this->load->view('tw_tweet',$data);	
	}
	
	function tw_retweet(){
		$data['social_tw']=$this->Twitter_model->get_tw_data();
		$data['tw_retweet']=$this->Twitter_model->get_retweets();
		$this->load->view('tw_retweet',$data);	
	}
	
	
	function user_tweet(){
		$msg=$this->input->post('msg');
		include_once APPPATH."/libraries/twitter-oauth/twitteroauth.php";
		$consumerKey = $this->consumer_key;
		$consumerSecret = $this->consumer_secret;
		$sessToken = $this->session->userdata('token');
		$sessTokenSecret = $this->session->userdata('token_secret');
		$sessUserData = $this->session->userdata('userData');
		
		$connection = new TwitterOAuth($consumerKey, $consumerSecret, $sessUserData['accessToken']['oauth_token'], $sessUserData['accessToken']['oauth_token_secret']);
		
		$parameters = array('status'=>$msg);
		$status = $connection->post('statuses/update',$parameters);
		if(!empty($status->errors))
		{
			foreach($status->errors as $msg)
			{
				if($msg->message == "Status is a duplicate.")
				{
					echo "no";	
				}
			}
		} else {
			echo 'yes';	
		}
		//print_r($status);
	}
	
	
	function post_retweet(){
		
		$tw_id=$this->input->post('tw_id');
		include_once APPPATH."/libraries/twitter-oauth/twitteroauth.php";
		//Twitter API Configuration
		$consumerKey = $this->consumer_key;
		$consumerSecret = $this->consumer_secret;
		$user_info=$this->Twitter_model->get_tw_data();
		$token = $user_info['token'];
		$token_arr = json_decode($token,true);
		$oauth_token = $token_arr['oauth_token'];
		$oauth_token_secret = $token_arr['oauth_token_secret'];
		$connection = new TwitterOAuth($consumerKey, $consumerSecret, $oauth_token, $oauth_token_secret);
		$tweetInfo = $connection->get('statuses/retweeters/ids.json?id='.$tw_id);
		
		$f=0;
		$tid=$this->session->userdata('tw_id');
		foreach($tweetInfo->ids as $id){
			if($tid == $id){
				$f=1;
				break;
			}
		}
		if($f==1){
			echo $f;	
		} else {
			echo $f;	
		}
	//	echo $tweetInfo->favorited; 
		//$url = $this->input->post('url');
		//$type = $this->input->post('page_type');
		
	}
		
}