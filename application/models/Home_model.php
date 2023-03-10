<?php
	
	class Home_model extends CI_Model{
		
		function __construct(){
			parent::__construct();
			$this->load->database();	
		}
		
		function user_login(){
			$email=$this->input->post('username');
			$password=$this->input->post('password');
			$this->db->where('email',$email);
			$this->db->where('password',$password);
			$rec=$this->db->get('user');
			$valid=$rec->num_rows();
			return $valid;	
		}
		
		function get_status(){
			$email=$this->input->post('username');
			$this->db->where('email',$email);
			$rec=$this->db->get('user');
			return $rec->row_array();
		}
		function get_status2($e=""){
			
			$this->db->where('email',$e);
			$rec=$this->db->get('user');
			return $rec->row_array();
		}
		
		function get_login_data()
		{
			$qry=$this->db->get('user');
			return $qry->result_array();
		}	
		
		function update_pass($email,$otp){
			$this->db->where('email',$email);
			$arr=array('password'=>$otp);
			$this->db->update('user',$arr);	
		}
		
		function get_country(){
			$qry=$this->db->get('country');
			return $qry->result_array();	
		}
		
		function get_emails(){
			$qry=$this->db->get('user');	
			return $qry->result_array();
		}
		
		function insert_user($arr){
			$this->db->insert('user',$arr);		
		}
		
		function send_message($arr)
		{
			$this->db->insert('contact_us',$arr);	
		}
		

		
	}	
	
	
?>