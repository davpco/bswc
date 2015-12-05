<?php /**
 * Template Name: About Page
 */ ?>

<?php get_header(); ?>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div id="content">

      <div class="parallax-header">
        <div class="row-fluid">
          <div class="span12">
            <?php
            $header_text = get_field("header_text");
            if ( $header_text ) { ?>
            <div class="about_header">
              <div style="display:block; width:94%; margin-left:3%;">
              <?php echo $header_text; ?>
              </div>
              <div id="showcontent" class="active"></div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>

      <div class="wrapper row-fluid parralax" style="padding-top:50px;">
        <div class="span12">
          <div class="content bikecontent" style="margin-bottom:0;">
            <h1><?php the_title(); ?></h1><br/>
            <!--<div class="headline"><?php the_content(); ?></div>-->
            <div class="column_2"><?php the_field('2_column'); ?></div><br/>
            <div class="share_page">
              <h3>Share</h3>
              <div class="addthis_toolbox">
                  <a class="addthis_button_facebook"><img src="/wp-content/themes/Bikestock/img/share_icons/facebook.png" width="30" height="30" border="0" alt="Share to Facebook" /></a>
                  <a class="addthis_button_twitter"><img src="/wp-content/themes/Bikestock/img/share_icons/twitter.png" width="30" height="30" border="0" alt="Share to Twitter" /></a>
                  <a class="addthis_button_email"><img src="/wp-content/themes/Bikestock/img/share_icons/email.png" width="30" height="30" border="0" alt="Share to Email" /></a>
                  <a class="addthis_button_linkedin"><img src="/wp-content/themes/Bikestock/img/share_icons/linkedn.png" width="30" height="30" border="0" alt="Share to Linkedin" /></a>
                  <a class="addthis_button_pinterest"></a>
                  <a class="addthis_button_google_plusone_share"><img src="/wp-content/themes/Bikestock/img/share_icons/gplus.png" width="30" height="30" border="0" alt="Share to Google Plus" /></a>
              </div>
            </div>
            <div class="row-fluid">

              <?php if (get_field('left_header') != '') { ?>

              <div class="span6 flaghead">
                <h2><?php the_field('left_header'); ?></h2>
                <div class="map">
                  <?php the_field('left_content'); ?>
                </div>
              </div>

              <div class="span6 settinghead">
                <h2><?php the_field('right_header'); ?></h2>
                <div class="inside kit">
                  <?php the_field('right_content'); ?>
                </div>
              </div>

              <div class="divider"></div>

            </div>

            <div class="row-fluid">
              <div class="span8 offset2 machine-top">
                <p style="text-align:center">Request to have a Bikestock <span class="machine">machine</span><span class="toolkit">toolkit</span> by your business or on your property.
Contact us at <a href="mailto:request@bikestocknyc.com">request@bikestocknyc.com</a></p>
              </div>
            </div>

            <?php } ?>
          </div>
        </div>

        <div class="about_block blueback">
          <div class="content">
            <div class="row-fluid blueback">
              <div class="span6">
                <?php echo get_field("block_content_1") ?>
              </div>
              <div class="span6">
                <img src="<?php echo get_field("block_image_1") ?>" style="width: 100%; max-width:367px;">
              </div>
            </div>
          </div>
        </div>

        <div class="about_block">
          <div class="content">
            <div class="row-fluid">
              <div class="span6 hidden-phone">
                <img src="<?php echo get_field("block_image_2") ?>" style="width: 100%; max-width:367px;">
              </div>
              <div class="span6">
                <?php echo get_field("block_content_2") ?>
              </div>
              <div class="span6 visible-phone">
                <img src="<?php echo get_field("block_image_2") ?>" style="width: 100%; max-width:367px;">
              </div>
            </div>
          </div>
        </div>

        <div class="about_block blueback">
          <div class="content">
            <div class="row-fluid">
              <div class="span6">
                <?php echo get_field("block_content_3") ?>
              </div>
              <div class="span6">
                <img src="<?php echo get_field("block_image_3") ?>" style="width: 100%; max-width:367px;">
              </div>
            </div>
          </div>
        </div>

        <div class="about_block">
          <div class="content">
            <div class="row-fluid">
              <div class="span6 hidden-phone">
                <img src="<?php echo get_field("block_image_4") ?>" style="width: 100%; max-width:367px;">
              </div>
              <div class="span6">
                <?php echo get_field("block_content_4") ?>
              </div>
              <div class="span6 visible-phone">
                <img src="<?php echo get_field("block_image_4") ?>" style="width: 100%; max-width:367px;">
              </div>
            </div>
          </div>
        </div>

        <div class="about_block blueback">
          <div class="content">
            <div class="row-fluid">
              <div class="span6">
                <?php echo get_field("block_content_5") ?>
              </div>
              <div class="span6">
                <img src="<?php echo get_field("block_image_5") ?>" style="width: 100%; max-width:367px;">
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>

  <?php endwhile; endif; ?>

<style>
  .about_header p { font-size: 22px; color: #fff !important; font-family: 'SanchezBold'; max-width: 825px; line-height: 46px; padding:0px; margin: 0 auto; }
  .about_header { width: 100%; height: 100%; padding-top: 70px; background: #1594D0; padding-bottom: 70px; position: relative; }
  .about_block p { font-family: 'Sanchez'; font-size: 16px; line-height: 36px; padding-top: 10px; }
  .about_block h1 { margin-top:0px; }
  .about_block .content { margin-bottom: 0px !important; padding-top: 60px; padding-bottom: 60px; }
  .blueback { background: #e5f4fb; }
  .about_block img { display: block; margin: 0 auto; }

  #showcontent { background: url("/staging/wp-content/themes/Bikestock/img/showcontent.png") no-repeat; width: 56px; height: 56px; position: fixed; cursor: pointer; left: 50%; margin-left: -20px; bottom:10px; z-index: 100; opacity: 0; transition: all 0.5s ease 0s; position: absolute; }
  #showcontent.active { opacity: 1; transition: all 0.5s ease 0s; }
  .content .column_2 {
    -webkit-column-gap: 60px;
    -webkit-column-rule: 1px solid #fff;
    column-count: 2;
    column-gap: 60px;
    column-rule: 1px solid #fff;
    margin-top: 10px;
  }
  .content .column_2 p {
    padding: 0;
    font-size: 15px;
    line-height: 26px;
  }
  .parallax-header {
    max-height:585px;
  }
</style>

<?php get_footer(); ?>


