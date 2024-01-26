<?php

/**
 * Plugin Name: Mensagem
 * Author: Bruno Marcel
 */

function addBtnShortcode() {
    ob_start();
    include(plugin_dir_path(__FILE__) . 'html.php');
    return ob_get_clean();
}
add_shortcode( 'name_shortcode', 'addBtnShortcode' );