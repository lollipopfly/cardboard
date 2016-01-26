<? get_header();?>
	<!-- begin slider-container  -->
<!-- 		<section class="slider-container">
			<ul class="slider">
				<li><img src="http://lorempixel.com/1680/500/" alt=""></li>
				<li><img src="http://lorempixel.com/1680/500/" alt=""></li>
			</ul>
		</section> -->
		<!-- end slider-container -->

		<div class="row">
				<section class="col-md-24">
					<h3>Хиты продаж</h3>
					<ul class="recent recent--hit row">
						<?
							// Фильтруем по advanced custom fields "hit"
							$args = array(
								// 'post_type' => 'attachment',
								'showposts' => 4,
								'cat' => 3,
								'meta_key' => 'hit',
								'meta_value' => 1,
								'orderby' => 'title',
								'order' => 'desc',
							);
							$wp_query = new WP_Query($args);
						?>

						<? while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
							<li class="recent__item col-md-6 col-sm-12 col-xs-12">
								<? $cost = get_field('cost');
								   $old_cost = get_field('old_cost');
								   $hit = get_field('hit');
								   $category = get_the_category();
								?>

								<?	if ( has_post_thumbnail() ) :?>
									<?// $image = wp_get_attachment_image(get_post_thumbnail_id(), 'full'); ?>
								     <a class="recent__link" href="<? the_permalink()?>">
								     	<? the_post_thumbnail(); ?>
								     </a>
								<? endif;?>
								<a class="recent__name product-email-name" href="<?php the_permalink(); ?>"><? the_title(); ?></a>
								<? if($category[0]->name):?>
									<span class="recent__info"><?=$category[0]->name;?></span>
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
				</section>
			</div>

			<!-- begin row  -->
			<div class="row">
				<!-- begin col-md-24 handmade  -->
				<section class="col-md-24 handmade">
					<div class="row">
						<div class="col-md-24">
							<h3>Инструкция по сборке Google Cardbord</h3>
						</div>
					</div>
					<div class="row">
						<div class="col-md-15">
							<img title="Инструкция по сборке Google Cardboard" alt="Инструкция по сборке Google Cardboard" class="handmade__img" src="<?php bloginfo('template_url');?>/images/instruction.jpg" alt="Инструкция по сборке Google Cardboard">
						</div>
						<div class="col-md-9">
							<p class="handmade__text">На нашем сайте Вы можете найти инструкцию, по сборке <strong>Google Cardboard</strong>. Инструкцию Вы можете найти в разделе <a href="/faq/">Вопрос ответ</a>. Так-же в данном разделе рекомендуем ознакомиться с наиболее популярными вопросами, которые возникают у пользователей данного девайса.
							<br><br>
							<strong>Виртуальная реальность</strong> давно среди нас, просто мы ее не замечали. А <strong>очки виртуальной реальности</strong> помогут в нее погрузиться.</p>
						</div>
					</div>
				</section>
				<!-- end col-md-24 handmade -->
			</div>
			<!-- end row -->

			<!-- begin row share  -->
			<div class="row share">
				<div class="col-md-24">
					<h3 class="share__title">Поделиться с друзьями</h3>
					<div class="share-links">
						<script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
						<script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
						<div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,twitter" data-counter=""></div>
					</div>
				</div>
			</div>
			<!-- end row share -->

			<!-- begin row  -->
			<div class="row">
				<!-- begin impresstion col-md-12  -->
				<section class="impresstion col-md-12 col-md-12">
					<h3>Впечатления</h3>
					<iframe width="95%" height="315" src="https://www.youtube.com/embed/UpsBzvjVrzY" frameborder="0" allowfullscreen></iframe>
				</section>
				<!-- end impresstion col-md-12 -->

				<!-- begin main-page-news col-md-12  -->
				<section class="main-page-news col-md-12 col-md-12">
					<div class="main-page-news-header row">
						<div class="col-md-24">
							<h3 class="main-page-news__title">Новости</h3>
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
						);

						$recent = new WP_Query($args);?>
						<? if($recent):?>
							<ul class="news-list row">
								<?while($recent->have_posts()) : $recent->the_post();?>
									<? $date = get_the_date('n F Y');?>
									<li class="news__item col-md-24 col-sm-24 col-xs-24">
										<? the_post_thumbnail();?>
										<div class="news-list-info">
											<span class="news-list__date"><?=$date;?></span>
											<a class="news-list__name" href="<?php the_permalink()?>"><?php the_title(); ?></a>
										</div>
									</li>
								<?php endwhile; ?>
							</ul>
						<? endif;?>
				</section>
				<!-- end main-page-news col-md-12 -->
			</div>
			<!-- end row -->

<? get_footer();?>