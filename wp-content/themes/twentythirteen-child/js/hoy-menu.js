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


	// The search bar
    var isSearchHover = false;
    $(document).click(function(){
        if(!isSearchHover) $('#search-icon form').fadeOut(250);
    });

    $(document)
        .on('click','#search-icon-icon', function(){
            var $$ = $(this).parent();
            $$.find('form').fadeToggle(250);
            setTimeout(function(){
                $$.find('input[name=s]').focus();
            }, 300);
        } );

    $(document)
        .on('mouseenter', '#search-icon', function(){
            isSearchHover = true;
        } )
        .on('mouseleave', '#search-icon', function(){
            isSearchHover = false;
        } );

    $(window).resize(function() {
        $('#search-icon .searchform').each(function(){
            $(this).width($(this).closest('.full-container').width());
        });
    }).resize();
    
	
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