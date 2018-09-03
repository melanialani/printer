<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plong extends CI_Controller {

	public function index() {
		$this->lst();
	}

	public function lst() {
		if ($_SESSION['printer']['user']['role'] == 0){
			$data['page_title'] = 'List Pisau Plong';
			$data['page_note'] = 'Daftar ukuran pisau plong yang tersedia';

			$data['row'] = $this->MPlong->getAll();

			$this->load->view('header', $data);
			$this->load->view('plong_list', $data);
			$this->load->view('footer', $data);
		} else {
			redirect('login');
		}
	}

	public function add() {
		if ($_SESSION['printer']['user']['role'] == 0){
			$data['page_title'] = 'Tambah Pisau Plong Baru';
			$data['edited'] = false;

			if ($this->input->post('button') == 'save'){
				$result = $this->MPlong->insert($this->input->post('nama'));
				if ($result)
					redirect('plong');
			}

			$this->load->view('header', $data);
			$this->load->view('plong_edit', $data);
			$this->load->view('footer', $data);
		} else {
			redirect('login');
		}
	}

	public function edit($id) {
		if ($_SESSION['printer']['user']['role'] == 0){
			$data['page_title'] = 'Edit Pisau Plong';
			$data['edited'] = true;

			$detail = $this->MPlong->getOne($id);
			$data['detail'] = $detail[0];

			if ($this->input->post('button') == 'save'){
				$result = $this->MPlong->update($id,$this->input->post('nama'));
				if ($result)
					redirect('plong');
			}

			$this->load->view('header', $data);
			$this->load->view('plong_edit', $data);
			$this->load->view('footer', $data);
		} else {
			redirect('login');
		}
	}

	public function delete($id) {
		if ($_SESSION['printer']['user']['role'] == 0){
			$result = $this->MPlong->delete($id);
			if ($result) redirect('plong');
		} else {
			redirect('login');
		}
	}
}
