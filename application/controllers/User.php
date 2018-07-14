<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index() {
		$this->lst();
	}

	public function lst() {
		$data['page_title'] = 'List User';
		$data['page_note'] = 'Daftar seluruh user';

		$data['row'] = $this->User->getAll();

		$this->load->view('header', $data);
		$this->load->view('user_list', $data);
		$this->load->view('footer', $data);
	}

	public function add() {
		$data['page_title'] = 'Tambah User Baru';
		$data['edited'] = false;

		$data['role'] = $this->User->getUserRole();

		if ($this->input->post('button') == 'save'){
			$result = $this->User->insert($this->input->post('nama'),$this->input->post('username'),$this->input->post('password'),$this->input->post('email'),NULL,$this->input->post('role'),TRUE);
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

		$data['role'] = $this->User->getUserRole();

		$detail = $this->User->getOne($id);
		$data['detail'] = $detail[0];

		if ($this->input->post('button') == 'save'){
			$result = $this->User->update($id,$this->input->post('nama'),$this->input->post('username'),$this->input->post('password'),$this->input->post('email'),NULL,$this->input->post('role'),TRUE);
			if ($result)
				redirect('user');
		}

		$this->load->view('header', $data);
		$this->load->view('user_edit', $data);
		$this->load->view('footer', $data);
	}

	public function delete($id) {
		$result = $this->User->delete($id);
		if ($result) redirect('user');
	}

	public function active($id) {
		$result = $this->User->updateActiveUser($id, $this->input->post('status'));
		if ($result) redirect('user');
	}
}