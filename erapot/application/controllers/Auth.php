<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function index()
	{
		if($this->session->userdata('logged_in')) redirect('dashboard');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'Username', 'min_length[4]|required');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
			$data = array();
			if ( $this->form_validation->run() !== false ) {
				$this->load->model('users_model');
				$this->load->model('siswa_model');
				$user = $this->users_model->getbyusername($this->input->post('username'));
				$murid = $this->siswa_model->getbynik($this->input->post('username'));
				if ($user) {
					if (password_verify($this->input->post('password'), $user[0]['user_pass'])) {
						// ambil akses dari group
						$s_access = '';
						$this->load->model('access_group_detil_model');
						$this->load->model('access_master_model');
						$accesses = $this->access_group_detil_model->getbyaccessgroup($user[0]['user_level']);
						if ($accesses != 0) {
							foreach ($accesses as $key => $value) {
								$master = $this->access_master_model->get($value['id_access_master']);
								$s_access .= $master[0]['nama'].',';
							}
						}
						$this->session->set_userdata(array('logged_in' => true,
							'user_id' => $user[0]['user_id'],
							'user_name' => $user[0]['user_name'],
							'user_type' => 'karyawan',
							'user_level' => $user[0]['user_level'],
							'user_cabang' => $user[0]['id_m_cabang'],
							'user_access' => $s_access,
							'user_language' => $user[0]['screen_language']
						));
						redirect('dashboard');
					}
					else {
						$data['error_msg'] = "Invalid username and password!";
					}
				}
				elseif ($murid) {
					if (password_verify($this->input->post('password'), $murid[0]['password'])) {						
						$this->session->set_userdata(array('logged_in' => true,
							'user_id' => $murid[0]['nik'],
							'user_name' => $murid[0]['nama'],
							'user_type' => 'karyawan',
							'user_language' => 'indonesia'
						));						
						redirect('dashboard/dashboard_murid');
					}
				}
				else
					$data['error_msg'] = "Invalid username and password!";
			}
		$this->load->view('login', $data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect();
	}
	
}