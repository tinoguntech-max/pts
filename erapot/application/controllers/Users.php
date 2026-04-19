<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in')) redirect('login');
		if($this->session->userdata('user_level') != 2) redirect('dashboard');
		
		$this->load->library(array('pagination','grocery_CRUD'));
		$this->lang->load('common', $this->session->userdata('user_language'));
	}
	
	public function index()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('bootstrap');
			$crud->unset_bootstrap();
			$crud->unset_jquery();
			$crud->set_table('users');
			$crud->set_subject('Pengguna');
			$crud->required_fields('user_id','user_name','user_level','nama');
			$crud->columns('actions','user_id','user_name','user_level','nama','telp','email');
			$crud->unset_delete();
			$crud->display_as('user_id','ID')
				->display_as('user_name','Username')
				->display_as('user_level','Group')
				->display_as('id_m_cabang','Cabang/ Outlet')
				->display_as('id_m_department','Divisi')
				->display_as('id_m_agama','Agama')
				->display_as('id_m_golongan_darah','Golongan Darah')
				->display_as('id_m_jenis_identitas','Jenis Identitas')
				->display_as('id_m_nationality','Kewarganegaraan')
				->display_as('id_m_education','Pendidikan Terakhir')
				->display_as('id_m_status_pernikahan','Status Kawin');
			//$crud->unset_read();
			//$crud->field_type('user_level','dropdown',
				//array('1'=>'Administrator (SU)','2'=>'Data Entry','3'=>'Administrasi'));
			$crud->set_relation('user_level','access_group','nama')
				->set_relation('id_m_cabang','m_cabang','nama')
				->set_relation('id_m_department','m_department','nama')
				->set_relation('id_m_agama','m_agama','nama')
				->set_relation('id_m_golongan_darah','m_golongan_darah','nama')
				->set_relation('id_m_jenis_identitas','m_jenis_identitas','nama')
				->set_relation('id_m_nationality','m_nationality','nama')
				->set_relation('id_m_education','m_education','nama')
				->set_relation('id_m_status_pernikahan','m_status_pernikahan','nama');
			$crud->toro_add(site_url('users/adds'));
			// $crud->callback_edit_field('user_pass',array($this,'toro_empty_pass'));
			// $crud->callback_add_field('user_pass',array($this,'toro_empty_pass'));
			// $crud->callback_before_insert(array($this,'toro_encrypt'));
			// $crud->callback_before_update(array($this,'toro_encrypt_update'));
			$crud->callback_column('actions',array($this,'toro_actions'));
			$crud->unset_read();
			$crud->unset_edit();
			$crud->unset_delete();

			$output = $crud->render();

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
		
		//options view
		$viewoptions['type'] = "table";
		$viewoptions['section'] = "user";
		$viewoptions['page'] = "users";
		$viewoptions['pageinfo'] = "Daftar Pengguna";
		$viewoptions['content'] = "grocery";
		$output->viewoptions = $viewoptions;
		
		$this->writehtml($viewoptions,$output);
	}
	
	function toro_empty_pass()
	{
		return '<input class="form-control" type="password" name="user_pass" value="" />';
	}
	
	function toro_encrypt($post_array)
	{
		$post_array['user_pass'] = sha1($post_array['user_pass']);
		return $post_array;
	}
	
	function toro_encrypt_update($post_array)
	{
		if (!empty($post_array['user_pass']))
			$post_array['user_pass'] = sha1($post_array['user_pass']);
		else
			unset($post_array['user_pass']);
		return $post_array;
	}
	
	function toro_created($post_array)
	{
		$post_array['created'] = date('Y-m-d H:i:s');
		return $post_array;
	}
	
	function toro_actions($value, $row) {
		$print = '';
			$print .= '<a class="btn btn-default btn-xs" href="'.site_url('users/detils').'/'.base64_encode($row->user_id).
				'"><i class="fa fa-fw fa-search"></i> View</a> ';

			$print .= '<a class="btn btn-default btn-xs" href="'.site_url('users/updates').'/'.base64_encode($row->user_id).
				'"><i class="fa fa-fw fa-pencil"></i> Edit</a>';
		/*$res = $this->access_group_detil_model->getbynama($this->session->userdata('user_level'),$cname.'_delete');
		if ($res != 0) {
			$print .= '<a class="btn btn-default btn-xs" href="'.site_url('m_cabang/delete').'/'.base64_encode($row->id).
				'"><i class="fa fa-fw fa-trash"></i> Delete</a>';
		}*/
		return $print;
	}
	
	public function adds ($error = NULL, $detil = NULL)
	{
		
		$this->load->model('m_cabang_model');
		$this->load->model('access_group_model');
		$this->load->model('m_department_model');
		$this->load->model('m_jenis_identitas_model');
		$this->load->model('m_agama_model');
		$this->load->model('m_golongan_darah_model');
		$this->load->model('m_nationality_model');
		$this->load->model('m_status_pernikahan_model');
		$this->load->model('m_skill_model');
		$this->load->model('m_proficiency_model');
		$this->load->model('m_language_model');
		$this->load->model('m_certification_model');
		$this->load->model('m_relationship_model');
		$this->load->model('m_education_model');
		
		$data['m_cabang'] = json_encode($this->m_cabang_model->getall());
		$data['access_group'] = json_encode($this->access_group_model->getall());
		$data['m_department'] = json_encode($this->m_department_model->getall());
		$data['m_jenis_identitas'] = json_encode($this->m_jenis_identitas_model->getall());
		$data['m_agama'] = json_encode($this->m_agama_model->getall());
		$data['m_golongan_darah'] = json_encode($this->m_golongan_darah_model->getall());
		$data['m_nationality'] = json_encode($this->m_nationality_model->getall());
		$data['m_status_pernikahan'] = json_encode($this->m_status_pernikahan_model->getall());
		$data['m_skill'] = json_encode($this->m_skill_model->getall());
		$data['m_proficiency'] = json_encode($this->m_proficiency_model->getall());
		$data['m_language'] = json_encode($this->m_language_model->getall());
		$data['m_certification'] = json_encode($this->m_certification_model->getall());
		$data['m_relationship'] = json_encode($this->m_relationship_model->getall());
		$data['m_education'] = json_encode($this->m_education_model->getall());
		
		
		if (!is_null($error) && !is_null($detil)) {
			$data['error'] = $error;
			$data['detil'] = $detil;
		}
		
		$data['js_files'] = array(base_url('js/knockout.js'),
			base_url('js/bootstrap-datepicker/js/bootstrap-datepicker.js'),
			base_url('js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js'),
			base_url('js/knockout-sortable.js'),
			base_url('js/knockout.validation.js'),
			base_url('js/parsley/parsley.min.js'),
			base_url('js/select2/js/select2.full.min.js'),
			base_url('js/tinymce/tinymce.min.js'),
			base_url('js/tinymce/jquery.tinymce.min.js'));
		$data['css_files'] = array(base_url('css/parsley/parsley.css'),
			base_url('js/bootstrap-datepicker/css/datepicker.css'),
			base_url('js/bootstrap-datetimepicker/css/datetimepicker.css'),
			base_url('js/select2/css/select2.min.css'),
			base_url('js/select2/css/select2-bootstrap.min.css'));
		$this->load->helper('plugins_helper');

		//options view
		$data['viewoptions']['action'] = "add";
		$data['viewoptions']['type'] = "table";
		$data['viewoptions']['section'] = "master_data";
		$data['viewoptions']['page'] = "users";
		$data['viewoptions']['pageinfo'] = "Add Users";
		$data['viewoptions']['content'] = "master/users";
		$data['viewoptions']['script'] = "master/users_script";	

		$this->writehtml1($data);
	}

	public function add() {
		
		if (!isset($_POST['summary'])) redirect('error_badrequest');
		
		$all = json_decode($this->input->post('summary'));
		// check isset value
		if (!isset($all->user_name)) $all->user_name = '';
		if (!isset($all->user_pass)) $all->user_pass = '';
		if (!isset($all->userLevel)) $all->userLevel = '';
		if (!isset($all->nama)) $all->nama = '';
		if (!isset($all->cabang)) $all->cabang = '';
		if (!isset($all->department)) $all->department = NULL;
		if (!isset($all->jenisIdentitas)) $all->jenisIdentitas = NULL;
		if (!isset($all->ssn_nric)) {
			$all->ssn_nric = NULL;
		}
		else {
			if($all->ssn_nric == '' || !is_numeric($all->ssn_nric))
				$all->ssn_nric = NULL;
		}
		if (!isset($all->alamat)) $all->alamat = '';
		if (!isset($all->telp)) $all->telp = '';
		if (!isset($all->email)) $all->email = '';
		if (!isset($all->agama)) $all->agama = NULL;
		if (!isset($all->golonganDarah)) $all->golonganDarah = NULL;
		if (!isset($all->nationality)) $all->nationality = NULL;
		if (!isset($all->statusPernikahan)) $all->statusPernikahan = NULL;
		if (!isset($all->screenLanguage)) $all->screenLanguage = '';
		
		if ($all->user_pass == '' || is_null($all->user_pass)) {
			$password = $res[0]['user_pass'];
		}
		else {
			$options = [
				'cost' => 8,
				'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
			];
			$password = password_hash($all->user_pass, PASSWORD_BCRYPT, $options);
		}
		
		// second check
		$data = array(
			"user_name" => $all->user_name,
			"user_pass" => $password,
			"user_level" => $all->userLevel,
			"nama" => $all->nama,
			"id_m_cabang" => $all->cabang,
			"id_m_department" => $all->department,
			"id_m_jenis_identitas" => $all->jenisIdentitas,
			"ssn_nric" => $all->ssn_nric,
			"alamat" => $all->alamat,
			"telp" => $all->telp,
			"email" => $all->email,
    		"id_m_agama" => $all->agama,
			"id_m_golongan_darah" => $all->golonganDarah,
			"id_m_nationality" => $all->nationality,
			"id_m_status_pernikahan" => $all->statusPernikahan,
			"screen_language" => $all->screenLanguage,
		);
		$this->form_validation->set_data($data);
		$this->form_validation->set_rules('user_name', 'User Name', 'trim|required|min_length[4]|max_length[50]');
		$this->form_validation->set_rules('user_pass', 'Name', 'trim|required');
		$this->form_validation->set_rules('user_level', 'User level', array('trim',function($value){valid_id('access_group', 'id', $value);}));
		$this->form_validation->set_rules('nama', 'Name', 'trim|required|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('id_m_cabang', 'Cabang', array('trim',function($value){valid_id('m_cabang', 'id', $value);}));
		$this->form_validation->set_rules('id_m_department', 'Department', array('trim',function($value){valid_id('m_department', 'id', $value);}));
		$this->form_validation->set_rules('id_m_jenis_identitas', 'Indentity Type', array('trim',function($value){valid_id('m_jenis_identitas', 'id', $value);}));
		$this->form_validation->set_rules('ssn_nric', 'SSN NRIC', 'trim|alpha_numeric');
		$this->form_validation->set_rules('alamat', 'Address', 'trim|max_length[65535]');
		$this->form_validation->set_rules('telp', 'Phone Number', 'trim|alpha_numeric');
		$this->form_validation->set_rules('email', 'Email', 'trim|max_length[65535]');
		$this->form_validation->set_rules('id_m_agama', 'Religion', array('trim',function($value){valid_id('m_agama', 'id', $value);}));
		$this->form_validation->set_rules('id_m_golongan_darah', 'Bloodh Type', array('trim',function($value){valid_id('m_golongan_darah', 'id', $value);}));
		$this->form_validation->set_rules('id_m_nationality', 'Nationality', array('trim',function($value){valid_id('m_nationality', 'id', $value);}));		
		$this->form_validation->set_rules('id_m_status_pernikahan', 'Marital Status', array('trim',function($value){valid_id('m_status_pernikahan', 'id', $value);}));
		$this->form_validation->set_rules('screen_language', 'Screen Language', array('trim', 'required','in_list[indonesia,english]'));
		
		if ($this->form_validation->run() == FALSE) {
			$detil[0] = $data;
			$this->adds(validation_errors(), $detil);
		}
		else {
			$this->load->model('users_model');
			$this->load->model('users_skill_model');
			$this->load->model('users_language_model');
			$this->load->model('users_certification_model');
			$this->load->model('users_dependent_model');
			$this->load->model('users_education_model');
			
			$options = [
				'cost' => 8,
				'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
			];
			$data['user_pass'] = password_hash($all->user_pass, PASSWORD_BCRYPT, $options);
			$toro_insert = $data;
			$toro = $this->users_model->add($toro_insert);
			
			// masukkan certifications
			$certifications = $all->certifications;
			$i = 0;
			foreach ($certifications as $thor => $value) {
				if ($value->selectedCertification != '' && $value->certification_institute != ''&& $value->certification_granted_on != ''
				&& $value->certification_valid_thru != '') {
					$i ++;
					$value->certification_granted_on = date("Y-m-d", strtotime($value->certification_granted_on));
					$value->certification_valid_thru = date("Y-m-d", strtotime($value->certification_valid_thru));
					$toro_insert = array (
						"id_users" => $toro,
						"id_m_certification" => $value->selectedCertification,
						"institute" => $value->certification_institute,
						"granted_on" => $value->certification_granted_on,
						"valid_thru" => $value->certification_valid_thru,						
						"keterangan" => $value->certification_keterangan,
						"created" => date('Y-m-d H:i:s'),
						"created_id" => $this->session->userdata('user_id'),
						"updated_id" => $this->session->userdata('user_id'),
					);
					$this->users_certification_model->add($toro_insert);
				}
			}
			
			// masukkan skills
			$skills = $all->skills;
			$i = 0;
			foreach ($skills as $thor => $value) {
				if ($value->selectedSkill != '' && $value->skill_nilai != '') {
					$i ++;
					$toro_insert = array (
						"id_users" => $toro,
						"id_m_skill" => $value->selectedSkill,
						"nilai" => $value->skill_nilai,
						"keterangan" => $value->skill_keterangan,						
						"created" => date('Y-m-d H:i:s'),
						"created_id" => $this->session->userdata('user_id'),
						"updated_id" => $this->session->userdata('user_id'),
					);
					$this->users_skill_model->add($toro_insert);
				}
			}
			
			// masukkan languages
			$languages = $all->languages;
			$i = 0;
			foreach ($languages as $thor => $value) {
				if ($value->selectedLanguage != '' && $value->selectedProficiencyReading != '' 
				&& $value->selectedProficiencySpeaking != '' 
				&& $value->selectedProficiencyWriting != ''
				&& $value->selectedProficiencyUnderstanding != '') {
					$i ++;
					$toro_insert = array (
						"id_users" => $toro,
						"id_m_language" => $value->selectedLanguage,
						"id_m_proficiency_reading" => $value->selectedProficiencyReading,
						"id_m_proficiency_speaking" => $value->selectedProficiencySpeaking,
						"id_m_proficiency_writing" => $value->selectedProficiencyWriting,
						"id_m_proficiency_understanding" => $value->selectedProficiencyUnderstanding,
						"created" => date('Y-m-d H:i:s'),
						"created_id" => $this->session->userdata('user_id'),
						"updated_id" => $this->session->userdata('user_id'),
					);
					$this->users_language_model->add($toro_insert);
				}
			}
			
			// masukkan dependents
			$dependents = $all->dependents;
			$i = 0;
			foreach ($dependents as $thor => $value) {
				if ($value->dependent_nama != '' && $value->selectedRelationship != '' 
				&& $value->dependent_tanggal_lahir != '' 
				&& $value->dependent_id_number != '') {
					$value->dependent_tanggal_lahir = date("Y-m-d", strtotime($value->dependent_tanggal_lahir));
					$i ++;
					$toro_insert = array (
						"id_users" => $toro,
						"nama" => $value->dependent_nama,
						"id_m_relationship" => $value->selectedRelationship,
						"tanggal_lahir" => $value->dependent_tanggal_lahir,
						"id_number" => $value->dependent_id_number,
						"created" => date('Y-m-d H:i:s'),
						"created_id" => $this->session->userdata('user_id'),
						"updated_id" => $this->session->userdata('user_id'),
					);
					$this->users_dependent_model->add($toro_insert);
				}
			}
			
			// masukkan educations
			$educations = $all->educations;
			$i = 0;
			foreach ($educations as $thor => $value) {
				if ($value->selectedEducation != '' && $value->education_institute != ''&& $value->education_start_date != ''
				&& $value->education_completed_on != '') {
					$i ++;
					$value->education_start_date = date("Y-m-d", strtotime($value->education_start_date));
					$value->education_completed_on = date("Y-m-d", strtotime($value->education_completed_on));
					$toro_insert = array (
						"id_users" => $toro,
						"id_m_education" => $value->selectedEducation,
						"institute" => $value->education_institute,
						"start_date" => $value->education_start_date,
						"completed_on" => $value->education_completed_on,						
						"keterangan" => $value->education_keterangan,
						"created" => date('Y-m-d H:i:s'),
						"created_id" => $this->session->userdata('user_id'),
						"updated_id" => $this->session->userdata('user_id'),
					);
					$this->users_education_model->add($toro_insert);
				}
				
			}
			
			redirect('users/index/'.$toro);
		}
	}

	public function updates($id = NULL, $error = NULL, $detil = NULL){
		//if ($id != NULL) $data['aftereffect'] = $id;
		if ($id == NULL || $id == '') redirect('error_badrequest');
		$id = base64_decode($id);
		$this->load->model('users_model');
		$res = $this->users_model->get($id);
		if ($res == 0) redirect('error_badrequest');
		
		$this->load->model('users_skill_model');
		$this->load->model('users_language_model');
		$this->load->model('users_certification_model');
		$this->load->model('users_dependent_model');
		$this->load->model('users_education_model');
		
		$this->load->model('m_cabang_model');
		$this->load->model('access_group_model');
		$this->load->model('m_department_model');
		$this->load->model('m_jenis_identitas_model');
		$this->load->model('m_agama_model');
		$this->load->model('m_golongan_darah_model');
		$this->load->model('m_nationality_model');
		$this->load->model('m_status_pernikahan_model');
		$this->load->model('m_skill_model');
		$this->load->model('m_proficiency_model');
		$this->load->model('m_language_model');
		$this->load->model('m_certification_model');
		$this->load->model('m_relationship_model');
		$this->load->model('m_education_model');
		
		$data['m_cabang'] = json_encode($this->m_cabang_model->getall());
		$data['access_group'] = json_encode($this->access_group_model->getallopen());
		$data['m_department'] = json_encode($this->m_department_model->getall());
		$data['m_jenis_identitas'] = json_encode($this->m_jenis_identitas_model->getall());
		$data['m_agama'] = json_encode($this->m_agama_model->getall());
		$data['m_golongan_darah'] = json_encode($this->m_golongan_darah_model->getall());
		$data['m_nationality'] = json_encode($this->m_nationality_model->getall());
		$data['m_status_pernikahan'] = json_encode($this->m_status_pernikahan_model->getall());
		$data['m_skill'] = json_encode($this->m_skill_model->getall());
		$data['m_proficiency'] = json_encode($this->m_proficiency_model->getall());
		$data['m_language'] = json_encode($this->m_language_model->getall());
		$data['m_certification'] = json_encode($this->m_certification_model->getall());
		$data['m_relationship'] = json_encode($this->m_relationship_model->getall());
		$data['m_education'] = json_encode($this->m_education_model->getall());
		
		if (!is_null($error) && !is_null($detil)) {
			$data['error'] = $error;
			$data['detil'] = $detil;
		}
		else {
			$data['detil'] = $res;
		}
		$data['detils_skill'] = $this->users_skill_model->getbyusers($id);
		$data['detils_language'] = $this->users_language_model->getbyusers($id);
		$data['detils_certification'] = $this->users_certification_model->getbyusers($id);
		$data['detils_dependent'] = $this->users_dependent_model->getbyusers($id);
		$data['detils_education'] = $this->users_education_model->getbyusers($id);
		$data['primary'] = $id;
		
		// if($res[0]['id_regencies_billing'] != '' && $res[0]['id_regencies_billing'] != null) {
			// $res1 = json_encode($this->regencies_model->getbyprovinces($res[0]['id_provinces_billing']));
			// $data['regencies_billing'] = $res1;
		// }
		// if($res[0]['id_regencies_shipping'] != '' && $res[0]['id_regencies_shipping'] != null) {
			// $res1 = json_encode($this->regencies_model->getbyprovinces($res[0]['id_provinces_shipping']));
			// $data['regencies_shipping'] = $res1;
		// }
		
		$data['js_files'] = array(base_url('js/knockout.js'),
			base_url('js/knockout-sortable.js'),
			base_url('js/knockout.validation.js'),
			base_url('js/parsley/parsley.min.js'),
			base_url('js/select2/js/select2.full.min.js'),
			base_url('js/tinymce/tinymce.min.js'),
			base_url('js/tinymce/jquery.tinymce.min.js'));
		$data['css_files'] = array(base_url('css/parsley/parsley.css'),
			base_url('js/select2/css/select2.min.css'),
			base_url('js/select2/css/select2-bootstrap.min.css'));
		$this->load->helper('plugins_helper');

		//options view
		$data['viewoptions']['action'] = "update";
		$data['viewoptions']['type'] = "table";
		$data['viewoptions']['section'] = "master_data";
		$data['viewoptions']['page'] = "users";
		$data['viewoptions']['pageinfo'] = "Update Users";
		$data['viewoptions']['content'] = "master/users";
		$data['viewoptions']['script'] = "master/users_script";

		$this->writehtml1($data);
	}
	
	public function update($id = NULL) {
		if ($id == NULL || $id == '' || !isset($_POST['summary'])) redirect('error_badrequest');
		$id = base64_decode($id);
		$this->load->model('users_model');
		$res = $this->users_model->get($id);
		if ($res == 0) redirect('error_badrequest');
		
		$this->load->model('users_model');
		$this->load->model('users_skill_model');
		$this->load->model('users_language_model');
		$this->load->model('users_certification_model');
		$this->load->model('users_dependent_model');
		$this->load->model('users_education_model');
		
		$all = json_decode($this->input->post('summary'));
		// check isset value
		if (!isset($all->user_name)) $all->user_name = '';
		if (!isset($all->user_pass)) $all->user_pass = '';
		if (!isset($all->userLevel)) $all->userLevel = '';
		if (!isset($all->nama)) $all->nama = '';
		if (!isset($all->cabang)) $all->cabang = '';
		if (!isset($all->department)) $all->department = NULL;
		if (!isset($all->jenisIdentitas)) $all->jenisIdentitas = NULL;
		if (!isset($all->ssn_nric)) {
			$all->ssn_nric = NULL;
		}
		else {
			if($all->ssn_nric == '' || !is_numeric($all->ssn_nric))
				$all->ssn_nric = NULL;
		}
		if (!isset($all->alamat)) $all->alamat = '';
		if (!isset($all->telp)) $all->telp = '';
		if (!isset($all->email)) $all->email = '';
		if (!isset($all->agama)) $all->agama = NULL;
		if (!isset($all->golonganDarah)) $all->golonganDarah = NULL;
		if (!isset($all->nationality)) $all->nationality = NULL;
		if (!isset($all->statusPernikahan)) $all->statusPernikahan = NULL;
		if (!isset($all->screenLanguage)) $all->screenLanguage = NULL;
		
		if ($all->user_pass == '' || is_null($all->user_pass)) {
			$password = $res[0]['user_pass'];
		}
		else {
			$options = [
				'cost' => 8,
				'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
			];
			$password = password_hash($all->user_pass, PASSWORD_BCRYPT, $options);
		}
		// second check
		$data = array( 
			"user_id" => $id,
			"user_name" => $all->user_name,
			"user_pass" => $password,
			"user_level" => $all->userLevel,
			"nama" => $all->nama,
			"id_m_cabang" => $all->cabang,
			"id_m_department" => $all->department,
			"id_m_jenis_identitas" => $all->jenisIdentitas,
			"ssn_nric" => $all->ssn_nric,
			"alamat" => $all->alamat,
			"telp" => $all->telp,
			"email" => $all->email,
    		"id_m_agama" => $all->agama,
			"id_m_golongan_darah" => $all->golonganDarah,
			"id_m_nationality" => $all->nationality,
			"id_m_status_pernikahan" => $all->statusPernikahan,
			"screen_language" => $all->screenLanguage,
		);
		$this->form_validation->set_data($data);
		$this->form_validation->set_rules('user_name', 'User Name', 'trim|required|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('user_pass', 'Name', 'trim|required');
		$this->form_validation->set_rules('user_level', 'User level', array('trim',function($value){valid_id('access_group', 'id', $value);}));
		$this->form_validation->set_rules('nama', 'Name', 'trim|required|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('id_m_cabang', 'Cabang', array('trim',function($value){valid_id('m_cabang', 'id', $value);}));
		$this->form_validation->set_rules('id_m_department', 'Department', array('trim',function($value){valid_id('m_department', 'id', $value);}));
		$this->form_validation->set_rules('id_m_jenis_identitas', 'Indentity Type', array('trim',function($value){valid_id('m_jenis_identitas', 'id', $value);}));
		$this->form_validation->set_rules('ssn_nric', 'SSN NRIC', 'trim|alpha_numeric');
		$this->form_validation->set_rules('alamat', 'Address', 'trim|max_length[65535]');
		$this->form_validation->set_rules('telp', 'Phone Number', 'trim|alpha_numeric');
		$this->form_validation->set_rules('email', 'Email', 'trim|max_length[65535]');
		$this->form_validation->set_rules('id_m_agama', 'Religion', array('trim',function($value){valid_id('m_agama', 'id', $value);}));
		$this->form_validation->set_rules('id_m_golongan_darah', 'Bloodh Type', array('trim',function($value){valid_id('m_golongan_darah', 'id', $value);}));
		$this->form_validation->set_rules('id_m_nationality', 'Nationality', array('trim',function($value){valid_id('m_nationality', 'id', $value);}));		
		$this->form_validation->set_rules('id_m_status_pernikahan', 'Marital Status', array('trim',function($value){valid_id('m_status_pernikahan', 'id', $value);}));
		$this->form_validation->set_rules('screen_language', 'Screen Language', array('trim', 'required', 'in_list[indonesia,english]'));
		
		if ($this->form_validation->run() == FALSE) {
			$detil[0] = $data;
			$this->updates(base64_encode($id), validation_errors(), $detil);
		}
		else {
			$this->users_language_model->delete($id);
			$this->users_certification_model->delete($id);
			$this->users_dependent_model->delete($id);
			$this->users_education_model->delete($id);
			
			$toro_insert = $data;
			$this->users_model->update($toro_insert);
			// masukkan certifications
			$certifications = $all->certifications;
			$i = 0;
			foreach ($certifications as $thor => $value) {
				if ($value->selectedCertification != '' && $value->certification_institute != ''
				&& $value->certification_granted_on != ''&& $value->certification_valid_thru != '') {
					$i ++;
					$value->certification_granted_on = date("Y-m-d", strtotime($value->certification_granted_on));
					$value->certification_valid_thru = date("Y-m-d", strtotime($value->certification_valid_thru));
					$toro_insert = array (
						"id_users" => $id,
						"id_m_certification" => $value->selectedCertification,
						"institute" => $value->certification_institute,
						"granted_on" => $value->certification_granted_on,
						"valid_thru" => $value->certification_valid_thru,						
						"keterangan" => $value->certification_keterangan,
						"created" => date('Y-m-d H:i:s'),
						"created_id" => $this->session->userdata('user_id'),
						"updated_id" => $this->session->userdata('user_id'),
					);
					$this->users_certification_model->add($toro_insert);
				}
			}
			
			// masukkan skills
			$skills = $all->skills;
			$i = 0;
			foreach ($skills as $thor => $value) {
				if ($value->selectedSkill != '' && $value->skill_nilai != '') {
					$i ++;
					$toro_insert = array (
						"id_users" => $id,
						"id_m_skill" => $value->selectedSkill,
						"nilai" => $value->skill_nilai,
						"keterangan" => $value->skill_keterangan,
						"created" => date('Y-m-d H:i:s'),
						"created_id" => $this->session->userdata('user_id'),
						"updated_id" => $this->session->userdata('user_id'),
					);
					$this->users_skill_model->add($toro_insert);
				}
			}
			
			// masukkan languages
			$languages = $all->languages;
			$i = 0;
			foreach ($languages as $thor => $value) {
				if ($value->selectedLanguage != '' && $value->selectedProficiencyReading != '' 
				&& $value->selectedProficiencySpeaking != '' 
				&& $value->selectedProficiencyWriting != ''
				&& $value->selectedProficiencyUnderstanding != '') {
					$i ++;
					$toro_insert = array (
						"id_users" => $id,
						"id_m_language" => $value->selectedLanguage,
						"id_m_proficiency_reading" => $value->selectedProficiencyReading,
						"id_m_proficiency_speaking" => $value->selectedProficiencySpeaking,
						"id_m_proficiency_writing" => $value->selectedProficiencyWriting,
						"id_m_proficiency_understanding" => $value->selectedProficiencyUnderstanding,
						"created" => date('Y-m-d H:i:s'),
						"created_id" => $this->session->userdata('user_id'),
						"updated_id" => $this->session->userdata('user_id'),
					);
					$this->users_language_model->add($toro_insert);
				}
			}
			
			// masukkan dependents
			$dependents = $all->dependents;
			$i = 0;
			foreach ($dependents as $thor => $value) {
				if ($value->dependent_nama != '' && $value->selectedRelationship != '' 
				&& $value->dependent_tanggal_lahir != '' 
				&& $value->dependent_id_number != '') {
					$i ++;
					$value->dependent_tanggal_lahir = date("Y-m-d", strtotime($value->dependent_tanggal_lahir));
					$toro_insert = array (
						"id_users" => $id,
						"nama" => $value->dependent_nama,
						"id_m_relationship" => $value->selectedRelationship,
						"tanggal_lahir" => $value->dependent_tanggal_lahir,
						"id_number" => $value->dependent_id_number,
						"created" => date('Y-m-d H:i:s'),
						"created_id" => $this->session->userdata('user_id'),
						"updated_id" => $this->session->userdata('user_id'),
					);
					$this->users_dependent_model->add($toro_insert);
				}
			}
			
			// masukkan educations
			$educations = $all->educations;
			$i = 0;
			foreach ($educations as $thor => $value) {
				if ($value->selectedEducation != '' && $value->education_institute != ''&& $value->education_start_date != ''
				&& $value->education_completed_on != '') {
					$i ++;
					$value->education_start_date = date("Y-m-d", strtotime($value->education_start_date));
					$value->education_completed_on = date("Y-m-d", strtotime($value->education_completed_on));
					$toro_insert = array (
						"id_users" => $id,
						"id_m_education" => $value->selectedEducation,
						"institute" => $value->education_institute,
						"start_date" => $value->education_start_date,
						"completed_on" => $value->education_completed_on,						
						"keterangan" => $value->education_keterangan,
						"created" => date('Y-m-d H:i:s'),
						"created_id" => $this->session->userdata('user_id'),
						"updated_id" => $this->session->userdata('user_id'),
					);
					$this->users_education_model->add($toro_insert);
				}
				
			}
			redirect('users/index/'.$id);
		}

	}
	
	public function detils($id = NULL){
		if ($id == NULL || $id == '') redirect('users');
		$id = base64_decode($id);
		
		$this->load->model('users_model');
		// checking
		$res = $this->users_model->get($id);
		if ($res == 0) {
			redirect('error_badrequest');
		}
		$data['detil'] = $res;
		
		$this->load->model('users_skill_model');
		$this->load->model('users_language_model');
		$this->load->model('users_certification_model');
		$this->load->model('users_dependent_model');
		$this->load->model('users_education_model');
		$data['users_skill'] = $this->users_skill_model->getbyusers($id);
		$data['users_language'] = $this->users_language_model->getbyusers($id);
		$data['users_certification'] = $this->users_certification_model->getbyusers($id);
		$data['users_dependent'] = $this->users_dependent_model->getbyusers($id);
		$data['users_education'] = $this->users_education_model->getbyusers($id);
		$data['primary'] = $id;
		
		$this->load->helper('all_helper');

		//options view
		$data['viewoptions']['action'] = "view";
		$data['viewoptions']['type'] = "table";
		$data['viewoptions']['section'] = "users";
		$data['viewoptions']['page'] = "users";
		$data['viewoptions']['pageinfo'] = "View Users";
		$data['viewoptions']['content'] = "master/users_print";
		
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