<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAll() {
		return $this->db->get('barang')->result_array();
	}

	public function getOne($id) {
		$this->db->where('id', $id);
		return $this->db->get('barang')->result_array();
	}

	public function insert($nama,$jumlah,$warning,$harga) {
		$record = array(
			'nama' => $nama,
			'jumlah' => $jumlah,
			'warning' => $warning,
			'harga' => $harga
		);
		return $this->db->insert('barang', $record);
	}

	public function update($id,$nama,$jumlah,$warning,$harga) {
		$record = array(
			'nama' => $nama,
			'jumlah' => $jumlah,
			'warning' => $warning,
			'harga' => $harga
		);
		$this->db->where('id', $id);
		return $this->db->update('barang', $record);
	}

	public function delete($id) {
		$this->db->where('id', $id);
		return $this->db->delete('barang');
	}
}
