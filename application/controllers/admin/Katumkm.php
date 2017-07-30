<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Katumkm extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('katumkm_model');
       
    }
    

	public function index(){

		$katumkm = $this->katumkm_model->listing();

		
		$data = array(	'title' 	=> 'Ketegori Umkm',
						'isi' 		=> 'admin/katumkm/list',
						'katumkm' => $katumkm,
						'js'		=> 'admin/katumkm/js',
						'menu'		=> 'umkm',
						'tag'		=> 'List'
						);

		$this->load->view('admin/layout/wrapper', $data);
	}


	public function tambah(){

		$valid = $this->form_validation;
		

		$valid->set_rules('nama','Nama Katumkm','required|is_unique[katumkm.nama]',
			array('required'	=> 'Nama Katumkm Harus di isi',
				  'is_unique'	=> 'Oooops, <strong>'.
				  					$this->input->post('nama').
				  					'</strong> sudah ditambahkan...!'));

		if ($valid->run()===FALSE) {
			// end validasi
		
			$data = array(	'title' 	=> 'Ketegori Umkm',
							'isi' 		=> 'admin/katumkm/tambah',
							'js'		=> '',
							'menu'		=> 'umkm',
							'tag'		=> 'Tambah'
							);

			$this->load->view('admin/layout/wrapper', $data);
		}else{
			$i = $this->input;
			$data = array(	'nama'			=> $i->post('nama'));
			$this->katumkm_model->tambah($data);
			$this->session->set_flashdata('sukses','<strong>SUKSES...!!!</strong> Nama Kategori telah di tambah');
			redirect(base_url('admin/katumkm'));
		}
	}


	public function edit($id){
		$valid = $this->form_validation;
		

		$valid->set_rules('nama','Nama Katumkm','required|is_unique[katumkm.nama]',
			array('required'	=> 'Nama Katumkm Harus di isi',
				  'is_unique'	=> 'Oooops, <strong>'.
				  					$this->input->post('nama').
				  					'</strong> sudah ada...!'));

		if ($valid->run()===FALSE) {
			// end validasi

		$katumkm = $this->katumkm_model->detail($id);
	
		$data = array(	'title' 	=> 'Edit Kategori Umkm', 
						'katumkm' => $katumkm,
						'tag'		=> 'Edit',
						'js'		=> '',
						'menu'		=> 'umkm',
						'isi' 		=> 'admin/katumkm/edit');
		$this->load->view('admin/layout/wrapper', $data);
		
		}else{
			$i = $this->input;
			$data = array(	'id'			=> $id,
							'nama'			=> $i->post('nama'));
			$this->katumkm_model->edit($data);
			$this->session->set_flashdata('sukses','<strong>SUKSES...!!!</strong> Nama Kategori berhasil di update');
			redirect(base_url('admin/katumkm'));
		}
	}


	//del
	public function del($id) {
		$data = array('id' => $id);
		$this->katumkm_model->del($data);
		$this->session->set_flashdata('sukses','<strong>SUKSES...!!!</strong> Kategori telah di hapus');
		redirect(base_url('admin/katumkm'));
	}

	
}