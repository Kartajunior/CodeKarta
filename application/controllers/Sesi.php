<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sesi extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
        $this->load->library('datatables');
        $this->load->model('M_Sesi');
	}

	public function index()
	{
		$data['judul']		='Sesi Jadwal Pelajaran';
		$data['m_sesi'] = $this->M_Sesi->getAllData();

		$this->template->load('Admin/layout','Admin/Sesi',$data);
    }

    public function tambah(){

		$sesi = $this->input->post('sesi');
		$jam_mulai = $this->input->post('jam_mulai');
		$jam_selesai = $this->input->post('jam_selesai');
 
		$data = array(
			'sesi' => $sesi,
			'jam_mulai' => $jam_mulai,
			'jam_selesai' => $jam_selesai
			);
		$this->M_Sesi->tambah($data,'sesi');
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('Sesi');
	}

	public function edit(){
		$id = $this->input->post('id');
		$sesi = $this->input->post('sesi');
		$jam_mulai = $this->input->post('jam_mulai');
		$jam_selesai = $this->input->post('jam_selesai');

		$data = array(
			'sesi' => $sesi,
			'jam_mulai' => $jam_mulai,
			'jam_selesai' => $jam_selesai
		);

		$where = array(
			'id' => $id
		);

		//$this->M_Tahun_ajaran->edit_data($where,$data,'tahun_ajaran');
	    $this->db->update('sesi',$data, array('id' => $id));
		$this->session->set_flashdata('notif','<div class="alert alert-info" role="alert"> Data Berhasil diedit <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('sesi');
	}
}