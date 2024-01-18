<?php
add_action('wp_ajax_nopriv_filter_projects', 'ajax_filter_projects_callback');
add_action('wp_ajax_filter_projects', 'ajax_filter_projects_callback');

function ajax_filter_projects_callback() {
    $taxonomy = isset($_POST['taxonomy']) ? $_POST['taxonomy'] : '';
    $page = isset($_POST['page']) ? $_POST['page'] : 1;

    $args = array(
        'post_type' => 'projects',
        'posts_per_page' => -1,
        'paged' => $page,
        'post_status' => 'publish',
    );

    if (!empty($taxonomy) && $taxonomy !== 'all') {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'categories',
                'field' => 'slug',
                'terms' => $taxonomy
            )
        );
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) : $query->the_post();
            get_template_part('template-parts/project-card');
        endwhile;

        wp_reset_postdata();
    }

    wp_die();
}
