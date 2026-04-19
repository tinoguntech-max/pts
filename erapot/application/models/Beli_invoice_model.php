<?php
class Beli_invoice_model extends CI_Model {
	
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('beli_invoice',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    }
	
	public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('beli_invoice', $data);
	}
    
	public function record_count() {
        return $this->db->count_all('beli_invoice');
    }

	public function getall() {
		$query = $this->db->order_by('tanggal', 'desc')->get('beli_invoice');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('beli_invoice', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbysupplier($id) {
		$where = array('id_supplier'=>$id, 'sisa !='=>0, 'forced_date ='=> null);
		$query = $this->db->where($where)->get('beli_invoice');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function getbybeliorder($id) {
		$query = $this->db->where('id_beli_order', $id)->order_by('tanggal', 'desc')->get('beli_invoice');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	// public function laporan($tgl1 = null, $tgl2 = null, $tgl3 = '0', $tgl4 = '0', $cabang = '0', $inv_no='0') {
		// $q = "select * from beli_invoice where date(tanggal)>='".$tgl1."' and date(tanggal)<='".$tgl2."'";
		// if ($cabang != '0') $q .= " AND id_m_cabang IN (".$cabang.")";
		// if ($inv_no != '0') $q .= " AND LOWER(inv_no) LIKE '%".strtolower($inv_no)."%'";
		// if ($tgl3 != '0' && $tgl4 != '0') $q .= " AND date(tanggal_jatuh_tempo)>='".$tgl3."' AND date(tanggal_jatuh_tempo)<='".$tgl4."'";
		// $query = $this->db->query($q);
		// if ($query->num_rows() > 0)
			// return $query->result_array();
		// else
			// return 0;
	// }
	
	public function laporan($tgl1 = null, $tgl2 = null, $tgl3 = '0', $tgl4 = '0', $cabang = '0', $inv_no='0', $status = '0') {
		$cabangs = explode(",", $cabang);
		$this->db->select('*');
		$this->db->from('beli_invoice');
		$this->db->join('beli_invoice_detil', 'beli_invoice.id = beli_invoice_detil.id_beli_invoice', 'left outer');
		$this->db->where('date(tanggal) >=', $tgl1);
		$this->db->where('date(tanggal) <=', $tgl2);
		if ($status != '0'){			
			$status = str_replace("-o-", "", $status);
			$statuss = explode(",", $status);
			$this->db->where_in('beli_invoice.status', $statuss);
		}
		if ($cabang != '0')
			$this->db->where_in('beli_invoice.id_m_cabang', $cabangs);
		if ($inv_no != '0')
			$this->db->like('LOWER(beli_invoice.inv_no)', strtolower($inv_no));
		if ($tgl3 != '0' && $tgl4 != '0') {
			$this->db->where('date(beli_invoice.tanggal_jatuh_tempo) >=', $tgl3);
			$this->db->where('date(beli_invoice.tanggal_jatuh_tempo) <=', $tgl4);
		}
		$this->db->group_by('beli_invoice.id');
		$query = $this->db->get();
		
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
		$this->db->from('beli_invoice');
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

	public function get_belum_lunas() {
		$q = "SELECT * FROM beli_invoice a, beli_invoice_detil b WHERE a.id=b.id_beli_invoice AND a.sisa != 0";
		$query = $this->db->query($q);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;	
	}
}
