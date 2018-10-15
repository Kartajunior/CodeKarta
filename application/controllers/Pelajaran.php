<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelajaran extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
        $this->load->library('datatables');
        $this->load->model('M_Pelajaran');
	}

	public function index()
	{
		$data['judul']		='Pelajaran';
		$this->template->load('Admin/layout','Admin/Pelajaran',$data);
    }
    
    public function json() {
	    $this->load->library('datatables');
		header('Content-Type: application/json');
		echo $this->M_Pelajaran->get_all_data();
    }
	
	public function tambah(){

		$kd_pelajaran = $this->input->post('kd_pelajaran');
		$nama_pelajaran = $this->input->post('nama_pelajaran');

		$data = array(
			'kd_pelajaran' => $kd_pelajaran,
			'nama_pelajaran' => $nama_pelajaran
			);
		$this->M_Pelajaran->input_data($data,'pelajaran');
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('Pelajaran');
	}
	
	public function update(){
		$id = $this->input->post('id');
		$kd_pelajaran = $this->input->post('kd_pelajaran');
		$nama_pelajaran = $this->input->post('nama_pelajaran');

		$data = array(
			'kd_pelajaran' => $kd_pelajaran,
			'nama_pelajaran' => $nama_pelajaran
			);

		$where = array(
			'id' => $id
		);

		//$this->M_Tahun_ajaran->edit_data($where,$data,'tahun_ajaran');
	    $this->db->update('pelajaran',$data, array('id' => $id));
		$this->session->set_flashdata('notif','<div class="alert alert-info" role="alert"> Data Berhasil diedit <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('Pelajaran');
	}

	public function delete(){
		$id = $this->input->post('id');
		
		$where = array(
			'id' => $id
		);

	    $this->db->delete('pelajaran', array('id' => $id));
		$this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('Pelajaran');
	}
}
