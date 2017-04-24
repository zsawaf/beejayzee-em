<?php
/**
 * Template Name: Hero Grid Template
 */

get_header(); ?>

	<div class="bjzm-main-wrapper l-bjzm-main-wrapper page">
		<div class="l-bjzm-main-wrapper-inner">
			<div class="container">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'views/content', 'hero-grid' ); ?>

				<?php endwhile; // end of the loop. ?>
				
			</div>
		</div>
	</div>

<?php get_footer(); ?>
