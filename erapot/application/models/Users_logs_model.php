<?php
class Users_logs_model extends CI_Model {
	public function add($data) {
		$this->db->insert('users_logs', $data);
	}
}
