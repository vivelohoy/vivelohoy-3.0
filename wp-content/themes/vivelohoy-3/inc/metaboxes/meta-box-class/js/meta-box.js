/**
 * All Types Meta Box Class JS
 *
 * JS used for the custom metaboxes and other form items.
 *
 * Copyright 2011 - 2013 Ohad Raz (admin@bainternet.info)
 * @since 1.0
 */

var $ =jQuery.noConflict();

var Ed_array = Array;
jQuery(document).ready(function($) {

	//editor rezise fix
	$(window).resize(function() {
	$.each(Ed_array, function() {
	  var ee = this;
	  $(ee.getScrollerElement()).width(100); // set this low enough
	  width = $(ee.getScrollerElement()).parent().width();
	  $(ee.getScrollerElement()).width(width); // set it to
	  ee.refresh();
	});
	});
  
	// Upload WP 3.5
	var my_original_editor = window.send_to_editor;
	$('.custom_media_upload').live("click",function() {

		var send_attachment_bkp = wp.media.editor.send.attachment;
		var formfield = $(this).prev('input').attr('name');
		wp.media.editor.send.attachment = function(props, attachment) {
	
			$('.custom_media_image').attr('src', attachment.url);
			$('#' + formfield).val(attachment.url);
			
			wp.media.editor.send.attachment = send_attachment_bkp;
		}
	
		wp.media.editor.open();
		window.send_to_editor = my_original_editor;
		return false;       
	});

});