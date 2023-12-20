<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mBarangMasuk extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('barang_masuk');
		$this->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'left');
		return $this->db->get()->result();
	}
	public function insert($data)
	{
		$this->db->insert('barang_masuk', $data);
	}
	public function update($id, $data)
	{
		$this->db->where('id_bar_masuk', $id);
		$this->db->update('barang_masuk', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_bar_masuk', $id);
		$this->db->delete('barang_masuk');
	}
}

/* End of file mBarangMasuk.php */
