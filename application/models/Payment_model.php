<?php
	
	class Payment_model extends CI_Model{
		
		function __construct(){
			parent::__construct();
		}
		
		function add_balance($arr_bal=array())
		{
			$bal=array();
			$bal=$this->User_data_model->get_balance();
			$cur_bal=$bal['balance'];
			$add_bal=$arr_bal['point'];
			
			$new_bal=$cur_bal + $add_bal;
			$new_arr=array('balance'=>$new_bal);
			$this->User_data_model->update_balance($new_arr);
		}
		
		function add_transaction($transaction_array){
			$this->db->insert('transaction',$transaction_array);	
		}
	
	}
?>