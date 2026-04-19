<?php
class Users_language_model extends CI_Model {
	
	public function add($data) {
        $this->db->insert('users_language',$data);
    }
	
	public function delete($id) {
		$this->db->delete('users_language', array('id_users' => $id));
	}
    
	public function record_count() {
        return $this->db->count_all('users_language');
    }

	public function getbyusers($id) {
		$where = array('id_users'=>$id);
		$query = $this->db->where($where)->get('users_language');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
