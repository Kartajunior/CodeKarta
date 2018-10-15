<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Ekskul extends CI_Model {

    public function get_all_data() {
        $this->datatables->select('id,nama_ekskul');
        $this->datatables->from('ekskul');
        $this->datatables->add_column('Action','<a href="javascript:void(0);" class="edit_record btn btn-info btn-xs" data-id="$1" data-nama_ekskul="$2">Edit</a>  <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-id="$1" data-nama_ekskul="$2">Hapus</a>','id,nama_ekskul');
        return $this->datatables->generate();
    }
    public function input_data($data,$table){
		$this->db->insert($table,$data);
    }
    
    public function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
  }
  
  public function get_all_data_ekskul() {
        $this->datatables->select('a.id,a.id_tahun_ajaran,a.id_ekskul,a.id_guru,b.nama_ekskul,c.nama_ta,c.semester,d.nama_lengkap as nama_guru');
        $this->datatables->from('ekskul_detail a');
        $this->datatables->join('ekskul b', 'a.id_ekskul = b.id');
        $this->datatables->join('tahun_ajaran c', 'a.id_tahun_ajaran = c.id');
        $this->datatables->join('guru d', 'a.id_guru = d.id');
        $this->datatables->add_column('Action','<a href="javascript:void(0);" class="edit_record btn btn-info btn-xs" data-id="$1" >Edit</a>  <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-id="$1" >Hapus</a>','id,id_tahun_ajaran,id,guru,id_ekskul');
        return $this->datatables->generate();
    }

}