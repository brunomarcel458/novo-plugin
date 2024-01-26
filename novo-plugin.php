<?php

/*
Plugin name: Novo Plugin
Plugin URI: #
Description: Plugin of functions to Wordpress
Version: 1.0.7
Author: Bruno Marcel
Author URI: https://#
Text Domain: np
*/

//Se chamar diretamente, aborta
if( ! defined('WPINC') ){ die(); }

if( file_exists(plugin_dir_path(__FILE__) . 'br-core-init.php') ){ //verifica se o caminho para o arquivo core-init.php existe
    require_once(plugin_dir_path(__FILE__) . 'br-core-init.php'); //executa a função require_once, que serve para chamar o arquivo
}