<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	function __construct()
    {
        parent::__construct();
        $this->load->model('home_model');
        $this->load->helper('text');
       
    }
    

	public function index(){

		$produk = $this->home_model->produk();
		$berita = $this->home_model->berita();
		$galeri = $this->home_model->galeriProduk();
		$t_produk = $this->home_model->t_produk();
		$t_umkm = $this->home_model->t_umkm();


		$data = array(	'title' 	=> 'Beranda',
						'produk'	=> $produk,
						'galeri'	=> $galeri,
						't_produk'	=> $t_produk,
						't_umkm'	=> $t_umkm,
						'berita'	=> $berita
						);

		$this->load->view('user/layout-home/wrapper', $data);
	}

	public function produk_det($id){

		$produk = $this->home_model->produk_detail($id);
		$produk_2 = $this->home_model->produk_2();

		$data = array(	'title' 	=> 'Produk',
						'produk'	=> $produk,
						'produk_2'	=> $produk_2,
						'isi'		=> 'user/produk_blog'
						);

		$this->load->view('user/layout-blog/wrapper', $data);
	}


	public function berita_det($id){

		$berita = $this->home_model->berita_detail($id);
		$berita_2 = $this->home_model->berita_2();

		$data = array(	'title' 	=> 'Berita',
						'berita'	=> $berita,
						'berita_2'	=> $berita_2,
						'isi'		=> 'user/berita_blog',
						'tag'		=> 'Berita'
						);

		$this->load->view('user/layout-user/wrapper', $data);
	}

	public function produk(){
		$jumlah_data = $this->home_model->jumlah_data();
		$this->load->library('pagination');

		$config['base_url'] = base_url().'home/produk/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 9;

		//Untuk CSS Bootstrap
			$config['full_tag_open'] = '<ul class="ul-h">';
	        $config['full_tag_close'] = '</ul>';
	        $config['first_link'] = '&laquo; First';
	        $config['first_tag_open'] = '<li class="prev">';
	        $config['first_tag_close'] = '</li>';
	        $config['last_link'] = 'Last &raquo;';
	        $config['last_tag_open'] = '<li class="next">';
	        $config['last_tag_close'] = '</li>';
	        $config['next_link'] = 'Next >';
	        $config['next_tag_open'] = '<li class="next">';
	        $config['next_tag_close'] = '</li>';
	        $config['prev_link'] = '< Prev';
	        $config['prev_tag_open'] = '<li class="prev">';
	        $config['prev_tag_close'] = '</li>';
	        $config['cur_tag_open'] = '<li class="active"><a href="">';
	        $config['cur_tag_close'] = '</a></li>';
	        $config['num_tag_open'] = '<li>';
	        $config['num_tag_close'] = '</li>';

		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);		
		$produk = $this->home_model->produkPage($config['per_page'],$from);

		$data = array(	'title' 	=> 'Produk',
						'isi'		=> 'user/produk',
						'produk'	=> $produk,
						'tag'		=> 'Produk UMKM'
						);

		$this->load->view('user/layout-user/wrapper', $data);
	}


	public function berita(){
		$jumlah_data = $this->home_model->jumlah_data_berita();
		$this->load->library('pagination');

		$config['base_url'] = base_url().'home/berita/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 9;

		//Untuk CSS Bootstrap
			$config['full_tag_open'] = '<ul class="ul-h">';
	        $config['full_tag_close'] = '</ul>';
	        $config['first_link'] = '&laquo; First';
	        $config['first_tag_open'] = '<li class="prev">';
	        $config['first_tag_close'] = '</li>';
	        $config['last_link'] = 'Last &raquo;';
	        $config['last_tag_open'] = '<li class="next">';
	        $config['last_tag_close'] = '</li>';
	        $config['next_link'] = 'Next >';
	        $config['next_tag_open'] = '<li class="next">';
	        $config['next_tag_close'] = '</li>';
	        $config['prev_link'] = '< Prev';
	        $config['prev_tag_open'] = '<li class="prev">';
	        $config['prev_tag_close'] = '</li>';
	        $config['cur_tag_open'] = '<li class="active"><a href="">';
	        $config['cur_tag_close'] = '</a></li>';
	        $config['num_tag_open'] = '<li>';
	        $config['num_tag_close'] = '</li>';

		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);		
		$berita = $this->home_model->beritaPage($config['per_page'],$from);

		$data = array(	'title' 	=> 'Berita',
						'isi'		=> 'user/berita',
						'berita'	=> $berita,
						'tag'		=> 'Berita'
						);

		$this->load->view('user/layout-user/wrapper', $data);
	}

	public function log(){

		$data = array(	'title' 	=> 'Login',
						);

		$this->load->view('login/list', $data);
	}

	public function error(){
		$this->load->view('errors/index');
	}


		
}