<?php
/*
Template Name: About
*/
get_header();
$post_id = 7;

?>

    <!-- about-us -->
    <div class="about-us">

        <!-- about-us -->
        <div class="about-us__text">

            <div class="content">

                <?= get_post_field('post_content', $post_id); ?>

            </div>

        </div>

    </div>
    <!-- /about-us -->
        
<?php get_footer(); ?>