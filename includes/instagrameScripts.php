<?php

function instagrame_app() {
	wp_enqueue_style('s-ins-styles',plugins_url().'/instagrame images/css/smstyle.css');
	wp_enqueue_script( 's-ins-mainjs', plugins_url() . '/instagrame images/js/smain.js', array('jquery'));
}
add_action( 'wp_enqueue_scripts', 'instagrame_app' );