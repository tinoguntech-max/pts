<?php
class M_kendaraan_manufacturer_model extends CI_Model {
	
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('m_kendaraan_manufacturer',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    }
	
	public function update($data, $ids) {
		$this->db->where('id', $ids)->update('m_kendaraan_manufacturer', $data);
	}
	
    public function record_count() {
        return $this->db->count_all('m_kendaraan_manufacturer');
    }

	public function getall() {
		$query = $this->db->where('status', 1)->order_by('nama', 'asc')->get('m_kendaraan_manufacturer');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('m_kendaraan_manufacturer', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
