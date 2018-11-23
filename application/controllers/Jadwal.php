<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
        $this->load->library('datatables');
        $this->load->model('M_Jadwal');
        $this->load->model('M_Kelas');
        $this->load->model('M_Pelajaran');
	}

	public function index()
	{
		$data['judul']		=' Jadwal Pelajaran';
		$data['m_jadwal'] = $this->M_Jadwal->getAllData();
		$data['m_kelas'] = $this->M_Jadwal->get_all_kelas();
		$data['m_pelajaran'] = $this->M_Pelajaran->get_all_pelajaran();

		$this->template->load('Admin/layout','Admin/Jadwal',$data);
    }

    public function getByKelas()
	{
		$data['judul']		=' Jadwal Pelajaran';

		$nama_kelas=$this->input->post("nama_kelas");
		$data['m_pelajaran'] = $this->M_Pelajaran->get_all_pelajaran();
		$data['m_kelas'] = $this->M_Jadwal->get_all_kelas();
		$data['m_jadwal'] = $this->M_Jadwal->getByKelas($nama_kelas);
		

		$this->template->load('Admin/layout','Admin/Jadwal',$data);
    }

      public function tambah(){

		$sesi = $this->input->post('sesi');
		$senin = $this->input->post('senin');
		$selasa = $this->input->post('selasa');
		$rabu = $this->input->post('rabu');
		$kamis = $this->input->post('kamis');
		$jumat = $this->input->post('jumat');
		$sabtu = $this->input->post('sabtu');
		$kelas = $this->input->post('kelas');

		$data = array(
			'id_sesi' => $sesi,
			'senin' => $senin,
			'selasa' => $selasa,
			'rabu' => $rabu,
			'kamis' => $kamis,
			'jumat' => $jumat,
			'sabtu' => $sabtu,
			'id_kelas_detail' => $kelas
			);
		$this->M_Jadwal->tambah($data,'jadwal');
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('Jadwal');
	}
}