<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAllParent() {
		$this->db->order_by('id', 'asc');
		return $this->db->get('barang_jenis')->result_array();
	}

	public function getAllChildNoMatterTheParent() {
		$this->db->select('d.id, p.id as parent, p.nama as nama_parent, d.nama, d.jumlah, d.warning, d.harga, d.ukuran, d.deskripsi');
		$this->db->from('barang_jenis p, barang d');
		$this->db->where('p.id = d.id_jenis');
		return $this->db->get()->result_array();
	}

	public function getAllChildOfParent($id_parent) {
		$this->db->select('d.id, p.id as parent, p.nama as nama_parent, d.nama, d.jumlah, d.warning, d.harga, d.ukuran, d.deskripsi');
		$this->db->from('barang_jenis p, barang d');
		$this->db->where('p.id = d.id_jenis');
		$this->db->where('p.id', $id_parent);
		return $this->db->get()->result_array();
	}

	public function get_all_parent() {
		return $this->db->get('barang_jenis')->result_array();
	}

	public function get_parent($id) {
		$this->db->where('id', $id);
		return $this->db->get('barang_jenis')->result_array();
	}

	public function insert_parent($nama) {
		$record = array(
			'nama' => $nama
		);
		return $this->db->insert('barang_jenis', $record);
	}

	public function update_parent($id,$nama) {
		$record = array(
			'nama' => $nama
		);
		$this->db->where('id', $id);
		return $this->db->update('barang_jenis', $record);
	}

	public function delete_parent($id) {
		$this->db->where('id', $id);
		return $this->db->delete('barang_jenis');
	}

	public function get_child($id) {
		$this->db->select('d.id, p.id as parent, p.nama as nama_parent, d.nama, d.jumlah, d.warning, d.harga, d.ukuran, d.deskripsi');
		$this->db->from('barang_jenis p, barang d');
		$this->db->where('p.id = d.id_jenis');
		$this->db->where('d.id', $id);
		return $this->db->get()->result_array();
	}

	public function insert_child($id_parent,$nama,$jumlah,$warning,$harga,$ukuran,$deskripsi) {
		$record = array(
			'id_jenis'=>$id_parent,
			'nama' => $nama,
			'jumlah' => $jumlah,
			'warning' => $warning,
			'harga' => $harga,
			'ukuran' => $ukuran,
			'deskripsi' => $deskripsi
		);
		return $this->db->insert('barang', $record);
	}

	public function update_child($id,$id_parent,$nama,$jumlah,$warning,$harga,$ukuran,$deskripsi) {
		$record = array(
			'id_jenis'=>$id_parent,
			'nama' => $nama,
			'jumlah' => $jumlah,
			'warning' => $warning,
			'harga' => $harga,
			'ukuran' => $ukuran,
			'deskripsi' => $deskripsi
		);
		$this->db->where('id', $id);
		return $this->db->update('barang', $record);
	}

	public function delete_child($id) {
		$this->db->where('id', $id);
		return $this->db->delete('barang');
	}
}
