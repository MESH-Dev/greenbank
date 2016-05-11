<?php /*
* Template Name: Homepage - Grid
*/
get_header(); ?>

<main id="main" class="site-main homepage-grid" role="main">
 <!--  <div class="">
    <div class=""> -->
      
      <?php //while (have_rows('greeting_panel')) : the_row();
      //var_dump(get_field('greeting_panel'));

      $background_type = get_sub_field('background_type');
      $video_mp4 = get_sub_field('video_mp4');
      $video_ogg = get_sub_field('video_ogg');
      $video_webm = get_sub_field('video_webm');
      //$image_bg = get_sub_field('image');
      //$image_bg_url = $image_bg['sizes']['background-fullscreen'];
      //$title = get_sub_field('greeting_title');
      //$statement = get_sub_field('greeting_statement');
      $rand = mt_rand(0,2);

      if($rand == 0){
        $number = 0;
      }elseif($rand == 1){
        $number = 1;
      }elseif($rand == 2){
        $number=2;
      }

      //var_dump($rand);
      $rows = get_field('greeting_panel');

      $row_rand = $rows[$number];
      $rand_type=$row_rand['background_type'];
      $rand_mp4 = $row_rand['video_mp4'];
      $rand_ogg = $row_rand['video_ogg'];
      $rand_webm = $row_rand['video_webm'];
      $rand_title = $row_rand['greeting_title'];
      $rand_statement = $row_rand['greeting_statement'];
      $rand_img = $row_rand['image'];
      $rand_img_url = $rand_img['sizes']['background-fullscreen'];

      $rand_poster = $row_rand['video_placeholder'];
      $rand_poster_url = $rand_poster['sizes']['background-fullscreen'];
      

      //var_dump ($title);
      //var_dump($rand);

      ?>
      <div class="panel" id="home" style="background-image:url('<?php if ($rand_type=="image"){ echo $rand_img_url;} ?>')">
        
         <?php if($rand_type == "video"){ ?>
            <video id="bgvideo" poster="<?php echo $rand_poster_url ?>" autoplay loop muted>
              <source src="<?php echo $rand_mp4; ?>" type="video/mp4">
              <source src="<?php echo $rand_ogg; ?>" type="video/ogg">
              <source src="<?php echo $rand_webm; ?>" type="video/webm">
            </video>
          <?php } ?>

        <div class="content">

         

          <img class="green ping" src="<?php echo get_template_directory_uri('/'); ?>/img/ping-hp-green.png">
          <img class="yellow ping" src="<?php echo get_template_directory_uri('/'); ?>/img/ping-hp-yellowgreen.png">
          <img class="purple ping" src="<?php echo get_template_directory_uri('/'); ?>/img/ping-hp-purple.png">

          <h1><?php echo $background_type; ?> <?php echo $rand_title; ?> </h1>

          <div class="sub-head">
            <h2><?php echo $rand_statement; ?></h2>
          </div>

          

          <div class="down-arrow">
            <div class="wrap">
              <img src="<?php echo get_template_directory_uri('/'); ?>/img/down-arrow.png">
            </div> <!-- end down-arrow wrap -->
          </div> <!-- end down-arrow -->
        </div> <!--end content-->
      </div><!--end panel #home -->
      <?php //endwhile;?>
    <!-- </div> --> <!--end row-->
  <!-- </div> --> <!--end container-->

  <?php 
    $hp_banner = get_field('title_banner');
    $hp_intro = get_field('intro_paragraph');
    $hp_intro_cta = get_field('ip_cta_text');
    $hp_intro_cta_link = get_field('ip_cta_link');

  ?>

  <div class="banner purple-gradient">
    <h2><?php echo $hp_banner; ?><h2>

      <img src="<?php echo get_template_directory_uri('/'); ?>/img/squiggle-underline.png">
  </div>

  <div class="container">
    <div class="row intro">
      <div class="four columns" id="telescope">
        <img src="<?php echo get_template_directory_uri('/'); ?>/img/telescope.png">
      </div>
      <div class="eight columns">
        <div class="intro-text">
          <h2 class="text-gradient" bottomColor="#a44fdf" topColor="#87e442">
            <?php echo $hp_intro; ?>
          </h2>
          <a class="cta-link" href="<?php echo $hp_intro_cta_link; ?>">
            <span>
              <?php echo $hp_intro_cta ?>
            </span>
          </a>
        </div>
      </div>
    </div>
  </div>

<?php get_template_part('/partials/grid'); ?>

  <?php if (have_rows("content_blocks")): ?>
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
  <?php endif ?>

</main><!-- #main -->

<?php get_footer(); ?>
