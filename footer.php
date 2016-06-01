</div><!-- #page -->

<footer class="site-footer <?php if( is_page_template('templates/homepage-fullscreen.php') ) { echo "footer-fullscreen"; } ?>">

	<div class="container">
		<div class="row">
			<div class="">
				<!-- <nav class="main-navigation">
					<?php //wp_nav_menu( array('menu_id' => 'footer-menu', 'theme_location' => 'footer-menu') ); ?>
				</nav> -->

				<div class="primary-row">
					<div class="row">
						<div class="wrap">
							<div class="six columns" id="sub-logo">
								<ul class="inline footer-logo">
									<li>
										<img src="<?php echo get_template_directory_uri('/'); ?>/img/NRAO_logo.png">
									</li>
									<li class="affiliation">
										<p>
											<span class="statement">GREEN BANK OBSERVATORY is a part of the</span>
											<span>National RadiO Astronomy Observatory</span>
										</p>
									</li>
								</ul>
							</div>

							<div class="right" id="seasonal-openings">
								<?php if (have_rows('calendar_box','options')):
										while(have_rows('calendar_box', 'options')) : the_row();

									$season = get_sub_field('season');
									$open = get_sub_field('open_days_times')

									?>

								<div class="two columns">
									<p class="times">
										<span class="season"><?php echo $season; ?></span>
										<span class="time"><?php echo $open ?></span>
									</p>
								</div>

								<?php endwhile; endif; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="secondary-row">
					<div class="row">
						<div class="wrap">
							<div class="copyright six columns">
								<p class="copyright">
									&copy; <?php date('Y'); ?>Green bank Observatory, website by <a href="http://meshfresh.com" target="_blank">MESH</a>
								</p>
							</div>
							<div class="social share six columns">
								<ul>
									<li><a href="#"><i class="fa fa-fw fa-2x fa-instagram"></i></a></li>
									<li><a href="#"><i class="fa fa-fw fa-2x fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-fw fa-2x fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-fw fa-2x fa-envelope-o"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
					
			</div><!-- End of Footer -->
		</div>
	</div>

</footer>

<?php wp_footer(); ?>

</body>
</html>
