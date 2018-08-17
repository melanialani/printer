<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisBarang_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAll() {
		return $this->db->get('jenis_barang')->result_array();
	}

	public function getOne($id) {
		$this->db->where('id_jenis_barang', $id);
		return $this->db->get('jenis_barang')->result_array();
	}

	public function insert($nama) {
		$record = array(
			// 'id_jenis_barang' => $id, // auto-increment
			'nama_jenis_barang' => $nama
		);
		return $this->db->insert('jenis_barang', $record);
	}

	public function update($id,$nama) {
		$record = array(
			'nama_jenis_barang' => $nama
		);
		$this->db->where('id_jenis_barang', $id);
		return $this->db->update('jenis_barang', $record);
	}

	public function delete($id) {
		$this->db->where('id_jenis_barang', $id);
		return $this->db->delete('jenis_barang');
	}
}
