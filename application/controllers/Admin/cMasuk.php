<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cMasuk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mBarangMasuk');
		$this->load->model('mBarang');
	}

	public function index()
	{
		$data = array(
			'barang_masuk' => $this->mBarangMasuk->select(),
			'barang' => $this->mBarang->select()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/navbar');
		$this->load->view('Admin/vBarangMasuk', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function create()
	{
		//cek stok sebelumnya
		$id_barang = $this->input->post('barang');
		$data_barang = $this->db->query("SELECT * FROM `barang` WHERE id_barang='" . $id_barang . "'")->row();
		$stok_sebelumnya = $data_barang->stok;
		$tambah_stok = $this->input->post('qty');
		$stok_update = $stok_sebelumnya + $tambah_stok;

		//update tabel barang
		$stok = array(
			'stok' => $stok_update
		);
		$this->db->where('id_barang', $id_barang);
		$this->db->update('barang', $stok);

		//masuk tabel barang masuk

		$data = array(
			'id_barang' => $this->input->post('barang'),
			'id_user' => '1',
			'tgl_masuk' => $this->input->post('tgl'),
			'stok_masuk' => $this->input->post('qty'),
			'sisa_stok' => $this->input->post('qty'),
		);
		$this->mBarangMasuk->insert($data);
		$this->session->set_flashdata('success', 'Data Barang masuk berhasil disimpan!');
		redirect('Admin/cMasuk');
	}
	public function update($id)
	{
		//cek stok update
		$cdata_update = $this->db->query("SELECT * FROM `barang_masuk` WHERE id_bar_masuk='" . $id . "'")->row();
		$cdata_barang = $this->db->query("SELECT * FROM `barang` WHERE id_barang='" . $cdata_update->id_barang . "'")->row();
		$cstok_masuk = $cdata_update->stok_masuk;
		$cstok_barang = $cdata_barang->stok;
		$cstok_update = $cstok_barang - $cstok_masuk;

		//update tabel barang
		$stok = array(
			'stok' => $cstok_update
		);
		$this->db->where('id_barang', $cdata_barang->id_barang);
		$this->db->update('barang', $stok);


		//cek stok terbaru sebelumnya--------------------------------------
		$id_barang = $this->input->post('barang');
		$data_barang = $this->db->query("SELECT * FROM `barang` WHERE id_barang='" . $id_barang . "'")->row();
		$stok_sebelumnya = $data_barang->stok;
		$tambah_stok = $this->input->post('qty');
		$stok_update = $stok_sebelumnya + $tambah_stok;

		//update tabel barang
		$stok = array(
			'stok' => $stok_update
		);
		$this->db->where('id_barang', $id_barang);
		$this->db->update('barang', $stok);


		$data = array(
			'id_barang' => $this->input->post('barang'),
			'id_user' => '1',
			'tgl_masuk' => $this->input->post('tgl'),
			'stok_masuk' => $this->input->post('qty'),
			'sisa_stok' => $this->input->post('qty')
		);
		$this->mBarangMasuk->update($id, $data);
		$this->session->set_flashdata('success', 'Data Barang masuk berhasil diperbaharui!');
		redirect('Admin/cMasuk');
	}
	public function delete($id)
	{
		$this->mBarangMasuk->delete($id);
		$this->session->set_flashdata('success', 'Data Barang masuk berhasil dihapus!');
		redirect('Admin/cMasuk');
	}
}

/* End of file cBarangMasuk.php */
