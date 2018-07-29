<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisKertas_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAll() {
		return $this->db->get('jenis_kertas')->result_array();
	}

	public function getAllWithParent() {
		$this->db->from('barang b, jenis_kertas jk');
		$this->db->where('b.id_barang = jk.id_barang');
		$this->db->order_by('jk.id_barang', 'asc');
		return $this->db->get()->result_array();
	}

	public function getSiblings($id_barang) {
		$this->db->from('barang b, jenis_kertas jk');
		$this->db->where('b.id_barang = jk.id_barang');
		$this->db->where('jk.id_barang', $id_barang);
		return $this->db->get()->result_array();
	}

	public function getOne($id) {
		$this->db->where('id_jenis_kertas', $id);
		return $this->db->get('jenis_kertas')->result_array();
	}

	public function insert($id_barang,$nama) {
		$record = array(
			// 'id_jenis_kertas' => $id, // auto-increment
			'id_barang' => $id_barang,
			'namajenis_kertas' => $nama
		);
		return $this->db->insert('jenis_kertas', $record);
	}

	public function update($id,$id_barang,$nama) {
		$record = array(
			// 'id_jenis_kertas' => $id, // cannot be changed on update
			'id_barang' => $id_barang,
			'namajenis_kertas' => $nama
		);
		$this->db->where('id_jenis_kertas', $id);
		return $this->db->update('jenis_kertas', $record);
	}

	public function delete($id) {
		$this->db->where('id_jenis_kertas', $id);
		return $this->db->delete('jenis_kertas');
	}
}
