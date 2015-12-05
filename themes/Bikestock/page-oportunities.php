<?php /**
 * Template Name: Opportunities Page
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
            <!-- <div id="showcontent" class="active"></div> -->
        </div>
      <div class="wrapper row-fluid parralax" style="z-index:10; padding-top: 0px;">
        <div class="span12">

            <div class="yellow-container">

              <div class="triangle">
                <img class="tlogo" src="<?php bloginfo('template_url')?>/img/bikelogo.png">
                <img class="tbg" src="<?php bloginfo('template_url')?>/img/yellow-triangle.png">
              </div>

              <div style="clear:both"></div>

              <div class="wrapper yellow-content span12">
                <hr>
                <?php echo get_field("first_content") ?>
              </div>

              <div style="clear:both;"></div>

              <div class="wrapper yellow-content span12 ybox2">
                <hr>
                <?php echo get_field("second_content") ?>

              </div>

        </div>

        <div class="blue-container">
          <h1>Bikestock Offers</h1>

          <div class="wrapper blue-content span12">
            <div class="span6">
              <?php echo get_field("offers_1") ?>
            </div>
            <div class="span6">
              <?php echo get_field("offers_2") ?>
            </div>
          </div>

          <div class="wrapper blue-content span12">
            <div class="span6">
              <?php echo get_field("offers_3") ?>
            </div>
            <div class="span6">
              <?php echo get_field("offers_4") ?>
            </div>
          </div>

          <div class="wrapper blue-content span12 offers-footer">

            <p><img src="<?php bloginfo('template_url')?>/img/bikelogo.png" alt=""></p>

            <div class="offers-info">
              <?php echo get_field("contact_info") ?>
            </div>

            <div class="binfo span8">
              <div class="span4">bikestock.com</div>
              <div class="span4">#bikestock</div>
              <div class="span4">@bikestock</div>
            </div>

            <div style="clear:both;"></div>

            <div class="span8 download-bike">
              <a href="<?php echo get_field("download_link") ?>" title="Download PDF">Download PDF</a>
            </div>


            <div style="clear:both;"></div>
          </div>


          <div style="clear:both;"></div>
        </div>

    </div>

  </div>

  <?php endwhile; endif; ?>

<style>

.yellow-container, .blue-containers {
  width: 100%;
  text-align: center;
  background: #fee800;
  padding-top: 4%;
  padding-bottom: 4%;
  margin-bottom: 30px;
  position: relative;
  margin-top: 0px;
}
.triangle {
  width: 100%;
  text-align: center;
  position:relative;
  top: -140px;
}
.triangle img { width: 100%; }

.triangle .tbg {
  max-width: 469px;
  margin-top: -7%;
}

.triangle .tlogo {
  max-width: 132px;
  position: absolute;
  margin-left: 170px;
  margin-top: -2%;
}
.yellow-content.span12 {
  float: none;
  margin: -120px auto 10px;
  clear: both;
}

.yellow-content hr {
    border-bottom: 10px solid #0092ce;
}

.yellow-content h1 {
  text-transform: uppercase;
  font-family: Sanchezblack,helvetica;
  font-size: 41px !important;
  font-weight: lighter !important;
  letter-spacing: 1px;
  padding-left: 95px;
  text-align: left !important;
}

.wrapper.yellow-content.span12 h1 span {
    color: #0092ce;
    font-size: 100px;
    line-height: 0;
    margin-left: -90px;
    margin-top: 35px;
    position: absolute;
}

.yellow-content h3 {
  color: #0092ce;
  text-transform: capitalize;
  text-align: left;
  font-family: 'SanchezBlack';
  font-weight: lighter;
}

.yellow-content p {
  text-align: left;
  font-family: 'SanchezLight';
  font-size: 14px;
  letter-spacing: -0.5px;
}

.yellow-content .row-fluid [class*="span"] {
  margin-left: 6%;
}

.yellow-content .row-fluid [class*="span"]:first-child {
  margin-left: 0px;
}

.yellow-content.span12.ybox2 { margin-top: 4%; }

.yh1 {
    padding-left: 5px !important;
    padding-top: 5px;
}

.blue-container {
  background: #0092ce;
  margin-top: -20px;
  padding-top: 40px;
}

.blue-container > h1 {
  color: #ffe701;
}

.wrapper.blue-content.span12 {
    clear: both;
    float: none;
    margin: 0 auto;
    text-align: center;
    padding-top: 40px;
}

.blue-content h3 {
  line-height: 32px;
  color: #FFF;
  font-family: 'SanchezBlack';
  font-weight: lighter;
  font-size: 24px;
}

.blue-content p {
  font-family: 'SanchezLight';
  font-size: 14px;
  letter-spacing: -0.5px;
}

.wrapper.blue-content.span12.offers-footer {
    float: none;
    margin: 0 auto;
    position: relative;
    text-align: center;
    clear: both;
    font-family: 'SanchezLight';
    color: #FFF;
}
.offers-info ul {
  margin-left: 0px;
}
.offers-info ul li {
  color: #FFF;
}
.offers-info ul li a {
  color: #FFF;
}

.binfo.span8 {
    clear: both;
    float: none;
    margin: 0 auto;
    position: relative;
}

.binfo .span4 {
  color: #FFF;
  font-size: 20px;
  font-family: 'SanchezBlack';
  font-weight: lighter;
}

.offers-info {
    padding-bottom: 20px;
    padding-top: 10px;
}

.span8.download-bike {
    float: none;
    margin: 0 auto;
    padding-bottom: 50px;
    padding-top: 50px;
}

.download-bike a {
  font-size: 17px;
  font-family: 'DecimaNova-Bold';
  padding: 10px 15px;
  background: #fef000;
  color: #57585b;
  text-decoration: none;
}

@media all and (max-width: 768px) {

  .yellow-content h3 {
    font-size: 18px;
  }

  .wrapper.yellow-content.span12 h1 span {
    font-size: 90px;
  }

  .yellow-content h1 {
    font-size: 29px !important;
  }

  .yellow-content.span12 {
    margin: -150px auto 10px;
  }

  .triangle .tlogo {
    margin-left: 165px;
    margin-top: 10px !important;
  }

}

@media all and (max-width: 640px) {

  .wrapper.yellow-content.span12 h1 span {
    margin-left: -55px;
    margin-top: 27px;
    font-size: 60px !important;
  }

  .yellow-content h1 {
    font-size: 16px !important;
    line-height: 29px;
    padding-left: 65px;
  }

  .triangle .tbg {
    margin-top: -4%;
  }

  .yellow-content .span4, .yellow-content .span3 {
    width: 100%;
    margin-left: 0px !important;
  }

  .binfo .span4 {
    margin-left: 0px;
    width: 100%;
  }

}

@media all and (max-width: 480px) {

  .triangle .tlogo {
    margin-left: 30%;
  }

}

@media all and (max-width: 320px) {

  .triangle .tlogo {
    margin-left: 77px;
  }

}

  #showcontent { background: url("/wp-content/themes/Bikestock/img/showcontent.png") no-repeat; width: 56px; height: 56px; position: fixed; cursor: pointer; left: 50%; margin-left: -20px; bottom:10px; z-index: 100; opacity: 0; transition: all 0.5s ease 0s; position: fixed; }
  #showcontent.active { opacity: 1; transition: all 0.5s ease 0s; }
  .bikenyc { color: #fff;font-family: 'DecimaNova-Bold';border: 8px solid #fff;z-index: 9;text-align: center;font-size: 46px;padding: 18px 18px 13px; }
  .find_location { width: 100%; height: auto; position: relative; background: url('/staging/wp-content/themes/Bikestock/img/machine_find_location.jpg') repeat-y top center }
  .find_location .content { padding: 4% 5%; }
  .find_location .content h1 { padding-bottom: 8%; text-align: left !important; }
  .find_location .content p { font-size: 16px; font-family: 'SanchezLight'; line-height: 30px; padding:0px; text-align: left; margin-bottom: 10%; }
  .request_machine { width: 100%; text-align: center; background: #00b552; padding-top: 4%; padding-bottom: 4%; margin-bottom: 30px; position: relative; }
  .request_machine h2 { font-family: 'DecimaNova-Bold'; font-size: 25px; color: #fff; text-transform: uppercase; }
  .request_machine p { font-size: 19px; color: #fff; }
  .request_machine a { font-size: 19px; color: #fff; text-decoration: none; }
  .request_machine a:hover { text-decoration: underline; }
</style>

<?php get_footer(); ?>


