<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan_m extends CI_Model {
	public function get_join($table)
	{
		$this->db->join("petugas", "petugas.id_petugas = $table.id_petugas");
		$this->db->join("bayi", "bayi.id_bayi = $table.id_bayi");
		return $this->db->get($table);
	}

	public function insert($table, $data)
	{
		$this->db->insert($table, $data);
	}

	public function update_where($table, $data, $where)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function get($table)
	{
		return $this->db->get($table);
	}

	public function get_where($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	public function tambahDataKunjungan($data)
	{
		$this->db->insert('berobat', $data);
	}

	public function ubahDataKunjungan($data, $id)
	{
		$this->db->where('id_berobat', $id);
		$this->db->update('berobat', $data);
	}

	// tindakan MEDIS
	public function get_tindakan($id)
	{
		$this->db->join("petugas", "petugas.id_petugas = berobat.id_petugas");
		$this->db->join("bayi", "bayi.id_bayi = berobat.id_bayi");
		$this->db->where('berobat.id_berobat', $id);
		return $this->db->get('berobat');
	}

	public function get_riwayat($idbayi)
	{
		$this->db->join("petugas", "petugas.id_petugas = berobat.id_petugas");
		$this->db->join("bayi", "bayi.id_bayi = berobat.id_bayi");
		$this->db->where('berobat.id_bayi', $idbayi);
		return $this->db->get('berobat');
	}

	public function get_resep($id)
	{
		// $this->db->select("resep_imunisasi.*, imunisasi.nama_imunisasi");
		$this->db->join("imunisasi", "imunisasi.id_imunisasi = resep_imunisasi.id_imunisasi");
		$this->db->join("berobat", "berobat.id_berobat = resep_imunisasi.id_berobat");
		$this->db->where("resep_imunisasi.id_berobat", "$id");
		return $this->db->get('resep_imunisasi');
		// $query = "SELECT resep_imunisasi.*, imunisasi.nama_imunisasi FROM resep_imunisasi INNER JOIN resep_imunisasi.id_imunisasi = imunisasi.id_imunisasi WHERE resep_imunisasi.id_berobat = berobat.$id";
		// return $this->db->query($query);
	}

}