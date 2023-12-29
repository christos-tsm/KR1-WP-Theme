<?php

/**
 * Template Name: Homepage
 */
get_header();
?>
<main class="site-main site-main--homepage">
    <?php if (have_rows('hero_section')) : ?>
        <section class="hero-section__container">
            <?php while (have_rows('hero_section')) : the_row(); ?>
                <?php
                $image = get_sub_field('background_image');
                $link = get_sub_field('link');
                ?>
                <?php get_template_part('template-parts/hero-video'); ?>
                <div class="overlay"></div>
                <div class=""></div>
                <a href="javascript:void(0);" id="play-video"><?php pll_e('Play'); ?></a>
                <div class="hero-section">
                    <img class="hero-section__image" src="<?= esc_url($image['url']) ?>" alt="<?= bloginfo('name'); ?>">
                    <div class="hero-section__content">
                        <h1><?php the_sub_field('title'); ?></h1>
                        <p><?php the_sub_field('text'); ?></p>
                        <a href="<?= esc_url($link['url']) ?>" class="cta cta--golden cta--icon">
                            <?= esc_attr($link['title']); ?>
                            <span class="icon icon--md">
                                <?= file_get_contents(get_stylesheet_directory() . '/assets/images/cta-arrow.svg'); ?>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="hero-section__scroll-down">
                    <span class="text">
                        <?php pll_e('Scroll Down'); ?>
                    </span>
                    <span class="icon">
                        <?= file_get_contents(get_stylesheet_directory() . '/assets/images/scroll-down-texture.svg'); ?>
                    </span>
                </div>
            <?php endwhile; ?>
        </section>
    <?php endif; ?>
</main>
<?php get_footer(); ?>