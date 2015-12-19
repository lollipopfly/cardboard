<? get_header();?>
<!-- begin row  -->
<div class="row">
    <aside class="aside col-md-6 col-sm-8 col-xs-8">
        <? require(get_template_directory() . '/inсlude/cat-list.php');?>
	</aside>
    <!-- begin content  -->
    <div class="content col-md-18 col-sm-16 col-xs-16">
    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    		<h1><?php the_title(); ?></h1>
    		<?php the_content(); ?>
    	<?php endwhile; endif; ?>
    </div>
    <!-- end content -->
</div>
<!-- end row -->
<? get_footer();?>