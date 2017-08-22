<?php
/*
Template Name: Gallery
*/
get_header();
$post_id = get_the_ID();
$gallery = get_field('gallery', $post_id);
$gallery_string = '';
if($gallery) {
	foreach ($gallery as $row) {
		$image = $row['image'];
		$gallery_string .= '<a href="'.$image['url'].'" class="media-gallery__item" data-tile="'.$image['title'].'">
		<img src="'.$image['url'].'" alt="'.$image['alt'].'" title="'.$image['title'].'">
	</a>';
	}
}
?>

<!-- media-gallery -->
<div class="media-gallery">

	<?= $gallery_string; ?>

</div>
<!-- /media-gallery -->

<?php get_footer(); ?>
