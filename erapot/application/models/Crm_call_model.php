<?php
class Crm_call_model extends CI_Model {
	
    public function record_count() {
        return $this->db->count_all('crm_call');
    }

	public function getall($status = NULL) {
		if (is_null($status))
			$query = $this->db->order_by('nama', 'asc')->get('crm_call');
		else
			$query = $this->db->where('status', $status)->order_by('nama', 'asc')->get('crm_call');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('crm_call', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getnama($id) {
		$query = $this->db->where('LOWER(nama)', strtolower($id))->get('crm_call', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function check_double($id) {
		$query = $this->db->where('LOWER(nama)', $id)->get('crm_call');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function laporan($tgl1 = null, $tgl2 = null, $cabang = '0', $customer = '0', $status = '0', $durasi = '0', $lingkup = '0') {
		$q = "SELECT * from crm_call 
			WHERE date(tgl_mulai)>='".$tgl1."' AND date(tgl_mulai)<='".$tgl2."'";
		if ($cabang != '0') $q .= " AND id_m_cabang IN (".$cabang.")";
		if ($customer != '0') $q .= " AND id_customer IN (".$customer.")";
		if ($status != '0') $q .= " AND status IN (".$status.")";
		if ($durasi != '0') $q .= " AND durasi IN (".$durasi.")";
		if ($lingkup != '0') $q .= " AND direction IN (".$lingkup.")";
		$query = $this->db->query($q);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
