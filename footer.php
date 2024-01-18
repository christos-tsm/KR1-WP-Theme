<?php
$footer_logo = get_field('footer_logo', 'option');
$tel = get_field('tel', 'option');
$tel_url = str_replace(' ', '', $tel);
$email = get_field('email', 'option');
$protected_email = antispambot($email);
$address = get_field('address', 'option');
$address_url = get_field('address_url', 'option');
$facebook = get_field('facebook_url', 'option');
$instagram = get_field('instagram_url', 'option');
$linkedin = get_field('linkedin_url', 'option');
?>
<footer class="site-footer">
	<span class="back-to-top" id="back-to-top">
		<span class="icon icon--xsm">
			<?= file_get_contents(get_stylesheet_directory() . '/assets/images/back-to-top.svg'); ?>
		</span>
		<span class="text">
			<?php pll_e('BACK TO TOP') ?>
		</span>
	</span>
	<div class="site-footer__columns container container--md">
		<div class="site-footer__columns-single site-footer__logo">
			<a href="<?= pll_home_url() ?>">
				<img src="<?= esc_url($footer_logo['url']) ?>" alt="<?= bloginfo('name'); ?>">
			</a>
		</div>
		<div class="site-footer__columns-single site-footer__contact site-footer__ul">
			<ul>
				<li>
					<a href="tel:<?= $tel_url ?>">T. <?= $tel ?></a>
				</li>
				<li>
					<a class="email" href="mailto:<?= $protected_email ?>">E. <?= $email; ?></a>
				</li>
				<li>
					<a href="<?= esc_url($address_url) ?>" target="_blank" rel="noopener">
						A. <?= $address; ?>
					</a>
				</li>
			</ul>
		</div>
		<div class="site-footer__columns-single site-footer__menu site-footer__ul">
			<h5><?php pll_e('Projects'); ?></h5>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer-menu-1',
					'menu_id'        => 'footer-menu-1',
					'container' => 'ul'
				)
			);
			?>
		</div>
		<div class="site-footer__columns-single site-footer__social">
			<h5><?php pll_e('Follow us') ?></h5>
			<ul>
				<li>
					<a href="tel:<?= $facebook ?>" target="_blank" rel="noopener"><?= pll_e('Facebook'); ?></a>
				</li>
				<li>
					<a href="tel:<?= $instagram ?>" target="_blank" rel="noopener"><?= pll_e('Instagram'); ?></a>
				</li>
				<li>
					<a href="tel:<?= $linkedin ?>" target="_blank" rel="noopener"><?= pll_e('Linkedin'); ?></a>
				</li>
			</ul>
		</div>
		<div class="site-footer__columns-single site-footer__menu site-footer__ul">
			<h5><?php pll_e('Services'); ?></h5>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer-menu-2',
					'menu_id'        => 'footer-menu-2',
					'container' => 'ul'
				)
			);
			?>
		</div>
	</div>
	<div class="copyrights container container--md">
		<p>
			<span id="desCredit">
				<span class="designous-credits">Made with <img class="pulse" src="https://ensogreen.gr/wp-content/uploads/2023/10/heart.svg" alt="heart icon for designous">
					by
					<a href="https://designous.gr" target="_blank" rel="noopener noreferrer">
						DESIGNOUS
					</a>
				</span>
			</span>
		</p>
		<p>
			KR1
			<span class="color-golden">&copy;</span>
			COPYRIGHT <?= date("Y"); ?>
		</p>
	</div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>