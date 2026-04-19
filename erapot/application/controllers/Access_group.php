<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Access_group extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in')) redirect('login');
		if($this->session->userdata('user_level') != 2) redirect('dashboard');
		
		$this->load->library(array('pagination','grocery_CRUD'));
		$this->lang->load('common', $this->session->userdata('user_language'));
		$this->lang->load('access_group', $this->session->userdata('user_language'));
	}
	
	public function index()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('bootstrap');
			$crud->unset_bootstrap();
			$crud->unset_jquery();
			$crud->set_table('access_group');
			$crud->set_subject($this->lang->line('access_group'));
			$crud->required_fields('id','nama');
			$crud->columns('actions','id','nama','keterangan','updated');
			$crud->fields('nama','accesses','keterangan');
			$crud->unset_fields('updated');
			$crud->unset_edit_fields('created','created_id','updated');
			$crud->field_type('access_detil', 'hidden', '')
				->field_type('created', 'hidden', '')
				->field_type('created_id', 'hidden', '')
				->field_type('updated_id', 'hidden', '');
			$crud->display_as('id', $this->lang->line('access_group_id'))
				->display_as('nama', $this->lang->line('access_group_nama'))
				->display_as('keterangan', $this->lang->line('access_group_keterangan'))
				->display_as('accesses','Akses');
			$crud->set_relation_n_n('accesses', 'access_group_detil', 'access_master', 'id_access_group', 'id_access_master', 'nama','priority');
			$crud->set_rules('nama', 'Nama', 'callback_check_double');
			$crud->callback_before_insert(array($this,'toro_created'));
			//$crud->callback_after_insert(array($this,'toro_insert'));
			$crud->callback_before_update(array($this,'toro_update'));
			$crud->callback_column('actions',array($this,'toro_actions'));
			if($this->session->userdata('user_level') != 1)
				$crud->unset_delete();

			$output = $crud->render();

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
		
		//options view
		$viewoptions['type'] = "table";
		$viewoptions['section'] = "users";
		$viewoptions['page'] = "access_group";
		$viewoptions['pageinfo'] = $this->lang->line('access_group_list');
		$viewoptions['content'] = "grocery";
		$output->viewoptions = $viewoptions;
		
		$this->writehtml($viewoptions,$output);
	}
	
	function toro_actions($value, $row) {
		$print = '';
		//$cname = $this->cname;
		//$res = $this->access_group_detil_model->getbynama($this->session->userdata('user_level'),$cname.'_update');
		//if ($res != 0) {
			$print .= '<a class="btn btn-success btn-xs" href="'.site_url('access_group/updates').'/'.base64_encode($row->id).
				'"><i class="fa fa-fw fa-pencil"></i> Edit Roles</a>';
		//}
		return $print;
	}
	
	function toro_created($post_array)
	{
		$post_array['created'] = date('Y-m-d H:i:s');
		$post_array['created_id'] = $this->session->userdata('user_id');
		$post_array['updated_id'] = $this->session->userdata('user_id');
		return $post_array;
	}
	
	function toro_insert($post_array, $primary_key)
	{
		$logs_insert = array(
			"id_master" => $primary_key,
			"user_id" => $this->session->userdata('user_id'),
			"keterangan" => "a new record has been created by ".$this->session->userdata('user_name')
		);
		$this->load->model('agama_records_model');
		$this->agama_records_model->add($logs_insert);
		return true;
	}
	
	function toro_update($post_array, $primary_key)
	{
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
		$post_array['updated_id'] = $this->session->userdata('user_id');
		return $post_array;
	}
	
	public function updates($id = NULL){
		if ($id == NULL || $id == '') redirect('access_group');
		$id = base64_decode($id);
		
		$this->load->model('access_group_model');
		// checking
		$res = $this->access_group_model->get($id);
		if ($res == 0) {
			redirect('error_badrequest');
		}
		$data['detil'] = $res;
		$data['primary'] = $id;
		
		$this->load->helper('supplier_helper');
		$this->load->helper('barang_helper');
		
		$data['css_files'][0] = base_url('js/bootstrap-datepicker/css/datepicker.css');
		$data['css_files'][1] = base_url('js/bootstrap-datetimepicker/css/datetimepicker.css');
		$data['css_files'][2] = base_url('css/select2.css');
		$data['css_files'][3] = base_url('css/select2-bootstrap.css');
		$data['js_files'][0] = base_url('js/bootstrap-datepicker/js/bootstrap-datepicker.js');
		$data['js_files'][1] = base_url('js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js');
		$data['js_files'][2] = base_url('js/select2.js');
		//$data['js_files'][3] = base_url('js/select2-init.js');

		//options view
		$data['viewoptions']['action'] = "update";
		$data['viewoptions']['type'] = "table";
		$data['viewoptions']['section'] = "users";
		$data['viewoptions']['page'] = "access_group";
		$data['viewoptions']['pageinfo'] = "Update Group Roles";
		$data['viewoptions']['content'] = "master/access_group";
		//$data['viewoptions']['script'] = "master/access_group_script";
		
		$this->writehtml1($data);
	}
	
	public function update($id = NULL) {
		// check validitas data
		$error = '';
		$check = TRUE;
		if (!isset($_POST['accesses'])) {
			$check = FALSE;
			$error .= 'Anda tidak melewati prosedur yang benar. Anda akan dicatat karena berusaha mengubah jalannya sistem.<br>';
		}
		if ($check == FALSE) {
			redirect('error_badrequest');
		}
		
		$id = base64_decode($id);
		if ($id == NULL || $id == '') redirect('error_badrequest');
		$akses = $_POST['accesses'];
		$n = count($akses);
		$toro = '';
		for ($i = 0; $i < $n ; $i++) {
			$toro .= $akses[$i].';;';
		}
		
		$this->load->model('access_group_model');
		$toro_update = array(
			"id" => $id,
			"access_detil" => $toro
		);
		$this->access_group_model->update($toro_update);
		redirect('access_group');
	}
	
	function check_double() {
		$check = false;
		$this->load->model('access_group_model');
		if (!isset($_POST['created'])) {
			$andy = $this->access_group_model->getnama($this->input->post('nama'));
			$lastBarang = $andy[0]['id'];
		}
		$toros = $this->access_group_model->check_double($this->input->post('nama'));
		if ($toros != 0 && isset($_POST['created']))
			$check = true;
		if ($toros != 0 && !isset($_POST['created'])) {
			if ($lastBarang != $this->grocery_crud->getStateInfo()->primary_key)
				$check = true;
		}
		if ($check) {
			$message = 'Group dengan Nama #'.$this->input->post('nama').' sudah ada dalam database';
			$this->form_validation->set_message('check_double', $message);
			return FALSE;
		}
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