<?php
	class Login_model extends CI_Model{
	
		function __construct(){
			parent::__construct();	
		}
		
		
		function validate(){
			$email=$this->input->post('username');
			$password=$this->input->post('password');
			//$arr=array('email'=>$email,'password'=>$password);
			
			$this->db->where('email',$email);
			$this->db->where('password',$password);	
			$qry=$this->db->get('admin');
			$id=$qry->row_array();
			$cnt=$qry->num_rows();
			//$this->load->library('session');
			if($cnt==1){
				
				$this->session->set_userdata('admin',$id['id']);
				echo $this->session->userdata('admin');
				redirect('admin/Dashboard');
			}else{
				$msg="Invalid Email or Password !!";
				return $msg;	
			}
				
		}
		
		
		
	}
?>