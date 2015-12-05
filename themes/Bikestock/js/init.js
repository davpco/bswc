

$(document).ready(function() {

	$(".slide1").backstretch(
		"/wp-content/uploads/2013/07/bikestock_machine_49bogart1.jpg");
	$(".slide3").backstretch(
		"/wp-content/uploads/2013/07/bikestock_toolkit1.jpg");
	$(".slide2").backstretch(
		"/wp-content/uploads/2013/07/bikestock_cityscape1.jpg");

	var userFeed = new Instafeed({
        get: 'user',
        userId: 246777652,
        accessToken: '246777652.467ede5.20e0ce1e5a9a42eaa24bf9668767e1dc',
        resolution: 'low_resolution',
        limit: '30',
        template: '<img class="i{{id}}" src="{{image}}" alt="{{caption}}" />'
    });
    userFeed.run();

    var isMobile = {
	    Android: function() {
	        return navigator.userAgent.match(/Android/i);
	    },
	    BlackBerry: function() {
	        return navigator.userAgent.match(/BlackBerry/i);
	    },
	    iOS: function() {
	        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
	    },
	    Opera: function() {
	        return navigator.userAgent.match(/Opera Mini/i);
	    },
	    Windows: function() {
	        return navigator.userAgent.match(/IEMobile/i);
	    },
	    any: function() {
	        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
	    }
	};

	if( !isMobile.any() ){
		$.stellar({
			responsive: true
		});
	}

	$('.route li').on("click", function() {
	  $('.route li').removeClass('active');
	  $(this).addClass('active');
	})


/* Slider */

	 $('.flexslider').flexslider({
		controlNav: true,
	 	directionNav:true,
	 	controlsContainer: ".pager-nav",
		animation: "fade",              //String: Select your animation type, "fade" or "slide"
		slideshow: true,                //Boolean: Animate slider automatically
		before: function(){
			if ($('.item1').hasClass('active')) {
				$('.item1').removeClass('active');
				$('.item2').addClass('active');
			} else if ($('.item2').hasClass('active')) {
				$('.item2').removeClass('active');
				$('.item3').addClass('active');
			} else {
				$('.item3').removeClass('active');
				$('.item1').addClass('active');
			}
		}
	 	});
/* overlay */

	$('#showFooter, .login').on("click", function() {
        var activateNews = $(this).attr('id');
        $('#showFooter').removeClass('active');
		$('body').delay(500).scrollTo('#footer',{duration:'slow', offsetTop : '50'});
		if (activateNews == 'signup') {
			setTimeout(function(){
				$('input[type="email"]').focus();
			},1000);
		}

	});

	$('.menuTop').on("click", function() {
		$('.menuTop').toggleClass('active');
	});
	$('#content').mouseover(function() {
		$('.menuTop').removeClass('active');
		$('#mobileNavigation').removeClass('active');
	});
	$('#mobileNavigation').on("click", function() {
		$(this).toggleClass('active');
	});

	resizeFunction();

});

$(document).scroll(function() {
    if ($(this).scrollTop() > 30) {
        $('#showFooter').removeClass('active');
    }  else {
   		 $('#showFooter').addClass('active')
	}
});
 window.addEventListener("load",function() {
           // Set a timeout...
           setTimeout(function(){
           // Hide the address bar!
           window.scrollTo(0, 1);
           }, 0);
         });

$(document).resize(resizeFunction());

function resizeFunction() {
	windowHeight = $(window).height() - 90;
	mapHeight = $(window).height() - 90;
	windowWidth = $(window).width();
	$('.mapFull #map-canvas').css('height', windowHeight);
	$('.mapInfo').css('height', windowHeight);
	if (windowWidth <= 480) {
		$('.mapFull #map-canvas').css('height', windowHeight+ 50);
		$('.mapInfo').css('height', windowHeight +50);
	}

}
