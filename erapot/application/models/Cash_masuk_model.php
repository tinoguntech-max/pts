<?php
class Cash_masuk_model extends CI_Model {
	
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('cash_masuk',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    }
	
	public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('cash_masuk', $data);
	}
    
	public function record_count() {
        return $this->db->count_all('cash_masuk');
    }

	public function getall() {
		$query = $this->db->order_by('tanggal', 'desc')->get('cash_masuk');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('cash_masuk', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function laporan($tgl1 = null, $tgl2 = null, $cabang = '0', $no_faktur= '0') {
		$q = "select *, a.id as id_beli_bayar FROM beli_bayar a, beli_invoice b 
			WHERE a.id_beli_invoice=b.id AND date(a.tanggal)>='".$tgl1."' AND date(a.tanggal)<='".$tgl2."'";
		if ($cabang != '0') $q .= " AND b.id_m_cabang IN (".$cabang.")";
		if ($no_faktur != '0') $q .= " AND LOWER(a.no_faktur) LIKE '%".strtolower($no_faktur)."%'";
		
		//if ($custkirim != null) $q .= " AND b.id_m_customer_kirim=".$custkirim;
		//if ($custterima != null) $q .= " AND b.id_m_customer_terima=".$custterima;
		$query = $this->db->query($q);
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
