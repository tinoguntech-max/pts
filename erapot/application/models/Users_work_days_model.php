<?php
class Users_work_days_model extends CI_Model {
	
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('users_work_days',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    }

    public function record_count() {
        return $this->db->count_all('users_work_days');
    }

	public function getall() {
		$query = $this->db->where('status', 1)->order_by('nama', 'asc')->get('users_work_days');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('users_work_days', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getnama($id) {
		$query = $this->db->where('LOWER(nama)', strtolower($id))->get('users_work_days', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function check_double($id, $id2) {
		$query = $this->db->where('id_users', $id)->where('date(tanggal)', $id2)->get('users_work_days');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
