<?php
class Beli_tender_detil_model extends CI_Model {
	
	public function add($data) {
        $this->db->insert('beli_tender_detil',$data);
    }
	
	/*public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('hotline_detil', $data);
	}*/
	
	public function updatesisa($data) {
		$array = array('id_beli_tender'=>$data['id_beli_tender'], 'id_barang'=>$data['id_barang']);
		$this->db->where($array)->update('beli_tender_detil', $data);
	}
	
	public function delete($id) {
		$this->db->delete('beli_tender_detil', array('id_beli_tender' => $id));
	}
    
	public function record_count() {
        return $this->db->count_all('beli_tender_detil');
    }

    public function get($id) {
		$query = $this->db->where('id_beli_tender', $id)->get('beli_tender_detil');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
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
	
	public function getbybelitender($id) {
		$where = array('id_beli_tender'=>$id, 'jumlah_sisa >'=>0);
		$query = $this->db->where($where)->get('beli_tender_detil');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	// untuk memasukkan di kartu stock
	public function getbyjualorderandbarang($id, $id1) {
		$where = array('id_beli_tender'=>$id, 'id_barang'=>$id1);
		$query = $this->db->where($where)->get('beli_tender_detil');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbybelitenderall($id) {
		$where = array('id_beli_tender'=>$id);
		$query = $this->db->where($where)->get('beli_tender_detil');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbybarang($id1, $id2) {
		$query = $this->db->where(array('id_beli_tender'=>$id1, 'id_barang'=>$id2))->get('beli_tender_detil', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getsumsisa($id) {
		$query = $this->db->query("select sum(jumlah_sisa) as toro from beli_tender_detil where id_beli_tender=".$id);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getsumsub($id) {
		$query = $this->db->query("select sum(sub) as toro from beli_tender_detil where id_beli_tender=".$id);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getsumorder($id1, $id2) {
		$query = $this->db->query("SELECT SUM(b.jumlah) as toro FROM beli_tender a, beli_tender_detil b 
			where a.id=b.id_beli_tender AND a.id_beli_minta='".$id1."' and b.id_barang='".$id2."'");

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function laporan($tgl1 = null, $tgl2 = null) {
		$q = "SELECT *, a.jumlah as jumlah_detil FROM beli_tender_detil a, beli_tender b WHERE a.id_beli_tender=b.id AND date(b.tanggal)>='".$tgl1."' AND date(b.tanggal)<='".$tgl2."'";
		$query = $this->db->query($q);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbytender($id) {
		$where = array('id_beli_tender'=>$id);
		$query = $this->db->where($where)->get('beli_tender_detil');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
