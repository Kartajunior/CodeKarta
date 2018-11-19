<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Jadwal extends CI_Model {

     public function GetAllJadwal() {
         
        $th_ajar = $this->session->userdata('th_ajaran');

        $this->db->select('*');
        $this->db->from('jadwal g');
        $this->db->join('mengajar a', 'a.id = g.id_mengajar','LEFT');
        $this->db->join('guru b', 'a.id_guru = b.id','LEFT');
        $this->db->join('kelas_detail c', 'a.id_kelas_detail = c.id','LEFT');
        $this->db->join('pelajaran d', 'a.id_pelajaran = d.id','LEFT');
        $this->db->join('tahun_ajaran e', 'c.id_tahun_ajaran = e.id','LEFT');
        $this->db->join('kelas f', 'c.id_kelas = f.id','LEFT');
        
        //$this->db->where('e.id', $th_ajar);
        $this->db->where(array('e.id', $th_ajar)); 
         $this->db->group_by('f.nama_kelas');
        $query = $this->db->get();
        return $query->result();
    }

     public function GetAllJadwalTable() {
         
        $th_ajar = $this->session->userdata('th_ajaran');

        $this->db->select('*');
        $this->db->from('jadwal g');
        $this->db->join('mengajar a', 'a.id = g.id_mengajar','LEFT');
        $this->db->join('guru b', 'a.id_guru = b.id','LEFT');
        $this->db->join('kelas_detail c', 'a.id_kelas_detail = c.id','LEFT');
        $this->db->join('pelajaran d', 'a.id_pelajaran = d.id','LEFT');
        $this->db->join('tahun_ajaran e', 'c.id_tahun_ajaran = e.id','LEFT');
        $this->db->join('kelas f', 'c.id_kelas = f.id','LEFT');
       
        $this->db->where('e.id', $th_ajar);
        $this->db->group_by('f.nama_kelas');
        
       
        $query = $this->db->get();
        return $query->result();
    }
}