<?php
class Beli_manual_model extends CI_Model {
	
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('beli_manual',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    }
	
	public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('beli_manual', $data);
	}
    
	public function record_count() {
        return $this->db->count_all('beli_manual');
    }

	public function getall() {
		$query = $this->db->order_by('tanggal', 'desc')->get('beli_manual');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function getbybeliminta($id) {
		$query = $this->db->where('id_beli_minta', $id)->order_by('tanggal', 'desc')->get('beli_manual');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('beli_manual', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function laporan($tgl1 = null, $tgl2 = null, $cabang = '0', $no_faktur= '0', $supplier = '0') {
		$q = "select * from beli_manual where date(tanggal)>='".$tgl1."' and date(tanggal)<='".$tgl2."'";
		if ($cabang != '0') $q .= " AND id_m_cabang IN (".$cabang.")";
		if ($no_faktur != '0') $q .= " AND LOWER(no_faktur) LIKE '%".strtolower($no_faktur)."%'";
		if ($supplier != '0') $q .= " AND LOWER(supplier) LIKE '%".strtolower($supplier)."%'";
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
		$this->db->from('beli_manual');
		$this->db->where('(status = 0 or status = 2)', NULL, false);
		//$this->db->or_where('status', 2);
		if ($cabang != 0)
			$this->db->where('id_m_cabang', $cabang);
		$this->db->where("(po_no like '%{$q}%')", NULL, false);
		$this->db->limit(7);
		$query = $this->db->get();

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function get_autocomplete_invoice($q, $cabang=0) {
		$this->db->select('*');
		$this->db->from('beli_manual');
		$this->db->where('status !=', 0);
		$this->db->where('closed', 0);
		if ($cabang != 0)
			$this->db->where('id_m_cabang', $cabang);
		$this->db->where("(po_no like '%{$q}%')", NULL, false);
		$this->db->limit(7);
		$query = $this->db->get();

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
