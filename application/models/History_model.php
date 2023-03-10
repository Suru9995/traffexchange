<?php
	
	class History_model extends CI_Model{
		
		function __construct(){
			parent::__construct();
			
		}
		
		
		function add_history($arr){
			$this->db->insert('history',$arr);
			
		}
	
				
		
	}	
	
	
?>