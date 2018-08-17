<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisBarang extends CI_Controller {

	public function index() {
		$this->lst();
	}

	public function lst() {
		if ($_SESSION['printer']['user']['role'] == 0){
			$data['page_title'] = 'List Jenis Barang';
			$data['page_note'] = 'Daftar seluruh jenis barang';

			$data['row'] = $this->MJenisBarang->getAll();

			$this->load->view('header', $data);
			$this->load->view('jenisbarang_list', $data);
			$this->load->view('footer', $data);
		} else {
			redirect('login');
		}
	}

	public function add() {
		if ($_SESSION['printer']['user']['role'] == 0){
			$data['page_title'] = 'Tambah Jenis Barang Baru';
			$data['edited'] = false;

			$data['barang'] = $this->MBarang->getAll();

			if ($this->input->post('button') == 'save'){
				$result = $this->MJenisBarang->insert($this->input->post('nama'));
				if ($result)
					redirect('jenisbarang');
			}

			$this->load->view('header', $data);
			$this->load->view('jenisbarang_edit', $data);
			$this->load->view('footer', $data);
		} else {
			redirect('login');
		}
	}

	public function edit($id) {
		if ($_SESSION['printer']['user']['role'] == 0){
			$data['page_title'] = 'Edit Jenis Barang';
			$data['edited'] = true;

			$data['barang'] = $this->MBarang->getAll();

			$detail = $this->MJenisBarang->getOne($id);
			$data['detail'] = $detail[0];

			if ($this->input->post('button') == 'save'){
				$result = $this->MJenisBarang->update($id,$this->input->post('nama'));
				if ($result)
					redirect('jenisbarang');
			}

			$this->load->view('header', $data);
			$this->load->view('jenisbarang_edit', $data);
			$this->load->view('footer', $data);
		} else {
			redirect('login');
		}
	}

	public function delete($id) {
		if ($_SESSION['printer']['user']['role'] == 0){
			$result = $this->MJenisBarang->delete($id);
			if ($result) redirect('jenisbarang');
		} else {
			redirect('login');
		}
	}
}
