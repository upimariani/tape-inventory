<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPengadaan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mBarangMasuk');
		$this->load->model('mBarang');
		$this->load->model('mUser');
	}

	public function index()
	{
		$data = array(
			'barang_masuk' => $this->mBarangMasuk->select()
		);
		$this->load->view('Supplier/Layout/head');
		$this->load->view('Supplier/Layout/navbar');
		$this->load->view('Supplier/vPengadaan', $data);
		$this->load->view('Supplier/Layout/footer');
	}
	public function detail($id)
	{
		$data = array(
			'pengajuan' => $this->mBarangMasuk->detail($id)
		);
		$this->load->view('Supplier/Layout/head');
		$this->load->view('Supplier/Layout/navbar');
		$this->load->view('Supplier/vDetailPengadaan', $data);
		$this->load->view('Supplier/Layout/footer');
	}
	public function konfirmasi($id)
	{
		$data = array(
			'status_pengajuan' => '2'
		);
		$this->db->where('id_pengajuan', $id);
		$this->db->update('pengajuan', $data);
		$this->session->set_flashdata('success', 'Pengadaan Berhasil Dikonfirmasi!');
		redirect('Supplier/cPengadaan');
	}
}

/* End of file cPengadaan.php */
