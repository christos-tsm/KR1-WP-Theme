<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package KR1
 */

get_header();
?>
<main id="primary" class="site-main site-main--single-post">
    <article id="article-<?= get_the_ID(); ?>" data-post-type="<?= get_post_type(); ?>">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/breadcrump' ); ?>
			<?php get_template_part( 'template-parts/single-header' ); ?>
			<?php if ( 'post' === get_post_type() ) : ?>
                <div class="single-post__content container container--sm">
					<?php the_content(); ?>
                </div>
			<?php endif; ?>
			<?php if ( 'projects' === get_post_type() ) : ?>
                <div class="single-projects__content">
					<?php get_template_part( 'template-parts/content-projects' ); ?>
                </div>
			<?php endif; ?>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
    </article>
	<?php
	$post_type = get_post_type();
	$args      = array(
		'post_type'      => $post_type,
		'posts_per_page' => 2,
		'post_status'    => 'publish',
		'post__not_in'   => array( pll_get_post( get_the_ID() ) )
	);
	$query     = new WP_Query( $args );
	?>
	<?php if ( $query->have_posts() ) : ?>
        <section class="read-more__container container container--md">
            <h3 class="read-more__title section-title">
				<?= 'post' === $post_type ? pll__( 'Read More' ) : pll__( 'More Works' ) ?>
            </h3>
            <div class="projects-grid">
				<?php
				while ( $query->have_posts() ) : $query->the_post();
					if ( 'post' === $post_type ) :
						get_template_part( 'template-parts/post-card' );
					else :
						get_template_part( 'template-parts/project-card' );
					endif;
				endwhile;
				?>
            </div>
        </section>
	<?php endif; ?>
</main>
<?php get_footer(); ?>
