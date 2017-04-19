<article id="post-<?php the_ID(); ?>" class="blog-post card count-<?php echo $key ?> post-<?php the_ID(); ?>">
	
	<div class="blog-post-inner">

			<div class="card-image-wrapper">
			
				<div class="card-image-outer normal">
					<div class="post-thumbnail">
					<?php if( has_post_thumbnail() ) : ?>
						<picture>
							<source srcset="<?php echo get_the_post_thumbnail_url( null, 'single-featured-image-mobile') ?>"  media="(max-width: 480px)">
							<source srcset="<?php echo get_the_post_thumbnail_url( null, 'single-featured-image-tablet') ?>"  media="(max-width: 768px)">
							<img class="slider-img" src="<?php echo get_the_post_thumbnail_url( null, 'single-featured-image') ?>" alt="">
						</picture>
					<?php endif; ?>
					</div>
				</div>	

			</div>

			<header class="post-header">
				<p class="post-header__category"><?php echo bjzm_get_post_category() ?></p>
				<h2 class="post-header__title"><?php echo get_the_title(); ?></h2>
				<p class="post-header__excerpt"><?php echo get_the_excerpt(); ?></p>
			</header>

			<div class="entry-content">
	
				<div class="content-overlay">
					<p><?php echo get_the_content(); ?></p>
				</div>

				<div class="read-more">
					<span class="read-more-link">Read More</span>
				</div>

			</div>

	</div>

</article>

