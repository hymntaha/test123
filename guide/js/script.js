$(document).ready(function(){
	
	// Initialize LazyLoad
	$("img.lazy").show().lazyload({
		container: $("#main"),
		effect : "fadeIn",
	});
	
	// Initialize FancyBox
	$(".fancybox").fancybox();
	
	//  Mobile menu
	$('.mobile-menu-button a').bind('touchstart click', function(){
		$(this).toggleClass('dropped');
		$('ul.mobile-nav').slideToggle('fast', function(){
			// Animation complete.
		});
	});
	
	// jQuery Smooth Scroll
	$('a[href^="#"]').click(function(){
		var target = $(this.hash);
		if (target.length == 0) target = $('a[name="' + this.hash.substr(1) + '"]');
		if (target.length == 0) target = $('html');
		$('html, body').animate({ scrollTop: target.offset().top }, 650);
		return false;
	});

		
    // fade Scroll to top
	$('#to-top').hide();
	$(window).scroll(function(){
		if ($(this).scrollTop() > 200) {
			$('#to-top').fadeIn();
		} else {
			$('#to-top').fadeOut();
		}
	});
	
	// ol list styles
	if ($('ol:first').css('list-style-type') != 'none') { // for IE6/IE7 only
		$('ol ol').each(function(i, ol) {
			ol = $(ol);
			var level1 = ol.closest('li').index() + 1;
			ol.children('li').each(function(i, li) {
				li = $(li);
				var level2 = level1 + '.' + (li.index() + 1);
				li.prepend('<span>' + level2 + '</span>');
			});
		});
	}
	
});