<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
        $this->load->library('datatables');
        $this->load->model('M_Stock');
	}

	
	public function index()
	{
		$data['judul']		='Stock';
		$this->template->load('Admin/layout','Admin/Stock',$data);
	}
	public function json() {
	    $this->load->library('datatables');
		header('Content-Type: application/json');
		echo $this->M_Stock->get_all_data();
	}
}
