<?php
	class Country_model extends CI_Model{
		
		function __construct(){
			parent::__construct();
			$this->load->database();	
		}
		
		function insert_country($arr){
			$this->db->insert('country',$arr);
		}
		
		function view_country(){
			$arr = $this->db->get('country');
			return $arr->result_array();	
		}
		
		function del_country($id='')
		{
			$this->db->where('c_id',$id);
			$this->db->delete('country');
		}
		
		function get_country($id='')
		{
			$this->db->where('c_id',$id);
			$qry=$this->db->get('country');
			return $qry->row_array();
		}
		
		function update_country($id='')
		{
			$c_id=$this->input->post('countryid');
			$c_name=$this->input->post('countryname');
			$arr=array('name'=>$c_name);
			$this->db->where('c_id',$id);
			$this->db->update('country',$arr);
			redirect('admin/Country/view_country');
		}
		
	}
?>