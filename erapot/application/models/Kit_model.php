<?php
class Kit_model extends CI_Model {

	public function add($data) {
		$this->db->insert('kit',$data);
	}
	
    public function record_count() {
        return $this->db->count_all('kit');
    }

	public function getall() {
		$query = $this->db->order_by('id', 'asc')->get('kit');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('kit', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
