<?php
/** A simple text block **/
class AQ_Text_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Text',
			'size' => 'span-4',
		);
		
		//create the block
		parent::__construct('aq_text_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'text' => '',
			'wp_autop' => 0
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		?>
		<ul class="lightbox_form">
        <li>
			<label for="<?php echo $this->get_field_id('title') ?>">
            <div class="title">
				Title (optional)</div>
            <div class="input">  
				<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?></div>
			</label>
		</li>
		
		<li>
			<label for="<?php echo $this->get_field_id('text') ?>">
				<div class="title">Content</div>
				<div class="input"><?php echo aq_field_textarea('text', $block_id, $text, $size = 'full') ?>
                <label for="<?php echo $this->get_field_id('wp_autop') ?>">
				<?php echo aq_field_checkbox('wp_autop', $block_id, $wp_autop) ?>
				Do not create the paragraphs automatically. <code>"wpautop"</code> disable.
			</label>
                
                </div>
			</label>
			
		</li>
        </ul>
		
		<?php
	}
	
	function block($instance) {
		extract($instance);

		$wp_autop = ( isset($wp_autop) ) ? $wp_autop : 0;
		
		if($title) echo '<h3 class="aq-block-title">'.strip_tags($title).'</h3>';
		if($wp_autop == 1){
			echo do_shortcode(htmlspecialchars_decode($text));
		}
		else
		{
			echo wpautop(do_shortcode(htmlspecialchars_decode($text)));
		}
		
	}
	
}
