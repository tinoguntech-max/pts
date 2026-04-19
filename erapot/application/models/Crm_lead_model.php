<?php
class Crm_lead_model extends CI_Model {
	
    public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('crm_lead', $data);
	}
	
	public function record_count() {
        return $this->db->count_all('crm_lead');
    }

	public function getall($status = NULL) {
		if (is_null($status))
			$query = $this->db->order_by('nama', 'asc')->get('crm_lead');
		else
			$query = $this->db->where('status', $status)->order_by('nama', 'asc')->get('crm_lead');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('crm_lead', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getnama($id) {
		$query = $this->db->where('LOWER(nama)', strtolower($id))->get('crm_lead', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function check_double($id) {
		$query = $this->db->where('LOWER(nama)', $id)->get('crm_lead');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function add($data) {
        $this->db->trans_start();
        $this->db->insert('crm_lead',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    }
	
	public function get_autocomplete($id) {
		$query = $this->db->like('nama', $id)->get('crm_lead', 8, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}	

