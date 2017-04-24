<?php 
$content_blocks = get_field('content_blocks');
?>

<article id="post-<?php the_ID(); ?>" class="blog-post card count-<?php echo $key ?> post-<?php the_ID(); ?> content-page">
	
	<div class="l-content-page-inner">

		<header class="page-header">
			<h1 class="page-header__title"><?php echo get_the_title(); ?></h1>
		</header>

		<div class="entry-content">

			<?php foreach($content_blocks as $key => $content_block) :  ?>
			<div class="content-block count-<?php echo $key ?> ">
				<div class="content-block__copy">
					<?php echo $content_block['content'] ?>
				</div>
			</div>
			<?php endforeach; ?>

		</div>
	</div>

</article>

