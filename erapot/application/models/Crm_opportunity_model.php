<?php
class Crm_opportunity_model extends CI_Model {
	
    public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('crm_opportunity', $data);
	}
	
	public function record_count() {
        return $this->db->count_all('crm_opportunity');
    }

	public function getall() {
		$query = $this->db->order_by('nama', 'asc')->get('crm_opportunity');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('crm_opportunity', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getnama($id) {
		$query = $this->db->where('LOWER(nama)', strtolower($id))->get('crm_opportunity', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function check_double($id) {
		$query = $this->db->where('LOWER(nama)', $id)->get('crm_opportunity');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function add($data) {
        $this->db->trans_start();
        $this->db->insert('crm_opportunity',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    }
}
