<?php
//Este arquivo contem os shortcodes

//Se chamar diretamente, aborta
if( ! defined('WPINC') ){ die(); }

//[foobar]
function foobar_func( $atts ){
	return "foo and bar";
}

/**
 * Registro de todos os shortcodes
 */

function br_register_shortcodes(){
    add_shortcode( 'foobar', 'foobar_func' );
}
add_action('init', 'br_register_shortcodes');