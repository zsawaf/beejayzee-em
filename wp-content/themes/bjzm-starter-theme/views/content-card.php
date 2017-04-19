<article id="post-<?php the_ID(); ?>" class="blog-post card count-<?php echo $key ?> post-<?php the_ID(); ?> col-md-4">
	
	<div class="blog-post-inner">

		<a href="<?php echo get_permalink(); ?>" class="">

			<div class="card-image-wrapper">
			
				<div class="card-image-outer normal">
					<div class="post-thumbnail">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
						</a>
					</div>
				</div>	

			</div>

			<header class="entry-header">
				<p class="entry-category"><?php echo bjzm_get_post_category() ?></p>
				<h2><?php echo get_the_title(); ?></h2>
			</header>

			<div class="entry-content">
	
				<div class="content-overlay">
					<p><?php echo get_the_excerpt(); ?></p>
				</div>

				<div class="read-more">
					<span class="read-more-link">Read More</span>
				</div>

			</div>

		</a>
	</div>

</article>

