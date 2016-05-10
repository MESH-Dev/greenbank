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
          <div class="row fb">

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
            
            $has_hover = get_sub_field('has_hover');
            $hover_text = get_sub_field('hover_text');
            $hover_lt = get_sub_field('hover_link_text');
            $hover_url = get_sub_field('hover_link');

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
              
              <div class="three columns four-column block op1" style="background-image:url('<?php echo $fc_background_url; ?>')">
                <div class="callout <?php echo $number; ?>">
                  <span>
                    <?php echo $grid_callout ?>
                  </span>
                </div>
                <!-- hover block -->
                <?php 
                
                 
                  
                  if($has_hover == 1 && $hover_text !=''){ 
                  ?>
                  <a href="<?php echo $hover_url; ?>"><?php echo $hover_lt; ?>
                    <div class="fb-hover">
                      <div class="wrap">
                        <p class="fb-hover-text"><?php echo $hover_text; ?></p>
                        <img src="<?php echo get_template_directory_uri('/'); ?>/img/cta-arrow.png">
                      </div>
                    </div>
                  </a>
                  <?php } ?>
              </div>
              
            <?php }elseif($four_column_type == "option-two") {?>

              <div class="three columns four-column block op2  <?php echo $special_background; ?> ">
                <div class="callout <?php echo $number; ?>">
                  <span>
                    <?php echo $grid_callout ?>
                  </span>
                </div>
                  <div class="content">
                    <h3><?php echo $copy_title; ?></h3>
                    <p><?php echo $copy_paragraph; ?></p>
                  </div>
                  <?php
                    if($has_hover != 0 && $hover_text !=''){ 
                  ?>
                  <a href="<?php echo $hover_url; ?>"><?php echo $hover_lt; ?>
                    <div class="fb-hover">
                      <div class="wrap">
                        <p class="fb-hover-text"><?php echo $hover_text; ?></p>
                        <img src="<?php echo get_template_directory_uri('/'); ?>/img/cta-arrow.png">
                      </div>
                    </div>
                  </a>
                  <?php } ?>
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
          <div class="row obt">

            
            <div class="six columns two-column obt-l block <?php echo $one_by_two_block_type; ?>" style="background-image:url('<?php echo $one_by_two_l_bg_url; ?>')">

              <?php if ($one_by_two_block_type == "image-callout"){ 
                 $one_by_two_callout_paragraph = get_sub_field('one_by_two_l_callout_paragraph');
                ?>

              <div class="one-by-two-callout">
                <h2><?php echo $one_by_two_callout_paragraph ?></h2>
              </div>

              <?php } ?>

             
                <a class="cta-link" href="<?php echo $one_by_two_cta_link_url; ?>">
                  <?php echo $one_by_two_cta_link_text; ?>
                </a>
              
            </div>

            <div class="six columns two-column block obt-r">

              <?php while (have_rows('one_by_two_rt')) : the_row(); 
                $one_by_two_rt_bg = get_sub_field('one_by_two_r_bg');
                $obt_r_cat_text = get_sub_field('one_by_two_r_category');
                $obt_r_title = get_sub_field('one_by_two_r_title');
                $obt_r_ct_text = get_sub_field('one_by_two_r_callout_text');
                $obt_r_ct_link = get_sub_field('one_by_two_r_callout_link');
                $obt_r_subtitle = get_sub_field('one_by_two_right_subtitle');
              ?>

                <div class="obt-r-cont <?php echo $one_by_two_rt_bg ?>">
                  <div class="cat">
                    <h3><?php echo $obt_r_cat_text ?></h3>
                    <img src="<?php echo get_template_directory_uri('/'); ?>/img/squiggle-divider-purple.png">
                  </div>
                  <!-- <a href="$obt_r_ct_link"> -->
                    <div class="obt-r-cta">
                      <h3 class="title"><?php echo $obt_r_title ?></h3>
                      <?php if ($obt_r_subtitle != "") {?>
                      <h4 class="subtitle"><?php echo $obt_r_subtitle; ?></h4>
                      <?php } ?>
                      <?php if ($obt_r_ct_text != "") { ?>
                      <p><?php echo $obt_r_ct_text; ?></p>
                      <?php } ?>
                    </div>
                  <!-- </a> -->
                </div>
             

            <?php endwhile; ?>
            </div> <!-- end two-column obt-r -->
          </div><!--end row-->

          <?php }elseif($section_type == "seventy-thirty"){

              $quote_bg = get_sub_field('quote_section_l_bg');
              $quote_bg_url = $quote_bg['sizes']['medium'];
              $quote = get_sub_field('quote_section_r_quote');
              $quote_attr = get_sub_field('quote_section_r_quote_attribution');

            ?>
            <div class="row quoter">
              <div class="three columns quote-pic q-block" style="background-image:url('<?php echo $quote_bg_url ?>')">&nbsp;
              </div>
              <div class="nine columns quote q-block">
                <div class="wrap">
                  <div class="content">
                    <p class="quote-symb tp">&ldquo;</p>
                    <div class="quote-text">
                      <p class="quote-t"><?php echo $quote; ?></p>
                      <p class="quote-symb bt">&rdquo;</p>
                      <p class="attrib"><?php echo $quote_attr; ?></p>
                    </div>
                  </div><!--content-->
                </div>
              </div>
            </div><!-- end row -->

            <?php } ?>

    

        <?php endwhile; endif;?>

    </div><!--end grid-->