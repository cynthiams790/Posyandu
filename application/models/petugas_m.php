<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class petugas_m extends CI_Model {
	public function get($table)
	{
		return $this->db->get($table);
	}

	public function get_where($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	public function tambahDatapetugas($data)
	{
		$this->db->insert('petugas', $data);
	}

	public function ubahDatapetugas($data, $id)
	{
		$this->db->where('id_petugas', $id);
		$this->db->update('petugas', $data);
	}

}