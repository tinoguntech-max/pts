<?php
class Satuan_model extends CI_Model {
	
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('satuan',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    }

    public function record_count() {
        return $this->db->count_all('satuan');
    }

	public function getall() {
		$query = $this->db->order_by('nama', 'asc')->get('satuan');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('satuan', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function get_autocomplete($id) {
		$query = $this->db->like('nama', $id)->get('satuan', 8, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	public function check_double($id) {
		$query = $this->db->where('LOWER(nama)', $id)->get('satuan');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
