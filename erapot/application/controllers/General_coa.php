<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General_coa extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//redirect('dashboard');
		if(!$this->session->userdata('logged_in')) redirect('login');
		if($this->session->userdata('user_level') != 2) redirect('dashboard');
		
		$this->lang->load('common', $this->session->userdata('user_language'));
	}

	public function index($error = NULL, $detil = NULL){
		$this->load->model('general_coa_model');
		$this->load->model('m_coa_model');
		$id = $this->session->userdata('user_id');
		$res = $this->general_coa_model->getnama('beli_terima');
		$res1 = $this->general_coa_model->getnama('beli_retur');
		$res2 = $this->general_coa_model->getnama('beli_bayar');
		$res3 = $this->general_coa_model->getnama('jual_delivery');
		$res4 = $this->general_coa_model->getnama('jual_retur');
		$res5 = $this->general_coa_model->getnama('jual_bayar');
		$res6 = $this->general_coa_model->getnama('beli_motor_terima');
		$res7 = $this->general_coa_model->getnama('beli_motor_bayar');
		$res8 = $this->general_coa_model->getnama('jual_motor_delivery');
		$res9 = $this->general_coa_model->getnama('jual_motor_bayar');
		$res10 = $this->general_coa_model->getnama('payroll_minta');
		$res11 = $this->general_coa_model->getnama('payroll_bayar');
		
		$data['m_coa'] = json_encode($this->m_coa_model->getallopen());
		
		if (!is_null($error) && !is_null($detil)) {
			$data['error'] = $error;
			$data['detil'] = $detil;
		}
		else {		
		//pembelian
		$data['detil'][0]['beli_terima_debet1'] = $res[0]['id_m_coa_debet1'];
		$data['detil'][0]['beli_terima_debet2'] = $res[0]['id_m_coa_debet2'];
		$data['detil'][0]['beli_terima_credit1'] = $res[0]['id_m_coa_credit1'];
		$data['detil'][0]['beli_terima_credit2'] = $res[0]['id_m_coa_credit2'];
		$data['detil'][0]['beli_retur_debet1'] = $res1[0]['id_m_coa_debet1'];
		$data['detil'][0]['beli_retur_debet2'] = $res1[0]['id_m_coa_debet2'];
		$data['detil'][0]['beli_retur_credit1'] = $res1[0]['id_m_coa_credit1'];
		$data['detil'][0]['beli_retur_credit2'] = $res1[0]['id_m_coa_credit2'];
		$data['detil'][0]['beli_bayar_debet1'] = $res2[0]['id_m_coa_debet1'];
		$data['detil'][0]['beli_bayar_debet2'] = $res2[0]['id_m_coa_debet2'];
		$data['detil'][0]['beli_bayar_credit1'] = $res2[0]['id_m_coa_credit1'];
		$data['detil'][0]['beli_bayar_credit2'] = $res2[0]['id_m_coa_credit2'];
		//penjualan
		$data['detil'][0]['jual_delivery_debet1'] = $res3[0]['id_m_coa_debet1'];
		$data['detil'][0]['jual_delivery_debet2'] = $res3[0]['id_m_coa_debet2'];
		$data['detil'][0]['jual_delivery_credit1'] = $res3[0]['id_m_coa_credit1'];
		$data['detil'][0]['jual_delivery_credit2'] = $res3[0]['id_m_coa_credit2'];
		$data['detil'][0]['jual_retur_debet1'] = $res4[0]['id_m_coa_debet1'];
		$data['detil'][0]['jual_retur_debet2'] = $res4[0]['id_m_coa_debet2'];
		$data['detil'][0]['jual_retur_credit1'] = $res4[0]['id_m_coa_credit1'];
		$data['detil'][0]['jual_retur_credit2'] = $res4[0]['id_m_coa_credit2'];
		$data['detil'][0]['jual_bayar_debet1'] = $res5[0]['id_m_coa_debet1'];
		$data['detil'][0]['jual_bayar_debet2'] = $res5[0]['id_m_coa_debet2'];
		$data['detil'][0]['jual_bayar_credit1'] = $res5[0]['id_m_coa_credit1'];
		$data['detil'][0]['jual_bayar_credit2'] = $res5[0]['id_m_coa_credit2'];
		//motor
		$data['detil'][0]['beli_motor_terima_debet1'] = $res6[0]['id_m_coa_debet1'];
		$data['detil'][0]['beli_motor_terima_debet2'] = $res6[0]['id_m_coa_debet2'];
		$data['detil'][0]['beli_motor_terima_credit1'] = $res6[0]['id_m_coa_credit1'];
		$data['detil'][0]['beli_motor_terima_credit2'] = $res6[0]['id_m_coa_credit2'];
		$data['detil'][0]['beli_motor_bayar_debet1'] = $res7[0]['id_m_coa_debet1'];
		$data['detil'][0]['beli_motor_bayar_debet2'] = $res7[0]['id_m_coa_debet2'];
		$data['detil'][0]['beli_motor_bayar_credit1'] = $res7[0]['id_m_coa_credit1'];
		$data['detil'][0]['beli_motor_bayar_credit2'] = $res7[0]['id_m_coa_credit2'];
		$data['detil'][0]['jual_motor_delivery_debet1'] = $res8[0]['id_m_coa_debet1'];
		$data['detil'][0]['jual_motor_delivery_debet2'] = $res8[0]['id_m_coa_debet2'];
		$data['detil'][0]['jual_motor_delivery_credit1'] = $res8[0]['id_m_coa_credit1'];
		$data['detil'][0]['jual_motor_delivery_credit2'] = $res8[0]['id_m_coa_credit2'];
		$data['detil'][0]['jual_motor_bayar_debet1'] = $res9[0]['id_m_coa_debet1'];
		$data['detil'][0]['jual_motor_bayar_debet2'] = $res9[0]['id_m_coa_debet2'];
		$data['detil'][0]['jual_motor_bayar_credit1'] = $res9[0]['id_m_coa_credit1'];
		$data['detil'][0]['jual_motor_bayar_credit2'] = $res9[0]['id_m_coa_credit2'];
		//payroll
		$data['detil'][0]['payroll_minta_debet1'] = $res10[0]['id_m_coa_debet1'];
		$data['detil'][0]['payroll_minta_debet2'] = $res10[0]['id_m_coa_debet2'];
		$data['detil'][0]['payroll_minta_credit1'] = $res10[0]['id_m_coa_credit1'];
		$data['detil'][0]['payroll_minta_credit2'] = $res10[0]['id_m_coa_credit2'];
		$data['detil'][0]['payroll_bayar_debet1'] = $res11[0]['id_m_coa_debet1'];
		$data['detil'][0]['payroll_bayar_debet2'] = $res11[0]['id_m_coa_debet2'];
		$data['detil'][0]['payroll_bayar_credit1'] = $res11[0]['id_m_coa_credit1'];
		$data['detil'][0]['payroll_bayar_credit2'] = $res11[0]['id_m_coa_credit2'];
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
		$data['viewoptions']['page'] = "general_coa";
		$data['viewoptions']['pageinfo'] = "Update General COA";
		$data['viewoptions']['content'] = "master/general_coa";
		$data['viewoptions']['script'] = "master/general_coa_script";

		$this->writehtml1($data);
	}
	
	public function update() {
		$this->load->model('general_coa_model');
		$id = $this->session->userdata('user_id');
		
		$all = json_decode($this->input->post('summary'));
		// check isset value
		if (!isset($all->purchaseReciptCoaDebet1)) $all->purchaseReciptCoaDebet1 = '';
		if (!isset($all->purchaseReciptCoaDebet2)) $all->purchaseReciptCoaDebet2 = '';
		if (!isset($all->purchaseReciptCoaCredit1)) $all->purchaseReciptCoaCredit1 = '';
		if (!isset($all->purchaseReciptCoaCredit2)) $all->purchaseReciptCoaCredit2 = '';
		if (!isset($all->purchaseReturnCoaDebet1)) $all->purchaseReturnCoaDebet1 = '';
		if (!isset($all->purchaseReturnCoaDebet2)) $all->purchaseReturnCoaDebet2 = '';
		if (!isset($all->purchaseReturnCoaCredit1)) $all->purchaseReturnCoaCredit1 = '';
		if (!isset($all->purchaseReturnCoaCredit2)) $all->purchaseReturnCoaCredit2 = '';
		if (!isset($all->purchasePaymentCoaDebet1)) $all->purchasePaymentCoaDebet1 = '';
		if (!isset($all->purchasePaymentCoaDebet2)) $all->purchasePaymentCoaDebet2 = '';
		if (!isset($all->purchasePaymentCoaCredit1)) $all->purchasePaymentCoaCredit1 = '';
		if (!isset($all->purchasePaymentCoaCredit2)) $all->purchasePaymentCoaCredit2 = '';
		if (!isset($all->salesDeliveryCoaDebet1)) $all->salesDeliveryCoaDebet1 = '';
		if (!isset($all->salesDeliveryCoaDebet2)) $all->salesDeliveryCoaDebet2 = '';
		if (!isset($all->salesDeliveryCoaCredit1)) $all->salesDeliveryCoaCredit1 = '';
		if (!isset($all->salesDeliveryCoaCredit2)) $all->salesDeliveryCoaCredit2 = '';
		if (!isset($all->salesReturnCoaDebet1)) $all->salesReturnCoaDebet1 = '';
		if (!isset($all->salesReturnCoaDebet2)) $all->salesReturnCoaDebet2 = '';
		if (!isset($all->salesReturnCoaCredit1)) $all->salesReturnCoaCredit1 = '';
		if (!isset($all->salesReturnCoaCredit2)) $all->salesReturnCoaCredit2 = '';
		if (!isset($all->salesPaymentCoaDebet1)) $all->salesPaymentCoaDebet1 = '';
		if (!isset($all->salesPaymentCoaDebet2)) $all->salesPaymentCoaDebet2 = '';
		if (!isset($all->salesPaymentCoaCredit1)) $all->salesPaymentCoaCredit1 = '';
		if (!isset($all->salesPaymentCoaCredit2)) $all->salesPaymentCoaCredit2 = '';
		if (!isset($all->motorPurchaseReciptCoaDebet1)) $all->motorPurchaseReciptCoaDebet1 = '';
		if (!isset($all->motorPurchaseReciptCoaDebet2)) $all->motorPurchaseReciptCoaDebet2 = '';
		if (!isset($all->motorPurchaseReciptCoaCredit1)) $all->motorPurchaseReciptCoaCredit1 = '';
		if (!isset($all->motorPurchaseReciptCoaCredit2)) $all->motorPurchaseReciptCoaCredit2 = '';
		if (!isset($all->motorPurchasePaymentCoaDebet1)) $all->motorPurchasePaymentCoaDebet1 = '';
		if (!isset($all->motorPurchasePaymentCoaDebet2)) $all->motorPurchasePaymentCoaDebet2 = '';
		if (!isset($all->motorPurchasePaymentCoaCredit1)) $all->motorPurchasePaymentCoaCredit1 = '';
		if (!isset($all->motorPurchasePaymentCoaCredit2)) $all->motorPurchasePaymentCoaCredit2 = '';
		if (!isset($all->motorSalesDeliveryCoaDebet1)) $all->motorSalesDeliveryCoaDebet1 = '';
		if (!isset($all->motorSalesDeliveryCoaDebet2)) $all->motorSalesDeliveryCoaDebet2 = '';
		if (!isset($all->motorSalesDeliveryCoaCredit1)) $all->motorSalesDeliveryCoaCredit1 = '';
		if (!isset($all->motorSalesDeliveryCoaCredit2)) $all->motorSalesDeliveryCoaCredit2 = '';
		if (!isset($all->motorSalesPaymentCoaDebet1)) $all->motorSalesPaymentCoaDebet1 = '';
		if (!isset($all->motorSalesPaymentCoaDebet2)) $all->motorSalesPaymentCoaDebet2 = '';
		if (!isset($all->motorSalesPaymentCoaCredit1)) $all->motorSalesPaymentCoaCredit1 = '';
		if (!isset($all->motorSalesPaymentCoaCredit2)) $all->motorSalesPaymentCoaCredit2 = '';
		if (!isset($all->payrollRequestCoaDebet1)) $all->payrollRequestCoaDebet1 = '';
		if (!isset($all->payrollRequestCoaDebet2)) $all->payrollRequestCoaDebet2 = '';
		if (!isset($all->payrollRequestCoaCredit1)) $all->payrollRequestCoaCredit1 = '';
		if (!isset($all->payrollRequestCoaCredit2)) $all->payrollRequestCoaCredit2 = '';
		if (!isset($all->payrollPaymentCoaDebet1)) $all->payrollPaymentCoaDebet1 = '';
		if (!isset($all->payrollPaymentCoaDebet2)) $all->payrollPaymentCoaDebet2 = '';
		if (!isset($all->payrollPaymentCoaCredit1)) $all->payrollPaymentCoaCredit1 = '';
		if (!isset($all->payrollPaymentCoaCredit2)) $all->payrollPaymentCoaCredit2 = '';
		
			$toro_insert = array(
				"beli_terima_debet1" => $all->purchaseReciptCoaDebet1,
				"beli_terima_debet2" => $all->purchaseReciptCoaDebet2,
				"beli_terima_credit1" => $all->purchaseReciptCoaCredit1,
				"beli_terima_credit2" => $all->purchaseReciptCoaCredit2,
				"beli_retur_debet1" => $all->purchaseReturnCoaDebet1,
				"beli_retur_debet2" => $all->purchaseReturnCoaDebet2,
				"beli_retur_credit1" => $all->purchaseReturnCoaCredit1,
				"beli_retur_credit2" => $all->purchaseReturnCoaCredit2,
				"beli_bayar_debet1" => $all->purchasePaymentCoaDebet1,
				"beli_bayar_debet2" => $all->purchasePaymentCoaDebet2,
				"beli_bayar_credit1" => $all->purchasePaymentCoaCredit1,
				"beli_bayar_credit2" => $all->purchasePaymentCoaCredit2,
				"jual_delivery_debet1" => $all->salesDeliveryCoaDebet1,
				"jual_delivery_debet2" => $all->salesDeliveryCoaDebet2,
				"jual_delivery_credit1" => $all->salesDeliveryCoaCredit1,
				"jual_delivery_credit2" => $all->salesDeliveryCoaCredit2,
				"jual_retur_debet1" => $all->salesReturnCoaDebet1,
				"jual_retur_debet2" => $all->salesReturnCoaDebet2,
				"jual_retur_credit1" => $all->salesReturnCoaCredit1,
				"jual_retur_credit2" => $all->salesReturnCoaCredit2,
				"jual_bayar_debet1" => $all->salesPaymentCoaDebet1,
				"jual_bayar_debet2" => $all->salesPaymentCoaDebet2,
				"jual_bayar_credit1" => $all->salesPaymentCoaCredit1,
				"jual_bayar_credit2" => $all->salesPaymentCoaCredit2,
				"beli_motor_terima_debet1" => $all->motorPurchaseReciptCoaDebet1,
				"beli_motor_terima_debet2" => $all->motorPurchaseReciptCoaDebet2,
				"beli_motor_terima_credit1" => $all->motorPurchaseReciptCoaCredit1,
				"beli_motor_terima_credit2" => $all->motorPurchaseReciptCoaCredit2,
				"beli_motor_bayar_debet1" => $all->motorPurchasePaymentCoaDebet1,
				"beli_motor_bayar_debet2" => $all->motorPurchasePaymentCoaDebet2,
				"beli_motor_bayar_credit1" => $all->motorPurchasePaymentCoaCredit1,
				"beli_motor_bayar_credit2" => $all->motorPurchasePaymentCoaCredit2,
				"jual_motor_delivery_debet1" => $all->motorSalesDeliveryCoaDebet1,
				"jual_motor_delivery_debet2" => $all->motorSalesDeliveryCoaDebet2,
				"jual_motor_delivery_credit1" => $all->motorSalesDeliveryCoaCredit1,
				"jual_motor_delivery_credit2" => $all->motorSalesDeliveryCoaCredit2,
				"jual_motor_bayar_debet1" => $all->motorSalesPaymentCoaDebet1,
				"jual_motor_bayar_debet2" => $all->motorSalesPaymentCoaDebet2,
				"jual_motor_bayar_credit1" => $all->motorSalesPaymentCoaCredit1,
				"jual_motor_bayar_credit2" => $all->motorSalesPaymentCoaCredit2,
				"payroll_minta_debet1" => $all->payrollRequestCoaDebet1,
				"payroll_minta_debet2" => $all->payrollRequestCoaDebet2,
				"payroll_minta_credit1" => $all->payrollRequestCoaCredit1,
				"payroll_minta_credit2" => $all->payrollRequestCoaCredit2,
				"payroll_bayar_debet1" => $all->payrollPaymentCoaDebet1,
				"payroll_bayar_debet2" => $all->payrollPaymentCoaDebet2,
				"payroll_bayar_credit1" => $all->payrollPaymentCoaCredit1,
				"payroll_bayar_credit2" => $all->payrollPaymentCoaCredit2,
				
			);
			
			$this->form_validation->set_data($toro_insert);			
			$this->form_validation->set_rules('beli_terima_debet1', 'Item Recipt COA Debet 1',
			array('trim',array('puchase_recipt_debet1_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('puchase_recipt_debet1_check'=>'You must choose a Item Recipt COA Debet 1 or your Item Recipt COA Debet 1 no longer valid, choose another!'));
			$this->form_validation->set_rules('beli_terima_debet2', 'Item Recipt COA Debet 2',
			array('trim',array('puchase_recipt_debet2_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('puchase_recipt_debet2_check'=>'You must choose a Item Recipt COA Debet 2 or your Item Recipt COA Debet 2 no longer valid, choose another!'));
			$this->form_validation->set_rules('beli_terima_credit1', 'Item Recipt COA Credit 1',
			array('trim',array('puchase_recipt_credit1_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('puchase_recipt_credit1_check'=>'You must choose a Item Recipt COA Credit 1 or your Item Recipt COA Credit 1 no longer valid, choose another!'));
			$this->form_validation->set_rules('beli_terima_credit2', 'Item Recipt COA Credit 2',
			array('trim',array('puchase_recipt_credit2_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('puchase_recipt_credit2_check'=>'You must choose a Item Recipt COA Credit 2 or your Item Recipt COA Credit 2 no longer valid, choose another!'));
			$this->form_validation->set_rules('beli_retur_debet1', 'Purchase Return COA Debet 1',
			array('trim',array('puchase_return_debet1_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('puchase_return_debet1_check'=>'You must choose a Purchase Return COA Debet 1 or your Purchase Return COA Debet 1 no longer valid, choose another!'));
			$this->form_validation->set_rules('beli_retur_debet2', 'Purchase Return COA Debet 2',
			array('trim',array('puchase_return_debet2_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('puchase_return_debet2_check'=>'You must choose a Purchase Return COA Debet 2 or your Purchase Return COA Debet 2 no longer valid, choose another!'));
			$this->form_validation->set_rules('beli_retur_credit1', 'Purchase Return COA Credit 1',
			array('trim',array('puchase_return_credit1_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('puchase_return_credit1_check'=>'You must choose a Purchase Return COA Credit 1 or your Purchase Return COA Credit 1 no longer valid, choose another!'));
			$this->form_validation->set_rules('beli_retur_credit2', 'Purchase Return COA Credit 2',
			array('trim',array('puchase_return_credit2_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('puchase_recipt_credit2_check'=>'You must choose a Purchase Recipt COA Credit 2 or your Purchase Recipt COA Credit 2 no longer valid, choose another!'));
			$this->form_validation->set_rules('beli_bayar_debet1', 'Debt Payment COA Debet 1',
			array('trim',array('puchase_payment_debet1_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('puchase_payment_debet1_check'=>'You must choose a Debt Payment COA Debet 1 or your Debt Payment COA Debet 1 no longer valid, choose another!'));
			$this->form_validation->set_rules('beli_bayar_debet2', 'Debt Payment COA Debet 2',
			array('trim',array('puchase_payment_debet2_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('puchase_payment_debet2_check'=>'You must choose a Debt Payment COA Debet 2 or your Debt Payment COA Debet 2 no longer valid, choose another!'));
			$this->form_validation->set_rules('beli_bayar_credit1', 'Debt Payment COA Credit 1',
			array('trim',array('puchase_payment_credit1_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('puchase_payment_credit1_check'=>'You must choose a Debt Payment COA Credit 1 or your Debt Payment COA Credit 1 no longer valid, choose another!'));
			$this->form_validation->set_rules('beli_bayar_credit2', 'Debt Payment COA Credit 2',
			array('trim',array('puchase_Payment_credit2_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('puchase_payment_credit2_check'=>'You must choose a Debt Payment COA Credit 2 or your Debt Payment COA Credit 2 no longer valid, choose another!'));
			$this->form_validation->set_rules('jual_delivery_debet1', 'Delivery Order COA Debet 1',
			array('trim',array('sales_recipt_debet1_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('sales_recipt_debet1_check'=>'You must choose a Delivery Order COA Debet 1 or your Delivery Order COA Debet 1 no longer valid, choose another!'));
			$this->form_validation->set_rules('jual_delivery_debet2', 'Delivery Order COA Debet 2',
			array('trim',array('sales_recipt_debet2_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('sales_recipt_debet2_check'=>'You must choose a Delivery Order COA Debet 2 or your Delivery Order COA Debet 2 no longer valid, choose another!'));
			$this->form_validation->set_rules('jual_delivery_credit1', 'Delivery Order COA Credit 1',
			array('trim',array('sales_recipt_credit1_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('sales_recipt_credit1_check'=>'You must choose a Delivery Order COA Credit 1 or your Delivery Order COA Credit 1 no longer valid, choose another!'));
			$this->form_validation->set_rules('jual_delivery_credit2', 'Delivery Order COA Credit 2',
			array('trim',array('sales_recipt_credit2_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('sales_recipt_credit2_check'=>'You must choose a Delivery Order COA Credit 2 or your Delivery Order COA Credit 2 no longer valid, choose another!'));
			$this->form_validation->set_rules('jual_retur_debet1', 'Sales Return COA Debet 1',
			array('trim',array('sales_return_debet1_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('sales_return_debet1_check'=>'You must choose a Sales Return COA Debet 1 or your Sales Return COA Debet 1 no longer valid, choose another!'));
			$this->form_validation->set_rules('jual_retur_debet2', 'Sales Return COA Debet 2',
			array('trim',array('sales_return_debet2_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('sales_return_debet2_check'=>'You must choose a Sales Return COA Debet 2 or your Sales Return COA Debet 2 no longer valid, choose another!'));
			$this->form_validation->set_rules('jual_retur_credit1', 'Sales Return COA Credit 1',
			array('trim',array('sales_return_credit1_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('sales_return_credit1_check'=>'You must choose a Sales Return COA Credit 1 or your Sales Return COA Credit 1 no longer valid, choose another!'));
			$this->form_validation->set_rules('jual_retur_credit2', 'Sales Return COA Credit 2',
			array('trim',array('sales_return_credit2_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('sales_recipt_credit2_check'=>'You must choose a Sales Delivery COA Credit 2 or your Sales Delivery COA Credit 2 no longer valid, choose another!'));
			$this->form_validation->set_rules('jual_bayar_debet1', 'Payment of Receivables COA Debet 1',
			array('trim',array('sales_Payment_debet1_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('sales_payment_debet1_check'=>'You must choose a Payment of Receivables COA Debet 1 or your Payment of Receivables COA Debet 1 no longer valid, choose another!'));
			$this->form_validation->set_rules('jual_bayar_debet2', 'Payment of Receivables COA Debet 2',
			array('trim',array('sales_Payment_debet2_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('sales_payment_debet2_check'=>'You must choose a Payment of Receivables COA Debet 2 or your Payment of Receivables COA Debet 2 no longer valid, choose another!'));
			$this->form_validation->set_rules('jual_bayar_credit1', 'Payment of Receivables COA Credit 1',
			array('trim',array('sales_Payment_credit1_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('sales_payment_credit1_check'=>'You must choose a Payment of Receivables COA Credit 1 or your Payment of Receivables COA Credit 1 no longer valid, choose another!'));
			$this->form_validation->set_rules('jual_bayar_credit2', 'Payment of Receivables COA Credit 2',
			array('trim',array('sales_Payment_credit2_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('sales_payment_credit2_check'=>'You must choose a Payment of Receivables COA Credit 2 or your Payment of Receivables COA Credit 2 no longer valid, choose another!'));
			$this->form_validation->set_rules('beli_motor_terima_debet1', 'Item Recipt COA Debet 1',
			array('trim',array('motor_recipt_debet1_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('motor_recipt_debet1_check'=>'You must choose a Item Recipt COA Debet 1 or your Item Recipt COA Debet 1 no longer valid, choose another!'));
			$this->form_validation->set_rules('beli_motor_terima_debet2', 'Item Recipt COA Debet 2',
			array('trim',array('motor_recipt_debet2_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('motor_recipt_debet2_check'=>'You must choose a Item Recipt COA Debet 2 or your Item Recipt COA Debet 2 no longer valid, choose another!'));
			$this->form_validation->set_rules('beli_motor_terima_credit1', 'Item Recipt COA Credit 1',
			array('trim',array('motor_recipt_credit1_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('motor_recipt_credit1_check'=>'You must choose a Item Recipt COA Credit 1 or your Item Recipt COA Credit 1 no longer valid, choose another!'));
			$this->form_validation->set_rules('beli_motor_terima_credit2', 'Item Recipt COA Credit 2',
			array('trim',array('motor_recipt_credit2_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('motor_recipt_credit2_check'=>'You must choose a Item Recipt COA Credit 2 or your Item Recipt COA Credit 2 no longer valid, choose another!'));
			$this->form_validation->set_rules('beli_motor_bayar_debet1', 'Recipt of Charge COA Debet 1',
			array('trim',array('motor_payment_debet1_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('motor_payment_debet1_check'=>'You must choose a Recipt of Charge COA Debet 1 or your Recipt of Charge COA Debet 1 no longer valid, choose another!'));
			$this->form_validation->set_rules('beli_motor_bayar_debet2', 'Recipt of Charge COA Debet 2',
			array('trim',array('motor_payment_debet2_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('motor_payment_debet2_check'=>'You must choose a Recipt of Charge COA Debet 2 or your Recipt of Charge COA Debet 2 no longer valid, choose another!'));
			$this->form_validation->set_rules('beli_motor_bayar_credit1', 'Recipt of Charge COA Credit 1',
			array('trim',array('motor_payment_credit1_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('motor_payment_credit1_check'=>'You must choose a Recipt of Charge COA Credit 1 or your Recipt of Charge COA Credit 1 no longer valid, choose another!'));
			$this->form_validation->set_rules('beli_motor_bayar_credit2', 'Recipt of Charge COA Credit 2',
			array('trim',array('motor_Payment_credit2_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('motor_payment_credit2_check'=>'You must choose a Recipt of Charge COA Credit 2 or your Recipt of Charge COA Credit 2 no longer valid, choose another!'));
			$this->form_validation->set_rules('jual_motor_terima_debet1', 'Motor Delivery COA Debet 1',
			array('trim',array('motor_Delivery_debet1_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('motor_delivery_debet1_check'=>'You must choose a Motor Delivery COA Debet 1 or your Motor Delivery COA Debet 1 no longer valid, choose another!'));
			$this->form_validation->set_rules('jual_motor_terima_debet2', 'Motor Delivery COA Debet 2',
			array('trim',array('motor_Delivery_debet2_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('motor_delivery_debet2_check'=>'You must choose a Motor Delivery COA Debet 2 or your Motor Delivery COA Debet 2 no longer valid, choose another!'));
			$this->form_validation->set_rules('jual_motor_terima_credit1', 'Motor Delivery COA Credit 1',
			array('trim',array('motor_Delivery_credit1_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('motor_delivery_credit1_check'=>'You must choose a Motor Delivery COA Credit 1 or your Motor Delivery COA Credit 1 no longer valid, choose another!'));
			$this->form_validation->set_rules('jual_motor_terima_credit2', 'Motor Delivery COA Credit 2',
			array('trim',array('motor_Delivery_credit2_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('motor_delivery_credit2_check'=>'You must choose a Motor Delivery COA Credit 2 or your Motor Delivery COA Credit 2 no longer valid, choose another!'));
			$this->form_validation->set_rules('jual_motor_bayar_debet1', 'Sales Payment of Charge COA Debet 1',
			array('trim',array('motor_payment_debet1_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('motor_payment_debet1_check'=>'You must choose a Sales Payment of Charge COA Debet 1 or your Motorcycle Payment COA Debet 1 no longer valid, choose another!'));
			$this->form_validation->set_rules('jual_motor_bayar_debet2', 'Sales Payment of Charge COA Debet 2',
			array('trim',array('motor_payment_debet2_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('motor_payment_debet2_check'=>'You must choose a Sales Payment of Charge COA Debet 2 or your Motorcycle Payment  COA Debet 2 no longer valid, choose another!'));
			$this->form_validation->set_rules('jual_motor_bayar_credit1', 'Sales Payment of Charge COA Credit 1',
			array('trim',array('motor_payment_credit1_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('motor_payment_credit1_check'=>'You must choose a Sales Payment of Charge COA Credit 1 or your Motorcycle Payment  Credit 1 no longer valid, choose another!'));
			$this->form_validation->set_rules('jual_motor_bayar_credit2', 'Sales Payment of Charge COA Credit 2',
			array('trim',array('motor_Payment_credit2_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('motor_payment_credit2_check'=>'You must choose a Sales Payment of Charge COA Credit 2 or your Motorcycle Payment of Credit 2 no longer valid, choose another!'));
			$this->form_validation->set_rules('payroll_minta_debet1', 'Payroll Request COA Debet 1',
			array('trim',array('payroll_minta_debet1_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('payroll_minta_debet1_check'=>'You must choose a Payroll Request COA Debet 1 or your Payroll Request COA Debet 1 no longer valid, choose another!'));
			$this->form_validation->set_rules('payroll_minta_debet2', 'Payroll Request COA Debet 2',
			array('trim',array('payroll_minta_debet2_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('payroll_minta_debet2_check'=>'You must choose a Payroll Request COA Debet 2 or your Payroll Request COA Debet 2 no longer valid, choose another!'));
			$this->form_validation->set_rules('payroll_minta_credit1', 'Payroll Request COA Credit 1',
			array('trim',array('payroll_minta_credit1_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('payroll_minta_credit1_check'=>'You must choose a Payroll Request COA Credit 1 or your Payroll Request COA Credit 1 no longer valid, choose another!'));
			$this->form_validation->set_rules('payroll_minta_credit2', 'Payroll Request COA Credit 2',
			array('trim',array('payroll_minta_credit2_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('payroll_minta_credit2_check'=>'You must choose a Payroll Request COA Credit 2 or your Payroll Request COA Credit 2 no longer valid, choose another!'));
			$this->form_validation->set_rules('payroll_bayar_debet1', 'Sales Payment of Charge COA Debet 1',
			array('trim',array('payroll_payment_debet1_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('payroll_payment_debet1_check'=>'You must choose a Sales Payment of Charge COA Debet 1 or your PayrollPayment COA Debet 1 no longer valid, choose another!'));
			$this->form_validation->set_rules('payroll_bayar_debet2', 'Sales Payment of Charge COA Debet 2',
			array('trim',array('payroll_payment_debet2_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('payroll_payment_debet2_check'=>'You must choose a Sales Payment of Charge COA Debet 2 or your PayrollPayment  COA Debet 2 no longer valid, choose another!'));
			$this->form_validation->set_rules('payroll_bayar_credit1', 'Sales Payment of Charge COA Credit 1',
			array('trim',array('payroll_payment_credit1_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('payroll_payment_credit1_check'=>'You must choose a Sales Payment of Charge COA Credit 1 or your PayrollPayment  Credit 1 no longer valid, choose another!'));
			$this->form_validation->set_rules('payroll_bayar_credit2', 'Sales Payment of Charge COA Credit 2',
			array('trim',array('payroll_Payment_credit2_check',function($value){if($value != '') return valid_id('m_coa', 'id', $value); else return true;})),
			array('payroll_payment_credit2_check'=>'You must choose a Sales Payment of Charge COA Credit 2 or your PayrollPayment of Credit 2 no longer valid, choose another!'));
			if ($this->form_validation->run() == FALSE) {
				$detil[0] = $toro_insert;
				$this->index(validation_errors(), $detil);
			}
			 else{
				$toro_insert8 = array(
					"id" => 8,
					"id_m_coa_debet1" => $all->purchaseReciptCoaDebet1,
					"id_m_coa_debet2" => $all->purchaseReciptCoaDebet2,
					"id_m_coa_credit1" => $all->purchaseReciptCoaCredit1,
					"id_m_coa_credit2" => $all->purchaseReciptCoaCredit2,
				);
				
				$toro_insert9 = array(
					"id" => 9,
					"id_m_coa_debet1" => $all->purchaseReturnCoaDebet1,
					"id_m_coa_debet2" => $all->purchaseReturnCoaDebet2,
					"id_m_coa_credit1" => $all->purchaseReturnCoaCredit1,
					"id_m_coa_credit2" => $all->purchaseReturnCoaCredit2,
				);
				
				$toro_insert10 = array(
					"id" => 10,
					"id_m_coa_debet1" => $all->purchasePaymentCoaDebet1,
					"id_m_coa_debet2" => $all->purchasePaymentCoaDebet2,
					"id_m_coa_credit1" => $all->purchasePaymentCoaCredit1,
					"id_m_coa_credit2" => $all->purchasePaymentCoaCredit2,
				);
				
				$toro_insert5 = array(
					"id" => 5,
					"id_m_coa_debet1" => $all->salesDeliveryCoaDebet1,
					"id_m_coa_debet2" => $all->salesDeliveryCoaDebet2,
					"id_m_coa_credit1" => $all->salesDeliveryCoaCredit1,
					"id_m_coa_credit2" => $all->salesDeliveryCoaCredit2,
				);
				
				$toro_insert6 = array(
					"id" => 6,
					"id_m_coa_debet1" => $all->salesReturnCoaDebet1,
					"id_m_coa_debet2" => $all->salesReturnCoaDebet2,
					"id_m_coa_credit1" => $all->salesReturnCoaCredit1,
					"id_m_coa_credit2" => $all->salesReturnCoaCredit2,
				);
				
				$toro_insert7 = array(
					"id" => 7,
					"id_m_coa_debet1" => $all->salesPaymentCoaDebet1,
					"id_m_coa_debet2" => $all->salesPaymentCoaDebet2,
					"id_m_coa_credit1" => $all->salesPaymentCoaCredit1,
					"id_m_coa_credit2" => $all->salesPaymentCoaCredit2,
				);
				
				$toro_insert3 = array(
					"id" => 3,
					"id_m_coa_debet1" => $all->motorPurchaseReciptCoaDebet1,
					"id_m_coa_debet2" => $all->motorPurchaseReciptCoaDebet2,
					"id_m_coa_credit1" => $all->motorPurchaseReciptCoaCredit1,
					"id_m_coa_credit2" => $all->motorPurchaseReciptCoaCredit2,
				);
				
				$toro_insert4 = array(
					"id" => 4,
					"id_m_coa_debet1" => $all->motorPurchasePaymentCoaDebet1,
					"id_m_coa_debet2" => $all->motorPurchasePaymentCoaDebet2,
					"id_m_coa_credit1" => $all->motorPurchasePaymentCoaCredit1,
					"id_m_coa_credit2" => $all->motorPurchasePaymentCoaCredit2,
				);
				
				$toro_insert1 = array(
					"id" => 1,
					"id_m_coa_debet1" => $all->motorSalesDeliveryCoaDebet1,
					"id_m_coa_debet2" => $all->motorSalesDeliveryCoaDebet2,
					"id_m_coa_credit1" => $all->motorSalesDeliveryCoaCredit1,
					"id_m_coa_credit2" => $all->motorSalesDeliveryCoaCredit2,
				);
				
				$toro_insert2 = array(
					"id" => 2,
					"id_m_coa_debet1" => $all->motorSalesPaymentCoaDebet1,
					"id_m_coa_debet2" => $all->motorSalesPaymentCoaDebet2,
					"id_m_coa_credit1" => $all->motorSalesPaymentCoaCredit1,
					"id_m_coa_credit2" => $all->motorSalesPaymentCoaCredit2,
				);
				
				$toro_insert11 = array(
					"id" => 11,
					"id_m_coa_debet1" => $all->payrollRequestCoaDebet1,
					"id_m_coa_debet2" => $all->payrollRequestCoaDebet2,
					"id_m_coa_credit1" => $all->payrollRequestCoaCredit1,
					"id_m_coa_credit2" => $all->payrollRequestCoaCredit2,
				);
				
				$toro_insert12 = array(
					"id" => 12,
					"id_m_coa_debet1" => $all->payrollPaymentCoaDebet1,
					"id_m_coa_debet2" => $all->payrollPaymentCoaDebet2,
					"id_m_coa_credit1" => $all->payrollPaymentCoaCredit1,
					"id_m_coa_credit2" => $all->payrollPaymentCoaCredit2,
				);
				
				$this->general_coa_model->update($toro_insert8);
				$this->general_coa_model->update($toro_insert9);
				$this->general_coa_model->update($toro_insert10);
				$this->general_coa_model->update($toro_insert5);
				$this->general_coa_model->update($toro_insert6);
				$this->general_coa_model->update($toro_insert7);
				$this->general_coa_model->update($toro_insert3);
				$this->general_coa_model->update($toro_insert4);
				$this->general_coa_model->update($toro_insert1);
				$this->general_coa_model->update($toro_insert2);
				$this->general_coa_model->update($toro_insert11);
				$this->general_coa_model->update($toro_insert12);
				
				redirect('general_coa');
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
