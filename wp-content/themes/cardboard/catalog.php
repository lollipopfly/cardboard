<?php
/*
Template Name: Сatalog
*/
?>

<? get_header();?>
<!-- begin row  -->
<div class="row">
	<aside class="aside col-md-6 col-sm-8 col-xs-8">
		<? require(get_template_directory() . '/inсlude/cat-list.php');?>
	</aside>

	<!-- begin content  -->
	<div class="content col-md-18 col-sm-16 col-xs-16">
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
							<?$image_src = get_field('category_img', $value);?>
							<?if($image_src):?>
								<a class="sec-list__image-link" href="<?get_category_link( $value->term_id )?>">
									<img class="sec-list__image" src="<?=$image_src?>" alt="">
								</a>
							<?endif;?>
							<a class="sec-list__name" href="<?get_category_link( $value->term_id )?>"><?=$value->name?></a>
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