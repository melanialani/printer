<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function index() {
		$this->lst();
	}

	public function lst() {
		if ($_SESSION['printer']['user']['role'] == 0){
			$data['page_title'] = 'List Barang';
			$data['page_note'] = 'Daftar barang dan detailnya';

			$data['row'] = $this->MBarang->getAll();

			$this->load->view('header', $data);
			$this->load->view('barang_list', $data);
			$this->load->view('footer', $data);
		} else {
			redirect('login');
		}
	}

	public function add() {
		if ($_SESSION['printer']['user']['role'] == 0){
			$data['page_title'] = 'Tambah Barang Baru';
			$data['edited'] = false;

			if ($this->input->post('button') == 'save'){
				$result = $this->MBarang->insert($this->input->post('nama'),$this->input->post('jumlah'),$this->input->post('beli'),$this->input->post('jual'),$this->input->post('stock_awal'),$this->input->post('stock'),$this->input->post('warna'),$this->input->post('warning'));
				if ($result)
					redirect('barang');
			}

			$this->load->view('header', $data);
			$this->load->view('barang_edit', $data);
			$this->load->view('footer', $data);
		} else {
			redirect('login');
		}
	}

	public function edit($id) {
		if ($_SESSION['printer']['user']['role'] == 0){
			$data['page_title'] = 'Edit Barang';
			$data['edited'] = true;

			$detail = $this->MBarang->getOne($id);
			$data['detail'] = $detail[0];

			if ($this->input->post('button') == 'save'){
				$result = $this->MBarang->update($id,$this->input->post('nama'),$this->input->post('jumlah'),$this->input->post('beli'),$this->input->post('jual'),$this->input->post('stock_awal'),$this->input->post('stock'),$this->input->post('warna'),$this->input->post('warning'));
				if ($result)
					redirect('barang');
			}

			$this->load->view('header', $data);
			$this->load->view('barang_edit', $data);
			$this->load->view('footer', $data);
		} else {
			redirect('login');
		}
	}

	public function delete($id) {
		if ($_SESSION['printer']['user']['role'] == 0){
			$result = $this->MBarang->delete($id);
			if ($result) redirect('barang');
		} else {
			redirect('login');
		}
	}
}
