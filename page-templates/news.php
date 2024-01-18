<?php

/**
 * Template Name: News
 */
get_header();
$args = array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'paged' => get_query_var('paged') ? get_query_var('paged') : 1
);
$query = new WP_Query($args);
?>
<main class="site-main site-main--blog">
    <?php get_template_part('template-parts/breadcrump'); ?>
    <section class="page-title__container container container--md">
        <h1 class="section-title"><?php the_title(); ?></h1>
        <ul class="filters">
            <li class="filters__item filters__item--posts active" data-taxonomy="all">
                <?php pll_e('All') ?>
            </li>
            <?php
            $terms = get_categories();
            foreach ($terms as $term) :
                echo '<li class="filters__item filters__item--posts" data-taxonomy="' . $term->slug . '">' . $term->name . '</li>';
            endforeach;
            ?>
        </ul>
    </section>
    <?php if ($query->have_posts()) : ?>
        <?php $index = 1; ?>
        <section class="projects-grid container container--md">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <?php if ($index == 1) : ?>
                    <?php get_template_part('template-parts/post-card-horizontal'); ?>
                <?php else : ?>
                    <?php get_template_part('template-parts/post-card'); ?>
                <?php endif; ?>
                <?php $index++; ?>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </section>
    <?php endif; ?>
    <div class="bottom-text container container--xsm">
        <?php the_field('bottom_text'); ?>
    </div>
</main>
<?php get_footer(); ?>