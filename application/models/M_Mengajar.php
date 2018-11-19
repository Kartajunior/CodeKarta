<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Mengajar extends CI_Model {

     public function GetAllMengajar($limit, $offset) {
         
        $th_ajar = $this->session->userdata('th_ajaran');

        $this->db->select('*');
        $this->db->select('b.nama_lengkap as nama_guru');
        $this->db->from('mengajar a');
        $this->db->join('guru b', 'a.id_guru = b.id','LEFT');
        $this->db->join('kelas_detail c', 'a.id_kelas_detail = c.id','LEFT');
        $this->db->join('pelajaran d', 'a.id_pelajaran = d.id','LEFT');
        $this->db->join('tahun_ajaran e', 'c.id_tahun_ajaran = e.id','LEFT');
        $this->db->join('kelas f', 'c.id_kelas = f.id');
        $this->db->where('e.id', $th_ajar);
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result();
    }
    
     public function countall()
    {
       
        $th_ajar = $this->session->userdata('th_ajaran');

        $this->db->select('*');
        $this->db->select('b.nama_lengkap as nama_guru');
        $this->db->from('mengajar a');
           $this->db->join('guru b', 'a.id_guru = b.id','LEFT');
        $this->db->join('kelas_detail c', 'a.id_kelas_detail = c.id','LEFT');
        $this->db->join('pelajaran d', 'a.id_pelajaran = d.id','LEFT');
        $this->db->join('tahun_ajaran e', 'c.id_tahun_ajaran = e.id','LEFT');
        $this->db->join('kelas f', 'c.id_kelas = f.id');
        $this->db->where('e.id', $th_ajar);
       

        $query = $this->db->get();
        return $query->num_rows();
    }

    public function getByKelas($kelas, $nama_kelas, $limit, $offset) {
         
        $th_ajar = $this->session->userdata('th_ajaran');

        $this->db->select('*');
        $this->db->select('b.nama_lengkap as nama_guru');
        $this->db->from('mengajar a');
        $this->db->join('guru b', 'a.id_guru = b.id','LEFT');
        $this->db->join('kelas_detail c', 'a.id_kelas_detail = c.id','LEFT');
        $this->db->join('pelajaran d', 'a.id_pelajaran = d.id','LEFT');
        $this->db->join('tahun_ajaran e', 'c.id_tahun_ajaran = e.id','LEFT');
        $this->db->join('kelas f', 'c.id_kelas = f.id');
        $this->db->where('e.id', $th_ajar);
        $this->db->where('f.kelas', $kelas);
        $this->db->where('f.nama_kelas', $nama_kelas);

        if (empty($nama_kelas)) {
                $this->db->where('e.id', $th_ajar);
                $this->db->where('f.kelas', $kelas);
                $this->db->or_where('f.nama_kelas', $nama_kelas);

        }
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result();
    }

}