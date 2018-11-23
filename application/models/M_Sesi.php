<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Sesi extends CI_Model {

     public function getAllData(){
    
      $this->db->select('*');
      $this->db->from('sesi'); 
       
        $query = $this->db->get();
        return $query->result();
    }

    public function tambah($data,$table){
		$this->db->insert($table,$data);
    }
   
}