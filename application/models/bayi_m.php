<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bayi_m extends CI_Model {
	public function get($table)
	{
		return $this->db->get($table);
	}

	public function get_where($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	public function tambahDatabayi($data)
	{
		$this->db->insert('bayi', $data);
	}

	public function ubahDatabayi($data, $id)
	{
		$this->db->where('id_bayi', $id);
		$this->db->update('bayi', $data);
	}

}