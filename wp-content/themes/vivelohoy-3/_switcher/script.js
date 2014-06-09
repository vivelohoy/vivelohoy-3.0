var $ = jQuery.noConflict();
$(document).ready(function() {
	
	// Layout
	$('#layout_mode').click(function(e) {
		$('body').toggleClass( 'site-boxed site-wide' );
		if($('body').hasClass('site-wide')){
			$('body').removeAttr('style');
			$("#custom_bg_color").prop("disabled",true);
		}else{
			$("#custom_bg_color").prop("disabled",false);
		}
	});
	
	// Example skins
	$( "#predefined_skins a" ).each(function( index ) {
		$(this).css('background-color', '#' + $(this).data('primary_color'));  
	});
	$('#predefined_skins a').click(function(e) {
		e.preventDefault();									  
		$(this).parent().find('a').removeClass('selected');
		$(this).addClass('selected');
		
		var skin = $(this).attr('id');
		var primary_color = $(this).data('primary_color');
		var bgcolor = $(this).data('bgcolor');
		var pattern = $(this).data('pattern');
		
		//Change primary color input
		$('#primary_color').val('#' + primary_color);
		$('#primary_color').minicolors('value', primary_color);
		
		
		if($('body').hasClass('site-boxed')){
			$('#custom_bg_color').val('#' + bgcolor);
			$('#custom_bg_color').minicolors('value', bgcolor);
			
			$('body').css('background-image', 'url(' + template + '/images/bg/' + pattern + '.png)');
			$('#custom_bg_image').find("img.selected").removeClass('selected');
			$('#custom_bg_image').find("img[data-img='"+ pattern +"']").addClass('selected');
		}
		
		return false;
	});
	
	// Background color
	$('#primary_color').minicolors({
		change: function(hex, rgba) {
			$('#style_selector').remove();
			$('body').append('<style id="style_selector" type="text/css">header#masthead .prl-header-logo,button, input[type=submit], input[type=button], a.prl-button,.prl-badge,.page_navi li.current span,.prl-accordion section.active a.head,.prl-nav-dropdown a:hover, .widget_newsletter{ background-color: '+hex+'} .page_navi li.current span, #sliderTab .slider_content .prl-article-meta{border-color:'+hex+'}a,.prl-block-title,.prl-block-title a, .prl-archive-title,.prl-archive-title a,#footer .prl-block-title a,.comment-reply-title,#footer .prl-block-title,.twitter_widget a,.sf-menu > li.current-menu-item > a,.sf-menu > li.current_page_item > a,.sf-menu > li.current-menu-ancestor > a,.sf-menu > li.current-menu-parent > a, .sf-menu > li:hover > a,.sf-menu > li.sfHover > a{color:'+hex+'} </style>');
		}
	});
	
	// Background color
	$('#custom_bg_color').minicolors({
		change: function(hex, rgba) {
			$('body').css('background-color', hex);
		}
	});
	
	// Background pattern
	$( "#custom_bg_image img" ).each(function( index ) {
		var pattern =  $(this).data('img');									  
		$(this).css('background-image',  'url(' + template + '/images/bg/'+ pattern +'.png)');  
	});
	
	$('#custom_bg_image img').click(function(e) {
		if($('body').hasClass('site-boxed')){
			var pattern =  $(this).data('img');	
			e.preventDefault();
			$('body').css('background-image', 'url(' + template + '/images/bg/' + pattern + '.png)');
			$(this).parent().find('img').removeClass('selected');
			$(this).addClass('selected');
		}else{
			alert('Please toggle layout to Boxed');	
		}
		
	});
	
	// Reset
	$('#reset_style').click(function(e) {
		setTimeout('location.reload(true);', 0);
	});
	
	// Control panel
	$('#panel_control').click(function(){
										   
		if ( $(this).hasClass('control-open') ) {
			$('#pl_control_panel').animate( { left: 0 }, {easing: 'easeOutCirc'}, 300);
			$(this).removeClass('control-open');
			$(this).addClass('control-close');
			
		} else {
			$('#pl_control_panel').animate( { left: -302 },{easing: 'easeOutCirc'}, 300 );
			$(this).removeClass('control-close');
			$(this).addClass('control-open');
		}
		return false;
	});	

});	