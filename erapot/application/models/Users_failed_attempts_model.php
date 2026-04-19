<?php
class Users_failed_attempts_model extends CI_Model {
	public function add($data) {
		$this->db->insert('users_failed_attempts', $data);
	}
}
