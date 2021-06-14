<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kunjungan_m');
		$this->load->model('petugas_m');
		$this->load->model('bayi_m');
		$this->load->model('imunisasi_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Data Transaksi';
		$data['kunjungan'] = $this->Kunjungan_m->get_join('berobat')->result_array();
		$data['petugas'] = $this->petugas_m->get('petugas')->result_array();
		$data['bayi'] = $this->bayi_m->get('bayi')->result_array();
		$this->form_validation->set_rules('bayi', 'Nama bayi', 'required|trim');
		$this->form_validation->set_rules('petugas', 'Nama petugas', 'required|trim');
		$this->form_validation->set_rules('tgl', 'Tanggal berobat', 'required|trim');
		// $this->form_validation->set_rules('tindakan', 'tindakan', 'required|trim');
		// $this->form_validation->set_rules('diagnosa', 'Diagnosa', 'required|trim');
		// $this->form_validation->set_rules('penata', 'Penatalaksanaan', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar');
			$this->load->view('admin/kunjungan/index', $data);
			$this->load->view('layout/footer');
		} else {
			$data = [
				'id_bayi' => html_escape($this->input->post('bayi', true)),
				'id_petugas' => html_escape($this->input->post('petugas', true)),
				'tgl_berobat' => html_escape($this->input->post('tgl', true))
			];
			$this->Kunjungan_m->tambahDataKunjungan($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Transaksi Berhasil Ditambahkan.</div>');
			redirect('admin/kunjungan');
		}
	}

	public function ubah($id)
	{
		$data['title'] = 'Ubah Data Transaksi';
		$where = ['id_berobat' => $id];
		$data['kunjungan'] = $this->Kunjungan_m->get_where('berobat', $where)->row_array();
		$this->form_validation->set_rules('bayi', 'Nama bayi', 'required|trim');
		$this->form_validation->set_rules('petugas', 'Nama petugas', 'required|trim');
		$this->form_validation->set_rules('tgl', 'Tanggal berobat', 'required|trim');
		$data['petugas'] = $this->petugas_m->get('petugas')->result_array();
		$data['bayi'] = $this->bayi_m->get('bayi')->result_array();
		if($this->form_validation->run() == FALSE) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar');
			$this->load->view('admin/kunjungan/ubah', $data);
			$this->load->view('layout/footer');
		} else {
			$id = $this->input->post('id_berobat');
			$data = [
				'id_bayi' => html_escape($this->input->post('bayi', true)),
				'id_petugas' => html_escape($this->input->post('petugas', true)),
				'tgl_berobat' => html_escape($this->input->post('tgl', true))
			];
			$this->Kunjungan_m->ubahDataKunjungan($data, $id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Transaksi Berhasil Diubah.</div>');
			redirect('admin/kunjungan');
		}
	}

	public function hapus($id)
	{
		$this->db->delete('berobat', ['id_berobat' => $id]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Transaksi Berhasil Dihapus.</div>');
		redirect('admin/kunjungan');
	}

	// tindakan MEDIS
	public function tindakan($id)
	{
		// $id = id_berobat
		$data['title'] = 'Tindakan Medis';
		// $where = ['id_bayi'];
		// $data['bayi'] = $this->bayi_m->get_where('bayi', $where)->row_array();

		// Tampil detail tindakan medis
		$data['d'] = $this->Kunjungan_m->get_tindakan($id)->row_array();

		// Ambil id_berobat berdasarkan id_berobat / tampil riwayat kunjungan
		$where = ['id_berobat' => $id];
		$data['idberobat'] = $this->imunisasi_m->get_where('berobat', $where)->row_array();
		$idbayi = $data['idberobat']['id_bayi'];
		$data['riwayat'] = $this->Kunjungan_m->get_riwayat($idbayi)->result_array();

		// menampilkan data imunisasi
		$data['imunisasi'] = $this->imunisasi_m->get('imunisasi')->result_array();
		// menampilkan resep imunisasi
		// $idberobat = $data['idberobat']['id_berobat'];
		$data['resep'] = $this->Kunjungan_m->get_resep($id)->result_array();
		// var_dump($data['resep']);
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar');
		$this->load->view('admin/kunjungan/tindakan_medis', $data);
		$this->load->view('layout/footer');
	}

	public function tambahtindakan()
	{
		$idberobat = $this->input->post('id_berobat', true);
		$tindakan = $this->input->post('tindakan', true);
		$diagnosa = $this->input->post('diagnosa', true);
		$penata = $this->input->post('penata', true);

		$data = [
			'tindakan' => $tindakan,
			'diagnosa' => $diagnosa,

		];
		$where = ['id_berobat' => $idberobat];
		$this->Kunjungan_m->update_where('berobat', $data, $where);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Tindakan Medis Berhasil Diperbarui.</div>');
		redirect('admin/kunjungan/tindakan/' . $idberobat);
	}

	public function tambahResep()
	{
		$idberobat = $this->input->post('id_berobat', true);
		$imunisasi = $this->input->post('imunisasi', true);

		$data = [
			'id_berobat' => $idberobat,
			'id_imunisasi' => $imunisasi
		];

		$this->Kunjungan_m->insert('resep_imunisasi', $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Resep imunisasi Berhasil Diperbarui.</div>');
		redirect('admin/kunjungan/tindakan/' . $idberobat);
	}

	public function hapusResep($idResep, $idberobat)
	{
		$this->db->delete('resep_imunisasi', ['id_resep' => $idResep]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Resep imunisasi Berhasil Dihapus.</div>');
		redirect('admin/kunjungan/tindakan/' . $idberobat);
	}

	public function laporan()
	{
		$data['title'] = 'Laporan Transaksi';
		$data['kunjungan'] = $this->Kunjungan_m->get_join('berobat')->result_array();
		$this->load->view('layout/header', $data);
		$this->load->view('admin/laporan/laporan_kunjungan');
		$this->load->view('layout/footer');
	}

}