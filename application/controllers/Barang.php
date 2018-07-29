<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plate extends CI_Controller {

	public function index() {
		$this->lst();
	}

	public function lst() {
		$data['page_title'] = 'List Plate';
		$data['page_note'] = 'Daftar plate dan ukurannya';

		$data['row'] = $this->Plate->getAll();

		$this->load->view('header', $data);
		$this->load->view('plate_list', $data);
		$this->load->view('footer', $data);
	}

	public function add() {
		$data['page_title'] = 'Tambah Ukuran Plate Baru';
		$data['edited'] = false;

		if ($this->input->post('button') == 'save'){
			$result = $this->Plate->insert($this->input->post('panjang'),$this->input->post('lebar'));
			if ($result)
				redirect('plate');
		}

		$this->load->view('header', $data);
		$this->load->view('plate_edit', $data);
		$this->load->view('footer', $data);
	}

	public function edit($id) {
		$data['page_title'] = 'Edit Ukuran Plate';
		$data['edited'] = true;

		$detail = $this->Plate->getOne($id);
		$data['detail'] = $detail[0];

		if ($this->input->post('button') == 'save'){
			$result = $this->Plate->update($id,$this->input->post('panjang'),$this->input->post('lebar'));
			if ($result)
				redirect('plate');
		}

		$this->load->view('header', $data);
		$this->load->view('plate_edit', $data);
		$this->load->view('footer', $data);
	}

	public function delete($id) {
		$result = $this->Plate->delete($id);
		if ($result) redirect('plate');
	}
}
