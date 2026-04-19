<?php
class stock_avg_model extends CI_Model {
	
	public function add($data) {
        $this->db->insert('stock_avg',$data);
    }
	
	public function getall() {
		$query = $this->db->order_by('id', 'asc')->get('stock_avg');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function delete($id) {
		$this->db->delete('stock_avg', array('id_pos_jual_delivery' => $id));
	}
    
	public function record_count() {
        return $this->db->count_all('stock_avg');
    }
	
	public function getlastbybarang($barang, $cabang) {
		$query = $this->db->where(array('id_barang'=>$barang, 'id_m_cabang'=>$cabang))->order_by('tanggal','desc')->get('stock_avg', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getlastbybarang1($barang) {
		$query = $this->db->where(array('id_barang'=>$barang))->order_by('tanggal','desc')->get('stock_avg', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function laporan($tgl1 = null, $tgl2 = null, $cabang='0', $barang='0', $po_no='0') {
		$q = "SELECT *, a.jumlah as jumlah_barang, a.disc as diskon, a.sub as harga_total from stock_avg a, beli_order b 
			WHERE a.id_beli_order=b.id AND date(b.tanggal)>='".$tgl1."' AND date(b.tanggal)<='".$tgl2."'";
		if ($cabang != '0') $q .= " AND b.id_m_cabang IN (".$cabang.")";
		if ($barang != '0') $q .= " AND a.id_barang IN (".$barang.")";
		if ($po_no != '0') $q .= " AND LOWER(po_no) LIKE '%".strtolower($po_no)."%'";
		$query = $this->db->query($q);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
