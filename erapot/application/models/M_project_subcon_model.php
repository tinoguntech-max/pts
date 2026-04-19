<?php
class M_project_subcon_model extends CI_Model {
    
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('m_project_subcon',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
    public function record_count() {
        return $this->db->count_all('m_project_subcon');
    }

	public function getall($select = '*') {
		$query = $this->db->select($select)->where('status', 1)->order_by('nama', 'asc')->get('m_project_subcon');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('m_project_subcon', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('m_project_subcon', $data);
	}
	
	public function get_autocomplete($id) {
		$query = $this->db->like('nama', $id)->get('m_project_subcon', 8, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	public function check_double($id) {
		$query = $this->db->where('LOWER(nama)', $id)->get('m_project_subcon');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
