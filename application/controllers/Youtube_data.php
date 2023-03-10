<?php

class Youtube_data extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('user'))
		{
			redirect('Home/login');
		}
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	function yt_likes()
	{
		$this->load->view('yt_likes');
	}

	function yt_views()
	{
		$data['yt_view']=$this->Youtube_model->get_videos();
		$this->load->view('yt_views',$data);
	}


}
