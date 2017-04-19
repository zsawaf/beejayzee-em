<article id="post-<?php the_ID(); ?>" class="blog-post card count-<?php echo $key ?> post-<?php the_ID(); ?> col-md-4">
	<h1 class="single__title"><?php the_title(); ?></h1>

	<div class="single__date">
	</div>

	<div class="single__content">
	<?php the_content(); ?>
	</div>
</article>
