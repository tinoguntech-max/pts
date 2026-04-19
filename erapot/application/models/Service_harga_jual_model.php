<?php
class Service_harga_jual_model extends CI_Model {
	
	public function add($data) {
        $this->db->insert('service_harga_jual',$data);
    }
	
	public function delete($id) {
		$this->db->delete('service_harga_jual', array('id_m_service' => $id));
	}
    
	public function record_count() {
        return $this->db->count_all('service_harga_jual');
    }
	
	public function getbyharga_jual($id) {
		$where = array('id_m_service'=>$id);
		$query = $this->db->where($where)->get('service_harga_jual');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
