		</div>
		<!-- end container main -->
	</div>
	<!-- end wrap -->

	<footer class="footer">
		<!-- begin container  -->
		<div class="container">
			<!-- begin row footer-top  -->
			<div class="row footer-top">
				<!-- begin col-md-6  -->
				<div class="col-md-19 col-xs-17 footer-menu">
					<?php wp_nav_menu('menu=footer-menu'); ?>
				</div>
				<!-- end col-md-6 -->

				<!-- begin col-md-5  -->
				<div class="footer-contact col-md-5 col-sm-7 col-xs-9 pull-right">
					<a href="tel:+7(937)400-83-19" class="footer__phone">+7 (937) <span>400-83-19</span></a>
					<a href="mailto:fesf@gmaikl.ru" class="footer__email">fesf@gmaikl.ru</a>
				</div>
				<!-- end col-md-5 -->
			</div>
			<!-- end row -->

			<!-- begin row  -->
			<div class="row">
				<div class="col-md-24 copyright">
					<p>Sitename &copy; 2014 — 2015 Все права защищены.</p>
				</div>
			</div>
			<!-- end row footer-top -->
		</div>
		<!-- end container -->
	</footer>

	<!-- SCRIPTS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src='<?php bloginfo('template_url'); ?>/js/build/global.min.js'></script>

	<!-- Calback form -->
	<? require(get_template_directory() . '/include/callback.php');?>
	<!-- Order form -->
	<? require(get_template_directory() . '/include/order.php');?>

	<?php wp_footer(); ?>
</body>
</html>