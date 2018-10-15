<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ekskul extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
        $this->load->library('datatables');
		$this->load->model('M_Ekskul');
		$this->load->model('M_Tahun_Ajaran');
	}

	public function index()
	{
		$data['judul']		='Ekstrakurikuler';
		$this->template->load('Admin/layout','Admin/Ekskul',$data);
    }

     
    public function json() {
	    $this->load->library('datatables');
		header('Content-Type: application/json');
		echo $this->M_Ekskul->get_all_data();
    }

    public function tambah(){

		$nama_ekskul = $this->input->post('nama_ekskul');

		$data = array(
			'nama_ekskul' => $nama_ekskul
			);
		$this->M_Ekskul->input_data($data,'ekskul');
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('ekskul');
    }
    
    public function update(){
		$id = $this->input->post('id');
		$nama_ekskul = $this->input->post('nama_ekskul');

		$data = array(
			'nama_ekskul' => $nama_ekskul
			);

		$where = array(
			'id' => $id
		);

		//$this->M_Tahun_ajaran->edit_data($where,$data,'tahun_ajaran');
	    $this->db->update('ekskul',$data, array('id' => $id));
		$this->session->set_flashdata('notif','<div class="alert alert-info" role="alert"> Data Berhasil diedit <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('ekskul');
	}

	public function delete(){
		$id = $this->input->post('id');
		
		$where = array(
			'id' => $id
		);

	    $this->db->delete('ekskul', array('id' => $id));
		$this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('ekskul');
	}

	public function EkskulData()
	{
		
		$data['judul']		='Ekstrakurikuler';
		$this->template->load('Admin/layout','Admin/Ekskul_Data',$data);
    }

     
    public function EkskulDataJson() {
	    $this->load->library('datatables');
		header('Content-Type: application/json');
		echo $this->M_Ekskul->get_all_data_ekskul();
	}
	
	public function EkskulAnggota()
	{
		$data['judul']		='Ekstrakurikuler';
		$this->template->load('Admin/layout','Admin/Ekskul_Anggota',$data);
    }

     
    public function EkskulAnggotaJson() {
	    $this->load->library('datatables');
		header('Content-Type: application/json');
		echo $this->M_Ekskul->get_all_data_ekskul_anggota();
    }
}