<?php
class Barang_satuan_model extends CI_Model {
	
	public function add($data) {
        $this->db->insert('barang_satuan',$data);
    }
	
	/*public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('hotline_detil', $data);
	}*/
	
	public function delete($id) {
		$this->db->delete('barang_satuan', array('id_barang' => $id));
	}
    
	public function record_count() {
        return $this->db->count_all('barang_satuan');
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
		$this->db->select('barang_satuan.*, a.nama AS nama_satuan1, b.nama as nama_satuan2');
		$this->db->join('satuan AS a', 'barang_satuan.id_satuan1 = a.id', 'left');
		$this->db->join('satuan AS b', 'barang_satuan.id_satuan2 = b.id', 'left');
		$this->db->where('id_barang', $id);
		$query = $this->db->get('barang_satuan');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbybarangandsatuan($id, $satuan_conv) {
		$this->db->select('barang_satuan.*, a.nama AS nama_satuan1, b.nama as nama_satuan2');
		$where = array('id_barang'=>$id, 'id_satuan2'=>$satuan_conv);
		$this->db->join('satuan AS a', 'barang_satuan.id_satuan1 = a.id', 'left');
		$this->db->join('satuan AS b', 'barang_satuan.id_satuan2 = b.id', 'left');
		$this->db->where($where);
		$query = $this->db->get('barang_satuan');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
