<?php
/**
 * The template for displaying all single posts.
 *
 * @package Neat
 */

get_header(); ?>

	<div class="bjzm-main-wrapper l-bjzm-main-wrapper single-post">
		<div class="l-bjzm-main-wrapper-inner">
			<div class="container">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'views/content', 'single' ); ?>
					
					<?php get_template_part( 'views/post-navigation') ?>

				<?php endwhile; // end of the loop. ?>
			</div>
		</div>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
