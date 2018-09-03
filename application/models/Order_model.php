<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAllHeader() {
		return $this->db->get('hpembelian')->result_array();
	}

	public function getOneHeader($id) {
		$this->db->where('id_trans', $id);
		return $this->db->get('hpembelian')->result_array();
	}

	public function getHistoryBeli() {
		$this->db->where('id_user', $_SESSION['printer']['user']['id_user']);
		return $this->db->get('hpembelian')->result_array();
	}

	public function getDetailBeli($id) {
		$this->db->select('db.id_varian, db.id_trans, db.qty_barang, db.jumlah, v.nama_varian, v.harga_jual, v.warna');
		$this->db->from('dpembelian_barang db, varian v');
		$this->db->where('db.id_varian = v.id_varian');
		$this->db->where('db.id_trans', $id);
		return $this->db->get()->result_array();
	}

	public function insertBeliBarang($total,$dbeli) {
		$date = date('Y-m-d H:i:s');

		// generate transaction id
		$id = preg_replace("/[^a-zA-Z0-9]/", "", strval($date));
		$id .= 'x' . $_SESSION['printer']['user']['id_user'];

		// insert ke hbeli
		$result = $this->insertHBeli($id,$date,$total);

		// insert ke dbeli
		foreach ($dbeli as $key => $value) {
			$result = $this->insertDBeliBarang($id,$value['varian'],$value['qty'],$value['jumlah']);
			$update = $this->MBarang->minStock($value['varian'],$value['qty'],'penjualan, no.nota = '.$id);
		}

		if ($result)
			return $id;
		return false;
	}

	public function insertHBeli($id,$date,$total) {
		$record = array(
			'id_trans' => $id,
			'id_user' => $_SESSION['printer']['user']['id_user'],
			'tanggal_trans' => $date,
			'total_harga' => $total,
			'customer' => $_SESSION['printer']['user']['nama']
		);
		return $this->db->insert('hpembelian', $record);
	}

	public function insertDBeliBarang($id_trans,$id_varian,$qty,$jumlah) {
		$record = array(
			'id_trans' => $id_trans,// auto-increment
			'id_varian' => $id_varian,
			'qty_barang' => $qty,
			'jumlah' => $jumlah
		);
		return $this->db->insert('dpembelian_barang', $record);
	}

	public function updateHBeli($id,$jenis_cetak,$numerator,$plong,$panjang,$lebar,$tinggi,$tanggal_jadi) {
		$record = array(
			'id_jenis_cetakan' => $jenis_cetak,
			'numerator' => $numerator,
			'plong' => $plong,
			'panjang_cetak' => $panjang,
			'lebar_cetak' => $lebar,
			'tinggi_cetak' => $tinggi,
			'tanggal_dibuat' => date('Y-m-d H:i:s'),
			'tanggal_jadi' => $tanggal_jadi
		);
		$this->db->where('id_proses', $id);
		return $this->db->update('proses', $record);
	}

	public function deleteHBeli($id) {
		$this->db->where('id_trans', $id);
		return $this->db->delete('hpembelian');
	}

}
