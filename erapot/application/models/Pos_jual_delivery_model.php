<?php
class Pos_jual_delivery_model extends CI_Model {
	
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('pos_jual_delivery',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    }
	
	public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('pos_jual_delivery', $data);
	}
    
	public function record_count() {
        return $this->db->count_all('pos_jual_delivery');
    }

	public function getall() {
		$query = $this->db->order_by('created', 'desc')->get('pos_jual_delivery');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('pos_jual_delivery', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	// public function laporan($tgl1 = null, $tgl2 = null, $cabang='0', $inv_no='0') {
		// $q = "SELECT * from pos_jual_delivery WHERE date(tanggal)>='".$tgl1."' AND date(tanggal)<='".$tgl2."'";
		// if ($cabang != '0') $q .= " AND id_m_cabang IN (".$cabang.")";
		// if ($inv_no != '0') $q .= " AND LOWER(inv_no) LIKE '%".strtolower($inv_no)."%'";
		// $query = $this->db->query($q);
		// if ($query->num_rows() > 0)
			// return $query->result_array();
		// else
			// return 0;
	// }
	
	public function laporan($tgl1 = null, $tgl2 = null, $cabang='0', $inv_no='0') {
		$cabangs = explode(",", $cabang);
		$this->db->select('*');
		$this->db->from('pos_jual_delivery');
		$this->db->where('date(tanggal) >=', $tgl1);
		$this->db->where('date(tanggal) <=', $tgl2);
		if ($cabang != '0')
			$this->db->where_in('id_m_cabang', $cabangs);
		if ($inv_no != '0')
			$this->db->like('LOWER(inv_no)', strtolower($inv_no));
		$this->db->group_by('id');
		$query = $this->db->get();
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbytanggal($tgl1 = null, $tgl2 = null) {
		$this->db->select('*');
		$this->db->from('pos_jual_delivery');
		$this->db->where('date(tanggal) >=', $tgl1);
		$this->db->where('date(tanggal) <=', $tgl2);
		$query = $this->db->get();
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function laporan_infographic($tgl1 = null, $tgl2 = null, $cabang='0', $tgl3='0', $tgl4='0') {
		$q = "SELECT a.Date as tanggal, count(b.id) as toro
			FROM (
				select curdate() - INTERVAL (a.a + (10 * b.a) + (100 * c.a)) DAY as Date
				from (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as a
				cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as b
				cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as c
			) a left join pos_jual_delivery b on a.Date = b.tanggal_buat
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
	
	public function countby_tanggal($tanggal) {
		$query = $this->db->query("select id as toro from pembelian where tanggal='".$tanggal."'");

		if ($query->num_rows() > 0)
			return $query->num_rows();
		else
			return 0;
	}
	
	public function getmaxdate($cabang = '0') {
		$q = "SELECT MAX(tanggal_buat) as toro FROM pos_jual_delivery";
		if ($cabang != '0') $q .= " WHERE id_m_cabang = ".$cabang;
		$query = $this->db->query($q);

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

	public function get_autocomplete($q, $cabang=0) {
		// hanya berlaku untuk codeigniter 3
		/*$this->db->from('pembelian');
		$this->db->join('customer', 'pembelian.id_customer = customer.id');
		$this->db->where('internasional', 1);
		$this->db->group_start();
		$this->db->like('nota_no', $q);
		$this->db->or_like('nama', $q);
		$this->db->group_end();
		$this->db->limit(7);
		$query = $this->db->get();*/
		
		$this->db->select('*');
		$this->db->from('pos_jual_delivery');
		$this->db->where('status !=', 1);
		$this->db->where('closed', 0);
		if ($cabang != 0)
			$this->db->where('id_m_cabang', $cabang);
		$this->db->where("(no_faktur like '%{$q}%')", NULL, false);
		$this->db->limit(7);
		$query = $this->db->get();

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function auto_customerbarangdelivery($customer = null, $barang = null) {
		$this->db->select('*');
		$this->db->from('pos_jual_delivery_detil');
		$this->db->join('pos_jual_delivery', 'pos_jual_delivery_detil.id_pos_jual_delivery = pos_jual_delivery.id');
		$this->db->where('pos_jual_delivery_detil.id_barang', $barang);
		$this->db->where('pos_jual_delivery.id_customer', $customer);
		$this->db->group_by('pos_jual_delivery.id');
		$this->db->order_by('pos_jual_delivery.tanggal', 'desc');
		$query = $this->db->get();
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
