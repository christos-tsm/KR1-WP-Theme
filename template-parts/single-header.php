<?php
$prev_page   = null;
$is_projects = null;
$is_post     = null;
$categories  = null;
if ( is_singular( 'projects' ) ) :
	$prev_page   = pll_get_post( 105 );
	$prev_title  = pll__( 'Back to projects' );
	$is_projects = is_singular( 'projects' );
	$categories  = get_the_terms( get_the_ID(), 'categories' );
elseif ( is_singular( 'post' ) ) :
	$is_post    = is_singular( 'post' );
	$prev_page  = pll_get_post( 209 );
	$prev_title = pll__( 'Back to news' );
	$categories = wp_get_post_categories( get_the_ID(), array( 'fields' => 'names' ) );
endif;
?>
<section class="single-header__container container container--md">
    <div class="backlink__container">
        <a href="<?php the_permalink( $prev_page ); ?>">
	        <span class="icon--backlink">
		        <?= file_get_contents( get_stylesheet_directory() . '/assets/images/arrow-back.svg' ); ?>
	        </span>
            <span class="text">
				<?= $prev_title ?>
	        </span>
        </a>
    </div>
	<?php if ( $is_post ) : ?>
        <p class="date-posted"><?= get_the_date( 'j F Y' ) ?></p>
	<?php endif; ?>
    <div class="single-title__container">
        <div class="single-title">
            <h1><?php the_title(); ?></h1>
            <p class="post-category">
				<?php foreach ( $categories as $cat ) : ?>
					<?php if ( $is_projects ) : ?>
                        <span><?= $cat->name ?></span>
					<?php else : ?>
                        <span><?= $cat; ?></span>
					<?php endif; ?>
				<?php endforeach; ?>
            </p>
        </div>
        <div class="single-title__details">
            <a href="#!" aria-label="Share" class="icon icon--lg" id="share-post">
				<?= file_get_contents( get_stylesheet_directory() . '/assets/images/share.svg' ); ?>
            </a>
        </div>
    </div>
</section>
<?php if ( has_post_thumbnail() ) : ?>
    <div class="single-thumbnail__container container container--md">
		<?php the_post_thumbnail(); ?>
    </div>
<?php endif; ?>
