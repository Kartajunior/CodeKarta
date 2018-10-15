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
	
	function Cek_Tahun()
	{
		$t_ajaran = $this->input->post('t_ajaran');

		$cek = $this->M_Tahun_ajaran->cek_tahun($t_ajaran);
		if (count($cek) == 1) {
			foreach ($cek as $cek) {
				$tahun_ajaran_select 		= $cek['id'];
				$nama_ta 					= $cek['nama_ta'];
				$semester 					= $cek['semester'];
				$status 					= $cek['status'];
				
			}

			switch ($status) {
						case 'Aktif':
							$this->session->set_userdata(array(
								
								'th_ajaran'			=>$tahun_ajaran_select, // set session username
								'nama_ta'		=>$nama_ta, // set session hak akses
								'semester'		=>$semester,
								'status'	    =>$status
							
							));
							// $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Yang Di Pilih <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
							 redirect('Home');	
							break;
						case 'Non Aktif':
							//$this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Gak Milih <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
							redirect('Home');
							break;
					}
		}else{
			redirect('Home');
		}
	
	}

}