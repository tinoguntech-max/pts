<?php
class Customer_model extends CI_Model {
	
    public function add($data) {
		$this->db->trans_start();
        $this->db->insert('customer',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	
	public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('customer', $data);
	}

	public function delete($data) {
		$this->db->where('id',$data);
		$this->db->delete('customer');
	}
	
	public function record_count() {
        return $this->db->count_all('customer');
    }

	public function getall() {
		$query = $this->db->order_by('nama', 'asc')->get('customer');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('customer', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	function check_unique_nama($id = '', $nama) {
		$this->db->where('nama', $nama);
		if($id) {
			$this->db->where_not_in('id', $id);
        }
		return $this->db->get('customer')->num_rows();
	}
	
	public function get_autocomplete($id) {
		$query = $this->db->where('status', '1')->like('nama', $id)->get('customer', 8, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	public function check_double($id) {
		$query = $this->db->where('LOWER(nama)', $id)->get('customer');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
