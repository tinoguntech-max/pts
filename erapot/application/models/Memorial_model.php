<?php
class Memorial_model extends CI_Model {
	
    public function add($data) {
		$this->db->trans_start();
        $this->db->insert('memorial',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    }
	
	public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('memorial', $data);
	}
	
	public function record_count() {
        return $this->db->count_all('memorial');
    }

	public function getall() {
		$query = $this->db->order_by('nama', 'asc')->get('memorial');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('memorial', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
