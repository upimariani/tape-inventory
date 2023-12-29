<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLBMasuk extends CI_Controller
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
			'barang_masuk' => $this->mBarangMasuk->lap_barang_masuk(),
			'barang' => $this->mBarang->select()
		);
		$this->load->view('Pemilik/Layout/head');
		$this->load->view('Pemilik/Layout/navbar');
		$this->load->view('Pemilik/vBarangMasuk', $data);
		$this->load->view('Pemilik/Layout/footer');
	}
	public function cetak()
	{
		require('asset/fpdf/fpdf.php');

		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();


		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$pdf->SetFont('Times', 'B', 13);
		$pdf->Cell(185, 10, 'LAPORAN BARANG MASUK PERIODE ' . $bulan . ' TAHUN ' . $tahun, 0, 1, 'C');

		$pdf->Cell(10, 15, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(10, 7, 'NO', 1, 0, 'C');
		$pdf->Cell(45, 7, 'Nama Barang', 1, 0, 'C');
		$pdf->Cell(35, 7, 'Harga', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Tanggal Masuk', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Quantity Masuk', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Subtotal', 1, 1, 'C');

		$pdf->SetFont('Times', '', 9);
		$no = 1;

		$laporan = $this->db->query("SELECT * FROM `barang_masuk` JOIN barang ON barang.id_barang=barang_masuk.id_barang JOIN pengajuan ON pengajuan.id_pengajuan=barang_masuk.id_pengajuan WHERE MONTH(tgl_pengajuan)='" . $bulan . "' AND YEAR(tgl_pengajuan)='" . $tahun . "'")->result();
		foreach ($laporan as $key => $value) {
			$pdf->Cell(10, 7, $no++, 1, 0, 'C');
			$pdf->Cell(45, 7, $value->nama_barang, 1, 0, 'C');
			$pdf->Cell(35, 7, 'Rp. ' . number_format($value->harga), 1, 0, 'C');
			$pdf->Cell(40, 7, $value->tgl_pengajuan, 1, 0, 'C');
			$pdf->Cell(30, 7, $value->stok_masuk, 1, 0, 'C');
			$pdf->Cell(30, 7, 'Rp.' . number_format($value->harga * $value->stok_masuk), 1, 1, 'C');
		}
		$pdf->Output();
	}
}

/* End of file cLBMasuk.php */
