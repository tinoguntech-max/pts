<?php
class Pos_jual_delivery_detil_model extends CI_Model {
	
	public function add($data) {
        $this->db->insert('pos_jual_delivery_detil',$data);
   	 }
	
	/*public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('hotline_detil', $data);
	}*/
	
	public function updatesisa($data) {
		$array = array('id_beli_order'=>$data['id_beli_order'], 'id_barang'=>$data['id_barang']);
		$this->db->where($array)->update('pos_jual_delivery_detil', $data);
	}
	
	public function updateqc($data) {
		$array = array('id_pos_jual_delivery'=>$data['id_pos_jual_delivery'], 'id_barang'=>$data['id_barang']);
		$this->db->where($array)->update('pos_jual_delivery_detil', $data);
	}
	
	public function delete($id) {
		$this->db->delete('pos_jual_delivery_detil', array('id_pos_jual_delivery' => $id));
	}
    
	public function record_count() {
        return $this->db->count_all('pos_jual_delivery_detil');
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
	
	public function getposjusaldeliverydetil($id) {
		$where = array('id_pos_jual_delivery'=>$id);
		$query = $this->db->where($where)->get('pos_jual_delivery_detil');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function getposjualdelivery($id) {
			$q = "SELECT * FROM pos_jual_delivery WHERE id IN ('".$id."')";
			$query = $this->db->query($q);
			if ($query->num_rows() > 0)
				return $query->result_array();
			else
				return 0;
	}
	
	public function getbypos($id) {
		$where = array('id_pos_jual_delivery'=>$id);
		$query = $this->db->where($where)->get('pos_jual_delivery_detil');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	// untuk memasukkan di kartu stock
	public function getposjusaldeliveryandbrang($id, $id1) {
		$where = array('id_pos_jual_delivery'=>$id, 'id_barang'=>$id1);
		$query = $this->db->where($where)->get('pos_jual_delivery_detil');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbybeliorderall($id) {
		$where = array('id_beli_order'=>$id);
		$query = $this->db->where($where)->get('pos_jual_delivery_detil');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbybarang($id1, $id2) {
		$query = $this->db->where(array('id_beli_order'=>$id1, 'id_barang'=>$id2))->get('pos_jual_delivery_detil', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function getbyjualdeliveryandbarang($id, $id1) {
		$where = array('id_pos_jual_delivery'=>$id, 'id_barang'=>$id1);
		$query = $this->db->where($where)->get('pos_jual_delivery_detil');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	
	public function getbybelimintaandbarang($id, $id1) {
		$q = "SELECT * FROM pos_jual_delivery_detil a, beli_order b WHERE a.id_beli_order=b.id AND b.id_beli_minta='{$id}' AND a.id_barang='{$id1}'";
		$query = $this->db->query($q);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function getorderdanbarang($id,$id1)
	{
		$q = "SELECT * FROM beli_order a, pos_jual_delivery_detil b WHERE a.id='{$id}' AND b.id_beli_order='{$id}' AND b.id_barang='{$id1}'";
		$query = $this->db->query($q);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getsumsisa($id) {
		$query = $this->db->query("select sum(jumlah_sisa) as toro from pos_jual_delivery_detil where id_beli_order=".$id);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getsumsub($id) {
		$query = $this->db->query("select sum(sub) as toro from pos_jual_delivery_detil where id_pos_jual_delivery=".$id);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getsumorder($id1, $id2) {
		$query = $this->db->query("SELECT SUM(b.jumlah) as toro FROM beli_order a, pos_jual_delivery_detil b 
			where a.id=b.id_beli_order AND a.id_beli_minta='".$id1."' and b.id_barang='".$id2."'");

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	
	
	public function laporan($tgl1 = null, $tgl2 = null, $cabang='0', $barang='0', $inv_no='0') {
		$q = "SELECT *, a.jumlah as jumlah_barang, a.discount as diskon, a.sub as harga_total from pos_jual_delivery_detil a, pos_jual_delivery b 
			WHERE a.id_pos_jual_delivery=b.id AND date(b.tanggal)>='".$tgl1."' AND date(b.tanggal)<='".$tgl2."'";
		if ($cabang != '0') $q .= " AND b.id_m_cabang IN (".$cabang.")";
		if ($barang != '0') $q .= " AND a.id_barang IN (".$barang.")";
		if ($inv_no != '0') $q .= " AND LOWER(inv_no) LIKE '%".strtolower($inv_no)."%'";
		$query = $this->db->query($q);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
