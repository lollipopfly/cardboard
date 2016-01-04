<? get_header();?>
<!-- begin row  -->
<div class="row">
	<aside class="aside col-md-6 col-sm-8 col-xs-8">
		<? require(get_template_directory() . '/include/cat-list.php');?>
	</aside>

	<!-- begin content  -->
	<div class="content col-md-18 col-sm-16 col-xs-16">
		<?	if ( have_posts() ) : while ( have_posts() ) : the_post();?>
			<?php the_content(); ?>
			<?php endwhile; endif; wp_reset_query(); ?>
	</div>
		<!-- end content -->
</div>
<!-- end row -->
<? get_footer();?>