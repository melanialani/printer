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
			$result = $this->MUser->getLogin($this->input->post('username'),$this->input->post('password'));
			if (!empty($result)){
				$_SESSION['printer']['user']['loggedin'] = true;
				$_SESSION['printer']['user']['username'] = $this->input->post('username');
				$_SESSION['printer']['user']['role'] = $result[0]['role'];
				$_SESSION['printer']['user']['nama'] = $result[0]['nama_user'];
				$_SESSION['printer']['user']['email'] = $result[0]['email'];
				$_SESSION['printer']['user']['photo'] = $result[0]['photo'];
			} else 
				$data['notification'] = 'Username / Password salah';
		}

		if (!empty($_SESSION['printer']['user']))
			$this->dashboard();
		else {
			$this->load->view('header', $data);
			$this->load->view('login', $data);
			$this->load->view('footer', $data);
		}
	}

	public function logout() {
		unset($_SESSION['printer']['user']);
		$this->login_user();
	}

	public function dashboard() {
		$data['page_title'] = 'Home';
		
		$this->load->view('header', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('footer', $data);
	}
}
