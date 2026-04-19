<?php
class M_npwp_internal_model extends CI_Model {
	
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('m_npwp_internal',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    }

    public function record_count() {
        return $this->db->count_all('m_npwp_internal');
    }

	public function getall() {
		$query = $this->db->order_by('nama', 'asc')->get('m_npwp_internal');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('m_npwp_internal', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getnama($id) {
		$query = $this->db->where('LOWER(no)', strtolower($id))->get('m_npwp_internal', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function check_double($id) {
		$query = $this->db->where('LOWER(no)', $id)->get('m_npwp_internal');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
