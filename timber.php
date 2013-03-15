<?php
/*
Plugin Name: Timber
Description: The WordPress Timber Framework allows you to write themes using the power of MVT and Twig
Author: Jared Novack + Upstatement
Version: 0.2
Author URI: http://upstatement.com
*/

global $wp_version;
global $plugin_timber;
$exit_msg = 'Click to Edit reqiures WordPress 3.0 or newer';
if (version_compare($wp_version, '3.0', '<')){
	exit ($exit_msg);
}

require_once('functions/functions-twig.php');
require_once('functions/functions-post-master.php');
require_once('functions/functions-php-helper.php');
require_once('functions/functions-wp-helper.php');

$timber = str_replace($_SERVER['DOCUMENT_ROOT'], '', __DIR__);
define("TIMBER", $timber);
define("TIMBER_URL", 'http://'.$_SERVER["HTTP_HOST"].TIMBER);
define("TIMBER_LOC", $_SERVER["DOCUMENT_ROOT"].TIMBER);




//$plugin_timber = new Timber();