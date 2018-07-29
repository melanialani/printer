<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisCetakan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAll() {
		return $this->db->get('jenis_cetakan')->result_array();
	}

	public function getOne($id) {
		$this->db->where('id_jenis_cetakan', $id);
		return $this->db->get('jenis_cetakan')->result_array();
	}

	public function insert($nama) {
		$record = array(
			// 'id_jenis_cetakan' => $id,// auto-increment
			'nama_jenis_cetakan' => $nama
		);
		return $this->db->insert('jenis_cetakan', $record);
	}

	public function update($id,$nama) {
		$record = array(
			// 'id_jenis_cetakan' => $id,// cannot be changed on update
			'nama_jenis_cetakan' => $nama
		);
		$this->db->where('id_jenis_cetakan', $id);
		return $this->db->update('jenis_cetakan', $record);
	}

	public function delete($id) {
		$this->db->where('id_jenis_cetakan', $id);
		return $this->db->delete('jenis_cetakan');
	}
}
