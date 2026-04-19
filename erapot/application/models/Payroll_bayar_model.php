<?php
class Payroll_bayar_model extends CI_Model {
	
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('payroll_bayar',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    }
	
	public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('payroll_bayar', $data);
	}
    
	public function record_count() {
        return $this->db->count_all('payroll_bayar');
    }

	public function getall() {
		$query = $this->db->order_by('tanggal', 'desc')->get('payroll_bayar');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('payroll_bayar', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getsumbayar($id) {
		$query = $this->db->query("select sum(besar) as toro from payroll_bayar where id_payroll_minta=".$id);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function laporan($tgl1 = null, $tgl2 = null, $supplier = null) {
		$q = "select * FROM payroll_bayar a, payroll_minta b 
			WHERE a.id_payroll_minta=b.id AND date(a.tanggal)>='".$tgl1."' AND date(a.tanggal)<='".$tgl2."'";
		//if ($custkirim != null) $q .= " AND b.id_m_customer_kirim=".$custkirim;
		//if ($custterima != null) $q .= " AND b.id_m_customer_terima=".$custterima;
		$query = $this->db->query($q);
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function countby_tanggal($tanggal) {
		$query = $this->db->query("select id as toro from payroll_bayar where tanggal='".$tanggal."'");

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
