<?php
class M_cost_model extends CI_Model {

	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('m_cost',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    }

    public function record_count() {
        return $this->db->count_all('m_cost');
    }

	public function getall() {
		$query = $this->db->order_by('nama', 'asc')->get('m_cost');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('m_cost', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbycosttype($id){
		$query = $this->db->where('id_m_cost_type', $id)->get('m_cost');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function getnama($id) {
		$query = $this->db->where('LOWER(nama)', strtolower($id))->get('m_cost', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function check_double($id) {
		$query = $this->db->where('LOWER(nama)', $id)->get('m_cost');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function get_autocomplete($id) {
		$query = $this->db->like('nama', $id)->or_like('id', $id)->get('m_cost', 8, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
