<?php

/**
 *
 * Template Name: Live Streaming Page
 *
 **/

get_header('video');

?>

<!-- Custom Page CSS -->
<style>
.page-template-page-envivo{background: #f5f5f5}
#footer-content{border-top: 1px solid #DBDBDB}
.foro{font-weight: bold; margin: 0 0 10px;}
@media (max-width: 643px) {.entry-title, .enfoque-title {font-size: 1.25em;} .foro{font-size: 1.3em}}
</style>

	<div id="pages" class="content-area">
		<div id="content" class="site-content" role="main">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="entry-content">

					<header class="entry-header" style="text-align:center">
						<div class="entry-meta">

							<?php the_content(); ?>

							<h1 style="font-size: 3.5em; margin: 10px 0 0; font-weight:500">Voto X Voto</h1>
							<h1 class="foro">Foro 2015 con los candidatos a la alcaldía de Chicago</h1>

							<div class="author-cat" style="margin:0">
								En vivo desde el Instituto Cervantes<br>
								Viernes 13 de marzo de 2015 a las 9:30 am
								<?php edit_post_link( __( 'Edit', 'twentythirteen-child' ), '<span class="edit-link"><br>', '</span>' ); ?>
							</div>
						</div>	<!-- .entry-meta -->
					</header><!-- .entry-header -->
					<div class="video-excerpt" style="max-width: 660px; width: 100%; margin: 0 auto;">
						<p>
							Voto X Voto es una iniciativa enfocada en elevar el poder que el voto de
							los individuos puede tener en las comunidades y el potencial de influencia
							que el voto latino puede tener en las elecciones.
						</p>
					</div>

				</div><!-- .entry-content -->


			</article><!-- #post -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>