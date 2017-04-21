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
				<p class="post-header__date"><?php echo the_date('d / m / y'); ?></p>
			</header>

			<div class="content-single__entry-content entry-content">
	
				<div class="content-overlay">
					<?php echo apply_filters('the_content', get_the_content()) ?>
				</div>

			</div>

	</div>
</article>
<div class="related">
	<?php  
		function map($term) {
			return $term->slug;
		}
		$id = get_the_ID();
		$categories = array_map("map", wp_get_post_terms($id, 'category'));
		$tags = array_map("map", wp_get_post_terms($id, 'tag'));

		$args = array(
			'post__not_in'=> array($id),
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

		$related_query = new WP_Query($args);
		if ($related_query->have_posts()) {
			?>
			<div class="related___title">
				<h4>Related Articles</h4>
			</div>
			<div class="related__articles">
			<?php
			while($related_query->have_posts()) {
				$related_query->the_post();
				get_template_part( 'views/content-card' );
			}
			?>
			</div>
			<?php
			wp_reset_query();
		}
	?>

</div>

