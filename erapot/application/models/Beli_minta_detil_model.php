<?php
class Beli_minta_detil_model extends CI_Model {
	
	public function add($data) {
        $this->db->insert('beli_minta_detil',$data);
    }
	
	/*public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('hotline_detil', $data);
	}*/
	
	public function updatesisa($data) {
		$array = array('id_beli_minta'=>$data['id_beli_minta'], 'id_barang'=>$data['id_barang']);
		$this->db->where($array)->update('beli_minta_detil', $data);
	}
	
	public function delete($id) {
		$this->db->delete('beli_minta_detil', array('id_beli_minta' => $id));
	}
    
	public function record_count() {
        return $this->db->count_all('beli_minta_detil');
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
	
	public function getmintadanbarang($id, $id1)
	{
		$q = "SELECT * FROM beli_minta a, beli_minta_detil b WHERE a.id='{$id}' AND b.id_beli_minta='{$id}' AND b.id_barang='{$id1}'";
		$query = $this->db->query($q);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function getbybeliminta($id) {
		$where = array('id_beli_minta'=>$id, 'jumlah_sisa >'=>0);
		$query = $this->db->where($where)->get('beli_minta_detil');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbybelimintautuh($id) {
		$where = array('id_beli_minta'=>$id);
		$query = $this->db->where($where)->get('beli_minta_detil');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbybarang($id1, $id2) {
		$query = $this->db->where(array('id_beli_minta'=>$id1, 'id_barang'=>$id2))->get('beli_minta_detil', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getsumsisa($id) {
		$query = $this->db->query("select sum(jumlah_sisa) as toro from beli_minta_detil where id_beli_minta=".$id);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function laporan($tgl1 = null, $tgl2 = null, $barang = '0', $cabang = '0') {
		$barangs = explode(",", $barang);
		$cabangs = explode(",", $cabang);
		$this->db->select('*');
		$this->db->from('beli_minta_detil');
		$this->db->join('beli_minta', 'beli_minta_detil.id_beli_minta = beli_minta.id');
		$this->db->where('date(beli_minta.tanggal_buat) >=', $tgl1);
		$this->db->where('date(beli_minta.tanggal_buat) <=', $tgl2);
		if ($barang != '0')
			$this->db->where_in('beli_minta_detil.id_barang', $barangs);
		if ($cabang != '0')
			$this->db->where_in('beli_minta.id_m_cabang', $cabangs);
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
	
	public function laporan_infographic($tgl1 = null, $tgl2 = null, $cabang='0', $tgl3='0', $tgl4='0') {
		$q = "SELECT a.Date as tanggal, count(c.id_beli_minta) as toro, sum(c.kuantitas) as toro_qty
			FROM (
				select curdate() - INTERVAL (a.a + (10 * b.a) + (100 * c.a)) DAY as Date
				from (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as a
				cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as b
				cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as c
			) a LEFT JOIN beli_minta b on a.Date = b.tanggal_buat LEFT JOIN beli_minta_detil c on b.id = c.id_beli_minta
			WHERE a.Date between '{$tgl1}' AND '{$tgl2}'";
		if ($cabang != '0') $q .= " AND b.id_m_cabang IN (".$cabang.")";
		if ($tgl3 != '0' && $tgl4 != '0') $q .= " AND date(b.tanggal_diperlukan)>='".$tgl3."' AND date(b.tanggal_diperlukan)<='".$tgl4."'";
		$q .= " GROUP BY a.Date";
		$query = $this->db->query($q);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
