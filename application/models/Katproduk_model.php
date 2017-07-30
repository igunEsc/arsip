<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Katproduk_model extends CI_Model {

		public function __construct() {
		//    $this->load->database();
		}
		

		public function listing() {
			$this->db->order_by('id','DESC');
		    $query = $this->db->get('katproduk');
		    return $query->result();
		}

		public function listing_nama() {
			$this->db->order_by('nama');
		    $query = $this->db->get('katproduk');
		    return $query->result();
		}

		public function akhir(){
			$query = $this->db->query('SELECT * FROM katproduk order by id DESC LIMIT 1');
		    return $query->row();
		}

		public function detail($id) {
		    $query = $this->db->get_where('katproduk',array('id'=>$id));
		    return $query->row();
		}


		public function tambah($data) {
		    $this->db->insert('katproduk',$data);
		}

		public function tambah_katproduk($data_kat) {
		    $this->db->insert('katproduk',$data_kat);
		}
		

		public function edit($data) {
		    $this->db->where('id',$data['id']);
		    $this->db->update('katproduk',$data);
		}

		public function del($data) {
		    $this->db->where('id',$data['id']);
		    $this->db->delete('katproduk',$data);
		}	
}