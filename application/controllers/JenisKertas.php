<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisKertas extends CI_Controller {

	public function index() {
		$this->lst();
	}

	public function lst() {
		$data['page_title'] = 'List Jenis Kertas';
		$data['page_note'] = 'Daftar seluruh barang dan jenis-jenis kertasnya';

		$data['row'] = $this->MJenisKertas->getAllWithParent();

		$this->load->view('header', $data);
		$this->load->view('jeniskertas_list', $data);
		$this->load->view('footer', $data);
	}

	public function add() {
		$data['page_title'] = 'Tambah Jenis Kertas Baru';
		$data['edited'] = false;

		$data['barang'] = $this->MBarang->getAll();

		if ($this->input->post('button') == 'save'){
			$result = $this->MJenisKertas->insert($this->input->post('id_barang'),$this->input->post('nama'));
			if ($result)
				redirect('jeniskertas');
		}

		$this->load->view('header', $data);
		$this->load->view('jeniskertas_edit', $data);
		$this->load->view('footer', $data);
	}

	public function edit($id) {
		$data['page_title'] = 'Edit Jenis Kertas';
		$data['edited'] = true;

		$data['barang'] = $this->MBarang->getAll();

		$detail = $this->MJenisKertas->getOne($id);
		$data['detail'] = $detail[0];

		if ($this->input->post('button') == 'save'){
			$result = $this->MJenisKertas->update($id,$this->input->post('id_barang'),$this->input->post('nama'));
			if ($result)
				redirect('jeniskertas');
		}

		$this->load->view('header', $data);
		$this->load->view('jeniskertas_edit', $data);
		$this->load->view('footer', $data);
	}

	public function delete($id) {
		$result = $this->MJenisKertas->delete($id);
		if ($result) redirect('jeniskertas');
	}
}
