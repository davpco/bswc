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
    <div id="content">
      <div class="parallax-header" data-stellar-ratio=".5" data-stellar-vertical-offset="120">
        <?php
          if ( has_post_thumbnail() ) {
            $thumb = get_the_post_thumbnail();
            echo $thumb;
          }

          ?>
        </div>
      <div class="wrapper row-fluid parralax">
        <div class="span12">
          <div class="content">
            <!--<h1><?php the_title(); ?></h1>-->
            <div class="headline"><?php the_content(); ?></div>
            <div class="column_2"><?php the_field('2_column'); ?></div>
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
      </div>
    </div>

  </div>

  <?php endwhile; endif; ?>
<?php get_footer(); ?>


