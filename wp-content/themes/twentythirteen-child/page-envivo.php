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
@media (max-width: 643px) {.entry-title, .enfoque-title {font-size: 1.25em;}}
</style>

	<div id="pages" class="content-area">
		<div id="content" class="site-content" role="main">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="entry-content">

					<header class="entry-header" style="text-align:center">
						<div class="entry-meta">

							<?php the_content(); ?>

							<h1 class="entry-title">Voto X Voto: 2015 Mayoral Candidate Forum</h1>

							<div class="author-cat" style="margin:0">
								March 13, 2015 9:30 a.m. <br>
								Live from Instituto Cervantes
								<?php edit_post_link( __( 'Edit', 'twentythirteen-child' ), '<span class="edit-link"><br>', '</span>' ); ?>
							</div>
						</div>	<!-- .entry-meta -->
					</header><!-- .entry-header -->
					<div class="video-excerpt" style="max-width: 660px; width: 100%; margin: 0 auto;">
						<p>
							Voto X Voto-or Vote by Vote-is a voter-engagement initiative that focuses
							on the exponential power an individual vote can have on communities and the
							potential influence Latino voters could have on elections.
						</p>
					</div>

				</div><!-- .entry-content -->


			</article><!-- #post -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>