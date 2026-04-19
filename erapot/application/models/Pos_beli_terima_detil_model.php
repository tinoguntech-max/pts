<?php
class Pos_beli_terima_detil_model extends CI_Model {
	
	public function add($data) {
        $this->db->insert('pos_beli_terima_detil',$data);
    }
	
	public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('pos_beli_terima_detil', $data);
	}
	
	public function updatesisa($data) {
		$array = array('id_pos_beli_terima'=>$data['id_pos_beli_terima'], 'id_barang'=>$data['id_barang'], 'bulan'=>$data['bulan']);
		$this->db->where($array)->update('pos_beli_terima_detil', $data);
	}
	
	public function delete($id) {
		$this->db->delete('pos_beli_terima_detil', array('id_pos_beli_terima' => $id));
	}
    
	public function record_count() {
        return $this->db->count_all('pos_beli_terima_detil');
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
	
	public function getbyposbeliterima($id) {
		$where = array('id_pos_beli_terima'=>$id);
		$query = $this->db->where($where)->get('pos_beli_terima_detil');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbypos($id) {
		$where = array('id_pos_beli_terima'=>$id);
		$query = $this->db->where($where)->get('pos_beli_terima_detil');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbybarangandbulan($id, $bulan) {
		$where = array('id_barang'=>$id, 'bulan'=>$bulan);
		$query = $this->db->where($where)->get('pos_beli_terima_detil');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getsumsisabybarangandbulan($id, $bulan, $cabang, $supplier) {
		$query = $this->db->query("SELECT SUM(b.sisa) as bayu FROM pos_beli_terima a, pos_beli_terima_detil b 
			where a.id=b.id_pos_beli_terima AND a.id_supplier='".$supplier."' AND a.id_m_cabang='".$cabang."' and b.id_barang='".$id."' and b.bulan='".$bulan."'");

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function getsumsisabybarangandbulanspp($id, $bulan, $kelas, $supplier) {
		$query = $this->db->query("SELECT SUM(b.sisa) as bayu FROM pos_beli_terima a, pos_beli_terima_detil b 
			where a.id=b.id_pos_beli_terima AND a.id_supplier='".$supplier."' AND a.id_m_kelas='".$kelas."' and b.id_barang='".$id."' and b.bulan='".$bulan."'");

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getlastbybarangandbulan($id, $bulan, $cabang, $supplier) {
		$query = $this->db->query("SELECT * FROM pos_beli_terima a, pos_beli_terima_detil b 
			where a.id=b.id_pos_beli_terima AND a.id_supplier='".$supplier."'  AND a.id_m_cabang='".$cabang."' and b.id_barang='".$id."' and b.bulan='".$bulan."' ORDER BY b.id DESC LIMIT 1");

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbyposandsupplier($supplier) {
		$q = "SELECT * FROM pos_beli_terima_detil a, pos_beli_terima b WHERE a.id_pos_beli_terima=b.id AND b.id_supplier='{$supplier}' AND a.sisa > 0";
		$query = $this->db->query($q);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbysupplierbulanandtahunspp($supplier, $bulan , $tahun) {
		$q = "SELECT a.bayar, a.sisa FROM pos_beli_terima_detil a, pos_beli_terima b WHERE a.id_pos_beli_terima=b.id AND b.id_supplier='{$supplier}' AND a.bulan ='{$bulan}' AND a.id_barang ='SPP' AND a.tahun ='{$tahun}'";
		$query = $this->db->query($q);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	
	public function getbysuppliertahunlain($supplier, $tipe , $tahun) {
		$q = "SELECT a.bayar, a.id_barang, a.sisa, b.created , a.id_pos_beli_terima, a.id FROM pos_beli_terima_detil a, pos_beli_terima b WHERE a.id_pos_beli_terima=b.id AND b.id_supplier='{$supplier}' AND a.id_barang ='{$tipe}' AND a.tahun ='{$tahun}' ORDER BY a.id DESC";
		$query = $this->db->query($q);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	// untuk memasukkan di kartu stock
	public function getbybeliorderandbarang($id, $id1) {
		$where = array('id_beli_order'=>$id, 'id_barang'=>$id1);
		$query = $this->db->where($where)->get('pos_beli_terima_detil');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbybeliorderall($id) {
		$where = array('id_beli_order'=>$id);
		$query = $this->db->where($where)->get('pos_beli_terima_detil');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbybarang($id1, $id2) {
		$query = $this->db->where(array('id_beli_order'=>$id1, 'id_barang'=>$id2))->get('pos_beli_terima_detil', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbybelimintaandbarang($id, $id1) {
		$q = "SELECT * FROM pos_beli_terima_detil a, beli_order b WHERE a.id_beli_order=b.id AND b.id_beli_minta='{$id}' AND a.id_barang='{$id1}'";
		$query = $this->db->query($q);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function getorderdanbarang($id,$id1)
	{
		$q = "SELECT * FROM beli_order a, pos_beli_terima_detil b WHERE a.id='{$id}' AND b.id_beli_order='{$id}' AND b.id_barang='{$id1}'";
		$query = $this->db->query($q);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getsumsisa($id) {
		$query = $this->db->query("select sum(jumlah_sisa) as toro from pos_beli_terima_detil where id_beli_order=".$id);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getsumsub($id) {
		$query = $this->db->query("select sum(sub) as toro from pos_beli_terima_detil where id_beli_order=".$id);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getsumorder($id1, $id2) {
		$query = $this->db->query("SELECT SUM(b.jumlah) as toro FROM beli_order a, pos_beli_terima_detil b 
			where a.id=b.id_beli_order AND a.id_beli_minta='".$id1."' and b.id_barang='".$id2."'");

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	

	public function laporan($tgl1 = null, $tgl2 = null, $kelas='0', $inv_no='0', $barang='0', $status='99', $murid='0') {
		$q = "SELECT * from pos_beli_terima_detil a, pos_beli_terima b 
			WHERE a.id_pos_beli_terima=b.id AND date(b.tanggal_buat)>='".$tgl1."' AND date(b.tanggal_buat)<='".$tgl2."'";
		if ($kelas != '0') $q .= " AND b.id_m_kelas IN (".$kelas.")";
		if ($barang != '0') $q .= " AND a.id_barang IN (".$barang.")";
		if ($inv_no != '0') $q .= " AND LOWER(no_faktur) LIKE '%".strtolower($inv_no)."%'";
		if ($status != '99') $q .= " AND b.status IN (".$status.")";
		if ($murid != '0') $q .= " AND b.id_supplier IN (".$murid.")";
		$query = $this->db->query($q);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}


