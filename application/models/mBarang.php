<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mBarang extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('barang');
		return $this->db->get()->result();
	}
	public function insert($data)
	{
		$this->db->insert('barang', $data);
	}
	public function update($id, $data)
	{
		$this->db->where('id_barang', $id);
		$this->db->update('barang', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_barang', $id);
		$this->db->delete('barang');
	}
}

/* End of file mBarang.php */
