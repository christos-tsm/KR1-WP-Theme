<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php $header_logo = get_field('header_logo', 'option'); ?>
	<div id="page" class="site">
		<header class="site-header">
			<div class="site-header__content">
				<a aria-label="Homepage Link" href="<?= pll_home_url() ?>">
					<img src="<?= $header_logo['url'] ?>" alt="<?= bloginfo('name'); ?>">
				</a>
				<div class="navigation__container">
					<nav class="navigation">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
								'container' => 'ul'
							)
						);
						?>
					</nav>
					<div class="navigation__actions">
						<?php $contact_page = pll_get_post(1); ?>
						<a href="<?php the_permalink($contact_page); ?>" class="cta cta--golden cta--icon">
							<?php pll_e('Get Quoted') ?>
							<span class="icon icon--md">
								<?= file_get_contents(get_stylesheet_directory() . '/assets/images/cta-arrow.svg'); ?>
							</span>
						</a>
						<ul class="languages">
							<?php
							$languages = pll_the_languages(array('raw' => 1));
							$clang = pll_current_language('name');
							?>
							<?php foreach ($languages as $language) : ?>
								<?php if ($language['name'] == $clang) : ?>
									<li class="lang lang--current">
										<?= $language['name']; ?>
										<span class="icon icon--xsm">
											<?= file_get_contents(get_stylesheet_directory() . '/assets/images/chevron-down.svg'); ?>
										</span>
									</li>
								<?php endif; ?>
							<?php endforeach; ?>
							<?php foreach ($languages as $language) : ?>
								<?php if ($language['name'] == $clang) continue; ?>
								<li class="lang lang--next"><a href="<?= $language['url']; ?>"><?= $language['name']; ?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
		</header>