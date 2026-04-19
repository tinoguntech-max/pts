<?php
class Cl_mhs_model extends CI_Model {
	public function gets($param1 = NULL, $param2 = NULL) {
		if (is_null($param1) && is_null($param2))
			$query = $this->db->where('status', 0)->order_by('id', 'asc')->get('cl_mhs');
		else
			$query = $this->db->where('status', 0)->order_by('id', 'asc')->get('cl_mhs', $param1, $param2);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getallnotassign() {
		$query = $this->db->where(array('status'=>0))->order_by('nama_depan', 'asc')->get('cl_mhs');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function beasiswa_gets($param1 = NULL, $param2 = NULL) {
		if (is_null($param1) && is_null($param2))
			$query = $this->db->where(array('status'=>0, 'beasiswa'=>'Ya'))->order_by('id', 'asc')->get('cl_mhs', 500, 0);
		else
			$query = $this->db->where(array('status'=>0, 'beasiswa'=>'Ya'))->order_by('id', 'asc')->get('cl_mhs', $param1, $param2);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
    public function record_count() {
        return $this->db->count_all('cl_mhs');
    }
	
	public function count_created_periode($tahun,$bulan) {
		$query = $this->db->query("select id from cl_mhs where month(datecreated)=".$bulan." and year(datecreated)=".$tahun);

		if ($query->num_rows() > 0)
			return $query->num_rows();
		else
			return 0;
	}
    
    public function search_record_count($param = NULL) {
		$tables = array(
			"username" => $param,
			"nama_depan" => $param,
			"nama_belakang" => $param,
			"kota" => $param,
			"email" => $param
			);
			
        return $this->db->where('status', 0)->or_like($tables)->count_all_results('cl_mhs');
    }

    public function beasiswa_record_count() {
        return $this->db->count_all('cl_mhs');
    }

	public function search($param = NULL, $param1 = NULL, $param2 = NULL) {
		$tables = array(
			"username" => $param,
			"nama_depan" => $param,
			"nama_belakang" => $param,
			"kota" => $param,
			"email" => $param
			);

		$query = $this->db->where('status', 0)->or_like($tables)->order_by('id', 'asc')->get('cl_mhs', $param1, $param2);
		//$query = $this->db->or_like($tables)->order_by('username', 'asc')->get('cl_mhs', 50, 0);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($userid) {
		$query = $this->db->where('username', $userid)->get('cl_mhs', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getid($userid) {
		$query = $this->db->where('id', $userid)->get('cl_mhs', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbyid($userid) {
		$query = $this->db->where('id', $userid)->get('cl_mhs', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function add($data) {
		$this->db->insert('cl_mhs', $data);

		//callback
		$query = $this->db->where('username', $data['username'])->get('cl_mhs', 1, 0);
		if ($query->num_rows() > 0) {
			$res = $query->result_array();
			//masukkan dalam record
			$data1['cl_mhs_id'] = $res[0]['id'];
			$data1['user_id'] = $this->session->userdata('user_id');
			$data1['keterangan'] = "a new record has been created by ".$this->session->userdata('user_name');
			$this->db->insert('cl_mhs_records', $data1);
			return $res;
		}
		else
			return 0;
	}

	public function update($data) {
		//check where the data change
		$query = $this->db->where('username', $data['username'])->get('cl_mhs', 1, 0);
		if ($query->num_rows() > 0) {
			$res = $query->result_array();
			$keterangan = '';
			if (!empty($data['password']))
				$keterangan .= ' changed password;';
			if ($data['nama_depan'] != $res[0]['nama_depan'])
				$keterangan .= ' changed nama depan from '.$res[0]['nama_depan'].' to '.$data['nama_depan'].';';
			if ($data['nama_belakang'] != $res[0]['nama_belakang'])
				$keterangan .= ' changed nama belakang from '.$res[0]['nama_belakang'].' to '.$data['nama_belakang'].';';
			if ($data['jenis_kelamin'] != $res[0]['jenis_kelamin'])
				$keterangan .= ' changed jenis kelamin from '.$res[0]['jenis_kelamin'].' to '.$data['jenis_kelamin'].';';
			if ($data['status_kawin'] != $res[0]['status_kawin'])
				$keterangan .= ' changed status kawin from '.$res[0]['status_kawin'].' to '.$data['status_kawin'].';';
			if ($data['tempat_lahir'] != $res[0]['tempat_lahir'])
				$keterangan .= ' changed tempat lahir from '.$res[0]['tempat_lahir'].' to '.$data['tempat_lahir'].';';
			//$data['tanggal_lahir'] = $this->input->post('thn_lahir')."-".$this->input->post('bln_lahir')."-".$this->input->post('tgl_lahir');
			if ($data['tanggal_lahir'] != $res[0]['tanggal_lahir'])
				$keterangan .= ' changed tanggal lahir from '.$res[0]['tanggal_lahir'].' to '.$data['tanggal_lahir'].';';
			if ($data['agama'] != $res[0]['agama'])
				$keterangan .= ' changed agama from '.$res[0]['agama'].' to '.$data['agama'].';';
			if ($data['namaibukandung'] != $res[0]['namaibukandung'])
				$keterangan .= ' changed nama ibu kandung from '.$res[0]['namaibukandung'].' to '.$data['namaibukandung'].';';
			if ($data['alamat'] != $res[0]['alamat'])
				$keterangan .= ' changed alamat from '.$res[0]['alamat'].' to '.$data['alamat'].';';
			if ($data['kota'] != $res[0]['kota'])
				$keterangan .= ' changed kota from '.$res[0]['kota'].' to '.$data['kota'].';';
			if ($data['kodepos'] != $res[0]['kodepos'])
				$keterangan .= ' changed kode pos from '.$res[0]['kodepos'].' to '.$data['kodepos'].';';
			if ($data['telp'] != $res[0]['telp'])
				$keterangan .= ' changed telepon from '.$res[0]['telp'].' to '.$data['telp'].';';
			if ($data['hp'] != $res[0]['hp'])
				$keterangan .= ' changed mobile number from '.$res[0]['hp'].' to '.$data['hp'].';';
			if ($data['fax'] != $res[0]['fax'])
				$keterangan .= ' changed faks from '.$res[0]['fax'].' to '.$data['fax'].';';
			if ($data['email'] != $res[0]['email'])
				$keterangan .= ' changed email from '.$res[0]['email'].' to '.$data['email'].';';
			//$data['pend_terakhir'] = $this->input->post('pendidikan');
			if ($data['pend_terakhir'] != $res[0]['pend_terakhir'])
				$keterangan .= ' changed pendidikan terakhir from '.$res[0]['pend_terakhir'].' to '.$data['pend_terakhir'].';';
			if ($data['pend_th_masuk'] != $res[0]['pend_th_masuk'])
				$keterangan .= ' changed tahun masuk pendidikan from '.$res[0]['pend_th_masuk'].' to '.$data['pend_th_masuk'].';';
			if ($data['pend_th_lulus'] != $res[0]['pend_th_lulus'])
				$keterangan .= ' changed tahun lulus pendidikan from '.$res[0]['pend_th_lulus'].' to '.$data['pend_th_lulus'].';';
			if ($data['pend_prodi'] != $res[0]['pend_prodi'])
				$keterangan .= ' changed program studi pendidikan from '.$res[0]['pend_prodi'].' to '.$data['pend_prodi'].';';
			if ($data['pend_tempat_studi'] != $res[0]['pend_tempat_studi'])
				$keterangan .= ' changed institusi pendidikan from '.$res[0]['pend_tempat_studi'].' to '.$data['pend_tempat_studi'].';';
			if ($data['bidang_ajar'] != $res[0]['bidang_ajar'])
				$keterangan .= ' changed bidang ajar from '.$res[0]['bidang_ajar'].' to '.$data['bidang_ajar'].';';
			if ($data['rencana_ajar'] != $res[0]['rencana_ajar'])
				$keterangan .= ' changed rencana ajar from '.$res[0]['rencana_ajar'].' to '.$data['rencana_ajar'].';';
			if ($data['institusi_id'] != $res[0]['institusi_id'])
				$keterangan .= ' changed institusi from '.$res[0]['institusi_id'].' to '.$data['institusi_id'].';';
			if ($data['tahun_ajaran'] != $res[0]['tahun_ajaran'])
				$keterangan .= ' changed tahun ajaran from '.$res[0]['tahun_ajaran'].' to '.$data['tahun_ajaran'].';';
			if ($data['kd_ict'] != $res[0]['kd_ict'])
				$keterangan .= ' changed ICT from '.$res[0]['kd_ict'].' to '.$data['kd_ict'].';';
			if ($data['kelompok'] != $res[0]['kelompok'])
				$keterangan .= ' changed kelompok from '.$res[0]['kelompok'].' to '.$data['kelompok'].';';
			if ($data['pembayaran'] != $res[0]['pembayaran'])
				$keterangan .= ' changed pembayaran from '.$res[0]['pembayaran'].' to '.$data['pembayaran'].';';
			if ($data['beasiswa'] != $res[0]['beasiswa'])
				$keterangan .= ' changed beasiswa from '.$res[0]['beasiswa'].' to '.$data['beasiswa'].';';
			if ($data['alasan_beasiswa'] != $res[0]['alasan_beasiswa'])
				$keterangan .= ' changed alasan beasiswa from '.$res[0]['alasan_beasiswa'].' to '.$data['alasan_beasiswa'].';';
		}
		
		$this->db->where('username', $data['username'])->update('cl_mhs', $data);
		
		//callback
		$query = $this->db->where('username', $data['username'])->get('cl_mhs', 1, 0);
		if ($query->num_rows() > 0) {
			$res = $query->result_array();
			//masukkan dalam record
			$data1['cl_mhs_id'] = $res[0]['id'];
			$data1['user_id'] = $this->session->userdata('user_id');
			$data1['keterangan'] = $this->session->userdata('user_name')." updated record #".$res[0]['id']." : ".$keterangan;
			$this->db->insert('cl_mhs_records', $data1);
			return $res;
		}
	}
	
	public function updatebyid($data) {
		$this->db->where('id', $data['id'])->update('cl_mhs', $data);
	}

	public function delete($userid) {
		$this->db->delete('cl_mhs', array("username" => $userid));
	}
	
	public function gen_username($first, $last = "", $date) {
		$uname = preg_replace("/[^A-Za-z0-9 ]/", '', strtolower($first).substr(strtolower($last), 0, 1).date("dm", strtotime($date)));
		return preg_replace("/\s+/", '', $uname);
	}

	public function getdocument($userid){
		$query = $this->db->where('username', $userid)->get('cl_mh_itm');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function upload($data){
		$this->db->insert('cl_mh_itm', $data);
	}

	public function deletedocument($userid, $docid){
		$query = $this->db->where(array('username' => $userid, 'id' => $docid))->get('cl_mh_itm', 1, 0);

		if ($query->num_rows() > 0) {
			$data = $query->result_array();
			$this->db->delete('cl_mh_itm', array("id" => $docid, "username" => $userid));

			return $data;
		}
		else
			return 0;
	}

	public function deletedocumentall($userid){
		$query = $this->db->where('username', $userid)->get('cl_mh_itm');

		if ($query->num_rows() > 0) {
			$data = $query->result_array();
			$this->db->delete('cl_mh_itm', array("username" => $userid));

			return $data;
		}
		else
			return 0;
	}

	public function list_pend_akhir(){
		$list = array("Lulus SMA / Sederajat", "Lulus Diploma 1", "Lulus Diploma 2", "Lulus Diploma 3", "Lulus Sarjana", "Lulus S2 / Lebih tinggi", "Pernah Kuliah");
		return $list;
	}

	public function list_agama(){
		$list = array("Kristen", "Katolik", "Islam", "Hindu", "Buddha", "Khonghucu");
		return $list;
	}

	public function verify_user($username, $password){
		$query = $this->db->where(array('username' => $username, 'password' => md5($password)))->get('cl_mhs', 1, 0);

		if ($query->num_rows() > 0)
			return $query->row();
		else
			return false;
	}

}
