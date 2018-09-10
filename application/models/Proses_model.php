<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proses_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function getComboLaminasi() {
		$laminasi = array(
			array(
				'id_laminasi' => 0,
				'nama_laminasi' => 'Tanpa Laminasi'),
			array(
				'id_laminasi' => 1,
				'nama_laminasi' => 'Glossy'),
			array(
				'id_laminasi' => 2,
				'nama_laminasi' => 'Dove'),
		);
		return $laminasi;
	}

#region proses
	public function getAllProses() {
		return $this->db->get('proses')->result_array();
	}

	public function getOneProses($id) {
		$this->db->where('id_proses', $id);
		return $this->db->get('proses')->result_array();
	}

	public function insertProses($panjang,$lebar,$tinggi,$jenis_cetak,$jenis_kertas,$varian,$qty,$total,$laminasi,$plong,$numerator,$uv,$jadi) {
		$date = date('Y-m-d H:i:s');

		// generate transaction id
		$id = preg_replace("/[^a-zA-Z0-9]/", "", strval($date));
		$id .= 'x' . $_SESSION['printer']['user']['id_user'];

		// insert ke proses
		$record = array(
			'id_proses' => $id,
			'id_user' => $_SESSION['printer']['user']['id_user'],
			'id_jenis_cetakan' => $jenis_cetak,
			'id_jenis_kertas' => $jenis_kertas,
			'id_varian' => $varian,
			'qty' => $qty,
			'total_harga' => $total,
			'laminasi' => $laminasi,
			'numerator' => $numerator,
			'plong' => $plong,
			'uv' => $uv,
			'panjang_cetak' => $panjang,
			'lebar_cetak' => $lebar,
			'tinggi_cetak' => $tinggi,
			'tanggal_dibuat' => $date,
			'tanggal_jadi' => $jadi
		);
		return $this->db->insert('proses', $record);
	}

	public function updateProses($id,$panjang,$lebar,$tinggi,$jenis_cetak,$jenis_kertas,$varian,$qty,$total,$laminasi,$plong,$numerator,$uv,$jadi) {
		$record = array(
			'id_user' => $_SESSION['printer']['user']['id_user'],
			'id_jenis_cetakan' => $jenis_cetak,
			'id_jenis_kertas' => $jenis_kertas,
			'id_varian' => $varian,
			'qty' => $qty,
			'total_harga' => $total,
			'laminasi' => $laminasi,
			'numerator' => $numerator,
			'plong' => $plong,
			'uv' => $uv,
			'panjang_cetak' => $panjang,
			'lebar_cetak' => $lebar,
			'tinggi_cetak' => $tinggi,
			'tanggal_dibuat' => $date,
			'tanggal_jadi' => $jadi
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

#region image
	public function getImageProses($id) {
		$this->db->from('image i, user u');
		$this->db->where('i.id_user = u.id_user');
		$this->db->where('i.id_proses', $id);
		$this->db->order_by('i.tanggal_upload', 'desc');
		return $this->db->get()->result();
	}

	public function insertImage($data,$proses,$comment) {
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
	  		'image_size_str' => $data['image_size_str'],
	  		'id_proses' => $proses,
	  		'id_user' => $_SESSION['printer']['user']['id_user'],
	  		'comment' => $comment,
	  		'tanggal_upload' => date('Y-m-d H:i:s')
		);
		return $this->db->insert('image', $record);
	}

	public function deleteImage($id) {
		$this->db->where('id_image', $id);
		return $this->db->delete('image');
	}

#region others
	public function getHistoryCetak($id=null) {
		$this->db->from('proses p, jenis_cetakan jc, jenis_kertas jk, varian v');
		$this->db->where('p.id_jenis_cetakan = jc.id_jenis_cetakan');
		$this->db->where('p.id_jenis_kertas = jk.id_jenis_kertas');
		$this->db->where('p.id_varian = v.id_varian');

		if (!empty($id))
			$this->db->where('p.id_proses', $id);

		return $this->db->get()->result_array();
	}

	public function getDetailCetak($id) {
		$this->db->from('proses p, jenis_cetakan jc, jenis_kertas jk, varian v, image i');
		$this->db->where('p.id_jenis_cetakan = jc.id_jenis_cetakan');
		$this->db->where('p.id_jenis_kertas = jk.id_jenis_kertas');
		$this->db->where('p.id_varian = v.id_varian');
		$this->db->where('p.id_proses = i.id_proses');
		$this->db->where('p.id_proses', $id);
		return $this->db->get()->result_array();
	}

}
