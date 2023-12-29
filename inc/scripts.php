<?php
function kr1_scripts() {
    /** Styles */
    wp_enqueue_style('kr1-style', get_stylesheet_uri(), array(), _S_VERSION);
    /** Scripts */
    wp_enqueue_script('jquery');
    wp_enqueue_script('kr1-main', get_template_directory_uri() . '/js/main.js', array(), _S_VERSION, true);
}
add_action('wp_enqueue_scripts', 'kr1_scripts');
