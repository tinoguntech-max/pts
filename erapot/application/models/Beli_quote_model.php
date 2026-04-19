<?php
class Beli_quote_model extends CI_Model {
	
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('beli_quote',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    }
	
	public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('beli_quote', $data);
	}
    
	public function record_count() {
        return $this->db->count_all('beli_quote');
    }

	public function getall() {
		$query = $this->db->order_by('tanggal', 'desc')->get('beli_quote');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('beli_quote', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function laporan($tgl1 = null, $tgl2 = null) {
		$query = $this->db->query("select *, id as id_order from beli_quote where date(tanggal)>='".$tgl1."' and date(tanggal)<='".$tgl2."'");
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

	public function getjualorder($id)
	{
		$q = "SELECT * FROM beli_quote WHERE id in ('".$id."')";
		$query = $this->db->query($q);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function getjualinvoice($id)
	{
		$q = "SELECT * FROM beli_quote WHERE id in ('".$id."')";
		$query = $this->db->query($q);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get_autocomplete($q, $branch) {
		$this->db->select('*');
		$this->db->from('beli_quote');
		$this->db->where('(status = 0 OR status = 2)', NULL, false);
		$this->db->where('id_m_cabang', $branch);
		$this->db->like('no_faktur', $q);
		$this->db->limit(7);
		$query = $this->db->get();

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function get_autocomplete_invoice($q) {
		$this->db->select('*');
		$this->db->from('beli_quote');
		$this->db->where('status !=', 0);
		$this->db->where('closed', 0);
		$this->db->where("(so_no like '%{$q}%')", NULL, false);
		$this->db->limit(7);
		$query = $this->db->get();

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
