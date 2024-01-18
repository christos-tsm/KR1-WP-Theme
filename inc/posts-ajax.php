<?php
add_action('wp_ajax_nopriv_filter_posts', 'ajax_filter_posts_callback');
add_action('wp_ajax_filter_posts', 'ajax_filter_posts_callback');

function ajax_filter_posts_callback() {
    $taxonomy = isset($_POST['taxonomy']) ? $_POST['taxonomy'] : '';
    $page = isset($_POST['page']) ? $_POST['page'] : 1;

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'paged' => $page,
        'post_status' => 'publish',
    );

    if (!empty($taxonomy) && $taxonomy !== 'all') {
        $args['category_name'] = $taxonomy;
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        $index = 1;
        while ($query->have_posts()) : $query->the_post();
            if ($index == 1) :
                get_template_part('template-parts/post-card-horizontal');
            else :
                get_template_part('template-parts/post-card');
            endif;
            $index++;
        endwhile;
        wp_reset_postdata();
    }

    wp_die();
}
