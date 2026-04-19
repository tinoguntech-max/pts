<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_project_barang'))
{
    function get_project_barang($project, $barang)
    {
		$ci=& get_instance();
		$ci->load->model('project_barang_model');
		$res = $ci->project_barang_model->get($project, $barang);
		if ($res != 0)
			return $res[0]['harga_total'];
		else
			return 0;
    }   
}