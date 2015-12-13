<?php
/*
Template Name: Сatalog
*/
?>

<? get_header();?>
	<?
	$wp_query= null;
	$wp_query = new WP_Query();
	$wp_query->query('showposts=15' . '&paged='.$paged);
	if($wp_query):?>
		<ul class="recent row">
			<? while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
				<li class="recent__item col-md-6 col-sm-12 col-xs-12">
					<? $cost = get_post_meta(get_the_ID(), 'cost');
					   $old_cost = get_post_meta(get_the_ID(), 'old-cost');
					   $info = get_post_meta(get_the_ID(), 'preview');
					?>
					<!-- Выводим адаптивную миниатюру иначе будет с фиксированными размерами -->
					<?	if ( has_post_thumbnail() ) {
					    $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'thumbnail' );
					     echo '<img width="100%" src="' . $image_src[0] . '">';
					}?>
					<a class="recent__name" href="<?php the_permalink(); ?>"><? the_title(); ?></a>
					<? if($info[0]):?>
						<span class="recent__info"><?=$info[0];?></span>
					<?endif;?>
					<? if($cost[0]):?>
						<p class="recent__price"><?=$cost[0];?></p>
					<?endif;?>
					<? if($old_cost[0]):?>
						<p class="recent__discount"><?=$old_cost[0];?></p>
					<?endif;?>
					<a href="#" class="recent__order btn btn-order">Заказать</a>
				</li>
			<? endwhile;?>
		</ul>
	<? endif; ?>

	<? //wp_reset_postdata(); ?>
<? get_footer();?>