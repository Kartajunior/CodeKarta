<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tahun_ajaran extends CI_Model {

    public function get_all_data() {
        $this->datatables->select('id,nama_ta,semester,status');
        $this->datatables->from('tahun_ajaran');
        $this->datatables->add_column('Action','<a href="javascript:void(0);" class="edit_record btn btn-info btn-xs" data-id="$1" data-nama_ta="$2" data-semester="$3" data-status="$4">Edit</a>  <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-id="$1" data-nama_ta="$2" data-semester="$3" data-status="$4">Hapus</a>','id,nama_ta,semester,status');
        return $this->datatables->generate();
    }
    public function input_data($data,$table){
		$this->db->insert($table,$data);
    }
    
   function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
    }
    
    public function get_tahun_ajaran()
	{
		$query = $this->db->get_where('tahun_ajaran',array('status' => 'Aktif'));
		return $query->result();
    }
    
    function cek_tahun($t_ajaran="")
	{
		$query = $this->db->get_where('tahun_ajaran',array('id'=> $t_ajaran, 'status'=> 'Aktif'));
		$query = $query->result_array();
		return $query;
	}

    

}