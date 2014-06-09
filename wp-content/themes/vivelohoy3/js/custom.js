var $ = jQuery.noConflict();
$(document).ready(function() { 

	$("body").fitVids();
	$('input, textarea').placeholder();
	
	// Scroll to top 
	var toTop = $('#toTop');
	var scred = false;
	var scrHeight = 300;
	$(window).scroll(function () {
		if (scrHeight < $(window).scrollTop() && !scred) {
			toTop.fadeIn();
			scred = true;
		} else if (scrHeight > $(window).scrollTop() && scred) {
			toTop.fadeOut();
			scred = false;    
		}
	});
	$('a#toTop').click(function () {
		$('body,html').animate({scrollTop: 0}, 800);
		return false;
	});
	
	//Search
	$('#search_btn').click(function(e) {
		$(this).toggleClass( 'prl-nav-toggle-search prl-nav-toggle-close' );
		$('#search_form').fadeToggle();
		return false;
	});
	
	// Sticky navigation
	var nav = $('#nav');
	var scrolled = false;
	var headerHeight = nav.offset().top;
	$(window).scroll(function () {
		if (headerHeight < $(window).scrollTop() && !scrolled) {
			nav.addClass('sticky-nav').animate({ top: '0px' });
			scrolled = true;
		} else if (headerHeight > $(window).scrollTop() && scrolled) {
			nav.removeClass('sticky-nav').removeAttr('style');
			scrolled = false;    
		}
	});
	
	
	// Mobile navigation
	$('.side-nav li').has('ul').prepend('<span class="nav-click"></span>');
	$('.side-nav .nav-list').on('click', '.nav-click', function(){
		$(this).siblings('.sub-menu').slideToggle();
		$(this).toggleClass('nav-click-up');
	});
	
	
	$('.gallery_slider').flexslider({
		autoPlay: false,
		pauseOnAction: false,
		animation: "fade",
		smoothHeight: true
	  });
	
});

