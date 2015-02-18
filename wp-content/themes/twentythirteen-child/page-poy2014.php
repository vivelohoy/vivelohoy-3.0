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
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-sm.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-med.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-lg.png" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/pswp/photoswipe.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/pswp/default-skin/default-skin.css">

    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/poy2014.css">
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/pswp/photoswipe.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/pswp/photoswipe-ui-default.js"></script>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>

</head>

	<body <?php body_class(); ?>>
		<?php include_once("analyticstracking.php") ?>

	  	<div class="main-container">
	  		<header class="poy-header">
	  			<div class="poy-head-inner">
	  				<div class="poy-logo">
	  					<a href="http://www.vivelohoy.com"><img src="http://www.vivelohoy.com/wp-content/themes/twentythirteen-child/assets/images/hoy_bw.png"></a>

                        <div class="poy-share"><span style="padding-top: 8px; display: inline-block">COMPÁRTELO:</span>
                            <?php
                                $facebook_share_link = "https://www.facebook.com/sharer/sharer.php?u=";
                                $facebook_share_link .= urlencode(get_permalink());
                            ?>
                            <a style="border-bottom:none !important" class="twitter-share-link" href="" target="_blank">
                                <span class="genericon genericon-twitter" style="color: #55acee; margin: 0; width: 35px"></span>
                            </a>
                            <a style="border-bottom:none !important" href="<?php echo $facebook_share_link; ?>" style="padding-right:15px" target="_blank">
                                <span class="genericon genericon-facebook" style="margin-right: 0; color:#3b5998; width: 35px"></span>
                            </a>
                        </div>

                    </div>

	  			</div>
	  		</header>


            <div id="starterimage">
                <div class="poy-main-image">
                    <div class="poy-title"><span>2014:</span> NOTICIAS DEL AÑO EN CHICAGO<br>
                        <button class="poy-but">VER GALERÍA</button>
                    </div>
                </div>
            </div>

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
                                <div>
                                    <div class="poy-logo pswp-logo">
                                        <a href="http://www.vivelohoy.com"><img src="http://www.vivelohoy.com/wp-content/themes/twentythirteen-child/assets/images/hoy_bw.png"></a>
                                    </div>
                                    <div class="pswp-title">
                                        <span>2014:</span> NOTICIAS DEL AÑO EN CHICAGO
                                    </div>
                                </div>


                            <!--  Controls are self-explanatory. Order can be changed. -->

                            <div class="pswp__counter"></div>

                            <button class="pswp__button pswp__button--close" title="Cerrar (Esc)" style="position: fixed; right: 0; top: 0;"></button>

                            <button class="pswp__button pswp__button--share" title="Compartir" style="position: fixed; right: 30px; top: 0;"></button>

                            <button class="pswp__button pswp__button--fs" title="Pantalla Completa" style="position: fixed; right: 60px; top: 0;"></button>

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

                        <button class="pswp__button pswp__button--arrow--left" title="Anterior (flecha izquierda)">
                        </button>

                        <button class="pswp__button pswp__button--arrow--right" title="Siguiente (flecha derecha)">
                        </button>

                        <div class="pswp__caption">
                            <div class="pswp__caption__center"></div>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">

        var OpenPOY2014 = function() {
            var pswpElement = document.querySelectorAll('.pswp')[0];

            var slides = [

                {

                    src: 'http://www.vivelohoy.com/wp-content/uploads/2014/12/12.jpg', // path to image
                    w: 1024, // image width
                    h: 768, // image height
                    title: 'Enero —Los archivos secretos de sacerdotes pederastas— El 21 de enero, tras un acuerdo extrajudicial, la arquidiócesis de Chicago entregó 6,000 páginas de archivos de sacerdotes pederastas, que muestran cómo esa institución religiosa silenciosamente transfirió de parroquia en parroquia a los sacerdotes acusados, y no notificó las denuncias de abusos a niños a las autoridades. Joe Iacono, víctima de abuso sexual de un sacerdote, no pudo contener el llanto, durante una conferencia de prensa.',
                    author: 'ANTONIO PÉREZ/CHICAGO TRIBUNE'

                },

                {

                    src: 'http://www.vivelohoy.com/wp-content/uploads/2014/12/11.jpg', // path to image
                    w: 1024, // image width
                    h: 768, // image height
                    title: 'Febrero —Armas— El 28 de febrero fueron puestas en el correo las primeras 5,000 licencias que le permite a sus propietarios portar armas ocultas en lugares públicos en Illinois. En la foto, un prototipo de las licencias.',
                    author: 'ANTONIO PÉREZ/CHICAGO TRIBUNE'

                },

                {

                    src: 'http://www.vivelohoy.com/wp-content/uploads/2014/12/5.jpeg', // path to image
                    w: 1024, // image width
                    h: 768, // image height
                    title: "Marzo —Descarrila tren— Más de 30 personas resultaron heridas el 24 de marzo cuando un tren de la Línea Azul de la CTA se descarriló y se subió a una escalera eléctrica dentro de la estación O'Hare la operadora se quedó dormida.",
                    author: 'Jose M. Osorio/ Chicago Tribune'

                },

                {

                    src: 'http://www.vivelohoy.com/wp-content/uploads/2014/12/41.jpg', // path to image
                    w: 1024, // image width
                    h: 768, // image height
                    title: 'Abril —Prohibidas bolsa de plástico—Chicago aprobó el 30 de abril la prohibición parcial de uso de bolsas de plástico en almacenes y tiendas de autoservicio. Nueve de cada 10 establecimientos dejarán de usarlas a finales de 2016.',
                    author: 'PHIL VELÁSQUEZ/CHICAGO TRIBUNE'

                },

                {

                    src: 'http://www.vivelohoy.com/wp-content/uploads/2014/12/71.jpg', // path to image
                    w: 1024, // image width
                    h: 768, // image height
                    title: 'Mayo —Sentencia por golpiza— Heriberto Viramontes, un reconocido pandillero del oeste de Chicago fue sentenciado el 22 de mayo a 90 años en prisión por la brutal golpiza que le propinó con un bate de béisbol a Natasha McShane, una estudiante de intercambio de Irlanda del Norte y a una amiga de la joven. Sheila McShane (al centro), madre de Natasha, vino desde Irlanda a la audiencia de sentencia; su hija ahora necesitará asistencia de por vida.',
                    author: 'TERRENCE A. JAMES/CHICAGO TRIBUNE'

                },

                {

                    src: 'http://www.vivelohoy.com/wp-content/uploads/2014/12/81.jpg', // path to image
                    w: 1024, // image width
                    h: 768, // image height
                    title: 'Junio —Matrimonios del mismo sexo— Las parejas del mismo sexo en Illinois pueden casarse desde el 1 de junio, cuando entró en vigencia la ley en el estado. Victor Olvera (derecha), y su esposo Eric Lewis, al concluir la ceremonia de su boda en Chicago.',
                    author: 'JOSÉ M. OSORIO/CHICAGO TRIBUNE'

                },
                {

                    src: 'http://www.vivelohoy.com/wp-content/uploads/2014/12/14.jpg', // path to image
                    w: 1024, // image width
                    h: 768, // image height
                    title: 'Julio —Violencia, 82 tiroteos— El fin de semana del feriado del 4 de julio fue uno de los más violentos en la ciudad. Se registraron 82 tiroteos, 14 personas murieron. Escenario de un tiroteo.',
                    author: 'E. JASON WAMBSGANS/CHICAGO TRIBUNE'

                },

                {

                    src: 'http://www.vivelohoy.com/wp-content/uploads/2014/12/91.jpg', // path to image
                    w: 1024, // image width
                    h: 768, // image height
                    title: 'Agosto —James Foley decapitado en Siria— El periodista James Foley, graduado de la Universidad Northwestern, en Evanston; y quien vivía en Pilsen, fue decapitado por militantes del Estado islámico en Siria el 19 de agosto. En octubre sus amigos del barrio le dedicaron un mural.',
                    author: 'SAMUEL VEGA/HOY'

                },
                {

                    src: 'http://www.vivelohoy.com/wp-content/uploads/2014/12/31.jpg', // path to image
                    w: 1024, // image width
                    h: 768, // image height
                    title: 'Agosto —Acusada de matar a su madre— Heather Mack, de 18 años, y su novio Tommy Schaefer, fueron detenidos como sospechosos de la muerte de la madre de Mack, Sheila von Wiese-Mack, de 62 años, y residente de Chicago, cuyo cuerpo golpeado fue encontrado en una maleta en un taxi, afuera de un lujoso hotel en Bali.',
                    author: 'GETTY'

                },

                {

                    src: 'http://www.vivelohoy.com/wp-content/uploads/2014/12/111.jpg', // path to image
                    w: 1024, // image width
                    h: 768, // image height
                    title: 'Septiembre —Sentencia por homicidio imprudente— El 17 de septiembre Carly Rousso fue sentenciada a 5 años de prisión por el homicidio imprudente de la niña Jaclyn Santos Sacramento, de 5 años. Rousso atropelló a la menor, a su madre y dos hermanitos en septiembre de 2012, mientras conducía en Highland Park bajo los efectos de un producto químico.',
                    author: 'ANTHONY SOUFFLE/CHICAGO TRIBUNE'

                },
                {

                    src: 'http://www.vivelohoy.com/wp-content/uploads/2014/12/21.jpg', // path to image
                    w: 1024, // image width
                    h: 768, // image height
                    title: 'Octubre —¿Asesino en serie?— El 19 de octubre la Policía de Hammond dijo que Darren Deon Vann confesó haber matado a siete mujeres y los llevó a viviendas abandonadas donde encontraron algunos de los cuerpos, ésta es una de ellas.',
                    author: 'MICHAEL TERCHA/CHICAGO TRIBUNE'

                },

                {

                    src: 'http://www.vivelohoy.com/wp-content/uploads/2014/12/10.jpg', // path to image
                    w: 1024, // image width
                    h: 768, // image height
                    title: 'Noviembre —Rauner vence a Quinn— El 4 de noviembre el republicano Bruce Rauner venció al gobernador demócrata de Illinois, Pat Quinn, quien buscaba la reelección. Rauner al declarar su triunfo.',
                    author: 'BRIAN CASSELLA/CHICAGO TRIBUNE'

                },
                {

                    src: 'http://www.vivelohoy.com/wp-content/uploads/2014/12/61.jpg', // path to image
                    w: 1024, // image width
                    h: 768, // image height
                    title: 'Noviembre —Asume nuevo arzobispo— Blase Cupich (izquierda) se convirtió en arzobispo de Chicago el 18 de noviembre, reemplazó al cardenal Francis George (derecha), quien se retiró en medio de una batalla contra el cáncer.',
                    author: ' ANTONIO PÉREZ/CHICAGO TRIBUNE'

                },
                {

                    src: 'http://www.vivelohoy.com/wp-content/uploads/2014/12/13.jpg', // path to image
                    w: 1024, // image width
                    h: 768, // image height
                    title: 'Diciembre —Incremento al salario mínimo— El 2 de diciembre se aprobó subir gradualmente el salario mínimo en Chicago, de $8.25 por hora a $13 por hora para mediados del 2019. El primer aumento gradual será a $10 por hora, en julio de 2015. Una iniciativa impulsada por el alcalde Rahm Emanuel.',
                    author: 'NANCY STONE/CHICAGO TRIBUNE'

                },

            ];

            // define options (if needed)
            var options = {
                index: 0,
                addCaptionHTMLFn: function(item, captionEl, isFake) {
                    if(!item.title) {
                        captionEl.children[0].innerText = '';
                        return false;
                    }
                    captionEl.children[0].innerHTML = item.title +  '<br/><small>Foto por: ' + item.author + '</small>';
                    return true;
                }
            };

            // Initializes and opens PhotoSwipe
            var gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, slides, options);

            // We're going to trigger a page view in analytics for each image view
            // Triggering on the afterChange event means we won't know what image is being viewed,
            // and images potentially will be counted more than once, but it seems more accurate an
            // event than beforeChange. The event imageLoadComplete seems like it would be ideal
            // but it fires immediately for all images when the gallery loads initially.
            // http://photoswipe.com/documentation/api.html
            gallery.listen('afterChange', function() {
                increment_pageview_for_photo('poy2014');
            }); gallery.init();
        };

            document.getElementById('starterimage').addEventListener("click", function() {
                OpenPOY2014();
            });
            </script>



        </div> <!-- main container -->








		<?php render_omniture_tag(); ?>
		<?php wp_footer(); ?>
	</body>
</html>