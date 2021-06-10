<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class petugas extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('petugas_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Petugas';
		$data['petugas'] = $this->petugas_m->get('petugas')->result_array();
		$this->form_validation->set_rules('nama', 'Nama petugas', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar');
			$this->load->view('admin/petugas/index');
			$this->load->view('layout/footer');
		} else {
			$data = [
				'nama_petugas' => html_escape($this->input->post('nama', true))
			];
			$this->petugas_m->tambahDatapetugas($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Petugas Berhasil Ditambahkan.</div>');
			redirect('admin/petugas');
		}
	}

	public function ubah($id)
	{
		$data['title'] = 'Ubah Data Petugas';
		$where = ['id_petugas' => $id];
		$data['petugas'] = $this->petugas_m->get_where('petugas', $where)->row_array();
		$this->form_validation->set_rules('nama', 'Nama petugas', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar');
			$this->load->view('admin/petugas/ubah');
			$this->load->view('layout/footer');
		} else {
			$id = $this->input->post('id_petugas');
			$data = [
				'nama_petugas' => $this->input->post('nama', true)
			];
			$this->petugas_m->ubahDatapetugas($data, $id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Petugas Berhasil Diubah.</div>');
			redirect('admin/petugas');
		}
	}

	public function hapus($id)
	{
		$this->db->delete('petugas', ['id_petugas' => $id]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Petugas Berhasil Dihapus.</div>');
		redirect('admin/petugas');
	}

	public function laporan()
	{
		$data['title'] = 'Laporan Petugas';
		$data['petugas'] = $this->petugas_m->get('petugas')->result_array();
		$this->load->view('layout/header', $data);
		$this->load->view('admin/laporan/laporan_petugas');
		$this->load->view('layout/footer');
	}

}