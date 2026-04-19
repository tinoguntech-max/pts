<?php
class All_model extends CI_Model {
	
    public function add($table, $data) {
        $this->db->insert($table, $data);
    }
	
	public function update($table, $primary='id', $data) {
		$this->db->where($primary, $data[$primary])->update($table, $data);
	}
	
	public function record_count($table) {
        return $this->db->count_all($table);
    }

	public function getall($table, $order='id', $by='asc') {
		$query = $this->db->order_by($order, $by)->get($table);
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($table, $where='id', $id) {
		$query = $this->db->where($where, $id)->get($table, 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function max_id($table) {
		$query = $this->db->select_max('id')->get($table);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	private function _uploadImage()
	{
	    $config['upload_path']          = '.\assets\uploads\files\foto';
	    $config['allowed_types']        = 'jpeg|jpg|png';
	    $config['file_name']            = $this->product_id;
	    $config['overwrite']			= true;
	    $config['max_size']             = 1024; // 1MB
	    // $config['max_width']            = 1024;
	    // $config['max_height']           = 768;

	    $this->load->library('upload', $config);

	    if ($this->upload->do_upload('image')) {
	        return $this->upload->data("file_name");
	    }
	    
	    return "default.jpg";
	}
}
