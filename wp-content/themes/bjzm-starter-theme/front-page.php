<?php get_header(); ?>

<div class="bjzm-main-wrapper l-bjzm-main-wrapper">
	
	<?php 
<<<<<<< HEAD
=======
		// do_hero(16);
>>>>>>> a5e2b05352ae50d85bf5e39123db20ea8f7d53e3
		do_slideshow(16, "slider", "home_slider"); 
	?>

	<div class="l-bjzm-main-wrapper-inner">

		<div class="blog-post-wrapper container">
			
			<div class="row posts-loop posts-loop--home">

				<?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'views/content-card' ); ?>
				
				<?php endwhile; ?><?php endif; ?>
				
			</div>

		</div>
		
	</div>
</div>

<?php get_footer(); ?>
