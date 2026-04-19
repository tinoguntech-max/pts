<?php
class Stock_motor_model extends CI_Model {
	
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('stock_motor',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    }
	
	public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('stock_motor', $data);
	}
    
	public function record_count() {
        return $this->db->count_all('stock_motor');
    }

	public function getall() {
		$query = $this->db->order_by('tanggal', 'desc')->get('stock_motor');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('stock_motor', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbyidrujukan($id, $id1, $id2) {
		$query = $this->db->where(array('id_trans'=>$id, 'keterangan'=>$id1, 'id_barang'=>$id2))->get('stock', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	// untuk FIFO
	public function getnotsellingyet($id_barang) {
		$where = "id_barang = '{$id_barang}' and sell_left!=0";
		$query = $this->db->where($where)->order_by('tanggal asc, id asc')->get('stock', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function get_available($search, $id_cabang) {
		$where = "(rangka like '%".strtolower($search)."%' OR mesin like '%".strtolower($search)."%') AND 
			id_m_cabang=".$id_cabang." AND sell_left!=0";
		$query = $this->db->where($where)->order_by('tanggal asc, id asc')->get('stock_motor', 7, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function get_available_cabang($id_cabang) {
		$where = "id_m_cabang = ".$id_cabang." AND sell_left != 0";
		$query = $this->db->where($where)->order_by('tanggal asc, id asc')->get('stock_motor');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function get_available_delivery($search, $tipe, $warna, $id_cabang) {
		$where = "(rangka like '%".strtolower($search)."%' OR mesin like '%".strtolower($search)."%') AND 
			id_m_motor_tipe=".$tipe." AND id_m_motor_warna=".$warna." AND id_m_cabang=".$id_cabang." AND sell_left!=0";
		$query = $this->db->where($where)->order_by('tanggal asc, id asc')->get('stock_motor', 7, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getrangka($id) {
		$query = $this->db->where('LOWER(rangka)', strtolower($id))->get('stock_motor', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function check_double_rangka($id) {
		$query = $this->db->where('LOWER(rangka)', $id)->get('stock_motor');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getmesin($id) {
		$query = $this->db->where('LOWER(mesin)', strtolower($id))->get('stock_motor', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function check_double_mesin($id) {
		$query = $this->db->where('LOWER(mesin)', $id)->get('stock_motor');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
