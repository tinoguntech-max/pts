<?php
class Jenis_fasilitator_model extends CI_Model {
	
    public function record_count() {
        return $this->db->count_all('jenis_fasilitator');
    }

	public function getall() {
		$query = $this->db->order_by('jenis', 'asc')->get('jenis_fasilitator');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('jenis_fasilitator', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
