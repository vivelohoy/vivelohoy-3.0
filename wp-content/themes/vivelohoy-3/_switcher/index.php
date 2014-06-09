<?php global $theme_url, $prl_data; ?>
<link rel='stylesheet' id='demo-style'  href='<?php echo $theme_url;?>/_switcher/style.css' type='text/css' media='all' />

<link rel='stylesheet' id='demo-minicolor'  href='<?php echo $theme_url;?>/_switcher/miniColors/jquery.miniColors.css' type='text/css' media='all' />

<script type="text/javascript">
var template = '<?php echo $theme_url;?>';
</script>
<div id="pl_control_panel">
	<div id="panel_control" class="control-open"></div>
	<div class="padd">
		<div class='input'>
			<button id="layout_mode" type="button">Toggle Layout</button>
		</div>
		
		<div class="input" id="predefined_skins">
		<h4>Predefined Skins</h4>
		<a href="" id="skin1" data-primary_color="ff0094" data-bgcolor="eeeeee" data-pattern="bg0"></a>
		<a href="" id="skin2" data-primary_color="b733ff" data-bgcolor="eeeeee" data-pattern="bg1"></a>
		<a href="" id="skin3" data-primary_color="00aaad" data-bgcolor="eeeeee" data-pattern="bg2"></a>
		<a href="" id="skin4" data-primary_color="8cbe29" data-bgcolor="eeeeee" data-pattern="bg3"></a>
		<a href="" id="skin5" data-primary_color="9c5100" data-bgcolor="eeeeee" data-pattern="bg4"></a>
		<a href="" id="skin6" data-primary_color="e671b5" data-bgcolor="eeeeee" data-pattern="retina_wood"></a>
		<a href="" id="skin7" data-primary_color="ef9608" data-bgcolor="eeeeee" data-pattern="purty_wood"></a>
		<a href="" id="skin7" data-primary_color="19a2de" data-bgcolor="eeeeee" data-pattern="triangles"></a>
		<a href="" id="skin7" data-primary_color="e61400" data-bgcolor="eeeeee" data-pattern="txture"></a>
		<a href="" id="skin7" data-primary_color="319a31" data-bgcolor="eeeeee" data-pattern="white_brick_wall"></a>
		<div class="clear"></div>
		</div>
		
		<div class='input'>
			<div class="half">
				<h4>Primary Color</h4>
				<input type='text' value='#<?php echo $prl_data['primary_color'];?>' name='primary_color' id='primary_color'/>
			</div>
			<div class="half">
				<h4>Background Color</h4>
				<input type='text' value='#<?php echo $prl_data['body_background'];?>' name='custom_bg_color' id='custom_bg_color'/>
			</div>
			<div class="clear"></div>
		</div>
		
		<div class='input'>
			<h4>Example Patterns</h4>
			<div id='custom_bg_image' class="custom_bg_image">
				<img src='<?php echo $theme_url;?>/_switcher/images/_blank.png' data-img="bg0" alt="demo" />
				<img src='<?php echo $theme_url;?>/_switcher/images/_blank.png' data-img="bg1" alt="demo" />
				<img src='<?php echo $theme_url;?>/_switcher/images/_blank.png' data-img="bg2" alt="demo" />
				<img src='<?php echo $theme_url;?>/_switcher/images/_blank.png' data-img="bg3" alt="demo" />
				<img src='<?php echo $theme_url;?>/_switcher/images/_blank.png' data-img="bg4" alt="demo" />
				<img src='<?php echo $theme_url;?>/_switcher/images/_blank.png' data-img="retina_wood" alt="demo" />
				<img src='<?php echo $theme_url;?>/_switcher/images/_blank.png' data-img="purty_wood" alt="demo" />
				<img src='<?php echo $theme_url;?>/_switcher/images/_blank.png' data-img="triangles" alt="demo" />
				<img src='<?php echo $theme_url;?>/_switcher/images/_blank.png' data-img="txture" alt="demo" />
				<img src='<?php echo $theme_url;?>/_switcher/images/_blank.png' data-img="white_brick_wall" alt="demo" />
				<div class="clear"></div>
			</div>
		</div>
		<br />
		<input type="button" id="reset_style" value="Refresh" />
		
		<!--- end -->
	</div>	
</div>	

<script src="<?php echo $theme_url;?>/_switcher/miniColors/jquery.miniColors.min.js"></script>
<script src="<?php echo $theme_url;?>/_switcher/jquery.easing-1.3.js"></script>
<script src="<?php echo $theme_url;?>/_switcher/script.js"></script>
