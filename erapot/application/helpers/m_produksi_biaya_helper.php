<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_m_produksi_biaya'))
{
    function get_m_produksi_biaya($id)
    {
		$ci=& get_instance();
		$ci->load->model('m_produksi_biaya_model');
		$res = $ci->m_produksi_biaya_model->get($id);
		return $res[0]['nama'];
		
    }   
}
