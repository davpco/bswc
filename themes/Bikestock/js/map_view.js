  $(document).ready(function() {
    
  $('.Machine').live('click', function() {
    mapp0.getPoi(0).open();
  });

  $('.Toolkit').live('click', function() {
    mapp0.getPoi(1).open();
  });

  $('#zoomControl #zoomin').live('click', function() {
    var x = mapp0.getMap();
    mapp0.setZoom(x.getZoom()+1);
  });

  $(document).live('click', function() {
    var x = mapp0.getMap();
    mapp0.setZoom(x.getZoom()-1);
  });    

  });