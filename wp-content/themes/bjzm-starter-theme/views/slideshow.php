<?php 
if( is_home() ) :
	$page_id = 16;
else :
	$page_id = get_the_ID();
endif;

$sliders = get_field('slider', $page_id);
?>

<section class="bjzm-slider homepage-slider" id="home-slider">
	<div class="l-bjzm-slider-inner">

		<ul class="bjzm-slider__list" id="hero-slider-list">
		<?php foreach($sliders as $key => $slide): ?>
			
			<li class="bjzm-slider__slide slide-count-<?php echo $key ?>">
				<div class="bjzm-slider__overlay">
					<div class="container">
						<div class="container-narrow">
							<div class="bjzm-slider__text-container">
								<?php echo $sliders[0]['content'] ?>
							</div>
						</div>
					</div>
				</div>
				<div class="bjzm-slider__background">
					<picture>
						<source srcset="<?php echo $slide['background_image']['sizes']['hero-image-mobile'] ?>" media="(max-width: 480px)">
						<source srcset="<?php echo$slide['background_image']['sizes']['hero-image-tablet'] ?>"  media="(max-width: 991px)">
						<img class="slider-img" src="<?php echo $slide['background_image']['sizes']['hero-image'] ?>" alt="">
					</picture>
				</div>
			</li>

		<?php endforeach; ?>
		</ul>
	</div>
</section>


