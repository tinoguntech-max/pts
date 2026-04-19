<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in')) redirect('login');
		if($this->session->userdata('user_type') != 'karyawan') redirect('login');
				
		$this->load->library('pagination');
		$this->lang->load('common', $this->session->userdata('user_language'));
	}
		
	public function index(){
		$this->load->model('access_group_detil_model');
	
		
		
		//options view
		$data['viewoptions']['type'] = "";
		$data['viewoptions']['section'] = "";
		$data['viewoptions']['page'] = "";
		$data['viewoptions']['pageinfo'] = "Dashboard";
		$data['viewoptions']['content'] = "dashboard/dashboard_admin";
		$data['viewoptions']['script'] = "dashboard/dashboard_admin_script";

		$this->writehtml($data);
	}
	
	public function dashboard_murid(){
		$this->load->model('barang_model');
		$this->load->model('barang_harga_beli_model');
		$this->load->model('pos_beli_terima_detil_model');

		$kelas = get_data('supplier', 'nik', $this->session->userdata('user_id'), 'id_m_kelas');
		$id = get_data('supplier', 'nik', $this->session->userdata('user_id'), 'id');
		$list = array();
		$i = 0;
		$jenis = $this->barang_model->getallbarangwip();
		if ($jenis != 0) {
			foreach ($jenis as $thorz => $values) {
				$bayar = $this->pos_beli_terima_detil_model->getbysuppliertahunlain($id, $values['id'], date('Y'));
				$list[$i]['nama'] = strtoupper($values['nama']);
				if ($bayar != 0){
					$list[$i]['sisa'] = number_format($bayar[0]['sisa']);
				}
				else{
					$perkelas = $this->barang_harga_beli_model->getbybarangandkelas($values['id'], $kelas);
					if($perkelas != 0){
						$list[$i]['sisa'] = number_format($perkelas[0]['harga']);
					}
					else{
						$val = $this->barang_model->get($values['id']);
						$list[$i]['sisa'] = number_format($val[0]['harga']);
					}
				}
				if($list[$i]['sisa'] == 0){
					$list[$i]['status'] = 'Lunas';
				}
				else{
					$list[$i]['status'] = 'Kurang';
				}
				$ii = 0;
				$total = 0;
				if($bayar != 0){ 
					foreach ($bayar as $thorz => $valuesbayar) {
						$newDate = date("d-M-Y", strtotime($valuesbayar['created']));
						$list[$i]['list'][$ii]['bayar'] = number_format($valuesbayar['bayar']);
						$list[$i]['list'][$ii]['tanggal'] = $newDate;
						$total += $valuesbayar['bayar'];
						$ii++;
					}
				}
				$totalbayar = $total + $list[$i]['sisa'];
				$list[$i]['total'] = number_format($totalbayar);
				$i++;

			}
		}
		$data['list'] = $list;
		$this->load->view('dashboard/dashboard_murid', $data);
	}

	public function image() {
		echo "aaaaaa";
		var_dump($_POST);exit;

		if (!empty($_FILES["image"]["name"])) {
		    $this->image = $this->_uploadImage();
		} else {
		    $this->image = $post["old_image"];
		}

	}


	public function detils_low_barang(){
		$this->load->model('stock_model');
		$this->load->model('barang_model');
		$i = 0;
		$data['low_barang'] =array();
		$res = $this->barang_model->getall();
		foreach($res as $value){
			$t_stocks = $this->stock_model->sumnotsellingyetbranch($value['id'], $this->session->userdata('user_cabang'));
			if ($t_stocks[0]['toro'] < 100){
				$data['low_barang'][$i]['id'] = $value['id'];
				$data['low_barang'][$i]['nama'] = $value['nama'];
				$data['low_barang'][$i]['qty_left'] = $t_stocks[0]['toro'];
				$i++;
			}	
		}		
		
		$data['css_files'] = array (base_url('js/data-table/css/dataTables.bootstrap.min.css'),
			base_url('js/data-table/buttons/buttons.bootstrap.min.css'),
			base_url('js/data-table/colreorder/colReorder.bootstrap.min.css'),
			base_url('js/data-table/keytable/keyTable.bootstrap.min.css'),
			base_url('js/data-table/fixedheader/fixedHeader.bootstrap.min.css')
		);
		$data['js_files'] = array (base_url('js/data-table/js/jquery.dataTables.min.js'),
			base_url('js/data-table/js/dataTables.bootstrap.min.js'),
			base_url('js/data-table/buttons/dataTables.buttons.min.js'),
			base_url('js/data-table/buttons/buttons.bootstrap.min.js'),
			base_url('js/data-table/buttons/buttons.flash.min.js'),
			base_url('js/data-table/buttons/jszip.min.js'),
			base_url('js/data-table/buttons/pdfmake.min.js'),
			base_url('js/data-table/buttons/vfs_fonts.js'),
			base_url('js/data-table/buttons/buttons.html5.min.js'),
			base_url('js/data-table/buttons/buttons.print.min.js'),
			base_url('js/data-table/buttons/buttons.colVis.min.js'),
			base_url('js/data-table/colreorder/dataTables.colReorder.min.js'),
			base_url('js/data-table/keytable/dataTables.keyTable.min.js'),
			base_url('js/data-table/fixedheader/dataTables.fixedHeader.min.js')
		);
		
		//variable
		$this->load->model('general_model');
		$res = $this->general_model->getnama('nama_lengkap');
		$data['nama_lengkap'] = $res[0]['nilai'];
		$res = $this->general_model->getnama('alamat_lengkap');
		$data['alamat_lengkap'] = $res[0]['nilai'];
		$res = $this->general_model->getnama('contact_lengkap');
		$data['contact_lengkap'] = $res[0]['nilai'];
		
		//options view
		$data['viewoptions']['action'] = "view";
		$data['viewoptions']['type'] = "table";
		$data['viewoptions']['section'] = "project";
		$data['viewoptions']['page'] = "project";
		$data['viewoptions']['pageinfo'] = "View Low Barang";
		$data['viewoptions']['content'] = "project/project_pemakaian_barang";
		
		$this->writehtml1($data);
    }
	
	private function writehtml($data){
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
	
	private function writehtml1($data){
		//load view
		$data['loginas'] = $this->session->userdata('user_name');
		$this->load->view('header', $data);
		$this->load->view('sidebar-left', $data);
		$this->load->view('sidebar-nav', $data);
		if (isset($data['viewoptions']['content']))
			$this->load->view($data['viewoptions']['content'], $data);
		$this->load->view('footer', $data);
		if (isset($data['viewoptions']['script']))
			$this->load->view($data['viewoptions']['script'], $data);
	}
	
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
