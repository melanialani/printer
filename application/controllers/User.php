<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index() {
		$this->lst();
	}

	public function lst() {
		$data['page_title'] = 'List User';
		$data['page_note'] = 'Daftar seluruh user';

		$data['row'] = $this->MUser->getAll();

		$this->load->view('header', $data);
		$this->load->view('user_list', $data);
		$this->load->view('footer', $data);
	}

	public function add() {
		$data['page_title'] = 'Tambah User Baru';
		$data['edited'] = false;

		$data['role'] = $this->MUser->getUserRole();

		if ($this->input->post('button') == 'save'){
			$result = $this->MUser->insert($this->input->post('username'),$this->input->post('password'),$this->input->post('nama'),$this->input->post('alamat'),$this->input->post('hp'),$this->input->post('email'),NULL,$this->input->post('role'),TRUE);
			if ($result)
				redirect('user');
		}

		$this->load->view('header', $data);
		$this->load->view('user_edit', $data);
		$this->load->view('footer', $data);
	}

	public function edit($id) {
		$data['page_title'] = 'Edit User';
		$data['edited'] = true;

		$data['role'] = $this->MUser->getUserRole();

		$detail = $this->MUser->getOne($id);
		$data['detail'] = $detail[0];

		if ($this->input->post('button') == 'save'){
			$result = $this->MUser->update($id,$this->input->post('username'),$this->input->post('password'),$this->input->post('nama'),$this->input->post('alamat'),$this->input->post('hp'),$this->input->post('email'),NULL,$this->input->post('role'),TRUE);
			if ($result)
				redirect('user');
		}

		$this->load->view('header', $data);
		$this->load->view('user_edit', $data);
		$this->load->view('footer', $data);
	}

	public function delete($id) {
		$result = $this->MUser->delete($id);
		if ($result) redirect('user');
	}

	public function active($id) {
		$result = $this->MUser->updateActiveUser($id, $this->input->post('status'));
		if ($result) redirect('user');
	}
}
