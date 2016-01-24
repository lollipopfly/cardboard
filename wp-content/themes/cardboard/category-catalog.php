<? get_header();?>
<!-- begin row  -->
<div class="row">
	<!-- begin content  -->
	<div class="content col-md-24 col-sm-24 col-xs-24">
	<?
		$main_category = get_category_by_slug('catalog');
		$main_category_desc = $main_category->description;
	?>

	<? if(isset($main_category_desc)):?>
		<p class="category-desc"><?=$main_category_desc;?></p>
	<?endif;?>

	<?
		$args = array(
			'parent' => '3',
			'hide_empty' => false,
		);
		$categories = get_categories($args);
	?>
		<? if($categories):?>
		<ul class="sec-list">
			<? foreach (array_chunk($categories, 2) as $row):?>
				<div class="row">
					<?foreach ($row as $value):?>
						<li class="sec-list__item col-md-12 col-sm-24 col-xs-24">
							<?
								$image_src = get_field('category_img', $value);
								$category_link = get_category_link($value->term_id);
							?>
							<?if($image_src):?>
								<a class="sec-list__image-link" href="<?=get_category_link( $value->term_id )?>">
									<img class="sec-list__image" src="<?=$image_src?>" alt="<?=$value->name?> - Купить очки виртуальной реальности в Пензе." title="<?=$value->name?>">
								</a>
							<?endif;?>
							<a class="sec-list__name" href="<?=esc_url($category_link);?>"><?=$value->name?></a>
						</li>
					<?endforeach;?>
				</div>
				<!-- /.row -->
			<?endforeach;?>
		</ul>
		<?endif;?>
	</div>
	<!-- end content -->
</div>
<!-- end row -->
<? get_footer();?>