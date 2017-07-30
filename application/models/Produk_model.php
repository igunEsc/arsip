<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Produk_model extends CI_Model {

		public function __construct() {
		//    $this->load->database();
			$this->load->library('m_db');
		}
		

		public function listing() {
			$this->db->order_by('id','DESC');
		    $query = $this->db->get('produk');
		    return $query->result();
		}

		public function listing_nama() {
			$this->db->order_by('nama');
		    $query = $this->db->get('produk');
		    return $query->result();
		}

		public function akhir(){
			$query = $this->db->query('SELECT * FROM produk order by id DESC LIMIT 1');
		    return $query->row();
		}

		public function detail($id) {
		    $query = $this->db->get_where('produk',array('id'=>$id));
		    return $query->row();
		}

		public function detail_umkm($id_umkm) {
		    $query = $this->db->get_where('produk',array('id_umkm'=>$id_umkm));
		   // $query = $this->db->query('SELECT * FROM produk where id_umkm = 11');
		    return $query->result();
		}


		public function tambah($data) {
		    $this->db->insert('produk',$data);
		}

		public function tambah_produk($data_kat) {
		    $this->db->insert('produk',$data_kat);
		}
		

		public function edit($data) {
		    $this->db->where('id',$data['id']);
		    $this->db->update('produk',$data);
		}

		public function del($data) {
		    $this->db->where('id',$data['id']);
		    $this->db->delete('produk',$data);
		}	

		public function del_umkm($data) {
		    $this->db->where('id_umkm',$data['id_umkm']);
		    $this->db->delete('produk',$data);
		}

		function produk_umkm($where=array(),$order="id DESC")
		{
			$d=$this->m_db->get_data('produk',$where,$order);
			return $d;
		}

}