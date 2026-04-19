<?php
class Kategori_model extends CI_Model {
	
    public function record_count() {
        return $this->db->count_all('kategori');
    }

	public function getall() {
		$query = $this->db->order_by('nama', 'asc')->get('kategori');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('kategori', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
