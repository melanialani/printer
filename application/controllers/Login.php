<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index() {
		$this->login_user();
	}

	public function login_user() {
		$data['page_title'] = 'Login';
		$data['notification'] = NULL;

		if ($this->input->post('button') == 'login'){
			$result = $this->User->getLogin($this->input->post('username'),$this->input->post('password'));
			if (!empty($result)){
				$_SESSION['printer']['loggedin'] = true;
				$_SESSION['printer']['username'] = $this->input->post('username');
				$_SESSION['printer']['role'] = $result[0]['id_role'];
			} else 
				$data['notification'] = 'Username / Password salah';
		}

		if (!empty($_SESSION['printer']['loggedin']))
			$this->dashboard();
		else {
			$this->load->view('header', $data);
			$this->load->view('login', $data);
			$this->load->view('footer', $data);
		}
	}

	public function logout() {
		unset($_SESSION['printer']['loggedin']);
		unset($_SESSION['printer']['username']);
		unset($_SESSION['printer']['role']);
		$this->login_user();
	}

	public function dashboard() {
		$data['page_title'] = 'Home';
		
		$this->load->view('header', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('footer', $data);
	}
}
