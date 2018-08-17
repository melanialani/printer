<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HistoryBarang extends CI_Controller {

	public function index() {
		$this->lst();
	}

	public function lst() {
		if ($_SESSION['printer']['user']['role'] == 0){
			$data['page_title'] = 'Stok Opname';
			$data['page_note'] = 'History keluar-masuk barang';

			$data['row'] = $this->MBarang->getAllHistory();

			$this->load->view('header', $data);
			$this->load->view('historybarang_list', $data);
			$this->load->view('footer', $data);
		} else {
			redirect('login');
		}
	}

	public function delete($id) {
		if ($_SESSION['printer']['user']['role'] == 0){
			$result = $this->MBarang->deleteHistoryBarang($id);
			if ($result) redirect('historybarang');
		} else {
			redirect('login');
		}
	}
}
