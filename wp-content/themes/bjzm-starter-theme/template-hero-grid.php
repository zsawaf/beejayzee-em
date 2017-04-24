<?php
/**
 * Template Name: Hero Grid Template
 */

get_header(); ?>

<div class="bjzm-wrapper bjzm-wrapper--template-hero-grid">
	
	<div class="bjzm-wrapper__inner">
		
		<div class="bjzm-content">
			
			<div class="bjzm-content__container">
				
			<?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'views/content', 'hero-grid' ); ?>

			<?php endwhile; ?><?php endif; ?>

			</div><!-- .bjzm-content__container -->

		</div><!-- .bjzm-content -->

	</div><!-- .bjzm-wrapper__inner -->

</div><!-- .bjzm-wrapper -->

<?php get_footer(); ?>
