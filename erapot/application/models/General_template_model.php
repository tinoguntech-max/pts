<?php
class General_template_model extends CI_Model {
	
    public function add($data) {
        $this->db->insert('general_template',$data);
    }
	
	public function update($data) {
		$this->db->where('id', $data['id'])->update('general_template', $data);
	}
	
	public function record_count() {
        return $this->db->count_all('general_template');
    }

	public function getall() {
		$query = $this->db->order_by('id', 'asc')->get('general_template');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('general_template', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getnama($id) {
		$query = $this->db->where('LOWER(nama)', strtolower($id))->get('general_template', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
