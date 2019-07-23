<?php
/*
Plugin Name: instagrame api app
Description: plugin help you to share instagrame profile
Author: assem Elshukfy
Version: 1.0
Author URI: http://assem.hostkda.com/?i=1#
*/


if(!defined('ABSPATH')){
	exit;
}

// global settings ----
$instagrame_options = get_option('insmedia_settings');


require_once(plugin_dir_path(__FILE__).'/includes/instagrameScripts.php');
require_once(plugin_dir_path(__FILE__).'/includes/datashortcode.php');

if(is_admin()){
	require_once(plugin_dir_path(__FILE__).'/includes/ins-options.php');
}

