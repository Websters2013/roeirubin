<?php
/*
Template Name: Supervisors
*/
get_header();
$post_id = 12;
?>
    <!-- supervisors -->
    <div class="supervisors">

        <!-- supervisors -->
        <div class="supervisors__text">

            <div class="content">

                <?= get_post_field('post_content', $post_id); ?>

            </div>

        </div>

        </div>
        <!-- /supervisors -->

    </div>
    <!-- /supervisors -->
        
<?php get_footer(); ?>