<?php /*
* Template Name: Landing - Grid
*/
get_header(); ?>

<?php if (get_field('big_banner')) :

  $big_banner = get_field('big_banner');

  // vars
  $url = $big_banner['url'];
  $title = $big_banner['title'];
  $alt = $big_banner['alt'];
  $caption = $big_banner['caption'];

  // thumbnail
  $thumb = $big_banner['sizes']['background-fullscreen'];

?>

<div class="big-banner">
  <img src="<?php echo $thumb; ?>" />
</div>

<?php endif; ?>

<main id="main" class="site-main" role="main">

  <div class="container">
    <div class="row">

      <?php if (get_field("callout_headline")): ?>

            <div class="twelve columns">
              <div class="callout">
                <h1><?php the_field("callout_headline"); ?></h1>
              </div>
            </div>
        
      <?php endif ?>

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
