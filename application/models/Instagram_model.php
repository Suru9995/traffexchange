<?php
	
	class Instagram_model extends CI_Model{
		
		function __construct(){
			parent::__construct();
			date_default_timezone_set("Asia/Kolkata");
		}
		
		function insert_rec($arr){
			$this->db->insert('social_accounts',$arr);
		}	
		
		function get_social_data()
		{
			$id=$this->session->userdata('user');
			$this->db->where('social_type','instagram');
			$this->db->where('user_id',$id);
			$qry=$this->db->get('social_accounts');	
			return $qry->num_rows();
		}
		
		function insta_update($arr){
			$id=$this->session->userdata('user');
			$this->db->where('social_type','instagram');
			$this->db->where('user_id',$id);
			$this->db->update('social_accounts',$arr);	
		}	
		
		function get_profile(){
			$id=$this->session->userdata('user');
			$this->db->where('social_type','instagram');
			$this->db->where('user_id',$id);
			$qry=$this->db->get('social_accounts');
			return $qry->row_array();	
		}
	
	}		
?>