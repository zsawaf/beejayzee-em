<article id="post-<?php the_ID(); ?>" class="blog-post card count-<?php echo $key ?> post-<?php the_ID(); ?> content-single">
	
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
				<ul class="post-header__meta-list">
					<li class="post-header__post-category"><?php echo bjzm_get_post_category(true) ?></li>
					<li class="post-header__post-date"><?php echo get_the_date('F j Y') ?></li>
				</ul>
				<h2 class="post-header__title"><?php echo get_the_title(); ?></h2>
				<p class="post-header__excerpt"><?php echo get_the_excerpt(); ?></p>
			</header>

			<div class="content-single__entry-content entry-content">
	
				<div class="content-overlay">
					<?php echo apply_filters('the_content', get_the_content()) ?>
				</div>

			</div>

	</div>

</article>

