<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plong_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAll() {
		return $this->db->get('plong')->result_array();
	}

	public function getOne($id) {
		$this->db->where('id_plong', $id);
		return $this->db->get('plong')->result_array();
	}

	public function insert($nama,$panjang,$lebar,$harga) {
		$record = array(
			// 'id_plong' => $id,// auto-increment
			'nama_plong' => $nama,
			'panjang_plong' => $panjang,
			'lebar_plong' => $lebar,
			'harga_plong' => $harga
		);
		return $this->db->insert('plong', $record);
	}

	public function update($id,$nama,$panjang,$lebar,$harga) {
		$record = array(
			'nama_plong' => $nama,
			'panjang_plong' => $panjang,
			'lebar_plong' => $lebar,
			'harga_plong' => $harga
		);
		$this->db->where('id_plong', $id);
		return $this->db->update('plong', $record);
	}

	public function delete($id) {
		$this->db->where('id_plong', $id);
		return $this->db->delete('plong');
	}
}
