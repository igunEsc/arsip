<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Umkm extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('umkm_model');
        $this->load->model('katumkm_model');
        $this->load->model('produk_model');
        $this->load->helper(array('url'));
    }
    

	public function index(){

		$data = array(	'title' 	=> 'Umkm',
						'isi' 		=> 'admin/umkm/list',
						'js'		=> 'admin/umkm/js',
						'menu'		=> 'umkm',
						'tag'		=> 'List'
						);

		$this->load->view('admin/layout/wrapper', $data);
	}

	function viewdata()
    {
		$this->load->library('datatables');
        $this->datatables->select('id,nama,pemilik,hp');
        $this->datatables->unset_column('id');
        $this->datatables->edit_column('action', $this->buttonAksi('$1'),"id");
        $this->datatables->from('umkm');
        return print_r($this->datatables->generate());
	}

	function viewproduk($s4)
    {
		$this->load->library('datatables');
		$this->db->protect_identifiers('produk');
        $this->datatables->select('p.id as id,
        							p.nama as nama,
        							k.nama as kategoriproduk
        						');

        $this->datatables->where('id_umkm',$s4);
        $this->datatables->unset_column('id');
        $this->datatables->edit_column('action', $this->buttonAksiProduk('$1'),"id");
        $this->datatables->from('produk p
        							LEFT JOIN katproduk k ON (p.id_kat=k.id)
        						');

        return print_r($this->datatables->generate());
	}


	function produk()
	{
		$s4=$this->uri->segment(4);

		$produk = $this->produk_model->detail_umkm($s4);
		$umkm =$this->umkm_model->detail($s4);

		$nama ="| ".$umkm->nama;

		$data = array(	'title' 	=> 'Produk Umkm',
						'isi' 		=> 'admin/umkm/produk_dt',
						'js'		=> 'admin/umkm/js_produk',
						's4'		=> $s4,
						'menu'		=> 'umkm',
						'tag'		=> $nama
					  );
													
		$this->load->view('admin/layout/wrapper', $data);
	}



	function buttonAksi($id)
	{
		$p='';
		$p.='<a href="umkm/edit/'.$id.'" class="btn btn-primary btn-sm">
			<i class="fa fa-edit"></i>
		</a> ';
		$p.='<a onclick="return confirm(\'Menghapus UMKM juga akan menghapus SEMUA PRODUK yang terdaftar pada UMKM ini!!! Yakin ingin menghapus UMKM ini?\');" href="umkm/del/'.$id.'" class="btn btn-sm btn-primary btn-danger">
			<i class="fa fa-trash"></i>
		</a> ';
		$p.='<a href="umkm/produk/'.$id.'" class="btn btn-default btn-sm" ><i class="fa fa-search"></i>Lihat Produk
		</a>';
		return $p;

	}

	function buttonAksiProduk($id)
	{
		$p='';
		$p.='<a href="../../produk/edit/'.$id.'" class="btn btn-primary btn-sm">
			<i class="fa fa-edit"></i>
		</a> ';
		$p.='<a onclick="return confirm(\'Yakin ingin menghapus data ini?\');" href="../../produk/del/'.$id.'" class="btn btn-sm btn-primary btn-danger">
			<i class="fa fa-trash"></i>
		</a> ';
		
		return $p;

	}


	public function tambah(){

		$this->load->helper('string');
		

		$valid = $this->form_validation;

		$kec = $this->umkm_model->listing_kec();
		$kat = $this->katumkm_model->listing();

		$valid->set_rules('nama','Nama Umkm','required|is_unique[umkm.nama]',
			array('required'	=> 'Nama Umkm Harus di isi',
				  'is_unique'	=> 'Oooops, <strong>'.
				  					$this->input->post('nama').
				  					'</strong> sudah ditambahkan sebelumnya...!'));

		if ($valid->run()===FALSE) {
			// end validasi
		
			$data = array(	'title' 	=> 'UMKM',
						'isi' 		=> 'admin/umkm/tambah',
						'js'		=> 'admin/umkm/tambah_js',
						'kat'		=> $kat,
						'kec'		=> $kec,
						'menu'		=> 'umkm',
						'tag'		=> 'Tambah'
						);

			$this->load->view('admin/layout/wrapper', $data);
		}else{
			$i = $this->input;
			$data = array(	'nama'		=> $i->post('nama'),
							'pemilik'	=> $i->post('pemilik'),
							'alamat'	=> $i->post('alamat'),
							'id_prov'	=> '13',
							'id_kab'	=> '1301',
							'id_kec'	=> $i->post('id_kec'),
							'id_kel'	=> $i->post('id_kel'),
							'telp'	=> $i->post('telp'),
							'hp'	=> $i->post('hp'),
							'email'	=> $i->post('email'),
							'jk_pemilik'	=> $i->post('jk'),
							'id_kat'	=> $i->post('id_kat'),
							'id_ktp'	=> $i->post('id_ktp'),
							'kode_unik'	=> $i->post('kd_unik'),
							'tgl_terdaftar' => $i->post('tgl')
							);
			$this->umkm_model->tambah($data);
			$this->session->set_flashdata('sukses','<strong>SUKSES...!!!</strong> UMKM telah di tambah');

			//mendaftar session
			$kd_unik 	= $this->input->post('kd_unik');

			$this->session->unset_userdata('seskod');
			$this->session->set_userdata('seskod', $kd_unik);

			$seskod = $this->session->userdata('seskod');

			redirect(base_url('admin/produk/tambah/').$seskod);
		}

		$data = array(	'title' 	=> 'UMKM',
						'isi' 		=> 'admin/umkm/tambah',
						'js'		=> 'admin/umkm/tambah_js',
						'kat'		=> $kat,
						'kec'		=> $kec,
						'tag'		=> 'Tambah'
						);

		$this->load->view('admin/layout/wrapper', $data);
	}


	public function edit($id){

		$valid = $this->form_validation;
		$umkm = $this->umkm_model->detail($id);
		$kat = $this->katumkm_model->listing();
		$kec = $this->umkm_model->listing_kec();

		$id_kec = $umkm->id_kec;
		$kel = $this->umkm_model->listing_kel($id_kec);

		$valid->set_rules('nama','Nama Umkm','required',
			array('required'	=> 'Nama Umkm Harus di isi'));

		if ($valid->run()===FALSE) {
			// end validasi
		
			$data = array(	'title' 	=> 'UMKM',
						'isi' 		=> 'admin/umkm/edit',
						'js'		=> 'admin/umkm/tambah_js',
						'kat'		=> $kat,
						'kec'		=> $kec,
						'kel'		=> $kel,
						'umkm'		=> $umkm,
						'menu'		=> 'umkm',
						'tag'		=> 'Edit'
						);

			$this->load->view('admin/layout/wrapper', $data);
		}else{
			$i = $this->input;
			$data = array(	'id'		=> $id,
							'nama'		=> $i->post('nama'),
							'pemilik'	=> $i->post('pemilik'),
							'alamat'	=> $i->post('alamat'),
							'id_prov'	=> '13',
							'id_kab'	=> '1301',
							'id_kec'	=> $i->post('id_kec'),
							'id_kel'	=> $i->post('id_kel'),
							'telp'	=> $i->post('telp'),
							'hp'	=> $i->post('hp'),
							'email'	=> $i->post('email'),
							'jk_pemilik'	=> $i->post('jk'),
							'id_kat'	=> $i->post('id_kat'),
							'id_ktp'	=> $i->post('id_ktp'),
							'tgl_terdaftar' => $i->post('tgl')
							);
			$this->umkm_model->edit($data);
			$this->session->set_flashdata('sukses','<strong>SUKSES...!!!</strong> UMKM telah di edit');
			redirect(base_url('admin/umkm'));
		}

		$data = array(	'title' 	=> 'UMKM',
						'isi' 		=> 'admin/umkm/edit',
						'js'		=> 'admin/umkm/tambah_js',
						'kat'		=> $kat,
						'kec'		=> $kec,
						'kel'		=> $kel,
						'umkm'		=> $umkm,
						'menu'		=> 'umkm',
						'tag'		=> 'Edit'
						);

		$this->load->view('admin/layout/wrapper', $data);
	}



	public function del($id) {
		

		// $produk = $this->produk_model->detail_umkm($id);
		// $id_umkm = $produk->id_umkm;

		$data = array('id' => $id);
		$this->umkm_model->del($data);

		/*$d_produk_umkm = array('id_umkm', $id_umkm);
		$this->produk_model->del_umkm($d_produk_umkm);*/


		//$this->session->set_flashdata('sukses','<strong>SUKSES...!!!</strong> UMKM berhasil di hapus');
		redirect(base_url('admin/produk/del_umkm/'.$id));
	}

	function ambil_data(){

			$modul=$this->input->post('modul');
			$id=$this->input->post('id');

			if($modul=="kelurahan"){
				echo $this->umkm_model->kelurahan($id);
			}
	}

	


}