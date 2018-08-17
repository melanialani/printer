<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function index() {
		$this->lst();
	}

	public function lst() {
		if ($_SESSION['printer']['user']['role'] == 0){
			$data['page_title'] = 'List Varian';
			$data['page_note'] = 'Daftar varian dan detailnya';

			$data['row'] = $this->MBarang->getAllWithParent();

			$this->load->view('header', $data);
			$this->load->view('barang_list', $data);
			$this->load->view('footer', $data);
		} else {
			redirect('login');
		}
	}

	public function add() {
		if ($_SESSION['printer']['user']['role'] == 0){
			$data['page_title'] = 'Tambah Varian Baru';
			$data['edited'] = false;

			$data['jenis_barang'] = $this->MJenisBarang->getAll();
			$data['jenis_kertas'] = $this->MJenisKertas->getAll();
			$data['ukuran_kertas'] = $this->MUkuranKertas->getAll();

			if ($this->input->post('button') == 'save'){
				$result = $this->MBarang->insert($this->input->post('jenis_barang'),$this->input->post('ukuran_kertas'),$this->input->post('jenis_kertas'),$this->input->post('nama'),$this->input->post('jumlah'),$this->input->post('stock_awal'),$this->input->post('stock'),$this->input->post('warna'),$this->input->post('beli'),$this->input->post('jual'),$this->input->post('warning'));
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
			$data['page_title'] = 'Edit Varian';
			$data['edited'] = true;

			$data['jenis_barang'] = $this->MJenisBarang->getAll();
			$data['jenis_kertas'] = $this->MJenisKertas->getAll();
			$data['ukuran_kertas'] = $this->MUkuranKertas->getAll();

			$detail = $this->MBarang->getOne($id);
			$data['detail'] = $detail[0];

			if ($this->input->post('button') == 'save'){
				$result = $this->MBarang->update($this->input->post('jenis_barang'),$this->input->post('ukuran_kertas'),$this->input->post('jenis_kertas'),$this->input->post('nama'),$this->input->post('jumlah'),$this->input->post('stock_awal'),$this->input->post('stock'),$this->input->post('warna'),$this->input->post('beli'),$this->input->post('jual'),$this->input->post('warning'));
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
