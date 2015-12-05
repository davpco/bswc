<?php /**
 * Template Name: Internal Map Page
 */ ?>

<?php get_header(); ?>
   
    <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/labels.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/infobox_packed.js" type="text/javascript"></script>
    <script>
	  var map;
      var infowindow = null;
      var gmarkers = [];
      var markerTitles =[];
      var highestZIndex = 0;
      var agent = "default";
      var zoomControl = true;
      
        // detect browser agent
        if(navigator.userAgent.toLowerCase().indexOf("iphone") > -1 || navigator.userAgent.toLowerCase().indexOf("ipod") > -1) {
          agent = "iphone";
          zoomControl = false;
          centerL = 40.704848;
          centerR =  -73.933161;
          
        }
        if(navigator.userAgent.toLowerCase().indexOf("ipad") > -1) {
          agent = "ipad";
          zoomControl = false;
        }
      
      
function initialize() {


  var image = '<?php bloginfo('template_directory'); ?>/img/marker-kit.png';
  var imageflag = '<?php bloginfo('template_directory'); ?>/img/flagship.png';



  	var markers = new Array(); 
    var locations = [
      ['Brooklyn&#146;s Natural ', '49 Bogart St, Brooklyn<br />24/7', 'Machine', 40.704848,-73.933161, 5],
      ['Calexico Greenpoint', '645 Manhattan Ave, Brooklyn<br />11:30-2am Daily', 'Toolkit', 40.724175,-73.951133, 4]
    ];
    var locationkits = [
    ];

    var map = new google.maps.Map(document.getElementById('map-canvas'), {

      center: new google.maps.LatLng(40.704848,-73.933161),
      zoom: 14,
	  //minZoom: 10,
	  mapTypeId: google.maps.MapTypeId.ROADMAP,
	  streetViewControl: false,
	  mapTypeControl: false,
	  panControl: false,
	  zoomControl: false, 
	  zoomControlOptions: {
	    style: google.maps.ZoomControlStyle.SMALL,
	    position: google.maps.ControlPosition.RIGHT_CENTER
		  },
	  scaleControl: true,
	  scrollwheel: false
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, markerkit, i, o;

    for (i = 0; i < locations.length; i++) {  
      
	      if (locations[i][2] == 'Toolkit') {
		      marker = new google.maps.Marker({
		        position: new google.maps.LatLng(locations[i][3], locations[i][4]),
		        map: map,
		        icon: image
		      });
	      } else {
	        marker = new google.maps.Marker({
		        position: new google.maps.LatLng(locations[i][3], locations[i][4]),
		        map: map,
		        icon: imageflag
		      });
	      }
	
	
		markers.push(marker);

        var boxText = document.createElement("div");
        boxText.className = "bagel";
        boxText.style.cssText = "border: 1px solid black; margin-top: 8px; background: yellow; padding: 5px;";
                
        var myOptions = {
                 content: locations[i][0]+"<br />"+locations[i][1]
                ,disableAutoPan: false
                ,maxWidth: 0
                ,pixelOffset: new google.maps.Size(-90, 10)
                ,zIndex: null
                ,disableDefaultUI: true
                ,boxClass: "mapGreen"
                ,boxStyle: { 
                  background: "#239f48"
                  ,opacity: 1
                  ,color: "#fff"
                  ,fontSize: "13px"
                  ,fontFamily: "Decima Nova"
                  ,width: "160px"
                  ,padding: "10px"
                 }
                ,closeBoxMargin: "10px 2px 2px 2px"
                ,closeBoxURL: ""
                ,infoBoxClearance: new google.maps.Size(1, 1)
                ,isHidden: false
                ,pane: false
                ,enableEventPropagation: false
        };

       var ib = new InfoBox(myOptions);
       // ib.open(map, marker);    
        
        
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          ib.setContent(locations[i][0]+"<br />"+locations[i][1]);
         // ib.close(map, marker);
          ib.open(map, marker);    
        }
      })(marker, i));
        
    }
	      
	/*     markers.push(marker);


        
        
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]+"<br />"+locations[i][1]);
          infowindow.open(map, marker);
        ib.open(map, marker);    
        }
      })(marker, i));
        
    } */
        
    
    function HomeControl(controlDiv, map) {

	 google.maps.event.addDomListener(zoomout, 'click', function() {
	   var currentZoomLevel = map.getZoom();
	   if(currentZoomLevel != 0){
	     map.setZoom(currentZoomLevel - 1);} 
	     ib.close();    
	  });
	
	   google.maps.event.addDomListener(zoomin, 'click', function() {
	   var currentZoomLevel = map.getZoom();
	   if(currentZoomLevel != 21){
	     map.setZoom(currentZoomLevel + 1);}
	     ib.close();
	});
	
	}
	    

    // == shows all markers of a particular category, and ensures the checkbox is checked ==
      function show(category) {
        for (var i=0; i<locations.length; i++) {
          if (locations[i][2] == category) {
            markers[i].setVisible(true);
            ib.close();
          }
        }
      }

      // == hides all markers of a particular category, and ensures the checkbox is cleared ==
      function hide(category) {
        for (var i=0; i<locations.length; i++) {
          if (locations[i][2] == category) {
            markers[i].setVisible(false);
            ib.close();
          }
        }
      }
     function showAll() {
        for (var i=0; i<locations.length; i++) {
          
            markers[i].setVisible(true);
          
        }
      }
      
      // == show or hide the categories initially ==
      hide('Toolkit');
      show('Machine');
      
      $('.mapInfo').on('click',function() {
	      hide('Fish');
      });
        $(".mapInfo h3").click(function(){
        	$('.mapInfo h3').removeClass('active');
            var cat = $(this).attr("class");
        	$(this).addClass('active');
            $('.gm-style-iw').parent().hide();
            hide('Toolkit');
            hide('Machine');
            show(cat);
           
          });
        $('.mapInfo h2').click(function() {
        	$('.mapInfo h3').removeClass('active');
	        showAll();
        });
 

  // Create the DIV to hold the control and
  // call the HomeControl() constructor passing
  // in this DIV.
  var homeControlDiv = document.createElement('div');
  var homeControl = new HomeControl(homeControlDiv, map);
       
}

google.maps.event.addDomListener(window, 'load', initialize);



    </script>

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
            <h1><?php the_title(); ?></h1>
            <div class="headline"><?php the_content(); ?></div>
            <div class="column_2"><?php the_field('2_column'); ?></div>
              <div class="row-fluid">
              <?php if (get_field('left_header') != '') { ?>
                <div class="span6 flaghead">
                  <h2><?php the_field('left_header'); ?></h2>
                  <div class="map">
                              <div id="map-canvas"></div>
					              <div id="zoomControl">
					               <div id="zoomin" style="cursor:pointer;">+</div>
					               <div id="zoomout" style="cursor:pointer; ">-</div>
					              </div>
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
                  <p style="text-align:center">Request to have a Bikestock machine by your business or on your property. 
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


