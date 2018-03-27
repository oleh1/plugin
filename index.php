<?php
/*
Version: 1.0
Plugin Name: WA Company2
Description: Каталог компаний2
Author: Webakcent
Author URI: http://webakcent.pro/
*/

//ini_set('display_errors', 1);
//error_reporting(E_ALL);

require dirname(__FILE__) . '/catalog.class.php';
if ( class_exists('PHPExcel') ){
    require_once dirname(__FILE__) . '/phpexel/PHPExcel.php';
}

new WAC( 'wac' );
?>