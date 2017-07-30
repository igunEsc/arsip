<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('umkm_model');
        $this->load->model('katproduk_model');
        $this->load->model('produk_model');
        $this->load->library('image_lib');
    }
    

	public function index(){

		$produk = $this->produk_model->listing();

		
		$data = array(	'title' 	=> 'Produk UMKM',
						'isi' 		=> 'admin/produk/list',
						'produk' => $produk,
						'js'		=> 'admin/produk/js',
						'menu'		=> 'produk',
						'tag'		=> 'List'
						);

		$this->load->view('admin/layout/wrapper', $data);
	}

	function viewdata()
    {
		$this->load->library('datatables');
		$this->db->protect_identifiers('produk');
        $this->datatables->select('p.id as id,
        							p.nama as nama,
        							k.nama as kategoriproduk,
        							u.nama as namaumkm
        						');

        $this->datatables->unset_column('id');
        $this->datatables->edit_column('action', $this->buttonAksi('$1'),"id");
        $this->datatables->from('produk p
        							LEFT JOIN katproduk k ON (p.id_kat=k.id)
        							LEFT JOIN umkm u ON (p.id_umkm=u.id)
        						');
        return print_r($this->datatables->generate());
	}


	function buttonAksi($id)
	{
		$p='';
		$p.='<a href="produk/edit/'.$id.'" class="btn btn-primary btn-sm">
			<i class="fa fa-edit"></i>
		</a> ';
		$p.='<a onclick="return confirm(\'Yakin ingin menghapus data ini?\');" href="produk/del/'.$id.'" class="btn btn-sm btn-primary btn-danger">
			<i class="fa fa-trash"></i>
		</a> ';
		return $p;
	}

	public function tambah_cek(){
		$seskod = $this->session->userdata('seskod');

		if($this->session->userdata('seskod') == ''){ //cek apakah sudah ada UMKM yg dipilih
			redirect(base_url('admin/produk/pilihumkm')); //jika belum harus memilih UMKM terlebih dahulu
		}else{						//jika sudah ada yang dipilih langsung masuk form tambah					
			redirect(base_url('admin/produk/tambah/').$seskod);
		}
	}


	public function tambah($seskod){
		$umkm = $this->umkm_model->detail_kod($seskod); 
		$id_umkm = $umkm->id;	

		$produk = $this->produk_model->detail_umkm($id_umkm);
		$kat  = $this->katproduk_model->listing_nama();
		

		$valid = $this->form_validation;
		

		$valid->set_rules('isi','Isi','required',
			array('required'	=> 'Keterangan Harus di isi'));

		if ($valid->run()) {
			// end validasi
			$config['upload_path'] 		= './assets/upload/imgproduk/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg|jpeg';
			$config['max_size']			= '12000'; // KB	
			$this->load->library('upload', $config);

			if(! $this->upload->do_upload('foto')) {

				$data = array(	'title' 	=> 'Produk',
								'isi' 		=> 'admin/produk/tambah',
								'js'		=> 'admin/produk/js',
								'umkm'		=> $umkm,
								'kat'		=> $kat,
								'produk'	=> $produk,
								'error'		=> $this->upload->display_errors(),
								'menu'		=> 'produk',
								'tag'		=> 'Tambah');
				$this->load->view('admin/layout/wrapper', $data);
			}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				$gambar = $upload_data['uploads']['file_name'];
				
				$this->thumb_home($gambar);
				$this->thumb_galeri($gambar);
				$this->thumb_blog($gambar);

				$i = $this->input;
				$data 		= array(	'nama'		=> $i->post('nama'),
										'id_kat'	=> $i->post('id_kat'),
										'id_umkm'	=> $i->post('id_umkm'),
										'ket'		=> $i->post('isi'),
										'foto'		=> $upload_data['uploads']['file_name'],
										'thumbs'	=> $upload_data['uploads']['file_name']
										);

				$this->produk_model->tambah($data);
				$this->session->set_flashdata('sukses','<strong>SUKSES...!!!</strong> Produk telah di tambah');
				redirect(base_url('admin/produk'));
			}}

		$data = array(	'title' 	=> 'Produk',
						'isi' 		=> 'admin/produk/tambah',
						'js'		=> 'admin/produk/js',
						'umkm'		=> $umkm,
						'kat'		=> $kat,
						'produk'	=> $produk,
						'error'		=> '',
						'menu'		=> 'produk',
						'tag'		=> 'Tambah');
		$this->load->view('admin/layout/wrapper', $data);
		
	}

	public function thumb_home($gambar){
		// Image Editor Home
		$config['image_library']	= 'gd2';
		$config['source_image'] 	= './assets/upload/imgproduk/'.$gambar; 
		$config['new_image'] 		= './assets/upload/imgproduk/home/';
		$config['create_thumb'] 	= TRUE;
		$config['quality'] 			= "100%";
		$config['maintain_ratio'] 	= FALSE;
		$config['width'] 			= 400; // Pixel
		$config['height'] 			= 400; // Pixel
		$config['x_axis'] 			= 0;
		$config['y_axis'] 			= 0;
		$config['thumb_marker'] 	= '';

		 $this->image_lib->initialize($config);
		$this->image_lib->resize();
	}

	public function thumb_galeri($gambar){
		$config['image_library']	= 'gd2';
		$config['source_image'] 	= './assets/upload/imgproduk/'.$gambar; 
		$config['new_image'] 		= './assets/upload/imgproduk/galeri/';
		$config['create_thumb'] 	= TRUE;
		$config['quality'] 			= "100%";
		$config['maintain_ratio'] 	= FALSE;
		$config['width'] 			= 900; // Pixel
		$config['height'] 			= 600; // Pixel
		$config['x_axis'] 			= 0;
		$config['y_axis'] 			= 0;
		$config['thumb_marker'] 	= '';

	   $this->image_lib->clear();
       $this->image_lib->initialize($config);
       $this->image_lib->resize();

	}

	public function thumb_blog($gambar){
		$config['image_library']	= 'gd2';
		$config['source_image'] 	= './assets/upload/imgproduk/'.$gambar; 
		$config['new_image'] 		= './assets/upload/imgproduk/blog/';
		$config['create_thumb'] 	= TRUE;
		$config['quality'] 			= "100%";
		$config['maintain_ratio'] 	= FALSE;
		$config['width'] 			= 800; // Pixel
		$config['height'] 			= 400; // Pixel
		$config['x_axis'] 			= 0;
		$config['y_axis'] 			= 0;
		$config['thumb_marker'] 	= '';

	   $this->image_lib->clear();
       $this->image_lib->initialize($config);
       $this->image_lib->resize();

	}


	public function pilihumkm (){

		$umkm = $this->umkm_model->listing(); 
		$valid = $this->form_validation;
		

		$valid->set_rules('kd_unik','Kode Unik','required',
			array('required'	=> 'walala'));

		if ($valid->run()) {
			$kd_unik 	= $this->input->post('kd_unik');

			$this->session->unset_userdata('seskod');
			$this->session->set_userdata('seskod', $kd_unik);
			redirect(base_url('admin/produk/tambah_cek/'));

		}

		$data = array(	'title' 	=> 'Produk',
						'isi' 		=> 'admin/produk/pilihumkm',
						'js'		=> '',
						'umkm'		=> $umkm,
						'menu'		=> 'produk',
						'tag'		=> 'Silahkan Pilih UMKM terlebih dahulu');
		$this->load->view('admin/layout/wrapper', $data);
	}


	public function edit($id){
		$valid = $this->form_validation;
		$kat    = $this->katproduk_model->listing_nama();
		$produk = $this->produk_model->detail($id);

		$id_umkm = $produk->id_umkm;
		$umkm = $this->umkm_model->detail($id_umkm);

		$valid->set_rules('isi','Isi','required',
			array('required'	=> 'Keterangan Harus di isi'));

		if ($valid->run()) {
			// end validasi
			if(!empty($_FILES['foto']['name'])){  // jika mengganti gambar baru

				$config['upload_path'] 		= './assets/upload/imgproduk/';
				$config['allowed_types'] 	= 'gif|jpg|png|svg|jpeg';
				$config['max_size']			= '12000'; // KB	
				$this->load->library('upload', $config);

				if(! $this->upload->do_upload('foto')) { // jika upload gagal maka,

					$data = array(	'title' 	=> 'Produk',
									'produk' => $produk,
									'umkm'	=> $umkm,
									'kat'	=> $kat,	
									'tag'		=> 'Edit',
									'isi' 		=> 'admin/produk/edit',
									'js'		=> 'admin/produk/js',
									'error'		=> $this->upload->display_errors()
									);
					$this->load->view('admin/layout/wrapper', $data);
				}else{
					$upload_data				= array('uploads' =>$this->upload->data());
					
					$gambar = $upload_data['uploads']['file_name'];
				
					$this->thumb_home($gambar);
					$this->thumb_galeri($gambar);
					$this->thumb_blog($gambar);

					//proses menghapus gambar lama
					if($produk->foto != ""){
						unlink('./assets/upload/imgproduk/'.$produk->foto);
						unlink('./assets/upload/imgproduk/home/'.$produk->foto);
						unlink('./assets/upload/imgproduk/galeri/'.$produk->foto);
						unlink('./assets/upload/imgproduk/blog/'.$produk->foto);
					}

					$i = $this->input;
					$data 	= array('id'	=>$id,		
									'nama'		=> $i->post('nama'),
									'id_kat'	=> $i->post('id_kat'),
									'id_umkm'	=> $i->post('id_umkm'),
									'ket'		=> $i->post('isi'),
									'foto'				    => $upload_data['uploads']['file_name'],
									'thumbs' => $upload_data['uploads']['file_name']
									);
					$this->produk_model->edit($data);
					$this->session->set_flashdata('sukses','<strong>SUKSES...!!!</strong> Produk berhasil di update');
					redirect(base_url('admin/produk'));
				}
			}else{
				$i = $this->input;
				$data 		= array('id'		=> $id,		
									'nama'		=> $i->post('nama'),
									'id_kat'	=> $i->post('id_kat'),
									'id_umkm'	=> $i->post('id_umkm'),
									'ket'		=> $i->post('isi'),
									);
				$this->produk_model->edit($data);
				$this->session->set_flashdata('sukses','<strong>SUKSES...!!!</strong> Produk berhasil di update');
				redirect(base_url('admin/produk'));
			}
		}

		$data = array(	'title' 	=> 'Edit Kategori Produk', 
						'produk' => $produk,
						'umkm'	=> $umkm,	
						'kat'	=> $kat,
						'tag'		=> 'Edit',
						'js'		=> '',
						'isi' 		=> 'admin/produk/edit',
						'menu'		=> 'produk',
						'js'	=> 'admin/produk/js');
		$this->load->view('admin/layout/wrapper', $data);
	}


	//del
	public function del($id) {
		$produk = $this->produk_model->detail($id); 		//proses menghapus gambar lama
		if($produk->foto != ""){
			unlink('./assets/upload/imgproduk/'.$produk->foto);
			unlink('./assets/upload/imgproduk/home/'.$produk->foto);
			unlink('./assets/upload/imgproduk/galeri/'.$produk->foto);
			unlink('./assets/upload/imgproduk/blog/'.$produk->foto);
		}

		$data = array('id' => $id);
		$this->produk_model->del($data);
		$this->session->set_flashdata('sukses','<strong>SUKSES...!!!</strong> Produk telah di hapus');
		redirect(base_url('admin/produk'));
	}

	public function del_umkm($id) { //hapus seluruh produk ketika UMKM di Hapus
		
		$produk = $this->produk_model->detail_umkm($id); 		//proses menghapus gambar lama
		if($produk->foto != ""){
			unlink('./assets/upload/imgproduk/'.$produk->foto);
			unlink('./assets/upload/imgproduk/home/'.$produk->foto);
			unlink('./assets/upload/imgproduk/blog/'.$produk->foto);
			unlink('./assets/upload/imgproduk/galeri/'.$produk->foto);
		}

		$data = array('id_umkm' => $id);
		$this->produk_model->del_umkm($data);

		$this->session->set_flashdata('sukses','<strong>SUKSES...!!!</strong> UMKM berhasil di hapus');
		redirect(base_url('admin/umkm'));
	}

	public function del_sess(){
		$this->session->unset_userdata('seskod');
	}

	
}