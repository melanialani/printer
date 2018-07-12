<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Referensi extends CI_Controller {

	public function index() {
		$this->list();
	}

	public function list() {
		$data['page_title'] = 'List Referensi';
		$data['page_note'] = 'Referensi yang akan ditampilkan untuk calon client';

		$data['row'] = $this->Referensi->getAllReferensi();

		$this->load->view('header', $data);
		$this->load->view('referensi_list', $data);
		$this->load->view('footer', $data);
	}

	public function detail($id) {
		$data['page_title'] = 'List Referensi';
		$data['page_note'] = 'Referensi yang akan ditampilkan untuk calon client';
		$data['page_title_detail'] = 'Detail Referensi';
		$data['page_note_detail'] = 'Detail dari tipe referensi yang akan ditampilkan untuk calon client';
		$data['detail'] = true;
		
		$data['row'] = $this->Referensi->getAllReferensi();

		$this->load->view('header', $data);
		$this->load->view('referensi_list', $data);
		$this->load->view('footer', $data);
	}
}
