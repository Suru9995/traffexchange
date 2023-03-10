<?php
	class City_model extends CI_Model{
		
		function __construct(){
			parent::__construct();
			
		}
		
		function get_sid()
		{
			$qry=$this->db->get('states');
			return $qry->result_array();
		}
		
		function insert_city($arr=array()){
			$this->db->insert('cities',$arr);
			redirect('admin/Dashboard');
		}
		
		function view_city(){
			$qry=$this->db->get('cities');
			return $qry->result_array();
		}	
		
		function del_city($id){
			$this->db->where('city_id',$id);
			$this->db->delete('cities');	
		}
		
		function get_city($id=''){
			$this->db->where('city_id',$id);
			$qry=$this->db->get('cities');
			return $qry->row_array();
		}
		
		function update_city($id){
			$s_id=$this->input->post('stateid');
			$c_name=$this->input->post('cityname');
			$arr=array('city_id'=>$s_id,'name'=>$c_name);
			$this->db->where('city_id',$id);
			$this->db->update('cities',$arr);
			redirect('admin/City/view_city');
		}
		
		function ajax_country(){
			$id=$this->input->post('country_id');	
			$this->db->where('c_id',$id);
			$qry=$this->db->get('states');
			return $qry->result_array();
		}
		
		
		function ajax_state(){
			$id=$this->input->post('state_id');
			$this->db->where('s_id',$id);
			$qry=$this->db->get('cities');
			return $qry->result_array();
		}
	}
?>