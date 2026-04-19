<?php
class Villages_model extends CI_Model {
	
    public function record_count() {
        return $this->db->count_all('villages');
    }

	public function getall() {
		$query = $this->db->order_by('name', 'asc')->get('villages');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('villages', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbydistricts($id) {
		$query = $this->db->where('district_id', $id)->get('villages');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
