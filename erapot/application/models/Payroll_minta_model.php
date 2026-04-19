<?php
class Payroll_minta_model extends CI_Model {
	
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('payroll_minta',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    }
	
	public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('payroll_minta', $data);
	}
    
	public function record_count() {
        return $this->db->count_all('payroll_minta');
    }

	public function getall() {
		$query = $this->db->order_by('tanggal', 'desc')->get('payroll_minta');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getallsisa() {
		$query = $this->db->where('sisa >', 0)->get('payroll_minta');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('payroll_minta', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function laporan($tgl1 = null, $tgl2 = null) {
		$query = $this->db->query("select * from payroll_minta where date(tanggal)>='".$tgl1."' and date(tanggal)<='".$tgl2."'");
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
		$this->db->from('payroll_minta');
		$this->db->where('status', 0);
		$this->db->or_where('status', 2);
		$this->db->where("(inv_no like '%{$q}%')", NULL, false);
		$this->db->limit(7);
		$query = $this->db->get();

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
