<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_m_content_jenis_news'))
{
    function get_m_content_jenis_news($id)
    {
		
		$ci=& get_instance();
		$ci->load->model('m_content_jenis_news_model');
		$res = $ci->m_content_jenis_news_model->get($id);
		return $res[0]['nama'];
		
    }   
}
