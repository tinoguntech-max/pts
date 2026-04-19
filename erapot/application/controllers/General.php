<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//redirect('dashboard');
		if(!$this->session->userdata('logged_in')) redirect('login');
		if($this->session->userdata('user_level') != 2) redirect('dashboard');
		
		$this->lang->load('common', $this->session->userdata('user_language'));
	}

	public function index($error = NULL, $detil = NULL){
		$this->load->model('general_model');
		$id = $this->session->userdata('user_id');
		$res = $this->general_model->getnama('nama_lengkap');
		$res1 = $this->general_model->getnama('nama_singkat');
		$res2 = $this->general_model->getnama('alamat_lengkap');
		$res3 = $this->general_model->getnama('alamat_baris1');
		$res4 = $this->general_model->getnama('alamat_baris2');
		$res5 = $this->general_model->getnama('alamat_baris3');
		$res6 = $this->general_model->getnama('contact_lengkap');
		$res7 = $this->general_model->getnama('contact_telepon');
		$res8 = $this->general_model->getnama('id_access_groub');
		$res9 = $this->general_model->getnama('id_service_type');
		$res10 = $this->general_model->getnama('id_m_cost_type');
		$res11 = $this->general_model->getnama('tax');
		$res12 = $this->general_model->getnama('discount');
		
		$this->load->model('access_group_model');
		$this->load->model('m_jenis_service_model');
		$this->load->model('m_cost_type_model');
		$data['access_group'] = json_encode($this->access_group_model->getallopen());
		
		if (!is_null($error) && !is_null($detil)) {
			$data['error'] = $error;
			$data['detil'] = $detil;
		}
		else {		
		$data['detil'][0]['nama_lengkap'] = $res[0]['nilai'];
		$data['detil'][0]['nama_singkat'] = $res1[0]['nilai'];
		$data['detil'][0]['alamat_lengkap'] = $res2[0]['nilai'];
		$data['detil'][0]['alamat_baris1'] = $res3[0]['nilai'];
		$data['detil'][0]['alamat_baris2'] = $res4[0]['nilai'];
		$data['detil'][0]['alamat_baris3'] = $res5[0]['nilai'];
		$data['detil'][0]['contact_lengkap'] = $res6[0]['nilai'];
		$data['detil'][0]['contact_telepon'] = $res7[0]['nilai'];
		$data['detil'][0]['id_access_group'] = $res8[0]['nilai'];
		$data['detil'][0]['id_service_type'] = $res9[0]['nilai'];
		$data['detil'][0]['id_m_cost_type'] = $res10[0]['nilai'];
		$data['detil'][0]['tax'] = $res11[0]['nilai'];
		$data['detil'][0]['discount'] = $res12[0]['nilai'];
		
		}
		$data['primary'] = $id;
		
		$data['js_files'] = array(base_url('js/knockout.js'),
			base_url('js/knockout-sortable.js'),
			base_url('js/knockout.validation.js'),
			base_url('js/parsley/parsley.min.js'),
			base_url('js/select2/js/select2.full.min.js'),
			base_url('semantic/components/checkbox.min.js'),
			base_url('semantic/components/dropdown.min.js'),
			base_url('js/tinymce/tinymce.min.js'),
			base_url('js/tinymce/jquery.tinymce.min.js'));
		$data['css_files'] = array(base_url('css/parsley/parsley.css'),
			base_url('semantic/components/checkbox.min.css'),
			base_url('semantic/components/dropdown.min.css'),
			base_url('js/select2/css/select2.min.css'),
			base_url('js/select2/css/select2-bootstrap.min.css'));
		$this->load->helper('plugins_helper');

		//options view
		$data['viewoptions']['action'] = "update";
		$data['viewoptions']['type'] = "table";
		$data['viewoptions']['section'] = "settings";
		$data['viewoptions']['page'] = "general";
		$data['viewoptions']['pageinfo'] = "Update General Template";
		$data['viewoptions']['content'] = "master/general";
		$data['viewoptions']['script'] = "master/general_script";

		$this->writehtml1($data);
	}
	
	public function update() {
		$this->load->model('general_model');
		$id = $this->session->userdata('user_id');
		
		$all = json_decode($this->input->post('summary'));
		// check isset value
		if (!isset($all->nama_lengkap)) $all->nama_lengkap = '';
		if (!isset($all->nama_singkat)) $all->nama_singkat = '';
		if (!isset($all->alamat_lengkap)) $all->alamat_lengkap = '';
		if (!isset($all->alamat_baris1)) $all->alamat_baris1 = '';
		if (!isset($all->alamat_baris2)) $all->alamat_baris2 = '';
		if (!isset($all->alamat_baris3)) $all->alamat_baris3 = '';
		if (!isset($all->contact_lengkap)) $all->contact_lengkap = '';
		if (!isset($all->contact_telepon)) $all->contact_telepon = '';
		if (!isset($all->driver)) $all->driver = '';
		if (!isset($all->serviceType)) $all->serviceType = '';
		if (!isset($all->costType)) $all->costType = '';
		if (!isset($all->tax_pos)) $all->tax_pos = '';
		if (!isset($all->disc_pos)) $all->disc_pos = '';
			
			$toro_insert = array(
				"nama_lengkap" => $all->nama_lengkap,
				"nama_singkat" => $all->nama_singkat,
				"alamat_lengkap" => $all->alamat_lengkap,
				"alamat_baris1" => $all->alamat_baris1,
				"alamat_baris2" => $all->alamat_baris2,
				"alamat_baris3" => $all->alamat_baris3,
				"contact_lengkap" => $all->contact_lengkap,
				"contact_telepon" => $all->contact_telepon,
				"id_access_group" => $all->driver,
				"id_service_type" => $all->serviceType,
				"id_m_cost_type" => $all->costType,
				"tax" => $all->tax_pos,
				"discount" => $all->disc_pos,
			);
			
			$this->form_validation->set_data($toro_insert);
			$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required|min_length[3]|max_length[200]');
			$this->form_validation->set_rules('nama_singkat', 'Nama Singkat', 'trim|required|min_length[3]|max_length[200]');
			$this->form_validation->set_rules('alamat_lengkap', 'Alamat Lengkap', 'trim|required|min_length[3]|max_length[200]');
			$this->form_validation->set_rules('alamat_baris1', 'Alamat Pertama', 'trim|required|min_length[3]|max_length[200]');
			$this->form_validation->set_rules('alamat_baris2', 'Alamat Kedua', 'trim|required|min_length[3]|max_length[200]');
			$this->form_validation->set_rules('alamat_baris3', 'Alamat Ketiga', 'trim|required|min_length[3]|max_length[200]');
			$this->form_validation->set_rules('contact_lengkap', 'Contact Lengkap', 'trim|required|min_length[3]|max_length[200]');
			$this->form_validation->set_rules('contact_telepon', 'Contact Telepon', 'trim|required|min_length[3]|max_length[200]');
			$this->form_validation->set_rules('id_access_group', 'Driver',
			array('trim',array('satuan_check',function($value){if($value != '') return valid_id('access_group', 'id', $value); else return true;})),
			array('satuan_check'=>'Your Access Groub Driver is no longer valid, choose another!'));
			$this->form_validation->set_rules('id_service_type', 'Service Type',
			array('trim',array('satuan_check',function($value){if($value != '') return valid_id('m_jenis_service', 'id', $value); else return true;})),
			array('satuan_check'=>'Your Service Type is no longer valid, choose another!'));
			$this->form_validation->set_rules('id_m_cost_type', 'Cost Type',
			array('trim',array('satuan_check',function($value){if($value != '') return valid_id('m_cost_type', 'id', $value); else return true;})),
			array('satuan_check'=>'Your Cost Type is no longer valid, choose another!'));
			$this->form_validation->set_rules('tax', 'TAX', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$detil[0] = $toro_insert;
				$this->index(validation_errors(), $detil);
			}
			 else{
				$toro_insert1 = array(
					"id" => 1,
					"nilai" => $all->nama_lengkap,
				);
				
				$toro_insert2 = array(
					"id" => 2,
					"nilai" => $all->nama_singkat,
				);
				
				$toro_insert3 = array(
					"id" => 3,
					"nilai" => $all->alamat_lengkap,
				);
				
				$toro_insert4 = array(
					"id" => 4,
					"nilai" => $all->alamat_baris1,
				);
				
				$toro_insert5 = array(
					"id" => 5,
					"nilai" => $all->alamat_baris2,
				);
				
				$toro_insert6 = array(
					"id" => 6,
					"nilai" => $all->alamat_baris3,
				);
				
				$toro_insert7 = array(
					"id" => 7,
					"nilai" => $all->contact_lengkap,
				);
				
				$toro_insert8 = array(
					"id" => 8,
					"nilai" => $all->contact_telepon,
				);
				
				$toro_insert9 = array(
					"id" => 9,
					"nilai" => $all->driver,
				);
				
				$toro_insert10 = array(
					"id" => 10,
					"nilai" => $all->serviceType,
				);
				
				$toro_insert11 = array(
					"id" => 11,
					"nilai" => $all->costType,
				);
				
				$toro_insert13 = array(
					"id" => 13,
					"nilai" => $all->tax_pos,
				);
				
				$toro_insert14 = array(
					"id" => 14,
					"nilai" => $all->disc_pos,
				);
				
				$this->general_model->update($toro_insert1);
				$this->general_model->update($toro_insert2);
				$this->general_model->update($toro_insert3);
				$this->general_model->update($toro_insert4);
				$this->general_model->update($toro_insert5);
				$this->general_model->update($toro_insert6);
				$this->general_model->update($toro_insert7);
				$this->general_model->update($toro_insert8);
				$this->general_model->update($toro_insert9);
				$this->general_model->update($toro_insert10);
				$this->general_model->update($toro_insert11);
				$this->general_model->update($toro_insert13);
				$this->general_model->update($toro_insert14);
				
				redirect('general');
			}
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
