<?php
$prev_page = null;
if ( is_singular( 'projects' ) ) :
	$prev_page = pll_get_post( 105 );
elseif ( is_singular( 'post' ) ) :
	$prev_page = pll_get_post( 209 );
endif;
?>
<div class="breadcrump__container container container--md">
    <ul class="breadcrump">
        <li class="breadcrump__item"><a href="<?= pll_home_url() ?>"><?php pll_e( 'Home' ) ?></a></li>
		<?php if ( $prev_page ) : ?>
            <li class="breadcrump__item">
                <span class="icon icon--xsm">
                    <?= file_get_contents( get_stylesheet_directory() . '/assets/images/chevron-right.svg' ) ?>
                </span>
                <a href="<?php the_permalink( $prev_page ); ?>"><?= get_the_title( $prev_page ); ?></a>
            </li>
		<?php endif; ?>
        <li class="breadcrump__item">
            <span class="icon icon--xsm">
                <?= file_get_contents( get_stylesheet_directory() . '/assets/images/chevron-right.svg' ) ?>
            </span>
			<?php the_title(); ?>
        </li>
    </ul>
</div>
