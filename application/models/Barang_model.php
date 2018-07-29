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
		$this->db->where('id_barang', $id);
		return $this->db->get('barang')->result_array();
	}

	public function insert($nama,$jumlah,$beli,$jual,$stock_awal,$stock,$warna) {
		$record = array(
			// 'id_barang' => $id, // auto-increment
			'nama_barang' => $nama,
			'jumlah' => $jumlah,
			'harga_beli' => $beli,
			'harga_jual' => $jual,
			'stock_awal' => $stock_awal,
			'stock' => $stock,
			'warna' => $warna
		);
		return $this->db->insert('barang', $record);
	}

	public function update($id,$nama,$jumlah,$beli,$jual,$stock_awal,$stock,$warna) {
		$record = array(
			// 'id_barang' => $id, // cannot be changed on update
			'nama_barang' => $nama,
			'jumlah' => $jumlah,
			'harga_beli' => $beli,
			'harga_jual' => $jual,
			'stock_awal' => $stock_awal,
			'stock' => $stock,
			'warna' => $warna		
		);
		$this->db->where('id_barang', $id);
		return $this->db->update('barang', $record);
	}

	public function delete($id) {
		$this->db->where('id_barang', $id);
		return $this->db->delete('barang');
	}
}
