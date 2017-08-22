<?php
/*
Template Name: Home
*/
get_header();
$post_id = 2;
$slider= get_field('hero_slider', $post_id );
$slider_string = '';
if($slider) {
    foreach ($slider as $row) {
        $image = $row['image'];
       $slider_string .= '<div class="hero__slide swiper-slide"><img src="'.$image['url'].'" alt="'.$image['alt'].'" title="'.$image['title'].'"></div>';
    }
}
?>
    <!-- hero -->
    <div class="hero">

        <h2><?= get_field('hero_title', $post_id ); ?></h2>

        <div class="hero__swiper swiper-container">

            <div class="swiper-wrapper">

                <?= $slider_string; ?>

            </div>

        </div>

    </div>
    <!-- /hero -->


        
<?php get_footer(); ?>