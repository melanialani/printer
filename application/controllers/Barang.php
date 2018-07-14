<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function index() {
		$this->lst();
	}

	public function lst() {
		$data['page_title'] = 'List Barang';
		$data['page_note'] = 'Manajemen stok barang';

		$data['row'] = $this->Barang->getAll();

		$this->load->view('header', $data);
		$this->load->view('barang_list', $data);
		$this->load->view('footer', $data);
	}

	public function add() {
		$data['page_title'] = 'Tambah Barang Baru';
		$data['edited'] = false;

		if ($this->input->post('button') == 'save'){
			$result = $this->Barang->insert($this->input->post('nama'),$this->input->post('jumlah'),$this->input->post('warning'),$this->input->post('harga'));
			if ($result)
				redirect('barang');
		}

		$this->load->view('header', $data);
		$this->load->view('barang_edit', $data);
		$this->load->view('footer', $data);
	}

	public function edit($id) {
		$data['page_title'] = 'Edit Barang';
		$data['edited'] = true;

		$detail = $this->Barang->getOne($id);
		$data['detail'] = $detail[0];

		if ($this->input->post('button') == 'save'){
			$result = $this->Barang->update($id,$this->input->post('nama'),$this->input->post('jumlah'),$this->input->post('warning'),$this->input->post('harga'));
			if ($result)
				redirect('barang');
		}

		$this->load->view('header', $data);
		$this->load->view('barang_edit', $data);
		$this->load->view('footer', $data);
	}

	public function delete($id) {
		$result = $this->Barang->delete($id);
		if ($result) redirect('barang');
	}
}
