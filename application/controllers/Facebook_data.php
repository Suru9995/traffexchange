<?php
class Facebook_data extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('user'))
		{
			redirect('Home/login');
		}
		$this->load->library('facebook');
		$this->load->config('facebook');
		
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	
	
	// After Login Update Or Insert Record
	function fb_callback(){
		// Check if user is logged in
        if($this->facebook->is_authenticated()){
            // Get user facebook profile details
					
            $userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');


            // Preparing data for database insertion
			
            /*$userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['first_name'];
            $userData['last_name'] = $userProfile['last_name'];
            $userData['email'] = $userProfile['email'];
            $userData['gender'] = $userProfile['gender'];
            $userData['locale'] = $userProfile['locale'];
            $userData['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
            $userData['picture_url'] = $userProfile['picture']['data']['url'];
			*/
			
			$uid=$this->session->userdata('user');
			$sid=$userProfile['id'];
			$name=$userProfile['first_name'].' '.$userProfile['last_name'];
			
			if($userProfile['email']!=""){
				$email=$userProfile['email'];
			}else{
				$email="Not Given";
			}
			
			$img=$userProfile['picture']['data']['url'];
			$token=$this->facebook->is_authenticated();
			$stype="facebook";
			
			$arr=array('user_id'=>$uid,'social_id'=>$sid,'name'=>$name,'email'=>$email,'picture'=>$img,'token'=>$token,'social_type'=>$stype);
			
			$count=0;
			$count=$this->Facebook_model->get_social_data();
			if($count > 0)
			{
				$arr=array('social_id'=>$sid,'name'=>$name,'email'=>$email,'picture'=>$img,'token'=>$token,'social_type'=>$stype);
				$this->Facebook_model->update_fb($arr);	
			}
			else
			{
				$this->Facebook_model->insert_fb($arr);
			}
				
			redirect('Facebook_data/fb_page');	
            // Insert or update user data
            //$userID = $this->user->checkUser($userProfile);

            // Check user data insert or update status
			
			/*
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('userData',$userProfile);
            }else{
               $data['userData'] = array();
            }

			*/
			
            // Get logout URL
            $data['logoutUrl'] = $this->facebook->logout_url();
        }else{
            $fbuser = '';

            // Get login URL
            $data['authUrl'] =  $this->facebook->login_url();
			
			
        }
	}
	
	function fb_logout(){
		$this->facebook->destroy_session();
		redirect('Facebook_data/fb_post');	
	}
	
	
	
	function get_ajax_callback(){
		
		$url = $this->input->post('url');
		$type = $this->input->post('page_type');
		$s_id=$this->input->post('s_id');
		
		
		if($type == 'fb_page'){
				$a = array();
				$userLikes = $this->facebook->request('get', 'me/likes/'.$s_id);
				
				if(empty($userLikes['data']))
				{
					echo "no";	
				}else {
					echo "yes";			
				}
				
				
		}else{
			$url_data = parse_url($url);
			$parts = explode('&',$url_data['query']);
			$fb_ids = explode('=',$parts[0]);
			$fb_id = $fb_ids[1];
			echo $fb_id;	
		}
	}
	
	
	//if(empty($userLikes['paging'])){ echo "empty @!!!!!"; }
			
	
	
	function fb_post()
	{
		redirect('Facebook_data/fb_page');
		$data['social_fb']=$this->Facebook_model->get_fb_data();
		$data['fb_posts']=$this->Facebook_model->get_posts();
		$this->load->view('fb_post',$data);
	}
	
	function fb_page()
	{
		$data['fb_pages']=$this->Facebook_model->get_pages();
		$data['social_fb']=$this->Facebook_model->get_fb_data();

		$this->load->view('fb_page',$data);
	}

	function fb_share(){
		$data['app_id'] = $this->config->item('facebook_app_id');
		$data['fb_shares']=$this->Facebook_model->get_shares();	
		$data['social_fb']=$this->Facebook_model->get_fb_data();
		$this->load->view('fb_share',$data);
	}

	function demo_fb(){
		$data['fb_posts']=$this->Facebook_model->get_posts();
		$data['social_fb']=$this->Facebook_model->get_fb_data();
		$this->load->view('fb_post_try',$data);	
	}
	
	
		// Count Daily Click of post
		function count_today_click($pid)
		{
			$t=date('Y-m-d');
			$this->db->like('time',$t);
			$this->db->where('post_id',$pid);
			$h=$this->db->get('history');
			return $h->num_rows(); 
		}
		
		//count total click of post
		function count_all_click($pid)
		{
			$this->db->where('post_id',$pid);
			$h=$this->db->get('history');
			return $h->num_rows(); 
		}

}
