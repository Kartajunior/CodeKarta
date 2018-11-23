<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pelajaran extends CI_Model {

    public function get_all_data() {
        $this->datatables->select('id,kd_pelajaran,nama_pelajaran');
        $this->datatables->from('pelajaran');
        $this->datatables->add_column('Action','<a href="javascript:void(0);" class="edit_record btn btn-info btn-xs" data-id="$1" data-kd_pelajaran="$2" data-nama_pelajaran="$3">Edit</a>  <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-id="$1" data-kd_pelajaran="$2" data-nama_pelajaran="$3">Hapus</a>','id,kd_pelajaran,nama_pelajaran');
        return $this->datatables->generate();
    }
    public function input_data($data,$table){
		$this->db->insert($table,$data);
    }
    
   function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}

    public function get_all_pelajaran(){
        
        $this->db->select('*');      
        $this->db->from('pelajaran');
        $query = $this->db->get();
        return $query->result();
    }

}