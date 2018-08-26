<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisKertas_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getCombo() {
		return $this->db->get('jenis_kertas')->result_array();
	}

	public function getAll() {
		$this->db->where('id_jenis_kertas <> 1');
		return $this->db->get('jenis_kertas')->result_array();
	}

	public function getOne($id) {
		$this->db->where('id_jenis_kertas', $id);
		return $this->db->get('jenis_kertas')->result_array();
	}

	public function insert($nama) {
		$record = array(
			// 'id_jenis_kertas' => $id, // auto-increment
			'namajenis_kertas' => $nama
		);
		return $this->db->insert('jenis_kertas', $record);
	}

	public function update($id,$nama) {
		$record = array(
			'namajenis_kertas' => $nama
		);
		$this->db->where('id_jenis_kertas', $id);
		return $this->db->update('jenis_kertas', $record);
	}

	public function delete($id) {
		$this->db->where('id_jenis_kertas', $id);
		return $this->db->delete('jenis_kertas');
	}
}
