<?php
class Beli_order_detil_model extends CI_Model {
	
	public function add($data) {
        $this->db->insert('beli_order_detil',$data);
    }
	
	/*public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('hotline_detil', $data);
	}*/
	
	public function updatesisa($data) {
		$array = array('id_beli_order'=>$data['id_beli_order'], 'id_barang'=>$data['id_barang']);
		$this->db->where($array)->update('beli_order_detil', $data);
	}
	
	public function delete($id) {
		$this->db->delete('beli_order_detil', array('id_beli_order' => $id));
	}
    
	public function record_count() {
        return $this->db->count_all('beli_order_detil');
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
		$where = array('id_beli_order'=>$id, 'jumlah_sisa >'=>0);
		$query = $this->db->where($where)->get('beli_order_detil');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	// untuk memasukkan di kartu stock
	public function getbybeliorderandbarang($id, $id1) {
		$where = array('id_beli_order'=>$id, 'id_barang'=>$id1);
		$query = $this->db->where($where)->get('beli_order_detil');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbybeliorderall($id) {
		$where = array('id_beli_order'=>$id);
		$query = $this->db->where($where)->get('beli_order_detil');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbybarang($id1, $id2) {
		$query = $this->db->where(array('id_beli_order'=>$id1, 'id_barang'=>$id2))->get('beli_order_detil', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbybelimintaandbarang($id, $id1) {
		$q = "SELECT * FROM beli_order_detil a, beli_order b WHERE a.id_beli_order=b.id AND b.id_beli_minta='{$id}' AND a.id_barang='{$id1}'";
		$query = $this->db->query($q);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function getorderdanbarang($id,$id1)
	{
		$q = "SELECT * FROM beli_order a, beli_order_detil b WHERE a.id='{$id}' AND b.id_beli_order='{$id}' AND b.id_barang='{$id1}'";
		$query = $this->db->query($q);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getsumsisa($id) {
		$query = $this->db->query("select sum(jumlah_sisa) as toro from beli_order_detil where id_beli_order=".$id);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getsumsub($id) {
		$query = $this->db->query("select sum(sub) as toro from beli_order_detil where id_beli_order=".$id);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getsumjumlah($id) {
		$query = $this->db->query("select sum(jumlah) as toro from beli_order_detil where id_beli_order=".$id);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getsumorder($id1, $id2) {
		$query = $this->db->query("SELECT SUM(b.jumlah) as toro FROM beli_order a, beli_order_detil b 
			where a.id=b.id_beli_order AND a.id_beli_minta='".$id1."' and b.id_barang='".$id2."'");

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	// public function laporan($tgl1 = null, $tgl2 = null, $cabang='0', $barang='0', $po_no='0') {
		// $q = "SELECT *, a.jumlah as jumlah_barang, a.disc as diskon, a.sub as harga_total from beli_order_detil a, beli_order b 
			// WHERE a.id_beli_order=b.id AND date(b.tanggal)>='".$tgl1."' AND date(b.tanggal)<='".$tgl2."'";
		// if ($cabang != '0') $q .= " AND b.id_m_cabang IN (".$cabang.")";
		// if ($barang != '0') $q .= " AND a.id_barang IN (".$barang.")";
		// if ($po_no != '0') $q .= " AND LOWER(po_no) LIKE '%".strtolower($po_no)."%'";
		// $query = $this->db->query($q);
		// if ($query->num_rows() > 0)
			// return $query->result_array();
		// else
			// return 0;
	// }
	
	public function laporan($tgl1 = null, $tgl2 = null, $cabang = '0', $barang = '0', $po_no = '0') {
		$barangs = explode(",", $barang);
		$cabangs = explode(",", $cabang);
		$this->db->select('* , beli_order_detil.jumlah as jumlah_barang, beli_order_detil.disc as diskon, beli_order_detil.sub as harga_total');
		$this->db->from('beli_order_detil');
		$this->db->join('beli_order', 'beli_order_detil.id_beli_order = beli_order.id');
		$this->db->where('date(beli_order.tanggal) >=', $tgl1);
		$this->db->where('date(beli_order.tanggal) <=', $tgl2);
		if ($barang != '0')
			$this->db->where_in('beli_order_detil.id_barang', $barangs);
		if ($cabang != '0')
			$this->db->where_in('beli_order.id_m_cabang', $cabangs);
		if ($po_no != '0')
			$this->db->like('LOWER(beli_order.po_no)', strtolower($po_no));
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
