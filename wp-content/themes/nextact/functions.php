<?php
add_theme_support('post-thumbnails');
add_post_type_support('page','excerpt');

function register_menus() {
  register_nav_menus(array('header' => __( 'Header' ),'footer' => __( 'Footer' )));
}
add_action( 'init', 'register_menus' );

function my_nav_menu_item_title( $title, $item, $args, $depth ) {
	$pid = $item->object_id;
	$text = get_the_excerpt($pid);
	$title .= '<p class="menu-excerpt">' . $text . '</p>';
	return $title;
}
add_filter( 'nav_menu_item_title', 'my_nav_menu_item_title', 10, 4 );

acf_add_options_page('Next Act Options');
?>