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
				<p class="post-header__category"><?php echo bjzm_get_post_category() ?></p>
				<h2 class="post-header__title"><?php echo get_the_title(); ?></h2>
				<p class="post-header__excerpt"><?php echo get_the_excerpt(); ?></p>
				<p class="post-header__date"><?php echo the_date('d / m / y'); ?></p>
			</header>

			<div class="entry-content">
	
				<div class="content-overlay">
					<?php echo apply_filters('the_content', get_the_content()) ?>
				</div>

			</div>

	</div>
	<div class="related_articles">
		<h4>Related Articles</h4>
	</div>
	<div class="related">
		<?php  
			$categories = wp_get_post_terms(get_the_id(), 'category');
			$tags = wp_get_post_terms(get_the_id(), 'tag');

			lt($categories);
			$args = array(
				'post_type' => 'post',
				'tax_query' => array(
					'relation' => 'OR',
					array(
						'taxonomy' => 'category',
						'field'    => 'slug',
						'terms'    => $categories,
					),
					array(
						'taxonomy' => 'tag',
						'field'    => 'slug',
						'terms'    => $tags,
					),
				),
			);
$query = new WP_Query( $args );
		?>
		<?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'views/content-card' ); ?>
		<?php endwhile; ?><?php endif; ?>
	</div>

</article>

