<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('simple_login');
    }
    

	public function index(){
		$this->simple_login->akses_admin();
		$user = $this->user_model->listing();

		
		$data = array(	'title' 	=> 'Manajemen User',
						'isi' 		=> 'admin/user/list',
						'user' => $user,
						'menu'		=> 'admin',
						'js'		=> 'admin/user/js',
						'tag'		=> 'List'
						);

		$this->load->view('admin/layout/wrapper', $data);
	}

	



	public function tambah(){
		$this->simple_login->akses_admin();
		$valid = $this->form_validation;
		

		$valid->set_rules('username','Nama User','required|is_unique[user.username]',
			array('required'	=> 'Nama User Harus di isi',
				  'is_unique'	=> 'Oooops, Username <strong>'.
				  					$this->input->post('username').
				  					'</strong> sudah terdaftar...! Gunakan username yang lain!'));

		$valid->set_rules('password', 'Password', 'required|min_length[8]|max_length[32]',
                        array('required' => 'Password Minimal 8 karakter'));

         $valid->set_rules('passconf', 'Password Confirmation', 'required|matches[password]',
         				array('matches' => 'Password Anda Tidak Cocok, Silahkan ulangi Lagi'));

		if ($valid->run()===FALSE) {
			// end validasi
		
			$data = array(	'title' 	=> 'User',
							'isi' 		=> 'admin/user/tambah',
							'js'		=> '',
							'menu'		=> 'admin',
							'tag'		=> 'Tambah'
							);

			$this->load->view('admin/layout/wrapper', $data);
		}else{
			$i = $this->input;
			$data = array(	'nama'			=> $i->post('nama'),
							'username'		=> $i->post('username'),
							'password'		=> md5($i->post('password')),
							'level'			=> $i->post('level'),
						);

			$this->user_model->tambah($data);
			$this->session->set_flashdata('sukses','<strong>SUKSES...!!!</strong> User telah di tambah');
			redirect(base_url('admin/user'));
		}
	}


	public function edit($id){
		$this->simple_login->akses_admin();
		$user = $this->user_model->detail($id);
		$valid = $this->form_validation;
		
		$valid->set_rules('level','Nama User','required',
			array('required'	=> 'Level Harus di isi'));

		if ($valid->run()===FALSE) {
			// end validasi
		
			$data = array(	'title' 	=> 'User',
							'isi' 		=> 'admin/user/edit',
							'js'		=> '',
							'user'		=> $user,
							'menu'		=> 'admin',
							'tag'		=> 'Edit'
							);

			$this->load->view('admin/layout/wrapper', $data);
		}elseif($this->input->post('password')!=''){ //
			$val = $this->form_validation;

			$val->set_rules('password', 'Password', 'required|min_length[8]|max_length[32]',
                        array('required' => 'Password Minimal 8 karakter'));

       		$val->set_rules('passconf', 'Password Confirmation', 'required|matches[password]',
         				array('matches' => 'Password Anda Tidak Cocok, Silahkan ulangi Lagi',
         						'required'	=> 'Silahkan ulangi password anda'));

       		if ($val->run()===FALSE) {
			// end validasi
       			$user = $this->user_model->detail($id);
			
				$data = array(	'title' 	=> 'User',
								'isi' 		=> 'admin/user/edit',
								'user'		=> $user,
								'js'		=> '',
								'tag'		=> 'Edit',
								'menu'		=> 'admin'
								);

				$this->load->view('admin/layout/wrapper', $data);
			}else{

				$i = $this->input;
				$data = array(	'id'		=> $id,
								'nama'		=> $i->post('nama'),
								'password'	=> md5($i->post('password')),
								'level'		=> $i->post('level'),
							);

				$this->user_model->edit($data);
				$this->session->set_flashdata('sukses','<strong>SUKSES...!!!</strong> User telah di Update');
				redirect(base_url('admin/user'));
			}
		}elseif($this->input->post('passconf')!=''){
			$val = $this->form_validation;

       		$val->set_rules('passconf', 'Password Confirmation', 'matches[password]',
         				array('matches' => 'Password Anda Tidak Cocok, Silahkan ulangi'));

       		if ($val->run()===FALSE) {
			// end validasi
       			$user = $this->user_model->detail($id);
			
				$data = array(	'title' 	=> 'User',
								'isi' 		=> 'admin/user/edit',
								'user'		=> $user,
								'js'		=> '',
								'tag'		=> 'Edit',
								'menu'		=> 'admin'
								);

				$this->load->view('admin/layout/wrapper', $data);
			}
		}else{

			$i = $this->input;
			$data = array(	'id'	=> $id,
							'nama'	=> $i->post('nama'),
							'level'	=> $i->post('level'),
						);

			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses','<strong>SUKSES...!!!</strong> User telah di Update');
			redirect(base_url('admin/user'));
		}
		
	}
	


	//del
	public function del($id) {
		$this->simple_login->akses_admin();
		$data = array('id' => $id);
		$this->user_model->del($data);
		$this->session->set_flashdata('sukses','<strong>SUKSES...!!!</strong> User telah di hapus');
		redirect(base_url('admin/user'));
	}


	public function profile(){
		$username = $this->session->userdata('username');
		$user = $this->user_model->detail_username($username);
		$id = $user->id;
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama User','required',
			array('required'	=> 'Nama Harus di isi'));

		if ($valid->run()===FALSE) {
			// end validasi
		
			$data = array(	'title' 	=> 'Profile',
							'isi' 		=> 'admin/user/profile',
							'js'		=> '',
							'user'		=> $user,
							'menu'		=> 'admin',
							'tag'		=> 'Edit'
							);

			$this->load->view('admin/layout/wrapper', $data);
		}elseif($this->input->post('password')!=''){
			$val = $this->form_validation;

			$val->set_rules('password', 'Password', 'required|min_length[8]|max_length[32]',
                        array('required' => 'Password Minimal 8 karakter'));

       		$val->set_rules('passconf', 'Password Confirmation', 'required|matches[password]',
         				array('matches' => 'Password Anda Tidak Cocok, Silahkan ulangi Lagi',
         					'required'	=> 'Silahkan ulangi pasword anda!'));

       		if ($val->run()===FALSE) {
			// end validasi
       			$username = $this->session->userdata('username');
				$user = $this->user_model->detail_username($username);
			
				$data = array(	'title' 	=> 'User',
								'isi' 		=> 'admin/user/profile',
								'user'		=> $user,
								'js'		=> '',
								'tag'		=> 'Edit',
								'menu'		=> 'admin'
								);

				$this->load->view('admin/layout/wrapper', $data);
			}else{

				$i = $this->input;
				$data = array(	'id'		=> $id,
								'nama'		=> $i->post('nama'),
								'password'	=> md5($i->post('password')),
								'level'		=> $i->post('level'),
							);

				$this->user_model->edit($data);
				$this->session->set_flashdata('sukses','<p><strong>SUKSES...!!!</strong> Profile Berhasil di Update </p>');
				redirect(base_url('admin/user/profile'));
			}
		}elseif($this->input->post('passconf')!=''){
			$val = $this->form_validation;

       		$val->set_rules('passconf', 'Password Confirmation', 'matches[password]',
         				array('matches' => 'Password Anda Tidak Cocok, Silahkan ulangi'));

       		if ($val->run()===FALSE) {
			// end validasi
       			$user = $this->user_model->detail($id);
			
				$data = array(	'title' 	=> 'User',
								'isi' 		=> 'admin/user/profile',
								'user'		=> $user,
								'js'		=> '',
								'tag'		=> 'Edit',
								'menu'		=> 'admin'
								);

				$this->load->view('admin/layout/wrapper', $data);
			}
		}else{
			$i = $this->input;
			$data = array(	'id'	=> $id,
							'nama'	=> $i->post('nama'),
							'level'	=> $i->post('level'),
						);

			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses','<p><strong>SUKSES...!!!</strong> Profile Berhasil di Update </p>');
			redirect(base_url('admin/user/profile'));
		}
		
	}

	
}