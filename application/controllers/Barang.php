<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function index() {
		$this->lst();
	}

	// list barang tampilkan master barang biasa, bukan seperti referensi, karena bisa masukkan barang tanpa kategori
	// edit controller barang & view list barang

	public function lst() {
		$data['page_title'] = 'List Barang';
		$data['page_note'] = 'Daftar barang dan keterangannya';

		$data['row'] = $this->Barang->getAllChildNoMatterTheParent();

		$this->load->view('header', $data);
		$this->load->view('barang_list', $data);
		$this->load->view('footer', $data);
	}

	public function lst_parent() {
		$data['page_title'] = 'List Kategori Barang';
		$data['page_note'] = 'Daftar kategori barang';
		$data['ctl'] = 'barang';

		$data['row'] = $this->Barang->get_all_parent();

		$this->load->view('header', $data);
		$this->load->view('parent_list', $data);
		$this->load->view('footer', $data);
	}

	public function add_parent() {
		$data['page_title'] = 'Tambah Kategori Barang Baru';
		$data['ctl'] = 'barang';
		$data['edited'] = false;

		if ($this->input->post('button') == 'save'){
			$result = $this->Barang->insert_parent($this->input->post('nama'));
			if ($result)
				redirect('barang/lst_parent');
		}

		$this->load->view('header', $data);
		$this->load->view('parent_edit', $data);
		$this->load->view('footer', $data);
	}

	public function edit_parent($id) {
		$data['page_title'] = 'Edit Kategori Barang';
		$data['ctl'] = 'barang';
		$data['edited'] = true;

		$detail = $this->Barang->get_parent($id);
		$data['detail'] = $detail[0];

		if ($this->input->post('button') == 'save'){
			$result = $this->Barang->update_parent($id,$this->input->post('nama'));
			if ($result)
				redirect('barang/lst_parent');
		}

		$this->load->view('header', $data);
		$this->load->view('parent_edit', $data);
		$this->load->view('footer', $data);
	}

	public function delete_parent($id) {
		$result = $this->Barang->delete_parent($id);
		if ($result) redirect('barang/lst_parent');
	}

	public function add_child() {
		$data['page_title'] = 'Tambah Barang Baru';
		$data['edited'] = false;

		$data['parent'] = $this->Barang->get_all_parent();

		if ($this->input->post('button') == 'save'){
			$result = $this->Barang->insert_child($this->input->post('parent'),$this->input->post('nama'),$this->input->post('jumlah'),$this->input->post('warning'),$this->input->post('harga'),$this->input->post('ukuran'),$this->input->post('deskripsi'));
			if ($result)
				redirect('barang');
		}

		$this->load->view('header', $data);
		$this->load->view('barang_edit', $data);
		$this->load->view('footer', $data);
	}

	public function edit_child($id) {
		$data['page_title'] = 'Edit Barang Detail';
		$data['edited'] = true;

		$data['parent'] = $this->Barang->get_all_parent();

		$detail = $this->Barang->get_child($id);
		$data['detail'] = $detail[0];

		if ($this->input->post('button') == 'save'){
			$result = $this->Barang->update_child($id,$this->input->post('parent'),$this->input->post('nama'),$this->input->post('jumlah'),$this->input->post('warning'),$this->input->post('harga'),$this->input->post('ukuran'),$this->input->post('deskripsi'));
			if ($result)
				redirect('barang');
		}

		$this->load->view('header', $data);
		$this->load->view('barang_edit', $data);
		$this->load->view('footer', $data);
	}

	public function delete_child($id) {
		$result = $this->Barang->delete_child($id);
		if ($result) redirect('barang');
	}

}
