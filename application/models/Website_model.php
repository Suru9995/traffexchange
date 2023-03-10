<?php
	
	class Website_model extends CI_Model{
		
		function __construct(){
			parent::__construct();
			$this->load->database();	
			date_default_timezone_set("Asia/Kolkata");
		}
		
		
		function get_sites(){
		
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
			$this->db->where('category','website hits');	
			$qry=$this->db->get('user_posts');
			$posts=$qry->result_array();
			
			$cur_date=date('Y-m-d');
						
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
						
						$t=$h['time'];
						$t=substr($t,0,10);	
					
					
						if($p['post_id']==$h['post_id'] && $s==$h['uid'] && $t==$cur_date)
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