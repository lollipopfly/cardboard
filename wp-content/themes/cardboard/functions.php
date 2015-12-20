<?
	require(TEMPLATEPATH . '/site-debug/ref.php');
	// Add menu support
	if (function_exists('add_theme_support')) {
		add_theme_support('menus');
	}

	// remove spacein title
	add_filter('wp_title', create_function('$a, $b','return str_replace(" $b ","",$a);'), 10, 2);

	add_theme_support('post-thumbnails');




add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<section id="main">';
}

function my_theme_wrapper_end() {
  echo '</section>';
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}