<?php
class Pos_jual_retur_model extends CI_Model {
	
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('pos_jual_retur',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    }
	
	public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('pos_jual_retur', $data);
	}
    
	public function record_count() {
        return $this->db->count_all('pos_jual_retur');
    }

	public function getall() {
		$query = $this->db->order_by('tanggal', 'desc')->get('pos_jual_retur');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('pos_jual_retur', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbyjualdelivery($id) {
		$query = $this->db->where(array('id_pos_jual_delivery'=>$id, 'status'=>0))->order_by('tanggal', 'asc')->get('pos_jual_retur');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function getretur($id)
	{
		$q = "SELECT * FROM pos_jual_retur WHERE id in ('".$id."')";
		$query = $this->db->query($q);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function laporan($tgl1 = null, $tgl2 = null, $cabang = '0', $barang = '0', $rj_no='0') {
		$q = "select * from pos_jual_retur where date(tanggal)>='".$tgl1."' and date(tanggal)<='".$tgl2."'";
		if ($cabang != '0') $q .= " AND id_m_cabang IN (".$cabang.")";
		if ($barang != '0') $q .= " AND id_barang IN (".$barang.")";
		if ($rj_no != '0') $q .= " AND LOWER(rj_no) LIKE '%".strtolower($rj_no)."%'";
		$query = $this->db->query($q);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function countby_tanggal($tanggal) {
		$query = $this->db->query("select id as toro from pos_jual_retur where tanggal='".$tanggal."'");

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
		$this->db->from('pos_jual_retur');
		$this->db->where('status', 0);
		$this->db->where("(rj_no like '%{$q}%')", NULL, false);
		$this->db->limit(7);
		$query = $this->db->get();

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
