<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ekskul_Data extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
        $this->load->library('datatables');
		$this->load->model('M_Ekskul');
		$this->load->model('M_Tahun_ajaran');
	}

	public function index()
	{
		
		$data['judul']		='Ekstrakurikuler';
		$this->template->load('Admin/layout','Admin/Ekskul_Data',$data);
    }

     
    public function json() {
	    $this->load->library('datatables');
		header('Content-Type: application/json');
		echo $this->M_Ekskul->get_all_data_ekskul();
	}
	
	
}
