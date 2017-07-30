<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile_model extends CI_Model {

	public function detail($id) {
		    $query = $this->db->get_where('user',array('id'=>$id));
		    return $query->row();
		}

}