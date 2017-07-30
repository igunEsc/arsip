<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {
private $mod_url='';

	function __construct()
    {
        parent::__construct();
        $this->load->model('berita_model');
        $this->load->model('katberita_model');
       $this->load->library('image_lib');
       $this->load->library('datatables');
       $this->mod_url=base_url().'admin/berita/';
    }
    

	public function index(){

		$berita = $this->berita_model->listing();

		
		$data = array(	'title' 	=> 'Berita',
						'isi' 		=> 'admin/berita/list_dt',
						'berita' => $berita,
						'js'		=> 'admin/berita/js',
						'menu'		=> 'berita',
						'url'		=> $this->mod_url,
						'tag'		=> 'List'
						);

		$this->load->view('admin/layout/wrapper', $data);
	}

    function viewdata()
    {
		$this->load->library('datatables');
        $this->datatables->select('b.id as id,
        							b.judul as judul,
        							k.nama as kategori');


        $this->datatables->unset_column('id');
        $this->datatables->edit_column('action', $this->buttonAksi('$1'),"id");
         $this->datatables->from('berita b
        							LEFT JOIN katberita k ON (b.id_kat=k.id)
        						');
        return print_r($this->datatables->generate());
	}

	function villages()
    {
		$this->load->library('datatables');
        $this->datatables->select('id,name');
        $this->datatables->unset_column('id');
        $this->datatables->edit_column('action', $this->buttonAksi('$1'),"id");
        $this->datatables->from('villages');
        return print_r($this->datatables->generate());
	}

	function buttonAksi($id)
	{
		$p='';
		$p.='<a href="berita/edit/'.$id.'" class="btn btn-primary btn-sm">
			<i class="fa fa-edit"></i>
		</a> ';
		$p.='<a onclick="return confirm(\'Yakin ingin menghapus data ini?\');" href="berita/del/'.$id.'" class="btn btn-sm btn-primary btn-danger">
			<i class="fa fa-trash"></i>
		</a> ';
		return $p;
	}


	public function tambah(){

		
		$kat = $this->katberita_model->listing_nama();
		$akhir		= $this->berita_model->akhir();

		$valid = $this->form_validation;
		

		$valid->set_rules('judul','Nama Berita','required|is_unique[berita.judul]',
			array('required'	=> 'Judul Berita Harus di isi',
				  'is_unique'	=> 'Oooops, <strong>'.
				  					$this->input->post('judul').
				  					'</strong> sudah ditambahkan...!'));

		if ($valid->run()) {
			// end validasi
			$config['upload_path'] 		= './assets/upload/imgberita/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg|jpeg';
			$config['max_size']			= '12000'; // KB	
			$this->load->library('upload', $config);

			if(! $this->upload->do_upload('foto')) {

				

				$data = array(	'title' 	=> 'Berita',
								'isi' 		=> 'admin/berita/tambah',
								'js'		=> 'admin/berita/list_js',
								'kat'		=> $kat,
								'error'		=> $this->upload->display_errors(),
								'menu'		=> 'berita',
								'tag'		=> 'Tambah'
								);

				$this->load->view('admin/layout/wrapper', $data);
			}else{

				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$gambar = $upload_data['uploads']['file_name'];
				
				$this->thumb_home($gambar);
				$this->thumb_blog($gambar);

				$i = $this->input;
				$url_akhir	= $akhir->id+1;
				$slug		= $url_akhir.'-'.url_title($i->post('judul'),'dash', TRUE);
				$data 		= array(	'slug'					=> $slug,
										'judul'					=> $i->post('judul'),
										'id_kat'	=> $i->post('id_kat'),
										'isi'					=> $i->post('isi'),
										'foto'				    => $upload_data['uploads']['file_name'],
										'thumbs'				    => $upload_data['uploads']['file_name']
										);

				$this->berita_model->tambah($data);
				$this->session->set_flashdata('sukses','<strong>SUKSES...!!!</strong> Berita telah di tambah');
				redirect(base_url('admin/berita'));
		}}

		//halaman default
		$data = array(	'title' 	=> 'Berita',
								'isi' 		=> 'admin/berita/tambah',
								'js'		=> 'admin/berita/list_js',
								'kat'		=> $kat,
								'menu'		=> 'berita',
								'tag'		=> 'Tambah'
								);

		$this->load->view('admin/layout/wrapper', $data);
	}

	
	public function edit($id){
		$kat 	= $this->katberita_model->listing_nama();
		$akhir	= $this->berita_model->akhir();
		$berita = $this->berita_model->detail($id);

		$valid = $this->form_validation;
		

		$valid->set_rules('judul','Nama Berita','required',
			array('required'	=> 'Judul Berita Harus di isi'));

		if ($valid->run()) {
			// jika validasi jalan
			if(!empty($_FILES['foto']['name'])){  // jika mengganti gambar baru

				$config['upload_path'] 		= './assets/upload/imgberita/';
				$config['allowed_types'] 	= 'gif|jpg|png|svg|jpeg';
				$config['max_size']			= '12000'; // KB	
				$this->load->library('upload', $config);

				if(! $this->upload->do_upload('foto')) { // jika upload gagal maka,

					$data = array(	'title' 	=> 'Berita',
									'isi' 		=> 'admin/berita/tambah',
									'js'		=> 'admin/berita/list_js',
									'kat'		=> $kat,
									'menu'		=> 'berita',
									'error'		=> $this->upload->display_errors(),
									'tag'		=> 'Tambah'
									);

					$this->load->view('admin/layout/wrapper', $data);
				}else{ // jika upload berhasil maka, masuk ke proses upload gambar

					$upload_data				= array('uploads' =>$this->upload->data());
					// Image Editor
					$gambar = $upload_data['uploads']['file_name'];
				
					$this->thumb_home($gambar);
					$this->thumb_blog($gambar);

					//proses menghapus gambar lama
					if($berita->foto != ""){
						unlink('./assets/upload/imgberita/'.$berita->foto);
						unlink('./assets/upload/imgberita/home/'.$berita->foto);
						unlink('./assets/upload/imgberita/blog/'.$berita->foto);
					}
					//end hapus gambar lama
					//lalu simpan data gambar baru ke database
					$i = $this->input;
					$data 		= array(	'id'		=> $id,
											'judul'					=> $i->post('judul'),
											'id_kat'	=> $i->post('id_kat'),
											'isi'					=> $i->post('isi'),
											'foto'				    => $upload_data['uploads']['file_name'],
											'thumbs' => $upload_data['uploads']['file_name']
											);

					$this->berita_model->edit($data);
					$this->session->set_flashdata('sukses','<strong>SUKSES...!!!</strong> Berita telah di UPDATE');
					redirect(base_url('admin/berita'));
				}
			}else{ 
				// jika tidak mengganti gambar, maka update tanpa gambar
				$i = $this->input;
				$data 		= array(	'id'		=> $id,
										'judul'		=> $i->post('judul'),
										'id_kat'	=> $i->post('id_kat'),
										'isi'		=> $i->post('isi'),
										);

				$this->berita_model->edit($data);
				$this->session->set_flashdata('sukses','<strong>SUKSES...!!!</strong> Berita telah di UPDATE');
				redirect(base_url('admin/berita'));
			}
		}

		//halaman default
		$data = array(	'title' 	=> 'Berita',
								'isi' 		=> 'admin/berita/edit',
								'js'		=> 'admin/berita/list_js',
								'kat'		=> $kat,
								'berita'	=> $berita,
								'menu'		=> 'berita',
								'tag'		=> 'Edit'
								);

		$this->load->view('admin/layout/wrapper', $data);
	}



	//del
	public function del($id) {

		$berita = $this->berita_model->detail($id);

		//hapus gambar
		if($berita->foto != ""){
			unlink('./assets/upload/imgberita/'.$berita->foto);
			unlink('./assets/upload/imgberita/blog/'.$berita->foto);
			unlink('./assets/upload/imgberita/home/'.$berita->foto);
		}
		//end hapus gambar

		$data = array('id' => $id);
		$this->berita_model->del($data);
		$this->session->set_flashdata('sukses','<strong>SUKSES...!!!</strong> Berita telah di hapus');
		redirect(base_url('admin/berita'));
	}


	public function thumb_home($gambar){
		// Image Editor Home
		$config['image_library']	= 'gd2';
		$config['source_image'] 	= './assets/upload/imgberita/'.$gambar; 
		$config['new_image'] 		= './assets/upload/imgberita/home/';
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

	public function thumb_blog($gambar){
		$config['image_library']	= 'gd2';
		$config['source_image'] 	= './assets/upload/imgberita/'.$gambar; 
		$config['new_image'] 		= './assets/upload/imgberita/blog/';
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

	
}