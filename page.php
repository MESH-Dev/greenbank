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
        
        $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
        
        <?php if ($children) { ?>

 								 <ul class="subnav">
  									<?php echo $children; ?>
  								</ul>

						<?php } ?>
        
      <?php endif; ?>

    </div>

  <?php get_template_part('/partials/grid'); ?>
  <div class="container">
  	<div class="row landing-callouts">
  		<div class="twelve columns">
	  		<div class="separator">
	  			<img src="<?php echo get_template_directory_uri('/'); ?>/img/squiggle-underline.png">
	  		</div>
  		</div>

  		<div class="wrap">

	  		<?php while (have_rows('landing_callouts')) : the_row(); 
	  			$callout_text = get_sub_field('callout_text');
	  		?>
	  		<div class="six columns callout-block">
	  			<p><?php echo $callout_text;?></p>
	  		</div>
	  		<?php endwhile; ?>


	  		<a class="cta-link" href="<?php get_field('landing_callout_CTA_link') ?>">
	  		  <span>
	  		    <?php echo get_field('landing_callout_CTA_link_text') ?>
  		    </span>
  			</a>
  		</div>
  		<div class="twelve columns">
	  		<div class="separator">
	  			<img src="<?php echo get_template_directory_uri('/'); ?>/img/squiggle-underline.png">
	  		</div>
  		</div>

  	</div>
  </div>
  </div>

</main><!-- #main -->

<?php get_footer(); ?>
