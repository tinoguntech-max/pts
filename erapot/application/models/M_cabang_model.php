<?php
class M_cabang_model extends CI_Model {
	
	public function record_count() {
        return $this->db->count_all('m_cabang');
    }

	public function getall() {
		$query = $this->db->order_by('nama', 'asc')->get('m_cabang');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('m_cabang', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getallwithout0() {
		$query = $this->db->where('id !=', 0)->get('m_cabang');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getnama($id) {
		$query = $this->db->where('LOWER(nama)', strtolower($id))->get('m_cabang', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function check_double($id) {
		$query = $this->db->where('LOWER(nama)', $id)->get('m_cabang');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('m_cabang',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	
	public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('m_cabang', $data);
	}

	public function delete($data) {
		$this->db->where('m_cabang.id',$data);
		$this->db->delete('m_cabang');
	}
	public function read($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->select('*', $data);
	}

	public function get_autocomplete($id) {
		$query = $this->db->like('nama', $id)->get('m_cabang', 8, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
