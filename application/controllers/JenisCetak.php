<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisCetak extends CI_Controller {

	public function index() {
		$this->lst();
	}

	public function lst() {
		if ($_SESSION['printer']['user']['role'] == 0){
			$data['page_title'] = 'List Jenis Cetakan';
			$data['page_note'] = 'Daftar jenis cetakan yang tersedia';

			$data['row'] = $this->MJenisCetak->getAll();

			$this->load->view('header', $data);
			$this->load->view('jeniscetak_list', $data);
			$this->load->view('footer', $data);
		} else {
			redirect('login');
		}
	}

	public function add() {
		if ($_SESSION['printer']['user']['role'] == 0){
			$data['page_title'] = 'Tambah Jenis Cetakan Baru';
			$data['edited'] = false;

			if ($this->input->post('button') == 'save'){
				$result = $this->MJenisCetak->insert($this->input->post('nama'));
				if ($result)
					redirect('jeniscetak');
			}

			$this->load->view('header', $data);
			$this->load->view('jeniscetak_edit', $data);
			$this->load->view('footer', $data);
		} else {
			redirect('login');
		}
	}

	public function edit($id) {
		if ($_SESSION['printer']['user']['role'] == 0){
			$data['page_title'] = 'Edit Jenis Cetakan';
			$data['edited'] = true;

			$detail = $this->MJenisCetak->getOne($id);
			$data['detail'] = $detail[0];

			if ($this->input->post('button') == 'save'){
				$result = $this->MJenisCetak->update($id,$this->input->post('nama'));
				if ($result)
					redirect('jeniscetak');
			}

			$this->load->view('header', $data);
			$this->load->view('jeniscetak_edit', $data);
			$this->load->view('footer', $data);
		} else {
			redirect('login');
		}
	}

	public function delete($id) {
		if ($_SESSION['printer']['user']['role'] == 0){
			$result = $this->MJenisCetak->delete($id);
			if ($result) redirect('jeniscetak');
		} else {
			redirect('login');
		}
	}
}
