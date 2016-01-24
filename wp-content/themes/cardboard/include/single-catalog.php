<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?
		$post_id= get_the_id();

		// Dynamic featured image plugin for multiple images
		if( class_exists('Dynamic_Featured_Image') ) {
			global $dynamic_featured_image;
			$gallery = $dynamic_featured_image->get_featured_images( $post_id );
		}
		$alt = get_the_title(). ' - Очки виртуальной реальности заказать в Пензе!';
		$image_title = get_the_title();
		$detail_image = get_field('detail_image');
		$mini_desc = get_field('desc');
		$cost = get_field('cost');
		$old_cost = get_field('old_cost');
		$size = get_field('size');
		$color = get_field('color');
		$mechanism = get_field('mechanism');
		$lense = get_field('lense');
		$ventilation = get_field('ventilation');
	?>

	<div class="product">
		<!-- begin product-top  -->
		<div class="product-top row">
			<!-- begin product-left  -->
			<div class="product-left col-md-12 col-sm-12 col-xs-24">
				<ul class="slider-for">
					<?php if ($detail_image): ?>
						<li class="slider-for__item">
							<a class="slider-for__link" href="<?=$detail_image?>">
								<img src="<?=$detail_image?>" alt="<?=$alt?>" title="<?=$image_title?>">
							</a>
						</li>
					<?php endif ?>
					<?php foreach ($gallery as $src): ?>
						<li class="slider-for__item">
							<a class="slider-for__link" href="<?=$src['full']?>">
								<img src="<?=$src['full']?>" alt="<?=$alt?>" title="<?=$image_title?>">
							</a>
						</li>
					<?php endforeach ?>
				</ul>

				<ul class="slider-nav">
					<li class="slider-nav__item">
						<img class="slider-nav__img" src="<?=$detail_image?>" alt="<?=$alt?>">
					</li>
					<? if($gallery):?>
						<?php foreach ($gallery as $src): ?>
							<li class="slider-nav__item">
								<img class="slider-nav__img" src="<?=$src['full']?>" alt="<?=$alt?>" title="<?=$image_title?>">
							</li>
						<?php endforeach ?>
					<? endif;?>
				</ul>
			</div>
			<!-- end product-left -->

			<!-- begin product-right  -->
			<div class="product-right col-md-12 col-sm-12 col-xs-24">
				<div class="product-info">
				<div class="product-email-name product__hidden-name"><? the_title(); ?></div>
					<? if($mini_desc):?>
						<p class="product__mini-desc"><?=$mini_desc;?></p>
					<?endif;?>
					<? if($cost):?>
						<p class="product__cost"><?=$cost;?> руб.</p>
					<?endif;?>
					<? if($old_cost):?>
						<p class="product__old-cost">Цена без скидки: <span><?=$old_cost;?></span></p>
					<?endif;?>
					<a href="" class="btn btn-orange product__order-btn order-trigger">Заказать товар</a>
				</div>
				<div class="product__social">
					<span class="product__social-desc">Поделиться ссылкой:</span>
					<div class="product__social-links">
						<script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
						<script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
						<div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,twitter" data-size="s"></div>
					</div>
				</div>
			</div>
			<!-- end product-right -->
		</div>
		<!-- end product-top -->

		<!-- begin product-bottom  -->
		<div class="product-bottom">
			<!-- begin product-bottom-desc  -->
			<div class="product-bottom-desc">
				<div class="product-main-desc">
					<h3>Описание, параметры, характеристики <?php the_title(); ?></h3>
					<p class="product__main-desc"><? the_content(); ?></p>
				</div>
			</div>
			<!-- end product-bottom-desc -->

			<!-- begin product-props  -->
			<div class="product-props">
				<h3>Характеристики</h3>
				<table class="props-list">
					<?if ($color !== 'false'): ?>
						<tr class="props-list__item">
						<td><span>Цвет:</span></td>
						<td><?=$color?></td>
						</tr>
					<?endif ?>
					<?if ($size): ?>
						<tr class="props-list__item">
						<td><span>Размер:</span></td>
						<td><?=$size?></td>
						</tr>
					<?endif ?>
					<?if ($mechanism !== 'false'): ?>
						<tr class="props-list__item">
						<td><span>Крепежный механизм:</span></td>
						<td><?=$mechanism?></td>
						</tr>
					<?endif ?>
						<?if ($lense !== 'false'): ?>
						<tr class="props-list__item">
						<td><span>Регулировка линз:</span></td>
						<td><?=$lense?></td>
						</tr>
					<?endif ?>
					<?if ($ventilation !== 'false'): ?>
						<tr class="props-list__item">
						<td><span>Вентиляция:</span></td>
						<td><?=$ventilation?></td>
						</tr>
					<?endif ?>
				</table>
			</div>
			<!-- end product-props -->
		</div>
		<!-- end product-bottom -->
	</div>
<?php endwhile; endif; ?>