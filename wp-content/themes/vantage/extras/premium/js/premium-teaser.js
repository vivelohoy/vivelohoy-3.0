/**
 * (c) Greg Priday, freely distributable under the terms of the GPL 2.0 license.
 */

jQuery(function($){
    // Show and hide the teaser images
    $('.siteorigin-premium-teaser' ).has('.teaser-image')
        .mouseenter(function(){
            var $$ = $(this).find('.teaser-image' );
            if( $$.is(':hover') ) return;
            $$.fadeIn(100);
        })
        .mouseleave(function(){
            $(this ).find('.teaser-image' ).clearQueue().fadeOut(100);
        })
        
    
})