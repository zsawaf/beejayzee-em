<?php get_header(); ?>

<div class="bjzm-main-container">
	
	<div class="blog-post-wrapper container">
		<div class="row">

			<?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'views/content-card' ); ?>
			
			<?php endwhile; ?><?php endif; ?>
			
		</div>
	</div>

</div>

<?php get_footer(); ?>
