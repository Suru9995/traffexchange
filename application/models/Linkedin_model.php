<?php
	
	class Linkedin_model extends CI_Model{
		
		function __construct(){
			parent::__construct();
			$this->load->database();	
			date_default_timezone_set("Asia/Kolkata");
		}
		
		
		function insert_linkedin_data($arr){
			//echo 'model <br>'; print_r($arr);
			$this->db->insert('social_accounts',$arr);
			
		}
		
		function get_data(){
			$id=$this->session->userdata('user');
			$this->db->where('user_id',$id);
			$this->db->where('social_type','linkedin');
			$qry=$this->db->get('social_accounts');	
			return $qry->num_rows();
		}
		
		function update_linkedin_data($arr){
			//echo 'model <br>'; print_r($arr);
			$id=$this->session->userdata('user');
			$this->db->where('user_id',$id);
			$this->db->where('social_type','linkedin');
			$this->db->update('social_accounts',$arr);
			
		}
		
		function get_profile(){
			$id=$this->session->userdata('user');
			$this->db->where('user_id',$id);
			$this->db->where('social_type','linkedin');
			$qry=$this->db->get('social_accounts');
			//print_r($qry->row_array()); die;
			return $qry->row_array();		
		}
		
		// get posts to post on linkedin post
		
		function get_posts(){
			
		
			$history=array();
			$posts=array();
			$s=$this->session->userdata('user');
			
			// select viewer Balance
			$this->db->where('uid',$s);
			$usr=$this->db->get('balance');
			$usr_bal=$usr->row_array();
			$bal_usr=$usr_bal['balance'];
			
			
			//select history
			$this->db->where('uid',$s);
			$his=$this->db->get('history');
			$history=$his->result_array();
		
			// select urls for view
			$this->db->where_not_in('uid',$s);
			$this->db->where_not_in('status','deactive');
			$this->db->where('category','linkedin post');	
			$qry=$this->db->get('user_posts');
			$posts=$qry->result_array();
			
						
			$site=array();
			if(!empty($history))
			{
				foreach($posts as $p)
				{ $f=0;
				
					// $dac is daily click for post	
					$dac=$this->count_today_click($p['post_id']);	
					
					//$tc is total click
					$tc=$this->count_all_click($p['post_id']);
					
					foreach($history as $h)
					{
						
						if($p['post_id']==$h['post_id'] && $s==$h['uid'])
						{
									$f=1;
									break;
						}
											
						if($p['daily_clicks']==$dac || $tc==$p['total_clicks'])
						{
									$f=1;
									break;
						}
						
					}
					if($f==1){continue;}
							
							// select owner balance
							$this->db->where('uid',@$p['uid']);
							$own=$this->db->get('balance');
							$own_bal=$own->row_array();
							$bal_own=$own_bal['balance'];
							if($p['cpc']>$bal_own){
								
								$noti_msg="Insufficient Balance !! Please buy or earn credits to make your posts visible !!";
								$uid=$p['uid'];
								$noti_arr=array('uid'=>$uid,'msg'=>$noti_msg);
								continue;}
							
					
					$site=array('post_id'=>$p['post_id'],'url'=>$p['url'],'cpc'=>$p['cpc'],'uid'=>$p['uid'],'msg'=>'after checked history');
					break;
				}
			}elseif(empty($history))
			{
				foreach($posts as $p)
				{
					$site=array('post_id'=>$p['post_id'],'url'=>$p['url'],'cpc'=>$p['cpc'],'uid'=>$p['uid'],'msg'=>'empty history');
					break;
				}
			}
			if(@$noti_arr)
			{
				$this->db->insert('notification',$noti_arr);
			}
			return $site;
			
		}
		
		// linkedin follows
		
		function get_post_follow(){
			
			$history=array();
			$posts=array();
			$s=$this->session->userdata('user');
			
			// select viewer Balance
			$this->db->where('uid',$s);
			$usr=$this->db->get('balance');
			$usr_bal=$usr->row_array();
			$bal_usr=$usr_bal['balance'];
			
			//select history
			$this->db->where('uid',$s);
			$his=$this->db->get('history');
			$history=$his->result_array();
		
			// select urls for view
			$this->db->where_not_in('uid',$s);
			$this->db->where_not_in('status','deactive');
			$this->db->where('category','linkedin company follow');	
			$qry=$this->db->get('user_posts');
			$posts=$qry->result_array();
			
			$site=array();
			if(!empty($history))
			{
				foreach($posts as $p)
				{ $f=0;
				
					// $dac is daily click for post	
					$dac=$this->count_today_click($p['post_id']);	
					
					//$tc is total click
					$tc=$this->count_all_click($p['post_id']);
					
					foreach($history as $h)
					{
						
						if($p['post_id']==$h['post_id'] && $s==$h['uid'])
						{
									$f=1;
									break;
						}
											
						if($p['daily_clicks']==$dac || $tc==$p['total_clicks'])
						{
									$f=1;
									break;
						}
						
					}
					if($f==1){continue;}
							
							// select owner balance
							$this->db->where('uid',@$p['uid']);
							$own=$this->db->get('balance');
							$own_bal=$own->row_array();
							$bal_own=$own_bal['balance'];
							if($p['cpc']>$bal_own){
								
								$noti_msg="Insufficient Balance !! Please buy or earn credits to make your posts visible !!";
								$uid=$p['uid'];
								$noti_arr=array('uid'=>$uid,'msg'=>$noti_msg);
								continue;}
							
					
					$site=array('post_id'=>$p['post_id'],'url'=>$p['url'],'cpc'=>$p['cpc'],'uid'=>$p['uid'],'msg'=>'after checked history');
					break;
				}
			}elseif(empty($history))
			{
				foreach($posts as $p)
				{
					$site=array('post_id'=>$p['post_id'],'url'=>$p['url'],'cpc'=>$p['cpc'],'uid'=>$p['uid'],'msg'=>'empty history');
					break;
				}
			}
			if(@$noti_arr)
			{
				$this->db->insert('notification',$noti_arr);
			}
			return $site;
			
		
				
		}
		
		// Count Daily Click of post
		function count_today_click($pid)
		{
			$t=date('Y-m-d');
			$this->db->like('time',$t);
			$this->db->where('post_id',$pid);
			$h=$this->db->get('history');
			return $h->num_rows(); 
		}
		
		//count total click of post
		function count_all_click($pid)
		{
			$this->db->where('post_id',$pid);
			$h=$this->db->get('history');
			return $h->num_rows(); 
		}
		
	}		
?>