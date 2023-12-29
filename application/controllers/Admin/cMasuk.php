<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cMasuk extends CI_Controller
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
			'barang_masuk' => $this->mBarangMasuk->select(),
			'barang' => $this->mBarang->select(),
			'supplier' => $this->mUser->select()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/navbar');
		$this->load->view('Admin/vBarangMasuk', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function create($id_supplier = NULL)
	{
		$id_supplier = $this->input->post('supplier');
		$data = array(
			'barang' => $this->mBarang->barang_supplier($id_supplier),
			'id_supplier' => $id_supplier
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/navbar');
		$this->load->view('Admin/vCreatePengadaan', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function addtocart()
	{
		$data = array(
			'id' => $this->input->post('bahanbaku'),
			'name' => $this->input->post('nama'),
			'price' => $this->input->post('harga'),
			'qty' => $this->input->post('qty'),
			'stok' => $this->input->post('stok')
		);
		$this->cart->insert($data);
		$this->session->set_flashdata('success', 'Bahan Baku Berhasil Masuk Keranjang!');


		$id_supplier = $this->input->post('id_supplier');
		$data = array(
			'barang' => $this->mBarang->barang_supplier($id_supplier),
			'id_supplier' => $id_supplier
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/navbar');
		$this->load->view('Admin/vCreatePengadaan', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function hapus($id, $id_supplier)
	{
		$this->cart->remove($id);
		$data = array(
			'barang' => $this->mBarang->barang_supplier($id_supplier),
			'id_supplier' => $id_supplier
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/navbar');
		$this->load->view('Admin/vCreatePengadaan', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function selesai()
	{
		$data = array(
			'id_user' => $this->input->post('id_supplier'),
			'tgl_pengajuan' => date('Y-m-d'),
			'total_pengajuan' => $this->cart->total(),
			'status_pengajuan' => '0',
			'bukti_pembayaran' => '0'
		);
		$this->db->insert('pengajuan', $data);


		$id_pengajuan = $this->db->query("SELECT MAX(id_pengajuan) as id_pengajuan FROM `pengajuan`")->row();

		foreach ($this->cart->contents() as $key => $value) {
			$pesanan = array(
				'id_pengajuan' => $id_pengajuan->id_pengajuan,
				'id_barang' => $value['id'],
				'stok_masuk' => $value['qty'],
				'sisa_stok' => $value['qty']
			);
			$this->db->insert('barang_masuk', $pesanan);
		}
		$this->cart->destroy();
		$this->session->set_flashdata('success', 'Transaksi berhasil Dikirim!');
		redirect('Admin/cMasuk');
	}
	public function detail($id)
	{
		$data = array(
			'pengajuan' => $this->mBarangMasuk->detail($id)
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/navbar');
		$this->load->view('Admin/vDetailPengadaan', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function bayar($id)
	{
		$config['upload_path']          = './asset/pembayaran';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 50000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('bayar')) {
			$data = array(
				'pengajuan' => $this->mBarangMasuk->detail($id)
			);
			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/Layout/navbar');
			$this->load->view('Admin/vDetailPengadaan', $data);
			$this->load->view('Admin/Layout/footer');
		} else {

			$upload_data =  $this->upload->data();
			$data = array(
				'bukti_pembayaran' => $upload_data['file_name'],
				'status_pengajuan' => '1'
			);
			$this->db->where('id_pengajuan', $id);
			$this->db->update('pengajuan', $data);


			$this->session->set_flashdata('success', 'Pembayaran Berhasil dikirim!!!');
			redirect('Admin/cMasuk', 'refresh');
		}
	}
	public function diterima($id)
	{
		$data = array(
			'status_pengajuan' => '3'
		);
		$this->db->where('id_pengajuan', $id);
		$this->db->update('pengajuan', $data);
		$this->session->set_flashdata('success', 'Data Pengadaan Barang Berhasil Diterima!');
		redirect('Admin/cMasuk', 'refresh');
	}

	// public function create()
	// {
	// 	//cek stok sebelumnya
	// 	$id_barang = $this->input->post('barang');
	// 	$data_barang = $this->db->query("SELECT * FROM `barang` WHERE id_barang='" . $id_barang . "'")->row();
	// 	$stok_sebelumnya = $data_barang->stok;
	// 	$tambah_stok = $this->input->post('qty');
	// 	$stok_update = $stok_sebelumnya + $tambah_stok;

	// 	//update tabel barang
	// 	$stok = array(
	// 		'stok' => $stok_update
	// 	);
	// 	$this->db->where('id_barang', $id_barang);
	// 	$this->db->update('barang', $stok);

	// 	//masuk tabel barang masuk

	// 	$data = array(
	// 		'id_barang' => $this->input->post('barang'),
	// 		'id_user' => '1',
	// 		'tgl_masuk' => $this->input->post('tgl'),
	// 		'stok_masuk' => $this->input->post('qty'),
	// 		'sisa_stok' => $this->input->post('qty'),
	// 	);
	// 	$this->mBarangMasuk->insert($data);
	// 	$this->session->set_flashdata('success', 'Data Barang masuk berhasil disimpan!');
	// 	redirect('Admin/cMasuk');
	// }
	// public function update($id)
	// {
	// 	//cek stok update
	// 	$cdata_update = $this->db->query("SELECT * FROM `barang_masuk` WHERE id_bar_masuk='" . $id . "'")->row();
	// 	$cdata_barang = $this->db->query("SELECT * FROM `barang` WHERE id_barang='" . $cdata_update->id_barang . "'")->row();
	// 	$cstok_masuk = $cdata_update->stok_masuk;
	// 	$cstok_barang = $cdata_barang->stok;
	// 	$cstok_update = $cstok_barang - $cstok_masuk;

	// 	//update tabel barang
	// 	$stok = array(
	// 		'stok' => $cstok_update
	// 	);
	// 	$this->db->where('id_barang', $cdata_barang->id_barang);
	// 	$this->db->update('barang', $stok);


	// 	//cek stok terbaru sebelumnya--------------------------------------
	// 	$id_barang = $this->input->post('barang');
	// 	$data_barang = $this->db->query("SELECT * FROM `barang` WHERE id_barang='" . $id_barang . "'")->row();
	// 	$stok_sebelumnya = $data_barang->stok;
	// 	$tambah_stok = $this->input->post('qty');
	// 	$stok_update = $stok_sebelumnya + $tambah_stok;

	// 	//update tabel barang
	// 	$stok = array(
	// 		'stok' => $stok_update
	// 	);
	// 	$this->db->where('id_barang', $id_barang);
	// 	$this->db->update('barang', $stok);


	// 	$data = array(
	// 		'id_barang' => $this->input->post('barang'),
	// 		'id_user' => '1',
	// 		'tgl_masuk' => $this->input->post('tgl'),
	// 		'stok_masuk' => $this->input->post('qty'),
	// 		'sisa_stok' => $this->input->post('qty')
	// 	);
	// 	$this->mBarangMasuk->update($id, $data);
	// 	$this->session->set_flashdata('success', 'Data Barang masuk berhasil diperbaharui!');
	// 	redirect('Admin/cMasuk');
	// }
	// public function delete($id)
	// {
	// 	$this->mBarangMasuk->delete($id);
	// 	$this->session->set_flashdata('success', 'Data Barang masuk berhasil dihapus!');
	// 	redirect('Admin/cMasuk');
	// }
}

/* End of file cBarangMasuk.php */
