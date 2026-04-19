<?php
class M_asset_model extends CI_Model {
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('m_asset',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	
	public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('m_asset', $data);
	}

	public function delete($data) {
		$this->db->where('id',$data);
		$this->db->delete('m_asset');
	}

    public function record_count() {
        return $this->db->count_all('m_asset');
    }

	public function getall() {
		$query = $this->db->where('status', 1)->order_by('nama', 'asc')->get('m_asset');

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('m_asset', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function getnama($id) {
		$query = $this->db->where('LOWER(kode)', strtolower($id))->get('m_asset', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	function check_unique_kode($id = '', $nama) {
		$this->db->where('kode', $nama);
		if($id) {
			$this->db->where_not_in('id', $id);
        }
		return $this->db->get('m_asset')->num_rows();
	}

	public function get_autocomplete($id) {
		$query = $this->db->where('status', 1)->like('nama', $id)->get('m_asset', 8, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
