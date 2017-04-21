<?php

/**
 * Create a picture element tag given different image dimensions. 
 * 
 * @param  [string] $full_width   [full width image url]
 * @param  [string] $tablet_width [tablet width image url]
 * @param  [string] $mobile_width [mobile width image url]
 * @return [io]               [the picture tag]
 */
function srcset($full_width, $tablet_width, $mobile_width, $class="") {
	echo "
		<picture>
			<source media='(min-width: 991px)'
				srcset='$full_width'>
			<source media='(min-width: 480px)'
				srcset='$tablet_width'>
			<img class='$class' srcset='$mobile_width' alt=''>
		</picture>
	";
}

/**
 * Do hero image
 * @param  [type] $page_id [description]
 * @param  string $classes [description]
 * @return [type]          [description]
 */
function do_hero($page_id, $classes="") {
	$hero_text = get_field('hero_text', $page_id);
	$hero_desktop = get_field('hero_image_desktop', $page_id);
	$hero_tablet = get_field('hero_image_tablet', $page_id);
	$hero_mobile = get_field('hero_image_mobile', $page_id);
	?>
	<section class="hero <?php echo $classes ?>">
		<?php srcset($hero_desktop, $hero_tablet, $hero_mobile, "hero__image") ?>
		<div class="l-hero-wrapper">
			<div class="container">
				<div class="hero__content">
					<?php echo $hero_text; ?>
				</div>
			</div>
		</div>
	</section>
	<?php
}

/**
 * Build a slideshow
 * @param  [type] $page_id   [id of page]
 * @param  [type] $field_key [name of acf]
 * @param  [type] $slider_id [id of slider]
 * @param  string $classes   [classes you'd like to add]
 * @return [type]            [description]
 */
function do_slideshow($page_id, $field_key, $slider_id, $classes="") {
	$slider = get_field($field_key, $page_id);
	?>
	<section class="bjzm__slider <?php echo $classes ?>">
		<div class="l-slider-inner">

			<ul class="slider" id="<?php echo $slider_id ?>">
			<?php foreach($slider as $key => $slide):?>
				
				<li class="slider__slide slide--<?php echo $key ?>">
					<div class="slider__image">
						<?php srcset($slide['background_image']['sizes']['hero-image'], $slide['background_image']['sizes']['hero-image-tablet'], $slide['background_image']['sizes']['hero-image-mobile']) ?>
					</div>
					<div class="l-slide-wrapper">
						<div class="container l-container">
							<div class="container-narrow l-container-narrow">
								<div class="slider__content">
									<?php echo $slide['content'] ?>
								</div>
							</div>
						</div>
					</div>
					
				</li>

			<?php endforeach; ?>
			</ul>
		</div>
	</section>
	<?php
}


function my_secondary_menu_classes( $classes, $item, $args ) {

	$classes[] = 'navigation__item';
	return $classes;

}
add_filter( 'nav_menu_css_class', 'my_secondary_menu_classes', 	10, 3 ); 


function bjzm_get_post_category() {

	$cats = get_the_category();
	return $cats[0]->name;

}

add_filter( 'image_size_names_choose', 'wpshout_custom_sizes' );

function filter_ptags_on_images($content) {
	return preg_replace('/<p\b[^>]*>(\s*)(<img .* \/>)(\s*)<\/p>/iU', '\2', $content);
}
add_filter('the_content', 'filter_ptags_on_images', 10);

/**
 * Console log from php
 * @param  [type] $data [description]
 * @return [type]       [description]
 */
function lt($data) { ?>
	<script>
		console.log( <?php echo json_encode(  $data ) ?> );
	</script>
<? }

function get_post_featured_image_url( $post_id, $size = 'thumbnail-size' ) {
	
	$thumb_id = get_post_thumbnail_id( $post_id );
	$thumb_url_array = wp_get_attachment_image_src($thumb_id, $size, true);
	$thumb_url = $thumb_url_array[0];

	return $thumb_url;

}

add_action( 'wp_ajax_nopriv_bjzm_next_posts', 'bjzm_next_posts' );
add_action( 'wp_ajax_bjzm_next_posts', 'bjzm_next_posts' );
function bjzm_next_posts() {

	$query_vars = json_decode( stripslashes( $_POST['query_vars'] ), true );

	$query_vars['paged'] = $_POST['page'];

	$posts = new WP_Query( $query_vars );
	$GLOBALS['wp_query'] = $posts;

	if( ! $posts->have_posts() ) { 
		echo json_encode(false);
	}
	else {
		while ( $posts->have_posts() ) { 
			$posts->the_post();
			get_template_part( 'views/content-card' );
		}
	}

	die();
}



