<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="single-news">
	<?
		$content = get_the_content();
	?>
	<? the_post_thumbnail();?>
	    <p class="single-news__text"><?=$content; ?></p>

	    <a href="<?php print $_SERVER['HTTP_REFERER'];?>" class="single-news__back">Назад</a>
	</div>
 <?php endwhile; endif; ?>