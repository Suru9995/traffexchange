<?php

class Website_ctrl extends CI_Controller {

	function __construct()
	{
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
	
	function ws_hits()
	{
		$data['sites']=$this->Website_model->get_sites();
		$this->load->view('ws_hits',$data);
		
	}
	
	
	function ajax_hits(){
		$uid=$this->input->post('user');
		$post=$this->input->post('p_id');
		$cpc=$this->input->post('cpc');
		
		//print_r($this->input->post());die;
		

		$this->db->select('category');
		$this->db->where('post_id',$post);
		$q=$this->db->get('user_posts');
		$cat=$q->row_array();
		
		
		$cur_user=$this->session->userdata('user');
		$viewer_bal=$this->User_data_model->get_balance();
		$owner_bal=$this->User_data_model->get_owner_balance($uid);
		
		//echo "<pre>"; echo $cur_user."<br>"; echo $viewer_bal['balance']."<br>"; echo $owner_bal['balance']."<br>";die;
		
		if($cat['category']=="facebook page" || $cat['category']=="facebook share")
		{
			$ip=$this->input->ip_address();
			$arr=array('uid'=>$cur_user,'post_id'=>$post,'user_ip'=>$ip);
			$this->History_model->add_history($arr);
			die;
		}
		
		
		// Update Owner Balance
		$new_owner_bal=$owner_bal['balance']-$cpc;
		$own_arr=array('balance'=>$new_owner_bal);
		$this->User_data_model->update_owner_bal($uid,$own_arr);
		
		// Update Viewer Balance
		$new_user_bal=$viewer_bal['balance']+$cpc;
		$user_arr=array('balance'=>$new_user_bal);
		$this->User_data_model->update_balance($user_arr);
		
		
		// Add History table View hostory
		$ip=$this->input->ip_address();
		$arr=array('uid'=>$cur_user,'post_id'=>$post,'user_ip'=>$ip);
		$this->History_model->add_history($arr);
		
	}

}
