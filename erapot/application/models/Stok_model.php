<?php
class Stok_model extends CI_Model {
	
    public function add($data) {
        $this->db->insert('stok',$data);
    }
	
	public function update($data) {
		$this->db->where('id', $data['id'])->update('stok', $data);
	}
	
	public function delete_awal($id) {
		$this->db->delete('stok', array('id_barang' => $id, 'keterangan' => 'STOK AWAL'));
	}
	
	public function delete_penjualan($ref) {
		$this->db->delete('stok', array('keterangan' => 'PENJUALAN', 'ref' => $ref));
	}
	
	public function delete_pembelian($ref) {
		$this->db->delete('stok', array('keterangan' => 'PEMBELIAN', 'ref' => $ref));
	}
	
	public function record_count() {
        return $this->db->count_all('stok');
    }

	public function getlastpenerimaan() {
		$query = $this->db->where('keterangan','PENERIMAAN')->order_by('tanggal', 'desc')->get('stock', 1, 0);
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}


	public function getall() {
		$query = $this->db->order_by('tanggal', 'desc')->get('stok');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('stok', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function sumby_barang($id) {
		$query = $this->db->query("select sum(qty_in-qty_out) as toro from stok where id_barang='".$id."'");

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
