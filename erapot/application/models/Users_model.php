<?php

class Users_model extends CI_Model {

   function __construct()
   {

   }
	
	public function add($data) {
        $this->db->trans_start();
        $this->db->insert('users',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    }
	
	public function getallopen() {
		$query = $this->db->select('user_id, nama, keterangan')->order_by('nama', 'asc')->get('users');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function get($id) {
		$query = $this->db->where('user_id', $id)->get('users', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbyusername($id) {
		$query = $this->db->where('user_name', $id)->get('users', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbyuserlevel($id){
		$query = $this->db->where('user_level', $id)->get('users');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getall($select = NULL) {
    if ($select != NULL)
		  $query = $this->db->select($select)->order_by('nama', 'asc')->get('users');
    else
      $query = $this->db->order_by('nama', 'asc')->get('users');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function update($data) {
		$array = array('user_id'=>$data['user_id']);
		$this->db->where($array)->update('users', $data);
	}
	
	public function record_count() {
        return $this->db->count_all('users');
    }
	
	//login auth
	public function verify_user($username, $password) {
		$q = $this
            ->db
            ->select('user_id, user_name, user_pass, user_level, id_m_cabang, screen_language')
            ->from('users')
            ->where('user_name', $username)
            ->where('user_pass', $password)
            ->limit(1)
            ->get();
		if ( $q->num_rows() > 0 ) {
			return $q->row();
		}
		return false;
	}

   public function verify_newuser($username)
   {
      $q = $this
            ->db
            ->select('user_name')
            ->from('users')
            ->where('user_name', $username)
            ->limit(1)
            ->get();

      if ( $q->num_rows() > 0 ) {
         // person has account with us
         return $q->row();
      }
      return false;
   }

   public function addnew($data_user)
   {
     $this->db->insert('users', $data_user);
   }
   
   public function get_autocomplete($id) {
		$query = $this->db->like('nama', $id)->get('users', 8, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
}

