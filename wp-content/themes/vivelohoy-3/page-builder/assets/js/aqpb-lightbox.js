
(function($) {

    $.fn.lightbox_me = function(options) {

        return this.each(function() {

            var
                opts = $.extend({}, $.fn.lightbox_me.defaults, options),
                $overlay = $(),
                $self = $(this),
                $iframe = $('<iframe id="foo" style="z-index: ' + (opts.zIndex + 1) + ';border: none; margin: 0; padding: 0; position: absolute; width: 100%; height: 100%; top: 0; left: 0; filter: mask();"/>');

			var $currentOverlays = $(".js_lb_overlay:visible");
			if ($currentOverlays.length > 0){
				$overlay = $('<div class="lb_overlay_clear js_lb_overlay"/>');
			} else {
				$overlay = $('<div class="' + opts.classPrefix + '_overlay js_lb_overlay"/>');
			}
            /*----------------------------------------------------
               DOM Building
            ---------------------------------------------------- */
            
            $('body').append($overlay);


            setOverlayHeight(); // pulled this into a function because it is called on window resize.
			$overlay.css({ position: 'absolute', width: '100%', top: 0, left: 0, right: 0, bottom: 0, zIndex: (opts.zIndex + 2), display: 'none' });
			if (!$overlay.hasClass('lb_overlay_clear')){
				$overlay.css(opts.overlayCSS);
			}

          
            $overlay.fadeIn(opts.overlaySpeed, function() {
				setSelfPosition();
				$self[opts.appearEffect](opts.lightboxSpeed, function() { setOverlayHeight(); setSelfPosition()});
			});

            $(window).resize(setOverlayHeight)
                     .resize(setSelfPosition)
                     .scroll(setSelfPosition);
                     
            $self.delegate(opts.closeSelector, "click", function(e) {
                closeLightbox(); e.preventDefault();
				return false;
            });
            $self.bind('close', closeLightbox);
            $self.bind('reposition', setSelfPosition);

            

            /*-------------------------------------------------------------------------------------------------------------------------------------------- */

            /* Remove or hide all elements */
            function closeLightbox() {
                var s = $self[0].style;
                $self.slideUp(opts.lightboxSpeed);
				$overlay.fadeOut(opts.overlaySpeed);
                $iframe.remove();
                $self.undelegate(opts.closeSelector, "click");
                $(window).unbind('reposition', setOverlayHeight);
                $(window).unbind('reposition', setSelfPosition);
                $(window).unbind('scroll', setSelfPosition);
                opts.onClose();
            }

            function setOverlayHeight() {
                if ($(window).height() < $(document).height()) {
                    $overlay.css({height: $(document).height() + 'px'});
                     $iframe.css({height: $(document).height() + 'px'}); 
                } else {
                    $overlay.css({height: '100%'});
                }
            }


            function setSelfPosition() {
				var s = $self[0].style;
                $self.css({left: '50%', marginLeft: ($self.outerWidth() / 2) * -1,  zIndex: (opts.zIndex + 3) });
                if ($self.height() + 80  >= $(window).height()) {
					
                    var topOffset = $(document).scrollTop() + 40;
                    $self.css({position: 'absolute', top: topOffset + 'px', marginTop: 0})
                    
					
                } else if ($self.height()+ 80  < $(window).height()) {
					
					$self.css({ position: 'fixed', top: '50%', marginTop: ($self.outerHeight() / 2) * -1})
                }
            }

        });



    };

    $.fn.lightbox_me.defaults = {

        appearEffect: "slideDown",
        overlaySpeed: 250,
        lightboxSpeed: 300,
        closeSelector: ".popup-close",
        classPrefix: 'lb',
        zIndex: 999,
        modalCSS: {top: '40px'},
        overlayCSS: {background: 'black', opacity: .5}
    }
})(jQuery);