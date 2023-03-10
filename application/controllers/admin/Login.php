<?php
	class Login extends CI_Controller{

	function __construct(){
		parent::__construct();
		
		if($this->session->userdata('admin')!=''){
			redirect('admin/Dashboard');	
			echo "session is ".$this->session->userdata('admin');
		}	
	}
	
	function index(){
		$msg=array();
		if($this->input->post())
		{
			$msg['err']=$this->Login_model->validate();
		}
		$this->load->view('admin/login',$msg);
	}

	

}
		
?>