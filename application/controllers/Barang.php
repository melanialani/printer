<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function index() {
		$this->lst();
	}

	public function lst() {
		$data['page_title'] = 'List Barang';
		$data['page_note'] = 'Manajemen stok barang';

		$data['row'] = $this->Barang->getAllBarang();

		$this->load->view('header', $data);
		$this->load->view('barang_list', $data);
		$this->load->view('footer', $data);
	}

	public function add() {
		$data['page_title'] = 'List Referensi';
		$data['page_note'] = 'Referensi yang akan ditampilkan untuk calon client';
		$data['edited'] = false;

		$this->load->view('header', $data);
		$this->load->view('barang_edit', $data);
		$this->load->view('footer', $data);
	}

	public function detail($id) {
		$data['page_title'] = 'List Referensi';
		$data['page_note'] = 'Referensi yang akan ditampilkan untuk calon client';
		
		$data['row'] = $this->Referensi->getAllReferensi();
		$data['row_detail'] = $this->Referensi->getAllReferensiDetail($id);

		$this->load->view('header', $data);
		$this->load->view('barang_detail', $data);
		$this->load->view('footer', $data);
	}
}
