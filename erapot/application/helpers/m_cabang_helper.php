<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_m_cabang'))
{
    function get_m_cabang($id)
    {
		
		$ci=& get_instance();
		$ci->load->model('m_cabang_model');
		$res = $ci->m_cabang_model->get($id);
		return $res[0]['nama'];
		
    }   
}
