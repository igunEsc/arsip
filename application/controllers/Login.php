<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	// index login
	public function index()
	{
		
		//validasi form
		$valid = $this->form_validation;

		$valid->set_rules('username','Username','required',
			array('required'	=> 'Username Harus di isi'));

		$valid->set_rules('password','Password','required',
			array('required'	=> 'Password Harus di isi'));

		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		
		

		if($valid->run()){
			$this->simple_login->login($username, $password,
				base_url('admin/umkm'), base_url('home/log'));
		}

		//end validasi

		$data = array('title' => 'Login Administrator' );
		$this->load->view('login/list',$data);
		
	}

	public function logout(){
		$this->simple_login->logout();
	}

	public function cek(){
		$this->simple_login->cek();
	}



}

