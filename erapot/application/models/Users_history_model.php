<?php
class Users_history_model extends CI_Model {
	
    public function add($data) {
        $this->db->insert('users_history',$data);
    }
	
	public function record_count() {
        return $this->db->count_all('users_history');
    }

	public function getall() {
		$query = $this->db->order_by('date_created', 'desc')->get('users_history');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('users_history', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getlatest($limit = 20, $start =  0) {
		$query = $this->db->order_by('updated', 'desc')->get('users_history', $limit, $start);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbyusers($id) {
		$query = $this->db->where('id_users', $id)->order_by('updated','desc')->get('users_history');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbytransupdate($id, $table) {
		$where = array('id_master'=>$id, 'action'=> 'UPDATE', 'table_name'=> $table);
		$query = $this->db->where($where)->order_by('updated','desc')->get('users_history');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbyuserslatest($id, $limit=20, $start=0) {
		$query = $this->db->where('id_users', $id)->order_by('updated','desc')->get('users_history', $limit, $start);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
