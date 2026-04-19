<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in')) redirect('login');
		include_once APPPATH . '/third_party/fpdf/fpdf.php';		
		$this->load->library(array('pagination','grocery_CRUD'));
		$this->lang->load('common', $this->session->userdata('user_language'));
		// $this->lang->load('laporan_produksi', $this->session->userdata('user_language'));
		// $this->lang->load('barang', $this->session->userdata('user_language'));
		// $this->lang->load('beli_bayar', $this->session->userdata('user_language'));
		// $this->lang->load('beli_invoice', $this->session->userdata('user_language'));
		// $this->lang->load('beli_minta', $this->session->userdata('user_language'));
		// $this->lang->load('beli_order', $this->session->userdata('user_language'));
	}
	
	public function index($id = NULL){
		redirect('error_badrequest');
		//options view
		$data['viewoptions']['type'] = "table";
		$data['viewoptions']['section'] = "pos";
		$data['viewoptions']['page'] = "laporan_pos";
		$data['viewoptions']['pageinfo'] = "Pos Report";
		$data['viewoptions']['content'] = "pos/pos";
		$data['viewoptions']['script'] = "pos/pos_script";
		
		$this->writehtml1($data);
	}
	
	public function laporan_bk_materi(){
		$this->load->model('kelas_model');
		
		$data['css_files'] = array (base_url('js/data-table/css/dataTables.bootstrap.min.css'),
			base_url('js/data-table/buttons/buttons.bootstrap.min.css'),
			base_url('js/data-table/colreorder/colReorder.bootstrap.min.css'),
			base_url('js/data-table/keytable/keyTable.bootstrap.min.css'),
			base_url('js/data-table/fixedheader/fixedHeader.bootstrap.min.css'),
			base_url('css/daterangepicker/daterangepicker.css'),
			base_url('css/bootstrap-multiselect/bootstrap-multiselect.css')
		);
		$data['js_files'] = array (base_url('js/data-table/js/jquery.dataTables.min.js'),
			base_url('js/data-table/js/dataTables.bootstrap.min.js'),
			base_url('js/data-table/buttons/dataTables.buttons.min.js'),
			base_url('js/data-table/buttons/buttons.bootstrap.min.js'),
			base_url('js/data-table/buttons/buttons.flash.min.js'),
			base_url('js/data-table/buttons/jszip.min.js'),
			base_url('js/data-table/buttons/pdfmake.min.js'),
			base_url('js/data-table/buttons/vfs_fonts.js'),
			base_url('js/data-table/buttons/buttons.html5.min.js'),
			base_url('js/data-table/buttons/buttons.print.min.js'),
			base_url('js/data-table/buttons/buttons.colVis.min.js'),
			base_url('js/data-table/colreorder/dataTables.colReorder.min.js'),
			base_url('js/data-table/keytable/dataTables.keyTable.min.js'),
			base_url('js/data-table/fixedheader/dataTables.fixedHeader.min.js'),
			base_url('js/daterangepicker/moment.min.js'),
			base_url('js/daterangepicker/daterangepicker.js'),
			base_url('js/bootstrap-multiselect/bootstrap-multiselect.js')
		);

		$data['kelas'] = $this->kelas_model->getall();

		//options view
		$data['viewoptions']['type'] = "table";
		$data['viewoptions']['section'] = "laporan_rapot";
		$data['viewoptions']['page'] = "laporan_bk_materi";
		$data['viewoptions']['pageinfo'] = "Laporan Rekap Materi";
		$data['viewoptions']['content'] = "laporan/bk_materi";
		$data['viewoptions']['script'] = "laporan/bk_materi_script";
		
		$this->writehtml1($data);
	}

	public function laporan_bk_materi_ajax($tgl1=null, $tgl2=null, $kelas=0) {
		
		$kelas_id = urldecode(str_replace("--", "", $kelas));
		if ($tgl1 == null || $tgl1 == '' || $tgl2 == null || $tgl2 == '') exit;
		if ($tgl1 > $tgl2) {
			$tanggal1 = $tgl2;
			$tanggal2 = $tgl1;
		}
		else {
			$tanggal1 = $tgl1;
			$tanggal2 = $tgl2;
		}
		$this->load->model('kelas_model');
		$this->load->model('materi_kelas_model');
		$this->load->model('materi_model');
		$this->load->model('siswa_model');
		$this->load->model('kelas_siswa_model');
		$this->load->model('materi_view_model');

		$data['kelas'] = $this->kelas_model->getbyid($kelas_id);

		$array = array();
		$i = 0;
		foreach ($data['kelas'] as $thor => $val_kelas) {
			$siswa = $this->kelas_siswa_model->getbykelas($val_kelas['id']);
			if($siswa != 0){
				foreach ($siswa as $thor => $val_siswa) {
					$array[$i]['siswa_id'] = $val_siswa['siswa_id'];
					$array[$i]['nama_kelas'] = $val_kelas['nama'];
					$array[$i]['kelas_id'] = $val_kelas['id'];
					$i++ ;
				}
			}			
		}

		$i = 0;
		$array1 = array();
		foreach ($array as $thor => $value) {
			$array1[$i]['siswa_id'] = $value['siswa_id'];
			$array1[$i]['detil'] = array();
			$ii = 0;
			$materi = $this->materi_kelas_model->getbykelas($value['kelas_id']);
			if($materi != 0){
				foreach ($materi as $thor => $val_materi) {
					$range = $this->materi_model->getbydateandid($tanggal1, $tanggal2, $val_materi['id']);
					if($range != 0){
						foreach ($range as $key => $val_range) {
							$nilai = $this->materi_view_model->getbymateriandsiswa($value['siswa_id'], $val_materi['id']);
							$array1[$i]['detil'][$ii]['materi_id'] = $val_materi['id'];
							if ($nilai != 0)
								$array1[$i]['detil'][$ii]['status'] = 'Sudah Melihat';
							else
								$array1[$i]['detil'][$ii]['status'] = 'Belum Melihat';

							$ii++;
						}
					}
				}
			}
			$i++;
		}
		$data['array1'] = $array1;
		$ary_value= $array1;

		$this->load->model('general_model');
		$res = $this->general_model->getnama('company_logo');
		$data['toro']['company_logo'] = $res[0]['nilai'];

		$toros = '<div class="panel invoice">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="invoice-logo">
                                    <img src="'.base_url().'img/'.$data['toro']['company_logo'].'" alt=""/>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <h2 class="text-center"><b>Laporan Rekap Materi</b></h2>
								<h2 class="text-center">'.get_data('el_kelas', 'id', $kelas, 'nama').'</h2>
                            </div>
                        </div>

                        <table class="table table-striped table-hover convert-data-table">
                            <thead>
                           
                            <tr>
								<th class="">NAMA SISWA</th>';
					$i = 0 ;
					$jumlah = count($ary_value[0]['detil']);
					foreach ($ary_value[0]['detil'] as $thorz => $value_detil) {
						$i++;
						$toros .= '	
							<th>'.$value_detil['materi_id'].' </th>';
						if ($i == $jumlah)
							break;
					}
                $toros .= '            </tr>
                            </thead>
                            <tbody>';

       

		
		$is = 0;
		foreach ($ary_value as $thorz => $value) {
			
			$toros .= '<tr>
					<td>'.get_data('el_siswa', 'id', $value['siswa_id'], 'nama').'</td>';
			$i= 0;
			$jumlah = count($value['detil']);
			foreach ($value['detil'] as $thorz => $value_detil) {
				$i++;
				if(empty($value_detil['status']))
				$toros .= '	
					<td> - </td>';
					else
				$toros .= '	
					<td>'.$value_detil['status'].'</td>';
				if ($i == $jumlah)
					break;
			}	
			$toros .='						
				</tr>';
				$is++;
			}
		
		$toros .= '
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-xs-7">
                                <h4>KETERANGAN</h4>
                                <ul class="list-unstyled">
                                    <li>
                                        E-Rapot ini digenerate pada tanggal '.date('Y-m-d').'
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-5">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <td>Jumlah Mapel</td>
                                        <td>'.$i.'</td>
                                    </tr>
                                    <!--<tr>
                                        <td>Discount</td>
                                        <td>$ 43</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>GRAND TOTAL</strong>
                                        </td>
                                        <td><strong>$ 4784.00</strong></td>
                                    </tr>-->
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <br/>
                        <br/>
                        <br/>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-left">
                                    <!--<a class="btn btn-danger" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print</a>-->
                                    <!--<a href="#" class="btn btn-success">Generate PDF</a>-->
                                </div>
                                <div class="pull-right">
                                    <a href="'.base_url('siswa').'" class="btn btn-success"><i class="fa fa-reply"></i> Kembali Menu Utama</a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>';
		echo $toros;
	}

	public function laporan_bk(){
		$this->load->model('kelas_model');
		
		$data['css_files'] = array (base_url('js/data-table/css/dataTables.bootstrap.min.css'),
			base_url('js/data-table/buttons/buttons.bootstrap.min.css'),
			base_url('js/data-table/colreorder/colReorder.bootstrap.min.css'),
			base_url('js/data-table/keytable/keyTable.bootstrap.min.css'),
			base_url('js/data-table/fixedheader/fixedHeader.bootstrap.min.css'),
			base_url('css/daterangepicker/daterangepicker.css'),
			base_url('css/bootstrap-multiselect/bootstrap-multiselect.css')
		);
		$data['js_files'] = array (base_url('js/data-table/js/jquery.dataTables.min.js'),
			base_url('js/data-table/js/dataTables.bootstrap.min.js'),
			base_url('js/data-table/buttons/dataTables.buttons.min.js'),
			base_url('js/data-table/buttons/buttons.bootstrap.min.js'),
			base_url('js/data-table/buttons/buttons.flash.min.js'),
			base_url('js/data-table/buttons/jszip.min.js'),
			base_url('js/data-table/buttons/pdfmake.min.js'),
			base_url('js/data-table/buttons/vfs_fonts.js'),
			base_url('js/data-table/buttons/buttons.html5.min.js'),
			base_url('js/data-table/buttons/buttons.print.min.js'),
			base_url('js/data-table/buttons/buttons.colVis.min.js'),
			base_url('js/data-table/colreorder/dataTables.colReorder.min.js'),
			base_url('js/data-table/keytable/dataTables.keyTable.min.js'),
			base_url('js/data-table/fixedheader/dataTables.fixedHeader.min.js'),
			base_url('js/daterangepicker/moment.min.js'),
			base_url('js/daterangepicker/daterangepicker.js'),
			base_url('js/bootstrap-multiselect/bootstrap-multiselect.js')
		);

		$data['kelas'] = $this->kelas_model->getall();

		//options view
		$data['viewoptions']['type'] = "table";
		$data['viewoptions']['section'] = "laporan_rapot";
		$data['viewoptions']['page'] = "laporan_bk";
		$data['viewoptions']['pageinfo'] = "Laporan Rekap Tugas";
		$data['viewoptions']['content'] = "laporan/bk";
		$data['viewoptions']['script'] = "laporan/bk_script";
		
		$this->writehtml1($data);
	}

	public function laporan_bk_ajax($tgl1=null, $tgl2=null, $kelas=0) {
		
		$kelas_id = urldecode(str_replace("--", "", $kelas));
		if ($tgl1 == null || $tgl1 == '' || $tgl2 == null || $tgl2 == '') exit;
		if ($tgl1 > $tgl2) {
			$tanggal1 = $tgl2;
			$tanggal2 = $tgl1;
		}
		else {
			$tanggal1 = $tgl1;
			$tanggal2 = $tgl2;
		}
		$this->load->model('kelas_model');
		$this->load->model('mapel_kelas_model');
		$this->load->model('tugas_model');
		$this->load->model('siswa_model');
		$this->load->model('kelas_siswa_model');
		$this->load->model('nilai_tugas_model');

		$data['kelas'] = $this->kelas_model->getbyid($kelas_id);

		$array = array();
		$i = 0;
		foreach ($data['kelas'] as $thor => $val_kelas) {
			$siswa = $this->kelas_siswa_model->getbykelas($val_kelas['id']);
			if($siswa != 0){
				foreach ($siswa as $thor => $val_siswa) {
					$array[$i]['siswa_id'] = $val_siswa['siswa_id'];
					$array[$i]['nama_kelas'] = $val_kelas['nama'];
					$array[$i]['kelas_id'] = $val_kelas['id'];
					$i++ ;
				}
			}			
		}

		$i = 0;
		$array1 = array();
		foreach ($array as $thor => $value) {
			$array1[$i]['siswa_id'] = $value['siswa_id'];
			$array1[$i]['detil'] = array();
			$ii = 0;
			$mapel = $this->mapel_kelas_model->getbykelas($value['kelas_id']);
			if($mapel != 0){
				foreach ($mapel as $thor => $val_mapel) {
					$tugas = $this->tugas_model->getbymapeldate($tanggal1, $tanggal2, $val_mapel['mapel_id']);
					if($tugas != 0){
						foreach ($tugas as $key => $val_tugas) {
							$nilai = $this->nilai_tugas_model->getbytugas($value['siswa_id'], $val_tugas['id']);
							$array1[$i]['detil'][$ii]['tugas_id'] = $val_tugas['id'];
							$array1[$i]['detil'][$ii]['mapel'] = $val_mapel['mapel_id'];
							$array1[$i]['detil'][$ii]['tugas'] = $val_tugas['id'];
							$array1[$i]['detil'][$ii]['nilai'] = $nilai[0]['nilai'];
							$ii++;
						}
					}
				}
			}
			$i++;
		}
		$data['array1'] = $array1;
		$ary_value= $array1;

		$this->load->model('general_model');
		$res = $this->general_model->getnama('company_logo');
		$data['toro']['company_logo'] = $res[0]['nilai'];

		$toros = '<div class="panel invoice">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="invoice-logo">
                                    <img src="'.base_url().'img/'.$data['toro']['company_logo'].'" alt=""/>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <h2 class="text-center"><b>Laporan Rekap Tugas</b></h2>
								<h2 class="text-center">'.get_data('el_kelas', 'id', $kelas, 'nama').'</h2>
                            </div>
                        </div>

                        <table class="table table-striped table-hover convert-data-table">
                            <thead>
                           
                            <tr>
								<th class="">NAMA SISWA</th>';
					$i = 0 ;
					$jumlah = count($ary_value[0]['detil']);
					foreach ($ary_value[0]['detil'] as $thorz => $value_detil) {
						$i++;
						$toros .= '	
							<th>'.$value_detil['tugas_id'].' <br>'.get_data('el_mapel', 'id', $value_detil['mapel'], 'nama').' </th>';
						if ($i == $jumlah)
							break;
					}
                $toros .= '            </tr>
                            </thead>
                            <tbody>';

       

		
		$is = 0;
		foreach ($ary_value as $thorz => $value) {
			
			$toros .= '<tr>
					<td>'.get_data('el_siswa', 'id', $value['siswa_id'], 'nama').'</td>';
			$i= 0;
			$jumlah = count($value['detil']);
			foreach ($value['detil'] as $thorz => $value_detil) {
				$i++;
				if(empty($value_detil['nilai']))
				$toros .= '	
					<td> - </td>';
					else
				$toros .= '	
					<td>'.$value_detil['nilai'].'</td>';
				if ($i == $jumlah)
					break;
			}	
			$toros .='						
				</tr>';
				$is++;
			}
		
		$toros .= '
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-xs-7">
                                <h4>KETERANGAN</h4>
                                <ul class="list-unstyled">
                                    <li>
                                        E-Rapot ini digenerate pada tanggal '.date('Y-m-d').'
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-5">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <td>Jumlah Mapel</td>
                                        <td>'.$i.'</td>
                                    </tr>
                                    <!--<tr>
                                        <td>Discount</td>
                                        <td>$ 43</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>GRAND TOTAL</strong>
                                        </td>
                                        <td><strong>$ 4784.00</strong></td>
                                    </tr>-->
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <br/>
                        <br/>
                        <br/>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-left">
                                    <!--<a class="btn btn-danger" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print</a>-->
                                    <!--<a href="#" class="btn btn-success">Generate PDF</a>-->
                                </div>
                                <div class="pull-right">
                                    <a href="'.base_url('siswa').'" class="btn btn-success"><i class="fa fa-reply"></i> Kembali Menu Utama</a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>';
		echo $toros;
	}


	public function laporan_mapel(){
		$this->load->model('mapel_model');
		$this->load->model('kelas_model');
		//$cname = 'pos_beli_terima_laporan';
		//$this->load->model('access_group_detil_model');
		//$res = $this->access_group_detil_model->getbynama($this->session->userdata('user_level'),$cname.'_manage');
		//if ($res == 0) redirect('dashboard');
		
		$data['css_files'] = array (base_url('js/data-table/css/dataTables.bootstrap.min.css'),
			base_url('js/data-table/buttons/buttons.bootstrap.min.css'),
			base_url('js/data-table/colreorder/colReorder.bootstrap.min.css'),
			base_url('js/data-table/keytable/keyTable.bootstrap.min.css'),
			base_url('js/data-table/fixedheader/fixedHeader.bootstrap.min.css'),
			base_url('css/daterangepicker/daterangepicker.css'),
			base_url('css/bootstrap-multiselect/bootstrap-multiselect.css')
		);
		$data['js_files'] = array (base_url('js/data-table/js/jquery.dataTables.min.js'),
			base_url('js/data-table/js/dataTables.bootstrap.min.js'),
			base_url('js/data-table/buttons/dataTables.buttons.min.js'),
			base_url('js/data-table/buttons/buttons.bootstrap.min.js'),
			base_url('js/data-table/buttons/buttons.flash.min.js'),
			base_url('js/data-table/buttons/jszip.min.js'),
			base_url('js/data-table/buttons/pdfmake.min.js'),
			base_url('js/data-table/buttons/vfs_fonts.js'),
			base_url('js/data-table/buttons/buttons.html5.min.js'),
			base_url('js/data-table/buttons/buttons.print.min.js'),
			base_url('js/data-table/buttons/buttons.colVis.min.js'),
			base_url('js/data-table/colreorder/dataTables.colReorder.min.js'),
			base_url('js/data-table/keytable/dataTables.keyTable.min.js'),
			base_url('js/data-table/fixedheader/dataTables.fixedHeader.min.js'),
			base_url('js/daterangepicker/moment.min.js'),
			base_url('js/daterangepicker/daterangepicker.js'),
			base_url('js/bootstrap-multiselect/bootstrap-multiselect.js')
		);

		//$this->load->model('m_cabang_model');
		//if ($this->session->userdata('user_cabang') != 0)
		//	$data['m_cabang'] = $this->m_cabang_model->get($this->session->userdata('user_cabang'));
		//else
		//	$data['m_cabang'] = $this->m_cabang_model->getall();
		
		//$this->load->model('barang_model');
		//$this->load->model('supplier_model');
		//$data['barang'] = $this->barang_model->getall();
		//$data['murid'] = $this->supplier_model->getall();
		
		$data['mapel'] = $this->mapel_model->getall();
		$data['kelas'] = $this->kelas_model->getallaktif();

		//options view
		$data['viewoptions']['type'] = "table";
		$data['viewoptions']['section'] = "laporan_rapot";
		$data['viewoptions']['page'] = "laporan_mapel";
		$data['viewoptions']['pageinfo'] = "Laporan Mapel";
		$data['viewoptions']['content'] = "laporan/mapel";
		$data['viewoptions']['script'] = "laporan/mapel_script";
		
		$this->writehtml1($data);
	}

	public function laporan_batch($error = NULL, $detil = NULL) {
		
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
		$data['viewoptions']['section'] = "laporan_rapot";
		$data['viewoptions']['page'] = "laporan_batch";
		$data['viewoptions']['pageinfo'] = "Pembayaran";
		$data['viewoptions']['content'] = "new/rapot_batch";
		$data['viewoptions']['script'] = "new/rapot_batch_script";
		
		$this->writehtml1($data);
	}

	public function laporan_rapot(){
		$this->load->model('mapel_model');
		$this->load->model('siswa_model');
		$this->load->model('tugas_model');
		//$cname = 'pos_beli_terima_laporan';
		//$this->load->model('access_group_detil_model');
		//$res = $this->access_group_detil_model->getbynama($this->session->userdata('user_level'),$cname.'_manage');
		//if ($res == 0) redirect('dashboard');
		
		$data['css_files'] = array (base_url('js/data-table/css/dataTables.bootstrap.min.css'),
			base_url('js/data-table/buttons/buttons.bootstrap.min.css'),
			base_url('js/data-table/colreorder/colReorder.bootstrap.min.css'),
			base_url('js/data-table/keytable/keyTable.bootstrap.min.css'),
			base_url('js/data-table/fixedheader/fixedHeader.bootstrap.min.css'),
			base_url('css/daterangepicker/daterangepicker.css'),
			base_url('css/bootstrap-multiselect/bootstrap-multiselect.css')
		);
		$data['js_files'] = array (base_url('js/data-table/js/jquery.dataTables.min.js'),
			base_url('js/data-table/js/dataTables.bootstrap.min.js'),
			base_url('js/data-table/buttons/dataTables.buttons.min.js'),
			base_url('js/data-table/buttons/buttons.bootstrap.min.js'),
			base_url('js/data-table/buttons/buttons.flash.min.js'),
			base_url('js/data-table/buttons/jszip.min.js'),
			base_url('js/data-table/buttons/pdfmake.min.js'),
			base_url('js/data-table/buttons/vfs_fonts.js'),
			base_url('js/data-table/buttons/buttons.html5.min.js'),
			base_url('js/data-table/buttons/buttons.print.min.js'),
			base_url('js/data-table/buttons/buttons.colVis.min.js'),
			base_url('js/data-table/colreorder/dataTables.colReorder.min.js'),
			base_url('js/data-table/keytable/dataTables.keyTable.min.js'),
			base_url('js/data-table/fixedheader/dataTables.fixedHeader.min.js'),
			base_url('js/daterangepicker/moment.min.js'),
			base_url('js/daterangepicker/daterangepicker.js'),
			base_url('js/bootstrap-multiselect/bootstrap-multiselect.js')
		);

		//$this->load->model('m_cabang_model');
		//if ($this->session->userdata('user_cabang') != 0)
		//	$data['m_cabang'] = $this->m_cabang_model->get($this->session->userdata('user_cabang'));
		//else
		//	$data['m_cabang'] = $this->m_cabang_model->getall();
		
		//$this->load->model('barang_model');
		//$this->load->model('supplier_model');
		//$data['barang'] = $this->barang_model->getall();
		//$data['murid'] = $this->supplier_model->getall();
		
		$data['mapel'] = $this->mapel_model->getall();
		$data['siswa'] = $this->siswa_model->getall();
		$data['tugas'] = $this->tugas_model->getall();

		//options view
		$data['viewoptions']['type'] = "table";
		$data['viewoptions']['section'] = "laporan_rapot";
		$data['viewoptions']['page'] = "laporan_rapot";
		$data['viewoptions']['pageinfo'] = "Laporan Rapot";
		$data['viewoptions']['content'] = "laporan/rapot";
		$data['viewoptions']['script'] = "laporan/rapot_script";
		
		$this->writehtml1($data);
	}
	
	public function laporan_mapel_ajax($mapel=0, $kelas=0) {
		

		$this->load->model('mapel_model');
		$this->load->model('siswa_model');
		$this->load->model('kelas_siswa_model');
		$this->load->model('tugas_kelas_model');
		$this->load->model('nilai_tugas_model');
		$this->load->model('mapel_kelas_model');

		$mapel = urldecode(str_replace("--", "", $mapel));
		$kelas_id = urldecode(str_replace("--", "", $kelas));


		$ary_value = array();
		$is = 0;
		$siswa_all = $this->kelas_siswa_model->getbykelas($kelas_id);

		foreach ($siswa_all as $key => $value_siswa) {
			$kelas = $this->kelas_siswa_model->getkelas($value_siswa['siswa_id']);
			$tugas_kelas = $this->tugas_kelas_model->getbykelas($kelas[0]['kelas_id']);

			$ary = array();
			$i = 0;
			foreach ($tugas_kelas as $thor => $value) {
				$ary[$i]['id_tugas'] = $value['tugas_id'];
				$ary[$i]['mapel_id'] = get_data('el_tugas', 'id', $value['tugas_id'], 'mapel_id');
				$ary[$i]['mapel'] = get_data('el_mapel', 'id', $ary[$i]['mapel_id'] , 'nama');
				$tugas_nilai = $this->nilai_tugas_model->getbytugas($value_siswa['siswa_id'], $value['tugas_id']);
				$ary[$i]['nilai'] = $tugas_nilai[0]['nilai'];
				$i++;
			}
			
			$ary_value[$is]['id_siswa'] = $value_siswa['siswa_id'];
			$ary_value[$is]['nama'] = get_data('el_siswa', 'id', $value_siswa['siswa_id'], 'nama');
			$ary_value[$is]['kelas'] = get_data('el_kelas', 'id', $kelas_id, 'nama');
			$ary_value[$is]['detil'] = array();
			$ii = 0;
			foreach ($ary as $thor => $value_tugas) {
				if($value_tugas['mapel_id'] == $mapel){
					$ary_value[$is]['detil'][$ii]['id_tugas'] = $value_tugas['id_tugas'];
					$ary_value[$is]['detil'][$ii]['mapel_id'] = $value_tugas['mapel_id'];
					$ary_value[$is]['detil'][$ii]['nilai'] = $value_tugas['nilai'];
					$ii++;
				}
			}

			$is++;

		}
		
		$data['ary_value'] = $ary_value;

		$this->load->model('general_model');
		$res = $this->general_model->getnama('company_logo');
		$data['toro']['company_logo'] = $res[0]['nilai'];

		$toros = '<div class="panel invoice">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="invoice-logo">
                                    <img src="'.base_url().'img/'.$data['toro']['company_logo'].'" alt=""/>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <h2 class="text-center"><b>E- Rapot</b></h2>
								<h2 class="text-center">'.get_data('el_mapel', 'id', $mapel, 'nama').'</h2>
                            </div>
                        </div>

                        <table class="table table-striped table-hover convert-data-table">
                            <thead>
                           
                            <tr>
								<th class="">NAMA SISWA</th>
								<th class="">KELAS</th>';
					$i = 0 ;
					$jumlah = count($ary_value[0]['detil']);
					foreach ($ary_value[0]['detil'] as $thorz => $value_detil) {
						$i++;
						$toros .= '	
							<th>'.$value_detil['id_tugas'].'</th>';
						if ($i == $jumlah)
							break;
					}
                $toros .= '            </tr>
                            </thead>
                            <tbody>';

       

		
		if ($mapel != 0) {
			foreach ($ary_value as $thorz => $value) {
				
				$toros .= '<tr>
						<td>'.$value['nama'].'</td>
						<td>'.$value['kelas'].'</td>';
				$i= 0;
				$jumlah = count($value['detil']);
				foreach ($value['detil'] as $thorz => $value_detil) {
					$i++;
					if(empty($value_detil['nilai']))
					$toros .= '	
						<td> - </td>';
						else
					$toros .= '	
						<td>'.$value_detil['nilai'].'</td>';
					if ($i == $jumlah)
						break;
				}	
				$toros .='						
					</tr>';
			}
		}
		$toros .= '
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-xs-7">
                                <h4>KETERANGAN</h4>
                                <ul class="list-unstyled">
                                    <li>
                                        E-Rapot ini digenerate pada tanggal '.date('Y-m-d').'
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-5">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <td>Jumlah Mapel</td>
                                        <td>'.$i.'</td>
                                    </tr>
                                    <!--<tr>
                                        <td>Discount</td>
                                        <td>$ 43</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>GRAND TOTAL</strong>
                                        </td>
                                        <td><strong>$ 4784.00</strong></td>
                                    </tr>-->
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <br/>
                        <br/>
                        <br/>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-left">
                                    <!--<a class="btn btn-danger" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print</a>-->
                                    <!--<a href="#" class="btn btn-success">Generate PDF</a>-->
                                </div>
                                <div class="pull-right">
                                    <a href="'.base_url('siswa').'" class="btn btn-success"><i class="fa fa-reply"></i> Kembali Menu Utama</a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>';
		echo $toros;
	}
	
	public function laporan_rapot_ajax($siswa=0, $mapel=0, $tugas=0) {
		

		$this->load->model('mapel_model');
		$this->load->model('siswa_model');
		$this->load->model('kelas_siswa_model');
		$this->load->model('tugas_kelas_model');
		$this->load->model('nilai_tugas_model');
		$this->load->model('mapel_kelas_model');

		$siswa = urldecode(str_replace("--", "", $siswa));
		$tugas = urldecode(str_replace("--", ",", $tugas));
		$tugas = explode(",",$tugas);


		$res = $this->siswa_model->get($siswa);

		if ($res == 0) {
			redirect('error_badrequest');
		}
		$data['detil'] = $res;
		$id = $siswa;

		$ary = array();
		$i = 0;
		foreach ($tugas as $thor => $value) {
			$ary[$i]['id_tugas'] = $value;
			$ary[$i]['mapel_id'] = get_data('el_tugas', 'id', $value, 'mapel_id');
			$ary[$i]['mapel'] = get_data('el_mapel', 'id', $ary[$i]['mapel_id'] , 'nama');
			$tugas_nilai = $this->nilai_tugas_model->getbytugas($id, $value);
			$ary[$i]['nilai'] = $tugas_nilai[0]['nilai'];
			$i++;
		}

		$kelas = $this->kelas_siswa_model->getkelas($id);
		$mapel = $this->mapel_kelas_model->getbykelas($kelas[0]['kelas_id']);
		$ary_value = array();
		$i = 0;
		foreach ($mapel as $thor => $value_mapel) {
			$ary_value[$i]['no'] = $i + 1;
			$ary_value[$i]['id'] = $value_mapel['mapel_id'];
			$ary_value[$i]['nama'] = get_data('el_mapel', 'id', $value_mapel['mapel_id'] , 'nama');
			$ary_value[$i]['detil'] = array();
			$ii = 0;
			foreach ($ary as $thor => $value_tugas) {
				if($value_tugas['mapel_id'] == $value_mapel['mapel_id']){
					$ary_value[$i]['detil'][$ii]['id_tugas'] = $value_tugas['id_tugas'];
					$ary_value[$i]['detil'][$ii]['mapel_id'] = $value_tugas['mapel_id'];
					$ary_value[$i]['detil'][$ii]['nilai'] = $value_tugas['nilai'];
					$ii++;
				}
			}

			$i++;
		}
		
		$data['ary_value'] = $ary_value;

		$this->load->model('general_model');
		$res = $this->general_model->getnama('company_logo');
		$data['toro']['company_logo'] = $res[0]['nilai'];

		$toros = '<div class="panel invoice">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="invoice-logo">
                                    <img src="'.base_url().'img/'.$data['toro']['company_logo'].'" alt=""/>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <h2 class="text-center"><b>E- Rapot</b></h2>
								<h2 class="text-center">'.get_data('el_siswa', 'id', $siswa, 'nis').' </br> '.get_data('el_siswa', 'id', $siswa, 'nama').'</h2>
                            </div>
                        </div>

                        <table class="table table-striped table-hover convert-data-table">
                            <thead>
                           
                            <tr>
                                <th>'.get_data('el_siswa', 'id', $siswa, 'nama').'</th>
								<th class="">MAPEL</th>
								<th class="">NILAI 1</th>
								<th class="">NILAI 2</th>	
								<th class="">NILAI 3</th>	
                            </tr>
                            </thead>
                            <tbody>';

       

		
		if ($mapel != 0) {
			foreach ($ary_value as $thorz => $value) {
				
				$toros .= '<tr>
						<td></td>
						<td>'.$value['nama'].'</td>';
				$i= 0;
				foreach ($value['detil'] as $thorz => $value_detil) {
					$i++;
					$toros .= '	
						<td>'.$value_detil['nilai'].'</td>';
					if ($i == 3)
						break;
				}	
				for ($i = $i; $i < 3; $i++) {
				  $toros .= '	
						<td> - </td>';
				}
				$toros .='						
					</tr>';
			}
		}
		$toros .= '
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-xs-7">
                                <h4>KETERANGAN</h4>
                                <ul class="list-unstyled">
                                    <li>
                                        E-Rapot ini digenerate pada tanggal '.date('Y-m-d').'
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-5">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <td>Jumlah Mapel</td>
                                        <td>'.$i.'</td>
                                    </tr>
                                    <!--<tr>
                                        <td>Discount</td>
                                        <td>$ 43</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>GRAND TOTAL</strong>
                                        </td>
                                        <td><strong>$ 4784.00</strong></td>
                                    </tr>-->
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <br/>
                        <br/>
                        <br/>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-left">
                                    <!--<a class="btn btn-danger" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print</a>-->
                                    <!--<a href="#" class="btn btn-success">Generate PDF</a>-->
                                </div>
                                <div class="pull-right">
                                    <a href="'.base_url('siswa').'" class="btn btn-success"><i class="fa fa-reply"></i> Kembali Menu Utama</a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>';
		echo $toros;
	}
	
	
	public function auto_kelas() {
		if (!isset($_GET['q'])) exit;
		$q = $_GET['q'];
		header("Content-Type: application/json");
		$this->load->model('kelas_model');
		$this->load->model('mapel_kelas_model');
		$this->load->model('tugas_kelas_model');
		$this->load->model('kelas_siswa_model');
		$this->load->model('tugas_model');

		$res = $this->kelas_model->get_autocomplete($q);		
		if (!$res) exit;
		foreach ($res as $bayu => $value) {
			$temps = '';
			$row['value'] = $value['id'];
			$row['label'] = $value['nama'];	
			$mapel = $this->mapel_kelas_model->getbykelas($value['id']);	
			$data_mapel = array();
			$i = 0;
			if($mapel!= 0){
				foreach ($mapel as $thor => $value_mapel) {
					$data_mapel[$i]['no'] = $i + 1;
					$data_mapel[$i]['id'] = $value_mapel['mapel_id'];
					$data_mapel[$i]['nama'] = get_data('el_mapel', 'id', $value_mapel['mapel_id'] , 'nama');
					$data_mapel[$i]['detil'] = array();
					$tugas = $this->tugas_model->getbymapel($value_mapel['mapel_id']);
					$ii = 0;
					if($tugas!= 0){
						foreach ($tugas as $thor => $value_tugas) {
							$data_mapel[$i]['detil'][$ii]['id'] = $value_tugas['id'];
							$ii++;							
						}
					}
					$i++;
				}
			}
			$row['arymapel'] = $data_mapel;
			$row['arysiswa'] = array();
			$siswa = $this->kelas_siswa_model->getbykelas($value['id']);	
			if($siswa != 0){
				$i = 0;
				foreach ($siswa as $thor => $value) {
					$row['arysiswa'][$i]['id'] = $value['siswa_id'];
					$row['arysiswa'][$i]['nama'] =get_data('el_siswa', 'id', $value['siswa_id'] , 'nama');					
					$row['arysiswa'][$i]['nis'] =get_data('el_siswa', 'id', $value['siswa_id'] , 'nis');					
					$i++;
				}
			}			
			$arr[] = $row;
		}
		echo json_encode($arr);
	}

	public function printrapot() {
			
		$summary = json_decode($this->input->post('summary'));
		$all = json_decode($this->input->post('organizers'));
		$siswa = json_decode($this->input->post('organizersiswa'));
		// /var_dump($all);exit;

		$this->load->model('mapel_model');
		$this->load->model('siswa_model');
		$this->load->model('kelas_siswa_model');
		$this->load->model('tugas_kelas_model');
		$this->load->model('nilai_tugas_model');
		$this->load->model('mapel_kelas_model');
		
		$pdf = new FPDF('p','mm','A4');
        $pdf->AddFont('calibri','','calibri.php');
        $pdf->AddFont('calibrib','','calibrib.php');
        $pdf->SetMargins(12,20,20);
        // membuat halaman baru
           
        foreach ($siswa as $thor => $value_siswa) {
			if($value_siswa->isChecked == 1){
				$res = $this->siswa_model->get($value_siswa->siswa_i);
				
				$data['detil'] = $res;
				$id = $value_siswa->siswa_i;

				$ary_value = array();
				$i = 1;

				$pdf->AddPage();
		        // setting jenis font yang akan digunakan
		      	$pdf->Image('assets/img/kop.png', 10, 10, 190);
		       	//$pdf->Image('assets/img/ttd.png', 90, 235, 60);
		        // mencetak string
		        $pdf->Cell(10,35,'',0,1);
		        $pdf->SetFont('calibrib','',14);
		        $pdf->Cell(170,7,'DAFTAR NILAI',0,1,'C');
		        $pdf->Cell(170,7,'SEKOLAH MENENGAH KEJURUAN',0,1,'C');
		        $pdf->Cell(170,7,'TAHUN PELAJARAN 2019/2020',0,1,'C');
		        $pdf->Cell(10,25,'',0,1);
		        $pdf->SetFont('calibri','',12);
		        $pdf->Text(15,82,'Nama',0,1,'L');
		        $pdf->Text(15,88,'Nomor Induk Siswa',0,1,'L');
		        $pdf->Text(15,94,'Kelas',0,1,'L');
		        $pdf->Text(90,82,':',0,1,'L');
		        $pdf->Text(90,88,':',0,1,'L');
		        $pdf->Text(90,94,':',0,1,'L');
		        $pdf->Text(95,82,$value_siswa->siswa_nama,0,1,'L');
		        $pdf->Text(95,88,get_data('el_siswa', 'id', $value_siswa->siswa_i , 'nis'),0,1,'L');
		        $pdf->Text(95,94,str_replace("KELAS ","",get_data('el_kelas', 'id', $summary->supplier_i , 'nama')),0,1,'L');
		        $pdf->SetFont('calibrib','',12);
		        $pdf->Cell(15,8,'NO',1,0,'C');
		        $pdf->Cell(110,8,'MATA PELAJARAN',1,0,'C');
		        $pdf->Cell(20,8,'NILAI 1',1,0,'C');
		        $pdf->Cell(20,8,'NILAI 2',1,0,'C');
		        $pdf->Cell(20,8,'NILAI UTS',1,1,'C');
				foreach ($all as $thor => $value_mapel) {
					$tugas_nilai = $this->nilai_tugas_model->getbytugas($id, $value_mapel->selectedNilai1);
					$nilai1 = round($tugas_nilai[0]['nilai'],2);
					$tugas_nilai = $this->nilai_tugas_model->getbytugas($id, $value_mapel->selectedNilai2);
					$nilai2 = round($tugas_nilai[0]['nilai'],2);
					$tugas_nilai = $this->nilai_tugas_model->getbytugas($id, $value_mapel->selectedNilai3);
					$nilai3 = round($tugas_nilai[0]['nilai'],2);
			        $pdf->SetFont('calibri','',11);
			        $pdf->Cell(15,6,$i,1,0, 'C');
			        $pdf->Cell(110,6,$value_mapel->mapel_nama,1,0);
			        $pdf->Cell(20,6,$nilai1,1,0,'C');
			        $pdf->Cell(20,6,$nilai2,1,0,'C');
			        $pdf->Cell(20,6,$nilai3,1,1,'C'); 
					$i++;
				}
				// Memberikan space kebawah agar tidak terlalu rapat
		        $pdf->SetFont('calibri','',12);
		        $pdf->Text(120,240,'Kras, 02 Mei 2020',0,1,'L');
		        $pdf->Text(120,245,'Kepala SMK Negeri 1 Kras,',0,1,'L');
		        $pdf->SetFont('calibrib','',12);
		        $pdf->Text(120,270,'Drs. EDDY PRIYO UTOMO, M.Si',0,1,'L');
		        $pdf->SetFont('calibri','',12);
		        $pdf->Text(120,275,'NIP 19670807 200112 1 004',0,1,'L');
			}
		}

        $pdf->Output();
		
		
		
	}

	private function writehtml($viewoptions,$output=null){
		//load view
		$loginas = $this->session->userdata('user_name');
		$output->loginas = $loginas;
		$this->load->view('header', $output);
		$this->load->view($viewoptions['content'], $output);
		$this->load->view('sidebar-left', $output);
		$this->load->view('sidebar-nav', $output);
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