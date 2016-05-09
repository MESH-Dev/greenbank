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
			<div class="nine columns">

				<?php if ( have_posts() ) : ?>
					<h1>
						<?php if ( is_day() ) : ?>
							<?php printf( __( 'Daily Archives: <span>%s</span>' ), get_the_date() ); ?>
						<?php elseif ( is_month() ) : ?>
							<?php printf( __( 'Monthly Archives: <span>%s</span>' ), get_the_date('F Y') ); ?>
						<?php elseif ( is_year() ) : ?>
							<?php printf( __( 'Yearly Archives: <span>%s</span>' ), get_the_date('Y') ); ?>
						<?php else : ?>
							<?php _e( 'Blog Archives' ); ?>
						<?php endif; ?>
					</h1>

					<?php while ( have_posts() ) : the_post(); ?>

						<div class="post">
							<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
							<p class="postinfo">By <?php the_author(); ?> | Categories: <?php the_category(', '); ?> | <?php comments_popup_link(); ?></p>
							<?php the_content('Read more &#8658'); ?>
						</div>
						<img src="<?php echo get_template_directory_uri('/'); ?>/img/squiggle-underline.png">

					<?php endwhile; ?>

				<?php endif; ?>

			</div>
			<!-- <div class="three columns">
				<?php get_sidebar(); ?>
			</div> -->
		</div>
		</div>
	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
