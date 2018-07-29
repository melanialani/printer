<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getUserRole() {
		$record = array(
			'0' => array(
					'id' => '0',
					'nama' => 'Admin',
				),
			'1' => array(
					'id' => '1',
					'nama' => 'Pegawai',
				),
			'2' => array(
					'id' => '2',
					'nama' => 'Customer',
				)
		);
		return $record;
	}

	public function getAll() {
		return $this->db->get('user')->result_array();
	}

	public function getLogin($username,$password) {
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
		return $this->db->get('user')->result_array();
	}

	public function getOne($id) {
		$this->db->where('id_user', $id);
		return $this->db->get('user')->result_array();
	}

	public function insert($username,$password,$nama,$alamat,$hp,$email,$photo,$role,$is_active) {
		$record = array(
			// 'id_user' => $id, // auto-increment
			'nama_user' => $nama,
			'alamat_user' => $alamat,
			'no_hp' => $hp,
			'email' => $email,
			'photo' => $photo,
			'username' => $username,
			'password' => $password,
			'role' => $role,
			'is_active' => $is_active
		);
		return $this->db->insert('user', $record);
	}

	public function update($id,$username,$password,$nama,$alamat,$hp,$email,$photo,$role,$is_active) {
		$record = array(
			// 'id_user' => $id, // cannot be changed on update
			'nama_user' => $nama,
			'alamat_user' => $alamat,
			'no_hp' => $hp,
			'email' => $email,
			'photo' => $photo,
			'username' => $username,
			'password' => $password,
			'role' => $role,
			'is_active' => $is_active
		);
		$this->db->where('id_user', $id);
		return $this->db->update('user', $record);
	}

	public function updateActiveUser($id,$is_active) {
		$record = array( 'is_active' => $is_active );
		$this->db->where('id_user', $id);
		return $this->db->update('user', $record);
	}

	public function delete($id) {
		$this->db->where('id_user', $id);
		return $this->db->delete('user');
	}
}
