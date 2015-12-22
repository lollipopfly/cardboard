<? get_header();?>
	<!-- begin container  -->
		<section class="slider">
			<!-- <ul> -->
				<li><img src="http://lorempixel.com/1680/500/" alt=""></li>
				<li><img src="http://lorempixel.com/1680/500/" alt=""></li>
			<!-- </ul> -->
		</section>
		<!-- end container -->

		<div class="row">
				<section class="col-md-24">
					<h2>Хиты продаж</h2>
					<ul class="recent recent--hit row">
						<?
						$args = array(
							'meta_query' => array(
								array(
									'key' => 'hit',
									'value' => 1
								)
							),
							'showposts' => 4,
							'cat' => 3,
						);
						$wp_query = new WP_Query($args);
						?>
						<? while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
						<? if($cost = get_post_meta(get_the_ID(), 'hit')):?>
							<li class="recent__item col-md-6 col-sm-12 col-xs-12">
								<? $cost = get_post_meta(get_the_ID(), 'cost');
								   $old_cost = get_post_meta(get_the_ID(), 'old-cost');
								   $info = get_post_meta(get_the_ID(), 'preview');
								?>
								<?	if ( has_post_thumbnail() ) {
								    $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'thumbnail' );?>
								     <a href="<? the_permalink()?>"><img width="100%" src="<?=$image_src[0]?>"></a>
								<?}?>
								<a class="recent__name" href="<?php the_permalink(); ?>"><? the_title(); ?></a>
								<? if($info[0]):?>
									<span class="recent__info"><?=$info[0];?></span>
								<?endif;?>
								<? if($cost[0]):?>
									<p class="recent__price"><?=$cost[0];?> руб.</p>
								<?endif;?>
								<? if($old_cost[0]):?>
									<p class="recent__discount"><?=$old_cost[0];?> руб.</p>
								<?endif;?>
								<a href="#" class="recent__order btn btn-order">Заказать</a>
							</li>
							<? endif;?>
						<? endwhile;?>
					</ul>
				</section>
			</div>

			<!-- begin row  -->
			<div class="row">
				<!-- begin col-md-24 handmade  -->
				<section class="col-md-24 handmade">
					<h2>Соберите Google Cardboard своими руками</h2>
					<img class="handmade__img" src="http://lorempixel.com/300/150/" alt="">
					<p class="handmade__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt libero, itaque accusantium! Eveniet, hic itaque? Atque nesciunt suscipit reprehenderit expedita molestiae, iusto! Quos qui quisquam possimus, perspiciatis culpa rem velit.</p>
				</section>
				<!-- end col-md-24 handmade -->
			</div>
			<!-- end row -->

			<!-- begin row  -->
			<div class="row">
				<!-- begin impresstion col-md-12  -->
				<section class="impresstion col-md-12 col-md-12">
					<h2>Впечатления</h2>
					Youtube
				</section>
				<!-- end impresstion col-md-12 -->

				<!-- begin main-page-news col-md-12  -->
				<section class="main-page-news col-md-12 col-md-12">
					<div class="main-page-news-header row">
						<div class="col-md-24">
							<h2>Новости</h2>
							<a href="/news/" class="btn main-page-news-header__all">Все новости</a>
						</div>
					</div>
					<?php
						$id = 11; // ID заданной рубрики
						$n = 2;   // количество выводимых записей
						$args = array(
							'cat' => $id,
							'post_type' => 'post',
							'posts_per_page' => $n,
							// 'paged' => get_query_var('paged'),
						);

						$recent = new WP_Query($args);?>
						<? if($recent):?>
							<ul class="news-list">
								<?while($recent->have_posts()) : $recent->the_post();?>
									<? $date = get_the_date('n F Y');?>
									<li class="news__item row">
										<? the_post_thumbnail();?>
										<div class="news-list-info">
											<span class="news-list__date"><?=$date;?></span>
											<a class="news-list__name" href="<?php the_permalink()?>"><?php the_title(); ?></a>
										</div>
									</li>
								<?php endwhile; ?>
							</ul>
						<? endif;?>

<!-- 						<li class="news-list__item clearfix">
							<img class="news-list__img" src="http://lorempixel.com/120/50/" alt="">
							<div class="news-list-info">
								<span class="news-list__date">5 Ноября</span>
								<a href="#" class="news-list__name">Cardboard и YouTube для Android получили обновление</a>
							</div>
						</li> -->
				</section>
				<!-- end main-page-news col-md-12 -->
			</div>
			<!-- end row -->
<? get_footer();?>