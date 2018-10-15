<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
        $this->load->library('datatables');
		$this->load->model('M_Kelas');
		$this->load->model('M_Tahun_ajaran');
	}

	public function index()
	{
		$data['m_tahun'] = $this->M_Tahun_ajaran->get_tahun_ajaran();
		$data['judul']		='Kelas';
		$this->template->load('Admin/layout','Admin/Kelas',$data);
    }
    
    public function json() {
	    $this->load->library('datatables');
		header('Content-Type: application/json');
		echo $this->M_Kelas->get_all_data();
    }
	
	public function tambah(){

		$kelas = $this->input->post('kelas');
		$nama_kelas = $this->input->post('nama_kelas');

		$data = array(
			'kelas' => $kelas,
			'nama_kelas' => $nama_kelas
			);
		$this->M_Kelas->input_data($data,'kelas');
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('Kelas');
	}
	
	public function update(){
		$id = $this->input->post('id');
		$kelas = $this->input->post('kelas');
		$nama_kelas = $this->input->post('nama_kelas');

		$data = array(
			'kelas' => $kelas,
			'nama_kelas' => $nama_kelas
			);

		$where = array(
			'id' => $id
		);

		//$this->M_Tahun_ajaran->edit_data($where,$data,'tahun_ajaran');
	    $this->db->update('kelas',$data, array('id' => $id));
		$this->session->set_flashdata('notif','<div class="alert alert-info" role="alert"> Data Berhasil diedit <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('Kelas');
	}

	public function delete(){
		$id = $this->input->post('id');
		
		$where = array(
			'id' => $id
		);

	    $this->db->delete('kelas', array('id' => $id));
		$this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('Kelas');
	}

	public function DataKelasJson() {
	    $this->load->library('datatables');
		header('Content-Type: application/json');
		echo $this->M_Kelas->get_all_datakelas();
    }

    public function KelasData()
	{
		$data['judul']		='Kelas Data';
		$this->template->load('Admin/layout','Admin/Kelas_Data',$data);
	}
	
	public function DataKelasAnggotaJson() {
	    $this->load->library('datatables');
		header('Content-Type: application/json');
		echo $this->M_Kelas->get_all_DataKelasAnggota();
    }

    public function KelasDataAnggota()
	{
		$data['judul']		='Data Anggota Kelas ';
		$this->template->load('Admin/layout','Admin/Kelas_Anggota',$data);
    }
}
