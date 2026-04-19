<?php
class M_certification_model extends CI_Model {
	
    public function record_count() {
        return $this->db->count_all('m_certification');
    }

	public function getall() {
		$query = $this->db->order_by('nama', 'asc')->get('m_certification');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('m_certification', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getnama($id) {
		$query = $this->db->where('LOWER(nama)', strtolower($id))->get('m_certification', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function check_double($id) {
		$query = $this->db->where('LOWER(nama)', $id)->get('m_certification');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
