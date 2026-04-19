<?php
class Beli_minta_model extends CI_Model {
	
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('beli_minta',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    }
	
	public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('beli_minta', $data);
	}
    
	public function record_count() {
        return $this->db->count_all('beli_minta');
    }

	public function getall() {
		$query = $this->db->order_by('tanggal_buat', 'desc')->get('beli_minta');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('beli_minta', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function laporan($tgl1 = null, $tgl2 = null, $cabang='0', $no_faktur='0', $tgl3='0', $tgl4='0', $status='5') {
		$cabangs = explode(",", $cabang);
		$statuses = explode(",", $status);
		$this->db->select('*, COUNT(beli_minta_detil.id_barang) AS count_barang, SUM(beli_minta_detil.kuantitas) AS total_barang');
		$this->db->from('beli_minta');
		$this->db->join('beli_minta_detil', 'beli_minta.id = beli_minta_detil.id_beli_minta', 'left outer');
		$this->db->where('date(tanggal_buat) >=', $tgl1);
		$this->db->where('date(tanggal_buat) <=', $tgl2);
		if ($cabang != '0')
			$this->db->where_in('beli_minta.id_m_cabang', $cabangs);
		if ($status != '5')
			$this->db->where_in('beli_minta.status', $statuses);
		if ($no_faktur != '0')
			$this->db->like('LOWER(beli_minta.no_faktur)', strtolower($no_faktur));
		if ($tgl3 != '0' && $tgl4 != '0') {
			$this->db->where('date(beli_minta.tanggal_diperlukan) >=', $tgl3);
			$this->db->where('date(beli_minta.tanggal_diperlukan) <=', $tgl4);
		}
		$this->db->group_by('beli_minta.id');
		$query = $this->db->get();
		
		/*$q = "SELECT * from beli_minta WHERE date(tanggal_buat)>='".$tgl1."' AND date(tanggal_buat)<='".$tgl2."'";
		if ($cabang != '0') $q .= " AND id_m_cabang IN (".$cabang.")";
		if ($status != "'5'") $q .= " AND status IN (".$status.")";
		if ($no_faktur != '0') $q .= " AND LOWER(no_faktur) LIKE '%".strtolower($no_faktur)."%'";
		if ($tgl3 != '0' && $tgl4 != '0') $q .= " AND date(tanggal_diperlukan)>='".$tgl3."' AND date(tanggal_diperlukan)<='".$tgl4."'";
		$query = $this->db->query($q);*/
		
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
			) a left join beli_minta b on a.Date = b.tanggal_buat
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
		$q = "SELECT MAX(tanggal_buat) as toro FROM beli_minta";
		if ($cabang != '0') $q .= " WHERE id_m_cabang = ".$cabang;
		$query = $this->db->query($q);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get_autocomplete($q, $cabang=0) {
		// hanya berlaku untuk codeigniter 3
		/*$this->db->from('pembelian');
		$this->db->join('supplier', 'pembelian.id_supplier = supplier.id');
		$this->db->where('internasional', 1);
		$this->db->group_start();
		$this->db->like('nota_no', $q);
		$this->db->or_like('nama', $q);
		$this->db->group_end();
		$this->db->limit(7);
		$query = $this->db->get();*/
		
		$this->db->select('*');
		$this->db->from('beli_minta');
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
}
