<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {


	public function __construct()
	{
		parent::__construct();
	}


	function cek_user($username="",$password="")
	{
		$query = $this->db->get_where('login_user',array('username'=> $username, 'password'=> $password));
		$query = $query->result_array();
		return $query;
	}

	function getTechnician()
	{
			$query = $this->db->get_where('login_user',array('login_type' => 3));
        return $query->result();
	}

	public function GetPass()
	{
		$id = $this->session->userdata('id');

		$query = $this->db->get_where('login_user',array('id' => $id));
        return $query->result();
	}

	public function Change_password($where, $data)
	{
		$this->db->update('login_user', $data, $where);
        return TRUE;
	}

}