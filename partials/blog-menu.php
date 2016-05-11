<div class="blog-menu">
	<h2 class="blog-menu-title">Recent Articles</h2>

<?php 

 $args = array(
 			'post_type'=>'post',
			'order' => 'DESC',
			'posts_per_page' => 3,
			'orderby' => 'DATE'
						        

 						      	);
 $the_query  = new WP_Query($args);

 if ( $the_query->have_posts() ) : ?>

	<!-- pagination here -->

	<!-- the loop -->
	<ul>
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<li>
			<h3 class="recent-title">
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h3>
			<span class="date">
				<?php echo get_the_date(); ?>
			</span>
		</li>
	<?php endwhile; endif;?>
	</ul>
	<!-- end of the loop -->

	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

</div>