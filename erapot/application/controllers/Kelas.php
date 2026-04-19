<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in')) redirect('login');
		$this->cname = 'm_coa';
		$this->load->model('access_group_detil_model');
		$this->load->library(array('pagination','grocery_CRUD'));

		$this->load->library(array('pagination','grocery_CRUD'));
		$this->lang->load('common', $this->session->userdata('user_language'));
		$this->lang->load('m_coa', $this->session->userdata('user_language'));
	}
	
	public function index()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('bootstrap');
			$crud->unset_bootstrap();
			$crud->unset_jquery();
			$crud->set_table('el_kelas');
			$crud->where('parent_id !=','null');
			$crud->set_subject('Kelas');
			$crud->required_fields('id','nama');
			$crud->columns('actions','nama', 'aktif');
			$crud->unset_fields('updated');
			$crud->unset_edit_fields('created','created_id','updated');
			$crud->field_type('aktif', 'dropdown', array('1'=>'Aktif', '3'=>'Alumni'))
				->field_type('created', 'hidden', '')
				->field_type('created_id', 'hidden', '')
				->field_type('updated_id', 'hidden', '');
			$crud->display_as('id','ID')
				->display_as('nama','Nama')
				->display_as('nis','NIS')
				->display_as('aktif','Status');
			$crud->set_rules('nama', 'Nama', 'callback_check_double');
			//$crud->set_relation('id_users','users','nama');
			$crud->callback_before_insert(array($this,'toro_created'));
			//$crud->callback_after_insert(array($this,'toro_insert'));
			$crud->callback_after_insert(array($this,'toro_insert'));
			$crud->callback_before_update(array($this,'toro_update'));
			$crud->callback_before_delete(array($this,'toro_delete'));
			$crud->callback_column('status_id',array($this,'toro_statuso'));
			$crud->callback_column('actions',array($this,'toro_actions'));
			//$crud->toro_upload(base_url('m_bank/uploads'));
			//$crud->toro_upload_link(base_url('assets/excel/master_finance/m_bank.xlsx'));
			
			$cname = $this->cname;
			$res = $this->access_group_detil_model->getbynama($this->session->userdata('user_level'),$cname.'_create');
			 	$crud->unset_add();
			$res = $this->access_group_detil_model->getbynama($this->session->userdata('user_level'),$cname.'_read');
			 	$crud->unset_read();
			$res = $this->access_group_detil_model->getbynama($this->session->userdata('user_level'),$cname.'_update');
				$crud->unset_edit();
			$res = $this->access_group_detil_model->getbynama($this->session->userdata('user_level'),$cname.'_delete');
				$crud->unset_delete();

			$output = $crud->render();

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
		
		//options view
		$viewoptions['type'] = "table";
		$viewoptions['section'] = "master_data";
		$viewoptions['page'] = "kelas";
		$viewoptions['pageinfo'] = "List Kelas";
		$viewoptions['content'] = "grocery";
		$output->viewoptions = $viewoptions;
		
		$this->writehtml($viewoptions,$output);
	}

	function toro_actions($value, $row) {
		$print = '';
		$cname = $this->cname;
		//$res = $this->access_group_detil_model->getbynama($this->session->userdata('user_level'),$cname.'_read');
		//if ($res != 0) {
			$print .= '<a class="btn btn-default btn-xs" href="'.site_url('kelas/detils').'/'.base64_encode($row->id).
				'"><i class="fa fa-fw fa-search"></i> View</a> ';
		//}	'"><i class="fa fa-fw fa-pencil"></i> Edit</a>';
		
		return $print;
	}

	function toro_created($post_array)
	{
		$post_array['created'] = date('Y-m-d H:i:s');
		$post_array['created_id'] = $this->session->userdata('user_id');
		$post_array['updated_id'] = $this->session->userdata('user_id');
		return $post_array;
	}

	function toro_statuso($value, $row) {
		if ($row->status_id == 0)
			return '<span class="label label-danger">Alumni</span>';
		else if ($row->status_id == 1)
			return '<span class="label label-success">Atif</span>';
	}
	
	function toro_insert($post_array, $primary_key)
	{
		$keterangan = '';
		$keterangan .= 'nama: '.$post_array['nama'].'; ';
		$keterangan .= 'kode: '.$post_array['kode'].'; ';
		$keterangan .= 'keterangan: '.$post_array['keterangan'].'; ';
		
		$logs_insert = array(
			"id_master" => $primary_key,
			"id_users" => $this->session->userdata('user_id'),
			"table_name" => 'm_bank',
			"action" => 'CREATE',
			"keterangan" => "a new record has been created by ".$this->session->userdata('user_name')." : ".$keterangan
		);
		$this->load->model('users_history_model');
		$this->users_history_model->add($logs_insert);
		return true;
	}
	
	function toro_update($post_array, $primary_key)
	{
		$this->load->model('m_bank_model');
		$toro = $this->m_bank_model->get($primary_key);
		$keterangan = '';
		if ($post_array['nama'] != $toro[0]['nama'])
			$keterangan .= 'changed nama from '.$toro[0]['nama'].' to '.$post_array['nama'].'; ';
		if ($post_array['kode'] != $toro[0]['kode'])
			$keterangan .= 'changed kode from '.$toro[0]['kode'].' to '.$post_array['kode'].'; ';
		if ($post_array['keterangan'] != $toro[0]['keterangan'])
			$keterangan .= 'changed keterangan from '.$toro[0]['keterangan'].' to '.$post_array['keterangan'].'; ';
		
		$logs_insert = array(
			"id_master" => $primary_key,
			"id_users" => $this->session->userdata('user_id'),
			"table_name" => 'm_bank',
			"action" => 'UPDATE',
			"keterangan" => $this->session->userdata('user_name')." updated record #".$primary_key." : ".$keterangan
		);
		$this->load->model('users_history_model');
		$this->users_history_model->add($logs_insert);
		
		$post_array['updated_id'] = $this->session->userdata('user_id');
		return $post_array;
		
		/*$this->load->model('agama_model');
		$toro = $this->agama_model->get($primary_key);
		$keterangan = '';
		if ($post_array['nama'] != $toro[0]['nama'])
			$keterangan .= 'changed nama from '.$toro[0]['nama'].' to '.$post_array['nama'].'; ';
		if ($post_array['keterangan'] != $toro[0]['keterangan'])
			$keterangan .= 'changed keterangan from '.$toro[0]['keterangan'].' to '.$post_array['keterangan'].'; ';
		
		$logs_insert = array(
			"id_master" => $primary_key,
			"user_id" => $this->session->userdata('user_id'),
			"keterangan" => $this->session->userdata('user_name')." updated record #".$primary_key." : ".$keterangan
		);
		$this->load->model('agama_records_model');
		$this->agama_records_model->add($logs_insert);*/
		
		// generate sub number
		if ($post_array['id_kategori'] != '' && $post_array['id_kategori'] != null) {
			$this->load->model('kategori_model');
			$res = $this->kategori_model->get($post_array['id_kategori']);
			if ($res != 0) {
				$post_array['sub'] = $res[0]['sub'] + 1;
			}
		}
		$post_array['updated_id'] = $this->session->userdata('user_id');
		return $post_array;
	}
	
	function toro_delete($primary_key)
	{
		$this->load->model('m_bank_model');
		$toro = $this->m_bank_model->get($primary_key);
		if ($toro == 0) return true;
		$keterangan = '';
		$keterangan .= 'nama: '.$toro[0]['nama'].'; ';
		$keterangan .= 'kode: '.$toro[0]['kode'].'; ';
		$keterangan .= 'keterangan: '.$toro[0]['keterangan'].'; ';
		
		$logs_insert = array(
			"id_master" => $primary_key,
			"id_users" => $this->session->userdata('user_id'),
			"table_name" => 'm_bank',
			"action" => 'DELETE',
			"keterangan" => $this->session->userdata('user_name')." deleted record #".$primary_key." : ".$keterangan
		);
		$this->load->model('users_history_model');
		$this->users_history_model->add($logs_insert);
		
		return true;
	}
	
	function check_double() {
		$check = false;
		$this->load->model('m_bank_model');
		if (!isset($_POST['created'])) {
			$andy = $this->m_bank_model->getnama($this->input->post('nama'));
			$lastBarang = $andy[0]['id'];
		}
		$toros = $this->m_bank_model->check_double($this->input->post('nama'));
		if ($toros != 0 && isset($_POST['created']))
			$check = true;
		if ($toros != 0 && !isset($_POST['created'])) {
			if ($lastBarang != $this->grocery_crud->getStateInfo()->primary_key)
				$check = true;
		}
		if ($check) {
			$message = 'Bank dengan Nama #'.$this->input->post('nama').' sudah ada dalam database';
			$this->form_validation->set_message('check_double', $message);
			return FALSE;
		}
	}

	public function uploads() {
		if(isset($_FILES['file'])){
			if($_FILES['file']['tmp_name']){
				if(!$_FILES['file']['error']) {
					$inputFile = $_FILES['file']['tmp_name'];
					if($_FILES['file']['type'] == 'application/vnd.ms-excel' || $_FILES['file']['type'] == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'){
						$this->load->library('excel');
						$this->load->model('m_bank_model');
						
						//Read spreadsheeet workbook
						try {
							$inputFileType = PHPExcel_IOFactory::identify($inputFile);
							$objReader = PHPExcel_IOFactory::createReader($inputFileType);
							$this->excel = $objReader->load($inputFile);
							$this->excel->setActiveSheetIndex(0);
						}
						catch(Exception $e) {
							die($e->getMessage());
						}
						
						/* EDIT FROM HERE */
						$error = '';
						$check = true;
						$h1 = $this->excel->getActiveSheet()->getCell('A1')->getValue();
						$h2 = $this->excel->getActiveSheet()->getCell('B1')->getValue();
						$h3 = $this->excel->getActiveSheet()->getCell('C1')->getValue();

						if (strtolower($h1) != 'bank name') {echo error_notification('A1 harus berformat bank name'); exit;}
						if (strtolower($h2) != 'bank code') {echo error_notification('B1 harus berformat bank code'); exit;}
						if (strtolower($h3) != 'description') {echo error_notification('C1 harus berformat description'); exit;}
						
						$i = 2;
						$content = '<table class="table table-striped table-hover">';
						$content .= '<thead><tr><td>Bank Name</td><td>Bank Code</td><td>Description</td><td>Status</td></tr></thead>';
						while ($check) {
							$c1 = $this->excel->getActiveSheet()->getCell('A'.$i)->getValue();
							if ($c1 != '') {
								$content .= '<tr><td>'.$c1.'</td>';
								$c2 = $this->excel->getActiveSheet()->getCell('B'.$i)->getValue(); $content .= '<td>'.$c2.'</td>';
								$c3 = $this->excel->getActiveSheet()->getCell('C'.$i)->getValue(); $content .= '<td>'.$c3.'</td>';
								
								$res1 = $this->m_bank_model->check_double($c1);
								if ($res1 == 0) {
									$toro_insert = array(
										"nama" => $c1,
										"kode" => $c2,
										"keterangan" => $c3,
										"created" => date('Y-m-d H:i:s'),
										"created_id" => $this->session->userdata('user_id'),
										"updated_id" => $this->session->userdata('user_id'),
									);
									$this->m_bank_model->add($toro_insert);
									$content .= '<td><span class="label label-success">Inserted</span></td>';
								}
								else {
									$content .= '<td><span class="label label-danger">Skipped - Existed</span></td>';
								}
								
								$content .= '</tr>';
							}
							else
								$check = false;
							$i ++;
						}
						$content .= '</table>';
						echo $content;
						/* EDIT ENDED HERE */
					}
					else {
						echo error_notification('Please upload an XLSX or XLS file');
					}
				}
				else {
					echo error_notification($_FILES['file']['error']);
				}
			}
		}
		else
			redirect('error_badrequest');
	}

	public function detils($id = NULL){
		if ($id == NULL || $id == '') redirect('kelas');
		$id = base64_decode($id);
		
		$this->load->model('kelas_model');
		$this->load->model('kelas_siswa_model');
		// checking
		$res = $this->kelas_model->getbyid($id);
		if ($res == 0) {
			redirect('error_badrequest');
		}
		$data['detil'] = $res;	
		
		$data['detils_siswa'] = $this->kelas_siswa_model->getbykelas($id);


		$this->load->helper('all_helper');

		//options view
		$data['viewoptions']['action'] = "view";
		$data['viewoptions']['type'] = "table";
		$data['viewoptions']['section'] = "master_data";
		$data['viewoptions']['page'] = "kelas";
		$data['viewoptions']['pageinfo'] = "View Kelas";
		$data['viewoptions']['content'] = "new/kelas_print";
		
		$this->writehtml1($data);
	}
	
	private function writehtml($viewoptions,$output=null){
		//load view
		$loginas = $this->session->userdata('user_name');
		$output->loginas = $loginas;
		$this->load->view('header', $output);
		$this->load->view('sidebar-left', $output);
		$this->load->view('sidebar-nav', $output);
		$this->load->view($viewoptions['content'], $output);
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