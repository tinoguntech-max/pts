<?php
class Metode_pembayaran_records_model extends CI_Model {
	
    public function add($data) {
        $this->db->insert('metode_pembayaran_records',$data);
    }
	
	public function record_count() {
        return $this->db->count_all('metode_pembayaran_records');
    }

	public function getall() {
		$query = $this->db->order_by('date_created', 'desc')->get('metode_pembayaran_records');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('metode_pembayaran_records', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
