<?php
$video = get_sub_field('video');
preg_match('/src="(.+?)"/', $video, $matches);
$src = $matches[1];
// Add extra parameters to src and replace HTML.
$params = array(
    'controls'  => 0,
    'hd'        => 1,
    'autohide'  => 1
);
$new_src = add_query_arg($params, $src);
$video = str_replace($src, $new_src, $video);
// Add extra attributes to iframe HTML.
$attributes = 'frameborder="0"';
$video = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $video);
?>
<div class="hero-section__video">
    <div class="video">
        <span id="close-video" class="icon icon--lg">
            <?= file_get_contents(get_stylesheet_directory() . '/assets/images/close.svg'); ?>
        </span>
        <?= $video; ?>
    </div>
</div>