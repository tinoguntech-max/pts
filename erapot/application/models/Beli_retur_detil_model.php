<?php
class Beli_retur_detil_model extends CI_Model {
	
	public function add($data) {
        $this->db->insert('beli_retur_detil',$data);
    }
	
	/*public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('hotline_detil', $data);
	}*/
	
	public function delete($id) {
		$this->db->delete('beli_retur_detil', array('id_beli_retur' => $id));
	}
    
	public function record_count() {
        return $this->db->count_all('beli_retur_detil');
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
	
	public function getbybeliterima($id) {
		$query = $this->db->where('id_beli_terima', $id)->get('beli_retur_detil');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbybeliretur($id) {
		$query = $this->db->where('id_beli_retur', $id)->get('beli_retur_detil');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	/*public function getsumdatang($id1, $id2) {
		$query = $this->db->query("SELECT SUM(b.jumlah) as toro FROM beli_terima a, beli_terima_detil b 
			where a.id=b.id_beli_terima AND a.id_beli_order='".$id1."' and b.id_barang='".$id2."'");

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}*/

	public function getsumsub($id) {
		$query = $this->db->query("select sum(sub) as toro from beli_retur_detil where id_beli_retur=".$id);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function laporan($tgl1 = null, $tgl2 = null, $cabang = '0', $barang = '0', $rb_no = '0') {
		$barangs = explode(",", $barang);
		$cabangs = explode(",", $cabang);
		$this->db->select('* , beli_retur_detil.jumlah_convert as jumlah_barang, beli_retur_detil.sub as harga_total, beli_retur_detil.id_barang as id_barang_detil');
		$this->db->from('beli_retur_detil');
		$this->db->join('beli_retur', 'beli_retur_detil.id_beli_retur = beli_retur.id');
		$this->db->where('date(beli_retur.tanggal) >=', $tgl1);
		$this->db->where('date(beli_retur.tanggal) <=', $tgl2);
		if ($barang != '0')
			$this->db->where_in('beli_retur_detil.id_barang', $barangs);
		if ($cabang != '0')
			$this->db->where_in('beli_retur.id_m_cabang', $cabangs);
		if ($rb_no != '0')
			$this->db->like('LOWER(beli_retur.rb_no)', strtolower($rb_no));
		$query = $this->db->get();
		
		/*$q = "SELECT * from beli_minta_detil a, beli_minta b 
			WHERE a.id_beli_minta=b.id AND date(b.tanggal_buat)>='".$tgl1."' AND date(b.tanggal_buat)<='".$tgl2."'";
		if ($barang != '0') $q .= " AND a.id_barang IN (".$barang.")";
		if ($cabang != '0') $q .= " AND b.id_m_cabang IN (".$cabang.")";
		$query = $this->db->query($q);*/
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
