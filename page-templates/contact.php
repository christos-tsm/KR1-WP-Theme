<?php
/**
 * Template Name: Contact
 */
get_header();
/** Variables */
$address         = get_field( 'address', 'options' );
$address_url     = get_field( 'address_url', 'options' );
$tel             = get_field( 'tel', 'options' );
$tel_url         = preg_replace( '/\s+/', '', $tel );
$email           = get_field( 'email', 'options' );
$email_protected = antispambot( $email );
$form_shortcode  = get_field( 'form_shortcode' );

$image_attributes = array( 'class' => 'form-image', 'loading' => '', 'alt' => get_bloginfo( 'name' ) );
$form_image       = wp_get_attachment_image( get_field( 'form_image' )['ID'], 'full', false, $image_attributes );

$map_iframe = get_field( 'maps_iframe' );
?>
<main class="site-main site-main--contact">
	<?php get_template_part( 'template-parts/breadcrump' ); ?>
    <section class="contact-header container container--md">
        <div class="contact-header__content">
            <div class="page-title__container">
                <h1 class="section-title"><?php the_title(); ?></h1>
            </div>
            <ul class="contact-header__details">
                <li class="contact-header__details-item">
                    <a class="contact-header__details-item-link" href="<?= esc_url( $address_url ) ?>" target="_blank" rel="noopener">
                        <span class="icon icon--sm">
                            <?= file_get_contents( get_stylesheet_directory() . '/assets/images/pin.svg' ) ?>
                        </span>
						<?= esc_attr( $address ); ?>
                    </a>
                </li>
                <li class="contact-header__details-item">
                    <a class="contact-header__details-item-link" href="tel:<?= $tel_url ?>">
                        <span class="icon icon--sm">
                            <?= file_get_contents( get_stylesheet_directory() . '/assets/images/phone.svg' ) ?>
                        </span>
						<?= esc_attr( $tel ); ?>
                    </a>
                </li>
                <li class="contact-header__details-item">
                    <a class="contact-header__details-item-link" href="mailto:<?= $email_protected ?>">
                        <span class="icon icon--sm">
                            <?= file_get_contents( get_stylesheet_directory() . '/assets/images/email.svg' ) ?>
                        </span>
						<?= $email; ?>
                    </a>
                </li>
            </ul>
            <a href="<?= $address_url ?>" target="_blank" rel="noopener" class="contact-header__directions">
                <span class="icon icon--sm">
                    <?= file_get_contents( get_stylesheet_directory() . '/assets/images/directions.svg' ) ?>
                </span>
				<?php pll_e( 'Get Directions' ); ?>
            </a>
            <div class="animated-logo__container">
                <div class="animated-logo">
                    <img class="letters" src="<?= get_stylesheet_directory_uri() . '/assets/images/letters.png' ?>" alt="<?= bloginfo( 'name' ); ?>">
                    <img class="logo" src="<?= get_stylesheet_directory_uri() . '/assets/images/logo.jpg' ?>" alt="<?= bloginfo( 'name' ); ?>">
                </div>
            </div>
        </div>
        <div class="contact-header__form">
            <div class="interest-form">
                <h3 class="interest-form__title"><?php pll_e( 'Get contact with us' ) ?></h3>
				<?= do_shortcode( '[contact-form-7 id="574c641" title="Interest Form"]' ); ?>
            </div>
        </div>
    </section>
    <div class="form-image__container container container--md">
		<?= $form_image ?>
    </div>
    <section class="map__container">
        <div class="team__title container container--md">
            <h2><?php pll_e( 'Location' ) ?></h2>
        </div>
        <div class="map container container--md">
			<?= $map_iframe; ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>
