jQuery(document).ready( function($) {
	/*
	 * Add attributes that are helpful for accessibility.
	 */
	sidebar_tabbable = $( '#secondary a, #secondary button, #secondary input, #secondary textarea, #secondary select, #secondary iframe, .dropdown-toggle' );
	$( '#toggle-sidebar' ).attr( 'aria-hidden', 'true' );
	$( '#menu-toggle' ).attr( 'tabindex', '13' );
	$( sidebar_tabbable ).attr( 'tabindex', '-1' );
	
	/*
	 * Sidebar toggle.
	 */
	$( '#menu-toggle' ).click( function( e ) {
		e.preventDefault();
		$( this ).toggleClass( 'toggle-on' );
		$( 'body' ).toggleClass( 'toggle-open' );
		$( '#toggle-sidebar' ).attr( 'aria-hidden', $( '#toggle-sidebar' ).attr( 'aria-hidden' ) == 'false' ? 'true' : 'false');
		$( sidebar_tabbable ).attr( 'tabindex', $( sidebar_tabbable ).attr( 'tabindex' ) == '13' ? '-1' : '13' );
	} );
	
	$( '#menu-close' ).click( function( e ) {
		e.preventDefault();
		$( '#menu-toggle' ).removeClass( 'toggle-on' );
		$( 'body' ).removeClass( 'toggle-open' );
		$( '#toggle-sidebar' ).attr( 'aria-hidden', $( '#toggle-sidebar' ).attr( 'aria-hidden' ) == 'true' ? 'false' : 'true');
		$( sidebar_tabbable ).attr( 'tabindex', $( sidebar_tabbable ).attr( 'tabindex' ) == '-1' ? '13' : '-1' );
	} );
		
	$(window).on( 'load scroll', false, function() {
		var scrolled = $( window ).scrollTop();
		var headerHeight = $( '.site-header-image' ).height();
		var windowWidth = $( window ).width();
	
		if ( scrolled > headerHeight && windowWidth > 960 ) {
			$( '.site-header' ).css(
				{
					'box-shadow' : '0 -20px 30px 30px rgba(0,0,0,.1)',
				}
			);
		}
		else {
			$( '.site-header' ).css(
				{
					'box-shadow' : '0 0 0 transparent',
				}
			);
		}
	} );
	
	$(window).on( 'load', false, function() {


		$("#toggle-sidebar").bind("mousewheel DOMMouseScroll", function(e) {
		
		  var isDesktop, scrollTo;
		  isDesktop = $("#toggle-sidebar").css("position") === "fixed";
		  
		  if ( isDesktop ) {
		  
		    scrollTo = null;
		    if (e.type === "mousewheel") {
		      scrollTo = e.originalEvent.wheelDelta * -1;
		    } else {
		      if (e.type === "DOMMouseScroll") {
		        scrollTo = 40 * e.originalEvent.detail;
		      }
		    }
		    if (scrollTo) {
		      e.preventDefault();
		      return $(this).scrollTop(scrollTo + $(this).scrollTop());
		    }

		  }

		});
		


	} );
});