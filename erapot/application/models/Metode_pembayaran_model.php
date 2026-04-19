<?php
class Metode_pembayaran_model extends CI_Model {
	
    public function record_count() {
        return $this->db->count_all('metode_pembayaran');
    }

	public function getall() {
		$query = $this->db->order_by('nama', 'asc')->get('metode_pembayaran');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('metode_pembayaran', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
