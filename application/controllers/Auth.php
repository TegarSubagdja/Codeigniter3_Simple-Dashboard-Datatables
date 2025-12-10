<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->library('session');
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function login_process()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->User_model->getByEmail($email);

		if (!$user || !password_verify($password, $user->password)) {
			$this->session->set_flashdata('error', 'Email atau password salah!');
			redirect('login');
			return;
		}

		$this->session->set_userdata([
			'user_id'    => $user->id,
			'user_name'  => $user->name,
			'user_email' => $user->email,
			'logged_in'  => TRUE
		]);

		redirect('home');
	}

	public function register()
	{
		$this->load->view('register');
	}

	public function register_process()
	{
		$name     = $this->input->post('name');
		$email    = $this->input->post('email');
		$password = $this->input->post('password');

		if (strlen($password) < 8) {
			$this->session->set_flashdata('error', 'Password minimal 8 karakter!');
			redirect('register');
			return;
		}

		if ($this->User_model->getByEmail($email)) {
			$this->session->set_flashdata('error', 'Email sudah digunakan!');
			redirect('register');
			return;
		}

		$data = [
			'name'       => $name,
			'email'      => $email,
			'password'   => password_hash($password, PASSWORD_DEFAULT),
			'created_at' => date('Y-m-d H:i:s'),
		];

		$this->User_model->insert($data);

		$this->session->set_flashdata('success', 'Registrasi berhasil, silakan login!');
		redirect('home');
	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
