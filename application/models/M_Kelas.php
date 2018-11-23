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
        $th_ajar = $this->session->userdata('th_ajaran');

        $this->datatables->select('a.id,a.id_tahun_ajaran,a.id_kelas,b.kelas,b.nama_kelas,d.semester,d.nama_ta');
        $this->datatables->from('kelas_detail a');
        $this->datatables->join('kelas b' , 'a.id_kelas=b.id');
        $this->datatables->join('tahun_ajaran d', 'a.id_tahun_ajaran=d.id');
        $this->datatables->where('a.id_tahun_ajaran', $th_ajar);
        $this->datatables->add_column('Action','<a href="javascript:void(0);" class="edit_record btn btn-info btn-xs" data-id="$1" data-id_tahun_ajaran="$2" data-id_kelas="$3" >Edit</a>  
            <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-id="$1" data-id_tahun_ajaran="$2" data-id_kelas="$3" >Hapus</a>','id,id_tahun_ajaran,id_kelas');
        return $this->datatables->generate();
    }
    
    public function getAllDataKelasAnggota($limit, $offset)
    {
        $th_ajar = $this->session->userdata('th_ajaran');
        $this->db->select('a.id,a.id_kelas_detail,a.nisn,e.nama_lengkap as nama_siswa,e.jk,f.kelas,f.nama_kelas');
        $this->db->from('kelas_anggota a');
        $this->db->join('kelas_detail b' , 'a.id_kelas_detail = b.id');
        $this->db->join('tahun_ajaran c' , 'b.id_tahun_ajaran = c.id');
      
        $this->db->join('siswa e' , 'a.nisn = e.nisn');
        $this->db->join('kelas f' , 'b.id_kelas=f.id');
        $this->db->where('c.id', $th_ajar);
        $this->db->order_by('f.kelas','asc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result();
    }


    public function get_all_kelas()
	{
		$query = $this->db->get('kelas');
		return $query->result();
    }

    public function get_kelas()
	{
	
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->group_by('kelas');
        $query = $this->db->get();
        return $query->result();
    }
     public function getWaliKelas()
     {
        
        $th_ajar = $this->session->userdata('th_ajaran');

        $this->db->select('*');
        $this->db->from('wali_kelas a');
        $this->db->join('kelas_detail b' , 'a.id_kelas_detail = b.id');
        $this->db->join('guru c' , 'a.id_guru = c.id');
        $this->db->join('kelas d' , 'b.id_kelas = d.id');
        $this->db->join('tahun_ajaran e' , 'b.id_tahun_ajaran = e.id');
        $this->db->where('b.id_tahun_ajaran', $th_ajar);
        $query =$this->db->get();
        return $query->result();
     }
    public function get_tahun_ajaran_title()
    {
        $th_ajar = $this->session->userdata('th_ajaran');
        $query = $this->db->get_where('tahun_ajaran',array('status' => 'Aktif', 'id'  => $th_ajar));
        return $query;
    }
    public function get_nama_kelas()
         {
            $kelas=$this->input->post("kelas");
            $query="SELECT * FROM kelas WHERE kelas ='$kelas' ";
            $user_info = $this->db->query($query);
            return $user_info;
          }
          
    public function countall()
    {

       $query = $this->db->get('kelas_detail');
       return $query->num_rows();
    }

    //add By APL-SOL
    public function search_data($nama_kelas,$limit, $offset) 
    {

        $th_ajar = $this->session->userdata('th_ajaran');

        $this->db->select('a.id,a.id_kelas_detail,a.nisn,e.nama_lengkap as nama_siswa,e.jk,f.kelas,f.nama_kelas');
        $this->db->from('kelas_anggota a');
        $this->db->join('kelas_detail b' , 'a.id_kelas_detail = b.id');
        $this->db->join('tahun_ajaran c' , 'b.id_tahun_ajaran = c.id');
      
        $this->db->join('siswa e' , 'a.nisn = e.nisn');
        $this->db->join('kelas f' , 'b.id_kelas=f.id');
        $this->db->where('c.id', $th_ajar);

        $this->db->where('f.id', $nama_kelas); 
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
    public function getHeaderKelas($nama_kelas) 
    {

        $th_ajar = $this->session->userdata('th_ajaran');

        $this->db->select('a.id,a.id_kelas_detail,a.nisn,e.nama_lengkap as nama_siswa,e.jk,f.kelas,f.nama_kelas,c.nama_ta');
        $this->db->from('kelas_anggota a');
        $this->db->join('kelas_detail b' , 'a.id_kelas_detail = b.id');
        $this->db->join('tahun_ajaran c' , 'b.id_tahun_ajaran = c.id');
        $this->db->join('siswa e' , 'a.nisn = e.nisn');
        $this->db->join('kelas f' , 'b.id_kelas=f.id');
        $this->db->where('c.id', $th_ajar);
    
        $this->db->where('f.id', $nama_kelas); 
        $this->db->group_by('f.nama_kelas');
        $query = $this->db->get();
        if($query->num_rows() > 0 ){
         return $query->result();
        }else{
        return $query->result();
        }
     }
    
    //end add

}