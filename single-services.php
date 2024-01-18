<?php get_header(); ?>
    <main class="site-main site-main--single-services">
		<?php get_template_part( 'template-parts/page-header' ); ?>
		<?php if ( have_rows( 'sections' ) ) : ?>
            <section class="single-services__content">
				<?php while ( have_rows( 'sections' ) ) : the_row(); ?>
                    <div class="single-services__item">
						<?php
						$image_attributes = array( 'class' => 'page-header__background', 'loading' => '', 'alt' => get_bloginfo( 'name' ) );
						$image            = wp_get_attachment_image( get_sub_field( 'image' )['ID'], 'full', false, $image_attributes );
						?>
                        <div class="single-services__item-image">
							<?= $image; ?>
                        </div>
                        <div class="single-services__item-content">
                            <div class="single-services__item-text">
								<?php if ( get_sub_field( 'title' ) ) : ?>
                                    <h3><?php the_sub_field( 'title' ); ?></h3>
								<?php endif; ?>
                                <p><?php the_sub_field( 'text' ); ?></p>
                            </div>
                        </div>
                    </div>
				<?php endwhile; ?>
            </section>
		<?php endif; ?>
        <section class="interest-form__container">
            <div class="interest-form" data-name="<?= get_the_title(); ?>">
                <h3 class="interest-form__title"><?php pll_e( 'Apply for interest' ) ?></h3>
				<?= do_shortcode( '[contact-form-7 id="574c641" title="Interest Form"]' ); ?>
            </div>
        </section>
    </main>
<?php get_footer(); ?>
