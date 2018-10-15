<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Stock extends CI_Model {

    public function get_all_data() {
        $this->datatables->select('invent_sum.id as id,m_location.location_name as location,invent_table.item_name as item_name,invent_sum.qty as qty,invent_sum.unit_id as unit_id, invent_table.item_group as item_group, invent_sum.item_id as item_id_sum, invent_sum.id_location as loc_id_sum');
        $this->datatables->from('invent_sum');
        $this->datatables->join('invent_table','invent_table.item_id = invent_sum.item_id','LEFT');
        $this->datatables->join('m_location','m_location.id_location = invent_sum.id_location','LEFT');
        $this->datatables->join('invent_unit','invent_unit.unit = invent_sum.unit_id','LEFT');
        $this->datatables->where('invent_sum.id_location !=','11');
        $this->datatables->where('invent_sum.qty !=','0');
        $this->datatables->or_where('invent_sum.qty >','0');
        return $this->datatables->generate();

    }

}