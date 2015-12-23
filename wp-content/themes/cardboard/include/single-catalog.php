<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	catalog
    		<h1><?php the_title(); ?></h1>
    		<?php the_content(); ?>
    	<?php endwhile; endif; ?>