<?php

/**
 *
 * Template Name: Newsletter Sign-Up
 *
 **/

get_header('video');
?>
<div id="pages" class="content-area">

  <div id="page-container">

    <div id="screenshot">
        <img class="home-screen" src="http://www.vivelohoy.com/wp-content/themes/twentythirteen-child/assets/encasa/news.png">
    </div>


    <div id="callout">
        <div>
             <h1 class="callout-text">Suscríbase a nuestro comunicado por correo electrónico para enterarse de las noticias de la semana</h1>
        </div>
        <div class="email-form">
            <form method="post" action="http://sailthru.vivelohoy.com/s/Noticias+de+la+semana">
                <label for="name">Nombre:</label><br>
                <input type="text" name="name" /><br><br>
                <label for="email">Correo Electrónico:</label><br>
                <input type="hidden" name="redirect" value="http://www.vivelohoy.com"/>
                <input type="hidden" name="template" value="Welcome Series 1" />
                <input type="text" name="email" />
                <br/><br/>
                <input type="submit" value="Suscribir" />
            </form>
        </div>
    </div>
  </div><!-- #page-container -->
</div><!-- #pages -->

<style>
#page {
    background: none !important;
}
#bottom-leaderboard {
    border: none !important;
}
input[type="submit"], input[type="submit"]:focus, input[type="submit"]:active {
background: #e05d22;
    background: -webkit-linear-gradient(top, #EE3426 0%, #FF3627 100%);
    background: linear-gradient(to bottom, #EE3426 0%, #FF3627 100%);
    border: none;
    border-bottom: none;
    border-radius: 2px;
    color: #fff;
    display: inline-block;
    padding: 11px 24px 10px;
    text-decoration: none;
}
input[type="submit"]:hover { background: linear-gradient(to bottom, rgb(238, 52, 38) 0%, rgba(255, 54, 39, 0.49) 100%);

}
.video-hoy-logo{
    float: left !important;
}
#pages{
    margin: 0;
    padding: 60px 0 0;
}
#page-container{
    padding: 60px;
    display: inline-block;
}
#screenshot{
    width: 48%;
    float: left;
    padding: 0 30px;
}
.home-screen{
    width: 100%;
    border: 1px solid #f5f5f5;
    -webkit-box-shadow: 10px 10px 5px 0px rgba(209,209,209,1);
    -moz-box-shadow: 10px 10px 5px 0px rgba(209,209,209,1);
    box-shadow: 10px 10px 5px 0px rgba(209,209,209,1);
}
#callout{
    display: inline-block;
    width: 100%;
    float: left;
    padding: 0 20px;
    max-width: 560px;
}
.callout-text{
    color: #333;
    font-size: 30px;
    margin: 0 0 30px;
    font-weight: 400;
}
@media (max-width: 990px){
    .callout-text{
        font-size: 1.4em;
    }
    #callout{
        width:57%
    }
    #screenshot{
        width:43%
    }
    #page-container{
        padding: 60px 10px
    }
}

@media (max-width: 816px){
    #page-container {
        padding: 30px 10px 60px;
    }
    #screenshot{
        float: none;
        width: 100%;
        text-align: center;
    }
    .home-screen{
        width: 300px;
    }
    #callout{
        margin-top: 30px;
        float: none;
        width: 100%;
    }
    .callout-text{
        font-size: 1.1em;
    }
    .home-screen {
        width: 230px;
    }
}

</style>

<div>
<?php global $ADS_ENABLED; if ( $ADS_ENABLED ) : ?>
            <!-- BOTTOM LEADERBOARD AD -->
            <?php if ( 'gallery' !== get_post_format() ) : // Anything but a gallery post type ?>
                <div id="bottom-leaderboard" style="clear:both" class="adslot leaderboard" data-width="728" data-height="90" data-pos="3"></div>
            <?php endif; // get_post_format() ?>
            <!-- BOTTOM LEADERBOARD AD -->
<?php endif; // End if ( $ADS_ENABLED ) ?>
</div>

<?php get_footer(); ?>
