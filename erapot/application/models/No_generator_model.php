<?php
class No_generator_model extends CI_Model {
	
    public function add($data) {
        $this->db->insert('no_generator',$data);
    }
	
	public function updatebyperiode($data) {
		$array = array('bulan'=>$data['bulan'], 'tahun'=>$data['tahun'], 'jenis'=>$data['jenis'], 'id_m_cabang'=>$data['id_m_cabang']);
		$this->db->where($array)->update('no_generator', $data);
	}
	
	public function record_count() {
        return $this->db->count_all('no_generator');
    }

	public function getall() {
		$query = $this->db->order_by('tahun', 'desc')->get('no_generator');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function get($bulan, $tahun, $jenis, $branch = NULL) {
		$this->db->select('*');
		$this->db->where('jenis', $jenis);
		if (!(is_null($bulan))) $this->db->where('bulan', $bulan);
		if (!(is_null($tahun))) $this->db->where('tahun', $tahun);
		if (!(is_null($branch))) $this->db->where('id_m_cabang', $branch);
		$query = $this->db->get('no_generator', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
