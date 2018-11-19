<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Nilai_Pelajaran extends CI_Model {

    public function get_all_data() {
        $this->datatables->select('');
        $this->datatables->from('nilai_pelajaran');
        $this->datatables->add_column('Action','
            <a href="javascript:void(0);" class="edit_record btn btn-info btn-xs" data-id="$1" data-id_mengajar="$2" data-id_kelas_detail="$3" data-kkm="$4" data-rata_rata_kelas="$5">Edit</a>  
            <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-id="$data-id="$1" data-id_mengajar="$2" data-id_kelas_detail="$3" data-kkm="$4" data-rata_rata_kelas="$5">Hapus</a>','id,id_mengajar,id_kelas_detail,kkm,rata_rata_kelas');
        return $this->datatables->generate();
    }

}