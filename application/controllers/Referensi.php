<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Referensi extends CI_Controller {

	public function index() {
		$this->list();
	}

	public function list() {
		$data['page_title'] = 'List Referensi';
		$data['page_note'] = 'Referensi yang akan ditampilkan untuk calon client';

		

		$this->load->view('header', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('footer', $data);
	}
}
