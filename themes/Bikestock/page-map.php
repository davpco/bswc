<?php /**
 * Template Name: Map Page
 */ ?>

<?php get_header(); ?>

  <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.1.min.js"></script>
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
      var zoomControl = false;
      var centerL = 40.707894;
      var centerR = -73.953996;
      
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
    var directionDisplay;
    var directionsService = new google.maps.DirectionsService();
    var geocoder = new google.maps.Geocoder();

    var rendererOptions = { draggable: true, suppressMarkers: true };
    directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions);
    var map = new google.maps.Map(document.getElementById('map-canvas'), {
      center: new google.maps.LatLng(centerL,centerR),
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
                ,pane: "floatPane"
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




/*
  directionsDisplay.setMap(map);
  // point the directions to the container for the direction details
  directionsDisplay.setPanel(document.getElementById("directionsPanel"));
  // start the geolocation API
  if (navigator.geolocation) {
    // when geolocation is available on your device, run this function
    navigator.geolocation.getCurrentPosition(foundYou, notFound);
  } else {
    // when no geolocation is available, alert this message
    alert('Geolocation not supported or not enabled.');
  }

  function notFound(msg) {  
    alert('Could not find your location :(')
  }
*/
function clearDirMarkers()
{
         var divs=document.getElementsByTagName('div');
         for(i=0; i<divs.length; i++) {
                if(divs[i].style && divs[i].style.backgroundImage && divs
[i].style.backgroundImage.indexOf("marker_green")!=-1) {
                        divs[i].style.display="none";
                }
         }
}

function foundYou(position) {
  // convert the position returned by the geolocation API to a google coordinate object
  var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
  // then try to reverse geocode the location to return a human-readable address
  geocoder.geocode({'latLng': latlng}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      // if the geolocation was recognized and an address was found
      if (results[0]) {
        // add a marker to the map on the geolocated point
        marker = new google.maps.Marker({
            position: latlng,
            map: map
        });
        // compose a string with the address parts
        var address = results[0].address_components[1].long_name+' '+results[0].address_components[0].long_name+', '+results[0].address_components[3].long_name
        // set the located address to the link, show the link and add a click event handler
        $('.autoLink span').html(address).parent().show().click(function(){
          // onclick, set the geocoded address to the start-point formfield
          $('#routeStart').val(address);
          // call the calcRoute function to start calculating the route
          calcRoute();
        });
      }
    } else {
      // if the address couldn't be determined, alert and error with the status message
      alert("Geocoder failed due to: " + status);
    }
  });
}

function calcRoute() {
  // get the travelmode, startpoint and via point from the form   
  var travelMode = $('input[name="travelMode"]:checked').val();
  var start = $("#routeStart").val();
  var end = $("#routeEnd").val();
  // compose a array with options for the directions/route request
  var request = {
    origin: start,
    destination: end,
    unitSystem: google.maps.UnitSystem.IMPERIAL,
    travelMode: google.maps.DirectionsTravelMode[travelMode]
  };
  // call the directions API
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      // directions returned by the API, clear the directions panel before adding new directions
      $('#directionsPanel').empty();
      // display the direction details in the container
      directionsDisplay.setDirections(response);
    } else {
      // alert an error message when the route could nog be calculated.
      if (status == 'ZERO_RESULTS') {
        alert('No route could be found between the origin and destination.');
      } else if (status == 'UNKNOWN_ERROR') {
        alert('A directions request could not be processed due to a server error. The request may succeed if you try again.');
      } else if (status == 'REQUEST_DENIED') {
        alert('This webpage is not allowed to use the directions service.');
      } else if (status == 'OVER_QUERY_LIMIT') {
        alert('The webpage has gone over the requests limit in too short a period of time.');
      } else if (status == 'NOT_FOUND') {
        alert('At least one of the origin, destination, or waypoints could not be geocoded.');
      } else if (status == 'INVALID_REQUEST') {
        alert('The DirectionsRequest provided was invalid.');         
      } else {
        alert("There was an unknown error in your request. Requeststatus: nn"+status);
      }
    }
  });
setTimeout(function() {
    clearDivMarkers();
  }, 1000);
}
       
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
          <div class="content" style="max-width:100%;">
            <div class="mapInfo">
              <h2><img src="<?php bloginfo('template_directory'); ?>/img/pinWhite.png" alt="">Locations</h2>
              <h4>Find the closest machine<br />or toolkit near you!</h4>
              
              <h3 class="Machine"><img src="<?php bloginfo('template_directory'); ?>/img/machineWhite.png" alt="">Machine</h3>
              <h3 class="Toolkit"><img src="<?php bloginfo('template_directory'); ?>/img/toolkitWhite.png" alt="">Toolkit</h3>
  
  <!---
    hide still in development 
              <form action="#" onSubmit="calcRoute();return false;" id="routeForm">
  <label>
    From: <br />
    <input type="text" id="routeStart" value="Brooklyn NY">
          <a href="#" class="autoLink" style="display: none;">Use current location: <span>not found</span></a>
  </label>
        <label>
    To: <br />
    <input type="text" id="routeEnd" value="49 Bogart St, Brooklyn NY">
  </label>
  <label><input type="radio" name="travelMode" value="DRIVING"  /> Driving</label>
  <label><input type="radio" name="travelMode" value="BICYCLING" checked /> Bicylcing</label>
  <label><input type="radio" name="travelMode" value="TRANSIT" /> Public transport</label>
  <label><input type="radio" name="travelMode" value="WALKING" /> Walking</label>
  <input type="submit" value="Calculate route">
</form>
<div id="directionsPanel">
  Enter a starting point and click "Calculate route".
</div>

-->
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
    <div id="showFooter" class="active">
    </div>
  </div>

  <?php endwhile; endif; ?>
  
<?php get_footer(); ?>


