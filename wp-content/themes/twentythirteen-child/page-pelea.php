<?php
/**
 * Template Name: Pelea Quiz
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
  <?php
    // get the current page url (used for rel canonical and open graph tags)
    global $current_url;
    $current_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
  ?>
<!--<![endif]-->
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="El estadounidense Floyd Mayweather Jr. y el filipino Manny Pacquiao se enfrentan por el t&iacute;tulo welter el 2 de mayo."/>
    <link rel="canonical" href="<?php echo $current_url; ?>" />
    <meta property="og:locale" content="es_ES" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="¿Qué tanto sabes de Mayweather-Pacquiao?, ¡atrévete a contestar!" />
    <meta property="og:description" content="El estadounidense Floyd Mayweather Jr. y el filipino Manny Pacquiao se enfrentan por el t&iacute;tulo welter el 2 de mayo." />
    <meta property="og:url" content="<?php echo $current_url; ?>" />
    <meta property="og:site_name" content="Vivelohoy" />
    <meta property="fb:admins" content="15104679" />
    <meta property="og:image" content="http://vivelohoy.com/wp-content/uploads/2015/04/pelea.png" />
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:description" content="El estadounidense Floyd Mayweather Jr. y el filipino Manny Pacquiao se enfrentan por el t&iacute;tulo welter el 2 de mayo."/>
    <meta name="twitter:title" content="¿Qué tanto sabes de Mayweather-Pacquiao?, ¡atrévete a contestar!"/>
    <meta name="twitter:site" content="@vivelohoy"/>
    <meta name="twitter:domain" content="Vivelohoy"/>
    <meta name="twitter:image:src" content="http://vivelohoy.com/wp-content/uploads/2015/04/pelea.png"/>
    <meta name="twitter:creator" content="@luciovilla"/>

    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
      <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico" type="image/x-icon" />
      <link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-sm.png" />
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-med.png" />
      <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-lg.png" />
      <link rel="stylesheet" href="http://vivelohoy.com/wp-content/themes/twentythirteen-child/css/pelea.css">
      <script type='text/javascript' src='http://vivelohoy.com/wp-includes/js/jquery/jquery.js?ver=1.11.1'></script>
      <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
    <![endif]-->
    <?php include_once("analyticstracking.php") ?>
    <?php
          $facebook_share_link = "https://www.facebook.com/sharer/sharer.php?u=";
          $facebook_share_link .= urlencode(get_permalink());
        ?>

  </head>
  <body <?php body_class(); ?> style="background: url(http://www.vivelohoy.com/wp-content/uploads/2015/04/bg3.jpg) no-repeat center center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; position: relative; height: 100%;">

    <div id="social-media-top">
      <ul>
        <li>
          <a class="fb-share" href="<?php echo $facebook_share_link; ?>" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" style="height: 2.4em;">
              <circle cx="8" cy="8" r="8" class="shape-1"></circle>
              <path fill="#fff" d="M8.5 3.7h1.4v1.6h-1c-.2 0-.4.1-.4.4v.9h1.4l-.1 1.7h-1.3v4.5h-1.9v-4.5h-.9v-1.7h.9v-1c0-.7.4-1.9 1.9-1.9z" class="shape-2"></path>
              <foreignObject width="200" height="100"><text><tspan style="color:#414141; margin-right: 20px; margin-left: 15px;" '=""> </tspan></text></foreignObject></svg></a></li><li><a class="twitter-share-link" href="" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" style="height: 2.4em;"><circle cx="8" cy="8" r="8" class="shape-1"></circle><path fill="#fff" d="M4 4.8c1 1.2 2.5 2 4.2 2.1l-.1-.4c0-1.1.9-2 2-2 .6 0 1.1.3 1.5.6.5-.1.9-.3 1.3-.5-.2.4-.5.8-.9 1.1l1.2-.3c-.3.4-.6.8-1 1.1v.3c0 2.7-2 5.8-5.8 5.8-1.1 0-2.2-.3-3.1-.9h.5c.9 0 1.8-.3 2.5-.9-.9 0-1.6-.6-1.9-1.4h.4c.2 0 .4 0 .5-.1-.9-.2-1.6-1-1.6-2 .3.2.6.2.9.3-.6-.5-.9-1.1-.9-1.8 0-.4.1-.7.3-1z" class="shape-2"></path><foreignObject width="200" height="100"><text><tspan style="color:#414141; margin-right: 20px;" '="">Twitter</tspan></text></foreignObject>
            </svg>
          </a>
        </li>
      </ul>
    </div>

    <div>
      <div style="text-align:center; position:relative">
        <h1>EL COMBATE</h1>
        <h2>DEL SIGLO</h2>
        <div class="description">
          <p class="intro-p">El estadounidense Floyd Mayweather Jr. y el filipino Manny Pacquiao se enfrentan por el t&iacute;tulo welter el 2 de mayo en el MGM Grand Casino/Hotel de Las Vegas.</p>
          <p class="pregunta" style="margin-top:0;font-size:20px">
            &iquest;Cu&aacute;nto sabes de los contendientes?<br>
          </p>
           <a class="btn" href="#quiz">&iexcl;Participa!</a>
        </div>
        <div id="boxers">
          <img class="boxer1_hidden" src="http://vivelohoy.com/wp-content/uploads/2015/04/money.png">
          <img class="boxer2_hidden" src="http://vivelohoy.com/wp-content/uploads/2015/04/pacman.png">
        </div>
      </div>
      <div id="quiz">
        <div class='quiz-container'></div>
        <script type='text/javascript'>
          var input = [{"description":"","question":"&iquest;Qui&eacute;n tiene mayor edad?","a":"Mayweather","b":"Pacquiao","answer":"Mayweather","incorrect":"004d0061007900770065006100740068006500720020007400690065006e00650020003300380020006100f1006f00730020007900200050006100630071007500690061006f0020007400690065006e0065002000330036","correct":"004d0061007900770065006100740068006500720020007400690065006e00650020003300380020006100f1006f00730020007900200050006100630071007500690061006f0020007400690065006e00650020003300360020006100f1006f0073","hint":"","rowNumber":1},{"description":"","question":"&iquest;Qui&eacute;n es m&aacute;s alto?","a":"Mayweather","b":"Pacquiao","answer":"Mayweather","incorrect":"004d006100790077006500610074006800650072003a00200031002e00370033006d003c00620072003e0050006100630071007500690061006f003a00200031002e00360039006d","correct":"004d006100790077006500610074006800650072003a00200031002e00370033006d003c00620072003e0050006100630071007500690061006f003a00200031002e00360039006d","hint":"","rowNumber":2},{"description":"","question":"&iquest;Qui&eacute;n tiene mayor alcance?","a":"Mayweather","b":"Pacquiao","answer":"Mayweather","incorrect":"004d006100790077006500610074006800650072003a00200031002e003800330063006d003c00620072003e0050006100630071007500690061006f003a00200031002e00370063006d","correct":"004d006100790077006500610074006800650072003a00200031002e003800330063006d003c00620072003e0050006100630071007500690061006f003a00200031002e00370063006d","hint":"","rowNumber":3},{"description":"","question":"&iquest;Qui&eacute;n tiene m&aacute;s victorias?","a":"Mayweather","b":"Pacquiao","answer":"Pacquiao","incorrect":"004d006100790077006500610074006800650072003a002000340037003c00620072003e0050006100630071007500690061006f003a002000350037","correct":"004d006100790077006500610074006800650072003a002000340037003c00620072003e0050006100630071007500690061006f003a002000350038","hint":"","rowNumber":4},{"description":"","question":"&iquest;Qui&eacute;n tiene m&aacute;s derrotas?","a":"Mayweather","b":"Pacquiao","answer":"Pacquiao","incorrect":"004d006100790077006500610074006800650072003a00200030003c00620072003e0050006100630071007500690061006f003a00200035","correct":"004d006100790077006500610074006800650072003a00200030003c00620072003e0050006100630071007500690061006f003a00200036","hint":"","rowNumber":5},{"description":"","question":"&iquest;Qui&eacute;n tiene m&aacute;s KO's?","a":"Mayweather","b":"Pacquiao","answer":"Pacquiao","incorrect":"004d006100790077006500610074006800650072003a002000320036003c00620072003e0050006100630071007500690061006f003a002000330038","correct":"004d006100790077006500610074006800650072003a002000320036003c00620072003e0050006100630071007500690061006f003a002000330039","hint":"","rowNumber":6},{"description":"","question":"&iquest;Qui&eacute;n tiene m&aacute;s empates?","a":"Mayweather","b":"Pacquiao","answer":"Pacquiao","incorrect":"004d006100790077006500610074006800650072003a00200030003c00620072003e0050006100630071007500690061006f003a00200032","correct":"004d006100790077006500610074006800650072003a00200030003c00620072003e0050006100630071007500690061006f003a00200033","hint":"","rowNumber":7}];
          var pub = 'hoy';
        </script>
        <script src='http://vivelohoy.com/wp-content/themes/twentythirteen-child/js/pelea.js'></script>
      </div>
      <div style="  width: 300px; margin: 0 auto;">
        <img src="http://tribuneinteractive.com/creative/ads/newspaper/CHI/Cardinal_Warehouse_Wine_and_Liquors/043015/CHI_529975_300x250_Cardinal_Warehouse_Wine_and_Liquors_043015_v3.gif">
      </div>
    </div>

    <!-- scripts -->
    <script>
      (function($) {
        $(function(){
          $(".boxer1_hidden").addClass("boxer1_active");
          $(".boxer2_hidden").addClass("boxer2_active");
        });
      })(jQuery);
    </script>
    <script>
      (function($) {
        $('a[href^="#btn"]').on('click', function(event) {
            var target = $(this.href);
            if( target.length ) {
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000);
            }
        });
      })(jQuery);
      </script>
      <script>
        (function($) {
          $('a').click(function(){
            $('html, body').animate({
              scrollTop: $( $(this).attr('href') ).offset().top
              }, 500);
            return false;
          });
        })(jQuery);
      </script>
      <script>
        (function($) {
          $(document).ready(function() {
            var text = "¿Cuánto sabes de Mayweather y Pacquiao? Inténtalo en esta trivia";
            var url = window.location;
          $('.twitter-share-link').attr('href', 'http://twitter.com/intent/tweet?text=' + text + '&url=' + url + '&hashtags=' + "mayweatherpacquiao");
          });
        })(jQuery);
      </script>

    <?php render_omniture_tag(); ?>

  </body>
</html>
