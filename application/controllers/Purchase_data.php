<?php

class Purchase_data extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('user'))
		{
			redirect('Home/login');
		}
	}
	
	function purchase()
	{
		if($this->input->post('checkout'))
			{
		
				$this->form_validation->set_rules('price','Price','required|numeric');
				$this->form_validation->set_rules('package_name','Package Name','required');
				$this->form_validation->set_rules('name','Name','required');
				$this->form_validation->set_rules('email','Email','required|valid_email');
				$this->form_validation->set_rules('mobile','Mobile','required|numeric|exact_length[10]');
				
				if($this->form_validation->run()==FALSE)
				{
					
				}else
				{
					//$price=$this->input->post('price');
					$price=1;
					$pname=$this->input->post('package_name');
					$name=$this->input->post('name');
					$email=$this->input->post('email');
					$mobile=$this->input->post('mobile');
					$point=$this->input->post('point');
					$p_id=$this->input->post('pid');
					$arr=array('p_id'=>$p_id,'price'=>$price,'package_name'=>$pname,'name'=>$name,'email'=>$email,'mobile'=>$mobile,'point'=>$point);
					$this->session->set_userdata('payment',$arr);
					
					redirect('Purchase_data/confirm');
				}
		
			}
			
		$pid= $this->uri->segment(3);
		$data['package']=$this->User_data_model->get_packages($pid);
		$data['info']=$this->User_data_model->get_userdata();
		$this->load->view('payment',$data);
	}
	
	function confirm()
	{
		
		$arr=$this->session->userdata('payment');

		$package=$arr['package_name'];
		$price=$arr['price'];
		$name=$arr['name'];
		$email=$arr['email'];
		$mobile=$arr['mobile'];;
		
			$MERCHANT_KEY = "qBiJUasW"; //change  merchant with yours
	        $SALT = "eSxBUJ4rID";  //change salt with yours 
		
			$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
	        //optional udf values 
	        $udf1 = '';
	        $udf2 = '';
	        $udf3 = '';
	        $udf4 = '';
	        $udf5 = '';
	        
	         $hashstring = $MERCHANT_KEY . '|' . $txnid . '|' . $price . '|' . $package . '|' . $name . '|' . $email . '|' . $udf1 . '|' . $udf2 . '|' . $udf3 . '|' . $udf4 . '|' . $udf5 . '||||||' . $SALT;
	         $hash = strtolower(hash('sha512', $hashstring));
						
						
			$success = site_url() . '/Purchase_data/success';  
	        $fail = site_url() . '/Purchase_data/fail';
	        $cancel = site_url() . '/Purchase_data/cancel';
			
			
			$data = array(
	            'mkey' => $MERCHANT_KEY,
	            'tid' => $txnid,
	            'hash' => $hash,
	            'amount' => $price,           
	            'name' => $name,
	            'productinfo' => $package,
	            'mailid' => $email,
	            'phoneno' => $mobile,
	            'action' => "https://sandboxsecure.payu.in", //for live change action  https://secure.payu.in
	            'success' => $success,
	            'failure' => $fail,
	            'cancel' => $cancel            
	        );
						
		
		$data['data']=$this->session->userdata('payment');
		$this->load->view('payment_confirm',$data);
	}
	
	
	function success()
	{
		$uid=$this->session->userdata('user');
		$arr=$this->session->userdata('payment');
		$this->Payment_model->add_balance($arr);
		$transaction_array=array('u_id'=>$uid,'package_id'=>$arr['p_id'],'package_name'=>$arr['package_name'],'uname'=>$arr['name'],'email'=>$arr['email'],'mobile'=>$arr['mobile'],'point'=>$arr['point']);
		$this->Payment_model->add_transaction($transaction_array);
		$this->session->unset_userdata('payment');
		redirect('User');
	}
	
	function fail()
	{
		echo "<script>alert('Failing Transaction Please Try Again');</script>";
		redirect('User');
	}
	
	function cancel()
	{
		echo "cancel";
	}
		
}
 ?>