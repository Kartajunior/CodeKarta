<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kelas extends CI_Model {

    public function get_all_data() {
        $this->datatables->select('id,kelas,nama_kelas');
        $this->datatables->from('kelas');
        $this->datatables->add_column('Action','<a href="javascript:void(0);" class="edit_record btn btn-info btn-xs" data-id="$1" data-kelas="$2" data-nama_kelas="$3">Edit</a>  <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-id="$1" data-kelas="$2" data-nama_kelas="$3">Hapus</a>','id,kelas,nama_kelas');
        return $this->datatables->generate();
    }
    public function input_data($data,$table){
		$this->db->insert($table,$data);
    }
    
   public function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}

    public function get_all_datakelas() {
        $this->datatables->select('a.id,a.id_tahun_ajaran,a.id_kelas,a.id_guru,b.kelas,b.nama_kelas,c.nama_lengkap,d.semester,d.nama_ta');
        $this->datatables->from('kelas_detail a');
        $this->datatables->join('kelas b' , 'a.id_kelas=b.id');
        $this->datatables->join('guru c', 'a.id_guru=c.id');
        $this->datatables->join('tahun_ajaran d', 'a.id_tahun_ajaran=d.id');
        $this->datatables->add_column('Action','<a href="javascript:void(0);" class="edit_record btn btn-info btn-xs" data-id="$1" data-id_tahun_ajaran="$2" data-id_kelas="$3" data-id_guru="$4">Edit</a>  
            <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-id="$1" data-id_tahun_ajaran="$2" data-id_kelas="$3" data-id_guru="$4">Hapus</a>','id,id_tahun_ajaran,id_kelas,id_guru');
        return $this->datatables->generate();
    }

    public function get_all_DataKelasAnggota() {
        $this->datatables->select('a.id,a.id_kelas_detail,a.nisn,e.nama_lengkap as nama_siswa,e.jk,f.kelas,f.nama_kelas,d.nama_lengkap as nama_guru');
        $this->datatables->from('kelas_anggota a');
        $this->datatables->join('kelas_detail b' , 'a.id_kelas_detail = b.id');
        $this->datatables->join('tahun_ajaran c' , 'b.id_tahun_ajaran = c.id');
        $this->datatables->join('guru d' , 'b.id_guru = d.id');
        $this->datatables->join('siswa e' , 'a.nisn = e.nisn');
        $this->datatables->join('kelas f' , 'b.id_kelas=f.id');
        $this->datatables->add_column('Action','<a href="javascript:void(0);" class="edit_record btn btn-info btn-xs" data-id="$1" data-id_tahun_ajaran="$2" data-id_kelas="$3" data-id_guru="$4">Edit</a>  
            <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-id="$1" data-id_tahun_ajaran="$2" data-id_kelas="$3" data-id_guru="$4">Hapus</a>','id,id_kelas_detail,nisn');
        return $this->datatables->generate();
    }
}