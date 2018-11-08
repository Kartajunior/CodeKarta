<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
        $this->load->library('datatables');
		$this->load->model('M_Siswa');
		
	}

	public function index()
	{
		
		$data['judul']		='Siswa';
		$this->template->load('Admin/layout','Admin/Siswa',$data);
    }
    
    public function json() {
	    $this->load->library('datatables');
		header('Content-Type: application/json');
		echo $this->M_Siswa->get_all_data();
    }

     public function detail($nisn)
	{
		$data['judul']		='Siswa Detail';
		$data['detail_siswa'] = $this->M_Siswa->get_detail($nisn);
		$this->template->load('Admin/layout','Admin/Siswa_Detail',$data);
	}
	
}
