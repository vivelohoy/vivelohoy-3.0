<?php
/**
 * The template for displaying image attachments
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area" style="padding: 0 10px">
		<div id="content" class="site-content" role="main">
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'image-attachment' ); ?>>
				<div class="entry-content" style="padding:20px 0">
					<nav id="image-navigation" class="navigation image-navigation" role="navigation">
						<span class="nav-previous" style="left: -50px"><?php previous_image_link( false, __( '<span class="meta-nav">&larr;</span> Previous', 'twentythirteen-child' ) ); ?></span>
						<span class="nav-next" style="right: -15px"><?php next_image_link( false, __( 'Next <span class="meta-nav">&rarr;</span>', 'twentythirteen-child' ) ); ?></span>
					</nav><!-- #image-navigation -->

					<div class="entry-attachment" style="max-width: 900px; text-align: center">
						<div class="attachment">
							<?php echo wp_get_attachment_image( $attachment->ID, 'large');?>

							<?php if ( has_excerpt() ) : ?>
							<div class="entry-caption">
								<?php the_excerpt(); ?>
							</div>

							<?php endif; ?>
							<div class="entry-exif">
					<div class="exif-table" >
                <table >
                    <tr>
                        
                            <h1>EXIF</h1>
                            <?php $imgmeta = wp_get_attachment_metadata( $id );?>  
                   </tr>
                    <tr>
                        <td >
                            Fuente
                        </td>
                        <td>
                            <?php echo $imgmeta['image_meta']['copyright'];?>
                        </td>
                      
                    </tr>
                    <tr>
                        <td>
                            Fotógrafo
                        </td>
                        <td>
                           <?php echo $imgmeta['image_meta']['credit'];?>
                        </td>
                       
                    </tr>
                    <tr>
                        <td >
                             Camera
                        </td>
                        <td>
                             <?php echo $imgmeta['image_meta']['camera'];?>
                        </td>
                        
                    </tr>
                    <tr>
                        <td >
                            ISO
                        </td>
                        <td>
                             <?php echo $imgmeta['image_meta']['iso'];?>
                        </td>
                       
                    </tr>
                     <tr>
                        <td >
                            Distancia focal
                        </td>
                        <td>
                            <?php echo $imgmeta['image_meta']['focal_length'].mm;?>
                        </td>
                       
                    </tr>
                    <tr>
                        <td >
                            Abertura
                        </td>
                        <td>
                            <?php  echo "f/" . $imgmeta['image_meta']['aperture']?>
                        </td>
                       
                    </tr>
                    <tr>
                        <td >
                            Tiempo de exposición
                        </td>
                        <td>
                            <?php echo $imgmeta['image_meta']['shutter_speed'] ?>
                        </td>
                       
                    </tr>
                </table>
            </div>
            
					</div><!-- .entry-description -->
						</div><!-- .attachment -->
					</div><!-- .entry-attachment -->

					
					
				</div><!-- .entry-content -->
			</article><!-- #post -->
			
			<hr>
			<?php //comments_template(); ?>
			
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
