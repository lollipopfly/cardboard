<? get_header();?>
<!-- begin row  -->
<div class="row">
	<aside class="aside col-md-6 col-sm-8 col-xs-8">
		<? require(get_template_directory() . '/include/cat-list.php');?>
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
						<? $cost = get_field('cost');
						   $old_cost = get_field('old_cost');
						   $info = get_field('preview');
						?>
						<?	if ( has_post_thumbnail() ) {
						    $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'thumbnail' );?>
						     <a class="recent__link" href="<? the_permalink()?>"><img width="100%" src="<?=$image_src[0]?>"></a>
						<?}?>
						<a class="recent__name product-email-name" href="<?php the_permalink(); ?>"><? the_title(); ?></a>
						<? if($info):?>
							<span class="recent__info"><?=$info;?></span>
						<?endif;?>
						<? if($cost):?>
							<p class="recent__price"><?=$cost;?> руб.</p>
						<?endif;?>
						<? if($old_cost):?>
							<p class="recent__discount"><?=$old_cost;?> руб.</p>
						<?endif;?>
						<a href="#" class="recent__order btn btn-order order-trigger">Заказать</a>
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