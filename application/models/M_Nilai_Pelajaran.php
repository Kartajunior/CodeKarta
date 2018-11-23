<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Nilai_Pelajaran extends CI_Model {

    public function get_all_data($limit, $offset) {

        $th_ajar = $this->session->userdata('th_ajaran');

        $this->db->select('*');
        $this->db->select('a.id as id');
        $this->db->select('d.nama_lengkap as nama_guru');
        $this->db->from('nilai_pelajaran a');
        $this->db->join('mengajar b', 'a.id_mengajar = b.id');
        $this->db->join('pelajaran c', 'b.id_pelajaran = c.id');
        $this->db->join('guru d', 'b.id_guru = d.id');
        $this->db->join('kelas_detail e', 'b.id_kelas_detail = e.id');
        $this->db->join('kelas f', 'e.id_kelas = f.id');
        $this->db->join('tahun_ajaran g', 'e.id_tahun_ajaran = g.id');
        $this->db->where('g.id', $th_ajar);
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result();
    }

    public function countall()
    {

       $query = $this->db->get('nilai_pelajaran');
       return $query->num_rows();
    }

     //add By APL-SOL
    public function search_data($guru, $limit, $offset) 
    {

        $th_ajar = $this->session->userdata('th_ajaran');

        $this->db->select('*');
        $this->db->select('a.id as id');
        $this->db->select('d.nama_lengkap as nama_guru');
        $this->db->from('nilai_pelajaran a');
        $this->db->join('mengajar b', 'a.id_mengajar = b.id');
        $this->db->join('pelajaran c', 'b.id_pelajaran = c.id');
        $this->db->join('guru d', 'b.id_guru = d.id');
        $this->db->join('kelas_detail e', 'b.id_kelas_detail = e.id');
        $this->db->join('kelas f', 'e.id_kelas = f.id');
        $this->db->join('tahun_ajaran g', 'e.id_tahun_ajaran = g.id');
        $this->db->where('g.id', $th_ajar);
        $this->db->where('b.id_guru', $guru);
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        if($query->num_rows() > 0 ){
         return $query->result();
        }else{
        return $query->result();
        }
     }
    
}