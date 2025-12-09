<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('register');
	}

	public function submit()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('register');
		} else {
			$username = $this->input->post('username', TRUE);
			$email    = $this->input->post('email', TRUE);
			$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

			// Contoh insert ke database
			// $data = array(
			//     'username' => $username,
			//     'email'    => $email,
			//     'password' => $password,
			//     'created_at' => date('Y-m-d H:i:s')
			// );
			// $this->db->insert('users', $data);

			// Redirect atau tampilkan pesan sukses
			echo "Register success! (ini hanya demo, belum masuk DB)";
			// Atau gunakan: redirect('login'); untuk redirect
		}
	}
}
