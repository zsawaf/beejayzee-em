<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Neat
 */

get_header(); ?>

<div class="bjzm-wrapper bjzm-wrapper--page">
	
	<div class="bjzm-wrapper__inner">
		
		<div class="bjzm-content">
			
			<div class="bjzm-content__container container">

				<?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'views/content', 'page' ); ?>

				<?php endwhile; ?><?php endif; ?>

			</div><!-- .bjzm-content__container -->

		</div><!-- .bjzm-content -->

	</div><!-- .bjzm-wrapper__inner -->

</div><!-- .bjzm-wrapper -->


<?php get_footer(); ?>
