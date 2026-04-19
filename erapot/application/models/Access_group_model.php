<?php
class Access_group_model extends CI_Model {
	
    public function add($data) {
		$this->db->trans_start();
        $this->db->insert('access_group',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    }
	
	public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('access_group', $data);
	}
	
	public function record_count() {
        return $this->db->count_all('access_group');
    }

	public function getall() {
		$query = $this->db->order_by('nama', 'asc')->get('access_group');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getallopen() {
		$query = $this->db->select('id, nama, keterangan')->order_by('nama', 'asc')->get('access_group');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('access_group', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getnama($id) {
		$query = $this->db->where('LOWER(nama)', strtolower($id))->get('access_group', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function check_double($id) {
		$query = $this->db->where('LOWER(nama)', $id)->get('access_group');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
