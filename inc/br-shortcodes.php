<?php
//Este arquivo contem os shortcodes

//Se chamar diretamente, aborta
if( ! defined('WPINC') ){ die(); }

//[foobar]
function foobar_func( $atts ){
	return "foo and bar";
}

//shortcode attributes
// [bartag foo="foo-value"]
function bartag_func( $atts ) {
	$a = shortcode_atts( array(
		'foo' => 'something',
		'bar' => 'something else',
	), $atts );

	return "foo = {$a['foo']}";
}

//shortcode attributes
function botao_website( $atts ) {
	$a = shortcode_atts( array(
		'cor' => 'blue',
        'background' => 'green'
	), $atts );

	return "<a href='https://www.instagram.com/_bruno_marcel/' style='color:{$a['cor']};background-color:{$a['background']}' target='_blank'>Clique aqui</a>";
}

//shortcode content
function caption_shortcode( $atts, $content = null ) {
	return '<span class="caption">' . $content . '</span>';
}


/**
 * Registro de todos os shortcodes
 */

function br_register_shortcodes(){
    add_shortcode( 'foobar', 'foobar_func' );
    add_shortcode( 'bartag', 'bartag_func' );
    add_shortcode( 'caption', 'caption_shortcode' );
    add_shortcode( 'botao-website', 'botao_website' );
}
add_action('init', 'br_register_shortcodes');