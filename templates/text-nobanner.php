<?php /*
* Template Name: Text - No Banner
*/
get_header(); ?>

<main id="main" class="site-main" role="main">

  <div class="container">
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

</main><!-- #main -->

<?php get_footer(); ?>
