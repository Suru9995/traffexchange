<?php
	class State_model extends CI_Model{
		
		function __construct(){
			parent::__construct();
			
		}
		function get_cid()
		{
			$qry=$this->db->get('country');
			return $qry->result_array();
		}
		
		function insert_state($arr){
			//$this->db->join('states','country.c_id=states.c_id','inner');
			$this->db->insert('states',$arr);
			redirect('admin/Dashboard');
		}
		
		function view_state(){
			$qry=$this->db->get('states');
			return $qry->result_array();
		}	
		
		function del_state($id=''){
			$this->db->where('s_id',$id);
			$this->db->delete('states');	
		}
		
		function get_state($id=''){
			
			$this->db->where('s_id',$id);
			$qry=$this->db->get('states');	
			return $qry->row_array();
		}
		
		function update_state($id,$arr){
			
			$this->db->where('s_id',$id);
			$this->db->update('states',$arr);
			redirect('admin/State/view_state');	
		}
		
		function ajax_state(){
			$id= $this->input->post('country_id');
			$this->db->where('c_id',$id);
			$qry=$this->db->get('states');
			return $qry->result_array();
		}	
		
	}
?>