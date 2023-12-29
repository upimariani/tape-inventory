<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mBarangMasuk extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('pengajuan');
		$this->db->join('user', 'pengajuan.id_user = user.id_user', 'left');
		return $this->db->get()->result();
	}
	public function detail($id)
	{
		$data['pengajuan'] = $this->db->query("SELECT * FROM `pengajuan` JOIN user ON user.id_user=pengajuan.id_user WHERE id_pengajuan='" . $id . "'")->row();
		$data['barang'] = $this->db->query("SELECT * FROM `barang_masuk` JOIN barang ON barang.id_barang=barang_masuk.id_barang JOIN pengajuan ON pengajuan.id_pengajuan=barang_masuk.id_pengajuan WHERE pengajuan.id_pengajuan='" . $id . "'")->result();
		return $data;
	}
	public function barang_masuk()
	{
		$this->db->select('*');
		$this->db->from('barang_masuk');
		$this->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'left');
		$this->db->join('pengajuan', 'pengajuan.id_pengajuan = barang_masuk.id_pengajuan', 'left');
		return $this->db->get()->result();
	}
	public function lap_barang_masuk()
	{
		$this->db->select('*');
		$this->db->from('barang_masuk');
		$this->db->join('pengajuan', 'barang_masuk.id_pengajuan = pengajuan.id_pengajuan', 'left');
		$this->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'left');
		return $this->db->get()->result();
	}
	// public function insert($data)
	// {
	// 	$this->db->insert('barang_masuk', $data);
	// }
	// public function update($id, $data)
	// {
	// 	$this->db->where('id_bar_masuk', $id);
	// 	$this->db->update('barang_masuk', $data);
	// }
	// public function delete($id)
	// {
	// 	$this->db->where('id_bar_masuk', $id);
	// 	$this->db->delete('barang_masuk');
	// }
}

/* End of file mBarangMasuk.php */
