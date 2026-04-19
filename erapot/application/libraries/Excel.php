<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 *  ======================================= 
 *  Author     : Andy Febrico Bintoro
 *  License    : Protected 
 *  Email      : andyfeb2@yahoo.com
 *   
 *  Dilarang merubah, mengganti dan mendistribusikan 
 *  ulang tanpa sepengetahuan Author 
 *  ======================================= 
 */  
require_once APPPATH."/third_party/PHPExcel.php";

class Excel extends PHPExcel {
	public function __construct() {
		parent::__construct();
	}
}