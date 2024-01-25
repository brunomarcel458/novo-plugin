<?php

/*
Plugin name: Novo Plugin
Plugin URI: #
Description: Plugin of functions to Wordpress
Version: 1.0.1
Author: Bruno Marcel
Author URI: https://#
*/

function agradecimentos($content) {
    $agradecimento = '<p>Obrigado pela leitura!</p>';
    return $content . $agradecimento;
}

add_action( 'the_content', 'agradecimentos' );