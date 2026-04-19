<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendor extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in')) redirect('login');
		
		$this->load->library(array('pagination','grocery_CRUD'));
		$this->lang->load('common', $this->session->userdata('user_language'));
	}
	
	public function index()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('vendor');
			$crud->set_subject('Vendor');
			$crud->required_fields('id','nama','id_kota','id_kategori','id_type');
			$crud->columns('id','nama','alamat','updated');
			$crud->unset_fields('updated');
			$crud->unset_edit_fields('created','created_id','updated');
			$crud->field_type('created', 'hidden', '')
				->field_type('created_id', 'hidden', '')
				->field_type('updated_id', 'hidden', '');
			$crud->set_relation('id_kota','kota','nama')
				->set_relation('id_kategori','kategori','nama')
				->set_relation('id_type','type','nama');
			$crud->display_as('id','ID')
				->display_as('id_kota','Kota')
				->display_as('id_kategori','Kategori')
				->display_as('id_type','Type');
			$crud->set_field_upload('logo','assets/uploads/files/logo');
			$crud->callback_before_upload(array($this,'_valid_images'));
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
		$viewoptions['section'] = "master_data";
		$viewoptions['page'] = "vendor";
		$viewoptions['pageinfo'] = "Daftar Vendor";
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
	
	public function _valid_images($files_to_upload, $field_info)
	{
		if($files_to_upload[$field_info->encrypted_field_name]['type'] != 'image/jpg')
			return 'Sorry, we only accept JPG file type';
		if($files_to_upload[$field_info->encrypted_field_name]['size'] > '100KB')
			return 'Sorry, we only accept file under 100KB for logo';
		return true;
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