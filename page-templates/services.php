<?php

/**
 * Template Name: Services
 */
get_header();
$args = array(
    'post_type' => 'services',
    'posts_per_page' => -1,
    'post_status' => 'publish'
);
$query = new WP_Query($args);
?>
<main class="site-main site-main--services">
    <?php get_template_part('template-parts/page-header'); ?>
    <?php if (have_rows('content')) : ?>
        <section class="services-content">
            <?php while (have_rows('content')) : the_row(); ?>
                <?php
                $image_attributes = array('class' => 'services-content__image', 'loading' => '', 'alt' => get_bloginfo('name'));
                $image  = wp_get_attachment_image(get_sub_field('image')['ID'], 'full', false, $image_attributes);
                ?>
                <div class="services-content__col services-content__col--l">
                    <div class="services-content__text services-content__text--l">
                        <p><?php the_sub_field('text_left'); ?></p>
                    </div>
                    <span class="image-container">
                        <?= $image; ?>
                    </span>
                </div>
                <div class="services-content__col services-content__col--r">
                    <div class="services-content__text services-content__text--r">
                        <p><?php the_sub_field('text_right'); ?></p>
                    </div>
                    <div class="hero-section__scroll-down">
                        <span class="text"><?php pll_e('View Services') ?></span>
                        <span class="icon">
                            <?= file_get_contents(get_stylesheet_directory() . '/assets/images/scroll-down-texture.svg'); ?>
                        </span>
                    </div>
                    <img class="logo-texture" src="<?= esc_url(get_stylesheet_directory_uri() . '/assets/images/logo.jpg') ?>" alt="<?= bloginfo('name') ?>">
                </div>
            <?php endwhile; ?>
        </section>
    <?php endif; ?>
    <?php if ($query->have_posts()) : ?>
        <section class="services-cards__container services-cards__container--archive">
            <div class="services-grid services-grid--col-3 container container--md">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <?php manage_service_card_index('set', manage_service_card_index() + 1); ?>
                    <?php get_template_part('template-parts/services-card'); ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </section>
    <?php endif; ?>
    <?php $form_shortcode = get_field('form_shortcode'); ?>
    <div class="interest-form__container">
        <div class="interest-form">
            <h3 class="interest-form__title"><?php pll_e('Apply for interest') ?></h3>
            <?= do_shortcode($form_shortcode); ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>