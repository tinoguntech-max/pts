<?php
class Type_model extends CI_Model {
	
    public function record_count() {
        return $this->db->count_all('type');
    }

	public function getall() {
		$query = $this->db->order_by('nama', 'asc')->get('type');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('type', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
