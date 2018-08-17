<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
#region table barang
	public function getAll() {
		return $this->db->get('varian')->result_array();
	}

	public function getAllWithParent() {
		$this->db->from('varian v, jenis_barang jb, ukuran_kertas uk, jenis_kertas jk');
		$this->db->where('v.id_jenis_barang = jb.id_jenis_barang');
		$this->db->where('v.id_ukuran_kertas = uk.id_ukuran_kertas');
		$this->db->where('v.id_jenis_kertas = jk.id_jenis_kertas');
		$this->db->order_by('v.id_varian', 'asc');
		return $this->db->get()->result_array();
	}

	public function getOne($id) {
		$this->db->where('id_varian', $id);
		return $this->db->get('varian')->result_array();
	}

	public function insert($id_jenis_barang,$id_ukuran_kertas,$id_jenis_kertas,$nama,$jumlah,$stock_awal,$stock,$warna,$beli,$jual,$warning) {
		$record = array(
			// 'id_varian' => $id, // auto-increment
			'id_jenis_barang' => $id_jenis_barang,
			'id_ukuran_kertas' => $id_ukuran_kertas,
			'id_jenis_kertas' => $id_jenis_kertas,
			'nama_varian' => $nama,
			'jumlah' => $jumlah,
			'stock_awal' => $stock_awal,
			'stock' => $stock,
			'warna' => $warna,
			'harga_beli' => $beli,
			'harga_jual' => $jual,
			'warning' => $warning
		);
		return $this->db->insert('varian', $record);
	}

	public function update($id,$id_jenis_barang,$id_ukuran_kertas,$id_jenis_kertas,$nama,$jumlah,$stock_awal,$stock,$warna,$beli,$jual,$warning) {
		$record = array(
			'id_jenis_barang' => $id_jenis_barang,
			'id_ukuran_kertas' => $id_ukuran_kertas,
			'id_jenis_kertas' => $id_jenis_kertas,
			'nama_varian' => $nama,
			'jumlah' => $jumlah,
			'stock_awal' => $stock_awal,
			'stock' => $stock,
			'warna' => $warna,
			'harga_beli' => $beli,
			'harga_jual' => $jual,
			'warning' => $warning
		);
		$this->db->where('id_varian', $id);
		return $this->db->update('varian', $record);
	}

	public function delete($id) {
		$this->db->where('id_varian', $id);
		return $this->db->delete('varian');
	}

	public function getAllWarna() {
		$this->db->select('warna');
		$this->db->group_by('warna');
		return $this->db->get('varian')->result_array();
	}
#endregion

#region table history barang
	public function getAllHistory() {
		$this->db->from('history h, varian b');
		$this->db->where('h.id_varian = b.id_varian');
		$this->db->order_by('h.tanggal', 'desc');
		return $this->db->get()->result_array();
	}

	public function getAllHistoryByIdBarang($id_barang) {
		$this->db->where('id_varian', $id_barang);
		$this->db->order_by('tanggal', 'desc');
		return $this->db->get('history')->result_array();
	}

	public function getOneHistory($id) {
		$this->db->where('id_history', $id);
		return $this->db->get('history')->result_array();
	}

	public function insertHistoryBarang($id_barang,$deskripsi) {
		$record = array(
			// 'id_history' => $id, // auto-increment
			'id_varian' => $id_barang,
			'tanggal' => date('Y-m-d H:i:s'),
			'deskripsi' => $deskripsi
		);
		return $this->db->insert('history', $record);
	}

	public function deleteHistoryBarang($id) {
		$this->db->where('id_history', $id);
		return $this->db->delete('history');
	}
#endregion
}
