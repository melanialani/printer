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

	public function getAllWithParent() {
		$this->db->from('barang b, ukuran_kertas uk');
		$this->db->where('b.id_barang = uk.id_barang');
		$this->db->order_by('uk.id_barang', 'asc');
		return $this->db->get()->result_array();
	}

	public function getSiblings($id_barang) {
		$this->db->from('barang b, ukuran_kertas uk');
		$this->db->where('b.id_barang = uk.id_barang');
		$this->db->where('uk.id_barang', $id_barang);
		return $this->db->get()->result_array();
	}

	public function getOne($id) {
		$this->db->where('id_ukuran_kertas', $id);
		return $this->db->get('ukuran_kertas')->result_array();
	}

	public function insert($id_barang,$nama,$panjang,$lebar) {
		$record = array(
			// 'id_ukuran_kertas' => $id, // auto-increment
			'id_barang' => $id_barang,
			'nama_ukuran_kertas' => $nama,
			'panjang_kertas' => $panjang,
			'lebar_kertas' => $lebar
		);
		return $this->db->insert('ukuran_kertas', $record);
	}

	public function update($id,$id_barang,$nama,$panjang,$lebar) {
		$record = array(
			// 'id_ukuran_kertas' => $id, // cannot be changed on update
			'id_barang' => $id_barang,
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
