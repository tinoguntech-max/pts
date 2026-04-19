<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_m_service'))
{
    function get_m_service($id)
    {
		
		$ci=& get_instance();
		$ci->load->model('m_service_model');
		$res = $ci->m_service_model->get($id);
		return $res[0]['nama'];
		
    }   
}
