<?php
class Barang_kit_model extends CI_Model {
	
	public function add($data) {
        $this->db->insert('barang_kit',$data);
    }
	
	/*public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('hotline_detil', $data);
	}*/
	
	public function delete($id) {
		$this->db->delete('barang_kit', array('id_barang' => $id));
	}
    
	public function record_count() {
        return $this->db->count_all('barang_kit');
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
		$where = array('id_barang'=>$id);
		$query = $this->db->where($where)->get('barang_kit');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
