  $(document).ready(function() {

  $('.Machine').live('click', function() {
    mapp0.getPoi(1).setVisible(true);
    mapp0.getPoi(2).setVisible(false);
    mapp0.getPoi(0).setVisible(true);
    mapp0.getPoi(3).setVisible(true);

  });

  $('.Toolkit').live('click', function() {
    mapp0.getPoi(1).setVisible(false);
    mapp0.getPoi(2).setVisible(true);
    mapp0.getPoi(0).setVisible(false);
    mapp0.getPoi(3).setVisible(false);
  });

  $('.Popup-shop').live('click', function() {
    mapp0.getPoi(1).setVisible(false);
    mapp0.getPoi(2).setVisible(true);
    mapp0.getPoi(0).setVisible(false);
    mapp0.getPoi(3).setVisible(false);
  });

  $('#zoomControl #zoomin').live('click', function() {
    var x = mapp0.getMap();
    mapp0.setZoom(x.getZoom()+1);
  });

  $('#zoomControl #zoomout').live('click', function() {
    var x = mapp0.getMap();
    mapp0.setZoom(x.getZoom()-1);
  });

  /*$(document).live("click", function() {
    if (($('.mapp-directions').is(':visible')) && ($(window).width() < 768 )) {
        if (click != 1) {
        click = 1;
        $('.mapp-dir-print').trigger('click');
        $('.mapp-directions').hide();
        }
    }
    else {
        click = 0;
    }
  });  */

// $('.mapp-iw a').live('click', function(e){  alert('Locations');
//     e.preventDefault();
//     if($(this).html() == "Directions to"){

//         var width = $(window).width();

//     if(width < 768){ 
//         $('<div id="directions_container"></div>').insertAfter(".mapFull");
//         $('#mapp0_directions').remove().appendTo('#directions_container');

//     }
//     else {
//           $('#mapp0_directions').remove().appendTo('#mapp0_layout');
//     }
//     }
// });

  });

$(window).load(function(){
   function fix_map(){
      $('<div id="directions_container"></div>').insertAfter(".mapFull");
      $('#mapp0_directions').remove().appendTo('#directions_container');
      if($(this).width() > 768){
        $('#mapp0_directions').css({'max-height':$('.mapInfo').height() - 75, 'height':'auto'});
      }
      $('.mapp-dir-get').on('click', function(e){
          e.preventDefault();
          if($('.mapp-dir-saddr').val().length > 0 && $('.mapp-dir-daddr').val().length > 0){
            _gaq.push(['_trackEvent', 'Locations Page Click', 'Get Directions Button', $('.mapp-dir-daddr').val()]);
          }
      })
      $('.mapp-myloc').on('click', function(e){
          e.preventDefault();
          if($('.mapp-dir-daddr').val().length > 0){
            _gaq.push(['_trackEvent', 'Locations Page Click', 'My Location Button', $('.mapp-dir-daddr').val()]);
          }
      })
   };
   window.setTimeout( fix_map, 1000 ); // 5 seconds
});

 $(window).resize(function(event) {
    if($('#mapp0_directions').length > 0){ console.log($(this).height());
      if($(this).width() > 768){
        $('#mapp0_directions').css({'max-height':$('.mapInfo').height() - 75});
      }
      else {
        $('#mapp0_directions').css({'max-height':'inherit'});
      }
    }
 });