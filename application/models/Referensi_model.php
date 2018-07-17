<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Referensi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAllParent() {
		return $this->db->get('referensi')->result_array();
	}

	public function getAllReferensiDetail($id_parent) {
		$this->db->select('d.id as id, r.nama as parent, d.nama as nama');
		$this->db->from('referensi r, referensi_detail d');
		$this->db->where('r.id = d.id_referensi');
		$this->db->where('r.id', $id_parent);
		return $this->db->get()->result_array();
	}

	public function get_all_parent() {
		return $this->db->get('referensi')->result_array();
	}

	public function get_parent($id) {
		$this->db->where('id', $id);
		return $this->db->get('referensi')->result_array();
	}

	public function insert_parent($nama) {
		$record = array(
			'nama' => $nama
		);
		return $this->db->insert('referensi', $record);
	}

	public function update_parent($id,$nama) {
		$record = array(
			'nama' => $nama
		);
		$this->db->where('id', $id);
		return $this->db->update('referensi', $record);
	}

	public function delete_parent($id) {
		$this->db->where('id', $id);
		return $this->db->delete('referensi');
	}

	public function get_child($id) {
		$this->db->select('d.id as id, r.nama as parent, d.nama as nama');
		$this->db->from('referensi r, referensi_detail d');
		$this->db->where('r.id = d.id_referensi');
		$this->db->where('d.id', $id);
		return $this->db->get()->result_array();
	}

	public function insert_child($id_parent,$nama) {
		$record = array(
			'id_referensi'=>$id_parent,
			'nama' => $nama
		);
		return $this->db->insert('referensi_detail', $record);
	}

	public function update_child($id,$id_parent,$nama) {
		$record = array(
			'id_referensi'=>$id_parent,
			'nama' => $nama
		);
		$this->db->where('id', $id);
		return $this->db->update('referensi_detail', $record);
	}

	public function delete_child($id) {
		$this->db->where('id', $id);
		return $this->db->delete('referensi_detail');
	}

}
