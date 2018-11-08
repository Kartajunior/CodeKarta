<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_Data extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
        $this->load->library('datatables');
		$this->load->model('M_Kelas');
		$this->load->model('M_Tahun_ajaran');
	}

	public function index()
	{
		$data['judul']		='Kelas Data';
		$this->template->load('Admin/layout','Admin/Kelas_Data',$data);
    }
    
	public function Json() {
	    $this->load->library('datatables');
		header('Content-Type: application/json');
		echo $this->M_Kelas->get_all_datakelas();
    }

}
