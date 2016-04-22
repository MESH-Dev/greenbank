<?php /*
* Template Name: Text
*/
get_header(); ?>



<main id="main" class="site-main" role="main">

  <div class="container">

    <div class="row">

      <?php if (get_field('short_banner')) :

        $short_banner = get_field('short_banner');

        // vars
        $url = $short_banner['url'];
        $title = $short_banner['title'];
        $alt = $short_banner['alt'];
        $caption = $short_banner['caption'];

        // thumbnail
        $thumb = $short_banner['sizes']['short-banner'];

      ?>

        <div class="twelve columns">
          <img src="<?php echo $thumb; ?>" />
        </div>

      <?php endif; ?>

    </div>

    <div class="row">
      
      <div class="nine columns">

        <?php while ( have_posts() ) : the_post(); ?>

          <?php the_content(); ?>

          <?php
            // If comments are open or we have at least one comment, load up the comment template
            if ( comments_open() || get_comments_number() ) :
              comments_template();
            endif;
          ?>

        <?php endwhile; // end of the loop. ?>

      </div>
      <div class="three columns">
        <?php get_sidebar(); ?>
      </div>

    </div>
  </div>

</main><!-- #main -->

<?php get_footer(); ?>
