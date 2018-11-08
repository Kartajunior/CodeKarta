<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Siswa extends CI_Model {

    public function get_all_data() {
        $this->datatables->select('nisn,nis,nama_lengkap,jk,tempat_lahir,tgl_lahir,agama,alamat_siswa,kode_pos,status,foto');
        $this->datatables->from('siswa');
        $this->datatables->add_column('Action','<a href="siswa/detail/$1" class="lihat_record btn btn-info 								btn-xs" data-nisn="$1" data-nis="$2" data-nama_lengkap="$3">Lihat</a>

        								<a href="javascript:void(0);" class="edit_record btn btn-warning 								btn-xs" data-nisn="$1" data-nis="$2" data-nama_lengkap="$3">Edit</a>  
        								<a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-nisn="$1" data-nis="$2" data-nama_lengkap="$3">Hapus</a>','nisn,nis,nama_lengkap,jk,tempat_lahir,tgl_lahir,agama,alamat_siswa,kode_pos,status,foto');
        return $this->datatables->generate();
    }

     public function get_detail($nisn){
    
      $this->db->select('*');
      $this->db->from('siswa a');
      $this->db->join('siswa_keluarga b' , 'a.nisn = b.nisn');
      $this->db->where('a.nisn',$nisn);
     
      $query = $this->db->get();

      return $query->row();
    }
   
}