<?php
class M_service_model extends CI_Model {
	
    public function add($data) {
        $this->db->trans_start();
        $this->db->insert('m_service',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    }
	
	public function update($data, $ids) {
		$this->db->where('id', $ids)->update('m_service', $data);
	}
	
	public function record_count() {
        return $this->db->count_all('m_service');
    }

	public function getall() {
		$query = $this->db->order_by('id', 'asc')->get('m_service');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('m_service', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbyservicetype($id){
		$query = $this->db->where('id_m_jenis_service', $id)->get('m_service');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function getnama($id) {
		$query = $this->db->where('LOWER(nama)', strtolower($id))->get('m_service', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function get_autocomplete($id) {
		$query = $this->db->like('nama', $id)->or_like('id', $id)->get('m_service', 8, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function check_double($id) {
		$query = $this->db->where('LOWER(id)', $id)->get('m_service');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
