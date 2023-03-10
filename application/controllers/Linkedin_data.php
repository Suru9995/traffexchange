<?php

class Linkedin_data extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('user'))
		{
			redirect('Home/login');
		}
		//$this->load->config('linkedin-old');
		//$this->load->config('Linkedin');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	function linkedin_post(){
		
		$data['linked_post']=$this->Linkedin_model->get_posts();
		$data['oauthURL_linkedin'] = $this->linkedin_url();
		$user=$this->Linkedin_model->get_profile();
		$data['social_linked']=$user;
		$token = json_decode($user['token'],true);
		$this->linkedin->setTokenAccess($token);
		
		$attachment['comment'] = substr(trim('this is new test 123'),0,700);
		//$share = $this->linkedin->share('new',$attachment);
		//echo '<pre>';print_r($share);
		//echo $share['success'];
		 //die;
		 $this->load->view('linkedin_post',$data);
	}
	
	function user_post_follow(){
		//echo 'model';
		
		$id=$this->input->post('linkid');
		
		$data['oauthURL_linkedin'] = $this->linkedin_url();
		$user=$this->Linkedin_model->get_profile();
		$data['social_linked']=$user;
		$token = json_decode($user['token'],true);
		$this->linkedin->setTokenAccess($token);
		
		$profile = $this->linkedin->followCompany($id);
		//echo '<pre>';print_r($profile); 
		echo $profile['success']; 
	}
	
	function linkedin_follow(){
		//$data['linked_follow']=$this->Linkedin_model->get_post_follow();
		$data['linked_follow']=$this->Linkedin_model->get_post_follow();
		$data['oauthURL_linkedin'] = $this->linkedin_url();
		$user=$this->Linkedin_model->get_profile();
		$data['social_linked']=$user;
		$this->load->view('linkedin_follows',$data);
		
	}
	
	
	function linkedin_like(){
		redirect('Linkedin_data/linkedin_post');
	}
	
	/*
	function get_linkedin_url()
	  {
	  		$userData = array();
			$data=array();
			
			//Include the linkedin api php 
			
			
			include_once APPPATH."libraries/linkedin-oauth-client/http.php";
			include_once APPPATH."libraries/linkedin-oauth-client/oauth_client.php";
			
			//include_once APPPATH."libraries/Linkedin.php";
			
		
		//Get status and user info from session
			//$oauthStatus = $this->session->userdata('oauth_status');
			//$sessUserData = $this->session->userdata('userData');
			
			//if(isset($oauthStatus) && $oauthStatus == 'verified'){
				//User info from session
				//$userData = $sessUserData;
			if((isset($_REQUEST["oauth_init"]) && $_REQUEST["oauth_init"] == 1) || (isset($_REQUEST['oauth_token']) && isset($_REQUEST['oauth_verifier']))){
			
				
				$client = new oauth_client_class;
				$client->client_id = $this->config->item('linkedin_api_key');
				$client->client_secret = $this->config->item('linkedin_api_secret');
				$client->redirect_uri = site_url().$this->config->item('linkedin_redirect_url');
				$client->scope = $this->config->item('linkedin_scope');
				$client->debug = false;
				$client->debug_http = true;
				$application_line = __LINE__;
				
				//If authentication returns success
				if($success = $client->Initialize()){
					if(($success = $client->Process())){
						if(strlen($client->authorization_error)){
							$client->error = $client->authorization_error;
							$success = false;
						}elseif(strlen($client->access_token)){
						//echo '<pre>';print_r($_SESSION['OAUTH_ACCESS_TOKEN']);
						//echo '<pre>';print_r($client);die;
							$success = $client->CallAPI('http://api.linkedin.com/v1/people/~:(id,email-address,first-name,last-name,location,picture-url,public-profile-url,formatted-name)', 
							'GET',
							array('format'=>'json'),
							array('FailOnAccessError'=>true), $userInfo);
						}
					}
					$success = $client->Finalize($success);
				}
				
				if($client->exit) exit;
		
				if($success){
					//Preparing data for database insertion
					$first_name = !empty($userInfo->firstName)?$userInfo->firstName:'';
					$last_name = !empty($userInfo->lastName)?$userInfo->lastName:'';
					$token = json_encode(array('access_token'=>$client->access_token,'access_token_secret'=>$client->access_token_secret));
					$image_url='';
					if(@$userInfo->pictureUrl != '')
					 {
					 	$image_url=$userInfo->pictureUrl;
					 }
					
					//echo '<pre>';print_r($userInfo);die;
					$userData = array(
					
						'name'=>$userInfo->formattedName,
						'email'=>$userInfo->emailAddress,
						'picture'=>$image_url,
						'token'=>$token,
						'user_id' => $this->session->userdata('user'),
						'social_id' => $userInfo->id,
						'social_type' => 'linkedin',
					);
					
					
					$count=$this->Linkedin_model->get_data();
					
					if($count == 1)
					{
						// update
						$userData = array(
					
						'name'=>$userInfo->formattedName,
						'email'=>$userInfo->emailAddress,
						'picture'=>$image_url,
						'token'=>$token,
						'social_id' => $userInfo->id
						);
							
						$this->Linkedin_model->update_linkedin_data($userData);	
					}else {
						// insert
						$this->Linkedin_model->insert_linkedin_data($userData);
					}
					$this->session->set_userdata('linkedin','login');
					redirect('Linkedin_data/linkedin_like');
					//Insert or update user data
					
					//Store status and user profile info into session
					//$this->session->set_userdata('oauth_status','verified');
					//$this->session->set_userdata('userData',$userData);
					
					
					//echo 'hello';die;
					//Redirect the user back to the same page
					//redirect('/user_authentication');
	
				}else{
					 $data['error_msg'] = 'Some problem occurred, please try again later!';
				}
				//echo 'dsfsf';die;
			}elseif(isset($_REQUEST["oauth_problem"]) && $_REQUEST["oauth_problem"] <> ""){
			//echo 'dfsdfsdf';die;
				$data['error_msg'] = $_GET["oauth_problem"];
			}else{
			//echo 'hello';die;
			
				$data['oauthURL_linkedin'] = site_url().$this->config->item('linkedin_redirect_url').'?oauth_init=1';
			}
		//	echo $data['oauthURL_linkedin']; die;
			return $data['oauthURL_linkedin'];
		
			//$data['userData'] = $userData;
			
			// Load login & profile view
			//$this->load->view('user_authentication/index',$data);
	  }
	*/


// ------------------



	public function linkedin_url(){
		
		// Load config
		$this->config->load("linkedin",TRUE);
		$linkedin_config = $this->config->item('linkedin');
		$this->load->library('Linkedin', $linkedin_config);
		
		$this->linkedin->setResponseFormat(LINKEDIN::_RESPONSE_JSON);
		$token = $this->linkedin->retrieveTokenRequest();
		
		$this->session->set_userdata('oauth_request_token_secret',$token['linkedin']['oauth_token_secret']);
		$this->session->set_userdata('oauth_request_token',$token['linkedin']['oauth_token']);
		$this->session->set_userdata('linkedin_token_secret',$token['linkedin']['oauth_token_secret']);
		$this->session->set_userdata('linkedin_token',$token['linkedin']['oauth_token']);
		$this->session->set_userdata('test5','testing');
		
		$link = "https://api.linkedin.com/uas/oauth/authorize?oauth_token=". $token['linkedin']['oauth_token'];  
		return $link;
	}
	
	
	public function linkedin_success(){
		$this->config->load("linkedin",TRUE);
		$linkedin_config = $this->config->item('linkedin');
		
		$this->load->library('Linkedin', $linkedin_config);
		$this->linkedin->setResponseFormat(LINKEDIN::_RESPONSE_JSON);
		$oauth_token = $this->session->userdata('oauth_request_token') ? $this->session->userdata('oauth_request_token') : $this->input->get('oauth_token');
		$oauth_token_secret = $this->session->userdata('oauth_request_token_secret');
		$oauth_verifier = $this->input->get('oauth_verifier');
		$response = $this->linkedin->retrieveTokenAccess($oauth_token, $oauth_token_secret, $oauth_verifier);
		// ok if we are good then proceed to retrieve the data from Linkedin
		if($response['success'] === TRUE) {
			// From this part onward it is up to you on how you want to store/manipulate the data 
			$oauth_expires_in = $response['linkedin']['oauth_expires_in'];
			$oauth_authorization_expires_in = $response['linkedin']['oauth_authorization_expires_in'];
			$tokens = $response['linkedin'];
			$response = $this->linkedin->setTokenAccess($response['linkedin']);
			$profile = $this->linkedin->profile('~:(id,first-name,last-name,picture-url,emailAddress,location,dateOfBirth,headline,publicProfileUrl,siteStandardProfileRequest)');
			
			$userInfo = json_decode($profile['linkedin']);
			
			
			//$email=$userInfo->emailAddress;			
			//echo $email;die;
			//$first_name = !empty($userInfo->firstName)?$userInfo->firstName:'';
			//$last_name = !empty($userInfo->lastName)?$userInfo->lastName:'';
			$token = json_encode(array('oauth_token'=>$tokens['oauth_token'],'oauth_token_secret'=>$tokens['oauth_token_secret']));
			//echo '<pre>';print_r($token);die;
			$image_url='';
			if($userInfo->pictureUrl != '')
			 {
				$image_url=$userInfo->pictureUrl;
			 }
			$name=$userInfo->firstName." ".$userInfo->lastName;
			//echo 'con <pre>';print_r($userInfo);die;
			$userData = array(
			
				'name'=>$name,
				'email'=>$userInfo->emailAddress,
				'picture'=>$image_url,
				'token'=>$token,
				'user_id' => $this->session->userdata('user'),
				'social_id' => $userInfo->id,
				'social_type' => 'linkedin'
				
			);
			//echo '<pre>';print_r($userData);die;
			$count=$this->Linkedin_model->get_data();
					
					if($count == 1)
					{
						// update
						$userData = array(
					
						'name'=>$name,
						'email'=>$userInfo->emailAddress,
						'picture'=>$image_url,
						'token'=>$token,
						'social_id' => $userInfo->id
						);
							
						$this->Linkedin_model->update_linkedin_data($userData);	
					}else {
						// insert
						$this->Linkedin_model->insert_linkedin_data($userData);
					}
					$this->session->set_userdata('linkedin','login');
					redirect('Linkedin_data/linkedin_like');
			
			//Insert or update user data
			
			//Store status and user profile info into session
			//$this->session->set_userdata('oauth_status','verified');
			//$this->session->set_userdata('userData',$userData);
			
			
			/*$user_id = $user_in->id;
			$session_array = array(
								'user_id'=>$user_id,
								'first_name'=>isset($user_in->firstName) ? $user_in->firstName : '',
								'last_name'=>isset($user_in->lastName) ? $user_in->lastName : '',
								'images'=>$user_in->pictureUrl,
								'email'=>isset($user_in->emailAddress) ? $user_in->emailAddress : '',
								'address' =>isset($user_in->location->name) ? $user_in->location->name: '',
								'username'=>isset($user_in->emailAddress) ? $user_in->emailAddress : ''
								);
			$this->session->set_userdata('linkeduser', $session_array);
			
			$token_info = array('username'=>$user_in->emailAddress,'oauth_token'=>$tokens['oauth_token'],'oauth_token_secret'=>$tokens['oauth_token_secret']);
			
			$siteSetting = $this->users_model->check_site_setting(); //to skip register Process
		*/
		} else {
		  // bad token request, display diagnostic information
		  echo "Request token retrieval failed:<br /><br />RESPONSE:<br /><br />" . print_r($response, TRUE);
		}
	}


	function user_post(){
		$data['oauthURL_linkedin'] = $this->linkedin_url();
		$user=$this->Linkedin_model->get_profile();
		$data['social_linked']=$user;
		$token = json_decode($user['token'],true);
		$this->linkedin->setTokenAccess($token);
		$msg=$this->input->post('msg');
		$attachment['comment'] = substr(trim($msg),0,700);
		$share = $this->linkedin->share('new',$attachment);		
		echo $share['success'];				
	}

	

//------------------

		
	  function logout(){
			$this->session->unset_userdata('linkedin');
			$this->session->unset_userdata('oauth_request_token_secret');
		$this->session->unset_userdata('oauth_request_token');
		$this->session->unset_userdata('linkedin_token_secret');
		$this->session->unset_userdata('linkedin_token');
		$this->session->unset_userdata('test5');
			redirect('Linkedin_data/linkedin_like');	  
	  }
}
