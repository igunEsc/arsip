<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Umkm_model extends CI_Model {

		public function __construct() {
		//    $this->load->database();
		}
		

		public function listing() {
			$this->db->order_by('id','DESC');
		    $query = $this->db->get('umkm');
		    return $query->result();
		}

		public function listing_kec() {
			$this->db->where('regency_id',1301);
			$this->db->order_by('name');
		    $query = $this->db->get('districts');
		    return $query->result();
		}

		public function listing_kel($id_kec) {
			$this->db->where('district_id',$id_kec);
			$this->db->order_by('name');
		    $query = $this->db->get('villages');
		    return $query->result();
		}

		public function listing_nama() {
			$this->db->order_by('nama_umkm');
		    $query = $this->db->get('umkm');
		    return $query->result();
		}

		public function akhir(){
			$query = $this->db->query('SELECT * FROM umkm order by id DESC LIMIT 1');
		    return $query->row();
		}

		public function detail($id) {
		    $query = $this->db->get_where('umkm',array('id'=>$id));
		    return $query->row();
		}

		public function detail_kod($seskod) {
		    $query = $this->db->get_where('umkm',array('kode_unik'=>$seskod));
		    return $query->row();
		}


		public function tambah($data) {
		    $this->db->insert('umkm',$data);
		}

		public function tambah_umkm($data_kat) {
		    $this->db->insert('umkm',$data_kat);
		}
		

		public function edit($data) {
		    $this->db->where('id',$data['id']);
		    $this->db->update('umkm',$data);
		}

		public function del($data) {
		    $this->db->where('id',$data['id']);
		    $this->db->delete('umkm',$data);
		}	

		public function kelurahan($id){
			$kelurahan="<option value='0'>--Pilih--</pilih>";

			$this->db->order_by('name','ASC');
			$kel= $this->db->get_where('villages',array('district_id'=>$id));

			foreach ($kel->result_array() as $data ){
			$kelurahan.= "<option value='$data[id]'>$data[name]</option>";
			}

			return $kelurahan;
		}
}