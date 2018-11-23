<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jadwal extends CI_Model {

     public function getAllData(){
    	
    	$th_ajar = $this->session->userdata('th_ajaran');

        $this->db->select('*');
        //$this->db->select('*');
        $this->db->from('jadwal j');
        $this->db->join('sesi s', 'j.id_sesi = s.id','LEFT');     
       
        $this->db->join('kelas_detail b', 'j.id_kelas_detail = b.id');
        $this->db->join('kelas c', 'b.id_kelas = c.id');
        $this->db->where('b.id_tahun_ajaran', $th_ajar);
        
        $query = $this->db->get();
        return $query->result();
    }

     public function getByKelas($nama_kelas){
        
        $th_ajar = $this->session->userdata('th_ajaran');
       
        $this->db->select('*');
        //$this->db->select('*');
        $this->db->from('jadwal j');
        $this->db->join('sesi s', 'j.id_sesi = s.id','LEFT');     
       
        $this->db->join('kelas_detail b', 'j.id_kelas_detail = b.id');
        $this->db->join('kelas c', 'b.id_kelas = c.id');
        $this->db->where('b.id_tahun_ajaran', $th_ajar);
        $this->db->where('j.id_kelas_detail', $nama_kelas);
        
        $query = $this->db->get();
        return $query->result();
    }

     public function get_all_kelas(){
        
        $th_ajar = $this->session->userdata('th_ajaran');
       
        $this->db->select('*');
        $this->db->select('a.id as id_kelas_detail');
        $this->db->from('kelas b');
        $this->db->join('kelas_detail a','a.id_kelas = b.id');
        $this->db->where('a.id_tahun_ajaran', $th_ajar);
        
        
        $query = $this->db->get();
        return $query->result();
    }
    
     public function tambah($data,$table){
        $this->db->insert($table,$data);
    }
}