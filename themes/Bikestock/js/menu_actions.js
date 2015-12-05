
jQuery(document).ready(function($) {
	$(".new_menu li").hover(function() {
		$(this).children('ul').fadeIn(400);
		$(this).children('a').addClass('active');
	}, function() {
		$(this).children('ul').fadeOut(400);
		$(this).children('a').removeClass('active');
	});
});