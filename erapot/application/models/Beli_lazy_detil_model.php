<?php
class Beli_lazy_detil_model extends CI_Model {
	
	public function add($data) {
        $this->db->insert('beli_lazy_detil',$data);
    }
	
	/*public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('hotline_detil', $data);
	}*/
	
	public function updatesisa($data) {
		$array = array('id_beli_lazy'=>$data['id_beli_lazy'], 'id_barang'=>$data['id_barang']);
		$this->db->where($array)->update('beli_lazy_detil', $data);
	}
	
	public function delete($id) {
		$this->db->delete('beli_lazy_detil', array('id_beli_lazy' => $id));
	}
    
	public function record_count() {
        return $this->db->count_all('beli_lazy_detil');
    }

    public function get($id) {
		$query = $this->db->where('id_beli_lazy', $id)->get('beli_lazy_detil');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	/*public function getall() {
		$query = $this->db->lazy_by('tanggal', 'desc')->get('hotline_detil');
		
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
	
	public function getbybelilazy($id) {
		$where = array('id_beli_lazy'=>$id);
		$query = $this->db->where($where)->get('beli_lazy_detil');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function getbybelilazyallcount($id, $count = 0, $from = 0) {
		$where = array('id_beli_lazy'=>$id);
		$query = $this->db->where($where)->get('beli_lazy_detil', $count, $from);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	// untuk memasukkan di kartu stock
	public function getbybelilazyandbarang($id, $id1) {
		$where = array('id_beli_lazy'=>$id, 'id_barang'=>$id1);
		$query = $this->db->where($where)->get('beli_lazy_detil');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbybelilazyall($id) {
		$where = array('id_beli_lazy'=>$id);
		$query = $this->db->where($where)->get('beli_lazy_detil');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbybarang($id1, $id2) {
		$query = $this->db->where(array('id_beli_lazy'=>$id1, 'id_barang'=>$id2))->get('beli_lazy_detil', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getsumsisa($id) {
		$query = $this->db->query("select sum(jumlah_sisa) as toro from beli_lazy_detil where id_beli_lazy=".$id);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getsumsub($id) {
		$query = $this->db->query("select sum(sub) as toro from beli_lazy_detil where id_beli_lazy=".$id);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getsumlazy($id1, $id2) {
		$query = $this->db->query("SELECT SUM(b.jumlah) as toro FROM beli_lazy a, beli_lazy_detil b 
			where a.id=b.id_beli_lazy AND a.id_beli_quote='".$id1."' and b.id_barang='".$id2."'");

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function laporan($tgl1 = null, $tgl2 = null, $so_no='0', $barang ='0') {
		$q = "SELECT *, a.jumlah as jumlah_detil FROM beli_lazy_detil a, beli_lazy b WHERE a.id_beli_lazy=b.id AND date(b.tanggal)>='".$tgl1."' AND date(b.tanggal)<='".$tgl2."'";
		if ($barang != '0') $q .=" AND a.id_barang IN (".$barang.")";
		if ($so_no != '0') $q .= " AND LOWER(b.so_no) LIKE '%".strtolower($so_no)."%'";
		$query = $this->db->query($q);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
