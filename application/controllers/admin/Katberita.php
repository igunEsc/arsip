<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Katberita extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('katberita_model');
       
    }
    

	public function index(){

		$katberita = $this->katberita_model->listing();

		
		$data = array(	'title' 	=> 'Ketegori Berita',
						'isi' 		=> 'admin/katberita/list',
						'katberita' => $katberita,
						'js'		=> 'admin/katberita/js',
						'menu'		=> 'berita',
						'tag'		=> 'List'
						);

		$this->load->view('admin/layout/wrapper', $data);
	}


	public function tambah(){

		$valid = $this->form_validation;
		

		$valid->set_rules('nama','Nama Katberita','required|is_unique[katberita.nama]',
			array('required'	=> 'Nama Katberita Harus di isi',
				  'is_unique'	=> 'Oooops, <strong>'.
				  					$this->input->post('nama').
				  					'</strong> sudah ditambahkan...!'));

		if ($valid->run()===FALSE) {
			// end validasi
		
			$data = array(	'title' 	=> 'Ketegori Berita',
							'isi' 		=> 'admin/katberita/tambah',
							'js'		=> '',
							'menu'		=> 'berita',
							'tag'		=> 'Tambah'
							);

			$this->load->view('admin/layout/wrapper', $data);
		}else{
			$i = $this->input;
			$data = array(	'nama'			=> $i->post('nama'));
			$this->katberita_model->tambah($data);
			$this->session->set_flashdata('sukses','<strong>SUKSES...!!!</strong> Nama Kategori telah di tambah');
			redirect(base_url('admin/katberita'));
		}
	}


	public function edit($id){
		$valid = $this->form_validation;
		

		$valid->set_rules('nama','Nama Katberita','required|is_unique[katberita.nama]',
			array('required'	=> 'Nama Katberita Harus di isi',
				  'is_unique'	=> 'Oooops, <strong>'.
				  					$this->input->post('nama').
				  					'</strong> sudah ada...!'));

		if ($valid->run()===FALSE) {
			// end validasi

		$katberita = $this->katberita_model->detail($id);
	
		$data = array(	'title' 	=> 'Edit Kategori Berita', 
						'katberita' => $katberita,
						'js'		=> '',
						'tag'		=> 'Edit',
						'menu'		=> 'berita',
						'isi' 		=> 'admin/katberita/edit');
		$this->load->view('admin/layout/wrapper', $data);
		
		}else{
			$i = $this->input;
			$data = array(	'id'			=> $id,
							'nama'			=> $i->post('nama'));
			$this->katberita_model->edit($data);
			$this->session->set_flashdata('sukses','<strong>SUKSES...!!!</strong> Nama Kategori berhasil di update');
			redirect(base_url('admin/katberita'));
		}
	}


	//del
	public function del($id) {
		$data = array('id' => $id);
		$this->katberita_model->del($data);
		$this->session->set_flashdata('sukses','<strong>SUKSES...!!!</strong> Kategori telah di hapus');
		redirect(base_url('admin/katberita'));
	}

	
}