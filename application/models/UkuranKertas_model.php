<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UkuranKertas_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAll() {
		return $this->db->get('ukuran_kertas')->result_array();
	}

	public function getOne($id) {
		$this->db->where('id_ukuran_kertas', $id);
		return $this->db->get('ukuran_kertas')->result_array();
	}

	public function insert($nama,$panjang,$lebar) {
		$record = array(
			// 'id_ukuran_kertas' => $id, // auto-increment
			'nama_ukuran_kertas' => $nama,
			'panjang_kertas' => $panjang,
			'lebar_kertas' => $lebar
		);
		return $this->db->insert('ukuran_kertas', $record);
	}

	public function update($id,$nama,$panjang,$lebar) {
		$record = array(
			'nama_ukuran_kertas' => $nama,
			'panjang_kertas' => $panjang,
			'lebar_kertas' => $lebar
		);
		$this->db->where('id_ukuran_kertas', $id);
		return $this->db->update('ukuran_kertas', $record);
	}

	public function delete($id) {
		$this->db->where('id_ukuran_kertas', $id);
		return $this->db->delete('ukuran_kertas');
	}
}
