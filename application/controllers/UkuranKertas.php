<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UkuranKertas extends CI_Controller {

	public function index() {
		$this->lst();
	}

	public function lst() {
		$data['page_title'] = 'List Ukuran Kertas';
		$data['page_note'] = 'Daftar seluruh barang dan ukuran kertasnya';

		$data['row'] = $this->MUkuranKertas->getAllWithParent();

		$this->load->view('header', $data);
		$this->load->view('ukurankertas_list', $data);
		$this->load->view('footer', $data);
	}

	public function add() {
		$data['page_title'] = 'Tambah Ukuran Kertas Baru';
		$data['edited'] = false;

		$data['barang'] = $this->MBarang->getAll();

		if ($this->input->post('button') == 'save'){
			$result = $this->MUkuranKertas->insert($this->input->post('id_barang'),$this->input->post('nama'),$this->input->post('panjang'),$this->input->post('lebar'));
			if ($result)
				redirect('ukurankertas');
		}

		$this->load->view('header', $data);
		$this->load->view('ukurankertas_edit', $data);
		$this->load->view('footer', $data);
	}

	public function edit($id) {
		$data['page_title'] = 'Edit Ukuran Kertas';
		$data['edited'] = true;

		$data['barang'] = $this->MBarang->getAll();

		$detail = $this->MUkuranKertas->getOne($id);
		$data['detail'] = $detail[0];

		if ($this->input->post('button') == 'save'){
			$result = $this->MUkuranKertas->update($id,$this->input->post('id_barang'),$this->input->post('nama'),$this->input->post('panjang'),$this->input->post('lebar'));
			if ($result)
				redirect('ukurankertas');
		}

		$this->load->view('header', $data);
		$this->load->view('ukurankertas_edit', $data);
		$this->load->view('footer', $data);
	}

	public function delete($id) {
		$result = $this->MUkuranKertas->delete($id);
		if ($result) redirect('ukurankertas');
	}
}
