<?php
/**
 * Template Name: 2014 Imagenes del Año
 *
 */
?>


<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<?php
	// get the current page url (used for rel canonical and open graph tags)
	global $current_url;
	$current_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
?>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-sm.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-med.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-lg.png" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/pswp/photoswipe.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/pswp/default-skin/default-skin.css">

    <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/pswp/photoswipe.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/pswp/photoswipe-ui-default.js"></script>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>

</head>

	<body <?php body_class(); ?> style="height:100%; overflow:hidden; background-color: #000;">
		<?php include_once("analyticstracking.php") ?>








	  	<div class="main-container" style="position: relative; width: 100%;">
	  		<header style="height: 45px; position: fixed; top: 0; width: 100%;">
	  			<div style="height: 45px; width: 100%; position: relative; text-align: left; -webkit-font-smoothing: auto;">
	  				<div style="position: absolute; padding-top: 14px; padding-left: 22px;">
	  					<a href="http://www.vivelohoy.com" style="float: left;"><img width="150px" src="http://www.vivelohoy.com/wp-content/themes/twentythirteen-child/assets/images/hoy_bw.png"></a>
	  					<div style="margin: 0 0 0 10px; padding: 3px 0 0 10px; float: left; font-weight: 400; letter-spacing: 1px; border-left: 1px solid #666; cursor: pointer; color: #999999;"><span>2014</span> Imagenes del Año
	  					</div>
	  				</div>
	  			</div>
	  		</header>


<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe.
         It's a separate element, as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides.
            PhotoSwipe keeps only 3 of them in DOM to save memory.
            Don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                <button class="pswp__button pswp__button--share" title="Share"></button>

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>

        </div>

    </div>

</div>
<script type="text/javascript">
var pswpElement = document.querySelectorAll('.pswp')[0];

var slides = [

    // slide 1
    {

        src: 'http://vagrant.dev/wp-content/themes/twentythirteen-child/assets/pswp/1.jpg', // path to image
        w: 1024, // image width
        h: 768, // image height

      //  msrc: 'path/to/small-image.jpg', // small image placeholder,
                        // main (large) image loads on top of it,
                        // if you skip this parameter - grey rectangle will be displayed,
                        // try to define this property only when small image was loaded before



        title: 'Image Caption'  // used by Default PhotoSwipe UI
                                // if you skip it, there won't be any caption


        // You may add more properties here and use them.
        // For example, demo gallery uses "author" property, which is used in caption.
        // author: 'John Doe'

    },

    // slide 2
    {

        src: 'http://vagrant.dev/wp-content/themes/twentythirteen-child/assets/pswp/1.jpg', // path to image
        w: 1024, // image width
        h: 768, // image height

      //  msrc: 'path/to/small-image.jpg', // small image placeholder,
                        // main (large) image loads on top of it,
                        // if you skip this parameter - grey rectangle will be displayed,
                        // try to define this property only when small image was loaded before



        title: 'Image Caption2'  // used by Default PhotoSwipe UI
                                // if you skip it, there won't be any caption


        // You may add more properties here and use them.
        // For example, demo gallery uses "author" property, which is used in caption.
        // author: 'John Doe'

    },

];

// define options (if needed)
var options = {
    // optionName: 'option value'
    // for example:
    index: 0 // start at first slide
};

// Initializes and opens PhotoSwipe
var gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, slides, options);
gallery.init();
</script>




</div> <!-- main container -->








		<?php render_omniture_tag(); ?>
		<?php wp_footer(); ?>
	</body>
</html>