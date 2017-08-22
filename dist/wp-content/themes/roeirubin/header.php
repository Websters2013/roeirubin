<?php

$home_id = 2;
$logo = get_field('logo', $home_id);
$logo = '<img src="'.$logo['url'].'" alt="'.$logo['alt'].'" title="'.$logo['title'].'">';

remove_filter('acf_the_content', 'wpautop');
$contacts = get_field('contacts', $home_id);

$contacts_string = '';
if($contacts) {
    foreach ($contacts as $row) {
        $contacts_string .= '<dt>'.$row['item'].'</dt>';
    }
}

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
	$menu_list = '<ul>';
	$flag = false;

	foreach ( (array) $menu_items as $key => $menu_item ){

		$perm = get_the_permalink($menu_item->object_id);
		$active = '';
		//var_dump($menu_item);
		if (is_page( $menu_item->object_id) || is_tree($menu_item->object_id)) {
			$active = ' active';
		}

		if($menu_item->menu_item_parent === '0' && $flag === true) {
          $menu_list .= '</ul></div></li>';
          $flag = false;
        }
      if($menu_item->menu_item_parent === '0') {
	      $menu_list .= '<li><a class="menu__item'.$active.'" href="'.$perm.'">'.$menu_item->title.'</a>';
      }
      if ($menu_item->menu_item_parent > 0 && $flag === false) {
	      $menu_list .= '<div class="menu__sub-menu"><ul>';
	      $flag = true;
      }
      if($menu_item->menu_item_parent > 0) {
        $menu_list .= '<li><a class="menu__item' . $active . '" href="' . $perm . '">' . $menu_item->title . '</a></li>';
      }

	}
  $menu_list .= '</ul>';

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

                <?= $menu_list; ?>

            </nav>
            <!-- /menu -->

        </div>
        <!-- /site__head -->
        <?php if($contacts_string !== '') {?>
        <!-- contact-us -->
        <address class="contact-us">

            <dl>
                <?= $contacts_string; ?>
            </dl>

        </address>
        <!-- /contact-us -->
        <?php } ?>
    </aside>
    <!-- /site__aside -->
