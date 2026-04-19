<?php
class Users_certification_model extends CI_Model {
	
	public function add($data) {
        $this->db->insert('users_certification',$data);
    }
	
	public function delete($id) {
		$this->db->delete('users_certification', array('id_users' => $id));
	}
    
	public function record_count() {
        return $this->db->count_all('users_certification');
    }

	public function getbyusers($id) {
		$where = array('id_users'=>$id);
		$query = $this->db->where($where)->get('users_certification');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
