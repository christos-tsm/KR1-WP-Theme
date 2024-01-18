<?php

/**
 * Template Name: About
 */
get_header();
?>
<main class="site-main site-main--about">
    <?php get_template_part('template-parts/page-header'); ?>
    <?php if (have_rows('our_vision')) : ?>
        <?php while (have_rows('our_vision')) : the_row(); ?>
            <?php
            $image_attributes = array('class' => 'our-vision__img', 'loading' => '', 'alt' => get_bloginfo('name'));
            $image_1  = wp_get_attachment_image(get_sub_field('image_1')['ID'], 'full', false, $image_attributes);
            $image_2  = wp_get_attachment_image(get_sub_field('image_2')['ID'], 'full', false, $image_attributes);
            $image_3  = wp_get_attachment_image(get_sub_field('image_3')['ID'], 'full', false, $image_attributes);
            ?>
            <div class="our-vision__container">
                <div class="our-vision__content">
                    <div class="our-vision__col">
                        <div class="image__container image-1">
                            <?= $image_1 ?>
                        </div>
                        <div class="image__container image-2">
                            <?= $image_2 ?>
                            <div class="animated-logo__container">
                                <div class="animated-logo">
                                    <img class="letters" src="<?= get_stylesheet_directory_uri() . '/assets/images/logo-letters-golden.png' ?>" alt="<?= bloginfo('name'); ?>">
                                    <img class="logo" src="<?= get_stylesheet_directory_uri() . '/assets/images/logo-about.png' ?>" alt="<?= bloginfo('name'); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="our-vision__col">
                        <div class="our-vision__col-text">
                            <h2 class="our-vision__title"><?php the_sub_field('title'); ?></h2>
                            <div class="our-vision__text-container">
                                <p class="our-vision__text--big"><?php the_sub_field('text_1'); ?></p>
                                <p class="our-vision__text"><?php the_sub_field('text_2'); ?></p>
                            </div>
                        </div>
                        <div class="image__container image-3">
                            <?= $image_3 ?>
                        </div>
                    </div>
                </div>
                <?php if (have_rows('counters')) : ?>
                    <div class="counters__container container container--md">
                        <?php while (have_rows('counters')) : the_row(); ?>
                            <div class="counters__single">
                                <p class="number"><?php the_sub_field('number'); ?></p>
                                <p class="text"><?php the_sub_field('text'); ?></p>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php if (have_rows('quote')) : ?>
        <div class="quote">
            <?php while (have_rows('quote')) : the_row(); ?>
                <p class="quote__text"><?php the_sub_field('text'); ?></p>
                <p class="quote__signature"><?php the_sub_field('signature'); ?></p>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
    <?php if (have_rows('services_group')) : ?>
        <?php while (have_rows('services_group')) : the_row(); ?>
            <div class="services__container">
                <div class="services__title container container--md">
                    <h2><?php the_sub_field('title'); ?></h2>
                </div>
                <?php if (have_rows('services')) : ?>
                    <div class="services-grid container container--md">
                        <?php while (have_rows('services')) : the_row(); ?>
                            <div class="services-grid__item">
                                <p class="index"><?= get_row_index() < 10 ? '0' . get_row_index() : get_row_index(); ?></p>
                                <h3><?php the_sub_field('title'); ?></h3>
                                <p class="text"><?php the_sub_field('text'); ?></p>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php if (get_field('team_image')) : ?>
        <?php
        $image_attributes = array('class' => 'team-image', 'loading' => '', 'alt' => get_bloginfo('name'));
        $image  = wp_get_attachment_image(get_field('team_image')['ID'], 'full', false, $image_attributes);
        echo $image;
        ?>
    <?php endif; ?>
    <?php if (have_rows('team_group')) : ?>
        <section class="team__container">
            <?php while (have_rows('team_group')) : the_row(); ?>
                <div class="team__title container container--md">
                    <h2><?php the_sub_field('title'); ?></h2>
                </div>
                <?php if (have_rows('team')) : ?>
                    <div class="team__cards container container--md">
                        <?php while (have_rows('team')) : the_row() ?>
                            <?php
                            $image_attributes = array('class' => 'team__cards-image', 'loading' => '', 'alt' => get_bloginfo('name'));
                            $image  = wp_get_attachment_image(get_sub_field('image')['ID'], 'full', false, $image_attributes);
                            ?>
                            <div class="team__cards-single">
                                <?= $image; ?>
                                <h3><?php the_sub_field('name') ?></h3>
                                <h4><?php the_sub_field('job_title') ?></h4>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </section>
    <?php endif; ?>
    <?php if (have_rows('links')) : ?>
        <section class="links">
            <?php while (have_rows('links')) : the_row(); ?>
                <?php
                $image_attributes = array('class' => 'team__cards-image', 'loading' => '', 'alt' => get_bloginfo('name'));
                $image  = wp_get_attachment_image(get_sub_field('image')['ID'], 'full', false, $image_attributes);
                $link = get_sub_field('link');
                ?>
                <div class="links__col">
                    <?= $image; ?>
                    <div class="overlay"></div>
                    <div class="links__content">
                        <h3><?php the_sub_field('title'); ?></h3>
                        <p><?php the_sub_field('text'); ?></p>
                        <?php get_template_part('template-parts/cta-golden'); ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </section>
    <?php endif; ?>
</main>
<?php get_footer(); ?>