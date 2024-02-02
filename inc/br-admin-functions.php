<?php

// Este arquivo contém as funções administrativas

// Se chamar diretamente, aborta
if (!defined('WPINC')) {
    die();
}

add_action('admin_menu', 'br_admin_menu_page');

function br_admin_menu_page()
{
    add_menu_page(
        'Minha Página Admin',         // title
        'Novo Plugin',                // link do menu
        'manage_options',             // capacidade de acesso 
        'novo-plugin',                // slug   
        'br_admin_page_content',      // callback
        'dashicons-admin-site-alt2',  // icone 
        1                             // prioridade 
    );
}

function br_admin_page_content(){
    echo '<div class="wrap">';
        echo '<h1>Novo Plugin - Configurações</h1>';
        echo '<form method="post" action="options.php">';

            // Registrar as configurações
            settings_fields('br_settings'); // nome do grupo de configurações
            do_settings_sections('novo-plugin'); // slug da página
            submit_button();

        echo '</form>';
    echo '</div>';
}

add_action('admin_init', 'br_register_setting');

function br_register_setting(){
    // Registrar uma seção de configuração
    register_setting(
        'br_settings',              //nome grupo
        'br_home_text',             //nome da opção
        'sanitize_text_field',      //sanitização
    );

    add_settings_section(
        'br_settings_section_id',     //id da seção 
        'Título da Seção',                     //titulo
        '',                           //callback
        'novo-plugin',                //slug     
    );

    add_settings_field(
        'br_home_text',
        'Home text',
        'br_text_field_html',    //funcao que mostra o campo
        'novo-plugin',                //slug     
        'br_settings_section_id',     //id da seção 
        array(
            'label_for' => 'home_text',
            'class'     => 'br_class'
        )
    );

    add_settings_field(
        'br_home_logo',
        'Logo',
        'br_logo_field_html',    //funcao que mostra o campo
        'novo-plugin',                //slug     
        'br_settings_section_id',     //id da seção 
        array(
            'label_for' => 'home_logo',
            'class'     => 'br_class'
        )
    );
}

function br_text_field_html(){
    $text = get_option('br_home_text');
    printf('<input type="text" id="br_home_text" name="br_home_text" value="%s" />', esc_attr( $text ));
}

function br_logo_field_html(){
    $logo_id = get_option('br_home_logo');

    if($logo = wp_get_attachment_image_src($logo_id)){
        
        echo '<a href="#" class="br-upl"><img src="' . $logo[0] . '"></a>';
        echo '<a href="#" class="br-rmv">Remover Logo</a>';
        echo '<input type="hidden" name="br-logo" value="' . $logo_id . '"></input>';
    
    } else {

        echo '<a href="#" class="br-upl">Upload Logo</a>';
        echo '<a href="#" class="br-rmv" style="display:none;">Remover Logo</a>';
        echo '<input type="hidden" name="br-logo" value=""></input>';

    }
}
