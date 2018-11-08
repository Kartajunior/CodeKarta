<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Ekskul extends CI_Model {

    public function get_all_data() {
        $this->datatables->select('id,nama_ekskul');
        $this->datatables->from('ekskul');
        $this->datatables->add_column('Action','<a href="javascript:void(0);" class="edit_record btn btn-info btn-xs" data-id="$1" data-nama_ekskul="$2">Edit</a>  <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-id="$1" data-nama_ekskul="$2">Hapus</a>','id,nama_ekskul');
        return $this->datatables->generate();
    }
     public function get_all_data_ekksul_dropdown() {
        $query = $this->db->get('ekskul');
        return $query->result();
    }
    public function input_data($data,$table){
		$this->db->insert($table,$data);
    }
    
    public function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
  }
  
  public function get_all_data_ekskul() {
      $th_ajar = $this->session->userdata('th_ajaran');
        $this->datatables->select('a.id,a.id_tahun_ajaran,a.id_ekskul,a.id_guru,b.nama_ekskul,c.nama_ta,c.semester,d.nama_lengkap as nama_guru');
        $this->datatables->from('ekskul_detail a');
        $this->datatables->join('ekskul b', 'a.id_ekskul = b.id');
        $this->datatables->join('tahun_ajaran c', 'a.id_tahun_ajaran = c.id');
        $this->datatables->join('guru d', 'a.id_guru = d.id');
        $this->datatables->where('c.id', $th_ajar);
        $this->datatables->add_column('Action','<a href="javascript:void(0);" class="edit_record btn btn-info btn-xs" data-id="$1" >Edit</a>  <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-id="$1" >Hapus</a>','id,id_tahun_ajaran,id,guru,id_ekskul');
        return $this->datatables->generate();
    }

     public function GetAllAnggotaEkskul($limit, $offset) {
         
        $th_ajar = $this->session->userdata('th_ajaran');

        $this->db->select('c.nama_ekskul, d.nama_ta,d.semester,e.nama_lengkap as nama_guru, f.nama_lengkap as nama_siswa,f.nisn,f.jk as jk');
        $this->db->from('ekskul_anggota a');
        $this->db->join('ekskul_detail b', 'a.id_ekskul_detail = b.id');
        $this->db->join('ekskul c', 'b.id_ekskul = c.id');
        $this->db->join('tahun_ajaran d', 'b.id_tahun_ajaran = d.id');
        $this->db->join('guru e', 'b.id_guru = e.id');
        $this->db->join('siswa f', 'a.nisn = f.nisn');
        $this->db->where('d.id', $th_ajar);
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result();
    }

     public function countall()
    {

       $query = $this->db->get('ekskul_anggota');
       return $query->num_rows();
    }

    //add By APL-SOL
    public function getByEkskul($nama_ekskul,$limit, $offset) 
    {

        $th_ajar = $this->session->userdata('th_ajaran');

         $this->db->select('c.nama_ekskul, d.nama_ta,d.semester,e.nama_lengkap as nama_guru, f.nama_lengkap as nama_siswa,f.nisn,f.jk as jk, g.nilai,g.id as id_nilai, g.ekskul_anggota_id');
        $this->db->from('ekskul_anggota a');
        $this->db->join('ekskul_detail b', 'a.id_ekskul_detail = b.id');
        $this->db->join('ekskul c', 'b.id_ekskul = c.id');
        $this->db->join('tahun_ajaran d', 'b.id_tahun_ajaran = d.id');
        $this->db->join('guru e', 'b.id_guru = e.id');
        $this->db->join('siswa f', 'a.nisn = f.nisn');
        $this->db->join('ekskul_nilai g', 'a.id = g.ekskul_anggota_id');
        $this->db->where('d.id', $th_ajar);
        $this->db->where('c.id', $nama_ekskul);
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        if($query->num_rows() > 0 ){
         return $query->result();
        }else{
        return $query->result();
        }
     }
    
    //end add

     //add By APL-SOL
    public function getHeaderEkskul($nama_ekskul) 
    {

        $th_ajar = $this->session->userdata('th_ajaran');

        $this->db->select('c.nama_ekskul, d.nama_ta,d.semester,e.nama_lengkap as nama_guru, f.nama_lengkap as nama_siswa,f.nisn,f.jk as jk, g.nilai');
        $this->db->from('ekskul_anggota a');
        $this->db->join('ekskul_detail b', 'a.id_ekskul_detail = b.id');
        $this->db->join('ekskul c', 'b.id_ekskul = c.id');
        $this->db->join('tahun_ajaran d', 'b.id_tahun_ajaran = d.id');
        $this->db->join('guru e', 'b.id_guru = e.id');
        $this->db->join('siswa f', 'a.nisn = f.nisn');
        $this->db->join('ekskul_nilai g', 'a.id = g.ekskul_anggota_id');
        $this->db->where('d.id', $th_ajar);
        $this->db->where('c.id', $nama_ekskul);
       $this->db->group_by('c.nama_ekskul');
        $query = $this->db->get();
        if($query->num_rows() > 0 ){
         return $query->result();
        }else{
        return $query->result();
        }
     }
  
   public function GetAllNilaiEkskul($limit, $offset) {
         
        $th_ajar = $this->session->userdata('th_ajaran');

        $this->db->select('c.nama_ekskul, d.nama_ta,d.semester,e.nama_lengkap as nama_guru, f.nama_lengkap as nama_siswa,f.nisn,f.jk as jk, g.nilai,g.id as id_nilai, g.ekskul_anggota_id');
        $this->db->from('ekskul_anggota a');
        $this->db->join('ekskul_detail b', 'a.id_ekskul_detail = b.id');
        $this->db->join('ekskul c', 'b.id_ekskul = c.id');
        $this->db->join('tahun_ajaran d', 'b.id_tahun_ajaran = d.id');
        $this->db->join('guru e', 'b.id_guru = e.id');
        $this->db->join('siswa f', 'a.nisn = f.nisn');
        $this->db->join('ekskul_nilai g', 'a.id = g.ekskul_anggota_id');
        $this->db->where('d.id', $th_ajar);
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result();
    }

     public function GetAllNilaiEkskulCek() {
         
        $th_ajar = $this->session->userdata('th_ajaran');

        $this->db->select('c.nama_ekskul, d.nama_ta,d.semester,e.nama_lengkap as nama_guru, f.nama_lengkap as nama_siswa,f.nisn,f.jk as jk, g.nilai,g.id as id_nilai, g.ekskul_anggota_id');
        $this->db->from('ekskul_anggota a');
        $this->db->join('ekskul_detail b', 'a.id_ekskul_detail = b.id');
        $this->db->join('ekskul c', 'b.id_ekskul = c.id');
        $this->db->join('tahun_ajaran d', 'b.id_tahun_ajaran = d.id');
        $this->db->join('guru e', 'b.id_guru = e.id');
        $this->db->join('siswa f', 'a.nisn = f.nisn');
        $this->db->join('ekskul_nilai g', 'a.id = g.ekskul_anggota_id');
        $this->db->where('d.id', $th_ajar);
       
        $query = $this->db->get();
        return $query->result();
    }
    public function update_nilai($where, $data)
    {
        $this->db->update('ekskul_nilai', $data, $where);
        return TRUE;
    }


}