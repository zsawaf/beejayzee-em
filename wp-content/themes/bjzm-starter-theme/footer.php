
<footer class="footer footer-main">
	<div class="l-footer-main-inner">
		<div class="container l-container">
			<div class="l-row">
				<div class="l-column l-column-left">
					<a href="#privacy-policy" class="footer-main__privacy-policy open-inline-lightbox">Privacy Policy</a>
				</div>
				<div class="l-column l-column-center">
					
				</div>
				<div class="l-column l-column-right">
					<nav class="footer-main__navigation navigation navigation--social">
						<?php wp_nav_menu( array( 'theme_location' => 'social', 'menu_id' => 'social-menu', 'menu_class' => 'navigation__menu navigation__menu--align-right' ) ); ?>
					</nav>
				</div>
			</div>
		</div>
	</div>
</footer>

<div id="privacy-policy" class="lightbox lightbox--privacy-policy mfp-hide">
	<div class="lightbox__container">
		<?php echo get_field('privacy_policy', 'option') ?>
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>
