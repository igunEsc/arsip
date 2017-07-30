<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home_model extends CI_Model {

		public function __construct() {
		//    $this->load->database();
			$this->load->helper('url');
			$this->load->library('pagination');
		}
		

		public function produk(){
		    $this->db->order_by('id','DESC');
		    $this->db->LIMIT(6);
		    $query = $this->db->get('produk');
		    return $query->result();
		}


		public function galeriProduk(){
		    $this->db->order_by('rand()');
		    $this->db->LIMIT(6);
		    $query = $this->db->get('produk');
		    return $query->result();
		}

		public function produk_2(){
		    $this->db->protect_identifiers('produk');
			$this->db->select('p.id as id, p.nama as nama, p.foto as foto, k.nama as kategori');
			$this->db->join('katproduk k','p.id_kat=k.id','left');
			$this->db->order_by('p.id DESC');
			$this->db->LIMIT(2);
			return $query = $this->db->get('produk p')->result();
		}

		public function berita(){
		    $this->db->order_by('id','DESC');
		    $this->db->LIMIT(6);
		    $query = $this->db->get('berita');
		    return $query->result();
		}

		public function berita_2(){
		    $this->db->protect_identifiers('berita');
			$this->db->select('b.id as id, b.judul as judul, b.foto as foto, k.nama as kategori');
			$this->db->join('katberita k','b.id_kat=k.id','left');
			$this->db->order_by('b.id DESC');
			$this->db->LIMIT(2);
			return $query = $this->db->get('berita b')->result();
		}

		public function berita_all(){
		    $this->db->order_by('id','DESC');
		    $this->db->LIMIT(9);
		    $query = $this->db->get('berita');
		    return $query->result();
		}

		public function produk_all(){
		    $this->db->order_by('id','DESC');
		    $this->db->LIMIT(9);
		    $query = $this->db->get('produk');
		    return $query->result();
		}

		public function t_produk() {
		    $query = $this->db->query('SELECT count(id) AS total FROM produk');
		    return $query->row();
		}

		public function t_umkm() {
		    $query = $this->db->query('SELECT count(id) AS total FROM umkm');
		    return $query->row();
		}

		public function produk_detail($id) {
		    $query = $this->db->get_where('produk',array('id'=>$id));
		    return $query->row();
		}

		public function berita_detail($id) {
		    $query = $this->db->get_where('berita',array('id'=>$id));
		    return $query->row();
		}

		function jumlah_data(){
			return $this->db->get('produk')->num_rows();
		}

		function jumlah_data_berita(){
			return $this->db->get('berita')->num_rows();
		}

		function produkPage($number,$offset){
			$this->db->protect_identifiers('produk');
			$this->db->select('p.id as id, p.nama as nama, p.foto as foto, p.ket as ket, k.nama as kategori');
			$this->db->join('katproduk k','p.id_kat=k.id','left');
			$this->db->order_by('p.id DESC');
			return $query = $this->db->get('produk p',$number,$offset)->result();
		}

		function beritaPage($number,$offset){
			$this->db->protect_identifiers('berita');
			$this->db->select('b.id as id, b.judul as judul, b.foto as foto, b.isi as isi, k.nama as kategori');
			$this->db->join('katberita k','b.id_kat=k.id','left');
			$this->db->order_by('b.id DESC');
			return $query = $this->db->get('berita b',$number,$offset)->result();
		}

		

}