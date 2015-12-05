<?php /**
 * Template Name: Internal Page
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
    <div id="content" class="blogpage-container">
      <div class="parallax-header" data-stellar-ratio=".5" data-stellar-vertical-offset="120">
        <?php
          $headtitle = get_field( "head_title" ); 
          $subhead = get_field( "subhead" );

          if (isset($headtitle) && isset($subhead)) {
            echo '<div class="headbox"><h1>'.$headtitle.'</h1><h2>'.$subhead.'</h2></div>';
          }

          if ( has_post_thumbnail() ) {
            $thumb = get_the_post_thumbnail();
            echo $thumb;
          }

          ?>
        </div>
      <div class="wrapper row-fluid parralax">
        <div class="span8 offset1">
          
          <div class="content blogpage">
            <?php the_content(); ?>
          </div>

          <div class="postby_mobile">
            <div class="metainfo" style="margin: 0 auto;">
              <div class="author">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 90 ); ?>
                <span>
                <?php $fname = get_the_author_meta('first_name', $post->post_author);
                      $lname = get_the_author_meta('last_name', $post->post_author); 
                      if (!(empty($fname)) && !(empty($fname))) { echo ucwords($fname).'<br>'.ucwords($lname); }
                      else { ucwords(the_author()); }
                ?>       
                </span>
                <div style="clear:both"></div>
              </div>
              <div class="time_cat">
                  Date: <?php the_time('m.d.y'); ?>
                 <br>
                 <?php the_category(', '); ?>
              </div>
            </div>
        <!-- Go to the Addthis.com Pro Dashboard to update any options -->
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
        <!-- AddThis Button END -->
            <div style="clear:both"></div>
          </div>


        </div>
      
      <div class="span3 postby">
        <div class="metainfo">
          <div class="author">
             <?php echo get_avatar( get_the_author_meta( 'ID' ), 90 ); ?>
            <span>
                <?php $fname = get_the_author_meta('first_name', $post->post_author);
                      $lname = get_the_author_meta('last_name', $post->post_author); 
                      if (!(empty($fname)) && !(empty($fname))) { echo ucwords($fname).'<br>'.ucwords($lname); }
                      else { ucwords(the_author()); }
                ?>                        
            </span>
            <div style="clear:both"></div>
          </div>
          <div class="time_cat">
              Date: <?php the_time('m.d.y'); ?>
             <br>
             <?php the_category(', '); ?>
          </div>
        </div>
        <!-- Go to the Addthis.com Pro Dashboard to update any options -->
        <div class="sharecontainer">
        <div class="sharethis">
        <h3>Share</h3>
        <div class="addthis_toolbox">
            <a class="addthis_button_facebook"><img src="/wp-content/themes/Bikestock/img/share_icons/facebook.png" width="30" height="30" border="0" alt="Share to Facebook" /></a>
            <br>
            <a class="addthis_button_twitter"><img src="/wp-content/themes/Bikestock/img/share_icons/twitter.png" width="30" height="30" border="0" alt="Share to Twitter" /></a>
            <br>
            <a class="addthis_button_email"><img src="/wp-content/themes/Bikestock/img/share_icons/email.png" width="30" height="30" border="0" alt="Share to Email" /></a>
            <br>
            <a class="addthis_button_linkedin"><img src="/wp-content/themes/Bikestock/img/share_icons/linkedn.png" width="30" height="30" border="0" alt="Share to Linkedin" /></a>
            <br>
            <a class="addthis_button_pinterest"></a>
            <br>
            <a class="addthis_button_google_plusone_share"><img src="/wp-content/themes/Bikestock/img/share_icons/gplus.png" width="30" height="30" border="0" alt="Share to Google Plus" /></a>
        </div>
        </div>
        </div>
        <!-- AddThis Button END -->
      </div>
      
          <div style="clear:both"></div>
          
      <div class="span10 offset1" style="margin-top: 5%;">
          <?php
          $similar_posts = get_field('similar_post');
          
          if (!(empty($similar_posts))) {
          ?>
          
          <div class="similar_post">
            <h1><span>Similar Posts</span></h1>
            <?php foreach ($similar_posts as $sp) { ?>
            
            <div class="spbox">
            <a href="<?php echo get_permalink($sp->ID); ?>"><h3><?php echo $sp->post_title; ?></h3></a>
            <div class="spinfo">
              <ul>
                <li><?php $fname = get_the_author_meta('first_name', $sp->post_author);
                          $lname = get_the_author_meta('last_name', $sp->post_author); 
                      if (!(empty($fname)) && !(empty($fname))) { echo ucwords($fname).' '.ucwords($lname); }
                      else { ucwords(the_author_meta('display_name', $sp->post_author)); }
                    ?>
                </li>
                <li>
                  <?php $date = new DateTime($sp->date); ?>
                  <?php echo "Date: ".$date->format('m.d.y'); ?>
                </li>
                <li><?php $spcat = get_the_category($sp->ID) ?>
                    <?php echo $spcat[0]->cat_name; ?>
                </li>
              </ul>
            </div>
          </div>

          <?php } ?>
          <div style="clear:both;"></div>
          </div>
          <?php } ?>
        <div style="width: 100%; max-width: 1050px;">
          <div class="yellow-btn backto"><a href="/test-blog">Back to Index</a></div>
        </div>
      </div>

      </div>
  </div>

  <?php endwhile; endif; ?>

<style>
  .blogpage h3 { padding: 0 20px; font-size: 30px; font-family: Sanchez; }
  .blogpage p { font-size: 17px; margin-top: 20px; margin-bottom: 15px; }
  .headbox { position: absolute; width: 100%; text-align: center; top:35%; }
  .headbox h1 { color: #fff; font-size: 50pt !important; }
  .headbox h2 { color: #fff; font-size: 30pt !important; margin-top: 4.5%; }
  .blogpage-container .parallax-header { max-height: 440px; }

  /* Info */
  .metainfo { max-width: 180px; min-height: 180px; border-top: 1px solid #bcbdbd; border-bottom: 1px solid #bcbdbd; }
  .metainfo .avatar { border: 3px solid #0094d4; border-radius: 50px; }
  .metainfo .author { padding: 15px; padding-right: 0px; color: #0094d4; text-transform: capitalize; border-bottom: 1px solid #bcbdbd; margin-bottom: 2px; }
  .metainfo .author img { float: left; display: inline; }
  .metainfo .author span {
    display: inline;
    float: left;
    font-size: 16px;
    margin-left: 5px;
    margin-top: 20px;
  }
  .metainfo .time_cat { font-size: 15px; padding: 15px; background: #eeeeee; margin-bottom: 2px; color: #fb763c; }
  .metainfo .time_cat a { color: #fb763c; text-decoration: none; }
  .sharecontainer { margin-top: 20px; text-align: center; max-width: 180px; width: 100%; }
  .sharethis { border-radius: 2px; border: 1px solid #40afdf; width: 100%; max-width: 70px; margin: 0 auto; padding-bottom: 5px; }
  .sharethis h3 { font-size: 14px; color: #ff4f02; text-transform: uppercase; line-height: 20px; }
  .sharethis .addthis_toolbox a { width: 30px; height: 30px; }

  .yellow-btn {
    background: none repeat scroll 0 0 #FFEE00;
    font-family: DecimaNova-Heavy,helvetica;
    margin: 50px auto;
    max-height: 65px;
    max-width: 180px;
    text-align: center;
    text-rendering: optimizelegibility;
}
.yellow-btn a { display: block; line-height: 50px; color: #0094d4; font-size: 18px; text-transform: uppercase; text-decoration: none; }

.similar_post .spbox {
    background: none repeat scroll 0 0 #0094D4;
    color: #FFFFFF;
    float: left;
    height: 220px;
    min-width: 230px;
    max-width: 330px;
    position: relative;
    width: 100%;
    margin-right: 2.8%;
    margin-bottom: 15px;
}

.similar_post a { display: block; color: #fff; text-decoration: none; }

.similar_post .spbox:nth-child(4) { margin-right: 0px; }

.similar_post .spbox h3 { line-height: 24px; font-family: SanchezBold; font-size: 24px; text-align: center; margin-top: 20px; }

.similar_post { margin-bottom: 30px; max-width: 1050px; margin-left: -5px; border-top: 1px solid #0094d4; border-bottom: 1px solid #0094d4; padding: 30px 0; position: relative; }

.similar_post h1 { position: absolute; color: #0094d4; top: -25px; margin-top:0px; width: 100%; text-align: center; }
.similar_post h1 span { background: #fff; }

.spbox .spinfo { position: absolute; bottom:10px; width: 100%; }

.spbox .spinfo ul { text-align: center; margin: 10px auto; }

.spbox .spinfo ul li { display: inline-block; padding-left: 5px; padding-right: 7px; border-right: 1px solid #fff; line-height: 12px; text-transform: capitalize; }

.spbox .spinfo ul li:first-child { padding-left: 0px; }

.spbox .spinfo ul li:last-child { padding-right: 0px; border-right: 0px; }

.postby_mobile { display: none; margin-bottom: 50px; margin-top: 40px; }

/* Social Buttons */
.sharethis .at_PinItButton { background: url(/wp-content/themes/Bikestock/img/share_icons/pinterest.png) no-repeat; width: 30px; height: 30px; display: inline-block; margin-bottom: -5px; margin-top: 5px; }
.sharethis .at_PinItButton:hover { background-position: 0; }
.sharethis .at300b img, .sharethis .at300bo img { margin-top: 5px; }

/* RESPONSIVE */

@media screen and (min-width: 853px) and (max-width: 880px) {
.similar_post .spbox:nth-child(3) { margin-right: 0px !important; }
}

@media screen and (min-width: 766px) and (max-width: 852px) {
.similar_post .spbox { max-width: 295px; }
.similar_post .spbox:nth-child(3) { margin-right: 0px !important; }
}

@media screen and (max-width: 765px) {
  .similar_post .spbox { float: none; max-width: 330px; padding-top: 10px; margin: 0 auto 15px; } 
  .similar_post .spbox:nth-child(4) { margin: 0 auto 15px !important; }
  .similar_post .spbox:nth-child(3) { margin: 0 auto 15px !important; }
}

@media screen and (min-width: 540px) and (max-width: 660px) {
  .headbox h1 { font-size: 40pt !important; }
  .headbox h2 { font-size: 20pt !important; margin-top: 2.5%; }
  .blogpage h3 { font-size: 24px; }
  .blogpage p { font-size: 15px; }
}

@media screen and (max-width: 550px) {
  .blogpage p { font-size: 15px; }
  .blogpage-container .span8 { width: 85%; }
  .headbox { display: none; }
  #content .similar_post h1 { font-size: 26px !important; }
  .postby { display: none !important; }
  .postby_mobile { display: block; }

}

@media screen and (max-width: 405px) {
  .postby { display: none !important; }
  .blogpage h3 { padding: 0px; }
}

</style>

<?php get_footer(); ?>


