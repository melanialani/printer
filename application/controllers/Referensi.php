<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Referensi extends CI_Controller {

	public function index() {
		$this->lst();
	}

	public function lst() {
		$data['page_title'] = 'List Referensi';
		$data['page_note'] = 'Referensi yang akan ditampilkan untuk calon client';

		$data['row'] = $this->MReferensi->getAllParent();

		$this->load->view('header', $data);
		$this->load->view('referensi_list', $data);
		$this->load->view('footer', $data);
	}

	public function detail($id=null) {
		$data['page_title'] = 'List Referensi';
		$data['page_note'] = 'Referensi yang akan ditampilkan untuk calon client';
		$data['page_title_detail'] = 'Detail Referensi';
		$data['page_note_detail'] = 'Detail dari tipe referensi yang akan ditampilkan untuk calon client';
		$data['detail'] = true;
		
		$data['row'] = $this->MReferensi->getAllParent();
		$data['row_detail'] = $this->MReferensi->getAllReferensiDetail($id);

		$_SESSION['printer']['parent'] = $id;

		$this->load->view('header', $data);
		$this->load->view('referensi_list', $data);
		$this->load->view('footer', $data);
	}

	public function add_parent() {
		$data['page_title'] = 'Tambah Jenis Referensi Baru';
		$data['ctl'] = 'referensi';
		$data['edited'] = false;

		if ($this->input->post('button') == 'save'){
			$result = $this->MReferensi->insert_parent($this->input->post('nama'));
			if ($result)
				redirect('referensi');
		}

		$this->load->view('header', $data);
		$this->load->view('parent_edit', $data);
		$this->load->view('footer', $data);
	}

	public function edit_parent($id) {
		$data['page_title'] = 'Edit Jenis Referensi';
		$data['ctl'] = 'referensi';
		$data['edited'] = true;

		$detail = $this->MReferensi->get_parent($id);
		$data['detail'] = $detail[0];

		if ($this->input->post('button') == 'save'){
			$result = $this->MReferensi->update_parent($id,$this->input->post('nama'));
			if ($result)
				redirect('referensi');
		}

		$this->load->view('header', $data);
		$this->load->view('parent_edit', $data);
		$this->load->view('footer', $data);
	}

	public function delete_parent($id) {
		$result = $this->MReferensi->delete_parent($id);
		if ($result) redirect('referensi');
	}

	public function add_child() {
		$data['page_title'] = 'Tambah Referensi Detail Baru';
		$data['edited'] = false;

		$data['parent'] = $this->MReferensi->get_all_parent();

		if ($this->input->post('button') == 'save'){
			$result = $this->MReferensi->insert_child($this->input->post('parent'),$this->input->post('nama'));
			if ($result)
				redirect('referensi/detail/'.$_SESSION['printer']['parent']);
		}

		$this->load->view('header', $data);
		$this->load->view('referensi_edit', $data);
		$this->load->view('footer', $data);
	}

	public function edit_child($id) {
		$data['page_title'] = 'Edit Referensi Detail';
		$data['edited'] = true;

		$data['parent'] = $this->MReferensi->get_all_parent();

		$detail = $this->MReferensi->get_child($id);
		$data['detail'] = $detail[0];

		if ($this->input->post('button') == 'save'){
			$result = $this->MReferensi->update_child($id,$this->input->post('parent'),$this->input->post('nama'));
			if ($result)
				redirect('referensi/detail/'.$_SESSION['printer']['parent']);
		}

		$this->load->view('header', $data);
		$this->load->view('referensi_edit', $data);
		$this->load->view('footer', $data);
	}

	public function delete_child($id) {
		$result = $this->MReferensi->delete_parent($id);
		if ($result) redirect('referensi/detail/'.$_SESSION['printer']['parent']);
	}
}
