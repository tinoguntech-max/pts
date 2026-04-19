<?php
class Crm_knowledge_base_model extends CI_Model {
	
    public function record_count() {
        return $this->db->count_all('crm_knowledge_base');
    }

	public function getall() {
		$query = $this->db->order_by('nama', 'asc')->get('crm_knowledge_base');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('crm_knowledge_base', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getnama($id) {
		$query = $this->db->where('LOWER(nama)', strtolower($id))->get('crm_knowledge_base', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function check_double($id) {
		$query = $this->db->where('LOWER(nama)', $id)->get('crm_knowledge_base');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
