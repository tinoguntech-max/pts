<?php
class Barang_harga_beli_model extends CI_Model {
	
	public function add($data) {
        $this->db->insert('barang_harga_beli',$data);
    }
	
	public function delete($id) {
		$this->db->delete('barang_harga_beli', array('id_barang' => $id));
	}
    
	public function record_count() {
        return $this->db->count_all('barang_harga_beli');
    }
	
	public function getbybarang($id) {
		$where = array('id_barang'=>$id);
		$query = $this->db->where($where)->get('barang_harga_beli');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbybarangandcabang($id, $cabang) {
		$where = array('id_barang'=>$id, 'id_m_cabang'=>$cabang);
		$query = $this->db->where($where)->get('barang_harga_beli');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbybarangandkelas($id, $kelas) {
		$where = array('id_barang'=>$id, 'id_m_kelas'=>$kelas);
		$query = $this->db->where($where)->get('barang_harga_beli');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
