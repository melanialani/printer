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
		$this->db->where('id_proses is null');
		return $this->db->get('hpembelian')->result_array();
	}

	public function getHistoryBeliClient() {
		$this->db->where('id_proses is null');
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
		$result = $this->insertHBeli($id,$date,$total,0);

		// insert ke dbeli
		foreach ($dbeli as $key => $value) {
			$result = $this->insertDBeliBarang($id,$value['varian'],$value['qty'],$value['jumlah']);
			$update = $this->MBarang->minStock($value['varian'],$value['qty'],'penjualan, no.nota = '.$id);
		}

		if ($result)
			return $id;
		return false;
	}

	public function insertBeliCetak($id_proses) {
		$date = date('Y-m-d H:i:s');

		// generate transaction id
		$id = preg_replace("/[^a-zA-Z0-9]/", "", strval($date));
		$id .= 'x' . $_SESSION['printer']['user']['id_user'];

		// get proses detail
		$value = $this->MProses->getOneProses($id_proses);
		$value = $value[0];

		// insert ke hbeli
		$result = $this->insertHBeli($id,$date,$value['total_harga'],1,$id_proses);

		// update table proses; save id trans
		$record = array(
			'id_trans' => $id
		);
		$this->db->where('id_proses', $id_proses);
		$result = $this->db->update('proses', $record);

		// reduce stock of varian
		$update = $this->MBarang->minStock($value['id_varian'],$value['qty'],'order cetak, no.nota = '.$id);

		// return transaction id if successfull
		if ($result)
			return $id;
		return false;
	}

	public function insertHBeli($id,$date,$total,$status,$id_proses=null) {
		$record = array(
			'id_trans' => $id,
			'id_user' => $_SESSION['printer']['user']['id_user'],
			'id_proses' => $id_proses,
			'tanggal_trans' => $date,
			'total_harga' => $total,
			'customer' => $_SESSION['printer']['user']['nama'],
			'status' => $status
		);
		return $this->db->insert('hpembelian', $record);
	}

	public function updateHargaTrans($id,$total) {
		$record = array(
			'total_harga' => $total
		);
		$this->db->where('id_trans', $id);
		return $this->db->update('hpembelian', $record);
	}

	public function updateStatusTrans($id,$status) {
		$record = array(
			'status' => $status
		);
		$this->db->where('id_trans', $id);
		return $this->db->update('hpembelian', $record);
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

#region pesan
	public function getPesanTrans($id) {
		$this->db->from('pesan p, user u');
		$this->db->where('p.id_user = u.id_user');
		$this->db->where('p.id_trans', $id);
		$this->db->order_by('p.tanggal_dibuat', 'desc');
		return $this->db->get()->result_array();
	}

	public function insertPesanTrans($trans,$pesan) {
		$record = array(
	  		'id_trans' => $trans,
	  		'id_user' => $_SESSION['printer']['user']['id_user'],
	  		'pesan' => $pesan,
	  		'tanggal_dibuat' => date('Y-m-d H:i:s')
		);
		return $this->db->insert('pesan', $record);
	}

}
