<?php
	
	class User_data_model extends CI_Model{
		
		function __construct(){
			parent::__construct();
			$this->load->database();
			date_default_timezone_set("Asia/Kolkata");	
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
		
		function change_pass($pass){
			$id=$this->session->userdata('user');
			$this->db->where('uid',$id);
			$this->db->update('user',$pass);	
			
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
		
		//for getting userdata cuurently loggedin
		function get_userdata()
		{
			$id=$this->session->userdata('user');
			$this->db->where('uid',$id);
			$qry=$this->db->get('user');
			return $qry->row_array();
		}
		
		function get_page_types()
		{
			
			$qry=$this->db->get('page_types');
			return $qry->result_array();
		}
		
		function insert_user_post($arr)
		{
			$this->db->insert('user_posts',$arr);
		}
		
		function get_user_post()
		{
			$id=$this->session->userdata('user');
			$this->db->where('uid',$id);
			$qry=$this->db->get('user_posts');
			return $qry->result_array();
		}
		function get_post($pid="")
		{
			$this->db->where('post_id',$pid);
			$qry=$this->db->get('user_posts');
			return $qry->row_array();
		}
		
		function c_status($pid,$status)
		{
			
			if($status=="deactive")
			{
				$arr=array('status'=>'active');
			}else
			{
				$arr=array('status'=>'deactive');
			}
			
			$this->db->where('post_id',$pid);
			$qry=$this->db->update('user_posts',$arr);
			redirect('User/my_sites');
		}
		
		function del_post($pid="")
		{
			$this->db->where('post_id',$pid);
			$qry=$this->db->delete('user_posts');
			redirect('User/my_sites');
		}
		
		function update_post($arr,$pid)
		{
			$this->db->where('post_id',$pid);
			$qry=$this->db->update('user_posts',$arr);
			
		}
		
		
		function update_data($arr)
		{
			$id=$this->session->userdata('user');
			$this->db->where('uid',$id);
			$this->db->update('user',$arr);
			redirect('User');	
		}
		
		function add_balance($arr,$id)
		{
			$this->db->where('uid',$id);
			$qry=$this->db->insert('balance',$arr);
		}
		
		function get_balance()
		{
			$id=$this->session->userdata('user');
			$this->db->where('uid',$id);
			$qry=$this->db->get('balance');
			return $qry->row_array();
		}
		
		function update_balance($arr)
		{
			$id=$this->session->userdata('user');
			$this->db->where('uid',$id);
			$qry=$this->db->update('balance',$arr);
			
		}
		
		// get owner balance
		function get_owner_balance($uid){
			$this->db->where('uid',$uid);
			$qry=$this->db->get('balance');
			return $qry->row_array();
		}
		
		// update owner balance
		function update_owner_bal($id,$arr)
		{
			$this->db->where('uid',$id);
			$qry=$this->db->update('balance',$arr);
		}
		
		//get logs
		function logs($data)
		{ 
			if(!empty($data)){
				$a=array();
				foreach($data as $d)
				{
					array_push($a,$d['post_id']);
				}
				
				$this->db->join('user_posts','user_posts.post_id=history.post_id');
				$this->db->select('user_posts.url,user_posts.category,history.*');
				
				$this->db->join('user','user.uid=history.uid');
				$this->db->select('user.uname,history.*');
				
				$this->db->where_in('history.post_id',$a);
				$qry=$this->db->get('history');
				//print_r($qry->result_array()); die;
				return $qry->result_array();
			}
		}
		
		//Daily logs
		function daily_logs($data)
		{ 
			if(!empty($data)){
				$a=array();
				foreach($data as $d)
				{
					array_push($a,$d['post_id']);
				}
				
				$this->db->join('user_posts','user_posts.post_id=history.post_id');
				$this->db->select('user_posts.url,user_posts.category,history.*');
				
				$this->db->join('user','user.uid=history.uid');
				$this->db->select('user.uname,history.*');
				$this->db->where_in('history.post_id',$a);
				$this->db->like('time',date('Y-m-d'));
				$qry=$this->db->get('history');
				return $qry->result_array();
			}
		}
		
		function all_post_view($data){
			 
			if(!empty($data)){
				$a=array();
				foreach($data as $d)
				{
					array_push($a,$d['post_id']);
				}
				
				
				$this->db->where_in('post_id',$a);
				$qry=$this->db->get('user_posts');
				//print_r($qry->result_array()); die;
				return $qry->result_array();
			}
			
		}
		
		function get_viewer_count($id){
			$this->db->where('post_id',$id);
			$qry=$this->db->get('history');
			return $qry->num_rows();
		}
		
		//Click Count
		function click_count_site($data)
		{ 
			$a=array();
			$t=array();
			$new_arr=array();
			foreach($data as $d)
			{
				$t=array('pid'=>$d['post_id'],'total_clicks'=>$d['total_clicks'],'url'=>$d['url']);
				array_push($a,$t);
			}
			
			
			foreach($a as $h)
			{
				$this->db->where('post_id',$h['pid']);
				$qry=$this->db->get('history');
				$cnt=$qry->num_rows();
				
				$ar=array('click'=>$cnt,'total_clicks'=>$h['total_clicks'],'url'=>$h['url']);
				array_push($new_arr,$ar);
				//echo "<br> pid=".$h." and clicked = ".$cnt;
			
			}
			
			return $new_arr;
			
		}
		
		function add_notification($uid="",$cat="",$u="")
		{
				if($cat=="balance"){
					$noti_msg="Insufficient Balance !! Please buy or earn credits to make your posts visible !!";
					$noti_arr=array('uid'=>$uid,'category'=>$cat,'msg'=>$noti_msg,'status'=>'pending');
				}
				elseif($cat=="daily_click"){
					$noti_msg="Your daily click limit is over for ".$u;
					$noti_arr=array('uid'=>$uid,'category'=>$cat,'msg'=>$noti_msg,'status'=>'pending');
				}
				elseif($cat=="total_click"){
					$noti_msg="Your total click limit is over for ".$u;
					$noti_arr=array('uid'=>$uid,'category'=>$cat,'msg'=>$noti_msg,'status'=>'pending');
				}
				
				$this->db->insert('notification',$noti_arr);
		}
		
		function get_notification()
		{
			$sid=$this->session->userdata('user');
			$this->db->where('uid',$sid);
			$this->db->order_by('time','desc');
			$data=$this->db->get('notification');
			return $data->result_array();
			
		}
		
		function get_noti_status()
		{
			$sid=$this->session->userdata('user');
			$this->db->where('uid',$sid);
			$this->db->where('status',"pending");
			$data=$this->db->get('notification');
			return $data->num_rows();
		}
		
		function update_notification($f="")
		{
			$sid=$this->session->userdata('user');
			$this->db->where('uid',$sid);
			$this->db->where('status',"pending");
			$arr=array('status'=>'read');
			$data=$this->db->update('notification',$arr);
		}
		
		
		function get_packages($pid="")
		{
			if(!empty($pid))
			{
				$this->db->where('p_id',$pid);
				$qry=$this->db->get('packages');
				return $qry->row_array();
			}else
			{
				$qry=$this->db->get('packages');
				return $qry->result_array();
			}
		}
		
		
		function get_user_history(){
			header('Content-Type: application/json');
			$uid=$this->session->userdata('user');
			
			$qry1=$this->db->get('balance');
			$qry=$qry1->result_array();
			
			print json_encode($qry); 	
		}
		
		// get user purchase transaction
		function get_transaction(){
			$id=$this->session->userdata('user');
			$this->db->select('packages.price,transaction.*');
			$this->db->join('packages','packages.p_id=transaction.package_id');
			$this->db->where('u_id',$id);
			$qry=$this->db->get('transaction');	
			return $qry->result_array();
		}
		
		function get_print_data($id){
		
			$trans_id=$id;
		
			$this->db->select('packages.price,packages.image,transaction.*');
			$this->db->join('packages','packages.p_id=transaction.package_id');
			$this->db->where('t_id',$trans_id);
			$qry=$this->db->get('transaction');	
			
			//print_r($qry->row_array());die;
			return $qry->row_array();
		
		}
		
		function put_rating($arr){
			$this->db->insert('rating',$arr);
		}
		
		function get_rating(){
			$id=$this->session->userdata('user');
			$this->db->where('uid',$id);
			$qry=$this->db->get('rating');
			return $qry->num_rows();	
		}
		
		function get_rate(){
			$id=$this->session->userdata('user');
			$this->db->where('uid',$id);
			$qry=$this->db->get('rating');
			return $qry->row_array();	
		}
		
		function update_rating($arr){
			$id=$this->session->userdata('user');
			$this->db->where('uid',$id);
			$this->db->update('rating',$arr);
		}
		
		
	}	
	
	
?>