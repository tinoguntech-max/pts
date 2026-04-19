<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General_template extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//redirect('dashboard');
		if(!$this->session->userdata('logged_in')) redirect('login');
		if($this->session->userdata('user_level') != 2) redirect('dashboard');
		
		$this->lang->load('common', $this->session->userdata('user_language'));
	}

	public function index($error = NULL, $detil = NULL){
		$this->load->model('general_template_model');
		$id = $this->session->userdata('user_id');
		$res = $this->general_template_model->getnama('beli_minta');
		$res1 = $this->general_template_model->getnama('beli_order');
		$res2 = $this->general_template_model->getnama('beli_terima');
		$res3 = $this->general_template_model->getnama('beli_invoice');
		$res4 = $this->general_template_model->getnama('beli_retur');
		$res5 = $this->general_template_model->getnama('beli_bayar');
		$res7 = $this->general_template_model->getnama('jual_order');
		$res8 = $this->general_template_model->getnama('jual_delivery');
		$res9 = $this->general_template_model->getnama('jual_invoice');
		$res10 = $this->general_template_model->getnama('jual_retur');
		$res11 = $this->general_template_model->getnama('jual_bayar');	
		$res12 = $this->general_template_model->getnama('jual_quote');	
		$res13 = $this->general_template_model->getnama('beli_quote');	
		$res14 = $this->general_template_model->getnama('beli_tender');	
		$res16 = $this->general_template_model->getnama('cash_keluar');	
		$res17 = $this->general_template_model->getnama('cash_masuk');			
		$res18 = $this->general_template_model->getnama('beli_manual');			
		$res19 = $this->general_template_model->getnama('jual_lazy');			
		$res20 = $this->general_template_model->getnama('beli_lazy');			
		
		if (!is_null($error) && !is_null($detil)) {
			$data['error'] = $error;
			$data['detil'] = $detil;
		}
		else {		
		$data['detil'][0]['beli_minta'] = $res[0]['nilai'];
		$data['detil'][0]['beli_order'] = $res1[0]['nilai'];
		$data['detil'][0]['beli_terima'] = $res2[0]['nilai'];
		$data['detil'][0]['beli_invoice'] = $res3[0]['nilai'];
		$data['detil'][0]['beli_retur'] = $res4[0]['nilai'];
		$data['detil'][0]['beli_bayar'] = $res5[0]['nilai'];
		$data['detil'][0]['jual_order'] = $res7[0]['nilai'];
		$data['detil'][0]['jual_delivery'] = $res8[0]['nilai'];
		$data['detil'][0]['jual_invoice'] = $res9[0]['nilai'];
		$data['detil'][0]['jual_retur'] = $res10[0]['nilai'];
		$data['detil'][0]['jual_bayar'] = $res11[0]['nilai'];
		$data['detil'][0]['jual_quote'] = $res12[0]['nilai'];
		$data['detil'][0]['beli_quote'] = $res13[0]['nilai'];
		$data['detil'][0]['beli_tender'] = $res14[0]['nilai'];
		$data['detil'][0]['cash_keluar'] = $res16[0]['nilai'];
		$data['detil'][0]['cash_masuk'] = $res17[0]['nilai'];
		$data['detil'][0]['beli_manual'] = $res18[0]['nilai'];
		$data['detil'][0]['jual_lazy'] = $res19[0]['nilai'];
		$data['detil'][0]['beli_lazy'] = $res20[0]['nilai'];
		
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
		$data['viewoptions']['page'] = "general_template";
		$data['viewoptions']['pageinfo'] = "Update General Template";
		$data['viewoptions']['content'] = "master/general_template";
		$data['viewoptions']['script'] = "master/general_template_script";

		$this->writehtml1($data);
	}
	
	public function update() {
		$this->load->model('general_template_model');
		$id = $this->session->userdata('user_id');
		
		$all = json_decode($this->input->post('summary'));
		// check isset value
		if (!isset($all->beli_minta)) $all->beli_minta = '';
		if (!isset($all->beli_order)) $all->beli_order = '';
		if (!isset($all->beli_terima)) $all->beli_terima = '';
		if (!isset($all->beli_invoice)) $all->beli_invoice = '';
		if (!isset($all->beli_retur)) $all->beli_retur = '';
		if (!isset($all->beli_bayar)) $all->beli_bayar = '';
		if (!isset($all->jual_order)) $all->jual_order = '';
		if (!isset($all->jual_delivery)) $all->jual_delivery = '';
		if (!isset($all->jual_invoice)) $all->jual_invoice = '';
		if (!isset($all->jual_retur)) $all->jual_retur = '';
		if (!isset($all->jual_bayar)) $all->jual_bayar = '';
		if (!isset($all->jual_quote)) $all->jual_quote = '';
		if (!isset($all->beli_quote)) $all->beli_quote = '';
		if (!isset($all->beli_tender)) $all->beli_tender = '';
		if (!isset($all->cash_keluar)) $all->cash_keluar = '';
		if (!isset($all->cash_masuk)) $all->cash_masuk = '';
		if (!isset($all->beli_manual)) $all->beli_manual = '';
		if (!isset($all->jual_lazy)) $all->jual_lazy = '';
		if (!isset($all->beli_lazy)) $all->beli_lazy = '';
		
			$toro_insert = array(
				"beli_minta" => $all->beli_minta,
				"beli_order" => $all->beli_order,
				"beli_terima" => $all->beli_terima,
				"beli_invoice" => $all->beli_invoice,
				"beli_retur" => $all->beli_retur,
				"beli_bayar" => $all->beli_bayar,
				"jual_order" => $all->jual_order,
				"jual_delivery" => $all->jual_delivery,
				"jual_invoice" => $all->jual_invoice,
				"jual_retur" => $all->jual_retur,
				"jual_bayar" => $all->jual_bayar,
				"jual_quote" => $all->jual_quote,
				"beli_quote" => $all->beli_quote,
				"beli_tender" => $all->beli_tender,
				"cash_keluar" => $all->cash_keluar,
				"cash_masuk" => $all->cash_masuk,
				"beli_manual" => $all->beli_manual,
				"jual_lazy" => $all->jual_lazy,
				"beli_lazy" => $all->beli_lazy,
			);
			
			$this->form_validation->set_data($toro_insert);
			$this->form_validation->set_rules('beli_minta', 'Beli Minta Template', 'trim|max_length[65535]');
			$this->form_validation->set_rules('beli_order', 'Beli Order Template', 'trim|max_length[65535]');
			$this->form_validation->set_rules('beli_terima', 'Beli Terima Template', 'trim|max_length[65535]');
			$this->form_validation->set_rules('beli_invoice', 'Beli Invoice Template', 'trim|max_length[65535]');
			$this->form_validation->set_rules('beli_retur', 'Beli Retur Template', 'trim|max_length[65535]');
			$this->form_validation->set_rules('beli_bayar', 'Beli Biaya Template', 'trim|max_length[65535]');
			$this->form_validation->set_rules('jual_order', 'Jual Order Template', 'trim|max_length[65535]');
			$this->form_validation->set_rules('jual_delivery', 'Jual Terima Template', 'trim|max_length[65535]');
			$this->form_validation->set_rules('jual_invoice', 'Jual Invoice Template', 'trim|max_length[65535]');
			$this->form_validation->set_rules('jual_retur', 'Jual Retur Template', 'trim|max_length[65535]');
			$this->form_validation->set_rules('jual_bayar', 'Jual Biaya Template', 'trim|max_length[65535]');
			$this->form_validation->set_rules('jual_quote', 'Jual Quote Template', 'trim|max_length[65535]');
			$this->form_validation->set_rules('beli_quote', 'Beli Quote Template', 'trim|max_length[65535]');
			$this->form_validation->set_rules('beli_tender', 'Beli Tender Template', 'trim|max_length[65535]');
			$this->form_validation->set_rules('cash_keluar', 'Beli Cash Keluar Template', 'trim|max_length[65535]');
			$this->form_validation->set_rules('cash_masuk', 'Beli Cash Masuk Template', 'trim|max_length[65535]');
			$this->form_validation->set_rules('beli_manual', 'Beli Manual Template', 'trim|max_length[65535]');
			$this->form_validation->set_rules('jual_lazy', 'Jual Lazy Template', 'trim|max_length[65535]');
			$this->form_validation->set_rules('beli_lazy', 'Beli Lazy Template', 'trim|max_length[65535]');
			
			if ($this->form_validation->run() == FALSE) {
				$detil[0] = $toro_insert;
				$this->index(validation_errors(), $detil);
			}
			 else{
				$toro_insert1 = array(
					"id" => 1,
					"nilai" => $all->beli_minta,
				);
				
				$toro_insert2 = array(
					"id" => 2,
					"nilai" => $all->beli_order,
				);
				
				$toro_insert3 = array(
					"id" => 3,
					"nilai" => $all->beli_terima,
				);
				
				$toro_insert4 = array(
					"id" => 4,
					"nilai" => $all->beli_invoice,
				);
				
				$toro_insert5 = array(
					"id" => 5,
					"nilai" => $all->beli_retur,
				);
				
				$toro_insert6 = array(
					"id" => 6,
					"nilai" => $all->beli_bayar,
				);
				
				$toro_insert8 = array(
					"id" => 8,
					"nilai" => $all->jual_order,
				);
				
				$toro_insert9 = array(
					"id" => 9,
					"nilai" => $all->jual_delivery,
				);
				
				$toro_insert10 = array(
					"id" => 10,
					"nilai" => $all->jual_invoice,
				);
				
				$toro_insert11 = array(
					"id" => 11,
					"nilai" => $all->jual_retur,
				);
				
				$toro_insert12 = array(
					"id" => 12,
					"nilai" => $all->jual_bayar,
				);				
				
				$toro_insert13 = array(
					"id" => 13,
					"nilai" => $all->jual_quote,
				);
				
				$toro_insert14 = array(
					"id" => 14,
					"nilai" => $all->beli_quote,
				);
				
				$toro_insert15 = array(
					"id" => 15,
					"nilai" => $all->beli_tender,
				);
				
				$toro_insert17 = array(
					"id" => 17,
					"nilai" => $all->cash_keluar,
				);
				
				$toro_insert18 = array(
					"id" => 18,
					"nilai" => $all->cash_masuk,
				);
				
				$toro_insert19 = array(
					"id" => 19,
					"nilai" => $all->beli_manual,
				);
				
				$toro_insert20 = array(
					"id" => 20,
					"nilai" => $all->jual_lazy,
				);
				
				$toro_insert21 = array(
					"id" => 21,
					"nilai" => $all->beli_lazy,
				);
				
				$this->general_template_model->update($toro_insert1);
				$this->general_template_model->update($toro_insert2);
				$this->general_template_model->update($toro_insert3);
				$this->general_template_model->update($toro_insert4);
				$this->general_template_model->update($toro_insert5);
				$this->general_template_model->update($toro_insert6);
				$this->general_template_model->update($toro_insert8);
				$this->general_template_model->update($toro_insert9);
				$this->general_template_model->update($toro_insert10);
				$this->general_template_model->update($toro_insert11);
				$this->general_template_model->update($toro_insert12);
				$this->general_template_model->update($toro_insert13);
				$this->general_template_model->update($toro_insert14);
				$this->general_template_model->update($toro_insert15);
				$this->general_template_model->update($toro_insert17);
				$this->general_template_model->update($toro_insert18);
				$this->general_template_model->update($toro_insert19);
				$this->general_template_model->update($toro_insert20);
				$this->general_template_model->update($toro_insert21);
				
				redirect('general_template');
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
