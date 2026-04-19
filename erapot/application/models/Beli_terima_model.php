<?php
class Beli_terima_model extends CI_Model {
	
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('beli_terima',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    }
	
	public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('beli_terima', $data);
	}
    
	public function record_count() {
        return $this->db->count_all('beli_terima');
    }

	public function getall() {
		$query = $this->db->order_by('tanggal', 'desc')->get('beli_terima');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('beli_terima', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function getbybeliorder($id) {
		$query = $this->db->where('id_beli_order', $id)->order_by('tanggal', 'desc')->get('beli_terima');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function getbybeliorderforinvoice($id) {
		$query = $this->db->where(array('id_beli_order'=>$id, 'status'=>0))->order_by('tanggal', 'asc')->get('beli_terima');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbybeliordersupplierforinvoice($supplier, $cabang = null) {		
		$this->db->select('*, beli_terima.id AS id, beli_order.id AS id_beli_order, beli_terima.id_m_cabang AS id_m_cabang');
		$this->db->join('beli_order', 'beli_order.id = beli_terima.id_beli_order');
		if ($cabang != null)
			$where = array('beli_order.id_supplier'=>$supplier, 'beli_terima.id_m_cabang'=>$cabang, 'beli_terima.status'=>0);
		else
			$where = array('beli_order.id_supplier'=>$supplier, 'beli_terima.status'=>0);
		$query = $this->db
			->where($where)
			->get('beli_terima');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	// public function laporan($tgl1 = null, $tgl2 = null, $cabang = '0', $bpb_no='0') {
		// $q = "select * from beli_terima where date(tanggal)>='".$tgl1."' and date(tanggal)<='".$tgl2."'";
		// if ($cabang != '0') $q .= " AND id_m_cabang IN (".$cabang.")";
		// if ($bpb_no != '0') $q .= " AND LOWER(bpb_no) LIKE '%".strtolower($bpb_no)."%'";
		// $query = $this->db->query($q);
		// if ($query->num_rows() > 0)
			// return $query->result_array();
		// else
			// return 0;
	// }
	
	public function laporan($tgl1 = null, $tgl2 = null, $cabang='0', $bpb_no='0') {
		$cabangs = explode(",", $cabang);
		$this->db->select('*, COUNT(beli_terima_detil.id_barang) AS count_barang, SUM(beli_terima_detil.jumlah) AS total_barang');
		$this->db->from('beli_terima');
		$this->db->join('beli_terima_detil', 'beli_terima.id = beli_terima_detil.id_beli_terima', 'left outer');
		$this->db->where('date(tanggal) >=', $tgl1);
		$this->db->where('date(tanggal) <=', $tgl2);
		if ($cabang != '0')
			$this->db->where_in('beli_terima.id_m_cabang', $cabangs);
		if ($bpb_no != '0')
			$this->db->like('LOWER(beli_terima.bpb_no)', strtolower($bpb_no));
		$this->db->group_by('beli_terima.id');
		$query = $this->db->get();
		
		/*$q = "SELECT * from beli_terima WHERE date(tanggal_buat)>='".$tgl1."' AND date(tanggal_buat)<='".$tgl2."'";
		if ($cabang != '0') $q .= " AND id_m_cabang IN (".$cabang.")";
		if ($status != "'5'") $q .= " AND status IN (".$status.")";
		if ($no_faktur != '0') $q .= " AND LOWER(no_faktur) LIKE '%".strtolower($no_faktur)."%'";
		if ($tgl3 != '0' && $tgl4 != '0') $q .= " AND date(tanggal_diperlukan)>='".$tgl3."' AND date(tanggal_diperlukan)<='".$tgl4."'";
		$query = $this->db->query($q);*/
		
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
		$this->db->from('beli_terima');
		//$this->db->where('status', 0);
		$this->db->where("(bpb_no like '%{$q}%')", NULL, false);
		$this->db->limit(7);
		$query = $this->db->get();

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function auto_completretur($q = null, $branch = null) {
		$this->db->select('*, beli_order.tanggal as order_tanggal');
		$this->db->from('beli_terima_detil');
		$this->db->join('beli_terima', 'beli_terima_detil.id_beli_terima = beli_terima.id');
		$this->db->join('beli_order', 'beli_terima.id_beli_order = beli_order.id');
		$this->db->where('beli_order.id_m_cabang', $branch);
		$this->db->where('beli_terima.status !=', 3);
		$this->db->where('beli_terima.status !=', 4);
		$this->db->like('beli_terima.tanggal', $q);
		$this->db->or_like('beli_terima.bpb_no', $q);
		$this->db->group_by('beli_terima.id');
		$this->db->order_by('beli_terima.tanggal', 'desc');
		$this->db->limit(8);
		$query = $this->db->get();
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
}
