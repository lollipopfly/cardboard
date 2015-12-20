<? get_header();?>
<!-- begin row  -->
<div class="row">
	<aside class="aside col-md-6 col-sm-8 col-xs-8">
		<? require(get_template_directory() . '/inсlude/cat-list.php');?>
	</aside>

	<!-- begin content  -->
	<div class="content col-md-18 col-sm-16 col-xs-16">
		<?
		$category = get_the_category();
		if($category) {
			$category_id = $category[0]->term_id;
		} else {
			$category_id = 99999;
		}
		$wp_query= null;
		$wp_query = new WP_Query();
		$wp_query->query('showposts=22&cat='.$category_id);
		if($wp_query):?>
			<ul class="recent recent--cat row">
				<? while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
					<li class="recent__item">
						<? $cost = get_post_meta(get_the_ID(), 'cost');
						   $old_cost = get_post_meta(get_the_ID(), 'old-cost');
						   $info = get_post_meta(get_the_ID(), 'preview');
						?>
						<?	if ( has_post_thumbnail() ) {
						    $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'thumbnail' );?>
						     <a href="<? the_permalink()?>"><img width="100%" src="<?=$image_src[0]?>"></a>
						<?}?>
						<a class="recent__name" href="<?php the_permalink(); ?>"><? the_title(); ?></a>
						<? if(isset($info[0])):?>
							<span class="recent__info"><?=$info[0];?></span>
						<?endif;?>
						<? if(isset($cost[0])):?>
							<p class="recent__price"><?=$cost[0];?> руб.</p>
						<?endif;?>
						<? if(isset($old_cost[0])):?>
							<p class="recent__discount"><?=$old_cost[0];?> руб.</p>
						<?endif;?>
						<a href="#" class="recent__order btn btn-order">Заказать</a>
					</li>
				<? endwhile;?>
			</ul>
		<? endif; ?>

		<? wp_reset_postdata(); ?>
	</div>
		<!-- end content -->
</div>
<!-- end row -->
<? get_footer();?>