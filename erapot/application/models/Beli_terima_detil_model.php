<?php
class Beli_terima_detil_model extends CI_Model {
	
	public function add($data) {
        $this->db->insert('beli_terima_detil',$data);
    }
	
	/*public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('hotline_detil', $data);
	}*/
	
	public function delete($id) {
		$this->db->delete('beli_terima_detil', array('id_beli_terima' => $id));
	}
    
	public function record_count() {
        return $this->db->count_all('beli_terima_detil');
    }

	/*public function getall() {
		$query = $this->db->order_by('tanggal', 'desc')->get('hotline_detil');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('hotline_detil', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}*/

	public function get($id) {
		$query = $this->db->where('id_beli_terima', $id)->get('beli_terima_detil', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getsumjumlah($id) {
		$query = $this->db->query("select sum(jumlah) as toro from beli_terima_detil where id_beli_terima=".$id);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}	

	public function getterimadanbarang($id, $id1)
	{
		$q = "SELECT * FROM beli_terima_detil WHERE id_beli_terima='{$id}' AND id_barang='{$id1}'";
		$query = $this->db->query($q);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function getbeliterimadetil($id) {
			$q = "SELECT * FROM beli_terima_detil WHERE id IN ('".$id."')";
			$query = $this->db->query($q);
			if ($query->num_rows() > 0)
				return $query->result_array();
			else
				return 0;
	}

	public function getbybeliterima($id) {
		$query = $this->db->where('id_beli_terima', $id)->get('beli_terima_detil');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getsumdatang($id1, $id2) {
		$query = $this->db->query("SELECT SUM(b.jumlah) as toro FROM beli_terima a, beli_terima_detil b 
			where a.id=b.id_beli_terima AND a.id_beli_order='".$id1."' and b.id_barang='".$id2."'");

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function laporan($tgl1 = null, $tgl2 = null, $cabang = '0', $barang = '0', $bpb_no = '0') {
		$barangs = explode(",", $barang);
		$cabangs = explode(",", $cabang);
		$this->db->select('*');
		$this->db->from('beli_terima_detil');
		$this->db->join('beli_terima', 'beli_terima_detil.id_beli_terima = beli_terima.id');
		$this->db->where('date(beli_terima.tanggal) >=', $tgl1);
		$this->db->where('date(beli_terima.tanggal) <=', $tgl2);
		if ($barang != '0')
			$this->db->where_in('beli_terima_detil.id_barang', $barangs);
		if ($cabang != '0')
			$this->db->where_in('beli_terima.id_m_cabang', $cabangs);
		if ($bpb_no != '0')
			$this->db->like('LOWER(beli_terima.bpb_no)', strtolower($bpb_no));
		$query = $this->db->get();
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
