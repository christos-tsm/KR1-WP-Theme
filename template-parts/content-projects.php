<?php
$gallery            = get_field( 'gallery' );
$floor_plan         = get_field( 'floor_plan_pdf' );
$complementary_text = get_field( 'complementary_text' );
$video              = get_field( 'video' );
$map_iframe         = get_field( 'maps_iframe' );
?>
<section class="single-projects__intro container container--md">
    <div class="single-projects__specifications-container">
		<?php if ( have_rows( 'specifications_groups' ) ) : ?>
            <h3><?php pll_e( 'Specifications' ); ?></h3>
            <div class="single-projects__specifications">
				<?php while ( have_rows( 'specifications_groups' ) ) : the_row(); ?>
					<?php $index = get_row_index(); ?>
                    <div class="single-projects__specifications-item">
                        <p class="number">0<?= $index; ?></p>
						<?php the_sub_field( 'specifications' ) ?>
                    </div>
				<?php endwhile; ?>
            </div>
		<?php endif; ?>
		<?php if ( $floor_plan ) : ?>
            <p class="single-projects__floor-plan">
                <a href="<?= esc_url( $floor_plan['url'] ) ?>" target="_blank" rel="noopener">
                    <span class="icon icon--sm"><?= file_get_contents( get_stylesheet_directory() . '/assets/images/pdf.svg' ); ?></span>
					<?php pll_e( 'Floor Plan' ); ?>
                </a>
                <a href="<?= esc_url( $floor_plan['url'] ) ?>" download target="_blank" rel="noopener"><?php pll_e( 'Download PDF' ) ?></a>
            </p>
		<?php endif; ?>
        <a href="#interest-form" class="cta cta--golden cta--icon">
			<?php pll_e( 'APPLY FOR INTEREST' ); ?>
            <span class="icon icon--md">
                <?= file_get_contents( get_stylesheet_directory() . '/assets/images/cta-arrow.svg' ); ?>
            </span>
        </a>
    </div>
    <div class="single-projects__details">
        <h3 class="single-projects__details-title"><?php pll_e( 'Details' ) ?></h3>
		<?php if ( have_rows( 'details' ) ) : ?>
			<?php while ( have_rows( 'details' ) ) : the_row(); ?>
                <div class="single-projects__details-intro-text">
					<?php the_sub_field( 'intro_text' ); ?>
                </div>
				<?php if ( get_sub_field( 'rest_text' ) ) : ?>
                    <div class="single-projects__details-rest-text">
						<?php the_sub_field( 'rest_text' ); ?>
                    </div>
                    <a href="#!" id="reveal-text"><?php pll_e( 'MORE +' ) ?></a>
				<?php endif; ?>
				<?php if ( have_rows( 'bullets_text' ) ) : ?>
                    <div class="single-projects__bullets">
						<?php while ( have_rows( 'bullets_text' ) ) : the_row() ?>
                            <div class="single-projects__bullets-single">
                                <div class="icon icon--md"><?= file_get_contents( get_stylesheet_directory() . '/assets/images/check.svg' ); ?></div>
                                <div class="single-projects__bullets-content">
                                    <p><?php the_sub_field( 'text' ); ?></p>
                                </div>
                            </div>
						<?php endwhile; ?>
                    </div>
				<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>
    </div>
</section>
<?php if ( $gallery ) : ?>
    <section class="single-projects__gallery container container--md">
		<?php foreach ( $gallery as $key => $image ) : ?>
			<?php
			$image_attributes = array( 'class' => 'gallery-image', 'loading' => '', 'alt' => get_bloginfo( 'name' ) );
			$render_image     = wp_get_attachment_image( $image['ID'], 'full', false, $image_attributes );
			?>
            <a href="<?= esc_url( $image['url'] ) ?>" data-key="<?= $key + 1 ?>" class="gallery-link <?= $key + 1 > 6 ? 'hidden' : '' ?>">
				<?= $render_image; ?>
            </a>
		<?php endforeach; ?>
		<?php if ( count( $gallery ) > 6 ) : ?>
            <span id="single-projects-show-more-gallery"><?php pll_e( 'more' ); ?></span>
		<?php endif; ?>
    </section>
<?php endif; ?>
<?php if ( $complementary_text || $video ) : ?>
    <div class="video__container container container--sm">
		<?php if ( $complementary_text ) : ?>
            <p><?= $complementary_text; ?></p>
		<?php endif; ?>
		<?php if ( $video ) : ?>
			<?= $video; ?>
		<?php endif; ?>
    </div>
<?php endif; ?>
<?php if ( $map_iframe ) : ?>
    <section class="map__container container container--md">
        <div class="team__title">
            <h2><?php pll_e( 'Location' ) ?></h2>
        </div>
        <div class="map">
			<?= $map_iframe; ?>
        </div>
    </section>
<?php endif; ?>
<section class="interest-form__container">
    <div class="interest-form" data-name="<?= get_the_title(); ?>">
        <h3 class="interest-form__title"><?php pll_e( 'Apply for interest' ) ?></h3>
		<?= do_shortcode( '[contact-form-7 id="574c641" title="Interest Form"]' ); ?>
    </div>
</section>
