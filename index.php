<?php get_header(); ?>

<main id="main" class="site-main shaun" role="main">

  <div class="container">

    <div class="row">

      <?php if (get_field('header_background')) :

        $short_banner = get_field('header_background');

        // vars
        $url = $short_banner['url'];
        $title = $short_banner['title'];
        $alt = $short_banner['alt'];
        $caption = $short_banner['caption'];

        // thumbnail
        $thumb = $short_banner['sizes']['short-banner'];

      ?>

        <div class="twelve columns header_bg" style="background-image:url('<?php echo $thumb; ?>')" >
          <!-- <img src="<?php //echo $thumb; ?>" /> -->

          <h1 class="page-title">News</h1>
          <img src="<?php echo get_template_directory_uri('/'); ?>/img/squiggle-underline.png">
        </div>

      <?php endif; ?>

    </div>

	<div class="container">
		<div class="row">
			<div class="page-content">
				
					<?php get_template_part('/partials/blog-menu'); ?>
				
				<div class="the-content"><!-- nine columns -->

					<?php if ( have_posts() ) : ?>
						<!-- <h1>
							<?php if ( is_day() ) : ?>
								<?php printf( __( 'Daily Archives: <span>%s</span>' ), get_the_date() ); ?>
							<?php elseif ( is_month() ) : ?>
								<?php printf( __( 'Monthly Archives: <span>%s</span>' ), get_the_date('F Y') ); ?>
							<?php elseif ( is_year() ) : ?>
								<?php printf( __( 'Yearly Archives: <span>%s</span>' ), get_the_date('Y') ); ?>
							<?php else : ?>
								<?php _e( 'Blog Archives' ); ?>
							<?php endif; ?>
						</h1> -->

						<?php while ( have_posts() ) : the_post(); ?>

							<div class="post">

								<h2 class="content-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
								<div class="tags">By <?php the_author(); ?> | Categories: <?php the_category(', '); ?> | <?php comments_popup_link(); ?></div>
								<?php if ( has_post_thumbnail() ) {
									the_post_thumbnail('large');
									} 
								
								?>
								<?php if(get_field('callout')){ ?>
								<p class="callout"><?php echo get_field('callout', $post->ID); ?></p>
								<?php } ?>
								
								
								<?php the_excerpt(); ?><!-- 'Read more &#8658' -->
							</div>
							 <div class="separator">
	  							<img src="<?php echo get_template_directory_uri('/'); ?>/img/squiggle-underline.png">
  							</div>

						<?php endwhile; ?>

					<?php endif; ?>
				</div> <!-- end nine columns -->
			</div><!-- end page content -->
			<!-- <div class="three columns">
				<?php get_sidebar(); ?>
			</div> -->
		</div> <!-- end row -->
		
	</div> <!-- end container -->

</main><!-- End of Content -->

<?php get_footer(); ?>
