<?php
class Service_barang_model extends CI_Model {
	
	public function add($data) {
        $this->db->insert('service_barang',$data);
    }
	
	/*public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('hotline_detil', $data);
	}*/
	
	public function delete($id) {
		$this->db->delete('service_barang', array('id_m_service' => $id));
	}
    
	public function record_count() {
        return $this->db->count_all('service_barang');
    }

	/*public function getall() {
		$query = $this->db->order_by('tanggal', 'desc')->get('hotline_detil');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('hotline_detil', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}*/

	public function getbybarang($id) {
		$where = array('id_m_service'=>$id);
		$query = $this->db->where($where)->get('service_barang');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
