<?php /**
 * Template for Categories Pages
 */ ?>
 
<?php get_header(); ?>

<div class="wrapper row-fluid">
  <div class="span12">
  </div>
</div>
     <!-- <div id="showFooter">
      <img src="<?php bloginfo('template_directory'); ?>/img/down_arrow.png" alt="" />
    </div> -->


    <div id="content" class="blogcat">
<!--     <div class="parallax-header" data-stellar-ratio=".5" data-stellar-vertical-offset="120"> -->

    <!-- SLIDESHOW -->
    <div class="flexslider blogslide" id="slideShow">
      <ul class="slides">
    <?php
      $slides = get_posts('category_name=featured-post');
      foreach($slides as $slide)
      { ?>
          <li class="slide">
            <div class="boxslide">
            <h1><?php echo $slide->post_title; ?></h1>
            <div class="headline"><?php echo $slide->post_excerpt; ?></div>
            <div class="readmore"><a href="<?php echo get_permalink($slide->ID); ?>">Read More &gt;</a></div>  
            </div>
          </li>
    <?php  }  ?>
      </ul>
        <div class="pager-nav"></div>
    </div>    
    <!-- /SLIDESHOW -->

    <div style="clear:both"></div>       

    <!-- </div>       -->
      <div class="wrapper row-fluid parralax">
        <div class="span12">
          <div class="category_list">
            <ul>
              
              <?php if ($cat == 3) { ?>
                <li class="active"><div class="triangle"></div><a href="<?php echo get_category_link(3); ?>">All Post</a></li>            
              <?php } else { ?>
                <li><a href="<?php echo get_category_link(3); ?>">All Post</a></li>            
              <?php } ?>

            <?php 
            $subcategories = get_categories('child_of=3&hide_empty=0');
            foreach ($subcategories as $ct) { ?>

              <?php if ($cat == $ct->cat_ID) { ?>
                <li class="active"><div class="triangle"></div><a href="<?php echo get_category_link($ct->cat_ID); ?>"><?php echo $ct->name; ?></a></li>                          
              <?php } else { ?>
                <li><a href="<?php echo get_category_link($ct->cat_ID); ?>"><?php echo $ct->name; ?></a></li> 
              <?php } ?>
                           
            <?php } ?>

            </ul>
          </div>

          <div style="clear:both"></div>
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

          <div id="content-article">
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <article>
            <div class="topline"></div>
            <h1><?php the_title(); ?></h1>
            <div class="headline"><?php the_excerpt(); ?></div>
            <div class="readmore"><a href="<?php the_permalink(); ?>">Read More &gt;</a></div>
          </article>
          <?php endwhile; endif; ?>
          </div>

        <div class="yellow-btn loadmore"><a href="javascript:;">LOAD MORE</a></div>
        </div>
      </div>
    </div>

  </div>

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/ss/blog-style.css">
  
<?php get_footer(); ?>