<?php
class Stock_mutasi_model extends CI_Model {
	
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('stock_mutasi',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    }
	
	public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('stock_mutasi', $data);
	}
    
	public function record_count() {
        return $this->db->count_all('stock_mutasi');
    }

	public function getall() {
		$query = $this->db->order_by('tanggal_buat', 'desc')->get('stock_mutasi');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('stock_mutasi', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function laporan($tgl1 = null, $tgl2 = null, $cabang='0', $subcon='0', $no_faktur='0', $tgl3='0', $tgl4='0') {
		$q = "SELECT * from stock_mutasi 
			WHERE date(tanggal_buat)>='".$tgl1."' AND date(tanggal_buat)<='".$tgl2."'";
		if ($cabang != '0') $q .= " AND id_m_cabang IN (".$cabang.")";
		if ($subcon != '0') $q .= " AND id_m_ship_subcon IN (".$subcon.")";
		if ($no_faktur != '0') $q .= " AND LOWER(no_faktur) LIKE '%".strtolower($no_faktur)."%'";
		if ($tgl3 != '0' && $tgl4 != '0') $q .= " AND date(tanggal_diperlukan)>='".$tgl3."' AND date(tanggal_diperlukan)<='".$tgl4."'";	$query = $this->db->query($q);
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
		$q = "SELECT MAX(tanggal_buat) as toro FROM stock_mutasi";
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
		$this->db->from('stock_mutasi');
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
