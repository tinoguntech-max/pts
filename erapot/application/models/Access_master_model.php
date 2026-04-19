<?php
class Access_master_model extends CI_Model {
	
    public function record_count() {
        return $this->db->count_all('access_master');
    }

	public function getall() {
		$query = $this->db->order_by('nama', 'asc')->get('access_master');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('access_master', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getnama($id) {
		$query = $this->db->where('LOWER(nama)', strtolower($id))->get('access_master', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function check_double($id) {
		$query = $this->db->where('LOWER(nama)', $id)->get('access_master');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
