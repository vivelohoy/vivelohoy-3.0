<?php if ( post_password_required() ) : ?>
<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'presslayer' ); ?></p>
<?php
	return;
endif;
?>

<?php // You can start editing here -- including this comment! ?>
<?php if ( have_comments() ) : ?>
<div id="comments" class="prl-panel">
	<?php
		if(get_comments_number() == 1) $cm_str = __('One comment','presslayer');
		else $cm_str = get_comments_number(). __(' comments','presslayer');
	?>
	<h5 class="prl-block-title"><?php echo $cm_str;?></h5>
	<ol class="prl-comment-list"><?php wp_list_comments( array( 'callback' => 'comment_list' ) );?></ol>
	
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<div id="comment_nav"> 
			<?php previous_comments_link( '&larr; '.__( 'Older Comments', 'presslayer' ) ); ?>
			<?php next_comments_link( __( 'Newer Comments', 'presslayer' ).' &rarr;' ); ?>
		</div>
	<?php endif; // check for comment navigation ?>
	
</div>	
<?php endif; ?>

<?php 
comment_form(); 
?>
