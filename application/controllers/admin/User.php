<?php
class User extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('admin/Admin_model');
		if($this->session->userdata('admin')==''){
			redirect('admin/Login');	
		}
		$this->load->library('pagination');
	}
	
	function index()
	{
		
		$arr['countries']=$this->User_model->get_countries();
		if($this->input->post())
		{
			//Validations
			
			$this->form_validation->set_rules('name','Name','required|alpha');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('password','Password','required|min_length[8]');
			$this->form_validation->set_rules('gender','Gender','required');
			$this->form_validation->set_rules('country','Country','required');
			
			if($_FILES['image']['name']=='')
			{
				$arr['file_error']="Please Select Image";
			}
			
			if($this->form_validation->run() == FALSE)
			{
				
			}else
			{
				$status="";
				$name=$this->input->post('name');
				$email=$this->input->post('email');
				$password=$this->input->post('password');
				$country=$this->input->post('country');
				$gender=$this->input->post('gender');
				$status=$this->input->post('status');
				
				if($status!='Active'){ $status='Blocked'; }
				
				
				$arr=array('uname'=>$name,'email'=>$email,'password'=>$password,'country'=>$country,'gender'=>$gender,'status'=>$status);
				
				
				$config['upload_path']='./assets/user/image';
				$config['allowed_types']='jpg|gif|png|jpeg';
				$this->load->library('upload',$config);
				
				if($this->upload->do_upload('image'))
				{
					$arr['image']=$this->upload->data('file_name');
				}
				
				$this->User_model->insert($arr);
			}
			
		}
		
		$this->load->view('admin/add_user',$arr);
		
	}
	
	
	function user_status(){
		$id=$this->input->post('uid');
		$status=$this->input->post('status');
		$arr=array('status'=>$status);
		$this->User_model->update_status($id,$arr);
		redirect('admin/User/view_user');
	}

	
	function view_user()
	{
		$st=0;
		$pp=10;
		$s_val="";
	
		if($this->session->userdata('search_name'))
		{
			$s_val=$this->session->userdata('search_name');
		}
		
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li>';$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';$config['last_tag_close'] = '</li>';
		$config['prev_link'] = '<i class="fa fa-angle-left"></i>';$config['next_link'] = '<i class="fa fa-angle-right"></i>';
		$config['prev_tag_open'] = '<li>';$config['prev_tag_close'] = '</li>';		
		$config['next_tag_open'] = '<li>';$config['next_tag_close'] = '</li>';
		
		
		$config['base_url'] = site_url('/admin/User/view_user');
		$config['total_rows'] = $this->Admin_model->count_rows($s_val);
		$config['per_page'] = $pp;
		$this->pagination->initialize($config);
		$st=$this->uri->segment(4);
		
		$arr['record']=$this->User_model->view_record($pp,$st,$s_val);
		$this->load->view('admin/viewuser',$arr);
	}
	
	function name_search(){
		$st=0;
		$pp=10;
		$s_val="";
		
		if($this->input->post('sname')!='')
		{
			$s_val=$this->input->post('sname');
			$this->session->set_userdata('search_name',$s_val);
		}else
		{
			$this->session->unset_userdata('search_name');
		}
		
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li>';$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';$config['last_tag_close'] = '</li>';
		$config['prev_link'] = '<i class="fa fa-angle-left"></i>';$config['next_link'] = '<i class="fa fa-angle-right"></i>';
		$config['prev_tag_open'] = '<li>';$config['prev_tag_close'] = '</li>';		
		$config['next_tag_open'] = '<li>';$config['next_tag_close'] = '</li>';
		
		
		$config['base_url'] = site_url('/admin/User/view_user');
		$config['total_rows'] = $this->Admin_model->count_rows($s_val);
		$config['per_page'] = $pp;
		$this->pagination->initialize($config);
		$st=$this->uri->segment(4);
		
		
		$data['record']=$this->User_model->view_record($pp,$st,$s_val);	
		$this->load->view('admin/ajax_user_search',$data);
	}
	
	
	function delete($id='')
	{
		$data=$this->User_model->user_record($id);		
		unlink('./assets/user/image/'.$data['image']);
		$this->User_model->del_user($id);		
	}
	function update($id=''){
			
		$data=$this->User_model->User_record($id);
		if($this->input->post()){
			
			$this->form_validation->set_rules('name','Name','required|alpha');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('password','Password','required|min_length[8]');
			$this->form_validation->set_rules('gender','Gender','required');
			$this->form_validation->set_rules('country','Country','required');
			
			if($this->form_validation->run() == FALSE)
			{
				
			}else
			{
				$uname=$this->input->post('name');
				$email=$this->input->post('email');
				$password=$this->input->post('password');
				$country=$this->input->post('country');
				$gender=$this->input->post('gender');
				$status=$this->input->post('status');
				
				if($status!='Active'){ $status='Blocked'; }
				
				$arr=array('uname'=>$uname,'email'=>$email,'password'=>$password,'country'=>$country,'gender'=>$gender,'status'=>$status);
				
				
				if($_FILES['image']['name']=="")
				{
					$this->User_model->update($arr);
				}else
				{
					
					if($_FILES['image']['type']!="image/jpeg" &&
					$_FILES['image']['type']!="image/gif" &&
					$_FILES['image']['type']!="image/png")
					{
						$data['file_error']="Please select image only";
					}else
					{
						$config['upload_path']='./assets/user/image';
						$config['allowed_types']='jpg|gif|png|jpeg';
						$this->load->library('upload',$config);
						
						if($this->upload->do_upload('image'))
						{
							$arr['image']=$this->upload->data('file_name');
						}
						unlink('./assets/user/image/'.$data['image']);
						$this->User_model->update($arr);
					}
				}
				
			}
		}
		
		$this->load->view('admin/add_user',$data);
		
	}
	
	
	
	
	function user_balance(){
		$data['user_bal']=$this->User_model->get_user_balance();
		$this->load->view('admin/user_balance',$data);	
	}
	
	function user_posts(){
		
		$st=0;
		$pp=10;
		$c_val = '';
		if($this->session->userdata('cat')){
			$c_val = $this->session->userdata('cat');			
		}
		
		
		
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li>';$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';$config['last_tag_close'] = '</li>';
		$config['prev_link'] = '<i class="fa fa-angle-left"></i>';$config['next_link'] = '<i class="fa fa-angle-right"></i>';
		$config['prev_tag_open'] = '<li>';$config['prev_tag_close'] = '</li>';		
		$config['next_tag_open'] = '<li>';$config['next_tag_close'] = '</li>';
		
		
		$config['base_url'] = site_url('/admin/User/user_posts');
		$config['total_rows'] = $this->User_model->count_all_posts($c_val);
		$config['per_page'] = $pp;
		$this->pagination->initialize($config);
		$st=$this->uri->segment(4);
		
		$data['page_types']=$this->User_model->get_page_types();
		$data['user_post']=$this->User_model->get_all_post($st,$pp,$c_val);
		$this->load->view('admin/user_all_post',$data);	
	}
	
	function user_contact(){
		$data['user_contacts']=$this->User_model->get_all_contacts();
		$this->load->view('admin/user_contacts',$data);		
	}
	
	function del_contact($c_id){
		$this->User_model->delete_contact($c_id);
		redirect('admin/User/user_contact');
	}
	
	function search_category(){
		
		$st=0;
		$pp=10;
		$c_val='';
		
		if($this->input->post('s_category') ==''){
			$this->session->unset_userdata('cat');			
		}else{
			$c_val=$this->input->post('s_category');
			$this->session->set_userdata('cat',$c_val);
		}
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li>';$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';$config['last_tag_close'] = '</li>';
		$config['prev_link'] = '<i class="fa fa-angle-left"></i>';$config['next_link'] = '<i class="fa fa-angle-right"></i>';
		$config['prev_tag_open'] = '<li>';$config['prev_tag_close'] = '</li>';		
		$config['next_tag_open'] = '<li>';$config['next_tag_close'] = '</li>';
		
		
		$config['base_url'] = site_url('/admin/User/user_posts');
		$config['total_rows'] = $this->User_model->count_all_posts($c_val);
		$config['per_page'] = $pp;
		$this->pagination->initialize($config);
		$st=$this->uri->segment(4);
		
		$data['user_post']=$this->User_model->get_all_post($st,$pp,$c_val);	
		$this->load->view('admin/user_search_category',$data);
	}
	
	
	function user_balance_chart(){
		$this->load->view('admin/user_balance_chart');	
	}
	
	function get_user_his(){
			$this->User_model->get_user_history();
	}
	
	function user_rate(){
		$data['rating']=$this->User_model->get_rating();
		$this->load->view('admin/user_rate',$data);
			
	}
	
}
?>