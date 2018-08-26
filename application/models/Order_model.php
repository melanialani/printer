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
		}

		return $result;
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
