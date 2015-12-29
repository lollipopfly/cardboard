<? get_header();?>
news
	<!-- begin row  -->
	<div class="row">
		<aside class="aside col-md-6 col-sm-8 col-xs-8">
			<? require(get_template_directory() . '/include/cat-list.php');?>
		</aside>

		<!-- begin content  -->
		<div class="content col-md-18 col-sm-16 col-xs-16">
			<?php
				$id = 11; // ID заданной рубрики
				$n = 10;   // количество выводимых записей
				$args = array(
					'cat' => $id,
					'post_type' => 'post',
					'posts_per_page' => $n,
					'paged' => get_query_var('paged'),
				);

				$recent = new WP_Query($args);?>
				<? if($recent):?>
					<ul class="news">
						<?while($recent->have_posts()) : $recent->the_post();?>
							<? $date = get_the_date('n F Y');
								$excerpt = get_the_excerpt();
							?>
							<li class="news__item row">
								<div class="news__left col-md-8 col-sm-8 col-xs-8">
									<a href="<?php the_permalink()?>" class="news__img-container">
										<? the_post_thumbnail();?>
									</a>
								</div>
								<div class="news__right col-md-16 col-xs-16 col-xs-16">
									<a class="news__name" href="<?php the_permalink()?>"><?php the_title(); ?></a>
									<span class="news__date"><?=$date;?></span>
									<?php if (isset($excerpt)): ?>
										<p class="news__excerpt"><?=$excerpt?></p>
									<?php endif ?>
									<a href="<?php the_permalink()?>" class="news__more btn btn-small btn-orange">Подробнее</a>
								</div>
							</li>
						<?php endwhile; ?>
					</ul>
				<? endif;?>
			<? wp_pagenavi( array( 'query' => $recent ));?>
		</div>
		<!-- end content -->
	</div>
	<!-- end row -->
<? get_footer();?>