<?php
class Regencies_model extends CI_Model {
	
    public function record_count() {
        return $this->db->count_all('regencies');
    }

	public function getall() {
		$query = $this->db->order_by('name', 'asc')->get('regencies');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('regencies', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbyprovinces($id) {
		$query = $this->db->where('province_id', $id)->get('regencies');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
