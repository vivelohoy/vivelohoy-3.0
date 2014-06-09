<?php
// Contact ajax
add_action('wp_ajax_submit_contact_form', 'submit_contact_form');

function submit_contact_form(){
	
	$return_data = array('success'=>'0');
	
	if(empty($_POST)){
		$return_data['value'] = __('Cannot send email to destination. No parameter receive form AJAX call.','presslayer');	
		die ( json_encode($return_data) );
	}
	
	$name = $_POST['name'];		
	if(empty($name)){
		$return_data['value'] =  __('Please enter your name.','presslayer');
		die ( json_encode($return_data) );
	}
	
	$email = $_POST['email'];
	if(empty($email)){
		$return_data['value'] = __('Please enter a valid email address.','presslayer');
		die ( json_encode($return_data) );		
	}
	
	$subject = $_POST['subject'];
	if(empty($subject)){ 
		$return_data['value'] = __('Please enter a subject','presslayer');
		die ( json_encode($return_data) );				
	}
	
	$message = $_POST['message'];
	if(empty($message)){ 
		$return_data['value'] = __('Please enter a message.','presslayer');
		die ( json_encode($return_data) );				
	}
	
	$receiver = $_POST['receiver'];
	
	$messages = "You have received a new contact form message. \n\n";
	$messages = $messages . 'Name : ' . $name . " \n\n";
	$messages = $messages . 'Email : ' . $email . " \n\n";
	$messages = $messages . 'Message : ' . $message;
	$messages = $messages.  "\n\n--\nThis mail is sent via contact form on ".get_bloginfo('name')." - ".home_url();
	
	$header = "From: " . $name . "<" . $email . "> \r\n";
	$header = $header . "To: " . $receiver . " \r\n";
	$header = $header . 'Content-Type: text/plain; charset=UTF-8 ' . " \r\n";
	
	if( @mail($receiver, $subject, $messages, $header) ){
		$return_data['success'] = 1;
		$return_data['value'] = __('The e-mail was sent successfully','presslayer');
		die( json_encode($return_data) );
	}else{
		$return_data['value'] = __('Message cannot be sent to destination','presslayer');
		die( json_encode($return_data) );	
	}
	
}

/** A simple text block **/
class AQ_Contact_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Contact Form',
			'size' => 'span-8',
			'resizable' => 1
		);
		
		//create the block
		parent::__construct('aq_contact_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'title' => 'FILL THE FORM',
			'intro' => 'We look forward to hearing from you!',
			'receive_email' => 'abc@yourcompany.com'
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		?>
		<ul class="lightbox_form">
        <li>
			<label for="<?php echo $this->get_field_id('title') ?>">
            <div class="title">Title</div>
            <div class="input">  
				<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
				</div>
			</label>
		</li>
		
		<li>
			<label for="<?php echo $this->get_field_id('intro') ?>">
            <div class="title">Introduction</div>
            <div class="input">  
				<?php echo aq_field_textarea('intro', $block_id, $intro, $size = 'full') ?>
				</div>
			</label>
		</li>
		<li>
			<label for="<?php echo $this->get_field_id('receive_email') ?>">
            <div class="title">Receive Email</div>
            <div class="input">  
				<?php echo aq_field_input('receive_email', $block_id, $receive_email, $size = 'full') ?>
				</div>
			</label>
		</li>
		
		
        </ul>
		
<?php
	} 
	
	function block($instance) {
		extract($instance);

		?>	
		<?php if($title) {?><h3><?php echo $title;?></h3><?php }?>
		<?php if($intro) {?><p><?php echo $intro;?></p><?php }?>
		
		<script>
			jQuery(document).ready(function($){
				$("form.prl-form").submit(function(){
					var the_form = $(this);
					var error = false;
					
					$(this).find('#send_result').slideUp(200);
					$(this).find('.require_field').each(function(){
						if($.trim($(this).val()) == '') {
							error = true;
							$(this).siblings('.error').slideDown(200);
						}else if($(this).hasClass('email')) {
							var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
							if(!emailReg.test($.trim($(this).val()))) {
								error = true;
								$(this).siblings('.error').slideDown(200);
							}else{
								$(this).siblings('.error').slideUp(200);
							}
						}else{
							$(this).siblings('.error').slideUp(200);
						}
					});
					
					if(error) return false;
					
					$(this).find('.contact_loader').fadeIn();
					
					var send_data = $(this).serialize();
			
					$.post('<?php echo admin_url();?>admin-ajax.php', 'action=submit_contact_form&' + send_data, function(data){
						
						the_form.find('.contact_loader').fadeOut();
						
						if( data.success == 1 ){
							the_form.find('#send_result div').each(function(){
								$(this).html(data.value);
								$(this).removeClass('error').addClass('success');
								$(this).parent().slideDown(200);
							});	
							the_form.find('input[type="text"], textarea').val('');
						}else{
							the_form.find('#send_result div').each(function(){
								$(this).html(data.value);
								$(this).removeClass('success').addClass('error');
								$(this).parent().slideDown(200);
							});	
						}
					}, 'json');
					
					return false;
				});
			});
		</script>
		
		<form class="prl-form" action="#">
			<div class="prl-span-12 hide" id="send_result"><div class="alert bold"></div></div>
			<div class="alert info prl-form-row contact_loader hide"><?php _e('Loading','presslayer');?> ...</div>
			<fieldset>
				<div class="prl-grid" data-prl-grid-margin>
					<div class="prl-span-6">
						<div class="prl-form-row space-bot">
							<label class="prl-form-label" for="name"><?php _e('Name','presslayer');?> *</label>
							<div class="prl-form-controls prl-comment-name">
								<input name="name" type="text" placeholder="" class="require_field">
								<div class="alert error hide"><?php _e('Please enter your name','presslayer');?></div>
							</div>
						</div>
						
					</div>
					<div class="prl-span-6">
						<div class="prl-form-row space-bot">
							<label class="prl-form-label" for="email"><?php _e('Email','presslayer');?> *</label>
							<div class="prl-form-controls prl-comment-email">
							<input name="email" type="text" placeholder="" class="require_field">
							<div class="alert error hide"><?php _e('Please enter a valid email address','presslayer');?></div>
							</div>
						</div>
					</div>
					<div class="prl-span-12">
						<div class="prl-form-row space-bot">
							<label class="prl-form-label" for="subject"><?php _e('Subject','presslayer');?> *</label>
							<div class="prl-form-controls prl-comment-url">
								<input name="subject" id="subject" type="text" placeholder="" class="require_field">
								<div class="alert error hide"><?php _e('Please enter a subject','presslayer');?></div>
							</div>
						</div>
					</div>
					<div class="prl-span-12">
						
						<div class="prl-form-row space-bot">
							<label class="prl-form-label" for="form-s-t"><?php _e('Message','presslayer');?> *</label>
							<div class="prl-form-controls">
								<textarea name="message" cols="30" rows="8" placeholder="" class="require_field"></textarea>
								<div class="alert error hide"><?php _e('Please enter a message','presslayer');?></div>
							</div>
						</div>
					</div>
					
					<div class="prl-span-12">
						<div class="prl-form-row">
							<button class="prl-button prl-button-primary" type="submit"><?php _e('Send message','presslayer');?></button>
							<em class="prl-form-help-inline"><?php _e('Required fields are marked','presslayer');?> (*)</em>
							<input name="receiver" type="hidden" value="<?php echo $receive_email;?>" />
						</div>
						
					</div>
				</div>
				
			</fieldset>
		</form>
  
		<?php
		
	}
	
}
