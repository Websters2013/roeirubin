<?php

$logo = get_field('logo', 2);
$logo = '<img src="'.$logo['url'].'" alt="'.$logo['alt'].'" title="'.$logo['title'].'">';

$hero_image_other_page = get_field('background');
if(is_page_template('page-services-single.php')) {

	$term = get_term_by('slug', $_GET['category'], 'portfolio');
	
	$hero_image_other_page = get_field('background', 'portfolio_'.$term->term_id);
}
$hero_image_other_page = '<img src="'.$hero_image_other_page['url'].'" alt="'.$hero_image_other_page['alt'].'" title="'.$hero_image_other_page['title'].'">';
if(is_front_page()) {
	$logo = '<!-- logo --><h1 class="logo">'.$logo.'</h1><!-- /logo -->';
} else {
	$logo = '<!-- logo --><a href="'.get_site_url().'" class="logo">'.$logo.'</a><!-- /logo -->';
}

$socials = get_field('socials_list', 18);
if(!empty($socials)) {
	foreach ( $socials as $row ) {
		if((array_search('0', $row['show']) === false) || empty($row['image'])) {
			continue;
		}
		$socials_list .= '<!-- social__item --><a class="social__item" href="'.$row['url'].'" target="_blank">'.file_get_contents($row['image']).'</a><!-- /social__item -->';
	}
}

$hero_image =  get_field('hero_image', 2);

function is_tree( $pid ){
	global $post;

	// если мы уже на указанной странице выходим
	if ( is_page( $pid ) )
		return true;

	$anc = get_post_ancestors( $post->ID );
	foreach ( $anc as $ancestor ) {
		if( is_page() && $ancestor == $pid ) {
			return true;
		}
	}

	return false;
}

$menu_name = 'menu';
$locations = get_nav_menu_locations();
if( $locations && isset($locations[ $menu_name ]) ){

	$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
	$menu_items = wp_get_nav_menu_items( $menu );
	$menu_list = '<!-- menu --><nav class="menu">';

	foreach ( (array) $menu_items as $key => $menu_item ){

		$perm = get_the_permalink($menu_item->object_id);
		$active = '';
		//var_dump($menu_item);
		if (is_page( $menu_item->object_id) || is_tree($menu_item->object_id)) {
			$active = ' active';
		}

		$menu_list .= '<a class="menu__item'.$active.'" href="'.$perm.'">'.$menu_item->title.'</a>';
	}

	$menu_list .= '</nav><!-- /menu -->';

}
?>
<!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="address=no">

    <title>Title</title>
	<?php wp_head(); ?>

</head>
<body>

<!-- site -->
<div class="site">

    <!-- site__aside -->
    <aside class="site__aside">

        <!-- site__head -->
        <div class="site__head">

            <!-- menu-mobile-btn -->
            <div class="menu-mobile-btn">
                <span></span>
            </div>
            <!-- /menu-mobile-btn -->

            <?php if(is_front_page()) {
                echo '<!-- logo --><h1 class="logo">'.$logo.'</h1><!-- /logo -->';
            }else {
	            echo '<!-- logo --><a class="logo">'.$logo.'</a><!-- /logo -->';
            }
            ?>

            <!-- menu -->
            <nav class="menu">

                <ul>
                    <li class="active"><a href="#">עמוד הבית </a></li>
                    <li><a href="#">אודות </a></li>
                    <li>
                        <a href="#">גלריה </a>
                        <div class="menu__sub-menu">
                            <ul>
                                <li><a href="#">בתים</a></li>
                                <li><a href="#">בריכות</a></li>
                                <li><a href="#">פסיפס</a></li>
                                <li><a href="#">בריקים</a></li>
                                <li><a href="#">ריצוף</a></li>
                                <li><a href="#">התהליך</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="#">אדריכלים ומפקחי בניה</a></li>
                    <li><a href="#">המלצות </a></li>
                    <li><a href="#"> צרו קשר</a></li>
                </ul>

            </nav>
            <!-- /menu -->

        </div>
        <!-- /site__head -->

        <!-- contact-us -->
        <address class="contact-us">

            <dl>
                <dt>רועי רובין</dt>
                <dd> טלפון:  <a href="tel:0545504516">054-5504516</a></dd>
                <dd>דואר אלקטרוני: <a href="mailto:roeirubin.pro@gmail.com">roeirubin.pro@gmail.com</a></dd>
                <dd>אתר: <a href="http://www.roeirubin.co.il" target="_blank">www.roeirubin.co.il</a></dd>
            </dl>

        </address>
        <!-- /contact-us -->

    </aside>
    <!-- /site__aside -->
