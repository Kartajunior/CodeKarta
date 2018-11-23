<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Absensi extends CI_Controller {
	public function __construct()
	{
		parent:: __construct();
        $this->load->library('datatables');
		$this->load->model('M_Kelas');
		$this->load->model('M_Tahun_ajaran');
		$this->load->model('M_Absensi');
		$this->load->helper("url");
		$this->load->library("pagination");
	}
	public function index()
	{
		
        $data['judul']		='Absensi Siswa ';
        $kelas=$this->input->post("kelas");
        $nama_kelas=$this->input->post("nama_kelas");
        $data['m_kelas'] = $this->M_Kelas->get_all_kelas();
		$data['m_kel'] = $this->M_Kelas->get_kelas();
		
		$data['header'] = $this->M_Kelas->getHeaderKelas($kelas,$nama_kelas);
		$config = array();
		$config["base_url"] = site_url('Absensi/index');
		$config["total_rows"] = $this->M_Absensi->countall();
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
	 	$data['m_absensi'] = $this->M_Absensi->GetAllAbsensi($limit, $offset);
	    
		$this->template->load('Admin/layout','Admin/Absensi',$data);
    }
    function getNamaKelas()
	{
	        
            $query = $this->M_Kelas->get_nama_kelas();
	        
	        echo '<option value=""> Select Nama Kelas </option>';
                foreach($query->result() as $row)
                { 
                 echo "<option value='".$row->nama_kelas."'>".$row->nama_kelas."</option>";
                }
	}
    
	public function GetByKelas()
	{
		
        $data['judul']		='Absensi Siswa ';
        $kelas=$this->input->post("kelas");
        $nama_kelas=$this->input->post("nama_kelas");
        $data['m_kelas'] = $this->M_Kelas->get_all_kelas();
		$data['m_kel'] = $this->M_Kelas->get_kelas();
		
		$data['header'] = $this->M_Kelas->getHeaderKelas($kelas,$nama_kelas);
		$kelas = $this->input->post('kelas');
		if ($kelas === null) $kelas = $this->session->userdata('kelas');
		else $this->session->set_userdata('kelas',$kelas);
		$nama_kelas = $this->input->post('nama_kelas');
		if ($nama_kelas === null) $nama_kelas = $this->session->userdata('nama_kelas');
		else $this->session->set_userdata('nama_kelas',$nama_kelas);
	
	 	$data['m_absensi'] = $this->M_Absensi->GetByKelas($kelas, $nama_kelas);
	    
		$this->template->load('Admin/layout','Admin/Absensi_Form',$data);
    }
	
	 public function update()
	{
		$id = $this->input->post('id'); //array of id
		$sakit = $this->input->post('sakit'); //array or qty
		$ijin = $this->input->post('ijin'); //array of price
		$alpa = $this->input->post('alpa'); // not array
		$updateArray = array();
		for($x = 0; $x < sizeof($id); $x++){
		   
		    $updateArray[] = array(
		        'id'=>$id[$x],
		        'sakit' => $sakit[$x],
		        'ijin' => $ijin[$x],
		        'alpa' => $alpa[$x]
		        
		    );
		}      
	    	$this->db->update_batch('Absensi',$updateArray, 'id');
			$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Update Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			
	    	redirect('Absensi');
	}
}