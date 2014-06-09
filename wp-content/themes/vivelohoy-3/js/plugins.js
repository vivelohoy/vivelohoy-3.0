(function($, doc) {

    "use strict";

    var UI = $.UIkit || {};

    if (UI.fn) {
        return;
    }

    UI.fn = function(command, options) {

        var args = arguments, cmd = command.match(/^([a-z\-]+)(?:\.([a-z]+))?/i), component = cmd[1], method = cmd[2];

        if (!UI[component]) {
            $.error("UIkit component [" + component + "] does not exist.");
            return this;
        }

        return this.each(function() {
            var $this = $(this), data = $this.data(component);
            if (!data) $this.data(component, (data = new UI[component](this, method ? undefined : options)));
            if (method) data[method].apply(data, Array.prototype.slice.call(args, 1));
        });
    };

    UI.version = '1.2.0';

    UI.support = {};
    UI.support.transition = (function() {

        var transitionEnd = (function() {

            var element = doc.body || doc.documentElement,
                transEndEventNames = {
                    WebkitTransition: 'webkitTransitionEnd',
                    MozTransition: 'transitionend',
                    OTransition: 'oTransitionEnd otransitionend',
                    transition: 'transitionend'
                }, name;

            for (name in transEndEventNames) {
                if (element.style[name] !== undefined) {
                    return transEndEventNames[name];
                }
            }

        }());

        return transitionEnd && { end: transitionEnd };

    })();

    UI.support.touch            = (('ontouchstart' in window) || window.DocumentTouch && document instanceof window.DocumentTouch);
    UI.support.mutationobserver = (window.MutationObserver || window.WebKitMutationObserver || window.MozMutationObserver || null);


    UI.Utils = {};

    UI.Utils.debounce = function(func, wait, immediate) {
        var timeout;
        return function() {
            var context = this, args = arguments;
            var later = function() {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            var callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    };

    UI.Utils.options = function(string) {

        if ($.isPlainObject(string)) return string;

        var start = (string ? string.indexOf("{") : -1), options = {};

        if (start != -1) {
            try {
                options = (new Function("", "var json = " + string.substr(start) + "; return JSON.parse(JSON.stringify(json));"))();
            } catch (e) {}
        }

        return options;
    };

    $.UIkit = UI;
    $.fn.uk = UI.fn;

    $.UIkit.langdirection = $("html").attr("dir") == "rtl" ? "right" : "left";

    $(function(){

        $(doc).trigger("prl-domready");

        // Check for dom modifications
        if(!UI.support.mutationobserver) return;

        var observer = new UI.support.mutationobserver(UI.Utils.debounce(function(mutations) {
            $(doc).trigger("prl-domready");
        }, 300));

        // pass in the target node, as well as the observer options
        observer.observe(document.body, { childList: true, subtree: true });
    });

})(jQuery, document);


/* Tab */
;(function($, UI) {

    "use strict";

    var Tab = function(element, options) {

        var $this = this, $element = $(element);

        if($element.data("tab")) return;

        this.element = $element;
        this.options = $.extend({
            connect: false
        }, this.options, options);

        if (this.options.connect) {
            this.connect = $(this.options.connect);
        }

        if (window.location.hash) {
            var active = this.element.children().filter(window.location.hash);

            if (active.length) {
                this.element.children().removeClass('prl-active').filter(active).addClass("prl-active");
            }
        }

        var mobiletab = $('<li class="prl-tab-responsive prl-active"><a href="javascript:void(0);"></a></li>'),
            caption   = mobiletab.find("a:first"),
            dropdown  = $('<div class="prl-dropdown prl-dropdown-small"><ul class="prl-nav prl-nav-dropdown"></ul><div>'),
            ul        = dropdown.find("ul");

        caption.html(this.element.find("li.prl-active:first").find("a").text());

        if (this.element.hasClass("prl-tab-bottom")) dropdown.addClass("prl-dropdown-up");
        if (this.element.hasClass("prl-tab-flip")) dropdown.addClass("prl-dropdown-flip");

        this.element.find("a").each(function(i) {

            var tab  = $(this).parent(),
                item = $('<li><a href="javascript:void(0);">' + tab.text() + '</a></li>').on("click", function(e) {
                    $this.element.data("switcher").show(i);
                });

            if (!$(this).parents(".prl-disabled:first").length) ul.append(item);
        });

        this.element.uk("switcher", {"toggler": ">li:not(.prl-tab-responsive)", "connect": this.options.connect});

        mobiletab.append(dropdown).uk("dropdown", {"mode": "click"});

        this.element.append(mobiletab).data({
            "dropdown": mobiletab.data("dropdown"),
            "mobilecaption": caption
        }).on("uk.switcher.show", function(e, tab) {
            mobiletab.addClass("prl-active");
            caption.html(tab.find("a").text());
        });

        this.element.data("tab", this);
    };

    UI["tab"] = Tab;

    $(document).on("prl-domready", function(e) {

        $("[data-prl-tab]").each(function() {
            var tab = $(this);

            if (!tab.data("tab")) {
                var obj = new Tab(tab, UI.Utils.options(tab.attr("data-prl-tab")));
            }
        });
    });

})(jQuery, jQuery.UIkit);

/* Switcher */
;(function($, UI) {

    "use strict";

    var Switcher = function(element, options) {

        var $this = this, $element = $(element);

        if($element.data("switcher")) return;

        this.options = $.extend({}, this.options, options);

        this.element = $element.on("click", this.options.toggler, function(e) {
            e.preventDefault();
            $this.show(this);
        });

        if (this.options.connect) {

            this.connect = $(this.options.connect).find(".prl-active").removeClass(".prl-active").end();

            var active = this.element.find(this.options.toggler).filter(".prl-active");

            if (active.length) {
                this.show(active);
            }
        }

        this.element.data("switcher", this);
    };

    $.extend(Switcher.prototype, {

        options: {
            connect: false,
            toggler: ">*"
        },

        show: function(tab) {

            tab = isNaN(tab) ? $(tab) : this.element.find(this.options.toggler).eq(tab);

            var active = tab;

            if (active.hasClass("prl-disabled")) return;

            this.element.find(this.options.toggler).filter(".prl-active").removeClass("prl-active");
            active.addClass("prl-active");

            if (this.options.connect && this.connect.length) {

                var index = this.element.find(this.options.toggler).index(active);

                this.connect.children().removeClass("prl-active").eq(index).addClass("prl-active");
            }

            this.element.trigger("uk.switcher.show", [active]);
        }

    });

    UI["switcher"] = Switcher;

    // init code
    $(document).on("prl-domready", function(e) {
        $("[data-prl-switcher]").each(function() {
            var switcher = $(this);

            if (!switcher.data("switcher")) {
                var obj = new Switcher(switcher, UI.Utils.options(switcher.attr("data-prl-switcher")));
            }
        });
    });

})(jQuery, jQuery.UIkit);

/* Dropdown */
;(function($, UI) {

    "use strict";

    var active   = false,
        Dropdown = function(element, options) {

        var $this = this, $element = $(element);

        if($element.data("dropdown")) return;

        this.options  = $.extend({}, this.options, options);
        this.element  = $element;
        this.dropdown = this.element.find(".prl-dropdown");

        this.centered  = this.dropdown.hasClass("prl-dropdown-center");
        this.justified = this.options.justify ? $(this.options.justify) : false;

        this.boundary  = $(this.options.boundary);

        if(!this.boundary.length) {
            this.boundary = $(window);
        }

        if (this.options.mode == "click") {

            this.element.on("click", function(e) {

                if (!$(e.target).parents(".prl-dropdown").length) {
                    e.preventDefault();
                }

                if (active && active[0] != $this.element[0]) {
                    active.removeClass("prl-open");
                }

                if (!$this.element.hasClass("prl-open")) {

                    $this.checkDimensions();

                    $this.element.addClass("prl-open");

                    active = $this.element;

                    $(document).off("click.outer.dropdown");

                    setTimeout(function() {
                        $(document).on("click.outer.dropdown", function(e) {

                            if (active && active[0] == $this.element[0] && ($(e.target).is("a") || !$this.element.find(".prl-dropdown").find(e.target).length)) {
                                active.removeClass("prl-open");

                                $(document).off("click.outer.dropdown");
                            }
                        });
                    }, 10);

                } else {

                    if ($(e.target).is("a") || !$this.element.find(".prl-dropdown").find(e.target).length) {
                        $this.element.removeClass("prl-open");
                        active = false;
                    }
                }
            });

        } else {

            this.element.on("mouseenter", function(e) {

                if ($this.remainIdle) {
                    clearTimeout($this.remainIdle);
                }

                if (active && active[0] != $this.element[0]) {
                    active.removeClass("prl-open");
                }

                $this.checkDimensions();

                $this.element.addClass("prl-open");
                active = $this.element;

            }).on("mouseleave", function() {

                $this.remainIdle = setTimeout(function() {

                    $this.element.removeClass("prl-open");
                    $this.remainIdle = false;

                    if (active && active[0] == $this.element[0]) active = false;

                }, $this.options.remaintime);
            });
        }

        this.element.data("dropdown", this);

    };

    $.extend(Dropdown.prototype, {

        remainIdle: false,

        options: {
            "mode": "hover",
            "remaintime": 800,
            "justify": false,
            "boundary": $(window)
        },

        checkDimensions: function() {

            if(!this.dropdown.length) return;

            var dropdown  = this.dropdown.css("margin-" + $.UIkit.langdirection, "").css("min-width", ""),
                offset    = dropdown.show().offset(),
                width     = dropdown.outerWidth(),
                boundarywidth  = this.boundary.width(),
                boundaryoffset = this.boundary.offset() ? this.boundary.offset().left:0;

            // centered dropdown
            if (this.centered) {
                dropdown.css("margin-" + $.UIkit.langdirection, (parseFloat(width) / 2 - dropdown.parent().width() / 2) * -1);
                offset = dropdown.offset();

                // reset dropdown
                if ((width + offset.left) > boundarywidth || offset.left < 0) {
                    dropdown.css("margin-" + $.UIkit.langdirection, "");
                    offset = dropdown.offset();
                }
            }

            // justify dropdown
            if (this.justified && this.justified.length) {

                var jwidth = this.justified.outerWidth();

                dropdown.css("min-width", jwidth);

                if ($.UIkit.langdirection == 'right') {

                    var right1   = boundarywidth - (this.justified.offset().left + jwidth),
                        right2   = boundarywidth - (dropdown.offset().left + dropdown.outerWidth());

                    dropdown.css("margin-right", right1 - right2);

                } else {
                    dropdown.css("margin-left", this.justified.offset().left - offset.left);
                }

                offset = dropdown.offset();

            }

            if ((width + (offset.left-boundaryoffset)) > boundarywidth) {
                dropdown.addClass("prl-dropdown-flip");
                offset = dropdown.offset();
            }

            if (offset.left < 0) {
                dropdown.addClass("prl-dropdown-stack");
            }

            dropdown.css("display", "");
        }

    });

    UI["dropdown"] = Dropdown;


    var triggerevent = UI.support.touch ? "touchstart":"mouseenter";

    // init code
    $(document).on(triggerevent+".dropdown.uikit", "[data-prl-dropdown]", function(e) {
        var ele = $(this);

        if (!ele.data("dropdown")) {

            var dropdown = new Dropdown(ele, UI.Utils.options(ele.data("prl-dropdown")));

            if(triggerevent == "mouseenter" && dropdown.options.mode == "hover") {
                ele.trigger("mouseenter");
            }
        }
    });

})(jQuery, jQuery.UIkit);

/* Offcanvas */
;(function($, UI) {

    "use strict";

    if (UI.support.touch) {
        $("html").addClass("prl-touch");
    }

    var $win      = $(window),
        $doc      = $(document),
        Offcanvas = {

        show: function(element) {

            element = $(element);

            if (!element.length) return;

            var doc       = $("html"),
                bar       = element.find(".prl-offcanvas-bar:first"),
                dir       = bar.hasClass("prl-offcanvas-bar-flip") ? -1 : 1,
                scrollbar = dir == -1 && $win.width() < window.innerWidth ? (window.innerWidth - $win.width()) : 0;

            scrollpos = {x: window.scrollX, y: window.scrollY};

            element.addClass("prl-active");

            doc.css({"width": window.innerWidth, "height": window.innerHeight}).addClass("prl-offcanvas-page");
            doc.css("margin-left", ((bar.outerWidth() - scrollbar) * dir)).width(); // .width() - force redraw

            bar.addClass("prl-offcanvas-bar-show").width();

            element.off(".ukoffcanvas").on("click.ukoffcanvas swipeRight.ukoffcanvas swipeLeft.ukoffcanvas", function(e) {

                var target = $(e.target);

                if (!e.type.match(/swipe/)) {
                    if (target.hasClass("prl-offcanvas-bar")) return;
                    if (target.parents(".prl-offcanvas-bar:first").length) return;
                }

                e.stopImmediatePropagation();

                Offcanvas.hide();
            });

            $doc.on('keydown.offcanvas', function(e) {
                if (e.keyCode === 27) { // ESC
                    Offcanvas.hide();
                }
            });
        },

        hide: function(force) {

            var doc   = $("html"),
                panel = $(".prl-offcanvas.prl-active"),
                bar   = panel.find(".prl-offcanvas-bar:first");

            if (!panel.length) return;

            if ($.UIkit.support.transition && !force) {


                doc.one($.UIkit.support.transition.end, function() {
                    doc.removeClass("prl-offcanvas-page").attr("style", "");
                    panel.removeClass("prl-active");
                    window.scrollTo(scrollpos.x, scrollpos.y);
                }).css("margin-left", "");

                setTimeout(function(){
                    bar.removeClass("prl-offcanvas-bar-show");
                }, 50);

            } else {
                doc.removeClass("prl-offcanvas-page").attr("style", "");
                panel.removeClass("prl-active");
                bar.removeClass("prl-offcanvas-bar-show");
                window.scrollTo(scrollpos.x, scrollpos.y);
            }

            panel.off(".ukoffcanvas");
            $doc.off(".ukoffcanvas");
        }

    }, scrollpos;


    var OffcanvasTrigger = function(element, options) {

        var $this    = this,
            $element = $(element);

        if($element.data("offcanvas")) return;

        this.options = $.extend({
            "target": $element.is("a") ? $element.attr("href") : false
        }, options);

        this.element = $element;

        $element.on("click", function(e) {
            e.preventDefault();
            Offcanvas.show($this.options.target);
        });

        this.element.data("offcanvas", this);
    };

    OffcanvasTrigger.offcanvas = Offcanvas;

    UI["offcanvas"] = OffcanvasTrigger;


    // init code
    $doc.on("click.offcanvas.uikit", "[data-prl-offcanvas]", function(e) {

        e.preventDefault();

        var ele = $(this);

        if (!ele.data("offcanvas")) {
            var obj = new OffcanvasTrigger(ele, UI.Utils.options(ele.attr("data-prl-offcanvas")));
            ele.trigger("click");
        }
    });

})(jQuery, jQuery.UIkit);

/* Accordion */
;(function($) {
	"use strict";

	$.fn.jAccordion = function() {
	 var $this = $(this);
	 
		$this.find("section").each(function(idx) {
			var section = $(this);
			if(idx === 0) section.addClass('active').find('div.acc-content').slideDown();
			section.find('a.head').on("click", function(){
				var handle = $(this);
					handle.parent().toggleClass('active');
					
					if(handle.parent().hasClass('active')){
						handle.next('div.acc-content').slideDown();
					}else{
						handle.next('div.acc-content').slideUp();	
					}
				
				return false;
			});
				
		});
	};
})(jQuery);

/* Flickr */
;(function($){$.fn.jflickrfeed=function(settings,callback){settings=$.extend(true,{flickrbase:'http://api.flickr.com/services/feeds/',feedapi:'photos_public.gne',limit:20,qstrings:{lang:'en-us',format:'json',jsoncallback:'?'},cleanDescription:true,useTemplate:true,itemTemplate:'',itemCallback:function(){}},settings);var url=settings.flickrbase+settings.feedapi+'?';var first=true;for(var key in settings.qstrings){if(!first)
url+='&';url+=key+'='+settings.qstrings[key];first=false;}
return $(this).each(function(){var $container=$(this);var container=this;$.getJSON(url,function(data){$.each(data.items,function(i,item){if(i<settings.limit){if(settings.cleanDescription){var regex=/<p>(.*?)<\/p>/g;var input=item.description;if(regex.test(input)){item.description=input.match(regex)[2]
if(item.description!=undefined)
item.description=item.description.replace('<p>','').replace('</p>','');}}
item['image_s']=item.media.m.replace('_m','_s');item['image_t']=item.media.m.replace('_m','_t');item['image_m']=item.media.m.replace('_m','_m');item['image']=item.media.m.replace('_m','');item['image_b']=item.media.m.replace('_m','_b');delete item.media;if(settings.useTemplate){var template=settings.itemTemplate;for(var key in item){var rgx=new RegExp('{{'+key+'}}','g');template=template.replace(rgx,item[key]);}
$container.append(template)}
settings.itemCallback.call(container,item);}});if($.isFunction(callback)){callback.call(container,data);}});});}})(jQuery);

/* Instagram */
(function(a){a.fn.jqinstapics=function(b){var c={user_id:null,access_token:null,count:10};var d=a.extend(c,b);return this.each(function(){var b=a(this),c="https://api.instagram.com/v1/users/"+d.user_id+"/media/recent?access_token="+d.access_token+"&count="+d.count+"&callback=?";a.getJSON(c,function(c){a.each(c.data,function(c,d){var e=a("<a/>",{href:d.link,target:"_blank"}).appendTo(b),f=a("<img/>",{src:d.images.thumbnail.url}).appendTo(e);if(d.caption){f.attr("title",d.caption.text)}})});if(d.user_id==null||d.access_token==null){b.append("<li>Please specify a User ID and Access Token, as outlined in the docs.</li>")}})}})(jQuery);


/* fitVids */
(function( $ ){

  "use strict";

  $.fn.fitVids = function( options ) {
    var settings = {
      customSelector: null
    };

    if(!document.getElementById('fit-vids-style')) {

      var div = document.createElement('div'),
          ref = document.getElementsByTagName('base')[0] || document.getElementsByTagName('script')[0],
          cssStyles = '&shy;<style>.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}</style>';

      div.className = 'fit-vids-style';
      div.id = 'fit-vids-style';
      div.style.display = 'none';
      div.innerHTML = cssStyles;

      ref.parentNode.insertBefore(div,ref);

    }

    if ( options ) {
      $.extend( settings, options );
    }

    return this.each(function(){
      var selectors = [
        "iframe[src*='player.vimeo.com']",
        "iframe[src*='youtube.com']",
        "iframe[src*='youtube-nocookie.com']",
        "iframe[src*='kickstarter.com'][src*='video.html']",
        "object",
        "embed"
      ];

      if (settings.customSelector) {
        selectors.push(settings.customSelector);
      }

      var $allVideos = $(this).find(selectors.join(','));
      $allVideos = $allVideos.not("object object"); // SwfObj conflict patch

      $allVideos.each(function(){
        var $this = $(this);
        if (this.tagName.toLowerCase() === 'embed' && $this.parent('object').length || $this.parent('.fluid-width-video-wrapper').length) { return; }
        var height = ( this.tagName.toLowerCase() === 'object' || ($this.attr('height') && !isNaN(parseInt($this.attr('height'), 10))) ) ? parseInt($this.attr('height'), 10) : $this.height(),
            width = !isNaN(parseInt($this.attr('width'), 10)) ? parseInt($this.attr('width'), 10) : $this.width(),
            aspectRatio = height / width;
        if(!$this.attr('id')){
          var videoID = 'fitvid' + Math.floor(Math.random()*999999);
          $this.attr('id', videoID);
        }
        $this.wrap('<div class="fluid-width-video-wrapper"></div>').parent('.fluid-width-video-wrapper').css('padding-top', (aspectRatio * 100)+"%");
        $this.removeAttr('height').removeAttr('width');
      });
    });
  };
// Works with either jQuery or Zepto
})( window.jQuery || window.Zepto );

