<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class imunisasi_m extends CI_Model {
	public function get($table)
	{
		return $this->db->get($table);
	}

	public function get_where($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	public function tambahDataimunisasi($data)
	{
		$this->db->insert('imunisasi', $data);
	}

	public function ubahDataimunisasi($data, $id)
	{
		$this->db->where('id_imunisasi', $id);
		$this->db->update('imunisasi', $data);
	}

}