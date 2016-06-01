<?php
/**
 * Default Events Template
 * This file is the basic wrapper template for all the views if 'Default Events Template'
 * is selected in Events -> Settings -> Template -> Events Template.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

get_header();
?>


<main id="main" class="site-main" role="main">

  <div class="container">

    <div class="row">

      <?php //if (get_field('header_background')) :

        $short_banner = get_field('header_background' ,197);

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

          <h1 class="page-title">Events</h1>
          <img src="<?php echo get_template_directory_uri('/'); ?>/img/squiggle-underline.png">
        </div>

      <?php //endif; ?>

    </div>

    <div class="row">
      
      <div class="page-content">

        <?php //while ( have_posts() ) : the_post(); ?>

          <div class="calendar-content"><!-- the-content -->
            <div id="tribe-events-pg-template">
            	<?php 
              //$taxonomy = 'tribe_events_cat';
            		//var_dump($taxonomy);
        			//$event_query = get_terms($taxonomy);
        			//var_dump($event_query);
        			// foreach ($event_query as $event_cat){
        			// 	echo '<li>'.$event_cat->name.'</li>';
        			//}?>
				<?php tribe_events_before_html(); ?>
				<?php tribe_get_view(); ?>
				<?php tribe_events_after_html(); ?>
			</div> <!-- #tribe-events-pg-template -->
          </div>

          <?php
            // If comments are open or we have at least one comment, load up the comment template
            if ( comments_open() || get_comments_number() ) :
              comments_template();
            endif;
          ?>

        <?php //endwhile; // end of the loop. ?>

      </div>
    

    </div>
  </div>

</main><!-- #main -->

<?php
get_footer();
