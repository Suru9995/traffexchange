<?php
	class Home extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			if($this->session->userdata('user'))
			{
				redirect('User');
			}
		}
		
		function index(){
			$this->load->view('home_view');	
		}
		
		function login(){
			$msg=array();
			// for login
			if($this->input->post('login')){
				
				$this->form_validation->set_rules('username','User Email','required|valid_email');
				$this->form_validation->set_rules('password','Password','required');
				
				if($this->form_validation->run()==FALSE)
				{	
					
				}else{
					$msg['login_cnt']=$this->Home_model->user_login();
					$status=$this->Home_model->get_status();
					if($msg['login_cnt']==1){
						if($status['status']=="Active"){
							// Success Login
						
							$this->session->set_userdata('user',$status['uid']);
							redirect('User');
							
						}else {
							echo "<script>alert('You Are Blocked !!');</script>";		
						}
					}else {
						$msg["login_err"]="Invalid Email or Password !";	
					}
	
				}
				
			}
			// forgot password
			if($this->input->post('submit_email')) {
				$user_email=$this->input->post('email');
				$email_rec=$this->Home_model->get_login_data();	
				foreach($email_rec as $email_data) {
					if($user_email == $email_data['email']){
						$email_flag=1;	
						break;
					} else {
						$email_flag=0;	
					}
				}
				
				if($email_flag==1){
					// code for send password
					$otp=rand(100000,999999);
					$msg['pass_reset']=$this->pass_change($user_email,$otp);
				}
				else{
					$msg['email_fail']="Only Allowed Email which you Enter at signup Time !";
				}
			}
			$this->load->view('login_page',$msg);
		}	
		
		// Reset Password Via Email Login Time
		function pass_change($email,$otp){
				$this->load->library('email');
				$config['mailtype'] = 'text';
				$config['protocol'] = 'smtp';
				$config['smtp_host']='smtp.gmail.com';
				$config['smtp_user']='traffexchange11@gmail.com';
				$config['smtp_pass']='TRAFFEXCHANGE11';
				$config['smtp_port']=465;
				$config['smtp_timeout'] = 30;
				$config['smtp_crypto'] = 'ssl';
				$config['newline']="\r\n";
				$this->email->initialize($config);
				$this->email->from('traffexchange11@gmail.com');
				$this->email->to($email);
				$this->email->subject('Reset Your Password');
				$this->email->message("<font style='font-size:15px; color:red; background-color:skyblue;'>Your Temparary Password is : $otp . Login this temparary password and change your password in your profile !</font>");
				
				if($this->email->send()){
					$this->Home_model->update_pass($email,$otp);
					$msg="Your Password Reset Send You via Email Login using That password And change it after login";
					
				}else {
					show_error($this->email->print_debugger());	
					$msg='';
				}
				return $msg;
			}
		
		
		// welcome email
		
		function welcome_email($email){
			
				$this->load->library('email');
				$config['mailtype'] = 'text';
				$config['protocol'] = 'smtp';
				$config['smtp_host']='smtp.gmail.com';
				$config['smtp_user']='traffexchange1@gmail.com';
				$config['smtp_pass']='Traffexchange1';
				$config['smtp_port']=465;
				$config['smtp_timeout'] = 30;
				$config['smtp_crypto'] = 'ssl';
				$config['newline']="\r\n";
				$this->email->initialize($config);
				$this->email->from('traffexchange1@gmail.com');
				$this->email->to($email);
				$this->email->subject('Welcome To TraffExchange');
				$this->email->message("Congratulations You are now member of TraffExchnage Family. Enjoy our services. now you get 50 credits free for add your social accounts and make visible to other TraffExchange users. For more login and read Welcome Page.");
				
				if($this->email->send()){
					$msg="Welcome User";
				}else {
					show_error($this->email->print_debugger());	
					$msg='Error sending Email .';
				}	
		}
		
		
		// signup function
		
		function register(){
			$flag_email=0;
			$msg=array();
			$msg['country']=$this->Home_model->get_country();
			
			if($this->input->post('register'))
			{
				$this->form_validation->set_rules('name','Username','required');
				$this->form_validation->set_rules('email','Email','required|valid_email');
				$this->form_validation->set_rules('password','Password','required|min_length[8]|max_length[12]');
				$this->form_validation->set_rules('confpassword','Confirm Password','required|matches[password]');
				$this->form_validation->set_rules('gender','Gender','required');
				$this->form_validation->set_rules('country','Country','required');
				
				
				if($this->form_validation->run()==FALSE)
				{	
					
				}else{
				
					
					$name=$this->input->post('name');
					$email=$this->input->post('email');	
					$pass=$this->input->post('password');
					$gender=$this->input->post('gender');
					$country=$this->input->post('country');
					$status="Active";
					
					$config['upload_path'] = './assets/user/image/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['file_name']="user".time().$_FILES['image']['name'];
					$this->load->library('upload', $config);
					
					// check uniq email
					$mails=$this->Home_model->get_emails();
					
					foreach($mails as $emails){
							if($emails['email']==$email){
								$flag_email=1;	
								}
							}
					
					if($flag_email!=1){
						
						if($this->upload->do_upload('image')){
							$image=$this->upload->data('file_name');
							$arr=array('uname'=>$name,'email'=>$email,'password'=>$pass,'gender'=>$gender,'country'=>$country,'status'=>$status,'image'=>$image);
							$this->Home_model->insert_user($arr);
	
										$e=$this->Home_model->get_status2($email);
										$arr2=array('uid'=>$e['uid'],'balance'=>50);
										$this->User_data_model->add_balance($arr2,$e['uid']);
										$this->welcome_email($email);
										redirect('Home/login');
								
							}
									
						else {
							// user not select image
							$msg['file_err'] = 'Please Select Image !';
						}
					}
					else {
							$msg['email_err']="Email Already Exists !";	
					}	
					
				}
		}
			$this->load->view('register',$msg);
		}
		
		
		
		function contact_us()
		{
			
			if($this->input->post('send'))
			{
				
				$this->form_validation->set_rules('name','Name','required');
				$this->form_validation->set_rules('email','Email','required|valid_email');
				$this->form_validation->set_rules('type','Category','required');
				$this->form_validation->set_rules('message','Message','required|min_length[10]');
				if($this->form_validation->run() == FALSE){
					
				} else {
				
				$name=$this->input->post('name');
				$email=$this->input->post('email');
				$catagory=$this->input->post('type');
				$msg=$this->input->post('message');
				
				$arr=array('name'=>$name,'email'=>$email,'catagory'=>$catagory,'message'=>$msg);
				$this->Home_model->send_message($arr);
				
				}
			}	
			$this->load->view('contact_us');
		}
		
		function about_us()
		{
			$this->load->view('about_us');
		}
		
		function privacy_policy()
		{
			$this->load->view('privacy_policy');
		}
		
		function how_it_works()
		{
			$this->load->view('how_it_works');
		}
		
		function how_facebook()
		{
			$this->load->view('how_facebook');
		}
		
		function how_twitter()
		{
			$this->load->view('how_twitter');
		}
		
		function how_youtube()
		{
			$this->load->view('how_youtube');
		}
		
		function how_website()
		{
			$this->load->view('how_website');
		}
		
		function how_url()
		{
			$this->load->view('how_url');
		}
		
		function how_linkedin()
		{
			$this->load->view('how_linkedin');	
		}
		
	}
?>