<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAllBarang() {
		return $this->db->get('barang')->result_array();
	}

	public function addBarang($nama,$jumlah,$warning,$harga) {
		$record = array(
			'nama' => $nama,
			'jumlah' => $jumlah,
			'warning' => $warning,
			'harga' => $harga
		);
		return $this->db->insert('barang', $record)->result_array();
	}
}
