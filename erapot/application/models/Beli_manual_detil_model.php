<?php
class Beli_manual_detil_model extends CI_Model {
	
	public function add($data) {
        $this->db->insert('beli_manual_detil',$data);
    }
	
	/*public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('hotline_detil', $data);
	}*/
	
	public function updatesisa($data) {
		$array = array('id_beli_manual'=>$data['id_beli_manual'], 'id_barang'=>$data['id_barang']);
		$this->db->where($array)->update('beli_manual_detil', $data);
	}
	
	public function delete($id) {
		$this->db->delete('beli_manual_detil', array('id_beli_manual' => $id));
	}
    
	public function record_count() {
        return $this->db->count_all('beli_manual_detil');
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
	
	public function getbybeliorder($id) {
		$where = array('id_beli_manual'=>$id, 'jumlah_sisa >'=>0);
		$query = $this->db->where($where)->get('beli_manual_detil');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	// untuk memasukkan di kartu stock
	public function getbybeliorderandbarang($id, $id1) {
		$where = array('id_beli_manual'=>$id, 'id_barang'=>$id1);
		$query = $this->db->where($where)->get('beli_manual_detil');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbybelimanualall($id) {
		$where = array('id_beli_manual'=>$id);
		$query = $this->db->where($where)->get('beli_manual_detil');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbybarang($id1, $id2) {
		$query = $this->db->where(array('id_beli_manual'=>$id1, 'id_barang'=>$id2))->get('beli_manual_detil', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbybelimintaandbarang($id, $id1) {
		$q = "SELECT * FROM beli_manual_detil a, beli_manual b WHERE a.id_beli_manual=b.id AND b.id_beli_minta='{$id}' AND a.id_barang='{$id1}'";
		$query = $this->db->query($q);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function getorderdanbarang($id,$id1)
	{
		$q = "SELECT * FROM beli_manual a, beli_manual_detil b WHERE a.id='{$id}' AND b.id_beli_manual='{$id}' AND b.id_barang='{$id1}'";
		$query = $this->db->query($q);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getsumsisa($id) {
		$query = $this->db->query("select sum(jumlah_sisa) as toro from beli_manual_detil where id_beli_manual=".$id);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getsumsub($id) {
		$query = $this->db->query("select sum(sub) as toro from beli_manual_detil where id_beli_manual=".$id);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getsumorder($id1, $id2) {
		$query = $this->db->query("SELECT SUM(b.jumlah) as toro FROM beli_manual a, beli_manual_detil b 
			where a.id=b.id_beli_manual AND a.id_beli_minta='".$id1."' and b.id_barang='".$id2."'");

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function laporan($tgl1 = null, $tgl2 = null, $cabang='0', $no_faktur='0', $supplier='0', $barang='0') {
		$q = "SELECT *, a.jumlah as jumlah_barang, a.disc as diskon, a.sub as harga_total from beli_manual_detil a, beli_manual b 
			WHERE a.id_beli_manual=b.id AND date(b.tanggal)>='".$tgl1."' AND date(b.tanggal)<='".$tgl2."'";
		if ($cabang != '0') $q .= " AND b.id_m_cabang IN (".$cabang.")";
		if ($no_faktur != '0') $q .= " AND LOWER(b.no_faktur) LIKE '%".strtolower($no_faktur)."%'";
		if ($supplier != '0') $q .= " AND LOWER(b.supplier) LIKE '%".strtolower($supplier)."%'";
		if ($barang != '0') $q .= " AND LOWER(a.barang) LIKE '%".strtolower($barang)."%'";
		$query = $this->db->query($q);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
