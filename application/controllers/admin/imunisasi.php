<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class imunisasi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('imunisasi_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Data Imunisasi';
		$data['imunisasi'] = $this->imunisasi_m->get('imunisasi')->result_array();
		$this->form_validation->set_rules('nama', 'Nama imunisasi', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar');
			$this->load->view('admin/imunisasi/index');
			$this->load->view('layout/footer');
		} else {
			$data = [
				'nama_imunisasi' => html_escape($this->input->post('nama', true))
			];
			$this->imunisasi_m->tambahDataimunisasi($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data Imunisasi Berhasil Ditambahkan.</div>');
			redirect('admin/imunisasi');
		}
	}

	public function ubah($id)
	{
		$data['title'] = 'Ubah Data Imunisasi';
		$where = ['id_imunisasi' => $id];
		$data['imunisasi'] = $this->imunisasi_m->get_where('imunisasi', $where)->row_array();
		$this->form_validation->set_rules('nama', 'Nama petugas', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar');
			$this->load->view('admin/imunisasi/ubah', $data);
			$this->load->view('layout/footer');
		} else {
			$id = $this->input->post('id_imunisasi');
			$data = [
				'nama_imunisasi' => $this->input->post('nama', true)
			];
			$this->imunisasi_m->ubahDataimunisasi($data, $id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data Imunisasi Berhasil Diubah.</div>');
			redirect('admin/imunisasi');
		}
	}

	public function hapus($id)
	{
		$this->db->delete('imunisasi', ['id_imunisasi' => $id]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data Imunisasi Berhasil Dihapus.</div>');
		redirect('admin/imunisasi');
	}

	public function laporan()
	{
		$data['title'] = 'Laporan Imunisasi';
		$data['imunisasi'] = $this->imunisasi_m->get('imunisasi')->result_array();
		$this->load->view('layout/header', $data);
		$this->load->view('admin/laporan/laporan_imunisasi');
		$this->load->view('layout/footer');
	}

}