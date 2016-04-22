<?php /*
* Template Name: Homepage - Grid
*/
get_header(); ?>

<main id="main" class="site-main homepage-grid" role="main">
 <!--  <div class="">
    <div class=""> -->
      <div class="panel" id="home" style="background-image:url('<?php echo get_template_directory_uri('/'); ?>/img/bg-video-placeholder.png');">
        <div class="content">
          <h1>Life is possible beyond our planet</h1>

          <div class="sub-head">
            <h2>Sugars and other pre-biotic molecules in interstellar space have been found, meaning that life is possible beyond Earth.</h2>
          </div>

          <div class="down-arrow">
            <div class="wrap">
              <img src="<?php echo get_template_directory_uri('/'); ?>/img/down-arrow.png">
            </div> <!-- end down-arrow wrap -->
          </div> <!-- end down-arrow -->
        </div> <!--end content-->
      </div><!--end panel #home -->
    <!-- </div> --> <!--end row-->
  <!-- </div> --> <!--end container-->

    <div class="grid">

      <?php if (have_rows('grid_section')) :
              while (have_rows('grid_section')) : the_row();

              $section_type = get_sub_field('section_type');
              // $section_type_object = get_field_object('section_type');
              // $section_type_output = $section_type_object['choices'][$section_type];
              
              //var_dump($section_type);

        ?>

        <?php if ($section_type == 'banner') { 

          $banner_bg = get_sub_field('banner_title_background');
          $banner_title = get_sub_field('banner_title');
          ?>

          <div class="banner <?php echo $banner_bg ?>">
            <h2><?php echo $banner_title; ?></h2>
            <img src="<?php echo get_template_directory_uri('/'); ?>/img/squiggle-underline.png">

          </div>

        <?php } elseif ($section_type == "four-column"){?>
        <div class="container">
          <div class="row">

            <?php  $fc_cnt = 1; while (have_rows('four_column')) : the_row();

            //$fc_cnt = 1;
            $number = '';
            $four_column_type = get_sub_field('four_column_grid_type');
            $grid_callout = get_sub_field('grid_callout');
            $special_background = get_sub_field('special_background');
            $fc_background = get_sub_field('fc_background_image');
            $fc_background_url = $fc_background['sizes']['large'];
            $copy_title = get_sub_field('copy_title');
            $copy_paragraph = get_sub_field('copy_paragraph');

            if ($fc_cnt == 1){
              $number = "odd";
            }elseif ($fc_cnt == 2){
              $number = "even"; 
            }elseif ($fc_cnt == 3){
              $number = "odd";
            }elseif ($fc_cnt == 4){
              $number = "even";
            }
          ?>

            <?php if($four_column_type == "option-one") { ?>
              <div class="three columns four-column block" style="background-image:url('<?php echo $fc_background_url; ?>')">
                <div class="callout <?php echo $number; ?>">
                  <span>
                    <?php echo $grid_callout ?>
                  </span>
                </div>
              </div>

            <?php }elseif($four_column_type == "option-two") {?>

              <div class="three columns four-column block  <?php echo $special_background; ?> ">
                <div class="callout <?php echo $number; ?>">
                  <span>
                    <?php echo $grid_callout ?>
                  </span>
                </div>
                  <div class="content">
                    <h3><?php echo $copy_title; ?></h3>
                    <p><?php echo $copy_paragraph; ?></p>
                  </div>
              </div>
            <?php } ?>

        <?php $fc_cnt++; endwhile; ?>
      </div></div>
          <?php }elseif($section_type == "one-by-two") {

          $one_by_two_l_bg = get_sub_field('one_by_two_l_bg');
          $one_by_two_l_bg_url = $one_by_two_l_bg['sizes']['large'];
          $one_by_two_block_type = get_sub_field('one_by_two_l_block_type');
          $one_by_two_cta_link_text = get_sub_field('one_by_two_l_cta_l_text');
          $one_by_two_cta_link_url = get_sub_field('one_by_two_l_cta_link');
          $one_by_two_l_bg = get_sub_field('one_by_two_left_bg_color');
          ?>
          <div class="container">
          <div class="row">
            <div class="six columns two-column obt-l block" style="background-image:url('<?php echo $one_by_two_l_bg_url; ?>')">

              <?php if ($one_by_two_block_type == "image-callout"){ 
                 $one_by_two_callout_paragraph = get_sub_field('one_by_two_l_callout_paragraph');
                ?>

              <div class="one-by-two-callout">
                <h2><?php echo $one_by_two_callout_paragraph ?></h2>
              </div>

              <?php } ?>

              <div class="cta-link">
                <?php echo $one_by_two_cta_link_text; ?>
              </div>
            </div>

            <div class="six columns two-column block obt-r">

              <?php while (have_rows('one_by_two_rt')) : the_row(); 
                $one_by_two_rt_bg = get_sub_field('one_by_two_r_bg');
                $obt_r_cat_text = get_sub_field('one_by_two_r_category');
                $obt_r_title = get_sub_field('one_by_two_r_title');
                $obt_r_ct_text = get_sub_field('one_by_two_r_callout_text');
                $obt_r_ct_link = get_sub_field('one_by_two_r_callout_link');
              ?>

              <div class="obt-r-cont">
                <div class="cat">
                  <?php echo $obt_r_cat_text ?>
                  <img src="<?php echo get_template_directory_uri('/'); ?>/img/squiggle-divider-purple.png">
                </div>
                <div class="obt-r-cta">
                  <p><?php echo $obt_r_ct_text; ?></p>
                </div>
              </div>

            <?php endwhile; ?>
            </div>
          </div>
          <?php } ?>


        <?php endwhile; endif;?>

    </div><!--end grid-->



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
