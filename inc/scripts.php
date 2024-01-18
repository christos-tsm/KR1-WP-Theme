<?php
function kr1_scripts() {
    /** Styles */
    wp_enqueue_style('font', 'https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700&display=swap', array(), null);
    wp_enqueue_style('slick-styles', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), null);
    wp_enqueue_style('kr1-style', get_stylesheet_uri(), array(), _S_VERSION);
    /** Scripts */
    wp_enqueue_script('jquery');
    wp_enqueue_script('slick-script', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js', array(), null, true);
    wp_enqueue_script('kr1-main', get_template_directory_uri() . '/js/main.js', array(), _S_VERSION, true);
    wp_enqueue_script('projects-ajax-script', get_template_directory_uri() . '/js/projects-ajax.js', array('jquery'), '', true);
    wp_localize_script('projects-ajax-script', 'scriptVars', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'kr1_scripts');
