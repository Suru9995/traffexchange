<?php
class State extends CI_Controller
{
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('admin')==''){
			redirect('admin/Login');
		}			 	
	}
	
	function index()
	{	
		
		
		if($this->input->post())
		{
			
			$this->form_validation->set_rules('countryid','Country','required');
			$this->form_validation->set_rules('statename','State','required');
			
			if($this->form_validation->run() == FALSE)
			{
				$countryid=set_value('countryid');
				$statename=set_value('statename');
			}else
			{
				$countryid=$this->input->post('countryid');	
				$statename=$this->input->post('statename');	
				$c_array=array('c_id'=>$countryid,'name'=>$statename);
				$this->State_model->insert_state($c_array);
			}
			
			
		}
		
		$arr['country_id']=$this->State_model->get_cid();
		$this->load->view('admin/state',$arr);	
	}
	
	function view_state(){
		$arr['country']=$this->State_model->get_cid();	
		$arr['record']=$this->State_model->view_state();
		$this->load->view('admin/view_state',$arr);	
	}
	
	function delete($id='')
	{
		$this->State_model->del_state($id);
		redirect('admin/State/view_state');
	}
	
	function update($id='')
	{
		$arr=$this->State_model->get_state($id);
		
		
		
		if($this->input->post())
		{
			$this->form_validation->set_rules('countryid','Country','required');
			$this->form_validation->set_rules('statename','State','required');
			
			if($this->form_validation->run() == FALSE)
			{
				
			}else
			{
				$c_id=$this->input->post('countryid');
				$s_name=$this->input->post('statename');
				$arr=array('c_id'=>$c_id,'name'=>$s_name);
				$this->State_model->update_state($id,$arr);
			}
			
		}
		$this->load->view('admin/state',$arr);
		
	}
	
	function ajax_data(){
		$qry['ajax_state']=$this->State_model->ajax_state();
		$this->load->view('admin/demo_ajax_state',$qry);
		
	}
}
?>