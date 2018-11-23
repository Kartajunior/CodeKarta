<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun_ajaran extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
        $this->load->library('datatables');
        $this->load->model('M_Tahun_ajaran');
	}

	public function index()
	{
		$data['judul']		='Tahun Ajaran';
		$this->template->load('Admin/layout','Admin/Tahun_ajaran',$data);
	}
	public function json() {
	    $this->load->library('datatables');
		header('Content-Type: application/json');
		echo $this->M_Tahun_ajaran->get_all_data();
	}

	public function Tambah(){

		$this->form_validation->set_rules('tahun_ajaran', 'tahun_ajaran', 'required');
        $this->form_validation->set_rules('semester', 'semester', 'required');
        $this->form_validation->set_rules('status', 'status ', 'required');
        

		$nama_ta = $this->input->post('nama_ta');
		$semester = $this->input->post('semester');
		$status = $this->input->post('status');
 
		$data = array(
			'nama_ta' => $nama_ta,
			'semester' => $semester,
			'status' => $status
			);
		$this->M_Tahun_ajaran->input_data($data,'tahun_ajaran');
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('Tahun_ajaran');
	}

	public function update(){
		$id = $this->input->post('id');
		$nama_ta = $this->input->post('nama_ta');
		$semester = $this->input->post('semester');
		$status = $this->input->post('status');

		$data = array(
			'nama_ta' => $nama_ta,
			'semester' => $semester,
			'status' => $status
		);

		$where = array(
			'id' => $id
		);

		//$this->M_Tahun_ajaran->edit_data($where,$data,'tahun_ajaran');
	    $this->db->update('tahun_ajaran',$data, array('id' => $id));
		$this->session->set_flashdata('notif','<div class="alert alert-info" role="alert"> Data Berhasil diedit <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('Tahun_ajaran');
	}

	public function delete(){
		$id = $this->input->post('id');
		
		$where = array(
			'id' => $id
		);

	    $this->db->delete('tahun_ajaran', array('id' => $id));
		$this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('Tahun_ajaran');
	}
	
}
