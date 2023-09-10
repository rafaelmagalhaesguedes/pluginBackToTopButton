<?php
/**
 * Plugin Name: Back To Top Button
 * Description: Adicione um botão "Voltar ao Topo" ao seu site.
 * Version: 2.0
 * Author: Rafael M.
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: back-to-top-button
 */

// Adiciona os estilos CSS e scripts JavaScript necessários
function add_back_to_top_assets() {
    wp_enqueue_style('back-to-top-styles', plugin_dir_url(__FILE__) . 'style/back-to-top-button.css');
}
add_action('wp_enqueue_scripts', 'add_back_to_top_assets');

// Adiciona o botão ao final do conteúdo
function add_back_to_top_button() {
    $plugin_dir = plugin_dir_url(__FILE__);
    $image_url = $plugin_dir . 'images/top_arrow.png'; // Substitua 'seu-icone.png' pelo nome da sua imagem
    echo '<a href="#" id="back-to-top-button" class="back-to-top"><img class="icon" src="' . esc_url($image_url) . '" alt="Voltar ao Topo" /></a>';
}
add_action('wp_footer', 'add_back_to_top_button');

// Carrega o JavaScript necessário para fazer o botão funcionar
function back_to_top_script() {
    echo '<script>
        jQuery(document).ready(function($) {
            $(window).scroll(function() {
                if ($(this).scrollTop() > 100) {
                    $("#back-to-top-button").fadeIn();
                } else {
                    $("#back-to-top-button").fadeOut();
                }
            });

            $("#back-to-top-button").click(function() {
                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            });
        });
    </script>';
}
add_action('wp_footer', 'back_to_top_script');
