<? get_header();?>
<!-- begin row  -->
<div class="row">
	<aside class="aside col-md-6 col-sm-8 col-xs-8">
		<? require(get_template_directory() . '/include/cat-list.php');?>
	</aside>

	<!-- begin content  -->
	<div class="content col-md-18 col-sm-16 col-xs-16">
		<?php
			$id = 10; // ID заданной рубрики
			$n = 30;   // количество выводимых записей
			$args = array(
				'cat' => $id,
				'post_type' => 'post',
				'posts_per_page' => $n,
				'paged' => get_query_var('paged'),
			);

			$recent = new WP_Query($args);?>
			<? if($recent):?>
				<dl class="faq">
					<?while($recent->have_posts()) : $recent->the_post();?>
						<? $date = get_the_date('n F Y');
							// $content = get_the_content();
						?>
							<dt class="faq__name"><?php the_title(); ?>
								<i class="fa fa-angle-down"></i>
							</dt>
								<dd class="faq__content"><? the_content();?></dd>
					<?php endwhile; ?>
				</dl>
			<? endif;?>
		<?php wp_pagenavi( array( 'query' => $recent ));
		?>
	</div>
		<!-- end content -->
</div>
<!-- end row -->
<? get_footer();?>