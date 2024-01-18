<?php $terms = get_the_terms(get_the_ID(), 'categories'); ?>
<div class="home-works__slider-single">
    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink() ?>">
            <div class="view-more">
                <?php pll_e('View More') ?>
                <span class="icon icon--xsm">
                    <?= file_get_contents(get_stylesheet_directory() . '/assets/images/arrow-right.svg') ?>
                </span>
            </div>
            <img src="<?= the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>">
        </a>
        <div class="home-works__slider-single-title">
            <?php if (!empty($terms)) : ?>
                <div class="project-categories">
                    <?php foreach ($terms as $term) : ?>
                        <span class="category"><?php echo esc_html($term->name); ?></span>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <h3>
                <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
            </h3>
        </div>
    <?php endif; ?>
</div>