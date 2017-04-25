<?php 
$content_blocks = get_field('content_blocks');
 lt($content_blocks);
?>

<article id="post-<?php the_ID(); ?>" class="blog-post card count-<?php echo $key ?> post-<?php the_ID(); ?> content-page">
	
	<div class="l-content-page-inner">

		<div class="entry-content">
			
			<div class="bjzm-row">
				
				<?php foreach($content_blocks as $key => $content_block) :  ?>

				<div class="content-block count-<?php echo $key ?> <?php echo $content_block['classes'] ?>  content-block--<?php echo $content_block['block_width'] ?>">
					<div class="content-block__copy">
						<div class="content-block__copy-inner">
							<?php echo $content_block['content'] ?>
						</div>
					</div>
					<div class="content-block__image">
						<?php  get_content_block_image($content_block) ?>
					</div>
				</div>
			
				<?php endforeach; ?>

			</div>
		</div>
	</div>

</article>

