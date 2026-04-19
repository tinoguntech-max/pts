<?php
class Districts_model extends CI_Model {
	
    public function record_count() {
        return $this->db->count_all('districts');
    }

	public function getall() {
		$query = $this->db->order_by('name', 'asc')->get('districts');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('districts', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbyregencies($id) {
		$query = $this->db->where('regency_id', $id)->get('districts');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
