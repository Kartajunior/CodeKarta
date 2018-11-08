<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ekskul_Nilai extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
        $this->load->library('datatables');
		$this->load->model('M_Ekskul');
		$this->load->model('M_Tahun_ajaran');
		$this->load->model('M_Siswa');
		$this->load->model('M_Guru');
		$this->load->helper("url");
		$this->load->library("pagination");
	}

	public function index()
	{
		$nama_ekskul = $this->input->post("nama_ekskul");

        $data['judul']		='Ekstrakurikuler Nilai';
		$data['m_ekskul'] = $this->M_Ekskul->get_all_data_ekksul_dropdown();
        
		$data['header'] = $this->M_Ekskul->getHeaderEkskul($nama_ekskul);


		$config = array();
		$config["base_url"] = site_url('Ekskul_Nilai/index');
		$config["total_rows"] = $this->M_Ekskul->countall();
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
	 	$data['m_ekskul_nilai'] = $this->M_Ekskul->GetAllNilaiEkskul($limit, $offset);
	    
		$this->template->load('Admin/layout','Admin/Ekskul_Nilai',$data);
    }

       public function getByEkskul()
	{
		
        $nama_ekskul = $this->input->post("nama_ekskul");

        $data['judul']		='Ekstrakurikuler Nilai';
		$data['m_ekskul'] = $this->M_Ekskul->get_all_data_ekksul_dropdown();
        
		$data['header'] = $this->M_Ekskul->getHeaderEkskul($nama_ekskul);

		$nama_ekskul = $this->input->post('nama_ekskul');
		if ($nama_ekskul === null) $nama_ekskul = $this->session->userdata('nama_ekskul');
		else $this->session->set_userdata('nama_ekskul',$nama_ekskul);

		$config = array();
		$config["base_url"] = site_url('Ekskul_Nilai/getByEkskul');
		$config["total_rows"] = $this->M_Ekskul->countall();
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
	 	$data['m_ekskul_nilai'] = $this->M_Ekskul->getByEkskul($nama_ekskul,$limit, $offset);
	    
		$this->template->load('Admin/layout','Admin/Ekskul_Nilai',$data);
    }

    public function update()
	{
		
		$id_nilai = $this->input->post('id_nilai'); //array or qty
		$ekskul_anggota_id = $this->input->post('ekskul_anggota_id'); //array of price
		$nilai = $this->input->post('nilai'); // not array

		$updateArray = array();

		for($x = 0; $x < sizeof($id_nilai); $x++){

		   
		    $updateArray[] = array(
		        'id'=>$id_nilai[$x],
		        'ekskul_anggota_id' => $ekskul_anggota_id[$x],
		        'nilai' => $nilai[$x]
		        
		        
		    );
		}      
	    	$this->db->update_batch('Ekskul_Nilai',$updateArray, 'id');

			$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Update Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			
	    	redirect('Ekskul_Nilai');
	}
	
}
