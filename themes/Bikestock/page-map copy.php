<?php /**
 * Template Name: Map Page
 */ ?>

<?php get_header(); ?>
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
      $(document).ready(function(){
        if(navigator.userAgent.toLowerCase().indexOf("iphone") > -1 || navigator.userAgent.toLowerCase().indexOf("ipod") > -1) {
          agent = "iphone";
          zoomControl = false;
        }
        if(navigator.userAgent.toLowerCase().indexOf("ipad") > -1) {
          agent = "ipad";
          zoomControl = false;
        }
      });
      
      
      
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

      center: new google.maps.LatLng(40.707894,-73.953996),
      zoom: 14,
	  //minZoom: 10,
	  mapTypeId: google.maps.MapTypeId.ROADMAP,
	  streetViewControl: false,
	  mapTypeControl: false,
	  panControl: true,
	  zoomControl: true, 
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


        
        
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]+"<br />"+locations[i][1]);
          infowindow.open(map, marker);
        ib.open(map, marker);    
        }
      })(marker, i));
        
    }
        
    
    function HomeControl(controlDiv, map) {

	 google.maps.event.addDomListener(zoomout, 'click', function() {
	   var currentZoomLevel = map.getZoom();
	   if(currentZoomLevel != 0){
	     map.setZoom(currentZoomLevel - 1);}     
	  });
	
	   google.maps.event.addDomListener(zoomin, 'click', function() {
	   var currentZoomLevel = map.getZoom();
	   if(currentZoomLevel != 21){
	     map.setZoom(currentZoomLevel + 1);}
	});
	
	}
	    

    // == shows all markers of a particular category, and ensures the checkbox is checked ==
      function show(category) {
        for (var i=0; i<locations.length; i++) {
          if (locations[i][2] == category) {
            markers[i].setVisible(true);
          }
        }
      }

      // == hides all markers of a particular category, and ensures the checkbox is cleared ==
      function hide(category) {
        for (var i=0; i<locations.length; i++) {
          if (locations[i][2] == category) {
            markers[i].setVisible(false);
          }
        }
      }
     function showAll() {
        for (var i=0; i<locations.length; i++) {
          
            markers[i].setVisible(true);
          
        }
      }
      
      // == show or hide the categories initially ==
      show('Toolkit');
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
    <div class="pager-nav"></div>
  </div>
</div>

    <div id="content" class="mapFull">
      <div class="wrapper row-fluid">
        <div class="span12">
          <div class="content">
            <div class="mapInfo">
	            <h2><img src="<?php bloginfo('template_directory'); ?>/img/pinWhite.png" alt="">Locations</h2>
	            <h4>Find the closest machine<br />or toolkit near you!</h4>
	            
	            <h3 class="Machine"><img src="<?php bloginfo('template_directory'); ?>/img/machineWhite.png" alt="">Machine</h3>
	            <h3 class="Toolkit"><img src="<?php bloginfo('template_directory'); ?>/img/toolkitWhite.png" alt="">Toolkit</h3>
	            
            </div>
            <div id="map-canvas"></div>
              <div id="zoomControl">
               <div id="zoomin" style="cursor:pointer;">+</div>
               <div id="zoomout" style="cursor:pointer; ">-</div>
              </div>
          </div>
        </div>
      </div>
    </div>
    <div id="showFooter">
    </div>
  </div>

  <?php endwhile; endif; ?>
  
<?php get_footer(); ?>


