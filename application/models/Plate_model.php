<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plate_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

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
}
