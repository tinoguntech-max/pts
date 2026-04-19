<?php
class Stock_mutasi_detil_model extends CI_Model {
	
	public function add($data) {
        $this->db->insert('stock_mutasi_detil',$data);
    }
	
	/*public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('hotline_detil', $data);
	}*/
	
	public function delete($id) {
		$this->db->delete('stock_mutasi_detil', array('id_stock_mutasi' => $id));
	}
    
	public function record_count() {
        return $this->db->count_all('stock_mutasi_detil');
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
	
	public function getbystockmutasi($id) {
		$where = array('id_stock_mutasi'=>$id, 'jumlah_sisa >'=>0);
		$query = $this->db->where($where)->get('stock_mutasi_detil');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbystockmutasiutuh($id) {
		$where = array('id_stock_mutasi'=>$id);
		$query = $this->db->where($where)->get('stock_mutasi_detil');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbybarang($id1, $id2) {
		$query = $this->db->where(array('id_stock_mutasi'=>$id1, 'id_barang'=>$id2))->get('stock_mutasi_detil', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getsumsisa($id) {
		$query = $this->db->query("select sum(jumlah_sisa) as toro from stock_mutasi_detil where id_stock_mutasi=".$id);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function laporan($tgl1 = null, $tgl2 = null, $barang = '0', $cabang = '0') {
		$q = "SELECT * from beli_minta_detil a, beli_minta b 
			WHERE a.id_beli_minta=b.id AND date(b.tanggal_buat)>='".$tgl1."' AND date(b.tanggal_buat)<='".$tgl2."'";
		if ($barang != '0') $q .= " AND a.id_barang IN (".$barang.")";
		if ($cabang != '0') $q .= " AND b.id_m_cabang IN (".$cabang.")";
		$query = $this->db->query($q);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
