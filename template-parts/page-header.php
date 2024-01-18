<?php
$intro_text = get_field('intro_text');
if (get_field('header_image')) :
    $image_attributes = array('class' => 'page-header__background', 'loading' => '', 'alt' => get_bloginfo('name'));
    $thumbnail  = wp_get_attachment_image(get_field('header_image')['ID'], 'full', false, $image_attributes);
else :
    $thumbnail = false;
endif;
?>
<section class="page-header">
    <?php if (has_post_thumbnail() && !$thumbnail) : ?>
        <?php the_post_thumbnail('full', array('class' => 'page-header__background')); ?>
    <?php else : ?>
        <?= $thumbnail ?>
    <?php endif; ?>
    <div class="overlay"></div>
    <div class="page-header__content">
        <?php get_template_part('template-parts/breadcrump'); ?>
        <div class="page-header__flex">
            <div class="page-header__title">
                <h1 class="section-title"><?php the_title(); ?></h1>
            </div>
            <?php if ($intro_text) : ?>
                <div class="page-header__text">
                    <p><?= $intro_text; ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>