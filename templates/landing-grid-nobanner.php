<?php /*
* Template Name: Landing - Grid - No Banner
*/
get_header(); ?>

<main id="main" class="site-main" role="main">

  <div class="container">
    <div class="row">

      <?php while ( have_rows('content_blocks') ) : the_row(); ?>

        <div class="four columns">
          <?php if (get_sub_field('content_block_title')): ?>
            <h3><?php the_sub_field('content_block_title'); ?></h3>
          <?php endif ?>
          <?php if (get_sub_field('content_block_description')): ?>
            <p><?php the_sub_field('content_block_description'); ?></p>
          <?php endif ?>
        </div>

      <?php endwhile; ?>

    </div>
  </div>

</main><!-- #main -->

<?php get_footer(); ?>
