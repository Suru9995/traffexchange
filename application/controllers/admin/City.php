<?php
class City extends CI_Controller
{
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('admin')==''){
			redirect('admin/Login');
		}			 	
	}
	
	function index()
	{	
		$arr['state_id']=$this->City_model->get_sid();
		$this->load->view('admin/city',$arr);
		if($this->input->post())
		{
			$stateid=$this->input->post('stateid');	
			$cityname=$this->input->post('cityname');	
			$c_array=array('s_id'=>$stateid,'name'=>$cityname);
			$this->City_model->insert_city($c_array);
		}	
	}
	
	function view_city(){
		
		$arr['record']=$this->City_model->view_city();
		$arr['country']=$this->Country_model->view_country();
		$arr['state']=$this->State_model->view_state();
		$this->load->view('admin/view_city',$arr);	
	}
	
	function delete($id='')
	{
		$this->City_model->del_city($id);
		redirect('admin/City/view_city');
	}
	
	function update($id='')
	{
		$arr['update']=$this->City_model->get_city($id);
		$arr['state_id']=$this->City_model->get_sid();
		$this->load->view('admin/city',$arr);
		
		if($this->input->post())
		{
			$this->City_model->update_city($id);
		}
		
	}
	
	function ajax_country(){
		$arr['state']=$this->City_model->ajax_country();
		$this->load->view('admin/demo_ajax_cid',$arr);	
	}
	
	function ajax_state(){
		$arr['city']=$this->City_model->ajax_state();
		$this->load->view('admin/demo_ajax_city',$arr);	
	}
}
?>