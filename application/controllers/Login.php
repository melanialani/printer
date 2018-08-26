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
				$_SESSION['printer']['user']['id_user'] = $result['id_user'];
				$_SESSION['printer']['user']['username'] = $result['username'];
				$_SESSION['printer']['user']['role'] = $result['role'];
				$_SESSION['printer']['user']['nama'] = $result['nama_user'] ? $result['nama_user'] : $result['username'];
				$_SESSION['printer']['user']['email'] = $result['email'];
				$_SESSION['printer']['user']['photo'] = $result['photo'];
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

	public function register_user() {
		$data['page_title'] = 'Register';
		$data['notification'] = NULL;

		if ($this->input->post('button') == 'register'){
			$result = $this->MUser->getRegister($this->input->post('email'),$this->input->post('username'));
			if (empty($result)){
				// add user
				$result = $this->MUser->registerUser($this->input->post('email'),$this->input->post('username'),$this->input->post('password'));
				
				// login kan user
				$result = $this->MUser->getLogin($this->input->post('username'),$this->input->post('password'));
				$_SESSION['printer']['user']['loggedin'] = true;
				$_SESSION['printer']['user']['username'] = $result['username'];
				$_SESSION['printer']['user']['role'] = $result['role'];
				$_SESSION['printer']['user']['nama'] = $result['nama_user'] ? $result['nama_user'] : $result['username'];
				$_SESSION['printer']['user']['email'] = $result['email'];
				$_SESSION['printer']['user']['photo'] = $result['photo'];
			} else 
				$data['notification'] = 'Email / Username telah dipakai';
		}

		if (!empty($_SESSION['printer']['user']))
			$this->dashboard();
		else {
			$this->load->view('header', $data);
			$this->load->view('register', $data);
			$this->load->view('footer', $data);
		}
	}

	public function dashboard() {
		if (!empty($_SESSION['printer']['user'])){
			$data['page_title'] = 'Home';

			$this->load->view('header', $data);
			$this->load->view('dashboard', $data);
			$this->load->view('footer', $data);
		} else {
			redirect('login');
		}
	}
}
