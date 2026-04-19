<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Access_master extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in')) redirect('login');
		if($this->session->userdata('user_level') != 2) redirect('dashboard');
		
		$this->load->library(array('pagination','grocery_CRUD'));
		$this->lang->load('common', $this->session->userdata('user_language'));
		$this->lang->load('access_master', $this->session->userdata('user_language'));
	}
	
	public function index()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('bootstrap');
			$crud->unset_bootstrap();
			$crud->unset_jquery();
			$crud->set_table('access_master');
			$crud->set_subject($this->lang->line('access_master'));
			$crud->required_fields('id','nama');
			$crud->columns('id','nama','keterangan','updated');
			$crud->unset_fields('updated');
			$crud->unset_edit_fields('created','created_id','updated');
			$crud->field_type('created', 'hidden', '')
				->field_type('created_id', 'hidden', '')
				->field_type('updated_id', 'hidden', '');
			$crud->display_as('id',$this->lang->line('access_master_id'))
				->display_as('nama',$this->lang->line('access_master_nama'))
				->display_as('keterangan',$this->lang->line('access_master_keterangan'));
			$crud->set_rules('nama', 'Nama', 'callback_check_double');
			$crud->callback_before_insert(array($this,'toro_created'));
			//$crud->callback_after_insert(array($this,'toro_insert'));
			$crud->callback_before_update(array($this,'toro_update'));
			if($this->session->userdata('user_level') != 1)
				$crud->unset_delete();

			$output = $crud->render();

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
		
		//options view
		$viewoptions['type'] = "table";
		$viewoptions['section'] = "users";
		$viewoptions['page'] = "access_master";
		$viewoptions['pageinfo'] = $this->lang->line('access_master_list');
		$viewoptions['content'] = "grocery";
		$output->viewoptions = $viewoptions;
		
		$this->writehtml($viewoptions,$output);
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
	
	function check_double() {
		$check = false;
		$this->load->model('access_master_model');
		if (!isset($_POST['created'])) {
			$andy = $this->access_master_model->getnama($this->input->post('nama'));
			$lastBarang = $andy[0]['id'];
		}
		$toros = $this->access_master_model->check_double($this->input->post('nama'));
		if ($toros != 0 && isset($_POST['created']))
			$check = true;
		if ($toros != 0 && !isset($_POST['created'])) {
			if ($lastBarang != $this->grocery_crud->getStateInfo()->primary_key)
				$check = true;
		}
		if ($check) {
			$message = 'Akses dengan Nama #'.$this->input->post('nama').' sudah ada dalam database';
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
}