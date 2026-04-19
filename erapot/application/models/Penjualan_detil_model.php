<?php
class Penjualan_detil_model extends CI_Model {
	
	public function add($data) {
        $this->db->insert('penjualan_detil',$data);
    }
	
	/*public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('hotline_detil', $data);
	}*/
	
	public function delete($id) {
		$this->db->delete('penjualan_detil', array('id_penjualan' => $id));
	}
    
	public function record_count() {
        return $this->db->count_all('penjualan_detil');
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
	
	public function getbypenjualan($id) {
		$query = $this->db->where('id_penjualan', $id)->get('penjualan_detil');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
