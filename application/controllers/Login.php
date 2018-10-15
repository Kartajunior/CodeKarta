<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('M_login');
		
	}

	public function index()
	{
		switch ($this->session->userdata('isiLogin')) {
			case 'TRUE':
				switch ($this->session->userdata('level')) {
					case '1':
						redirect('Home');
						break;
					case '2':
						redirect('Guru_Dashboard');
						break;
					case '3':
						redirect('Tata_Usaha_Dashboard');
						break;
					case '4':
						redirect('Siswa_Dashboard');
						break;
					case '5':
						redirect('Wali_Kelas_Dashboard');
						break;
					
					default:
						$this->load->view('Login');
						break;
				}
				break;
			
			default:
				$this->load->view('Login');
				break;
		}
	}
	
	function do_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$cek = $this->M_login->cek_user($username , md5($password));
		if (count($cek) == 1) {
			foreach ($cek as $cek) {
				$level 		= $cek['login_type'];
				$status 	= $cek['status'];
				$id 		= $cek['id'];
				$kode_user	= $cek['kode_user'];
				
			}
			switch ($level) {
				case '1':
					switch ($status) {
						case 'Active':
							$this->session->set_userdata(array(
								'isiLogin'	=>TRUE, // set data telah login
								'username'	=>$username, // set session username
								'level'		=>$level, // set session hak akses
								'id'		=>$id,
								'kode_user'	=>$kode_user
								
							));
							redirect('Home');
							break;
						case 'Non Active':
							$this->session->set_flashdata('gagalLogin','username Sudah Tidak Dapat di Pergunakan');
							$this->load->view('Login');
							break;
					}
					break;
				case '2':
					switch ($status) {
						case 'Active':
							$this->session->set_userdata(array(
								'isiLogin'	=>TRUE, // set data telah login
								'username'	=>$username, // set session username
								'level'		=>$level, // set session hak akses
								'id'		=>$id,
								'kode_user'	=>$kode_user
							));
							redirect('Guru_Dashboard');
							break;
						case 'Non Active':
							$this->session->set_flashdata('gagalLogin','username Sudah Tidak Dapat di Pergunakan');
							$this->load->view('Login');
							break;
					}
					break;
			
			}
		}else{
			$this->session->set_flashdata('gagalLogin','username atau password salah');
			$this->load->view('Login');
		}
	}

}