<article id="post-<?php the_ID(); ?>" class="blog-post card count-<?php echo $key ?> bjzm-match-height post-<?php the_ID(); ?>">
	
	<div class="blog-post-inner l-card-inner">

		<div class="card__image">
			<?php if( has_post_thumbnail() ) : ?>
			<a href="<?php the_permalink(); ?>">
				<picture>
					<source srcset="<?php echo get_the_post_thumbnail_url( null, 'single-featured-image-mobile') ?>"  media="(max-width: 480px)">
					<img class="slider-img" src="<?php echo get_the_post_thumbnail_url( null, 'card-featured-image') ?>" alt="">
				</picture>
			</a>
			<?php endif; ?>
		</div>

		<header class="card__header post-header post-header--loop">
			<p class="post-header__category"><?php echo bjzm_get_post_category() ?></p>
			<h2 class="post-header__title"><?php echo get_the_title(); ?></h2>
		</header>

		<div class="card__content">

			<div class="card__excerpt">
				<p><?php echo get_the_excerpt(); ?></p>
			</div>

			<div class="card__read-more">
				<a href="<?php the_permalink(); ?>" class="button">Read More</a>
			</div>

		</div>

	</div>

</article>

