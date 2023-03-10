<?php

class Instagram_data extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('user'))
		{
			redirect('Home/login');
		}
		
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	function insta_likes()
	{
		$data=array();
		if(@$_GET['code'])
		{
			if($_SERVER['HTTP_HOST']=='localhost'){
				$redirect = 'http://localhost/traffExchange/index.php/Instagram_data/insta_likes';	
			}else{
				$redirect = 'http://traffexchange.daily-updates.in/index.php/Instagram_data/insta_likes';
			}
			$instagram_parameter=array(
				'client_id'=> '2544eb097af441b4ab1e48d957411949',
				'client_secret'=>'4381e0f651d14adfba97c7d0d4ce8d90',
				'grant_type'=> 'authorization_code',
				'redirect_uri'=>$redirect,
				'code'=>$_GET['code']
			);
			
			$curl = curl_init('https://api.instagram.com/oauth/access_token');
			curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($curl, CURLOPT_POSTFIELDS,$instagram_parameter);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,false);
			$result=curl_exec($curl);
			curl_close($curl);
			//echo '<pre>';
			//print_r($result); 
			$s=$this->session->userdata('user');
			$final_res=json_decode($result);
			
			$arr=array('user_id'=>$s,'social_id'=>$final_res->user->id,'name'=>$final_res->user->full_name,'email'=>$final_res->user->username,'picture'=>$final_res->user->profile_picture,'token'=>$final_res->access_token,'social_type'=>'instagram');
			
			$count=$this->Instagram_model->get_social_data();
			
			if($count > 0)
			{
				// update
				$arr=array('social_id'=>$final_res->user->id,'name'=>$final_res->user->full_name,'email'=>$final_res->user->username,'picture'=>$final_res->user->profile_picture,'token'=>$final_res->access_token,'social_type'=>'instagram');
				$this->Instagram_model->insta_update($arr);
				$this->session->set_userdata('insta','loggedin');
					
			} else {
				// insert
				$arr=array('user_id'=>$s,'social_id'=>$final_res->user->id,'name'=>$final_res->user->full_name,'email'=>$final_res->user->username,'picture'=>$final_res->user->profile_picture,'token'=>$final_res->access_token,'social_type'=>'instagram');
				$this->Instagram_model->insert_rec($arr);	
				$this->session->set_userdata('insta','loggedin');	
			}
			$data['social_insta']=$this->Instagram_model->get_profile();		
			redirect('Instagram_data/insta_likes');
				//header('location:https://api.instagram.com/v1/users/self/?access_token='.$final_res->access_token); die;
		}
		$data['social_insta']=$this->Instagram_model->get_profile();		
		$this->load->view('insta_likes',$data);	
	}
	
	function logout(){
		$this->session->unset_userdata('insta');
		redirect('Instagram_data/insta_likes');	
	}
	
}
