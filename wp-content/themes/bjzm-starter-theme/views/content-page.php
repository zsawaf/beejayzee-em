<article id="post-<?php the_ID(); ?>" class="blog-post card count-<?php echo $key ?> post-<?php the_ID(); ?> content-page">
	
	<div class="l-content-page-inner">

		<header class="page-header">
			<h1 class="page-header__title"><?php echo get_the_title(); ?></h1>
		</header>

		<div class="entry-content">

			<?php echo apply_filters('the_content', get_the_content()) ?>

		</div>
	</div>

</article>

