<?php /*
* Template Name: Text
*/
get_header(); ?>



<main id="main" class="site-main" role="main">

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

    <div class="row">
      
      <div class="page-content shaun">
      	
			<?php get_template_part('/partials/blog-menu'); ?>
		
        <?php while ( have_posts() ) : the_post(); ?>

          <div class="the-content">
          	<h1 class="content-title"><?php the_title(); ?></h1>
          	<div class="tags"><?php the_date(); ?> | <?php the_author(); ?></div>
          	<?php if ( has_post_thumbnail() ) {
					the_post_thumbnail('large');
						} 
					
				?>

				<?php 
					$callout = get_field('callout');
					if ($callout){
				?>
				<p class="callout">
					<?php echo get_field('callout'); ?>
				</p>
				<?php } ?>
            <?php the_content(); ?>
          

          <?php
            // If comments are open or we have at least one comment, load up the comment template
            //if ( comments_open() || get_comments_number() ) :
              //comments_template();
            //endif;
          ?>

          <div class="separator">
	  			<img src="<?php echo get_template_directory_uri('/'); ?>/img/squiggle-underline.png">
	  		</div>
	  		
			</div>
			<div class="row related">

          <?php
				//for use in the loop, list 5 post titles related to first tag on current post
				$tags = wp_get_post_tags($post->ID);
				if ($tags) {
					//echo 'Related Posts';
					$first_tag = $tags[0]->term_id;
					$args=array(
					'tag__in' => array($first_tag),
					'post__not_in' => array($post->ID),
					'posts_per_page'=>3,
					'ignore_sticky_posts'=>1
				);
				$my_query = new WP_Query($args);
				if( $my_query->have_posts() ) {
				while ($my_query->have_posts()) : $my_query->the_post(); ?>
				<div class="four columns">
					<h2 class="related-title">
						<!-- <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"> -->
							<?php the_title(); ?>
						<!-- </a> -->
					</h2>
					<div class="tags"><?php echo get_the_date(); ?> | <?php the_author(); ?></div>
					<!-- <p class="excerpt"> -->
						<?php the_excerpt(); ?>
					<!-- </p> -->
					 <!-- <a class="cta-link" href="<?php the_permalink(); ?>">
					 	Explore radio science
	                  <?php //echo $one_by_two_cta_link_text; ?>
	                </a> -->
	            </div>

				<?php
				endwhile;
				}
				wp_reset_query();
				}
			?>
			</div>
        <?php endwhile; // end of the loop. ?>
        
      </div>
    

    </div>
  </div>

</main><!-- #main -->

<?php get_footer(); ?>
