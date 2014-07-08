<?php
/**
 * The template for displaying posts in the Gallery post format
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_single() ) : ?>
		<center><h1 class="entry-title"><?php the_title(); ?></h1></center>
		<?php else : ?>
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>
		<?php endif; // is_single() ?>
		<div class="entry-meta-hoy">
			<center>
				<p>
					<?php the_category(', ') ?> Por <?php the_author_posts_link(); ?> <?php the_time('m/j/y g:i A') ?>
				</p>
				<?php edit_post_link( __( 'Editar', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
			</center>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if ( is_single() || ! get_post_gallery() ) : ?>
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
		<?php else : ?>
			<?php echo get_post_gallery(); ?>
		<?php endif; // is_single() ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
	<?php if ( comments_open() && ! is_single() ) : ?>
		<div class="comments-link">
			<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'twentythirteen' ) . '</span>', __( 'One comment so far', 'twentythirteen' ), __( 'View all % comments', 'twentythirteen' ) ); ?>
		</div><!-- .comments-link -->
	<?php endif; // comments_open() ?>
	<?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
		<?php get_template_part( 'author-bio' ); ?>
	<?php endif; ?>
		<div id="footer-content">
	            <a href="/about-vivelohoy/">Acerca de nosotros</a>
	            <a href="/advertise">| Advertise</a>
	            <a href="/contactos/">| Contactos</a>
	            <a href="/terminos-de-servicio/">| Términos de servicio</a>
				<a href="/politica-de-confidencialidad">| Política de privacidad</a><br>
				<a href="http://www.readoz.com/publication/index?p=9330" target="_blank">Edición Impresa</a>
				<a href="http://www.orlandosentinel.com/elsentinel" target="_blank">| El Sentinel Orlando</a>
	            <a href="http://www.sunsentinel.com/elsentinel" target="_blank">| El Sentinel Sur de Florida</a>
	            <a href="http://www.hoylosangeles.com" target="_blank">| Hoy Los Ángeles</a>
	        <div>
				<p>435 N. Michigan Ave., Chicago, IL 60611<br>© 2014 Desarrollado por <a href="http://www.hoylabs.com/" target="_blank">Hoy Labs</a> del Hoy Chicago.</p>
			</div>
		</div>
		<script type="text/javascript">
		(function($) {
			leaderboard_code = $('<div class="gallery-leaderboard"><iframe id="http://ad.doubleclick.net/adi/trb.vivelohoy2/hp;tile=1;ptype=sf;pos=1;sz=728x90;u=%s;ord=%s" height="90" width="728" vspace="0" hspace="0" marginheight="0" marginwidth="0" align="center" frameborder="0" scrolling="no" src="http://ad.doubleclick.net/adi/trb.vivelohoy2/hp;tile=1;ptype=sf;pos=1;sz=728x90;u=http://www.vivelohoy.com/;ord=86950313"></iframe></div>');
			$(document).ready(function() {
				$('.gallery-item:nth-child(2n)').after(leaderboard_code);
			});
		})(jQuery);
		</script>
	</footer><!-- .entry-meta -->
</article><!-- #post -->