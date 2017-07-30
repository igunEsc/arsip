<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login {
	
	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}
	
	// Login
	public function login($username, $password) {
		// Query untuk pencocokan data
		$query = $this->CI->db->get_where('user', array(
										'username' => $username
										));

		$query2 = $this->CI->db->get_where('user', array(
										'username' => $username,
										'password' => $password
										));

		 // $data_username = $query->username;

				// Jika ada hasilnya
		if($query->num_rows() == 0) {
			$this->CI->session->set_flashdata('sukses','Oopss.. USERNAME Anda salahhh');
			redirect(base_url().'home/log');
		}elseif ($query2 ->num_rows() == 0) {
			$this->CI->session->set_flashdata('sukses','Oopss.. PASSWORD Anda salah');
			redirect(base_url().'home/log');
		} else {
			$admin 	= $query2->row();
			$id 	= $admin->id;
			$username 	= $admin->username;
			$nama	= $admin->nama;
			$level	= $admin->level;
			$seskod = '';


			// $_SESSION['username'] = $username;
			$this->CI->session->set_userdata('id', $id); 
			$this->CI->session->set_userdata('username', $username); 
			$this->CI->session->set_userdata('level', $level); 
			$this->CI->session->set_userdata('nama', $nama);
			$this->CI->session->set_userdata('seskod', $seskod); 
			//$this->CI->session->set_userdata('username_login', uniqusername(rand()));
			// Kalau benar di redirect	

			if($level == 'admin'){
				redirect(base_url('admin/umkm'));
			}
			elseif($level == 'guru'){
				redirect(base_url('user/dasbor'));
			}
			elseif($level == 'operator'){
				redirect(base_url('admin/umkm'));
			}
			elseif($level == 'operator_nonpeg'){
				redirect(base_url('admin/umkm'));
			}
			else {
				redirect(base_url('user/dasbor'));
			}		
			
		}
		return false;
	}
	
	// Cek login
	public function cek_login() {
		if($this->CI->session->userdata('username') == '' && 
		$this->CI->session->userdata('akses_level')=='') {
			$this->CI->session->set_flashdata('sukses','Oops...silakan login dulu');
			redirect(base_url('login'));
		}elseif($this->CI->session->userdata('username') != '' && 
		$this->CI->session->userdata('akses_level')!='') {
			redirect(base_url('admin/umkm'));
		}	
	}

	public function cek() {
		if($this->CI->session->userdata('username') == '' && 
		$this->CI->session->userdata('akses_level')=='') {
			redirect(base_url('login'));
		}elseif($this->CI->session->userdata('username') != '' ){
			redirect(base_url('admin/umkm'));
		}	
	}
	
	// Logout
	public function logout() {
		/*$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('akses_level');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('seskod');*/
		//$this->CI->session->unset_userdata('username_login');
		//$this->CI->session->unset_userdata('username');
		$this->CI->session->sess_destroy();
		//$this->CI->session->set_flashdata('sukses','Terimakasih, Anda berhasil logout');
		redirect(base_url().'home/log');
	}


	public function akses_admin() {
		if($this->CI->session->userdata('level')!='admin')
		{
			redirect(base_url().'admin/error');
		}
	} 
}