<?php
class Crm_call_model extends CI_Model {
	
    public function record_count() {
        return $this->db->count_all('crm_call');
    }

	public function getall($status = NULL) {
		if (is_null($status))
			$query = $this->db->order_by('nama', 'asc')->get('crm_call');
		else
			$query = $this->db->where('status', $status)->order_by('nama', 'asc')->get('crm_call');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('crm_call', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getnama($id) {
		$query = $this->db->where('LOWER(nama)', strtolower($id))->get('crm_call', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function check_double($id) {
		$query = $this->db->where('LOWER(nama)', $id)->get('crm_call');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
