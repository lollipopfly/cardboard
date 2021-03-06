<?
	require(TEMPLATEPATH . '/site-debug/ref.php');
	// Add menu support
	if (function_exists('add_theme_support')) {
		add_theme_support('menus');
	}

	// remove spacein title
	add_filter('wp_title', create_function('$a, $b','return str_replace(" $b ","",$a);'), 10, 2);

	add_theme_support('post-thumbnails');


	// Избавляемся от [...] в цитате поста
	function new_excerpt_more($more) {
		return '...';
	}
	add_filter('excerpt_more', 'new_excerpt_more');

	// Изменение длины обрезаемого текста
	function new_excerpt_length($length) {
		return 40;
	}
	add_filter('excerpt_length', 'new_excerpt_length');


	// For responsive youtube videos
	add_filter( 'embed_oembed_html', 'custom_oembed_filter', 10, 4 ) ;
	function custom_oembed_filter($html, $url, $attr, $post_ID) {
	    $return = '<div class="video-container">'.$html.'</div>';
	    return $return;
	}
