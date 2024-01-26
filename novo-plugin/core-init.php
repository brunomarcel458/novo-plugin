<?php

//Este arquivo inicializa os componentes do plugin

//Se chamar diretamente, aborta
if( ! defined('WPINC') ){ die(); }

define('CORE_INC', dirname(__FILE__) . '/inc/');
define('CORE_IMG', plugins_url('img/', __FILE__));
define('CORE_CSS', plugins_url('css/', __FILE__));
define('CORE_JS', plugins_url('js/', __FILE__));

//registrando CSS
function br_register_core_css(){
    wp_enqueue_style('br-core', CORE_CSS . 'core.css', null, time(), 'all');
}
add_action('wp_enqueue_style', 'br_register_core_css');

//registrando JS/jQuery
function br_register_core_js(){
    wp_enqueue_script('br-core', CORE_JS . 'core.js', 'jquery', time(), true);
}
add_action('wp_enqueue_scripts', 'br_register_core_js');