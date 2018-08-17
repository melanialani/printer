<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisKertas extends CI_Controller {

	public function index() {
		$this->lst();
	}

	public function lst() {
		if ($_SESSION['printer']['user']['role'] == 0){
			$data['page_title'] = 'List Jenis Kertas';
			$data['page_note'] = 'Daftar seluruh jenis kertas';

			$data['row'] = $this->MJenisKertas->getAll();

			$this->load->view('header', $data);
			$this->load->view('jeniskertas_list', $data);
			$this->load->view('footer', $data);
		} else {
			redirect('login');
		}
	}

	public function add() {
		if ($_SESSION['printer']['user']['role'] == 0){
			$data['page_title'] = 'Tambah Jenis Kertas Baru';
			$data['edited'] = false;

			$data['barang'] = $this->MBarang->getAll();

			if ($this->input->post('button') == 'save'){
				$result = $this->MJenisKertas->insert($this->input->post('nama'));
				if ($result)
					redirect('jeniskertas');
			}

			$this->load->view('header', $data);
			$this->load->view('jeniskertas_edit', $data);
			$this->load->view('footer', $data);
		} else {
			redirect('login');
		}
	}

	public function edit($id) {
		if ($_SESSION['printer']['user']['role'] == 0){
			$data['page_title'] = 'Edit Jenis Kertas';
			$data['edited'] = true;

			$data['barang'] = $this->MBarang->getAll();

			$detail = $this->MJenisKertas->getOne($id);
			$data['detail'] = $detail[0];

			if ($this->input->post('button') == 'save'){
				$result = $this->MJenisKertas->update($id,$this->input->post('nama'));
				if ($result)
					redirect('jeniskertas');
			}

			$this->load->view('header', $data);
			$this->load->view('jeniskertas_edit', $data);
			$this->load->view('footer', $data);
		} else {
			redirect('login');
		}
	}

	public function delete($id) {
		if ($_SESSION['printer']['user']['role'] == 0){
			$result = $this->MJenisKertas->delete($id);
			if ($result) redirect('jeniskertas');
		} else {
			redirect('login');
		}
	}
}
