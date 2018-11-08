<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Absensi extends CI_Model {

     public function GetAllAbsensi($limit, $offset) {
         
        $th_ajar = $this->session->userdata('th_ajaran');

       $this->db->select('a.id as id, a.id_kelas_anggota as id_kelas_anggota , a.sakit, a.ijin, a.alpa, d.kelas, d.nama_kelas, e.nama_ta, e.semester, f.nisn, f.nis, f.nama_lengkap as nama_siswa, g.nama_lengkap as nama_guru');
        $this->db->from('absensi a');
        $this->db->join('kelas_anggota b', 'a.id_kelas_anggota = b.id');
        $this->db->join('kelas_detail c', 'b.id_kelas_detail = c.id');
        $this->db->join('kelas d', 'c.id_kelas = d.id');
        $this->db->join('tahun_ajaran e', 'c.id_tahun_ajaran = e.id');
        $this->db->join('siswa f', 'b.nisn = f.nisn');
        $this->db->join('guru g', 'c.id_guru = g.id');
        $this->db->where('e.id', $th_ajar);
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result();
    }
    
     public function countall()
    {
         $th_ajar = $this->session->userdata('th_ajaran');

       $this->db->select('a.id as id, a.id_kelas_anggota as id_kelas_anggota , a.sakit, a.ijin, a.alpa, d.kelas, d.nama_kelas, e.nama_ta, e.semester, f.nisn, f.nis, f.nama_lengkap as nama_siswa, g.nama_lengkap as nama_guru');
        $this->db->from('absensi a');
        $this->db->join('kelas_anggota b', 'a.id_kelas_anggota = b.id');
        $this->db->join('kelas_detail c', 'b.id_kelas_detail = c.id');
        $this->db->join('kelas d', 'c.id_kelas = d.id');
        $this->db->join('tahun_ajaran e', 'c.id_tahun_ajaran = e.id');
        $this->db->join('siswa f', 'b.nisn = f.nisn');
        $this->db->join('guru g', 'c.id_guru = g.id');
        $this->db->where('e.id', $th_ajar);

       $query = $this->db->get();
       return $query->num_rows();
    }

     //add By APL-SOL
    public function GetByKelas($kelas, $nama_kelas) 
    {

        $th_ajar = $this->session->userdata('th_ajaran');

        $this->db->select('a.id as id, a.id_kelas_anggota as id_kelas_anggota , a.sakit, a.ijin, a.alpa, d.kelas, d.nama_kelas, e.nama_ta, e.semester, f.nisn, f.nis, f.nama_lengkap as nama_siswa, g.nama_lengkap as nama_guru');
        $this->db->from('absensi a');
        $this->db->join('kelas_anggota b', 'a.id_kelas_anggota = b.id');
        $this->db->join('kelas_detail c', 'b.id_kelas_detail = c.id');
        $this->db->join('kelas d', 'c.id_kelas = d.id');
        $this->db->join('tahun_ajaran e', 'c.id_tahun_ajaran = e.id');
        $this->db->join('siswa f', 'b.nisn = f.nisn');
        $this->db->join('guru g', 'c.id_guru = g.id');
        $this->db->where('e.id', $th_ajar);
    
        $this->db->where('d.kelas', $kelas);
        $this->db->where('d.nama_kelas', $nama_kelas); 
       
        $query = $this->db->get();
        if($query->num_rows() > 0 ){
         return $query->result();
        }else{
        return $query->result();
        }
     }
    
    //end add

}