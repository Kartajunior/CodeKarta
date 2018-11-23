<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Guru extends CI_Model {

    public function get_all_data() {
       
        $this->datatables->select('id,kode_guru,nip,nama_lengkap,jk,tempat_lahir,tgl_lahir,jabatan,agama,alamat,kd_pos,tlp,tugas_tambahan,email,foto');
        $this->datatables->from('guru');
        $this->datatables->add_column('Action',' <a href="Guru/detail/$1" class="lihat_record btn btn-primary btn-xs" 
                                      data-id="$1",data-kode_guru="$2",data-nip="$3",data-nama_lengkap="$4",data-jk="$5",
                                      data-tempat_lahir="$6",data-tgl_lahir="$7",data-jabatan="$8",data-agama="$9",data-alamat="$10",
                                      data-kd_pos="$11",data-tlp="$12",data-tugas_tambahan="$13",data-email="$14",data-foto="$15">Lihat</a>
                                      <a href="Guru/edit/$1" class="edit_record btn btn-info btn-xs" 
                                      data-id="$1",data-kode_guru="$2",data-nip="$3",data-nama_lengkap="$4",data-jk="$5",
                                      data-tempat_lahir="$6",data-tgl_lahir="$7",data-jabatan="$8",data-agama="$9",data-alamat="$10",
                                      data-kd_pos="$11",data-tlp="$12",data-tugas_tambahan="$13",data-email="$14",data-foto="$15">Edit</a>
                                     
                                      <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-id="$1",data-kode_guru="$2",data-nip="$3",data-nama_lengkap="$4">Hapus</a>','id,kode_guru,nip,nama_lengkap,jk,tempat_lahir,tgl_lahir,jabatan,agama,alamat,kd_pos,tlp,tugas_tambahan,email,foto');
        return $this->datatables->generate();
    }

    public function get_guru()
    {
      $query = $this->db->where('jabatan', 'guru')->get('guru');
      return $query->result();
    }

    public function get_detail($id){
    
      $this->db->select('*');
      $this->db->from('guru');
      $this->db->where('id',$id);
      $this->db->where('delete_status', 0);
      $this->db->order_by('id','DESC');
      $query = $this->db->get();

      return $query->row();
    }
    

}