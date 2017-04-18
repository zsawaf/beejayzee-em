
<footer class="footer footer-main">
	<div class="l-footer-main-inner">
		<div class="container l-container">
			<div class="l-row">
				<div class="l-column l-column-left">
					<a href="#" class="footer-main__privacy-policy">Privacy Policy</a>
				</div>
				<div class="l-column l-column-center">
					
				</div>
				<div class="l-column l-column-right">
					<nav class="footer-main__navigation navigation navigation--social">
						<?php wp_nav_menu( array( 'theme_location' => 'social', 'menu_id' => 'social-menu', 'menu_class' => 'navigation__menu' ) ); ?>
					</nav>
				</div>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
