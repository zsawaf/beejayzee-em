<article id="post-<?php the_ID(); ?>" class="blog-post card count-<?php echo $key ?> bjzm-match-height post-<?php the_ID(); ?> col-md-4">
	
	<div class="blog-post-inner">

			<div class="card-image-wrapper">
			
				<div class="card-image-outer normal">
					<div class="post-thumbnail">
						<?php if( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>">
							<picture>
								<source srcset="<?php echo get_the_post_thumbnail_url( null, 'single-featured-image-mobile') ?>"  media="(max-width: 480px)">
								<img class="slider-img" src="<?php echo get_the_post_thumbnail_url( null, 'card-featured-image') ?>" alt="">
							</picture>
						</a>
						<?php endif; ?>
					</div>
				</div>

			</div>

			<header class="post-header post-header--loop">
				<p class="post-header__category"><?php echo bjzm_get_post_category() ?></p>
				<h2 class="post-header__title"><?php echo get_the_title(); ?></h2>
			</header>

			<div class="entry-content">
	
				<div class="content-overlay">
					<p><?php echo get_the_excerpt(); ?></p>
				</div>

				<div class="read-more">
					<a href="" class="button">Read More</a>
				</div>

			</div>

	</div>

</article>

