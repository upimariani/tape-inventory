<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mBarangKeluar extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('barang_keluar');
		$this->db->join('barang_masuk', 'barang_keluar.id_bar_masuk = barang_masuk.id_bar_masuk', 'left');
		$this->db->join('barang', 'barang.id_barang = barang_masuk.id_barang', 'left');
		return $this->db->get()->result();
	}
	public function insert($data)
	{
		$this->db->insert('barang_keluar', $data);
	}
	public function update($id, $data)
	{
		$this->db->where('id_bar_keluar', $id);
		$this->db->update('barang_keluar', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_bar_keluar', $id);
		$this->db->delete('barang_keluar');
	}
}

/* End of file mBarangKeluar.php */
