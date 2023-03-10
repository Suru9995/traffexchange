<?php
	
	class Facebook_model extends CI_Model{
		
		function __construct(){
			parent::__construct();
			
		}
		
		
		function get_posts(){
			
			$history=array();
			$posts=array();
			
			$s=$this->session->userdata('user');
			
			$this->db->where('uid',$s);
			$his=$this->db->get('history');
			$history=$his->result_array();
			
			$this->db->where_not_in('uid',$s);
			$this->db->where_not_in('status','deactive');
			$this->db->where('category','facebook post');	
			$qry=$this->db->get('user_posts');
			$posts=$qry->result_array();
			
			$site=array();
			if(!empty($history))
			{
				foreach($posts as $p)
				{ $f=0;
					foreach($history as $h)
					{
						if($p['post_id']==$h['post_id'] && $s==$h['uid'])
						{
							$f=1;
							break;
						}
					}
					if($f==1){continue;}
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
			return $site;
		}
			
		
		function get_pages()
		{
		
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
			$this->db->where('category','facebook page');	
			$this->db->order_by('post_id','RANDOM');
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
							
					
					$site=array('post_id'=>$p['post_id'],'url'=>$p['url'],'social_data_id'=>$p['social_data_id'],'cpc'=>$p['cpc'],'uid'=>$p['uid'],'msg'=>'after checked history');
					break;
				}
			}elseif(empty($history))
			{
				foreach($posts as $p)
				{
					$site=array('post_id'=>$p['post_id'],'url'=>$p['url'],'cpc'=>$p['cpc'],'uid'=>$p['uid'],'msg'=>'empty history','social_data_id'=>$p['social_data_id']);
					break;
				}
			}
			if(@$noti_arr)
			{
				$this->db->insert('notification',$noti_arr);
			}
			return $site;
		}
			
		function get_shares(){
			
			$history=array();
			$posts=array();
			$s=$this->session->userdata('user');
			$this->db->where('uid',$s);
			$his=$this->db->get('history');
			$history=$his->result_array();
			
			$this->db->where_not_in('uid',$s);
			$this->db->where_not_in('status','deactive');
			$this->db->where('category','facebook share');	
			$qry=$this->db->get('user_posts');
			$posts=$qry->result_array();
			
			$site=array();
			if(!empty($history))
			{
				foreach($posts as $p)
				{ $f=0;
					foreach($history as $h)
					{
						if($p['post_id']==$h['post_id'] && $s==$h['uid'])
						{
							$f=1;
							break;
						}
					}
					if($f==1){continue;}
					$site=array('post_id'=>$p['post_id'],'url'=>$p['url'],'cpc'=>$p['cpc'],'uid'=>$p['uid'],'msg'=>'after checked history','social_data_id'=>@$p['social_data_id']);
					break;
				}
			}elseif(empty($history))
			{
				foreach($posts as $p)
				{
					$site=array('post_id'=>$p['post_id'],'url'=>$p['url'],'cpc'=>$p['cpc'],'uid'=>$p['uid'],'msg'=>'empty history','social_data_id'=>@$p['social_data_id']);
					break;
				}
			}
			return $site;
		}
			
			
		function insert_fb($arr){
			$this->db->insert('social_accounts',$arr);
		}
		
		function get_social_data()
		{
			$id=$this->session->userdata('user');
			$this->db->where('social_type','facebook');
			$this->db->where('user_id',$id);
			$qry=$this->db->get('social_accounts');	
			return $qry->num_rows();
		}
		
		function get_fb_data()
		{
			$id=$this->session->userdata('user');
			$this->db->where('social_type','facebook');
			$this->db->where('user_id',$id);
			$qry=$this->db->get('social_accounts');	
			return $qry->row_array();
		}
		
		
		function update_fb($arr)
		{
			$id=$this->session->userdata('user');
			$this->db->where('social_type','facebook');
			$this->db->where('user_id',$id);
			$this->db->update('social_accounts',$arr);
		}
		
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