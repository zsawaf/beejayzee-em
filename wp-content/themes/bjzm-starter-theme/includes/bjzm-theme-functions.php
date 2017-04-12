<?php

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