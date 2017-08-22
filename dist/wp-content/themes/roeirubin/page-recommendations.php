<?php
/*
Template Name: Recommendations
*/
get_header();
$post_id = 14;
$quotes = get_field('quotes', $post_id);
$quotes_string = '';
if($quotes) {
    foreach ($quotes as $row) {
        $quotes_string .= '<div>
            <p>'.$row['title'].'</p>
            <p><strong>'.$row['author'].'</strong></p>
        </div>';
    }
}
?>

    <!-- article -->
    <div class="article">

        <h1><?= get_the_title($post_id); ?></h1>

        <?= $quotes_string; ?>

    </div>
    <!-- /article -->
        
<?php get_footer(); ?>