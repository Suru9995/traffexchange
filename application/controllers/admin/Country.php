<?php
class Country extends CI_Controller
{
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('admin')==''){
			redirect('admin/Login');
		}	
		
		 	
	}
	
	function index()
	{	
		$this->load->view('admin/country');
		if($this->input->post()){
			$countryname=$this->input->post('countryname');	
			$c_array=array('name'=>$countryname);
			$this->Country_model->insert_country($c_array);
		}	
		
	}
	
	
	function view_country(){
		$arr['record']=$this->Country_model->view_country();
		$this->load->view('admin/view_country',$arr);
	}
	
	/*function add_state(){
		$this->load->view('admin/state',$arr);
		
		if($this->input->post()){
			$countryid=$this->input->post('countryid');
			$countryname=$this->input->post('countryname');	
			$c_array=array('c_id'=>$countryid,'name'=>$countryname);
			$this->Country_model->insert_country($c_array);
		}	
	}*/
	
	function delete($id='')
	{
		$this->Country_model->del_country($id);
		redirect('admin/Country/view_country');
	}
	
	function update($id='')
	{
		$arr['update']=$this->Country_model->get_country($id);
		$this->load->view('admin/country',$arr);
		
		if($this->input->post())
		{
			$this->Country_model->update_country($id);
		}
		
	}
}
?>