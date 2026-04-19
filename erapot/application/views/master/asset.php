<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in')) redirect('login');
		$this->cname = 'customer';
		$this->load->model('access_group_detil_model');
		$res = $this->access_group_detil_model->getbynama($this->session->userdata('user_level'),$this->cname.'_manage');
		if ($res == 0) redirect('dashboard');

		$this->load->library(array('pagination','grocery_CRUD'));
		$this->lang->load('common', $this->session->userdata('user_language'));
		$this->lang->load('customer', $this->session->userdata('user_language'));
	}

	public function index()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('bootstrap');
			$crud->unset_bootstrap();
			$crud->unset_jquery();
			$crud->set_table('customer');
			$crud->set_subject($this->lang->line('customer'));
			$crud->required_fields('id','nama');
			$crud->columns('actions','id','id_m_customer_type','nama','telp','cp_nama','cp_telp1','cp_telp2');
			$crud->unset_fields('updated');
			$crud->unset_edit_fields('created','created_id','updated');
			$crud->field_type('created', 'hidden', '')
				->field_type('created_id', 'hidden', '')
				->field_type('updated_id', 'hidden', '');
			$crud->display_as('id',$this->lang->line('customer_id'))
				->display_as('id_m_customer_type','Customer Type')
				->display_as('nama',$this->lang->line('customer_nama'))
				->display_as('telp',$this->lang->line('customer_telp'))
				->display_as('cp_nama',$this->lang->line('customer_nama_cp'))
				->display_as('cp_telp1',$this->lang->line('customer_telp1'))
				->display_as('cp_telp2',$this->lang->line('customer_telp2'));
			$crud->set_relation('id_m_customer_type','m_customer_type','nama');
			$crud->toro_add(site_url('customer/adds'));
			//$crud->callback_before_insert(array($this,'toro_created'));
			//$crud->callback_after_insert(array($this,'toro_insert'));
			//$crud->callback_before_update(array($this,'toro_update'));
			$crud->callback_column('actions',array($this,'toro_actions'));

			$cname = $this->cname;
			$res = $this->access_group_detil_model->getbynama($this->session->userdata('user_level'),$cname.'_create');
			if ($res == 0) $crud->unset_add();
			$crud->unset_read();
			$crud->unset_edit();
			$crud->unset_delete();

			$output = $crud->render();

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}

		//options view
		$viewoptions['type'] = "table";
		$viewoptions['section'] = "master_data";
		$viewoptions['page'] = "customer";
		$viewoptions['pageinfo'] = $this->lang->line('customer_list');
		$viewoptions['content'] = "grocery";
		$output->viewoptions = $viewoptions;

		$this->writehtml($viewoptions,$output);
	}

	function toro_actions($value, $row) {
		$print = '';
		$cname = $this->cname;
		$res = $this->access_group_detil_model->getbynama($this->session->userdata('user_level'),$cname.'_read');
		if ($res != 0) {
			$print .= '<a class="btn btn-default btn-xs" href="'.site_url('customer/detils').'/'.base64_encode($row->id).
				'"><i class="fa fa-fw fa-search"></i> View</a> ';
		}
		$res = $this->access_group_detil_model->getbynama($this->session->userdata('user_level'),$cname.'_update');
		if ($res != 0) {
			$print .= '<a class="btn btn-default btn-xs" href="'.site_url('customer/updates').'/'.base64_encode($row->id).
				'"><i class="fa fa-fw fa-pencil"></i> Edit</a>';
		}
		/*$res = $this->access_group_detil_model->getbynama($this->session->userdata('user_level'),$cname.'_delete');
		if ($res != 0) {
			$print .= '<a class="btn btn-default btn-xs" href="'.site_url('m_cabang/delete').'/'.base64_encode($row->id).
				'"><i class="fa fa-fw fa-trash"></i> Delete</a>';
		}*/
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

	public function adds ($error = NULL, $detil = NULL)
	{

		$this->load->model('propinsi_model');
		$this->load->model('regencies_model');
		$this->load->model('villages_model');
		$this->load->model('districts_model');
		$this->load->model('m_bentuk_usaha_model');
		$this->load->model('m_jenis_usaha_model');
		$this->load->model('m_industry_type_model');
		$this->load->model('m_customer_type_model');
		$this->load->model('m_crm_event_type_model');
		$this->load->model('m_salutation_model');
		$this->load->model('m_jabatan_model');

		$data['provinces'] = json_encode($this->propinsi_model->getall());
		$data['m_customer_type'] = json_encode($this->m_customer_type_model->getall());
		$data['m_crm_event_type'] = json_encode($this->m_crm_event_type_model->getall());
		$data['m_bentuk_usaha'] = json_encode($this->m_bentuk_usaha_model->getall());
		$data['m_jenis_usaha'] = json_encode($this->m_jenis_usaha_model->getall());
		$data['m_industry_type'] = json_encode($this->m_industry_type_model->getall());
		$data['m_salutation'] = json_encode($this->m_salutation_model->getall());
		$data['m_jabatan'] = json_encode($this->m_jabatan_model->getall());

		if (!is_null($error) && !is_null($detil)) {
			$data['error'] = $error;
			$data['detil'] = $detil;
		}

		$data['js_files'][0] = base_url('js/knockout.js');
		$data['js_files'][1] = base_url('js/knockout-sortable.js');
		$data['js_files'][2] = base_url('js/knockout.validation.js');
		$data['js_files'][3] = base_url('bootstrap/js/wysihtml5-0.3.0.min.js');
		$data['js_files'][4] = base_url('bootstrap/js/bootstrap3-wysihtml5.js');
		$data['js_files'][5] = base_url('bootstrap/js/bootstrap-multiselect.js');
		$data['js_files'][6] = base_url('js/parsley/parsley.min.js');
		$data['js_files'][7] = base_url('js/icheck/skins/icheck.min.js');
		$data['js_files'][8] = base_url('js/icheck-init.js');
		$data['css_files'][0] = base_url('bootstrap/css/bootstrap-wysihtml5.css');
		$data['css_files'][1] = base_url('css/parsley/parsley.css');
		$data['css_files'][2] = base_url('js/icheck/skins/all.css');

		//options view
		$data['viewoptions']['action'] = "add";
		$data['viewoptions']['type'] = "table";
		$data['viewoptions']['section'] = "master_data";
		$data['viewoptions']['page'] = "customer";
		$data['viewoptions']['pageinfo'] = "Add Customer";
		$data['viewoptions']['content'] = "master/customer";
		$data['viewoptions']['script'] = "master/customer_script";

		$this->writehtml1($data);
	}

	public function add() {
		// second check
		$this->form_validation->set_rules('nama', 'Name', 'trim|required|min_length[3]|is_unique[customer.nama]');
		$this->form_validation->set_rules('m_customer_type', 'Customer Type', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
		$this->form_validation->set_rules('npwp', 'NPWP', 'trim|min_length[8]|max_length[30]');

		$status = 0;
		if (isset($_POST['status'])) {
			if ($this->input->post('status') == '1')
				$status = 1;
		}

		if ($this->form_validation->run() == FALSE) {
			$detil[0]['nama'] = $this->input->post('nama');
			$detil[0]['id_m_customer_type'] = $this->input->post('m_customer_type');
			$detil[0]['telp'] = $this->input->post('telp');
			$detil[0]['email'] = $this->input->post('email');
			$detil[0]['website'] = $this->input->post('website');
			$detil[0]['billing_address'] = $this->input->post('billing_address');
			$detil[0]['id_provinces_billing'] = $this->input->post('provinces_billing');
			$detil[0]['id_regencies_billing'] = $this->input->post('regencies_billing');
			$detil[0]['postal_code_billing'] = $this->input->post('postal_code_billing');
			$detil[0]['shipping_address'] = $this->input->post('shipping_address');
			$detil[0]['id_provinces_shipping'] = $this->input->post('provinces_shipping');
			$detil[0]['id_regencies_shipping'] = $this->input->post('regencies_shipping');
			$detil[0]['postal_code_shipping'] = $this->input->post('postal_code_shipping');
			$detil[0]['id_m_bentuk_usaha'] = $this->input->post('bentuk_usaha');
			$detil[0]['id_m_jenis_usaha'] = $this->input->post('jenis_usaha');
			$detil[0]['id_m_industry_type'] = $this->input->post('industry_type');
			$detil[0]['npwp'] = $this->input->post('npwp');
			$detil[0]['keterangan'] = $this->input->post('keterangan');
			$detil[0]['status'] = $status;
			$this->adds(validation_errors(), $detil);
		}
		else {
			$this->load->model('customer_model');
			$this->load->model('customer_event_model');

			$toro_insert = array(
				"nama" => $this->input->post('nama'),
				"id_m_customer_type" => $this->input->post('m_customer_type'),
				"telp" => $this->input->post('telp'),
				"email" => $this->input->post('email'),
				"website" => $this->input->post('website'),
				"billing_address" => $this->input->post('billing_address'),
				"id_provinces_billing" => $this->input->post('provinces_billing'),
				"id_regencies_billing" => $this->input->post('regencies_billing'),
				"postal_code_billing" => $this->input->post('postal_code_billing'),
				"shipping_address" => $this->input->post('shipping_address'),
				"id_provinces_shipping" => $this->input->post('provinces_shipping'),
				"id_regencies_shipping" => $this->input->post('regencies_shipping'),
				"postal_code_shipping" => $this->input->post('postal_code_shipping'),
				"id_m_bentuk_usaha" => $this->input->post('bentuk_usaha'),
				"id_m_jenis_usaha" => $this->input->post('jenis_usaha'),
				"id_m_industry_type" => $this->input->post('industry_type'),
				"npwp" => $this->input->post('npwp'),
				"keterangan" => $this->input->post('keterangan'),
				"status" => $status,
				"created" => date('Y-m-d H:i:s'),
				"created_id" => $this->session->userdata('user_id'),
				"updated_id" => $this->session->userdata('user_id'),
			);
			$toro = $this->customer_model->add($toro_insert);

			// masukkan events
			$events = json_decode($this->input->post('events'));
			$i = 0;
			foreach ($events as $thor => $value) {
				if ($value->tanggal != '' && $value->selectedEvent != '') {
					$i ++;
					$toro_insert = array (
						"id_customer" => $toro,
						"tanggal" => $value->tanggal,
						"id_m_crm_event_type" => $value->selectedEvent,
						"keterangan" => $value->keterangan,
					);
					$this->customer_event_model->add($toro_insert);
				}
			}

			redirect('customer/index/'.$toro);
		}
	}

	public function updates($id = NULL, $error = NULL, $detil = NULL){
		//if ($id != NULL) $data['aftereffect'] = $id;
		if ($id == NULL || $id == '') redirect('error_badrequest');
		$id = base64_decode($id);
		$this->load->model('customer_model');
		$res = $this->customer_model->get($id);
		if ($res == 0) redirect('error_badrequest');
		$this->load->model('customer_event_model');
		$this->load->model('propinsi_model');
		$this->load->model('regencies_model');
		$this->load->model('districts_model');
		$this->load->model('villages_model');
		$this->load->model('m_bentuk_usaha_model');
		$this->load->model('m_jenis_usaha_model');
		$this->load->model('m_industry_type_model');
		$this->load->model('m_customer_type_model');
		$this->load->model('m_crm_event_type_model');
		$this->load->model('m_salutation_model');
		$this->load->model('m_jabatan_model');
		$data['provinces'] = json_encode($this->propinsi_model->getall());
		$data['m_customer_type'] = json_encode($this->m_customer_type_model->getall());
		$data['m_crm_event_type'] = json_encode($this->m_crm_event_type_model->getall());
		$data['m_bentuk_usaha'] = json_encode($this->m_bentuk_usaha_model->getall());
		$data['m_jenis_usaha'] = json_encode($this->m_jenis_usaha_model->getall());
		$data['m_industry_type'] = json_encode($this->m_industry_type_model->getall());
		$data['m_salutation'] = json_encode($this->m_salutation_model->getall());
		$data['m_jabatan'] = json_encode($this->m_jabatan_model->getall());

		if (!is_null($error) && !is_null($detil)) {
			$data['error'] = $error;
			$data['detil'] = $detil;
		}
		else {
			$data['detil'] = $res;
		}
		$data['detils'] = $this->customer_event_model->getbycustomer($id);
		$data['primary'] = $id;

		if($res[0]['id_regencies_billing'] != '' && $res[0]['id_regencies_billing'] != null) {
			$res1 = json_encode($this->regencies_model->getbyprovinces($res[0]['id_provinces_billing']));
			$data['regencies_billing'] = $res1;
		}
		if($res[0]['id_regencies_shipping'] != '' && $res[0]['id_regencies_shipping'] != null) {
			$res1 = json_encode($this->regencies_model->getbyprovinces($res[0]['id_provinces_shipping']));
			$data['regencies_shipping'] = $res1;
		}

		$data['js_files'][0] = base_url('js/knockout.js');
		$data['js_files'][1] = base_url('js/knockout-sortable.js');
		$data['js_files'][2] = base_url('js/knockout.validation.js');
		$data['js_files'][3] = base_url('bootstrap/js/wysihtml5-0.3.0.min.js');
		$data['js_files'][4] = base_url('bootstrap/js/bootstrap3-wysihtml5.js');
		$data['js_files'][5] = base_url('bootstrap/js/bootstrap-multiselect.js');
		$data['js_files'][6] = base_url('js/parsley/parsley.min.js');
		$data['js_files'][7] = base_url('js/icheck/skins/icheck.min.js');
		$data['js_files'][8] = base_url('js/icheck-init.js');
		$data['css_files'][0] = base_url('bootstrap/css/bootstrap-wysihtml5.css');
		$data['css_files'][1] = base_url('css/parsley/parsley.css');
		$data['css_files'][2] = base_url('js/icheck/skins/all.css');

		//options view
		$data['viewoptions']['action'] = "update";
		$data['viewoptions']['type'] = "table";
		$data['viewoptions']['section'] = "master_data";
		$data['viewoptions']['page'] = "customer";
		$data['viewoptions']['pageinfo'] = "Update Customer";
		$data['viewoptions']['content'] = "master/customer";
		$data['viewoptions']['script'] = "master/customer_script";

		$this->writehtml1($data);
	}

	public function update($id = NULL) {
		if ($id == NULL || $id == '') redirect('error_badrequest');
		$id = base64_decode($id);
		$this->load->model('customer_model');
		$res = $this->customer_model->get($id);
		if ($res == 0) redirect('error_badrequest');

		// second check
		$this->form_validation->set_rules('nama', 'Name', 'trim|required|min_length[3]|callback_check_nama');
		$this->form_validation->set_rules('m_customer_type', 'Customer Type', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
		$this->form_validation->set_rules('npwp', 'NPWP', 'trim|min_length[8]|max_length[30]');

		$status = 0;
		if (isset($_POST['status'])) {
			if ($this->input->post('status') == '1')
				$status = 1;
		}

		if ($this->form_validation->run() == FALSE) {
			$detil[0]['nama'] = $this->input->post('nama');
			$detil[0]['id_m_customer_type'] = $this->input->post('m_customer_type');
			$detil[0]['telp'] = $this->input->post('telp');
			$detil[0]['email'] = $this->input->post('email');
			$detil[0]['website'] = $this->input->post('website');
			$detil[0]['billing_address'] = $this->input->post('billing_address');
			$detil[0]['id_provinces_billing'] = $this->input->post('provinces_billing');
			$detil[0]['id_regencies_billing'] = $this->input->post('regencies_billing');
			$detil[0]['postal_code_billing'] = $this->input->post('postal_code_billing');
			$detil[0]['shipping_address'] = $this->input->post('shipping_address');
			$detil[0]['id_provinces_shipping'] = $this->input->post('provinces_shipping');
			$detil[0]['id_regencies_shipping'] = $this->input->post('regencies_shipping');
			$detil[0]['postal_code_shipping'] = $this->input->post('postal_code_shipping');
			$detil[0]['id_m_bentuk_usaha'] = $this->input->post('bentuk_usaha');
			$detil[0]['id_m_jenis_usaha'] = $this->input->post('jenis_usaha');
			$detil[0]['id_m_industry_type'] = $this->input->post('industry_type');
			$detil[0]['npwp'] = $this->input->post('npwp');
			$detil[0]['keterangan'] = $this->input->post('keterangan');
			$detil[0]['status'] = $status;
			$this->updates(base64_encode($id), validation_errors(), $detil);
		}
		else {
			// hapus detil
			$this->load->model('customer_event_model');
			$this->customer_event_model->delete($id);

			$toro_insert = array(
				"id" => $id,
				"nama" => $this->input->post('nama'),
				"id_m_customer_type" => $this->input->post('m_customer_type'),
				"telp" => $this->input->post('telp'),
				"email" => $this->input->post('email'),
				"website" => $this->input->post('website'),
				"billing_address" => $this->input->post('billing_address'),
				"id_provinces_billing" => $this->input->post('provinces_billing'),
				"id_regencies_billing" => $this->input->post('regencies_billing'),
				"postal_code_billing" => $this->input->post('postal_code_billing'),
				"shipping_address" => $this->input->post('shipping_address'),
				"id_provinces_shipping" => $this->input->post('provinces_shipping'),
				"id_regencies_shipping" => $this->input->post('regencies_shipping'),
				"postal_code_shipping" => $this->input->post('postal_code_shipping'),
				"id_m_bentuk_usaha" => $this->input->post('bentuk_usaha'),
				"id_m_jenis_usaha" => $this->input->post('jenis_usaha'),
				"id_m_industry_type" => $this->input->post('industry_type'),
				"npwp" => $this->input->post('npwp'),
				"keterangan" => $this->input->post('keterangan'),
				"status" => $status,
				"updated_id" => $this->session->userdata('user_id'),
			);
			$this->customer_model->update($toro_insert);

			// masukkan events
			$events = json_decode($this->input->post('events'));
			$i = 0;
			foreach ($events as $thor => $value) {
				if ($value->tanggal != '' && $value->selectedEvent != '') {
					$i ++;
					$toro_insert = array (
						"id_customer" => $id,
						"tanggal" => $value->tanggal,
						"id_m_crm_event_type" => $value->selectedEvent,
						"keterangan" => $value->keterangan,
					);
					$this->customer_event_model->add($toro_insert);
				}
			}

			redirect('customer/index/'.$id);
		}
	}

	function check_nama($nama) {
		if($this->input->post('primary'))
			$id = base64_decode($this->input->post('primary'));
		else
			$id = '';
		$this->load->model('customer_model');
		$result = $this->customer_model->check_unique_nama($id, $nama);
		if($result == 0)
			$response = true;
		else {
			$this->form_validation->set_message('check_nama', 'Name must be unique');
			$response = false;
		}
		return $response;
	}

	public function delete($id = NULL)
	{
		if ($id == NULL || $id == '') redirect('m_cabang');
		$id = base64_decode($id);
		$this->load->model('m_cabang_model');
		$this->m_cabang_model->delete($id);
		redirect('m_cabang/index/');
	}

	private function writehtml($viewoptions,$output=null){
		//load view
		$loginas = $this->session->userdata('user_name');
		$output->loginas = $loginas;
		$this->load->view('header', $output);
		$this->load->view('sidebar', $output);
		$this->load->view($viewoptions['content'], $output);
		$this->load->view('footer', $output);
	}

	private function writehtml1($data){
		//load view
		$data['loginas'] = $this->session->userdata('user_name');
		$this->load->view('header', $data);
		$this->load->view('sidebar', $data);
		$this->load->view($data['viewoptions']['content'], $data);
		$this->load->view('footer', $data);
		if (isset($data['viewoptions']['script']))
			$this->load->view($data['viewoptions']['script'], $data);
	}
}
