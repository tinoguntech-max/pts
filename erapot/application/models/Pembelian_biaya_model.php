<?php
class Pembelian_biaya_model extends CI_Model {
	
	public function add($data) {
        $this->db->insert('pembelian_biaya',$data);
    }
	
	/*public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('hotline_detil', $data);
	}*/
	
	public function delete($id) {
		$this->db->delete('pembelian_biaya', array('id_pembelian' => $id));
	}
    
	public function record_count() {
        return $this->db->count_all('pembelian_biaya');
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
	
	public function getbypembelianmandiri($id) {
		$query = $this->db->where(array('id_pembelian'=>$id, 'bersama'=>0))->get('pembelian_biaya');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbypembelianbersama($id) {
		$query = $this->db->where(array('id_pembelian'=>$id, 'bersama'=>1))->get('pembelian_biaya');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function sumby_idbersama($id) {
		$query = $this->db->query("select sum(harga*kurs) as toro from pembelian_biaya where id_pembelian='".$id."' and bersama=1");

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
