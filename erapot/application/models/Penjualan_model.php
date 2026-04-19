<?php
class Penjualan_model extends CI_Model {
	
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('penjualan',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    }
	
	public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('penjualan', $data);
	}

	public function delete($id) {
		$this->db->delete('penjualan', array('id_penjualan' => $id));
	}
    
	public function record_count() {
        return $this->db->count_all('penjualan');
    }

	public function getall() {
		$query = $this->db->order_by('tanggal', 'desc')->get('penjualan');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbycustomer($id) {
		$query = $this->db->where('id_customer', $id)->get('penjualan');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('penjualan', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function laporan_penjualan($tgl1 = null, $tgl2 = null) {
		$query = $this->db->query("select * from penjualan where tanggal>='".$tgl1."' and tanggal<='".$tgl2."'");
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function countby_tanggal($tanggal) {
		$query = $this->db->query("select id as toro from penjualan where tanggal='".$tanggal."'");

		if ($query->num_rows() > 0)
			return $query->num_rows();
		else
			return 0;
	}
	
	public function sumby_tanggal($tanggal) {
		$query = $this->db->query("select sum(total) as toro from penjualan where tanggal='".$tanggal."'");

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
