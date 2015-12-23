<? get_header();?>
<!-- begin row  -->
<div class="row">
    <aside class="aside col-md-6 col-sm-8 col-xs-8">
        <? require(get_template_directory() . '/include/cat-list.php');?>
	</aside>
    <!-- begin content  -->
    <div class="content col-md-18 col-sm-16 col-xs-16">
    <?
        $category = get_the_category();
        if ( in_category('11') ) {
            include(TEMPLATEPATH . '/include/single-news.php');
         } elseif ( in_category($category[0]->parent === 3) ) {
            include(TEMPLATEPATH . '/include/single-catalog.php');
        }
    ?>
    </div>
    <!-- end content -->
</div>
<!-- end row -->
<? get_footer();?>