<?php
	class User_model extends CI_Model{
	
		function __construct(){
			parent::__construct();	
		}
		
		function insert($arr=array()){
			//print_r($this->input->post());die;			
			$this->db->insert('user',$arr);
			redirect('admin/User/view_user');			
		}
		
		function get_countries()
		{
			$qry=$this->db->get('country');
			return $qry->result_array();
		}
		
		function view_record($per='',$start='',$s_val=""){
			
			if($s_val!="")
			{
				$this->db->like('uname',$s_val);
			}
			
			$this->db->limit($per,$start);
			$qry = $this->db->get('user');	
			return $qry->result_array();
		}
		
		function user_record($id){
			
			$this->db->where('uid',$id);
			$qry=$this->db->get('user');
			return $qry->row_array();		
		}
		
		function del_user($id){
			$this->db->where('uid',$id);
			$this->db->delete('user');
			redirect('admin/User/view_user');
		}
		
		function update($arr){
			$id=$this->uri->segment(4);
			$this->db->where('uid',$id);
			$this->db->update('user',$arr);
			redirect('admin/User/view_user');
		}
		
		function update_status($id,$arr){
			
			$this->db->where('uid',$id);
			$this->db->update('user',$arr);
		}
		
		// search user name
		function name_search($per,$start){
			$this->db->limit($per,$start);
			$name=$this->input->post('sname');
			$this->db->like('uname',$name);
			$qry=$this->db->get('user');
			return $qry->result_array();
		}
		
		
		
		
		function get_user_balance(){
			$this->db->select('user.*,balance.*');
			$this->db->order_by('balance','desc');
			$this->db->join('user','balance.uid = user.uid');
			$qry=$this->db->get('balance');	
			return $qry->result_array(); 
		}

		function get_all_post($st=0,$pp=0,$cat=''){
			$this->db->limit($pp,$st);
			
			if($cat!=''){
				$this->db->like('category',$cat);
			}
			
			$this->db->select('user_posts.*,user.uname');
			$this->db->join('user','user.uid=user_posts.uid');
			$this->db->order_by('post_time','desc');
			$qry=$this->db->get('user_posts');	
			return $qry->result_array();
		}

		function get_all_contacts(){
			$this->db->order_by('time','desc');
			$qry=$this->db->get('contact_us');	
			return $qry->result_array();
		}	
		
		function delete_contact($c_id){
			$this->db->where('contact_id',$c_id);
			$this->db->delete('contact_us');	
		}
		
			

		function get_user_history(){
			header('Content-Type: application/json');
			$this->db->join('user','user.uid=balance.uid');
			$this->db->select('user.uname,balance.balance');
			$qry1=$this->db->get('balance');
			$qry=$qry1->result_array();
			
			print json_encode($qry); 	
		}
	
		function count_all_posts($cat='')
		{
			if($cat!=''){
				$this->db->like('category',$cat);
			}
			$qry=$this->db->get('user_posts');	
			return $qry->num_rows();
		}
		
		function get_rating(){
			$this->db->select('user.uname,rating.*');
			$this->db->join('user','user.uid=rating.uid');
			$qry=$this->db->get('rating');	
			return $qry->result_array();
		}
		
		function get_page_types()
		{
			$qry=$this->db->get('page_types');
			return $qry->result_array();
		}
	}
?>