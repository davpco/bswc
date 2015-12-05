<?php /**
 * Template Name: New Map Page
 */ ?>

<?php get_header(); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="wrapper row-fluid">
  <div class="span12">
    <div class="pager-nav"></div>
  </div>
</div>

    <div id="content" class="mapFull">
      <div class="wrapper row-fluid">
        <div class="span12">
          <div class="content" style="max-width:100%; margin-left:0px;">
            <div class="mapInfo">
              <h2>Choose A City Below</h2>
              <?php if ( (@$_GET['map'] == 'boston') || ( (!isset($_GET['map']) && (@$_COOKIE['bike_city'] == 'BO') ) ) ) { ?>
              <a href="?map=boston"><h3 class="active Machine"><div class="hidden-xs">Boston</div><div class="visible-xs">BOS</div></h3></a>
              <?php } else { ?>
              <a href="?map=boston"><h3 class="Machine"><div class="hidden-xs">Boston</div><div class="visible-xs">BOS</div></h3></a>
              <?php } ?>

              <?php if ( (@$_GET['map'] == 'nyc') || ( (!isset($_GET['map']) && (@$_COOKIE['bike_city'] == 'NY') ) ) ) { ?>
              <a href="?map=nyc"><h3 class="active Machine"><div class="hidden-xs">New York</div><div class="visible-xs">NYC</div></h3></a>
              <?php } else if ( !isset($_GET['map']) && !isset($_COOKIE['bike_city']) ) { ?>
              <a href="?map=nyc"><h3 class="active Machine"><div class="hidden-xs">New York</div><div class="visible-xs">NYC</div></h3></a>
              <?php } else { ?>
              <a href="?map=nyc"><h3 class="Machine"><div class="hidden-xs">New York</div><div class="visible-xs">NYC</div></h3></a>
              <?php } ?>
              <!-- <h3 class="Popup-shop"><img src="<?php bloginfo('template_directory'); ?>/img/popupshopWhite.png" alt="">Pop-up</h3>   -->

            </div>
            <div id="map-canvas">
              <?php if (!isset($_GET['map'])) { $id = "4"; } else { 
                
                switch (@$_GET['map']) {
                  case 'boston':
                    $id = '6'; 
                    break;

                  case 'nyc':
                    $id = '4'; 
                    break;
                  
                  default:
                    # code...
                    break;
                }

              } ?>
              <?php if ( isset($_COOKIE['bike_city']) && !isset($_GET['map']) ) { 
                
                switch (@$_COOKIE['bike_city']) {
                  case 'BO':
                    $id = '6'; 
                    break;

                  case 'NY':
                    $id = '4'; 
                    break;
                  
                  default:
                    # code...
                    break;
                }

              } ?>              
              <?php echo do_shortcode('[mappress mapid="'.$id.'" width="100%" height="100%" adaptive="true" language="en"]'); ?>
            </div>
              <div id="zoomControl">
               <div id="zoomin" style="cursor:pointer;">+</div>
               <div id="zoomout" style="cursor:pointer; ">-</div>
              </div>
          </div>
        </div>
      </div>
    </div>
    <div id="showFooter" class="active">
    </div>
  </div>

  <?php endwhile; endif; ?>

<style>

.page-template-page-new-map-php #showFooter { background: url("/wp-content/themes/Bikestock/img/down_arrow.png") repeat-y scroll 6px 5px / 26px auto #F0592A; }

.mapp-directions { display: none; text-align: left; margin: 10px 0 0 0; position: absolute; right: 0; width: 335px !important; left: 18%; top: 117px; background: #fff; padding: 10px; height: 87%; overflow-y: auto; z-index: 100; }
.mapp-ib {-moz-box-shadow: none;-webkit-box-shadow: none; box-shadow: none; margin-top: -10px;}
.mapp-ib-tip { margin-top: -10px; }
img.adp-marker {width: 22px;height: 40px;padding: 5px;max-width: inherit;}
.mc4wp-ajax-loader { background: url('/wp-content/plugins/mailchimp-for-wp-pro/assets/img/ajax-loader2.gif') !important; }
.mapp-dir-close, .mapp-dir-print, .mapp-myloc { border: 1px solid #ccc;background: #ddd;text-align: center;font-family: DecimaNova-Bold,helvetica;width: auto;padding: 3px 10px;font-size: 15px;border-radius: 3px;-webkit-border-radius: 3px;-moz-border-radius: 3px;color: #3894CE;display: inline-block;margin-top: 5px;padding-bottom: 2px;min-width: 97px;}
.mapp-dir-get {display: block;}
.mapp-myloc {margin-bottom: 10px;}

.mapInfo h2 {
  font-size: 18px;
  text-transform: capitalize !important;
  padding: 25px 0;
  border-bottom: 1px solid #f7a187;
  margin: 0px;
}

.mapInfo h3 {
    background: url("/wp-content/themes/Bikestock/img/mapinfo-arrow.png") no-repeat scroll 100% 10px rgba(0, 0, 0, 0) !important;
    border-bottom: 1px solid #f7a187;
    cursor: pointer;
    display: block;
    font-family: "Sanchezbold";
    font-size: 26px;
    margin: 0;
    padding: 20px 0 !important;
    position: relative;
    text-align: center;
    text-transform: uppercase;
}

.visible-xs { display: none; }
.hidden-xs { display: block; }

.mapInfo a, .mapInfo a:hover {
  text-decoration: none;
}

.mapInfo h3.active, .mapInfo h3:hover {
  background: url("/wp-content/themes/Bikestock/img/mapinfo-arrow.png") no-repeat scroll 100% 10px #0092d3 !important;
}

@media screen and (max-width: 1400px) {
  .mapInfo h3 { font-size: 15px; padding: 6px 0 5px 45px; }
  .mapInfo h2 { font-size: 14px; }  
}

@media screen and (min-width: 1000px) and (max-width: 1200px) {
  .mapInfo h3 { padding: 6px 0 5px 30px; }
  .mapInfo h3.active, .mapInfo h3:hover { background-image: none; }
}

@media screen and (max-width: 999px) {
  .mapp-dir-get { font-size: 15px !important; margin-left: 0px !important; }

  .mapInfo h4 { display: none; }

  .visible-xs { display: block; }
  .hidden-xs { display: none; }

  .mapInfo h3 { background: none !important; }

  .mapInfo h3.active, .mapInfo h3:hover {
    background: #0092d3 !important;
  }

  .mapInfo h2 { font-size: 0px; }

  .mapInfo h2 img { display: none; }

  .mapInfo { width: 60px; }

  .mapInfo h3.active, .mapInfo h3:hover { background: none; }

  .mapInfo h3 img { border: none; }

  .mapInfo .Toolkit {
      background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
      height: 40px;
      padding: 10px 0 5px;
      text-indent: -9999em;
      width: 60px;
  }

  .mapInfo .Machine {
      background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
      height: 40px;
      padding: 10px 0 5px;
      width: 60px;
  }

  .mapInfo h2 {
    background: url("/wp-content/themes/Bikestock/img/pinWhite.png") no-repeat scroll 16px 10px rgba(0, 0, 0, 0);
    border-bottom: 0 none;
    height: 30px;
    text-indent: -9999em;
    width: 60px;
  }

  .mapp-directions { left: 70px; }

  .mapInfo h2 { background: url("/wp-content/themes/Bikestock/img/pinWhite.png") no-repeat scroll 25px 10px rgba(0, 0, 0, 0); }
  .mapInfo .Machine { text-indent: initial; margin-left: 5px; }


}

@media screen and (max-width: 889px) {
    #header .row-fluid .span2 {
      width: 17%;
    }
    #header .row-fluid [class*="span"] {
      margin-left: 0;
    }
}

@media screen and (max-width: 768px) {

  .mapp-directions { position: relative; left: 0px; clear: both; top:0; margin-bottom: 20px; margin-left: 5%; width: 85% !important; }

}

@media screen and (max-width: 480px) {
  .mapInfo h2 { background: url("/wp-content/themes/Bikestock/img/pinWhite.png") no-repeat scroll 25px 10px rgba(0, 0, 0, 0); }
  .mapInfo .Machine { text-indent: initial; margin-left: 5px; }
}

/*@media screen and (max-width: 730px) {
  .mapInfo h2 { font-size: 12px; }
  .mapInfo h3 { font-size: 0px; }
}*/

</style>

<?php get_footer(); ?>