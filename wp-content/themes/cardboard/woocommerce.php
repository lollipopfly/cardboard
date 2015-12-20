<? get_header();?>
	<?php if ( have_posts() ) :?>
		<?php woocommerce_content(); ?>
		<?php endif; ?>
<? get_footer();?>