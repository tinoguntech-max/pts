<?php
class Transaksi_model extends CI_Model {
	
    public function record_count() {
        return $this->db->count_all('transaksi');
    }

	public function getall() {
		$query = $this->db->order_by('nama', 'asc')->get('transaksi');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('transaksi', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function countby_tanggal($tanggal) {
		$query = $this->db->query("select id as toro from transaksi where tanggal='".$tanggal."'");

		if ($query->num_rows() > 0)
			return $query->num_rows();
		else
			return 0;
	}
	
	public function countbydet_tanggal($tanggal) {
		$query = $this->db->query("select * from transaksi a, transaksid b where a.id=b.id_transaksi and a.tanggal='".$tanggal."'");

		if ($query->num_rows() > 0)
			return $query->num_rows();
		else
			return 0;
	}
	
	public function sumby_tanggal($tanggal) {
		$query = $this->db->query("select sum(besar) as toro from transaksi where tanggal='".$tanggal."'");

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
