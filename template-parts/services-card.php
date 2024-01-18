<?php
if (is_page_template('page-templates/services.php')) :
    $index = manage_service_card_index();
else :
    $index = false;
endif;
?>
<div class="services-grid__item <?= is_page_template('page-templates/services.php') ? 'services-grid__item--archive' : '' ?>">
    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink() ?>">
            <div class="view-more view-more--black">
                <?php pll_e('View More') ?>
                <span class="icon icon--xsm">
                    <?= file_get_contents(get_stylesheet_directory() . '/assets/images/arrow-right.svg') ?>
                </span>
            </div>
            <?php the_post_thumbnail(); ?>
        </a>
    <?php endif; ?>
    <div class="services-grid__item-title">
        <?php if ($index) : ?>
            <p class="number"><?= $index ?></p>
        <?php endif; ?>
        <h3 class="section-title">
            <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
        </h3>
    </div>
    <?php if (is_page_template('page-templates/services.php')) : ?>
        <div class="services-grid__item-excerpt">
            <?php the_excerpt(); ?>
        </div>
    <?php endif; ?>
</div>