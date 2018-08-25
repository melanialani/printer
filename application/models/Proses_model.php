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

#region others
	public function insertImage($data) {
		$record = array(
			'file_name' => $data['file_name'],
	  		'file_type' => $data['file_type'],
	  		'file_path' => $data['file_path'],
	  		'full_path' => $data['full_path'],
	  		'raw_name' => $data['raw_name'],
	  		'orig_name' => $data['orig_name'],
	  		'client_name' => $data['client_name'],
	  		'file_ext' => $data['file_ext'],
	  		'file_size' => $data['file_size'],
	  		'image_width' => $data['image_width'],
	  		'image_height' => $data['image_height'],
	  		'image_type' => $data['image_type'],
	  		'image_size_str' => $data['image_size_str']
		);
		return $this->db->insert('image', $record);
	}

	public function deleteImage($id) {
		$this->db->where('id_image', $id);
		return $this->db->delete('image');
	}
}
