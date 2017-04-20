<?php 
$prev_post = get_adjacent_post();
$next_post = get_adjacent_post( null, '', false);
?>

<div class="post-nav">
	
	<div class="ll-post-nav-inner">

		<div class="post-nav__adjacent post-nav__adjacent--left">
		<?php if ($prev_post): ?>
			<a href="<?php echo get_permalink( $prev_post->ID ) ?>" title="<?php echo $prev_post->post_title; ?>" class="post-nav__link post-nav__link--left">
				<span>Previous Post</span>
			</a>
		<?php endif; ?>
		</div>
		
		<div class="post-nav__adjacent post-nav__adjacent--right">
		<?php if ($next_post): ?>
			<a href="<?php echo get_permalink( $next_post->ID ) ?>" title="<?php echo $next_post->post_title; ?>" class="post-nav__link post-nav__link--right">
				<span>Next Post</span> 
			</a>
		<?php endif ?>
		</div>
	</div>

</div>