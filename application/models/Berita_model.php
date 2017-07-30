<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Berita_model extends CI_Model {

		public function __construct() {
		//    $this->load->database();
		}
		

		public function listing() {
			$this->db->order_by('id','DESC');
		    $query = $this->db->get('berita');
		    return $query->result();
		}

		public function listing_nama() {
			$this->db->order_by('nama_berita');
		    $query = $this->db->get('berita');
		    return $query->result();
		}

		public function akhir(){
			$query = $this->db->query('SELECT * FROM berita order by id DESC LIMIT 1');
		    return $query->row();
		}

		public function detail($id) {
		    $query = $this->db->get_where('berita',array('id'=>$id));
		    return $query->row();
		}


		public function tambah($data) {
		    $this->db->insert('berita',$data);
		}

		public function tambah_berita($data_kat) {
		    $this->db->insert('berita',$data_kat);
		}
		

		public function edit($data) {
		    $this->db->where('id',$data['id']);
		    $this->db->update('berita',$data);
		}

		public function del($data) {
		    $this->db->where('id',$data['id']);
		    $this->db->delete('berita',$data);
		}	
}