<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends CI_Controller {

	function __construct()
    {
        parent::__construct();
    }
    

	public function index(){

		$data = array(	'title' 	=> 'Error',
						'isi' 		=> 'admin/error/error',
						'js'		=> '',
						'menu'		=> '',
						'tag'		=> ''
						);

		$this->load->view('admin/layout/wrapper', $data);
	}
}