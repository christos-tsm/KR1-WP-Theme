<?php

/**
 * Template Name: Homepage
 */
get_header();
?>
<main class="site-main site-main--homepage">
	<?php if ( have_rows( 'hero_section' ) ) : ?>
        <section class="hero-section__container">
			<?php while ( have_rows( 'hero_section' ) ) : the_row(); ?>
				<?php $image = get_sub_field( 'background_image' ); ?>
				<?php get_template_part( 'template-parts/hero-video' ); ?>
                <div class="overlay"></div>
                <div class=""></div>
                <a href="javascript:void(0);" id="play-video"><?php pll_e( 'Play' ); ?></a>
                <div class="hero-section">
                    <img class="hero-section__image" src="<?= esc_url( $image['url'] ) ?>" alt="<?= bloginfo( 'name' ); ?>">
                    <div class="hero-section__content">
                        <h1><?php the_sub_field( 'title' ); ?></h1>
                        <p><?php the_sub_field( 'text' ); ?></p>
						<?php get_template_part( 'template-parts/cta-golden' ); ?>
                    </div>
                </div>
                <div class="hero-section__scroll-down">
                    <span class="text">
                        <?php pll_e( 'Scroll Down' ); ?>
                    </span>
                    <span class="icon">
                        <?= file_get_contents( get_stylesheet_directory() . '/assets/images/scroll-down-texture.svg' ); ?>
                    </span>
                </div>
			<?php endwhile; ?>
        </section>
	<?php endif; ?>
	<?php if ( have_rows( 'about' ) ) : ?>
        <section class="home-about__container">
			<?php while ( have_rows( 'about' ) ) : the_row(); ?>
				<?php $image_left = get_sub_field( 'image_left' ); ?>
				<?php $image_right = get_sub_field( 'image_right' ); ?>
                <div class="home-about container container--md">
                    <div class="home-about__left">
                        <img src="<?= esc_url( $image_left['url'] ) ?>" alt="<?= bloginfo( 'name' ); ?>">
                    </div>
                    <div class="home-about__mid">
                        <h2 class="section-title"><?php the_sub_field( 'title' ); ?></h2>
                        <div class="home-about__text">
							<?php the_sub_field( 'text' ); ?>
                        </div>
						<?php get_template_part( 'template-parts/cta-golden' ); ?>
                    </div>
                    <div class="home-about__right">
                        <img src="<?= esc_url( $image_right['url'] ) ?>" alt="<?= bloginfo( 'name' ); ?>">
                        <div class="animated-logo__container">
                            <div class="animated-logo">
                                <img class="letters" src="<?= get_stylesheet_directory_uri() . '/assets/images/letters.png' ?>" alt="<?= bloginfo( 'name' ); ?>">
                                <img class="logo" src="<?= get_stylesheet_directory_uri() . '/assets/images/logo.jpg' ?>" alt="<?= bloginfo( 'name' ); ?>">
                            </div>
                        </div>
                    </div>
                </div>
			<?php endwhile; ?>
        </section>
	<?php endif; ?>
	<?php if ( have_rows( 'works' ) ) : ?>
        <section class="home-works__container">
			<?php while ( have_rows( 'works' ) ) : the_row(); ?>
				<?php $link = get_sub_field( 'link' ); ?>
				<?php $projects = get_sub_field( 'projects' ); ?>
                <div class="home-works">
                    <div class="cta-title__container container container--md">
                        <span class="texture"><?php pll_e( 'WORK' ); ?></span>
                        <div class="cta-title__text">
                            <h2 class="section-title section-title--white"><?php the_sub_field( 'title' ); ?></h2>
							<?php the_sub_field( 'text' ); ?>
                        </div>
                        <div class="cta-title__cta">
							<?php get_template_part( 'template-parts/cta-golden' ); ?>
                        </div>
                    </div>
					<?php if ( $projects ) : ?>
                        <div class="home-works__slider-container  container container--md">
                            <div class="slider-position">
                                <div class="home-works__slider">
									<?php foreach ( $projects as $post ) : setup_postdata( $post ) ?>
										<?php $terms = get_the_terms( $post->ID, 'categories' ); ?>
                                        <div class="home-works__slider-single">
											<?php if ( has_post_thumbnail() ) : ?>
                                                <a href="<?php the_permalink() ?>">
                                                    <div class="view-more">
														<?php pll_e( 'View More' ) ?>
                                                        <span class="icon icon--xsm">
                                                            <?= file_get_contents( get_stylesheet_directory() . '/assets/images/arrow-right.svg' ) ?>
                                                        </span>
                                                    </div>
                                                    <img src="<?= the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>">
                                                </a>
                                                <div class="home-works__slider-single-title">
													<?php if ( ! empty( $terms ) ) : ?>
                                                        <div class="project-categories">
															<?php foreach ( $terms as $term ) : ?>
                                                                <span class="category"><?php echo esc_html( $term->name ); ?></span>
															<?php endforeach; ?>
                                                        </div>
													<?php endif; ?>
                                                    <h3>
                                                        <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                                                    </h3>
                                                </div>
											<?php endif; ?>
                                        </div>
									<?php endforeach; ?>
									<?php wp_reset_postdata(); ?>
                                </div>
                            </div>
                            <span class="works-slider-arrow works-slider-arrow--next">
                                <?= file_get_contents( get_stylesheet_directory() . '/assets/images/works-slider-arrow.svg' ) ?>
                            </span>
                        </div>
					<?php endif; ?>
                </div>
			<?php endwhile; ?>
        </section>
	<?php endif; ?>
	<?php if ( have_rows( 'services' ) ) : ?>
        <section class="home-services__container">
			<?php while ( have_rows( 'services' ) ) : the_row(); ?>
				<?php $link = get_sub_field( 'link' ); ?>
				<?php $services = get_sub_field( 'services_cpt' ); ?>
                <div class="home-services">
                    <div class="cta-title__container container container--md">
                        <div class="cta-title__text">
                            <h2 class="section-title"><?php the_sub_field( 'title' ); ?></h2>
							<?php the_sub_field( 'text' ); ?>
                        </div>
                        <div class="cta-title__cta">
							<?php get_template_part( 'template-parts/cta-golden' ); ?>
                        </div>
                    </div>
					<?php if ( $services ) : ?>
                        <div class="services-grid container container--md">
							<?php foreach ( $services as $post ) : setup_postdata( $post ); ?>
								<?php get_template_part( 'template-parts/services-card' ); ?>
							<?php endforeach; ?>
							<?php wp_reset_postdata(); ?>
                        </div>
					<?php endif; ?>
                </div>
			<?php endwhile; ?>
        </section>
	<?php endif; ?>
	<?php if ( have_rows( 'news' ) ) : ?>
        <section class="home-news__container">
			<?php while ( have_rows( 'news' ) ) : the_row(); ?>
				<?php $link = get_sub_field( 'link' ); ?>
				<?php $news = get_sub_field( 'posts' ); ?>
                <div class="home-news">
                    <div class="cta-title__container container container--md">
                        <div class="cta-title__text">
                            <h2 class="section-title"><?php the_sub_field( 'title' ); ?></h2>
							<?php the_sub_field( 'text' ); ?>
                        </div>
                        <div class="cta-title__cta">
							<?php get_template_part( 'template-parts/cta-golden' ); ?>
                        </div>
                    </div>
					<?php if ( $news ) : ?>
                        <div class="posts__container container container--md">
							<?php foreach ( $news as $post ) : setup_postdata( $post ); ?>
								<?php get_template_part( 'template-parts/post-card' ); ?>
							<?php endforeach; ?>
							<?php wp_reset_postdata(); ?>
                        </div>
					<?php endif; ?>
                </div>
			<?php endwhile; ?>
        </section>
	<?php endif; ?>
	<?php if ( have_rows( 'contact' ) ) : ?>
        <div class="home-contact__container">
			<?php while ( have_rows( 'contact' ) ) : the_row(); ?>
				<?php
				$image = get_sub_field( 'image' );
				$link  = get_sub_field( 'link' );
				?>
                <div class="home-contact__content">
                    <div class="home-contact__text">
                        <h3 class="section-title"><?php the_sub_field( 'title' ); ?></h3>
						<?php the_sub_field( 'text' ); ?>
						<?php get_template_part( 'template-parts/cta-golden' ); ?>
                    </div>
                </div>
                <div class="home-contact__image">
                    <img src="<?= esc_url( $image['url'] ) ?>" alt="<?php the_title(); ?>">
                </div>
			<?php endwhile; ?>
        </div>
	<?php endif; ?>
</main>
<?php get_footer(); ?>
