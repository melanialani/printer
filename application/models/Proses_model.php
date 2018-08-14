<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proses_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

#region proses
	public function getAllProses() {
		return $this->db->get('proses')->result_array();
	}

	public function getOneProses($id) {
		$this->db->where('id_proses', $id);
		return $this->db->get('proses')->result_array();
	}

	public function insertProses($jenis_cetakan,$panjang,$lebar,$tinggi,$numerator=0,$plong=0) {
		$record = array(
			// 'id_proses' => $id, // auto-increment
			'id_jenis_cetakan' => $jenis_cetakan,
			'panjang_cetak' => $panjang,
			'lebar_cetak' => $lebar,
			'tinggi_cetak' => $tinggi,
			'numerator' => $numerator,
			'plong' => $plong
		);
		return $this->db->insert('proses', $record);
	}

	public function updateProses($id,$jenis_cetakan,$panjang,$lebar,$tinggi,$numerator,$plong) {
		$record = array(
			'id_jenis_cetakan' => $jenis_cetakan,
			'panjang_cetak' => $panjang,
			'lebar_cetak' => $lebar,
			'tinggi_cetak' => $tinggi,
			'numerator' => $numerator,
			'plong' => $plong
		);
		$this->db->where('id_proses', $id);
		return $this->db->update('proses', $record);
	}

	public function deleteProses($id) {
		$this->db->where('id_proses', $id);
		return $this->db->delete('proses');
	}
#endregion
#region detail proses
	public function getAllDetailProses() {
		return $this->db->get('detailbarangproses')->result_array();
	}

	public function getOneDetailProses($id_proses,$id_barang) {
		$this->db->where('id_proses', $id_proses);
		$this->db->where('id_barang', $id_barang);
		return $this->db->get('detailbarangproses')->result_array();
	}

	public function getOneDetailProsesByIdProses($id_proses) {
		$this->db->where('id_proses', $id);
		return $this->db->get('detailbarangproses')->result_array();
	}

	public function insertDetailProses($id_proses,$id_barang,$qty,$harga) {
		$record = array(
			'id_barang' => $id_barang,
			'id_proses' => $id_proses,
			'qty_barang' => $qty,
			'jumlah_harga' => $harga
		);
		return $this->db->insert('detailbarangproses', $record);
	}

	public function updateDetailProses($id_proses,$id_barang,$qty,$harga) {
		$record = array(
			// 'id_barang' => $id_barang, // cannot be changed on update since its a PK
			// 'id_proses' => $id_proses, // cannot be changed on update since its a PK
			'qty_barang' => $qty,
			'jumlah_harga' => $harga
		);
		$this->db->where('id_proses', $id_proses);
		$this->db->where('id_barang', $id_barang);
		return $this->db->update('detailbarangproses', $record);
	}

	public function deleteDetailProses($id_proses,$id_barang) {
		$this->db->where('id_proses', $id_proses);
		$this->db->where('id_barang', $id_barang);
		return $this->db->delete('detailbarangproses');
	}
#endregion
}
