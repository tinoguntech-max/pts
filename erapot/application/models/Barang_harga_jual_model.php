<?php
class Barang_harga_jual_model extends CI_Model {
	
	public function add($data) {
        $this->db->insert('barang_harga_jual',$data);
    }
	
	public function delete($id) {
		$this->db->delete('barang_harga_jual', array('id_barang' => $id));
	}
    
	public function record_count() {
        return $this->db->count_all('barang_harga_jual');
    }
	
	public function getbybarang($id) {
		$where = array('id_barang'=>$id);
		$query = $this->db->where($where)->order_by('minimum','desc')->get('barang_harga_jual');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
