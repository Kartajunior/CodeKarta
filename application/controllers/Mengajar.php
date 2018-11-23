<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mengajar extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
        $this->load->library('datatables');
		$this->load->model('M_Mengajar');
		$this->load->model('M_Kelas');
		$this->load->model('M_Tahun_ajaran');
		$this->load->helper("url");
		$this->load->library("pagination");
	}

	//edit apl sol
	public function index()
	{
        
        $nama_kelas=$this->input->post("nama_kelas");
       
		$data['judul']		='Data Pengajar ';
	    $data['m_kelas'] = $this->M_Kelas->get_all_kelas();
		$data['m_kel'] = $this->M_Kelas->get_kelas();


		$config = array();
		$config["base_url"] = site_url('Mengajar/index');
		$config["total_rows"] = $this->M_Mengajar->countall();
	    $config["per_page"] = 20;
	    $config["uri_segment"] = 3;

	    $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

	    $this->pagination->initialize($config);
	 	$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	 	$limit = $config["per_page"];
	 	$data["links"] = $this->pagination->create_links();
	 	$data['m_mengajar'] = $this->M_Mengajar->GetAllMengajar($limit, $offset);
	    
		$this->template->load('Admin/layout','Admin/Mengajar',$data);
    }

   

		//edit apl sol
	public function getByKelas()
	{
        $kelas=$this->input->post("kelas");
        $nama_kelas=$this->input->post("nama_kelas");
       
		$data['judul']		='Data Pengajar ';
	    $data['m_kelas'] = $this->M_Kelas->get_all_kelas();
		$data['m_kel'] = $this->M_Kelas->get_kelas();


		$config = array();

		$nama_kelas = $this->input->post('nama_kelas');
		if ($nama_kelas === null) $nama_kelas = $this->session->userdata('nama_kelas');
		else $this->session->set_userdata('nama_kelas',$nama_kelas);


		$config["base_url"] = site_url('Mengajar/getByKelas');
		$config["total_rows"] = $this->M_Mengajar->countall();
	    $config["per_page"] = 20;
	    $config["uri_segment"] = 3;

	    $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

	    $this->pagination->initialize($config);
	 	$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	 	$limit = $config["per_page"];
	 	$data["links"] = $this->pagination->create_links();
	 	$data['m_mengajar'] = $this->M_Mengajar->getByKelas($nama_kelas, $limit, $offset);
	    
		$this->template->load('Admin/layout','Admin/Mengajar',$data);
    }
	
}
