<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAll() {
		$this->db->select('u.id as id, u.nama as nama, u.username as username, u.email as email, r.nama as role, u.id_role as id_role, u.is_active as is_active');
		$this->db->from('users u, user_role r');
		$this->db->where('r.id = u.id_role');
		return $this->db->get()->result_array();
	}

	public function getLogin($username,$password) {
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
		return $this->db->get('users')->result_array();
	}

	public function getOne($id) {
		$this->db->where('id', $id);
		return $this->db->get('users')->result_array();
	}

	public function insert($nama,$username,$password,$email,$photo,$id_role,$is_active) {
		$record = array(
			'nama' => $nama,
			'username' => $username,
			'password' => md5('$password'),
			'email' => $email,
			'photo' => $photo,
			'id_role' => $id_role,
			'is_active' => $is_active
		);
		return $this->db->insert('users', $record);
	}

	public function update($id,$nama,$username,$password,$email,$photo,$id_role,$is_active) {
		$record = array(
			'nama' => $nama,
			'username' => $username,
			'password' => md5($password),
			'email' => $email,
			'photo' => $photo,
			'id_role' => $id_role,
			'is_active' => $is_active
		);
		$this->db->where('id', $id);
		return $this->db->update('users', $record);
	}

	public function updateActiveUser($id,$is_active) {
		$record = array( 'is_active' => $is_active );
		$this->db->where('id', $id);
		return $this->db->update('users', $record);
	}

	public function delete($id) {
		$this->db->where('id', $id);
		return $this->db->delete('users');
	}

	public function getUserRole() {
		return $this->db->get('user_role')->result_array();
	}
}
