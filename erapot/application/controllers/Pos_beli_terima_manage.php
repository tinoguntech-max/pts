<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pos_beli_terima_manage extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in')) redirect('login');
		$this->cname = 'pos_beli_terima_manage';
		$this->load->model('access_group_detil_model');
		$res = $this->access_group_detil_model->getbynama($this->session->userdata('user_level'),$this->cname.'_manage');
		if ($res == 0) redirect('dashboard');
		
		$this->load->library(array('pagination','grocery_CRUD'));
		$this->lang->load('common', $this->session->userdata('user_language'));
		// $this->lang->load('pos_beli_terima', $this->session->userdata('user_language'));
	}
	
	
	public function index($error = NULL, $detil = NULL) {
		
		//$this->load->model('m_cabang_model');
		//$data['m_cabang'] = json_encode($this->m_cabang_model->getallwithout0());
		
		//if (!is_null($error) && !is_null($detil)) {
		//	$data['error'] = $error;
		//	$data['detil'] = $detil;
		//}
		
		//$this->load->helper('stock_avg_helper');
		
		$data['js_files'] = array(base_url('js/knockout.js'),
			base_url('js/knockout-sortable.js'),
			base_url('js/knockout.validation.js'),
			base_url('js/parsley/parsley.min.js'),
			base_url('js/select2/js/select2.full.min.js'),
			base_url('semantic/components/checkbox.min.js'),
			base_url('semantic/components/dropdown.min.js'),
			base_url('js/tinymce/tinymce.min.js'),
			base_url('js/bootstrap-datepicker/js/bootstrap-datepicker.js'),
			base_url('js/moment/moment.min.js'),
			base_url('js/tinymce/jquery.tinymce.min.js'));
		$data['css_files'] = array(base_url('css/parsley/parsley.css'),
			base_url('semantic/components/checkbox.min.css'),
			base_url('semantic/components/dropdown.min.css'),			
			base_url('semantic/components/statistic.min.css'),
			base_url('js/select2/css/select2.min.css'),
			base_url('css/parsley/parsley.css'),
			base_url('js/bootstrap-datepicker/css/datepicker.css'),
			base_url('js/select2/css/select2-bootstrap.min.css'),
			base_url('semantic/standalone/card/card.min.css'),
			base_url('semantic/standalone/image/image.min.css'));
		$this->load->helper('plugins_helper');

		//options view
		$data['viewoptions']['action'] = "add";
		$data['viewoptions']['type'] = "table";
		$data['viewoptions']['section'] = "pos";
		$data['viewoptions']['page'] = "pos_beli_terima_manage";
		$data['viewoptions']['pageinfo'] = "Pembayaran";
		$data['viewoptions']['content'] = "pembelian/pos_beli_terima_manage";
		$data['viewoptions']['script'] = "pembelian/pos_beli_terima_manage_script";
		
		$this->writehtml1($data);
	}
	
	public function add() {
		
		$this->load->model('general_model');
		$this->load->model('users_model');
		$this->load->model('barang_model');
		$this->load->model('pos_beli_terima_model');
        $this->load->model('pos_beli_terima_detil_model');
        $this->load->model('barang_harga_beli_model');
		$this->load->model('barang_satuan_model');
		$cabang = $this->users_model->get($this->session->userdata('user_id'));
		
		$organizers = json_decode($this->input->post('organizers'));
		//var_dump($organizers);exit;
		$all = json_decode($this->input->post('summary'));
		$tanggal = date('Y-m-d');
		if (!isset($all->supplier_nama)) $all->supplier_nama = '';
		if (!isset($all->supplier_telp)) $all->supplier_telp = '';
		if (!isset($all->keterangan)) $all->keterangan = '';;
		
		$no_faktur = noGenerator('INV', date('Y-m-d'), 'INV', $cabang[0]['id_m_cabang']);
		$toro_insert = array(
				"id_m_cabang" => $cabang[0]['id_m_cabang'],
				"id_supplier" => $all->supplier_i,
				"keterangan" => $all->keterangan ,
				"no_faktur" => $no_faktur,
				"tanggal_buat" => date('Y-m-d H:i:s'),
				"created" => date('Y-m-d H:i:s'),
				"created_id" => $this->session->userdata('user_id'),
				"updated_id" => $this->session->userdata('user_id'),
			);
		$toro = $this->pos_beli_terima_model->add($toro_insert);
			
		//masukkan corganizers
		$total = 0;
		$bayar = 0;
		$sisa = 0;

		$organizers = json_decode($this->input->post('organizers'));

		foreach ($organizers as $thor => $value) {
			if ($value->barang_i != '' && $value->isChecked ==  true) {
				if($value->barang_i == null || $value->barang_i == '' || !isset($value->barang_i)) $value->barang_i = 'JANUARI';
				$total += floatval($val[0]['harga']);
				$bayar += floatval($value->pos_harga);
				$check_sisa = $this->pos_beli_terima_detil_model->getsumsisabybarangandbulanspp('SPP', $value->barang_i, $all->sup_kelas_i, $all->supplier_i);
				if($check_sisa[0]['bayu'] != 0 && $check_sisa[0]['bayu'] != null){
					$sisa_angsuran = $check_sisa[0]['bayu'];
					$id = $this->pos_beli_terima_detil_model->getlastbybarangandbulan('SPP', $value->barang_i, $all->sup_kelas_i, $all->supplier_i);
					$id_rujukan = $id[0]['id_pos_beli_terima'];
				}
				else{
					$sisa_angsuran = floatval($val[0]['harga']);
					$id_rujukan = 0;
				}
				$sisa +=  $sisa_angsuran - floatval($value->pos_harga);
				$kokmines = $sisa_angsuran - floatval($value->pos_harga);
				
				$toro_insert = array (
					"id_pos_beli_terima" => $toro,
					"id_barang" => 'SPP',
					"bulan" => $value->barang_i,
					"harga" => floatval($val[0]['harga']),
					"sisa" => $kokmines,
					"bayar" => floatval($value->pos_harga),
					"id_rujukan" => $id_rujukan,
					"note" => $id_rujukan."//".$val[0]['harga']."//".$sisa_angsuran."//".floatval($value->pos_harga),
				);
				$this->pos_beli_terima_detil_model->add($toro_insert);	
				
				if($check_sisa[0]['bayu'] != 0  ||  $check_sisa[0]['bayu'] != null){
					$toro_update = array (
						"id_pos_beli_terima" => $id_rujukan,
						"id_barang" => $value->barang_i,
						"bulan" => $value->selectedBulan,
						"sisa" => 0
					);
					$this->pos_beli_terima_detil_model->updatesisa($toro_update);
				}
			}
		}


		$organizerslain = json_decode($this->input->post('organizerslain'));
		//var_dump($organizerslain);exit;
		foreach ($organizerslain as $thor => $value) {
			if ($value->barang_ilain != '' && $value->isCheckedlain ==  true ) {
				$val = $this->barang_harga_beli_model->getbybarangandkelas($value->barang_ilain, $all->sup_kelas_i);
				if ($val == 0)
					$val = $this->barang_model->get($value->barang_ilain); 
				if ($val != 0) {
					if($value->selectedBulanlain == null || $value->selectedBulanlain == '' || !isset($value->selectedBulanlain)) $value->selectedBulanlain = 'JANUARI';
					$total += floatval($val[0]['harga']);
					$bayar += floatval($value->pos_hargalain);
					$check_sisa = $this->pos_beli_terima_detil_model->getsumsisabybarangandbulanspp($value->barang_ilain, $value->selectedBulanlain, $all->sup_kelas_i, $all->supplier_i);
					if($check_sisa[0]['bayu'] != 0 && $check_sisa[0]['bayu'] != null){
						$sisa_angsuran = $check_sisa[0]['bayu'];
						$id = $this->pos_beli_terima_detil_model->getbysuppliertahunlain($all->supplier_i, $value->barang_ilain , '2020');
						$id_rujukan = $id[0]['id_pos_beli_terima'];
						$toro_update= array (
							"id_pos_beli_terima" => $id[0]['id_pos_beli_terima'],
							"sisa" =>0,
						);
						$update = $this->pos_beli_terima_detil_model->update($toro_update);
					}
					else{
						$sisa_angsuran = floatval($val[0]['harga']);
						$id_rujukan = 0;
					}
					$sisa +=  $sisa_angsuran - floatval($value->pos_hargalain);
					$kokmines = $sisa_angsuran - floatval($value->pos_hargalain);
			

					$toro_insert = array (
						"id_pos_beli_terima" => $toro,
						"id_barang" => $value->barang_ilain,
						"bulan" => $value->selectedBulanlain,
						"harga" => floatval($val[0]['harga']),
						"sisa" => $kokmines,
						"bayar" => floatval($value->pos_hargalain),
						"id_rujukan" => $id_rujukan,
						"note" => $id_rujukan."//".$val[0]['harga']."//".floatval($value->pos_hargalain)."//".$sisa_angsuran,
					);
					$this->pos_beli_terima_detil_model->add($toro_insert);	
					
					if($check_sisa[0]['bayu'] != 0  ||  $check_sisa[0]['bayu'] != null){
						$toro_update = array (
							"id_pos_beli_terima" => $id_rujukan,
							"id_barang" => $value->barang_ilain,
							"bulan" => $value->selectedBulanlain,
							"sisa" => 0
						);
						$this->pos_beli_terima_detil_model->updatesisa($toro_update);
					}
				}
			}
		}
		
		// update total di master
		$toro_update1 = array(
			"id" => $toro,
			"bayar" => $bayar,
			"total" => $total,
			"sisa" => $sisa
		);
		$this->pos_beli_terima_model->update($toro_update1);
			
		redirect('pos_beli_terima_manage');
		
	}
	
	
	public function detils($id = NULL){
		if ($id == NULL || $id == '') redirect('pos_beli_terima_manage');
		$id = base64_decode($id);
		
		$this->load->model('pos_beli_terima_model');
		// checking
		$res = $this->pos_beli_terima_model->get($id);
		if ($res == 0) {
			redirect('error_badrequest');
		}
		$data['detil'] = $res;
		$this->load->model('pos_beli_terima_detil_model');
		$this->load->model('satuan_model');
		$this->load->model('barang_satuan_model');
		$data['satuan'] = $this->satuan_model->getall();
		$res = $this->pos_beli_terima_detil_model->getbypos($id);
		$data['detils'] = $res;
		$data['primary'] = $id;
		
		$this->load->helper('supplier_helper');
		$this->load->helper('barang_helper');
		$this->load->helper('m_cabang_helper');
		
		//variable
		$this->load->model('general_model');
		$res = $this->general_model->getnama('nama_lengkap');
		$data['toro']['nama_lengkap'] = $res[0]['nilai'];
		$res = $this->general_model->getnama('alamat_baris1');
		$data['toro']['alamat_baris1'] = $res[0]['nilai'];
		$res = $this->general_model->getnama('alamat_baris2');
		$data['toro']['alamat_baris2'] = $res[0]['nilai'];
		$res = $this->general_model->getnama('alamat_baris3');
		$data['toro']['alamat_baris3'] = $res[0]['nilai'];
		$res = $this->general_model->getnama('contact_telepon');
		$data['toro']['contact_telepon'] = $res[0]['nilai'];
		$res = $this->general_model->getnama('company_logo');
		$data['toro']['company_logo'] = $res[0]['nilai'];
		
		// ambil template
		$this->load->model('general_template_model');
		$res = $this->general_template_model->getnama('pos_beli_terima');
		$template = $res[0]['nilai'];
		$template = str_replace('{{LOGO}}', '<img src="'.base_url().'img/'.$data['toro']['company_logo'].'" alt=""/>', $template);
		$template = str_replace('{{BARCODE}}', '<svg id="toro-barcode"></svg>', $template);
		$template = str_replace('{{FULL_NAME}}', get_data('m_cabang','id',$data['detil'][0]['id_m_cabang'],'nama'), $template);
		$template = str_replace('{{ADDRESS1}}', get_data('m_cabang','id',$data['detil'][0]['id_m_cabang'],'alamat'), $template);
		$template = str_replace('{{ADDRESS2}}', '  ', $template);
		$template = str_replace('{{ADDRESS3}}', '  ', $template);
		$template = str_replace('{{CONTACT}}', get_data('m_cabang','id',$data['detil'][0]['id_m_cabang'],'no_telp'), $template);
		$template = str_replace('{{BRANCH}}', get_data('m_cabang','id',$data['detil'][0]['id_m_cabang'],'nama'), $template);
		$template = str_replace('{{SUPPLIER_ID}}', 'KEPADA<br/>'.get_supplier($data['detil'][0]['id_supplier']), $template);
		$template = str_replace('{{SUPPLIER}}', '<br/>'.get_data('supplier','id',$data['detil'][0]['id_supplier'],'nik'), $template);
		$template = str_replace('{{SUPPLIER_ALAMAT}}','<br/>'.get_supplier_alamat($data['detil'][0]['id_supplier']), $template);
		$template = str_replace('{{SUPPLIER_TELP}}','<br/>P:'.get_supplier_telp($data['detil'][0]['id_supplier']), $template);
		$template = str_replace('{{NO_AUTO}}', $data['detil'][0]['no_faktur'], $template);
		$template = str_replace('{{DATE}}', $data['detil'][0]['tanggal_buat'], $template);
		$template = str_replace('{{DATE_NEEDED}}', $data['detil'][0]['tanggal_diperlukan'], $template);
		$template = str_replace('{{DESCRIPTION}}', $data['detil'][0]['keterangan'], $template);
		$template = str_replace('{{TABLE_TOP}}', 
							'<table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>JENIS PEMBAYARAN</th>
                                <th>TIPE PEMBAYARAN</th>
                                <th>BULAN</th>
                                <th>TOTAL</th>
                            </tr>
                            </thead>
                            <tbody>', $template);
		$detils = '';
		$no = 0;
		$total = 0;
		if (is_array($data['detils'])) {
			foreach ($data['detils'] as $value) {
				$no++;
				$total+=$value['bayar'];
				$tipe = get_data('barang', 'id', $value['id_barang'], 'tipe_barang');
				if($tipe == 1){
					$tipe = $value['bulan'];
					$tipe_b = "Mounthly";
				}
				else{
					$tipe = "-";
					$tipe_b = "Annual";
				}				
				$detils .= '<tr id="t-'.$no.'">
						<td id="t0-'.$no.'">'.$no.'</td>
						<td id="t1-'.$no.'">'.$value['id_barang'].'</td>
						<td id="t2-'.$no.'">'.$tipe_b.'</td>
						<td id="t5-'.$no.'">'.$tipe.'</td>
						<td id="t6-'.$no.'">'.number_format($value['bayar'],0).'</td>
					</tr>';
			}
		}
		$template = str_replace('{{TABLE_BTM}}', 
							'</tbody>
								</table>', $template);
		$template = str_replace('{{TABLE_CONTENT}}', $detils, $template);
		$template = str_replace('{{NO_OF_TYPE}}', $no, $template);
		$template = str_replace('{{TOTAL}}', 'IDR&nbsp;&nbsp;&nbsp; '.number_format($total,0), $template);
		
		$data['content'] = $template;

		//options view
		$data['viewoptions']['action'] = "view";
		$data['viewoptions']['type'] = "table";
		$data['viewoptions']['section'] = "pos";
		$data['viewoptions']['page'] = "pos_beli_terima_manage";
		$data['viewoptions']['pageinfo'] = "View Pembayaran";
		$data['viewoptions']['content'] = "pembelian/beli_minta_print";
		//$data['viewoptions']['script'] = "pembelian/beli_minta_script";
		
		$this->writehtml1($data);
	}
	
	public function ajax_detil() {
		if (!isset($_GET['q'])) exit;
		$q = base64_decode($_GET['q']);
		$this->load->model('pos_beli_terima_model');
		$this->load->model('pos_beli_terima_detil_model');
		$this->load->model('supplier_model');
		$this->load->model('barang_model');
		$res = $this->pos_beli_terima_model->get($q);
		$res1 = $this->supplier_model->get($res[0]['id_supplier']);
		$temps = '<div class="row-fluid">
				<div class="col-md-12">
					<dl class="dl-horizontal">
						<dt>Murid</dt>
						<dd>'.$res1[0]['nama'].'</dd>
						<dt>Invoice Number</dt>
						<dd>'.$res[0]['no_faktur'].'</dd>
						<dt>Tanggal Pembuatan</dt>
						<dd>'.$res[0]['tanggal_buat'].'</dd>
						<dt>Keterangan</dt>
						<dd>'.$res[0]['keterangan'].'</dd>
					</dl>
				</div>
			</div>
			<div class="row-fluid">
				<div class="col-md-12">
					<table class="table table-striped table-hover" id="toro">
						<thead>
							<tr>
								<th>No</th>
								<th>Jenis Pembayaran</th>
								<th>Tipe Pembayaran</th>
								<th>Bulan</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>';
		$res = $this->pos_beli_terima_detil_model->getbypos($q);
		$i = 0;
		if ($res != 0) {
			foreach ($res as $key => $value) {
				$i++;
				$tipe = get_data('barang', 'id', $value['id_barang'], 'tipe_barang');
				if($tipe == 1){
					$tipe = $value['bulan'];
					$tipe_b = "Mounthly";
				}
				else{
					$tipe = "-";
					$tipe_b = "Annual";
				}
				$temps .= '
					<tr>
						<td>'.($i).'</td>
						<td>'.get_data('barang', 'id', $value['id_barang'], 'nama').'</td>
						<td>'.$tipe_b.'</td>
						<td>'.$tipe.'</td>
						<td>'.number_format($value['bayar'],0).'</td>
					</tr>';
			}
		}
		$temps .= '
						</tbody>
					</table>
				</div>
			</div>';
		echo $temps;
	}
	
	public function canceled($id = NULL){
		if ($id == NULL || $id == '') redirect('error_badrequest');
		$id = base64_decode($id);
		if (!isset($_POST['password']) || !isset($_POST['keterangan'])) redirect('error_badrequest');
		if ($_POST['keterangan'] == '' || $_POST['keterangan'] == NULL) redirect('error_badrequest');
		
		
		$this->load->model('pos_beli_terima_model');
		$this->load->model('pos_beli_terima_detil_model');
		$this->load->model('users_model');
		
		$res = $this->pos_beli_terima_model->get($id);
		if ($res == 0) {
			redirect('error_badrequest');
		}
		else {
			$cname = $this->cname;
			$res1 = $this->access_group_detil_model->getbynama($this->session->userdata('user_level'),$cname.'_delete');
			if ($res1 == 0)
				redirect('error_badrequest');
			if ($res[0]['status'] != 0)
				redirect('error_badrequest');
		}
		
		$users = $this->users_model->get($this->session->userdata('user_id'));
		$res2 = $this->users_model->verify_user($this->session->userdata('user_name'), $this->input->post('password'));
		if (password_verify($this->input->post('password'), $users[0]['user_pass'])) {
			$detil = $this->pos_beli_terima_detil_model->getbypos($id);
			$sisa = array();
			$i = 0;
			if ($detil != 0) {
				foreach ($detil as $key => $value) {
					$last_data = $this->pos_beli_terima_detil_model->getbysuppliertahunlain($res[0]['id_supplier'], $value['id_barang'] , '2020');
					$sisa[$i]['id_barang'] = $last_data[0]['id_barang'];
					$sisa[$i]['tahun'] = $last_data[0]['tahun'];
					$sisa[$i]['sisa'] = $last_data[0]['sisa'];
					$i++;					
				}
			}	
			$this->pos_beli_terima_detil_model->delete($id);	
			$toro_update = array(
				"id" => $id,
				"status" => 3,
				"forced_id" => $this->session->userdata('user_id'),
				"forced_keterangan" => $_POST['keterangan'],
				"forced_date" => date('Y-m-d H:i:s'),
			);
			$this->pos_beli_terima_model->update($toro_update);
			
			if ($detil != 0) {
				foreach ($detil as $key => $value) {
					$sisaval = 0;					
					foreach ($sisa as $key => $values) {
						if($values['id_barang'] == $values['id_barang'])
						$sisaval =  $values['sisa'];			
					}					
					if($sisaval != 0){
						$last_data = $this->pos_beli_terima_detil_model->getbysuppliertahunlain($res[0]['id_supplier'], $value['id_barang'] , '2020');
						if($last_data != 0){
							$sisa = $sisaval + $value['bayar'];
							$note = $sisaval.'//delete\\'.$id.'-/\-'.$value['note'].'//delete\\';
			
							$toro_update = array (
								"id" => $last_data[0]['id'],
								"id_pos_beli_terima" => $last_data[0]['id_pos_beli_terima'],
								"id_barang" => $value['id_barang'],
								"bulan" => $value['bulan'],
								"sisa" => $sisa,
								"note" => $note,
							);
							$this->pos_beli_terima_detil_model->updatesisa($toro_update);
						}
					}
				}
			}
		}		
		redirect('pos_beli_terima_manage');
	}
	
	public function auto_supplier() {
		if (!isset($_GET['q'])) exit;
		$q = $_GET['q'];
		header("Content-Type: application/json");
		$this->load->model('supplier_model');
		$res = $this->supplier_model->get_autocomplete($q);
		if (!$res) {var_dump($res); exit;}
		foreach ($res as $toro => $value) {
			$row['value'] = $value['id'];
			$row['label'] = $value['nama'];
			$row['nik'] = $value['nik'];
			$row['alamat'] = $value['alamat'];
			$row['telp'] = $value['telp'];
			$arr[] = $row;
		}
		echo json_encode($arr);
	}
	
	public function auto_suppliercabang() {
		if (!isset($_GET['q']) || !isset($_GET['cabang'])) exit;
		$q = $_GET['q'];
		$cabang = $_GET['cabang'];
		header("Content-Type: application/json");
		$this->load->model('supplier_model');
		$this->load->model('barang_model');
		$this->load->model('pos_beli_terima_detil_model');
		$this->load->model('barang_harga_beli_model');
		$res = $this->supplier_model->get_autocompletecabang($q, $cabang);		
		if (!$res) {var_dump($res); exit;}
		foreach ($res as $toro => $value) {

			$perkelas = $this->barang_harga_beli_model->getbybarangandkelas('SPP', $value['id_m_kelas']);
			if($perkelas != 0){
				$hargaR = $perkelas[0]['harga'];
				$harga_rpD = number_format($perkelas[0]['harga'],0);
			}else{
				$val = $this->barang_model->get('SPP');
				$hargaR = $val[0]['harga'];
				$harga_rpD = number_format($val[0]['harga'],0);
			}

			$bulanan = array();
			$januari = $this->pos_beli_terima_detil_model->getbysupplierbulanandtahunspp($value['id'], 'JANUARI' , '2020');
			if ($januari[0]['bayar'] != 0){
				$status = 1; 
				$harga_rp = number_format($januari[0]['bayar'],0);
				$harga = 0; 
			} 
			else{ 
				$status = 0;
				$harga_rp = $harga_rpD; 
				$harga = $hargaR; 
			}
			$bulanan[0] = array( 'bulan' => 'JANUARI',   'harga' => $harga,   'harga_rp' => $harga_rp   , 'status' => $status);

			$februari = $this->pos_beli_terima_detil_model->getbysupplierbulanandtahunspp($value['id'], 'FEBRUARI' , '2020');
			if ($februari[0]['bayar'] != 0){
				$status = 1; 
				$harga_rp = number_format($februari[0]['bayar'],0); 
				$harga = 0; 
			} 
			else{ 
				$status = 0;
				$harga_rp = $harga_rpD; 
				$harga = $hargaR; 
			}
			$bulanan[1] = array( 'bulan' => 'FEBRUARI',  'harga' =>  $harga,   'harga_rp' => $harga_rp  , 'status' => $status);

			$maret = $this->pos_beli_terima_detil_model->getbysupplierbulanandtahunspp($value['id'], 'MARET' , '2020');
			if ($maret[0]['bayar'] != 0){
				$status = 1; 
				$harga_rp = number_format($maret[0]['bayar'],0); 
				$harga = 0; 
			} 
			else{ 
				$status = 0;
				$harga_rp = $harga_rpD; 
				$harga = $hargaR; 
			}
			$bulanan[2] = array( 'bulan' => 'MARET',  'harga' =>  $harga,   'harga_rp' => $harga_rp   , 'status' => $status);

			$april = $this->pos_beli_terima_detil_model->getbysupplierbulanandtahunspp($value['id'], 'APRIL' , '2020');
			if ($april[0]['bayar'] != 0){
				$status = 1; 
				$harga_rp = number_format($april[0]['bayar'],0); 
				$harga = 0; 
			} 
			else{ 
				$status = 0;
				$harga_rp = $harga_rpD; 
				$harga = $hargaR; 
			}
			$bulanan[3] = array( 'bulan' => 'APRIL',  'harga' =>  $harga,   'harga_rp' => $harga_rp   , 'status' => $status);

			$mei = $this->pos_beli_terima_detil_model->getbysupplierbulanandtahunspp($value['id'], 'MEI' , '2020');
			if ($mei[0]['bayar'] != 0){
				$status = 1; 
				$harga_rp = number_format($mei[0]['bayar'],0); 
				$harga = 0; 
			} 
			else{ 
				$status = 0;
				$harga_rp = $harga_rpD; 
				$harga = $hargaR; 
			}
			$bulanan[4] = array( 'bulan' => 'MEI',  'harga' =>  $harga,   'harga_rp' => $harga_rp   , 'status' => $status);

			$juni = $this->pos_beli_terima_detil_model->getbysupplierbulanandtahunspp($value['id'], 'JUNI' , '2020');
			if ($juni[0]['bayar'] != 0){
				$status = 1; 
				$harga_rp = number_format($juni[0]['bayar'],0); 
				$harga = 0; 
			} 
			else{ 
				$status = 0;
				$harga_rp = $harga_rpD; 
				$harga = $hargaR; 
			}
			$bulanan[5] = array( 'bulan' => 'JUNI',  'harga' =>  $harga,   'harga_rp' => $harga_rp   , 'status' => $status);

			$juli = $this->pos_beli_terima_detil_model->getbysupplierbulanandtahunspp($value['id'], 'JULI' , '2020');
			if ($juli[0]['bayar'] != 0){
				$status = 1; 
				$harga_rp = number_format($juli[0]['bayar'],0); 
				$harga = 0; 
			} 
			else{ 
				$status = 0;
				$harga_rp = $harga_rpD; 
				$harga = $hargaR; 
			}
			$bulanan[6] = array( 'bulan' => 'JULI',  'harga' =>  $harga,  'harga_rp' => $harga_rp  , 'status' => $status);

			$agustus = $this->pos_beli_terima_detil_model->getbysupplierbulanandtahunspp($value['id'], 'AGUSTUS' , '2020');
			if ($agustus[0]['bayar'] != 0){
				$status = 1; 
				$harga_rp = number_format($agustus[0]['bayar'],0); 
				$harga = 0; 
			} 
			else{ 
				$status = 0;
				$harga_rp = $harga_rpD; 
				$harga = $hargaR; 
			}
			$bulanan[7] = array( 'bulan' => 'AGUSTUS',  'harga' =>  $harga,   'harga_rp' => $harga_rp   , 'status' => $status);

			$september = $this->pos_beli_terima_detil_model->getbysupplierbulanandtahunspp($value['id'], 'SEPEMBER' , '2020');
			if ($september[0]['bayar'] != 0){
				$status = 1; 
				$harga_rp = number_format($september[0]['bayar'],0); 
				$harga = 0; 
			} 
			else{ 
				$status = 0;
				$harga_rp = $harga_rpD; 
				$harga = $hargaR; 
			}
			$bulanan[8] = array( 'bulan' => 'SEPEMBER',  'harga' =>  $harga,   'harga_rp' => $harga_rp   , 'status' => $status);

			$oktober = $this->pos_beli_terima_detil_model->getbysupplierbulanandtahunspp($value['id'], 'OKTOBER' , '2020');
			if ($oktober[0]['bayar'] != 0){
				$status = 1; 
				$harga_rp = number_format($oktober[0]['bayar'],0); 
				$harga = 0; 
			} 
			else{ 
				$status = 0;
				$harga_rp = $harga_rpD; 
				$harga = $hargaR; 
			}
			$bulanan[9] = array( 'bulan' => 'OKTOBER',  'harga' =>  $harga,   'harga_rp' => $harga_rp  , 'status' => $status);

			$november = $this->pos_beli_terima_detil_model->getbysupplierbulanandtahunspp($value['id'], 'NOVEMBER' , '2020');
			if ($november[0]['bayar'] != 0){
				$status = 1; 
				$harga_rp = number_format($november[0]['bayar'],0); 
				$harga = 0; 
			} 
			else{ 
				$status = 0;
				$harga_rp = $harga_rpD; 
				$harga = $hargaR; 
			}
			$bulanan[10] = array( 'bulan' => 'NOVEMBER',  'harga' =>  $harga,   'harga_rp' => $harga_rp   , 'status' => $status);

			$desember = $this->pos_beli_terima_detil_model->getbysupplierbulanandtahunspp($value['id'], 'DESEMBER' , '2020');
			if ($desember[0]['bayar'] != 0){
				$status = 1; 
				$harga_rp = number_format($desember[0]['bayar'],0); 
				$harga = 0; 
			} 
			else{ 
				$status = 0;
				$harga_rp = $harga_rpD; 
				$harga = $hargaR; 
			}
			$bulanan[11] = array( 'bulan' => 'DESEMBER',  'harga' =>  $harga,   'harga_rp' => $harga_rp   , 'status' => $status);

			$row['bulanan'] = $bulanan;

			$lainlain = array();
			$no = 0;
			$resbarang = $this->barang_model->getallbarangwip();
			foreach ($resbarang as $thor => $values) {
				$perkelas = $this->barang_harga_beli_model->getbybarangandkelas($values['id'], $value['id_m_kelas']);
				if($perkelas != 0){
					$hargaR = $perkelas[0]['harga'];
					$harga_rpD = number_format($perkelas[0]['harga'],0);
				}else{
					$val = $this->barang_model->get($values['id']);
					$hargaR = $val[0]['harga'];
					$harga_rpD = number_format($val[0]['harga'],0);
				}
				$bayar = $this->pos_beli_terima_detil_model->getbysuppliertahunlain($value['id'], $values['id'] , '2020');
				if ($bayar[0]['bayar'] != 0){						
					$status = 1; 
					$harga_rp = number_format($bayar[0]['bayar'],0); 
					$harga = 0;  
					if ($bayar[0]['sisa'] != 0){
						$status = 0;
						$harga =  $bayar[0]['sisa'];
					}
				} 
				else{ 
					$status = 0;
					$harga_rp = $harga_rpD; 
					$harga = $hargaR;
				}
				$lainlain[$no] = array( 'nama' => $values['nama'], 'harga' => $harga,   'harga_rp' => $harga_rp   , 'status' => $status, 'id' => $values['id']);
				$no++;
			}
			$row['lainlain'] = $lainlain;

			$row['listtunggakan'] = $this->pos_beli_terima_detil_model->getbyposandsupplier($value['id']);
			$row['value'] = $value['id'];
			$row['label'] = $value['nama'];
			$row['nik'] = $value['nik'];
			$row['alamat'] = $value['alamat'];
			$row['kelas_nama'] = 'Kelas '.get_data('m_kelas', 'id', $value['id_m_kelas'], 'nama');
			$row['kelas_id'] = $value['id_m_kelas'];
			$row['telp'] = $value['telp'];
			$arr[] = $row;
		}
		echo json_encode($arr);
	}
	
	public function auto_barang() {
		if (!isset($_GET['q'])) exit;
		$q = $_GET['q'];
		header("Content-Type: application/json");
		$this->load->model('barang_model');
		$this->load->model('barang_satuan_model');
		$this->load->model('satuan_model');
		$this->load->model('users_model');
		$cabang = $this->users_model->get($this->session->userdata('user_id'));
		$cabang_id = $cabang[0]['id_m_cabang'];
		$res = $this->barang_model->get_autocomplete($q);
		if (!$res) exit;
		foreach ($res as $toro => $value) {
			$temps = '';
			$row['value'] = $value['id'];
			$row['label'] = $value['nama']." (".$value['id'].")".$temps;
			$row['harga'] = $value['harga_beli'];
			$row['tipe'] = $value['tipe_barang'];
			$row['label1'] = $value['nama'];
			$res1 = $this->satuan_model->get($value['id_satuan']);
			$row['satuan'] = '';
			$arr[] = $row;
		}
		echo json_encode($arr);
	}
	
	public function auto_barangcabanglist() {
		if (!isset($_GET['q']) || !isset($_GET['cabang'])) exit;
		$q = $_GET['q'];
		$cabang = $_GET['cabang'];
		header("Content-Type: application/json");
		$this->load->model('barang_model');
		$this->load->model('barang_harga_beli_model');
		$this->load->model('users_model');
		$res = $this->barang_model->get_autocompletecabanglist($q, $cabang);
		if (!$res) exit;
		foreach ($res as $toro => $value) {
			$val = $this->barang_harga_beli_model->getbybarangandcabang($value['id'], $cabang);
			$temps = '';
			$row['value'] = $value['id'];
			$row['label'] = $value['nama']." (".$value['id'].")".$temps;
			$row['harga'] = $val[0]['harga'];
			$row['tipe'] = $value['tipe_barang'];
			$row['label1'] = $value['nama'];
			$row['satuan'] = '';
			$arr[] = $row;
		}
		echo json_encode($arr);
	}
	
	public function auto_barang_single() {
		if (!isset($_GET['q'])) exit;
		$q = $_GET['q'];
		header("Content-Type: application/json");
		$this->load->model('barang_model');
		$this->load->model('barang_satuan_model');
		$this->load->model('satuan_model');
		$this->load->model('users_model');
		$cabang = $this->users_model->get($this->session->userdata('user_id'));
		$cabang_id = $cabang[0]['id_m_cabang'];
		$res = $this->barang_model->get($q);
		if (!$res) exit;
		foreach ($res as $toro => $value) {
			$temps = '';
			$row['value'] = $value['id'];
			$row['label'] = $value['nama']." (".$value['id'].")".$temps;
			$row['harga'] = $value['harga_beli'];
			$row['label1'] = $value['nama'];
			$res1 = $this->satuan_model->get($value['id_satuan']);
			$row['satuan'] = '';
			$row['satuanList'] = array();
			if ($res1 != 0){
				$row['satuan'] = $res1[0]['nama'];				
				$satuanList = $this->barang_satuan_model->getbybarang($value['id']);
				$arraySatuan = array();
				if ($satuanList != 0) {
					$row['satuanList'] = $satuanList;
					array_unshift($row['satuanList'], array('id_barang'=>$value['id'], 'id_satuan1'=>$value['id_satuan'], 
						'id_satuan2'=>$value['id_satuan'], 'base'=>1, 'conversion'=>1, 'nama_satuan1'=>$row['satuan'], 'nama_satuan2'=>$row['satuan']));
				}
				else
					$row['satuanList'][0] = array('id_barang'=>$value['id'], 'id_satuan1'=>$value['id_satuan'], 
						'id_satuan2'=>$value['id_satuan'], 'base'=>1, 'conversion'=>1, 'nama_satuan1'=>$row['satuan'], 'nama_satuan2'=>$row['satuan']);
			}
			else{
				$row['satuan'] = '';
				$row['satuanList'] = '';
			}
		}
		echo json_encode($row);
	}
	
	private function writehtml($viewoptions,$output=null){
		//load view
		$loginas = $this->session->userdata('user_name');
		$output->loginas = $loginas;
		$this->load->view('header', $output);
		$this->load->view('sidebar-left', $output);
		$this->load->view('sidebar-nav', $output);
		$this->load->view($viewoptions['content'], $output);
		if (isset($viewoptions['script']))
			$this->load->view($viewoptions['script'], $output);
		$this->load->view('footer', $output);
	}
	
	private function writehtml1($data){
		//load view
		$data['loginas'] = $this->session->userdata('user_name');
		$this->load->view('header', $data);
		$this->load->view('sidebar-left', $data);
		$this->load->view('sidebar-nav', $data);
		$this->load->view($data['viewoptions']['content'], $data);
		$this->load->view('footer', $data);
		if (isset($data['viewoptions']['script']))
			$this->load->view($data['viewoptions']['script'], $data);
	}
}
