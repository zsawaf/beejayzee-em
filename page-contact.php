<?php get_header(); ?>
	<div class="bjzm">

		<?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
			
			<?php get_template_part( 'views/content-contact' ) ?>
			
			<?php endwhile; ?>
		<?php endif; ?>

	</div>
<?php get_footer(); ?>
