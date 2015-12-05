<?php /**
 * Template Name: Machine Page
 */ ?>

<?php get_header(); ?>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="wrapper row-fluid">
  <div class="span12">
  </div>
</div>
     <!-- <div id="showFooter">
      <img src="<?php bloginfo('template_directory'); ?>/img/down_arrow.png" alt="" />
    </div> -->

    <div id="content">
      <div class="parallax-header" data-stellar-ratio=".5" data-stellar-vertical-offset="120">
        <?php
          if ( has_post_thumbnail() ) {
            $thumb = get_the_post_thumbnail();
            echo $thumb;
          } ?>
            <div class="holder" style="display: none;height: 100%;width: 100%;position: absolute;top: 0;left: 0;background:rgba(0, 0, 0, .1)">
              <div class="cont visible" style="display: table-cell;vertical-align: middle;height: 100%;width: 100%;text-align: center;-webkit-transition: 1s;-moz-transition: 1s;-ms-transition: 1s;-o-transition: 1s;transition: 1s;">
                <div class="sdf" style="font-size: 21px;color: #fff;text-transform: uppercase;font-weight: 100;-webkit-transition: 1s;-moz-transition: 1s;-ms-transition: 1s;-o-transition: 1s;transition: 1s;">
                  <span class="bikenyc" style="display:none">Bike New York</span>
                </div>
              </div>
            </div>
            <div id="showcontent" class="active"></div>
        </div>
      <div class="wrapper row-fluid parralax" style="z-index:10;">
        <div class="span12">
          <div class="content bikecontent">
            <h1><?php the_title(); ?></h1>
            <div class="headline"><?php the_content(); ?></div>
          </div>

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

            <div class="find_location">
              <div class="content">
                <div class="row-fluid">
                  <div class="span8"><?php echo get_field("find_location_content") ?></div>
                </div>
              </div>
            </div>

            <div class="request_machine">
              <?php echo get_field("request_content"); ?>
              <img src="/wp-content/themes/Bikestock/img/right_machine_corner.jpg" alt="" style="width: 100%; max-width: 28px; position:absolute; bottom:0px; right:0px;">
            </div>

        </div>
      </div>
    </div>

  </div>

  <?php endwhile; endif; ?>

<style>
  #showcontent { background: url("/wp-content/themes/Bikestock/img/showcontent.png") no-repeat; width: 56px; height: 56px; position: fixed; cursor: pointer; left: 50%; margin-left: -20px; bottom:10px; z-index: 100; opacity: 0; transition: all 0.5s ease 0s; position: fixed; }
  #showcontent.active { opacity: 1; transition: all 0.5s ease 0s; }
  .bikenyc { color: #fff;font-family: 'DecimaNova-Bold';border: 8px solid #fff;z-index: 9;text-align: center;font-size: 46px;padding: 18px 18px 13px; }
  .find_location { width: 100%; height: auto; position: relative; background: url('/staging/wp-content/themes/Bikestock/img/machine_find_location.jpg') repeat-y top center }
  .find_location .content { padding: 4% 5%; }
  .find_location .content h1 { padding-bottom: 8%; text-align: left !important; }
  .find_location .content p { font-size: 16px; font-family: 'SanchezLight'; line-height: 30px; padding:0px; text-align: left; margin-bottom: 10%; }
  .find_location .content a { font-size: 17px; font-family: 'DecimaNova-Bold'; padding: 10px 15px; background: #fef000; color: #57585b; text-decoration: none; }
  .request_machine { width: 100%; text-align: center; background: #00b552; padding-top: 4%; padding-bottom: 4%; margin-bottom: 30px; position: relative; }
  .request_machine h2 { font-family: 'DecimaNova-Bold'; font-size: 25px; color: #fff; text-transform: uppercase; }
  .request_machine p { font-size: 19px; color: #fff; }
  .request_machine a { font-size: 19px; color: #fff; text-decoration: none; }
  .request_machine a:hover { text-decoration: underline; }
</style>

<?php get_footer(); ?>


