<?php
class Beli_bayar_model extends CI_Model {
	
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('beli_bayar',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    }
	
	public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('beli_bayar', $data);
	}
    
	public function record_count() {
        return $this->db->count_all('beli_bayar');
    }

	public function getall() {
		$query = $this->db->order_by('tanggal', 'desc')->get('beli_bayar');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function getbybeliinvoice($id)
	{
		$q = "SELECT * FROM beli_bayar WHERE id_beli_invoice='{$id}'";
		$query = $this->db->query($q);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('beli_bayar', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getsumbayar($id) {
		$query = $this->db->query("select sum(besar) as toro from beli_bayar where id_beli_invoice = ".$id." AND status = 1");

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	// public function laporan($tgl1 = null, $tgl2 = null, $cabang = '0', $no_faktur= '0') {
		// $q = "select *, a.id as id_beli_bayar FROM beli_bayar a, beli_invoice b 
			// WHERE a.id_beli_invoice=b.id AND date(a.tanggal)>='".$tgl1."' AND date(a.tanggal)<='".$tgl2."'";
		// if ($cabang != '0') $q .= " AND b.id_m_cabang IN (".$cabang.")";
		// if ($no_faktur != '0') $q .= " AND LOWER(a.no_faktur) LIKE '%".strtolower($no_faktur)."%'";
		
		/*if ($custkirim != null) $q .= " AND b.id_m_customer_kirim=".$custkirim;
		if ($custterima != null) $q .= " AND b.id_m_customer_terima=".$custterima;*/
		// $query = $this->db->query($q);
		
		// if ($query->num_rows() > 0)
			// return $query->result_array();
		// else
			// return 0;
	// }
	
	public function laporan($tgl1 = null, $tgl2 = null, $cabang = '0', $no_faktur= '0') {
		$cabangs = explode(",", $cabang);
		$this->db->select('*, beli_bayar.id as id_beli_bayar');
		$this->db->from('beli_bayar');
		$this->db->join('beli_invoice', 'beli_invoice.id = beli_bayar.id_beli_invoice', 'left outer');
		$this->db->where('date(beli_bayar.tanggal) >=', $tgl1);
		$this->db->where('date(beli_bayar.tanggal) <=', $tgl2);
		if ($cabang != '0')
			$this->db->where_in('beli_invoice.id_m_cabang', $cabangs);
		if ($no_faktur != '0')
			$this->db->like('LOWER(beli_bayar.no_faktur)', strtolower($no_faktur));
		$this->db->group_by('beli_bayar.id');
		$query = $this->db->get();
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function countby_tanggal($tanggal) {
		$query = $this->db->query("select id as toro from beli_bayar where tanggal='".$tanggal."'");

		if ($query->num_rows() > 0)
			return $query->num_rows();
		else
			return 0;
	}

	public function get_autocomplete($q) {
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
		$this->db->from('beli_terima');
		$this->db->where('(status = 0 or status = 2)', NULL, false);
		//$this->db->or_where('status', 2);
		$this->db->where("(bpb_no like '%{$q}%')", NULL, false);
		$this->db->limit(7);
		$query = $this->db->get();

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function get_autocomplete_invoice($q) {
		$this->db->select('*');
		$this->db->from('beli_terima');
		$this->db->where('status !=', 0);
		$this->db->where('closed', 0);
		$this->db->where("(bpb_no like '%{$q}%')", NULL, false);
		$this->db->limit(7);
		$query = $this->db->get();

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
