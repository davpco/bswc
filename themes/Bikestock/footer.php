<?php /* FOOTER TEMPLATE */ ?>
    <div id="footer">
      <div class="instawrapper">
        <div id="instafeed"></div>
        <div class="callout">
          <a onClick="_gaq.push(['_trackEvent', 'Social', 'Follow', 'Instagram SCROLL']);" href="http://instagram.com/bikestock">
            @bikestock
          </a>
        </div>
      </div>

      <div class="darker">
        <div class="wrapper row-fluid">
          <div class="span6">
            <h2>Sign up for discounts, exclusive deals, news and events...</h2>
            <?php echo do_shortcode('[mc4wp_form id="129"]'); ?>
          </div>
          <div class="span6">
            <h2>We're Here for You...</h2>
            <img src="<?php bloginfo('template_directory'); ?>/img/email_letter.png" alt="" /><br />
            <a href="mailto:help@bikestocknyc.com">help@bikestocknyc.com</a>
          </div>
        </div>
      </div>
      <div class="lighter">
        <h2>Connect with Us</h2>
        <div class="wrapper row-fluid">
        <div class="span12">
            <a href="https://twitter.com/bikestock" target="_blank" onClick="_gaq.push(['_trackEvent', 'Social', 'Follow', 'Twitter Submit']);"><i class="ss-icon">&#xF611;</i></a>
          <?php /*<span class="twitter">
            <a href="https://twitter.com/bikestock" class="twitter-follow-button btn green-sq" data-show-count="false" data-size="large" data-show-screen-name="false" data-dnt="true">Follow US</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
          </span> */?>
            <a href="http://instagram.com/bikestock" target="_blank" onClick="_gaq.push(['_trackEvent', 'Social', 'Follow', 'Instagram Submit']);"><i class="ss-icon">&#xF641;</i></a>
            <a href="https://www.facebook.com/bikestock" target="_blank" onClick="_gaq.push(['_trackEvent', 'Social', 'Follow', 'Facebook Submit']);"><i class="ss-icon">&#xF610;</i></a>
            <a href="http://goo.gl/maps/HcCZR" target="_blank" onClick="_gaq.push(['_trackEvent', 'Social', 'Follow', 'Googlemaps Submit']);"><i class="ss-icon ss-standard">&#xE6D0;</i></a>
            <a href="http://4sq.com/1bHSgJs" target="_blank" onClick="_gaq.push(['_trackEvent', 'Social', 'Follow', 'Foursquare Submit']);"><i class="ss-icon">&#xF690;</i></a>
          </div>
        </div>
      </div>
      <div class="lighter">
        <div class="copy">&#169; Bikestock 2014</div>
      </div>
    </div>
  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.js"></script>
  <script type='text/javascript' src='http://downloads.mailchimp.com/js/jquery.form-n-validate.js?ver=3.8.1'></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/bikestock.2015-07-14.min.js"></script>
  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/menu_actions.js?v=<?php echo rand(); ?>"></script>

<?php if (!is_page_template("page-new-map.php")) { ?>
    <script type='text/javascript'>
    /* <![CDATA[ */
    var mc4wp_vars = {"ajaxurl":"http:\/\/bs.durlanvega.com\/wp-admin\/admin-ajax.php","ajax_loader_url":"http:\/\/bs.durlanvega.com\/wp-content\/plugins\/mailchimp-for-wp-pro\/assets\/img\/ajax-loader2.gif"};
    /* ]]> */
    </script>
    <script type='text/javascript' src='/wp-content/plugins/mailchimp-for-wp-pro/assets/js/ajax-forms.js?v=3.0'></script>
<?php } ?>

<?php if (is_page_template("page-new-map.php")) { ?>
    <?php wp_footer(); ?>
    <!-- MAP PAGE JS -->
    <script src="<?php bloginfo('template_directory'); ?>/js/mappressjs.js?v=<?php echo rand(); ?>"></script>

    <?php if (!isset($_GET['map']) && !isset($_COOKIE['bike_city'])) { ?>
    <script src="<?php bloginfo('template_directory'); ?>/js/geolocation_map.js?v=<?php echo rand(); ?>"></script>
    <?php } ?>

<?php } ?>

<?php if (is_category()) { ?>
<!-- Category JS Load -->
    <?php wp_footer(); ?>
<?php } ?>

<?php if (is_single() || is_category()) { ?>
<!-- AddThis Button BEGIN -->
    <script type="text/javascript">
      var addthis_config = {
         data_ga_property: 'UA-45789619-1',
         <?php if (get_field( "share_title" )) { ?>
         title: '<?php echo get_field( "share_title" ); ?>',
         <?php } ?>
         <?php if (get_field( "share_description" )) { ?>
         description: '<?php echo get_field( "share_description" ); ?>',
         <?php } ?>
      };
    </script>

    <!-- AddThis Pro BEGIN -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-533ecfda4a2ddb41"></script>
    <!-- AddThis Pro END -->
<?php } ?>

<?php if (is_front_page()) { ?>

  <script>
    $(document).ready(function() {
      var chromeFix = function(grid){
      console.log('test');
        var parent = grid.parentElement,
          placeholder = document.createElement('div'),
          frag = document.createDocumentFragment();

        parent.insertBefore(placeholder, grid);
        frag.appendChild(grid);
        parent.replaceChild(grid, placeholder);
      };

      var chrome = window.navigator.appVersion.match(/Chrome\/(\d+)\./) || false,
        chromeVer = chrome ? parseInt(chrome[1], 10) : false,
        justs = document.getElementById('Grid');

      if(chromeVer && (chromeVer === 31 || chromeVer === 32)){
          chromeFix(justs);
      };
    });
  </script>

<?php }  ?>

<?php if ( (is_page('machine')) || (is_page('about-bikestock')) || (is_page('the-toolkit')) ) { ?>

    <!-- AddThis Button BEGIN -->
    <script type="text/javascript">
          var addthis_config = {
             data_ga_property: 'UA-45789619-1',
             <?php if (get_field( "share_title" )) { ?>
             title: '<?php echo get_field( "share_title" ); ?>',
             <?php } ?>
             <?php if (get_field( "share_description" )) { ?>
             description: '<?php echo get_field( "share_description" ); ?>',
             <?php } ?>
          };
    </script>
    <!-- AddThis Pro BEGIN -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-533ecfda4a2ddb41"></script>
    <!-- AddThis Pro END -->

    <script type="text/javascript" charset="utf-8">
      $(document).ready(function() {
        $('#showcontent').on("click", function() {
          $('html, body').animate({
            scrollTop: $(".bikecontent").offset().top - 150
          }, 1000);
          $('#showcontent').delay(700).removeClass('active');
          //$(window).unbind('scroll');
        });
        $(window).trigger('resize');
      });
      $(window).scroll(function() {
          if ($(this).scrollTop() > 30) {
              $('#showcontent').removeClass('active');
          }  else {
             $('#showcontent').addClass('active')
        }
      });
      $(window).resize(function(event) {
        $('.holder').height($('.parallax-header').height());
      });
    </script>

<?php } ?>

<!-- FIX BUGS -->
<style>
    #footer .twitter:hover { opacity: 0.6; }
    .find_location .content a:hover { opacity: 0.7; }
    @media all and (min-width: 481px) and (max-width: 640px) { #mobileNavigation { display: block; } .menuTop { display: none; } .bslogo img { height: auto; } #header { height: 62px; overflow: hidden; } #header .span8 { height: 36px; overflow: hidden; } #header .span8 img { width: 88px; position: relative; top: -6px; } #mobileNavigation .menu { position: fixed; width: 80%; } #mobileNavigation.active .menu { position: fixed; width: 80%; transition: opacity 1s; -webkit-transition: opacity 1s; -moz-transition: opacity 1s; -o-transition: opacity 1s; } #content { margin-top: 34px; } .active .menu { transition: opacity 1s; -webkit-transition: opacity 1s; -moz-transition: opacity 1s; -o-transition: opacity 1s; } .menu li a { width: auto; } }
    @media all and (max-width: 400px) { #header .span8 { margin-top: -30px } }
</style>

<script type="text/javascript" charset="utf-8">
    $(function() { $('body').hide().show(); });
    $('a[title=Shop]').attr('target', '_blank');
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-45789619-1', 'bikestocknyc.com');
  ga('send', 'pageview');

</script>

<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-45789619-1']);
    _gaq.push(['_trackPageview']);
    (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;

    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';

    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>

<!-- Google Code for Remarketing Tag -->
<!--
Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
-->
<script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 986700374;
    var google_custom_params = window.google_tag_params;
    var google_remarketing_only = true;
    /* ]]> */
</script>

<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>

<noscript>
    <div style="display:inline;">
    <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/986700374/?value=0&amp;guid=ON&amp;script=0"/>
    </div>
</noscript>

<!-- Quantcast Tag -->
<script type="text/javascript">
    var _qevents = _qevents || [];

    (function() {
    var elem = document.createElement('script');
    elem.src = (document.location.protocol == "https:" ? "https://secure" : "http://edge") + ".quantserve.com/quant.js";
    elem.async = true;
    elem.type = "text/javascript";
    var scpt = document.getElementsByTagName('script')[0];
    scpt.parentNode.insertBefore(elem, scpt);
    })();

    _qevents.push({
    qacct:"p-f3CkazqV35B8S"
    });
</script>

<noscript>
    <div style="display:none;">
    <img src="//pixel.quantserve.com/pixel/p-f3CkazqV35B8S.gif" border="0" height="1" width="1" alt="Quantcast"/>
    </div>
</noscript>
<!-- End Quantcast tag -->
<!--Facebook Signup Tracking-->
<div id="fb_pixel"></div>
<?php if (is_woocommerce() || is_cart() || is_checkout() ) {
   wp_footer();
}?>
  </body>
</html>
<?php //} ?>