<?php
if (get_sub_field('link')) :
    $link = get_sub_field('link');
elseif (get_field('link')) :
    $link = get_field('link');
endif;
?>
<?php if ($link) : ?>
    <a href="<?= esc_url($link['url']) ?>" class="cta cta--golden cta--icon">
        <?= esc_attr($link['title']); ?>
        <span class="icon icon--md">
            <?= file_get_contents(get_stylesheet_directory() . '/assets/images/cta-arrow.svg'); ?>
        </span>
    </a>
<?php endif; ?>