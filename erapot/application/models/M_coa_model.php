<?php
class M_coa_model extends CI_Model {
	
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('m_coa',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    }

    public function record_count() {
        return $this->db->count_all('m_coa');
    }

	public function getall() {
		$query = $this->db->order_by('id', 'asc')->get('m_coa');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getallopen() {
		$query = $this->db->select('id, nama, keterangan')->order_by('nama', 'asc')->get('m_coa');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getallpayment() {
		$query = $this->db->query("select * from m_coa where id_m_jenis_coa in (1,2,3) order by id asc");
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('m_coa', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbybalance($id) {
		$query = $this->db->where('type_balance', $id)->order_by('id', 'asc')->get('m_coa');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbyjenis($id) {
		$query = $this->db->where('id_m_jenis_coa', $id)->get('m_coa');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbyincome($id) {
		$query = $this->db->where('type_income', $id)->order_by('id', 'asc')->get('m_coa');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getnama($id) {
		$query = $this->db->where('LOWER(nama)', strtolower($id))->get('m_coa', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function check_double($id) {
		$query = $this->db->where('LOWER(nama)', $id)->get('m_coa');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getid($id) {
		$query = $this->db->where('LOWER(id)', strtolower($id))->get('m_coa', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function check_double_id($id) {
		$query = $this->db->where('LOWER(id)', $id)->get('m_coa');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function get_autocomplete($id) {
		$query = $this->db->where('status', '1')->like('nama', $id)->get('m_coa', 8, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
