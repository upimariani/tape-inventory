<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKeluar extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mBarangKeluar');
		$this->load->model('mBarangMasuk');
	}

	public function index()
	{
		$data = array(
			'barang_keluar' => $this->mBarangKeluar->select(),
			'barang_masuk' => $this->mBarangMasuk->barang_masuk()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/navbar');
		$this->load->view('Admin/vBarangKeluar', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function create()
	{
		//mengurangi stok barang masuk
		$id_bar_masuk = $this->input->post('barang');
		$barang_masuk = $this->db->query("SELECT * FROM `barang_masuk` WHERE id_bar_masuk='" . $id_bar_masuk . "'")->row();
		$id_barang = $barang_masuk->id_barang;
		$sisa_stok = $barang_masuk->sisa_stok;
		$stok_keluar = $this->input->post('qty');
		$stok_bar_update = $sisa_stok - $stok_keluar;

		$update_bar_masuk = array(
			'sisa_stok' => $stok_bar_update
		);
		$this->db->where('id_bar_masuk', $id_bar_masuk);
		$this->db->update('barang_masuk', $update_bar_masuk);

		//update tabel barang
		$barang = $this->db->query("SELECT * FROM `barang` WHERE id_barang='" . $id_barang . "'")->row();
		$stok = $barang->stok;
		$update_stok = $stok - $stok_keluar;

		$update_barang = array(
			'stok' => $update_stok
		);
		$this->db->where('id_barang', $id_barang);
		$this->db->update('barang', $update_barang);


		//masuk tabel barang keluar
		$data = array(
			'id_bar_masuk' => $this->input->post('barang'),
			'tgl_keluar' => $this->input->post('tgl'),
			'stok_keluar' => $this->input->post('qty')
		);
		$this->mBarangKeluar->insert($data);
		$this->session->set_flashdata('success', 'Data Barang masuk berhasil disimpan!');
		redirect('Admin/cKeluar');
	}
	public function update($id)
	{
		$data_barang = $this->db->query("SELECT * FROM `barang_keluar` JOIN barang_masuk ON barang_keluar.id_bar_masuk=barang_masuk.id_bar_masuk JOIN barang ON barang_masuk.id_barang=barang.id_barang WHERE barang_keluar.id_bar_keluar='" . $id . "'")->row();
		$stok_keluar = $data_barang->stok_keluar;


		//menambahkan stok awal di tabel barang

		$stok_barang = $data_barang->stok;
		$sb = $stok_barang + $stok_keluar;

		$db = array(
			'stok' => $sb
		);
		$this->db->where('id_barang', $data_barang->id_barang);
		$this->db->update('barang', $db);

		//menambahkan stok di tabel barang masuk 
		$sbm = $data_barang->sisa_stok;
		$subm = $sbm + $stok_keluar;

		$dbm = array(
			'sisa_stok' => $subm
		);
		$this->db->where('id_bar_masuk', $data_barang->id_bar_masuk);
		$this->db->update('barang_masuk', $dbm);


		//mengurangi stok barang masuk
		$id_bar_masuk = $this->input->post('barang');
		$barang_masuk = $this->db->query("SELECT * FROM `barang_masuk` WHERE id_bar_masuk='" . $id_bar_masuk . "'")->row();
		$id_barang = $barang_masuk->id_barang;
		$sisa_stok = $barang_masuk->sisa_stok;
		$stok_keluar = $this->input->post('qty');
		$stok_bar_update = $sisa_stok - $stok_keluar;

		$update_bar_masuk = array(
			'sisa_stok' => $stok_bar_update
		);
		$this->db->where('id_bar_masuk', $id_bar_masuk);
		$this->db->update('barang_masuk', $update_bar_masuk);

		//update tabel barang
		$barang = $this->db->query("SELECT * FROM `barang` WHERE id_barang='" . $id_barang . "'")->row();
		$stok = $barang->stok;
		$update_stok = $stok - $stok_keluar;

		$update_barang = array(
			'stok' => $update_stok
		);
		$this->db->where('id_barang', $id_barang);
		$this->db->update('barang', $update_barang);

		//masuk tabel barang keluar
		$data = array(
			'id_bar_masuk' => $this->input->post('barang'),
			'tgl_keluar' => $this->input->post('tgl'),
			'stok_keluar' => $this->input->post('qty')
		);
		$this->mBarangKeluar->update($id, $data);
		$this->session->set_flashdata('success', 'Data Barang keluar berhasil disimpan!');
		redirect('Admin/cKeluar');
	}
	public function delete($id)
	{
		$this->mBarangKeluar->delete($id);
		$this->session->set_flashdata('success', 'Data Barang keluar berhasil dihapus!');
		redirect('Admin/cKeluar');
	}
}

/* End of file cBarangKeluar.php */
