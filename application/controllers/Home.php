<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
        $this->load->model('M_Tahun_ajaran');
	}

	public function index()
	{
		$data['m_tahun'] = $this->M_Tahun_ajaran->get_tahun_ajaran();
		$data['judul']		='Home';
		$this->template->load('Admin/layout','Admin/Home',$data);
    }
}