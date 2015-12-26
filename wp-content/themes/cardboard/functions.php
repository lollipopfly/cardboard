<?
	require(TEMPLATEPATH . '/site-debug/ref.php');
	// Add menu support
	if (function_exists('add_theme_support')) {
		add_theme_support('menus');
	}

	// remove spacein title
	add_filter('wp_title', create_function('$a, $b','return str_replace(" $b ","",$a);'), 10, 2);

	add_theme_support('post-thumbnails');

;
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


/*------------------------------------*\
    Pagination
\*------------------------------------*/
	function the_breadcrumb() {
		if (!is_front_page()) {
			echo '<div class="breadcrumbs">
				<a class="breadcrumbs__link" href="';
			echo get_option('home');
			echo '">Главная';
			echo "</a> <i class='fa fa-chevron-right'></i> ";
			if (is_category() || is_single()) {
				the_category(' ');
				if (is_single()) {
					echo " <i class='fa fa-chevron-right'></i> ";
					echo "<span class='breadcrumbs__page'>";
					the_title();
					echo "</span>";
				}
			} elseif (is_page()) {
				echo "<span class='breadcrumbs__page'>";
				echo the_title();
				echo "</span>";
			}
			echo "</div>";
		}
	}
