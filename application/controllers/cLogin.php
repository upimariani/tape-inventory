<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLogin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mLogin');
	}

	public function index()
	{
		$this->load->view('vLogin');
	}
	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = $this->mLogin->login($username, $password);
		if ($data) {
			$id_user = $data->id_user;
			$role = $data->role;

			$array = array(
				'id_user' => $id_user
			);
			$this->session->set_userdata($array);
			if ($role == '1') {
				redirect('Admin/cDashboard');
			} else if ($role == '2') {
				redirect('Pemilik/cDashboard');
			} else if ($role == '3') {
				redirect('Supplier/cDashboard');
			}
		}
		$this->session->set_flashdata('error', 'Username dan Password Anda Salah!');
		redirect('cLogin');
	}
	public function logout()
	{
		$this->session->unset_userdata('id_user');
		$this->session->set_flashdata('success', 'Anda Berhasil Logout!');
		redirect('cLogin');
	}
}

/* End of file cLogin.php */
