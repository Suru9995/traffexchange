<?php
class Dashboard extends CI_Controller
{
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('admin')==''){
			redirect('admin/Login');
		}	
		$this->load->model('admin/Country_model');
		$this->load->library('pagination');
	}
	
	function index()
	{
		$users_cnt = $this->db->get('user')->num_rows();
		$data['users'] = $users_cnt;	
		$pages_cnt = $this->db->get('user_posts')->num_rows();
		$data['pages_cnt'] = $pages_cnt;	
		$page_types = $this->db->get('page_types')->num_rows();
		$data['pages_types'] = $page_types;
		$this->db->select('sum(packages.price) as total');
		$this->db->join('packages','packages.p_id=transaction.package_id');
		$earning = $this->db->get('transaction')->row_array();
		$data['earning'] = $earning['total'];	
		$this->load->view('admin/dashboard',$data);
	}
	
	function sign_out(){
		$this->session->unset_userdata('admin');
		redirect('admin/Login');
	}
	
	function add_page(){
		$this->load->view('admin/add_page');
		if($this->input->post()){
			$page=$this->input->post('page_title');
			$arr=array('page_title'=>$page);
			$this->Admin_model->add_page($arr);
		}
	}
	
	function view_page(){
		$arr['record']=$this->Admin_model->view_page();
		$this->load->view('admin/view_page',$arr);
	}	
	
	function del_page($id=''){
		$this->Admin_model->delete_page($id);
		redirect('admin/Dashboard/view_page');
	}
	
	function update_page($id=''){
		$arr['update_rec']=$this->Admin_model->select_page($id);
		$this->load->view('admin/add_page',$arr);
		
		if($this->input->post()){
			$page=$this->input->post('page_title');
			$arr=array('page_title'=>$page);
			$this->Admin_model->update_page($id,$arr);
		}
	}
	
	function add_package(){
		$msg=array();
		if($this->input->post('submit')){
			
			$this->form_validation->set_rules('package_name','Package Name','required');
			$this->form_validation->set_rules('package_point','Package Point','required');
			$this->form_validation->set_rules('package_price','Package Price','required');
			$this->form_validation->set_rules('package_desc','Package Description','required');
			$this->form_validation->set_rules('package_color','Package Color','required');
			
			if($this->form_validation->run()==FALSE)
			{
				if(@form_error('package_name'))
				{
					$msg['name_err']=form_error('package_name');
				}
				elseif(@form_error('package_point'))
				{
					$msg['point_err']=form_error('package_point');
				}
				elseif(@form_error('package_price'))
				{
					$msg['price_err']=form_error('package_price');
				}
				elseif(@form_error('package_desc'))
				{
					$msg['desc_err']=form_error('package_desc');
				}
				elseif(@form_error('package_color'))
				{
					$msg['color_err']=form_error('package_color');
				}
				
			}else
			{
			
				$pname=$this->input->post('package_name');
				$point=$this->input->post('package_point');
				$price=$this->input->post('package_price');
				$desc=$this->input->post('package_desc');
				$color=$this->input->post('package_color');
				
				$config['upload_path'] = './assets/image/';
				$config['allowed_types']= 'gif|jpg|png|jpeg';
				$config['file_name']=$pname.time().$_FILES['package_image']['name'];
				$this->load->library('upload', $config);
				
				if($this->upload->do_upload('package_image'))
				{
					$image=$this->upload->data('file_name');
					$arr=array('package_name'=>$pname,'point'=>$point,'price'=>$price,'description'=>$desc,'image'=>$image,'color'=>$color);
					$this->Admin_model->add_package($arr);
					redirect('admin/Dashboard/view_packages');
				}else
				{
					$msg['img_err']="Please Select Image";
				}
				
				
			}
		}
			$this->load->view('admin/add_package',$msg);
	}
	
	function view_packages(){
		$data['rec']=$this->Admin_model->sel_packages();	
		$this->load->view('admin/view_package',$data);
	}	
	
	function del_package($id=''){
		$msg['up_rec']=$this->Admin_model->sel_package($id);
		$del=$msg['up_rec']['image'];
		unlink('./assets/image/'.$del);
		$this->Admin_model->del_package($id);
	}
	
	function update_package($id=''){
	
			$msg['up_rec']=$this->Admin_model->sel_package($id);		
			
		if($this->input->post()){
			
			$this->form_validation->set_rules('package_name','Package Name','required');
			$this->form_validation->set_rules('package_point','Package Point','required');
			$this->form_validation->set_rules('package_price','Package Price','required');
			$this->form_validation->set_rules('package_desc','Package Description','required');
			$this->form_validation->set_rules('package_color','Package Color','required');
			
			if($this->form_validation->run()==FALSE)
			{
				if(@form_error('package_name'))
				{
					$msg['name_err']=form_error('package_name');
				}
				elseif(@form_error('package_point'))
				{
					$msg['point_err']=form_error('package_point');
				}
				elseif(@form_error('package_price'))
				{
					$msg['price_err']=form_error('package_price');
				}
				elseif(@form_error('package_desc'))
				{
					$msg['desc_err']=form_error('package_desc');
				}
				elseif(@form_error('package_color'))
				{
					$msg['color_err']=form_error('package_color');
				}
				
			}else
			{
			
				$pname=$this->input->post('package_name');
				$point=$this->input->post('package_point');
				$price=$this->input->post('package_price');
				$desc=$this->input->post('package_desc');
				$color=$this->input->post('package_color');
				
				$config['upload_path'] = './assets/image/';
				$config['allowed_types']= 'gif|jpg|png|jpeg';
				$config['file_name']=$pname.time().$_FILES['package_image']['name'];
				$this->load->library('upload', $config);
				
				if($this->upload->do_upload('package_image'))
				{
					$del=$msg['up_rec']['image'];
					unlink('./assets/image/'.$del);
					
					$image=$this->upload->data('file_name');
					$arr=array('package_name'=>$pname,'point'=>$point,'price'=>$price,'description'=>$desc,'image'=>$image,'color'=>$color);
					$this->Admin_model->update_package($arr,$id);
					redirect('admin/Dashboard/view_packages');
				}else
				{
					$arr=array('package_name'=>$pname,'point'=>$point,'price'=>$price,'description'=>$desc,'color'=>$color);
					$this->Admin_model->update_package($arr,$id);
					redirect('admin/Dashboard/view_packages');
				}
				
				
			}
		}

		$this->load->view('admin/add_package',$msg);
	}
	
	
	function view_history()
	{
		$st=0;
		$pp=15;
		
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
		
		$config['base_url'] = site_url('admin/Dashboard/view_history');
		$config['total_rows'] = $this->Admin_model->tot_his();
		$config['per_page'] = $pp;
		$this->pagination->initialize($config);
		$st=$this->uri->segment(4);
		
		$data['record']=$this->Admin_model->view_history($pp,$st);
		$this->load->view('admin/view_history',$data);
	}
	
	function del_history()
	{
		$did=$this->uri->segment(4);
		$this->Admin_model->del_history($did);
		redirect('admin/Dashboard/view_history');
	}

	
}
?>