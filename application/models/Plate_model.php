<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plate_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
#region plate
	public function getAll() {
		return $this->db->get('master_plate')->result_array();
	}

	public function getOne($id) {
		$this->db->where('id_master_plate', $id);
		return $this->db->get('master_plate')->result_array();
	}

	public function insert($panjang,$lebar) {
		$record = array(
			// 'id_master_plate' => $id, // auto-increment
			'panjang_plate' => $panjang,
			'lebar_plate' => $lebar
		);
		return $this->db->insert('master_plate', $record);
	}

	public function update($id,$panjang,$lebar) {
		$record = array(
			// 'id_master_plate' => $id, // cannot be changed on update
			'panjang_plate' => $panjang,
			'lebar_plate' => $lebar
		);
		$this->db->where('id_master_plate', $id);
		return $this->db->update('master_plate', $record);
	}

	public function delete($id) {
		$this->db->where('id_master_plate', $id);
		return $this->db->delete('master_plate');
	}
#endregion
#region detail plate
	public function getAllDetailPlate() {
		return $this->db->get('detail_plate')->result_array();
	}

	public function getOneDetailPlate($id_proses,$id_plate) {
		$this->db->where('id_proses', $id_proses);
		$this->db->where('id_master_plate', $id_master_plate);
		return $this->db->get('detail_plate')->result_array();
	}

	public function getOneDetailPlateByIdProses($id_proses) {
		$this->db->where('id_proses', $id_proses);
		return $this->db->get('detail_plate')->result_array();
	}

	public function insertDetailPlate($id_proses,$id_plate,$qty,$harga) {
		$record = array(
			'id_proses' => $id_proses,
			'id_master_plate' => $id_plate,
			'qty_plate' => $qty,
			'jumlah_harga_plate' => $harga
		);
		return $this->db->insert('detail_plate', $record);
	}

	public function updateDetailPlate($id_proses,$id_plate,$qty,$harga) {
		$record = array(
			// 'id_proses' => $id_proses, // cannot be changed on update since its a PK
			// 'id_master_plate' => $id_plate, // cannot be changed on update since its a PK
			'qty_plate' => $qty,
			'jumlah_harga_plate' => $harga
		);
		$this->db->where('id_proses', $id_proses);
		$this->db->where('id_master_plate', $id_master_plate);
		return $this->db->update('detail_plate', $record);
	}

	public function deleteDetailPlate($id_proses,$id_plate) {
		$this->db->where('id_proses', $id_proses);
		$this->db->where('id_master_plate', $id_master_plate);
		return $this->db->delete('detail_plate');
	}
#endregion
}
