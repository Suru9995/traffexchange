<?php
class Admin extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('admin/Admin_model');
		if($this->session->userdata('admin')==''){
			redirect('admin/Login');	
		}
	}
	
	function index()
	{
		$id=$this->session->userdata('admin');
		$qry['data']=$this->Admin_model->admin_record($id);
		
		if($this->input->post()){
		
			$this->form_validation->set_rules('name','Name','required|alpha');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('password','Password','required|min_length[8]');
			
			if($_FILES['image']['name']=='')
			{
				$qry['file_error']="Please Select Image";
			}
			
			if($this->form_validation->run() == FALSE)
			{
				
			}else
			{	
			
			
				$name=$this->input->post('name');
				$email=$this->input->post('email');
				$password=$this->input->post('password');
				$arr=array('name'=>$name,'email'=>$email,'password'=>$password);
				 
				 $config['upload_path'] = './assets/admin/images';
				 $config['allowed_types']= 'gif|jpg|png';
				 $this->load->library('upload',$config);
				 
				if($this->upload->do_upload('image')){
					$arr['image']=$this->upload->data('file_name');
					
				}
				
				$this->Admin_model->insert($arr);
			}
		}
		$this->load->view('admin/form',$qry);
	
	}
		
	function view_admin()
	{
		$arr['record']=$this->Admin_model->view_record();
		
		$this->load->view('admin/viewadmin',$arr);
	}
	
	function del_admin($id=''){
		
		$sid=$this->session->userdata('admin');
		if($sid!=$id){
			$data=$this->Admin_model->admin_record($id);
			unlink('./assets/admin/images/'.$data['image']);
			$this->Admin_model->del_admin($id);	
		}
		else {
			$id=$this->session->userdata('admin');
			$arr['data']=$this->Admin_model->admin_record($id);
			$arr['record']=$this->Admin_model->view_record();
			$arr['admin_msg']='You are Current logged in !!';
			$this->load->view('admin/viewadmin',$arr);	
		}
	}
	
	function update($id=''){
		
			
		$data= $this->Admin_model->get_admin($id);
		
		if($this->input->post()){
			
			$this->form_validation->set_rules('name','Name','required|alpha');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('password','Password','required|min_length[8]');
			

			if($this->form_validation->run() == FALSE)
			{
				
			}else
			{	
			
				$name=$this->input->post('name');
				$email=$this->input->post('email');
				$password=$this->input->post('password');
				$img=$this->Admin_model->admin_record($id);
				$arr=array('name'=>$name,'email'=>$email,'password'=>$password);
				
				if($_FILES['image']['name']=="")
				{
					$this->Admin_model->update($arr);
				}else
				{
					 $config['upload_path'] = './assets/admin/images';
					 $config['allowed_types']= 'gif|jpg|png';
					 $this->load->library('upload',$config);
					 
					if($this->upload->do_upload('image'))
					{
						unlink('./assets/admin/images/'.$img['image']);
						$arr['image']=$this->upload->data('file_name');
						
					}
					$this->Admin_model->update($arr);
				}
				
				
			}
		}
		
			$this->load->view('admin/form',$data);
		
	}
	
}
?>