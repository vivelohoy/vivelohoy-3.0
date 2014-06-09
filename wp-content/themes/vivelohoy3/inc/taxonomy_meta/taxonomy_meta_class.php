<?php
// BEGIN CLASS
class Taxonomy_Meta {
	
	protected $_meta;
	protected $_fields;
	
	function __construct($meta) {
	if ( ! is_admin() )
		return;
	
		$this->_meta = $meta;
		$this->_fields = &$this->_meta['fields'];
		add_action( $this->_meta['taxonomy'].'_add_form_fields', array($this,'add_new_meta_field'), 10, 2 );
		add_action( $this->_meta['taxonomy'].'_edit_form_fields', array($this,'edit_meta_field'), 10, 2 );
		add_action( 'edited_'.$this->_meta['taxonomy'], array($this,'save_taxonomy_custom_meta'), 10, 2 );  
		add_action( 'create_'.$this->_meta['taxonomy'], array($this,'save_taxonomy_custom_meta'), 10, 2 );
		
		add_action( 'admin_print_styles', array( &$this, 'load_scripts_styles' ) );
	}
	
	public function load_scripts_styles() {
		$plugin_path = get_stylesheet_directory_uri() . '/inc/taxonomy_meta/';
		
		wp_enqueue_script('thickbox');  
		wp_enqueue_style('thickbox');  
		wp_enqueue_script('media-upload');
		wp_enqueue_media();
		
		wp_enqueue_script( 'at-meta-box', $plugin_path . '/js/taxonomy-meta-box.js', array( 'jquery' ), null, true );
	}
	
	function add_new_meta_field(){
		foreach ( $this->_fields as $field ) {
			call_user_func ( array( &$this, 'show_field_add_'.$field['type']), $field);
		}
	}
	
	function edit_meta_field($term){
	$meta = get_option( $this->_meta['meta_pref'].$term->term_id ); 
		foreach ( $this->_fields as $field ) {
			call_user_func ( array( &$this, 'show_field_edit_'.$field['type']), $field, $meta);
		}
	}
  
	/******************** BEGIN SHOW ADD FIELDS **********************/
	
	function show_field_add_text($field){
	?>
		<div class="form-field">
			<label for="term_meta[<?php echo $field['id'];?>]"><?php echo $field['name'];?></label>
			<input type="text" name="term_meta[<?php echo $field['id'];?>]" id="term_meta[<?php echo $field['id'];?>]" value="<?php echo $field['std'];?>">
			<p class="description"><?php echo $field['desc'];?></p>
		</div>
	<?php
	}
	
	function show_field_add_textarea($field){
	?>
		<div class="form-field">
			<label for="term_meta[<?php echo $field['id'];?>]"><?php echo $field['name'];?></label>
			<textarea name="term_meta[<?php echo $field['id'];?>]" id="term_meta[<?php echo $field['id'];?>]" rows="5" cols="40"><?php echo $field['std'];?></textarea>
			
			<p class="description"><?php echo $field['desc'];?></p>
		</div>
	<?php
	}
	
	function show_field_add_select($field){
	?>
		<div class="form-field">
			<label for="term_meta[<?php echo $field['id'];?>]"><?php echo $field['name'];?></label>
			<select name="term_meta[<?php echo $field['id'];?>]" id="term_meta[<?php echo $field['id'];?>]" class='postform'>
				<?php
				foreach ( $field['options'] as $key => $value ) {
				echo "<option value='{$key}'>{$value}</option>";
				}?>
			</select>
			
			<p class="description"><?php echo $field['desc'];?></p>
		</div>
	<?php
	}
	
	function show_field_add_upload($field){
	?>
		<div class="form-field">
			<label for="term_meta[<?php echo $field['id'];?>]"><?php echo $field['name'];?></label>
			<input type="text" name="term_meta[<?php echo $field['id'];?>]" id="term_meta[<?php echo $field['id'];?>]" value="<?php echo $field['std'];?>">
			<input title='XXXx' type='button' class='custom_media_upload button reset-button' value="Upload" style="width:100px;">
			<p class="description"><?php echo $field['desc'];?></p>
		</div>
	<?php
	}
	
	/******************** END SHOW ADD FIELDS **********************/
  
	/******************** BEGIN SHOW EDIT FIELDS **********************/
	function show_field_edit_text($field, $meta){
	?>
		<tr class="form-field">
			<th scope="row" valign="top"><label for="term_meta[<?php echo $field['id'];?>]"><?php echo $field['name'];?></label></th>
			<td>
				<input type="text" name="term_meta[<?php echo $field['id'];?>]" id="term_meta[<?php echo $field['id'];?>]" value="<?php echo esc_attr( $meta[$field['id']] ) ? esc_attr( $meta[$field['id']] ) : ''; ?>">
				<p class="description"><?php echo $field['desc'];?></p>
			</td>
		</tr>
	
	<?php
	}
	
	function show_field_edit_textarea($field, $meta){
	?>
		<tr class="form-field">
			<th scope="row" valign="top"><label for="term_meta[<?php echo $field['id'];?>]"><?php echo $field['name'];?></label></th>
			<td>
				<textarea name="term_meta[<?php echo $field['id'];?>]" id="term_meta[<?php echo $field['id'];?>]" rows="5" cols="40"><?php echo esc_attr( $meta[$field['id']] ) ? esc_attr( $meta[$field['id']] ) : ''; ?></textarea>
				<p class="description"><?php echo $field['desc'];?></p>
			</td>
		</tr>
	<?php
	}
	
	function show_field_edit_select($field, $meta){
	?>
		<tr class="form-field">
			<th scope="row" valign="top"><label for="term_meta[<?php echo $field['id'];?>]"><?php echo $field['name'];?></label></th>
			<td>
				<select name="term_meta[<?php echo $field['id'];?>]" id="term_meta[<?php echo $field['id'];?>]" class='postform'>
					<?php
					foreach ( $field['options'] as $key => $value ) {
					echo "<option value='{$key}'" . selected($key, esc_attr( $meta[$field['id']])) . ">{$value}</option>";
					}?>
				</select>
				<p class="description"><?php echo $field['desc'];?></p>
			</td>
		</tr>
	<?php
	}
	
	function show_field_edit_upload($field, $meta){
	?>
		<tr class="form-field">
			<th scope="row" valign="top"><label for="term_meta[<?php echo $field['id'];?>]"><?php echo $field['name'];?></label></th>
			<td>
				<input type="text" name="term_meta[<?php echo $field['id'];?>]" id="term_meta[<?php echo $field['id'];?>]" class="<?php echo $field['id'];?>" value="<?php echo esc_attr( $meta[$field['id']] ) ? esc_attr( $meta[$field['id']] ) : ''; ?>">
				<input title='XXXx' type='button' class='custom_media_upload button reset-button' value="Upload">
				<p class="description"><?php echo $field['desc'];?></p>
			</td>
		</tr>
	
	<?php
	}
	/******************** END SHOW EDIT FIELDS **********************/
    
	/******************** BEGIN TRIGGER FIELDS **********************/
	function addText($id, $args){
		$new_field = array('type' => 'text','id'=> $id,'std' => '','desc' => '','name' => 'Text Field');
		$new_field = array_merge($new_field, $args);
		$this->_fields[] = $new_field;
	}
	
	function addTextarea($id, $args){
		$new_field = array('type' => 'textarea','id'=> $id,'std' => '','desc' => '','name' => 'Text Field');
		$new_field = array_merge($new_field, $args);
		$this->_fields[] = $new_field;
	}
	
	function addSelect($id,$options, $args){
		$new_field = array('type' => 'select','id'=> $id,'std' => array(),'desc' => '','name' => 'Text Field','options' => $options);
		$new_field = array_merge($new_field, $args);
		$this->_fields[] = $new_field;
	}
	
	function addUpload($id, $args){
		$new_field = array('type' => 'upload','id'=> $id,'std' => '','desc' => '','name' => 'Upload Field');
		$new_field = array_merge($new_field, $args);
		$this->_fields[] = $new_field;
	}
	
	/******************** END TRIGGER FIELDS **********************/
  
	  
	/******************** BEGIN SAVE META **********************/ 	
	function save_taxonomy_custom_meta( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( $this->_meta['meta_pref'].$t_id );
			$cat_keys = array_keys( $_POST['term_meta'] );
			foreach ( $cat_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_option( $this->_meta['meta_pref']."$t_id", $term_meta );
		}
	}  	
	
	/******************** END SAVE META **********************/ 	
 
} // END CLASS
?>