<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('UserModel');
	}

	public function index()
	{
		$this->load->view('login');
	}
	
	public function verify()
	{
		// receiving the username & password here
		$us = $this->input->post('username');
		$pass = $this->input->post('pass');
		
		//$this->session->set_userdata('username', $us);
		$this->session->set_flashdata('username', $us);
		
		$res = $this->UserModel->get($us, $pass);
		
		//echo $res['status'];
		
		if($res['status'] == 'valid'){
			 redirect('dashboard', 'refresh');
			 //echo ' xx ' . $this->session->userdata('username');
			 //$this->load->view('dashboard', $data);
		}else{
			echo "invalid login <br><a href='/' >Back...</a>";
			
		}
	}
	
	public function register()
	{
		// receiving the username, password, and email here
		$us = $this->input->post('username');
		$pass = $this->input->post('pass');
		$em = $this->input->post('email');
		
		$res = $this->UserModel->add($us, $pass, $em);
		
		$params = 'email=' . $em . '&title=registration';
		
		echo "registering! Please check your email...</br>";
		//var_dump($res);
		
		set_time_limit(600);
		// 1.call email here
		$payload = file_get_contents('https://fgroupindonesia.com/email/sending.php?'.$params);
		
		// 2.call timeout 3 seconds redirect
		echo '<meta http-equiv="refresh" content="3; url=http://fbuilder.fgroupindonesia.com" />';
	}
	
}
