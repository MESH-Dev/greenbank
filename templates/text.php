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

          <h1 class="page-title"><?php the_title(); ?></h1>
          <img src="<?php echo get_template_directory_uri('/'); ?>/img/squiggle-underline.png">
        </div>

      <?php endif; ?>

    </div>

    <div class="row">
      
      <div class="page-content">

        <?php while ( have_posts() ) : the_post(); ?>

          <div class="the-content">
            <?php the_content(); ?>
          </div>

          <?php
            // If comments are open or we have at least one comment, load up the comment template
            if ( comments_open() || get_comments_number() ) :
              comments_template();
            endif;
          ?>

        <?php endwhile; // end of the loop. ?>

      </div>
    

    </div>
  </div>

</main><!-- #main -->

<?php get_footer(); ?>
