<?php

//Este arquivo inicializa os componentes do plugin

//Se chamar diretamente, aborta
if( ! defined('WPINC') ){ die(); }

define('BR_CORE_INC', dirname(__FILE__) . '/inc/');
define('BR_CORE_IMG', plugins_url('img/', __FILE__));
define('BR_CORE_CSS', plugins_url('css/', __FILE__));
define('BR_CORE_JS', plugins_url('js/', __FILE__));

//registrando CSS
function br_register_core_css(){
    wp_enqueue_style('br-core', BR_CORE_CSS . 'br-core.css', null, time(), 'all');
}
add_action('wp_enqueue_scripts', 'br_register_core_css');

//registrando JS/jQuery
function br_register_core_js(){
    wp_enqueue_script('br-core', BR_CORE_JS . 'br-core.js', 'jquery', time(), true);
}
add_action('wp_enqueue_scripts', 'br_register_core_js');

//includes
if( file_exists( BR_CORE_INC . 'br-core-functions.php') ){ //verifica se o caminho para o arquivo core-init.php existe
    require_once BR_CORE_INC . 'br-core-functions.php'; //executa a função require_once, que serve para chamar o arquivo
}

if( file_exists( BR_CORE_INC . 'br-shortcodes.php') ){ //verifica se o caminho para o arquivo core-init.php existe
    require_once BR_CORE_INC . 'br-shortcodes.php'; //executa a função require_once, que serve para chamar o arquivo
}

if( file_exists( BR_CORE_INC . 'br-admin-functions.php') ){ //verifica se o caminho para o arquivo core-init.php existe
    require_once BR_CORE_INC . 'br-admin-functions.php'; //executa a função require_once, que serve para chamar o arquivo
}