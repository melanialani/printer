<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laminasi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAll() {
		return $this->db->get('laminasi')->result_array();
	}

	public function getOne($id) {
		$this->db->where('id_laminasi', $id);
		return $this->db->get('laminasi')->result_array();
	}

	public function insert($nama,$id_proses) {
		$record = array(
			// 'id_laminasi' => $id,// auto-increment
			'id_proses' => $id_proses,
			'nama_laminasi' => $nama
		);
		return $this->db->insert('laminasi', $record);
	}

	public function update($id,$nama,$id_proses) {
		$record = array(
			// 'id_laminasi' => $id,// cannot be changed on update
			'id_proses' => $id_proses,
			'nama_laminasi' => $nama
		);
		$this->db->where('id_laminasi', $id);
		return $this->db->update('laminasi', $record);
	}

	public function delete($id) {
		$this->db->where('id_laminasi', $id);
		return $this->db->delete('laminasi');
	}
}
