<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
        $this->load->library('datatables');
        $this->load->model('M_Guru');
	}

	public function index()
	{
		$data['judul']		='Guru';
		$this->template->load('Admin/layout','Admin/Guru',$data);
    }
    
    public function json() {
	    $this->load->library('datatables');
		header('Content-Type: application/json');
		echo $this->M_Guru->get_all_data();
    }

    public function detail($id)
	{
		$data['judul']		='Guru Detail';
		$data['detail_guru'] = $this->M_Guru->get_detail($id);
		$this->template->load('Admin/layout','Admin/Guru_detail',$data);
	}
	
	public function edit($id)
	{
		$data['judul']		='Guru Edit';
		$data['detail_guru'] = $this->M_Guru->get_detail($id);
		$this->template->load('Admin/layout','Admin/Guru_edit',$data);
	}
	
	

}