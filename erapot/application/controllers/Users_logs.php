<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_logs extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in')) redirect('login');
		if($this->session->userdata('user_level') != 2) redirect('login');
		
		$this->load->library(array('pagination','grocery_CRUD'));
		$this->lang->load('common', $this->session->userdata('user_language'));
	}
	
	public function index()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('users_logs');
			$crud->set_subject('Users Logs');
			$crud->columns('id','user_id','ip','keterangan','date_created');
			$crud->order_by('date_created','desc');
			$crud->unset_add();
			$crud->unset_edit();
			$crud->unset_delete();
			//$crud->unset_read();
			$crud->set_relation('user_id','users','user_name');

			$output = $crud->render();

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
		
		//options view
		$viewoptions['type'] = "table";
		$viewoptions['section'] = "user";
		$viewoptions['page'] = "user_log";
		$viewoptions['pageinfo'] = "Users Logs";
		$viewoptions['content'] = "grocery";
		$output->viewoptions = $viewoptions;
		
		$this->writehtml($viewoptions,$output);
	}
	
	function toro_created($post_array)
	{
		$post_array['created'] = date('Y-m-d H:i:s');
		return $post_array;
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
}