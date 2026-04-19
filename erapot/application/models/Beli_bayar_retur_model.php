<?php
class Beli_bayar_retur_model extends CI_Model {
	
	public function add($data) {
        $this->db->insert('beli_bayar_retur',$data);
    }
	
	/*public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('hotline_retur', $data);
	}*/
	
	public function updatesisa($data) {
		$array = array('id_beli_bayar'=>$data['id_beli_bayar'], 'id_beli_terima'=>$data['id_beli_terima']);
		$this->db->where($array)->update('beli_bayar_retur', $data);
	}
	
	public function updatebybelibayar($data) {
		$array = array('id_beli_bayar'=>$data['id_beli_bayar']);
		$this->db->where($array)->update('beli_bayar_retur', $data);
	}
	
	public function delete($id) {
		$this->db->delete('beli_bayar_retur', array('id_beli_bayar' => $id));
	}
    
	public function record_count() {
        return $this->db->count_all('beli_bayar_retur');
    }

    public function get($id) {
		$query = $this->db->where('id_beli_bayar', $id)->get('beli_bayar_retur');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}


	/*public function getall() {
		$query = $this->db->order_by('tanggal', 'desc')->get('hotline_retur');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('hotline_retur', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}*/
	
	public function getbybelibayar($id) {
		$query = $this->db->where('id_beli_bayar', $id)->get('beli_bayar_retur');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getsumbayar($id) {
		$query = $this->db->query("select sum(bayar) as toro from beli_bayar_retur where id_beli_retur = ".$id);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	/*public function getbybeliterima($id1, $id2) {
		$query = $this->db->where(array('id_beli_bayar'=>$id1, 'id_beli_terima'=>$id2))->get('beli_bayar_retur', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}*/

	public function getbybeliterima($id) {
		$q = "SELECT * FROM beli_bayar_retur WHERE id_beli_terima='{$id}'";
		$query = $this->db->query($q);
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getsumsisa($id) {
		$query = $this->db->query("select sum(jumlah_sisa) as toro from beli_order_retur where id_beli_order=".$id);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	// public function laporan($tgl1 = null, $tgl2 = null, $tgl3 = null, $tgl4 = null, $cabang='0', $inv_no='0', $po_no='0', $bpb_no='0') {
		// $q = "SELECT * from beli_bayar_retur a, beli_bayar b, beli_terima c, beli_order d
			// WHERE a.id_beli_bayar=b.id AND a.id_beli_terima=c.id AND b.id_beli_order=d.id AND date(b.tanggal)>='".$tgl1."' AND date(b.tanggal)<='".$tgl2."'";
			// if ($tgl3 != '0' && $tgl4 != '0') $q .= " AND date(tanggal_jatuh_tempo)>='".$tgl3."' AND date(tanggal_jatuh_tempo)<='".$tgl4."'";
			// if ($cabang != '0') $q .= " AND b.id_m_cabang IN (".$cabang.")";
			// if ($inv_no != '0') $q .= " AND LOWER(inv_no) LIKE '%".strtolower($inv_no)."%'";
			// if ($po_no != '0') $q .= " AND LOWER(po_no) LIKE '%".strtolower($po_no)."%'";
			// if ($bpb_no != '0') $q .= " AND LOWER(bpb_no) LIKE '%".strtolower($bpb_no)."%'";
			// $query = $this->db->query($q);
		// if ($query->num_rows() > 0)
			// return $query->result_array();
		// else
			// return 0;
	// }
	
	public function getbybeliordersupplierforbayar($supplier, $cabang = null) {		
		$this->db->select('*, beli_bayar.id AS id');
		$this->db->join('beli_bayar', 'beli_bayar.id = beli_bayar_retur.id_beli_bayar');
		$where = array('beli_bayar.id_supplier'=>$supplier, 'beli_bayar_retur.status'=>0);
		$query = $this->db
			->where($where)
			->get('beli_bayar_retur');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	
	public function laporan($tgl1 = null, $tgl2 = null, $tgl3 = null, $tgl4 = null, $cabang='0', $inv_no='0', $po_no='0', $bpb_no='0') {
		$cabangs = explode(",", $cabang);
		$this->db->select('*');
		$this->db->from('beli_bayar_retur');
		$this->db->join('beli_bayar', 'beli_bayar.id = beli_bayar_retur.id_beli_bayar', 'left outer');
		$this->db->join('beli_terima', 'beli_terima.id = beli_bayar_retur.id_beli_terima');
		$this->db->join('beli_order', 'beli_order.id = beli_bayar.id_beli_order');
		$this->db->where('date(beli_bayar.tanggal) >=', $tgl1);
		$this->db->where('date(beli_bayar.tanggal) <=', $tgl2);
		if ($cabang != '0')
			$this->db->where_in('beli_bayar.id_m_cabang', $cabangs);
		if ($inv_no != '0')
			$this->db->like('LOWER(beli_bayar.inv_no)', strtolower($inv_no));
		if ($po_no != '0')
			$this->db->like('LOWER(beli_order.po_no)', strtolower($po_no));
		if ($bpb_no != '0')
			$this->db->like('LOWER(beli_terima.bpb_no)', strtolower($bpb_no));
		if ($tgl3 != '0' && $tgl4 != '0') {
			$this->db->where('date(beli_bayar.tanggal_jatuh_tempo) >=', $tgl3);
			$this->db->where('date(beli_bayar.tanggal_jatuh_tempo) <=', $tgl4);
		}
		$this->db->group_by('beli_bayar.id');
		$query = $this->db->get();
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
}
