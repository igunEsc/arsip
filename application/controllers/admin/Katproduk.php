<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Katproduk extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('katproduk_model');
       
    }
    

	public function index(){

		$katproduk = $this->katproduk_model->listing();

		
		$data = array(	'title' 	=> 'Ketegori Produk',
						'isi' 		=> 'admin/katproduk/list',
						'katproduk' => $katproduk,
						'js'		=> 'admin/katproduk/js',
						'menu'		=> 'produk',
						'tag'		=> 'List'
						);

		$this->load->view('admin/layout/wrapper', $data);
	}


	public function tambah(){

		$valid = $this->form_validation;
		

		$valid->set_rules('nama','Nama Katproduk','required|is_unique[katproduk.nama]',
			array('required'	=> 'Nama Katproduk Harus di isi',
				  'is_unique'	=> 'Oooops, <strong>'.
				  					$this->input->post('nama').
				  					'</strong> sudah ditambahkan...!'));

		if ($valid->run()===FALSE) {
			// end validasi
		
			$data = array(	'title' 	=> 'Ketegori Produk',
							'isi' 		=> 'admin/katproduk/tambah',
							'js'		=> '',
							'menu'		=> 'produk',
							'tag'		=> 'Tambah'
							);

			$this->load->view('admin/layout/wrapper', $data);
		}else{
			$i = $this->input;
			$data = array(	'nama'			=> $i->post('nama'));
			$this->katproduk_model->tambah($data);
			$this->session->set_flashdata('sukses','<strong>SUKSES...!!!</strong> Nama Kategori telah di tambah');
			redirect(base_url('admin/katproduk'));
		}
	}


	public function edit($id){
		$valid = $this->form_validation;
		

		$valid->set_rules('nama','Nama Katproduk','required|is_unique[katproduk.nama]',
			array('required'	=> 'Nama Katproduk Harus di isi',
				  'is_unique'	=> 'Oooops, <strong>'.
				  					$this->input->post('nama').
				  					'</strong> sudah ada...!'));

		if ($valid->run()===FALSE) {
			// end validasi

		$katproduk = $this->katproduk_model->detail($id);
	
		$data = array(	'title' 	=> 'Edit Kategori Produk', 
						'katproduk' => $katproduk,
						'tag'		=> 'Edit',
						'js'		=> '',
						'menu'		=> 'produk',
						'isi' 		=> 'admin/katproduk/edit');
		$this->load->view('admin/layout/wrapper', $data);
		
		}else{
			$i = $this->input;
			$data = array(	'id'			=> $id,
							'nama'			=> $i->post('nama'));
			$this->katproduk_model->edit($data);
			$this->session->set_flashdata('sukses','<strong>SUKSES...!!!</strong> Nama Kategori berhasil di update');
			redirect(base_url('admin/katproduk'));
		}
	}


	//del
	public function del($id) {
		$data = array('id' => $id);
		$this->katproduk_model->del($data);
		$this->session->set_flashdata('sukses','<strong>SUKSES...!!!</strong> Kategori telah di hapus');
		redirect(base_url('admin/katproduk'));
	}

	
}