<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Katumkm_model extends CI_Model {

		public function __construct() {
		//    $this->load->database();
		}
		

		public function listing() {
			$this->db->order_by('id','DESC');
		    $query = $this->db->get('katumkm');
		    return $query->result();
		}

		public function listing_nama() {
			$this->db->order_by('nama_katumkm');
		    $query = $this->db->get('katumkm');
		    return $query->result();
		}

		public function akhir(){
			$query = $this->db->query('SELECT * FROM katumkm order by id DESC LIMIT 1');
		    return $query->row();
		}

		public function detail($id) {
		    $query = $this->db->get_where('katumkm',array('id'=>$id));
		    return $query->row();
		}


		public function tambah($data) {
		    $this->db->insert('katumkm',$data);
		}

		public function tambah_katumkm($data_kat) {
		    $this->db->insert('katumkm',$data_kat);
		}
		

		public function edit($data) {
		    $this->db->where('id',$data['id']);
		    $this->db->update('katumkm',$data);
		}

		public function del($data) {
		    $this->db->where('id',$data['id']);
		    $this->db->delete('katumkm',$data);
		}	
}