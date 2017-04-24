
<?php get_header(); ?>

<div class="bjzm-wrapper bjzm-wrapper--index">
	
	<div class="bjzm-wrapper__inner">

		<?php do_slideshow(16, "slider", "home_slider"); ?>

		<div class="bjzm-content">

			<div class="bjzm-content__container container">
			
				<div class="bjzm-content__row row">

					<div class="post-loop post-loop--home">

						<?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'views/content-card' ); ?>
						
						<?php endwhile; ?><?php endif; ?>

					</div>

				</div>

			</div>

		</div>
		
	</div>

</div>

<?php get_footer(); ?>
