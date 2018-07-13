<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Referensi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAllReferensi() {
		return $this->db->get('referensi')->result_array();
	}

	public function getAllReferensiDetail($id_parent) {
		$this->db->select('d.id as id, r.nama as parent, d.nama as nama');
		$this->db->from('referensi r, referensi_detail d');
		$this->db->where('r.id', 'd.id_referensi');
		return $this->db->get('referensi')->result_array();
	}
}
