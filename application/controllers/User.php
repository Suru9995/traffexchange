<?php

class User extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('user'))
		{
			redirect('Home/login');
		}
		$this->load->library('facebook');
	}
	
	public function index()
	{
		$data['user_rate']=$this->User_data_model->get_rate();
		$this->load->view('welcome_user.php',$data);
	}
	
	
	
	function add_sites()
	{
		if($this->input->post('add'))
		{
			$this->form_validation->set_rules('type','Type','required');
			$this->form_validation->set_rules('url','Url','required');
			$this->form_validation->set_rules('total_click','Total Click','required');
			$this->form_validation->set_rules('daily_click','Daily Click','required');
			
			
			
			if($this->form_validation->run() == FALSE)
			{
				
			}else
			{
			
				//$uid=$this->session->userdata('user');
				$uid=$this->session->userdata('user');
				$cat=$this->input->post('type');
				$country='india';
				$url=$this->input->post('url');
				$tc=$this->input->post('total_click');
				$dc=$this->input->post('daily_click');
				$cpc=$this->input->post('cpc');
				$status=$this->input->post('status');
				$pdate=date('d/m/Y');
				
				$msg="";	
				if($dc > $tc)
				{
					$msg="Daily Click Must Be Less Then Total Click"; 	
					$res['click_err']=$msg;
				}
				
				else
				{
					
				if($cat == "facebook page")
				{
					$userLikes = $this->facebook->request('get', '/?id='.$url);
					$s_data_id=$userLikes['id'];
					$arr=array('uid'=>$uid,'social_data_id'=>$s_data_id,'category'=>$cat,'country'=>$country,'url'=>$url,'daily_clicks'=>$dc,'total_clicks'=>$tc,'cpc'=>$cpc,'status'=>$status,'post_date'=>$pdate);
					$this->User_data_model->insert_user_post($arr);		
				}
				
				else{		
				$arr=array('uid'=>$uid,'category'=>$cat,'country'=>$country,'url'=>$url,'daily_clicks'=>$dc,'total_clicks'=>$tc,'cpc'=>$cpc,'status'=>$status,'post_date'=>$pdate);
					$this->User_data_model->insert_user_post($arr);	
				}
					redirect('User/my_sites');
					
				}
					
			}
		}
		
		
		$res['user']=$this->User_data_model->get_page_types();
		$this->load->view('add_sites',$res);
	}
	
	
	
	function update_site($pid="")
	{
		
		if($this->input->post('add'))
		{
			$this->form_validation->set_rules('type','Type','required');
			$this->form_validation->set_rules('url','Url','required');
			$this->form_validation->set_rules('total_click','Total Click','required');
			$this->form_validation->set_rules('daily_click','Daily Click','required');
			
			if($this->form_validation->run() == FALSE)
			{
				
			}else
			{
				$cat=$this->input->post('type');
				$country='india';
				$url=$this->input->post('url');
				$tc=$this->input->post('total_click');
				$dc=$this->input->post('daily_click');
				$cpc=$this->input->post('cpc');
				$status=$this->input->post('status');
				$arr=array('category'=>$cat,'country'=>$country,'url'=>$url,'daily_clicks'=>$dc,'total_clicks'=>$tc,'cpc'=>$cpc,'status'=>$status);
				
				$this->User_data_model->update_post($arr,$pid);
				redirect('User/my_sites');
			}
		}
		
		
		$res['user']=$this->User_data_model->get_page_types();
		$res['user_data']=$this->User_data_model->get_post($pid);
		
		$this->load->view('add_sites',$res);
	}
	

	function my_sites()
	{
		$res['data']=$this->User_data_model->get_user_post();
		$this->load->view('my_sites',$res);
	}
	
	function change_status()
	{
		$id=$this->uri->segment(3);
		$status=$this->uri->segment(4);
		
		$this->User_data_model->c_status($id,$status);
	}
	function delete($pid="")
	{
		$this->User_data_model->del_post($pid);
	}
	function logout()
	{
			$this->session->unset_userdata('user');
			redirect('Home');
	}

	
	// Edit Profile
	
	function update_profile()
	{
		$data['country']=$this->User_data_model->get_country();
		$data['user_data']=$this->User_data_model->get_userdata();
		$this->load->view('update_profile',$data);
		
		if($this->input->post())
		{
			$name=$this->input->post('name');
			$gender=$this->input->post('gender');
			$country=$this->input->post('country');
			$config['upload_path'] = './assets/user/image/';
            $config['allowed_types']= 'gif|jpg|png|jpeg';
			$config['file_name']="user".time().$_FILES['image']['name'];
			$this->load->library('upload', $config);
			
			if($this->upload->do_upload('image')){
				$image=$this->upload->data('file_name');
				
				$arr=array('uname'=>$name,'gender'=>$gender,'country'=>$country,'image'=>$image);
				
				unlink('assets/user/image/'.$data['user_data']['image']);
				
				$this->User_data_model->update_data($arr);
						
			}else {
				$arr=array('uname'=>$name,'gender'=>$gender,'country'=>$country);
				$this->User_data_model->update_data($arr);
				
			}
			
			
		}
		
	}
	
	
	function show_profile()
	{
		$this->load->view('show_profile');
	}
	
	//change password
	function change_password()
	{
		$msg=array();
		if($this->input->post('change'))
		{
			$op=$this->input->post('old_pass');
			$data=$this->User_data_model->get_userdata();
			if($op==$data['password'])
			{
				$np=$this->input->post('new_pass');
				$cp=$this->input->post('conf_pass');
				
				if($np!=$cp)
				{
					$msg['err_msg2']="Password Mismatched !!";
				}elseif($op==$np)
				{
					$msg['err_msg2']="Same Password!!";
				}
				else
				{
					$arr=array('password'=>$cp);
					$this->User_data_model->change_pass($arr);
					
					redirect('User');
					
				}
			}else
			{
				$msg['err_msg']="Wrong Password !!";
			}
		}
		
		$this->load->view('change_password',$msg);
	}
	
	
		function logs()
		{
			$this->load->view('logs');
		}

		// Show logs of sites
		function view_logs()
		{
			$data=$this->User_data_model->get_user_post();
			//echo '<pre>'; print_r($data); die;
			$arr['logs']=$this->User_data_model->logs($data);
			$this->load->view('view_logs',$arr);
		}
		
		//view counter of sites
		function view_counter_sites()
		{
			$arr['tot_view']=$this->User_data_model->get_user_post();
			$this->load->view('view_counter',$arr);
		}
		
		//view daily logs of sites
		function daily_logs()
		{
			$data=$this->User_data_model->get_user_post();
			$arr['daily_logs']=$this->User_data_model->daily_logs($data);
			$this->load->view('daily_logs',$arr);
		}
		
		//click counter of sites
		function click_counter_sites()
		{
			$data=$this->User_data_model->get_user_post();
			$arr['click_counter']=$this->User_data_model->click_count_site($data);
			$this->load->view('click_counter',$arr);
		}
		
		
		function activities()
		{
			$this->load->view('all_activities');
		}
		
		function get_user_his(){
			$this->User_data_model->get_user_history();
		}
				
		function notification()
		{
				if($this->uri->segment(3)==1){
					$flag=$this->uri->segment(3);
					$this->User_data_model->update_notification($flag);
				}
			$data['notification']=$this->User_data_model->get_notification();
			$this->load->view('notification',$data);
		}
		
		
		function buy_credits()
		{
			$data['packages']=$this->User_data_model->get_packages();
			$this->load->view('buy_credits',$data);
		}
		
		function print_data($id=''){
			$data['transaction']=$this->User_data_model->get_print_data($id);
			$this->load->view('print_data',$data);
		}
		
		function purchase(){
			$data['transaction']=$this->User_data_model->get_transaction();
			//echo "Purchase";
			/*
			echo '<pre>';
			print_r($data);	*/
			$this->load->view('purchase',$data);
		}
		
		function site_rating(){
			$rate=$this->input->post('rate');
			$id=$this->session->userdata('user');
			
			$count=$this->User_data_model->get_rating();
			
			if($count == 1){
					$arr=array('rate'=>$rate);
					$this->User_data_model->update_rating($arr);
			} else {
					$arr=array('uid'=>$id,'rate'=>$rate);
					$this->User_data_model->put_rating($arr);
			}
			
			echo $rate;
		}	
		
		
}
 ?>