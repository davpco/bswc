<?php /**
 * Template Name: Page Test Blog
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
      $slides = get_posts('category_name=slideshow-blog');
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
              
                <li class="active"><div class="triangle"></div><a href="/test-blog">All Post</a></li>            

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

          <?php query_posts('cat=3'); if (have_posts()) : while (have_posts()) : the_post(); ?>
          <article>
            <div class="topline"></div>
            <h1><?php the_title(); ?></h1>
            <div class="headline"><?php the_excerpt(); ?></div>
            <div class="readmore"><a href="<?php the_permalink(); ?>">Read More &gt;</a></div>
          </article>
          <?php endwhile; endif; ?>

        <div class="yellow-btn loadmore"><a href="javascript:;">LOAD MORE</a></div>
        </div>
      </div>
    </div>

  </div>

<style>

#slideShow.blogslide { height: 340px; background: none repeat scroll 0 0 #1594D0; }

.blogslide .boxslide { margin: 4% auto; width: 80%; }

.blogslide .flex-control-nav {
    bottom: 15px !important;
    position: absolute !important;
    text-align: center;
    top: auto !important;
    width: 100%;
    z-index: 20;
}

#slideShow.blogslide .headline { margin: 5% auto 10px; }

#slideShow.blogslide .readmore a { color: #fff !important; }

#slideShow.blogslide .boxslide h1 { font-size: 65px; color: #fff !important; line-height: 50px; }

.boxslide { position: relative; z-index: 200; color: #fff !important; line-height: 1.5 !important; }

.boxslide .readmore { margin-bottom: 50px; }

.blogcat article { margin: 5% auto; max-width: 970px; line-height: 1.5; }

.blogcat article h1 { color: #0094d4; margin-top: 5px; margin-bottom: 15px; }

.blogcat .topline { width: 105px; border: 1px solid #ff7e45; margin: 0 auto; }

.blogcat .readmore {
    color: #0094d4;
    font-family: DecimaNova-Heavy,helvetica;
    font-size: 18px;
    text-align: center;
    margin-top: 0px;
    text-rendering: optimizelegibility;
}

.blogcat .headline { padding-bottom: 0px; }

.yellow-btn {
    background: none repeat scroll 0 0 #FFEE00;
    font-family: DecimaNova-Heavy,helvetica;
    margin: 0 auto 60px;
    max-height: 65px;
    max-width: 180px;
    text-align: center;
    text-rendering: optimizelegibility;
}
.yellow-btn a { display: block; line-height: 50px; color: #0094d4; font-size: 18px; text-transform: uppercase; text-decoration: none; }

.blogcat .instawrapper img { width: auto !important; border-left: 3px solid #E06944; border-right: 3px solid #E06944; }

#content.blogcat .wrapper.parralax { padding-top: 80px; }

#content.blogcat .instawrapper { height: 161px; }

/* CATEGORY LIST */
.category_list { width: 80%; margin: 0 auto; }

.category_list ul { text-align: center; margin: 0 auto; max-width: 905px; text-align: center; }

.category_list ul li { 
  float: left;
  margin-right: 40px; 
  border: 5px solid #FFEE00; 
  max-width: 138px;
  max-height: 60px;
  width: 100%;
  height: 100%;
  margin-bottom: 20px;
}

.category_list ul li:last-child { margin-right: 0px; }

.category_list ul li:hover { text-transform: uppercase; background: #FFEE00; font-family: DecimaNova-Heavy,helvetica; }

.category_list ul li a { font-size: 16px; text-decoration: none; display: block; line-height: 47px; }

.category_list ul li.active { text-transform: uppercase; background: #FFEE00; font-family: DecimaNova-Heavy,helvetica; position: relative; }

.triangle {
    background: url("/wp-content/themes/Bikestock/img/sprite_blog.png") no-repeat scroll 0 -142px rgba(0, 0, 0, 0);
    display: none;
    height: 35px;
    left: 55px;
    position: absolute;
    top: 37px;
    width: 35px;
}

.category_list ul li.active .triangle { display: block; }

/* SLIDESHOW */

.blogslide .flex-direction-nav li a { background: url("/wp-content/themes/Bikestock/img/sprite_blog.png") no-repeat; }

.flex-direction-nav li a.flex-prev:hover { background-position: 0px 0px; font-size: 0px; height: 40px; width: 70px; padding: 15px 0px; }

.flex-direction-nav li a.flex-next:hover { padding: 15px 0px; font-size: 0px; width: 70px; height: 40px; }

.flex-direction-nav li a.flex-prev { height: 40px; width: 70px; left: 10px; font-size: 0px; }

.flex-direction-nav li a.flex-next { height: 40px; width: 70px; background-position: -182px 0px; font-size: 0px; }

@media screen and (max-width: 800px) {
#slideShow.blogslide .boxslide h1 { font-size: 50px; }
.headline { font-size: 16px; }
/*#slideShow.blogslide { min-height: 370px; height: 100%; }*/
}

@media screen and (max-width: 768px) {
  #slideShow.blogslide .boxslide h1 { font-size: 40px; }
}

@media screen and (max-width: 638px) {
.blogslide .flex-direction-nav li a { display: none; }
}

@media screen and (max-width: 510px) {
.category_list ul li { float: none; }
.category_list ul { margin: 0 auto; text-align: center; width: 138px; }
}

@media screen and (max-width: 480px) {
  #slideShow.blogslide .boxslide h1 { font-size: 36px; }
  .headline { font-size: 15px; }
}

@media screen and (max-width: 425px) {
  #slideShow.blogslide .boxslide h1 { font-size: 26px; }
  .blogcat article h1 { font-size: 26px; }
  .headline { font-size: 13px; }
}

}

</style>
  
<?php get_footer(); ?>