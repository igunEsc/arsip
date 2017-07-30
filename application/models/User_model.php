<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model {

		public function __construct() {
		//    $this->load->database();
		}
		

		public function listing() {
			$this->db->where('stat IS NULL');
			$this->db->order_by('level');
		    $query = $this->db->get('user');
		    return $query->result();
		}

		public function su() {
			$this->db->order_by('id');
			$this->db->limit(1);
		    $query = $this->db->get('user');
		    return $query->result();
		}

		public function listing_nama() {
			$this->db->order_by('nama');
		    $query = $this->db->get('user');
		    return $query->result();
		}

	
		public function detail($id) {
		    $query = $this->db->get_where('user',array('id'=>$id));
		    return $query->row();
		}

		public function detail_username($username) {
		    $query = $this->db->get_where('user',array('username'=>$username));
		    return $query->row();
		}


		public function tambah($data) {
		    $this->db->insert('user',$data);
		}

		public function tambah_user($data_kat) {
		    $this->db->insert('user',$data_kat);
		}
		

		public function edit($data) {
		    $this->db->where('id',$data['id']);
		    $this->db->update('user',$data);
		}

		public function del($data) {
		    $this->db->where('id',$data['id']);
		    $this->db->delete('user',$data);
		}	
}