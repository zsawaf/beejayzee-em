<?php get_header(); ?>

<div class="bjzm-wrapper bjzm-wrapper--index">
	
	<div class="bjzm-wrapper__inner">

	<?php do_slideshow(16, "slider", "home_slider"); ?>
		
		<div class="bjzm-content">
			
			<div class="bjzm-content__container container">
				
				<div class="post-loop post-loop--archive">

					<div class="bjzm-content__row row">

					<?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'views/content-card' ); ?>
					
					<?php endwhile; ?><?php endif; ?>
				
					</div><!-- .post-loop -->

				</div><!-- .bjzm-content__row -->

			</div><!-- .bjzm-content__container -->

		</div><!-- .bjzm-content -->
		
	</div><!-- .bjzm-wrapper__inner -->

</div><!-- .bjzm-wrapper -->

<?php get_footer(); ?>
