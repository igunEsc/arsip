<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Katberita_model extends CI_Model {

		public function __construct() {
		//    $this->load->database();
		}
		

		public function listing() {
			$this->db->order_by('id','DESC');
		    $query = $this->db->get('katberita');
		    return $query->result();
		}

		public function listing_nama() {
			$this->db->order_by('nama');
		    $query = $this->db->get('katberita');
		    return $query->result();
		}

		public function akhir(){
			$query = $this->db->query('SELECT * FROM katberita order by id DESC LIMIT 1');
		    return $query->row();
		}

		public function detail($id) {
		    $query = $this->db->get_where('katberita',array('id'=>$id));
		    return $query->row();
		}


		public function tambah($data) {
		    $this->db->insert('katberita',$data);
		}

		public function tambah_katberita($data_kat) {
		    $this->db->insert('katberita',$data_kat);
		}
		

		public function edit($data) {
		    $this->db->where('id',$data['id']);
		    $this->db->update('katberita',$data);
		}

		public function del($data) {
		    $this->db->where('id',$data['id']);
		    $this->db->delete('katberita',$data);
		}	
}