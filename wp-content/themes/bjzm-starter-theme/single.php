<?php
/**
 * The template for displaying all single posts.
 *
 * @package Neat
 */

get_header(); ?>

	<div class="bjzm">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'views/content', 'single' ); ?>

			<?php the_post_navigation(); ?>

		<?php endwhile; // end of the loop. ?>


	</div>
	<!-- /.aa_single -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
