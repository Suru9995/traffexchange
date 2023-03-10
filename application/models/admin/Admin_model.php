<?php
	class Admin_model extends CI_Model{
	
		function __construct(){
			parent::__construct();	
		}
		
		function insert($arr){
			$this->db->insert('admin',$arr);	
		}
		
		function view_record(){
			$qry = $this->db->get('admin');	
			return $qry->result_array();
		}
		
		// For Session Only
		function admin_record($id){
			$this->db->where('id',$id);
			$qry=$this->db->get('admin');
			return $qry->row_array();		
		}
		
		//---------------------------------
		
		function del_admin($id){
			$this->db->where('id',$id);
			$this->db->delete('admin');
			redirect('admin/Admin/view_admin');
		}
		
		function update($arr){
			$id=$this->uri->segment(4);
			$this->db->where('id',$id);
			$this->db->update('admin',$arr);
			redirect('admin/Admin/view_admin');
		}
		
		function get_admin($id){
			$this->db->where('id',$id);
			$qry=$this->db->get('admin');
			return $qry->row_array();		
		}
	
		function add_page($arr){
			$this->db->insert('page_types',$arr);	
		}
		
		function view_page(){
			$qry=$this->db->get('page_types');
			return $qry->result_array();
		}	
		
		function delete_page($id){
			$this->db->where('id',$id);
			$this->db->delete('page_types');
		}
		
		function select_page($id){
			$this->db->where('id',$id);
			$qry=$this->db->get('page_types');
			return $qry->row_array();
		}
		
		function update_page($id,$arr){
			$this->db->where('id',$id);
			$this->db->update('page_types',$arr);
			redirect('admin/Dashboard/view_page');	
		}

		function add_package($arr){
			$this->db->insert('packages',$arr);	
		}

		function sel_packages(){
			$qry=$this->db->get('packages');
			return $qry->result_array();
		}
		
		// Delete package
		function del_package($id){
			$this->db->where('p_id',$id);
			$this->db->delete('packages');
			redirect('admin/Dashboard/view_packages');
		}
		
		// Select for update
		function sel_package($id){
			$this->db->where('p_id',$id);
			$qry=$this->db->get('packages');
			return $qry->row_array();	
		}
		
		//update package
		
		function update_package($arr,$id){
			$this->db->where('p_id',$id);
			$this->db->update('packages',$arr);
			redirect('admin/Dashboard/view_packages');
		}
		
		
		function count_rows($s_val=""){
			
			if($s_val!="")
			{
				$this->db->like('uname',$s_val);
			}
			
			$qry=$this->db->get('user');	
			return $qry->num_rows();
		}
		
		
		function view_history($pp,$st)
		{
			$this->db->limit($pp,$st);
			$this->db->order_by('time','desc');
			$qry=$this->db->get('history');
			return $qry->result_array();
		}
		
		function del_history($did="")
		{
			$this->db->where('hid',$did);
			$qry=$this->db->delete('history');
		}
		
		function tot_his(){
			$qry=$this->db->get('history');
			return $qry->num_rows();
		}	
		
	}
?>