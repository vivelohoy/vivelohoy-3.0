<?php 
/**
 * Custom Meta Box Class
 *
 * The Meta Box Class is used by including it in your plugin files and using its methods to 
 * create custom meta boxes for custom post types. It is meant to be very simple and 
 * straightforward. For name spacing purposes, All Types metabox ( meaning you can do anything with it )
 * is used. 
 *
 * This class is derived from Meta Box script by Rilwis<rilwis@gmail.com> version 3.2. which later was forked 
 * by Cory Crowley (email: cory.ivan@gmail.com) The purpose of this class is not to rewrite the script but to 
 * modify and change small things and adding a few field types that i needed to my personal preference. 
 * The original author did a great job in writing this class, so all props goes to him.
 * 
 * @version 3.0.1
 * @copyright 2011 - 2013
 * @author Ohad Raz (email: admin@bainternet.info)
 * @link http://en.bainternet.info
 * 
 * @license GNU General Public LIcense v3.0 - license.txt
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NON-INFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package MY Meta Box Class
 */

if ( ! class_exists( 'AT_Meta_Box') ) :

/**
 * All Types Meta Box class.
 *
 * @package All Types Meta Box
 * @since 1.0
 *
 * @todo Nothing.
 */
class AT_Meta_Box {
  
  /**
   * Holds meta box object
   *
   * @var object
   * @access protected
   */
  protected $_meta_box;
  
  /**
   * Holds meta box fields.
   *
   * @var array
   * @access protected
   */
  protected $_prefix;
  
  /**
   * Holds Prefix for meta box fields.
   *
   * @var array
   * @access protected
   */
  protected $_fields;

  /**
   * $field_types  holds used field types
   * @var array
   * @access public
   * @since 2.9.7
   */
  public $field_types = array();

  /**
   * $inGroup  holds groupping boolean
   * @var boolean
   * @access public
   * @since 2.9.8
   */
  public $inGroup = false;

  /**
   * Constructor
   *
   * @since 1.0
   * @access public
   *
   * @param array $meta_box 
   */
  public function __construct ( $meta_box ) {
    
    // If we are not in admin area exit.
    if ( ! is_admin() )
      return;
    
    //load translation
    add_filter('init', array($this,'load_textdomain'));

    // Assign meta box values to local variables and add it's missed values.
    $this->_meta_box = $meta_box;
    $this->_prefix = (isset($meta_box['prefix'])) ? $meta_box['prefix'] : ''; 
    $this->_fields = &$this->_meta_box['fields'];
    $this->add_missed_values();

    // Add metaboxes
    add_action( 'add_meta_boxes', array( &$this, 'add' ) );
    //add_action( 'wp_insert_post', array( &$this, 'save' ) );
    add_action( 'save_post', array( &$this, 'save' ) );
    
    // Load common js, css files
    // Must enqueue for all pages as we need js for the media upload, too.
    add_action( 'admin_print_styles', array( &$this, 'load_scripts_styles' ) );
   
	// Fix insert button for any user
	add_filter('get_media_item_args', array($this, 'my_get_media_item_args'));
    
  }
  
  function my_get_media_item_args($args) {    
	$args['send'] = true;
	return $args;
  } 
  
  /**
   * Load all Javascript and CSS
   *
   * @since 1.0
   * @access public
   */
  public function load_scripts_styles() {
    
    // Get Plugin Path
	$plugin_path = get_stylesheet_directory_uri() . '/inc/metaboxes/meta-box-class';
    
    
    //only load styles and js when needed
    /* 
     * since 1.8
     */
    global $typenow;
    if (in_array($typenow,$this->_meta_box['pages']) && $this->is_edit_page()){
      // Enqueue Meta Box Style
      wp_enqueue_style( 'at-meta-box', $plugin_path . '/css/meta-box.css' );
      
      // Enqueue Meta Box Scripts
      wp_enqueue_script( 'at-meta-box', $plugin_path . '/js/meta-box.js', array( 'jquery' ), null, true );

    }
    
  }
  
  /**
   * Add Meta Box for multiple post types.
   *
   * @since 1.0
   * @access public
   */
  public function add($postType) {
    if(in_array($postType, $this->_meta_box['pages'])){
      add_meta_box( $this->_meta_box['id'], $this->_meta_box['title'], array( &$this, 'show' ),$postType, $this->_meta_box['context'], $this->_meta_box['priority'] );
    }
  }
  
  /**
   * Callback function to show fields in meta box.
   *
   * @since 1.0
   * @access public 
   */
  public function show() {
    $this->inGroup = false;
    global $post;
    //var_dump($this->_fields);
    wp_nonce_field( basename(__FILE__), 'at_meta_box_nonce' );
    echo '<table class="form-table">';
    foreach ( $this->_fields as $field ) {
      $field['multiple'] = isset($field['multiple']) ? $field['multiple'] : false;
      $meta = get_post_meta( $post->ID, $field['id'], !$field['multiple'] );
      $meta = ( $meta !== '' ) ? $meta : @$field['std'];
      
      if ($this->inGroup !== true)
        echo '<tr>';

      if (isset($field['group']) && $field['group'] == 'start'){
        $this->inGroup = true;
        echo '<td class="group_wrapper"><table class="form-table"><tr>';
      }
      
      // Call Separated methods for displaying each type of field.
      call_user_func ( array( &$this, 'show_field_' . $field['type'] ), $field, $meta );

      if ($this->inGroup === true){
        if(isset($field['group']) && $field['group'] == 'end'){
          echo '</tr></table></td></tr>';
          $this->inGroup = false;
        }
      }else{
        echo '</tr>';
      }
    }
    echo '</table>';
  }
  
 
  /**
   * Begin Field.
   *
   * @param string $field 
   * @param string $meta 
   * @since 1.0
   * @access public
   */
  public function show_field_begin( $field, $meta) {
    echo "<td class='at-field'".(($this->inGroup === true)? " valign='top'": "").">";
    if ( $field['name'] != '' || $field['name'] != FALSE ) {
      echo "<div class='at-label'>";
        echo "<label for='{$field['id']}'>{$field['name']}</label>";
      echo "</div>";
    }
  }
  
  /**
   * End Field.
   *
   * @param string $field 
   * @param string $meta 
   * @since 1.0
   * @access public 
   */
  public function show_field_end( $field, $meta=NULL ,$group = false) {
    //print description
    if ( isset($field['desc']) && $field['desc'] != '' )
      echo "<div class='desc-field'>{$field['desc']}</div>";
    echo "</td>";
  }
  
  /**
   * Show Field Upload.
   *
   * @param string $field 
   * @param string $meta 
   * @since 1.0
   * @access public
   */
  public function show_field_upload( $field, $meta) {  
    $this->show_field_begin( $field, $meta );
	 echo "<input type='text' class='at-upload".( isset($field['class'])? ' ' . $field['class'] : '' )."' name='{$field['id']}' id='{$field['id']}' value='{$meta}' size='30' ".( isset($field['style'])? "style='{$field['style']}'" : '' )."/><input title='{$field['name']}' type='button' class='custom_media_upload button reset-button' value=\"Upload\">";
    $this->show_field_end( $field, $meta );
  }
  
  /**
   * Show Field Text.
   *
   * @param string $field 
   * @param string $meta 
   * @since 1.0
   * @access public
   */
  public function show_field_text( $field, $meta) {  
    $this->show_field_begin( $field, $meta );
    echo "<input type='text' class='at-text".( isset($field['class'])? ' ' . $field['class'] : '' )."' name='{$field['id']}' id='{$field['id']}' value='{$meta}' size='30' ".( isset($field['style'])? "style='{$field['style']}'" : '' )."/>";
    $this->show_field_end( $field, $meta );
  }
  
  /**
   * Show Field hidden.
   *
   * @param string $field 
   * @param string|mixed $meta 
   * @since 0.1.3
   * @access public
   */
  public function show_field_hidden( $field, $meta) {  
    //$this->show_field_begin( $field, $meta );
    echo "<input type='hidden' ".( isset($field['style'])? "style='{$field['style']}' " : '' )."class='at-text".( isset($field['class'])? ' ' . $field['class'] : '' )."' name='{$field['id']}' id='{$field['id']}' value='{$meta}'/>";
    //$this->show_field_end( $field, $meta );
  }
  
  /**
   * Show Field Paragraph.
   *
   * @param string $field 
   * @since 0.1.3
   * @access public
   */
  public function show_field_paragraph( $field) {  
    //$this->show_field_begin( $field, $meta );
    echo '<p>'.$field['value'].'</p>';
    //$this->show_field_end( $field, $meta );
  }
    
  /**
   * Show Field Textarea.
   *
   * @param string $field 
   * @param string $meta 
   * @since 1.0
   * @access public
   */
  public function show_field_textarea( $field, $meta ) {
    $this->show_field_begin( $field, $meta );
      echo "<textarea class='at-textarea large-text".( isset($field['class'])? ' ' . $field['class'] : '' )."' name='{$field['id']}' id='{$field['id']}' ".( isset($field['style'])? "style='{$field['style']}' " : '' )." cols='60' rows='6'>{$meta}</textarea>";
    $this->show_field_end( $field, $meta );
  }
  
  /**
   * Show Field Select.
   *
   * @param string $field 
   * @param string $meta 
   * @since 1.0
   * @access public
   */
  public function show_field_select( $field, $meta ) {
    
    if ( ! is_array( $meta ) ) 
      $meta = (array) $meta;
      
    $this->show_field_begin( $field, $meta );
      echo "<select ".( isset($field['style'])? "style='{$field['style']}' " : '' )." class='at-select".( isset($field['class'])? ' ' . $field['class'] : '' )."' name='{$field['id']}" . ( $field['multiple'] ? "[]' id='{$field['id']}' multiple='multiple'" : "'" ) . ">";
      foreach ( $field['options'] as $key => $value ) {
        echo "<option value='{$key}'" . selected( in_array( $key, $meta ), true, false ) . ">{$value}</option>";
      }
      echo "</select>";
    $this->show_field_end( $field, $meta );
    
  }
  
  /**
   * Show Radio Field.
   *
   * @param string $field 
   * @param string $meta 
   * @since 1.0
   * @access public 
   */
  public function show_field_radio( $field, $meta ) {
    
    if ( ! is_array( $meta ) )
      $meta = (array) $meta;
      
    $this->show_field_begin( $field, $meta );
      foreach ( $field['options'] as $key => $value ) {
        echo "<input type='radio' ".( isset($field['style'])? "style='{$field['style']}' " : '' )." class='at-radio".( isset($field['class'])? ' ' . $field['class'] : '' )."' name='{$field['id']}' value='{$key}'" . checked( in_array( $key, $meta ), true, false ) . " /> <span class='at-radio-label'>{$value}</span>";
      }
    $this->show_field_end( $field, $meta );
  }
  
  /**
   * Show Checkbox Field.
   *
   * @param string $field 
   * @param string $meta 
   * @since 1.0
   * @access public
   */
  public function show_field_checkbox( $field, $meta ) {
    

    $this->show_field_begin($field, $meta);
    echo "<input type='checkbox' ".( isset($field['style'])? "style='{$field['style']}' " : '' )." class='rw-checkbox".( isset($field['class'])? ' ' . $field['class'] : '' )."' name='{$field['id']}' id='{$field['id']}'" . checked(!empty($meta), true, false) . " />";
    $this->show_field_end( $field, $meta );
      
  }
  
  /**
   * Show Wysiwig Field.
   *
   * @param string $field 
   * @param string $meta 
   * @since 1.0
   * @access public
   */
  public function show_field_wysiwyg( $field, $meta) {
    $this->show_field_begin( $field, $meta );
    
    // Add TinyMCE script for WP version < 3.3
    global $wp_version;
    
    if ( version_compare( $wp_version, '3.2.1' ) < 1)
      echo "<textarea class='at-wysiwyg theEditor large-text".( isset($field['class'])? ' ' . $field['class'] : '' )."' name='{$field['id']}' id='{$field['id']}' cols='60' rows='10'>{$meta}</textarea>";
    else{
      // Use new wp_editor() since WP 3.3
      wp_editor( html_entity_decode($meta), $field['id'], array( 'editor_class' => 'at-wysiwyg'.( isset($field['class'])? ' ' . $field['class'] : '' )) );
    }
    $this->show_field_end( $field, $meta );
  }
  

  /**
   * Show Checkbox List Field
   *
   * @param string $field 
   * @param string $meta 
   * @since 1.0
   * @access public
   */
  public function show_field_checkbox_list( $field, $meta ) {
    
    if ( ! is_array( $meta ) ) 
      $meta = (array) $meta;
      
    $this->show_field_begin($field, $meta);
    
      $html = array();
    
      foreach ($field['options'] as $key => $value) {
        $html[] = "<input type='checkbox' ".( isset($field['style'])? "style='{$field['style']}' " : '' )."  class='at-checkbox_list".( isset($field['class'])? ' ' . $field['class'] : '' )."' name='{$field['id']}[]' value='{$key}'" . checked( in_array( $key, $meta ), true, false ) . " /> {$value}";
      }
    
      echo implode( '<br />' , $html );
      
    $this->show_field_end($field, $meta);
    
  }

   /**
   * Show Posts field.
   * used creating a posts/pages/custom types checkboxlist or a select dropdown
   * @param string $field 
   * @param string $meta 
   * @since 1.0
   * @access public 
   */
  public function show_field_posts($field, $meta) {
    global $post;
    
    if (!is_array($meta)) $meta = (array) $meta;
    $this->show_field_begin($field, $meta);
    $options = $field['options'];
    $posts = get_posts($options['args']);
    
    // checkbox_list
    if ('checkbox_list' == $options['type']) {
      foreach ($posts as $p) {
        echo "<input type='checkbox' ".( isset($field['style'])? "style='{$field['style']}' " : '' )." class='at-posts-checkbox".( isset($field['class'])? ' ' . $field['class'] : '' )."' name='{$field['id']}[]' value='$p->ID'" . checked(in_array($p->ID, $meta), true, false) . " /> $p->post_title<br/>";
      }
    }
    // select
    else {
      echo "<select ".( isset($field['style'])? "style='{$field['style']}' " : '' )." class='at-posts-select at-select".( isset($field['class'])? ' ' . $field['class'] : '' )."' name='{$field['id']}" . ($field['multiple'] ? "[]' multiple='multiple' style='height:auto'" : "'") . ">";
      foreach ($posts as $p) {
        echo "<option value='$p->ID'" . selected(in_array($p->ID, $meta), true, false) . ">$p->post_title</option>";
      }
      echo "</select>";
    }
    
    $this->show_field_end($field, $meta);
  }
  
  /**
   * Show Taxonomy field.
   * used creating a category/tags/custom taxonomy checkboxlist or a select dropdown
   * @param string $field 
   * @param string $meta 
   * @since 1.0
   * @access public 
   * 
   * @uses get_terms()
   */
  public function show_field_taxonomy($field, $meta) {
    global $post;
    
    if (!is_array($meta)) $meta = (array) $meta;
    $this->show_field_begin($field, $meta);
    $options = $field['options'];
    $terms = get_terms($options['taxonomy'], $options['args']);
    
    // checkbox_list
    if ('checkbox_list' == $options['type']) {
      foreach ($terms as $term) {
        echo "<input type='checkbox' ".( isset($field['style'])? "style='{$field['style']}' " : '' )." class='at-tax-checkbox".( isset($field['class'])? ' ' . $field['class'] : '' )."' name='{$field['id']}[]' value='$term->slug'" . checked(in_array($term->slug, $meta), true, false) . " /> $term->name<br/>";
      }
    }
    // select
    else {
      echo "<select ".( isset($field['style'])? "style='{$field['style']}' " : '' )." class='at-tax-select at-select".( isset($field['class'])? ' ' . $field['class'] : '' )."' name='{$field['id']}" . ($field['multiple'] ? "[]' multiple='multiple' style='height:auto'" : "'") . ">";
      foreach ($terms as $term) {
        echo "<option value='$term->term_id'" . selected(in_array($term->term_id, $meta), true, false) . ">$term->name</option>";
      }
      echo "</select>";
    }
    
    $this->show_field_end($field, $meta);
  }

  /**
   * Save Data from Metabox
   *
   * @param string $post_id 
   * @since 1.0
   * @access public 
   */
  public function save( $post_id ) {
    
    global $post_type;
    
    $post_type_object = get_post_type_object( $post_type );

    if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )                // Check Autosave
    || ( ! isset( $_POST['post_ID'] ) || $post_id != $_POST['post_ID'] )        // Check Revision
    || ( ! in_array( $post_type, $this->_meta_box['pages'] ) )              // Check if current post type is supported.
    || ( ! check_admin_referer( basename( __FILE__ ), 'at_meta_box_nonce') )      // Check nonce - Security
    || ( ! current_user_can( $post_type_object->cap->edit_post, $post_id ) ) )       // Check permission
    {
      return $post_id;
    }
    
    foreach ( $this->_fields as $field ) {
      
      $name = $field['id'];
      $type = $field['type'];
      $old = get_post_meta( $post_id, $name, ! $field['multiple'] );
      $new = ( isset( $_POST[$name] ) ) ? $_POST[$name] : ( ( $field['multiple'] ) ? array() : '' );
            

      // Validate meta value
      if ( class_exists( 'at_Meta_Box_Validate' ) && method_exists( 'at_Meta_Box_Validate', $field['validate_func'] ) ) {
        $new = call_user_func( array( 'at_Meta_Box_Validate', $field['validate_func'] ), $new );
      }
      
      //skip on Paragraph field
      if ($type != "paragraph"){

        // Call defined method to save meta value, if there's no methods, call common one.
        $save_func = 'save_field_' . $type;
        if ( method_exists( $this, $save_func ) ) {
          call_user_func( array( &$this, 'save_field_' . $type ), $post_id, $field, $old, $new );
        } else {
          $this->save_field( $post_id, $field, $old, $new );
        }
      }
      
    } // End foreach
  }
  
  /**
   * Common function for saving fields.
   *
   * @param string $post_id 
   * @param string $field 
   * @param string $old 
   * @param string|mixed $new 
   * @since 1.0
   * @access public
   */
  public function save_field( $post_id, $field, $old, $new ) {
    $name = $field['id'];
    delete_post_meta( $post_id, $name );
    if ( $new === '' || $new === array() ) 
      return;
    if ( $field['multiple'] ) {
      foreach ( $new as $add_new ) {
        add_post_meta( $post_id, $name, $add_new, false );
      }
    } else {
      update_post_meta( $post_id, $name, $new );
    }
  }  
  
  /**
   * function for saving image field.
   *
   * @param string $post_id 
   * @param string $field 
   * @param string $old 
   * @param string|mixed $new 
   * @since 1.7
   * @access public
   */
  public function save_field_image( $post_id, $field, $old, $new ) {
    $name = $field['id'];
    delete_post_meta( $post_id, $name );
    if ( $new === '' || $new === array() || $new['id'] == '' || $new['src'] == '') 
      return;
    
    update_post_meta( $post_id, $name, $new );
  }
  
  /*
   * Save Wysiwyg Field.
   *
   * @param string $post_id 
   * @param string $field 
   * @param string $old 
   * @param string $new 
   * @since 1.0
   * @access public 
   */
  public function save_field_wysiwyg( $post_id, $field, $old, $new ) {
    $this->save_field( $post_id, $field, $old, $new );
  }
  
  /**
   * Add missed values for meta box.
   *
   * @since 1.0
   * @access public
   */
  public function add_missed_values() {
    
    // Default values for meta box
    $this->_meta_box = array_merge( array( 'context' => 'normal', 'priority' => 'high', 'pages' => array( 'post' ) ), (array)$this->_meta_box );

    // Default values for fields
    foreach ( $this->_fields as &$field ) {
      
      $multiple = in_array( $field['type'], array( 'checkbox_list', 'file', 'image' ) );
      $std = $multiple ? array() : '';
      $format = 'date' == $field['type'] ? 'yy-mm-dd' : ( 'time' == $field['type'] ? 'hh:mm' : '' );

      $field = array_merge( array( 'multiple' => $multiple, 'std' => $std, 'desc' => '', 'format' => $format, 'validate_func' => '' ), $field );
    
    } // End foreach
    
  }

  /**
   * Check if field with $type exists.
   *
   * @param string $type 
   * @since 1.0
   * @access public
   */
   public function has_field( $type ) {
    //faster search in single dimention array.
    if (count($this->field_types) > 0){
      return in_array($type, $this->field_types);
    }

    //run once over all fields and store the types in a local array
    $temp = array();
    foreach ($this->_fields as $field) {
      $temp[] = $field['type'];
    }

    //remove duplicates
    $this->field_types = array_unique($temp);
    //call this function one more time now that we have an array of field types
    return $this->has_field($type);
  }

  /**
   * Check if current page is edit page.
   *
   * @since 1.0
   * @access public
   */
  public function is_edit_page() {
    global $pagenow;
    return in_array( $pagenow, array( 'post.php', 'post-new.php' ) );
  }
  
  /**
   * Fixes the odd indexing of multiple file uploads.
   *
   * Goes from the format: 
   * $_FILES['field']['key']['index']
   * to
   * The More standard and appropriate:
   * $_FILES['field']['index']['key']
   *
   * @param string $files 
   * @since 1.0
   * @access public
   */
  public function fix_file_array( &$files ) {
    
    $output = array();
    
    foreach ( $files as $key => $list ) {
      foreach ( $list as $index => $value ) {
        $output[$index][$key] = $value;
      }
    }
    
    return $output;
  
  }

  /**
   * Get proper JQuery UI version.
   *
   * Used in order to not conflict with WP Admin Scripts.
   *
   * @since 1.0
   * @access public
   */
  public function get_jqueryui_ver() {
    
    global $wp_version;
    
    if ( version_compare( $wp_version, '3.1', '>=') ) {
      return '1.8.10';
    }
    
    return '1.7.3';
  
  }
  
  /**
   *  Add Field to meta box (generic function)
   *  @author Ohad Raz
   *  @since 1.2
   *  @access public
   *  @param $id string  field id, i.e. the meta key
   *  @param $args mixed|array
   */
  public function addField($id,$args){
    $new_field = array('id'=> $id,'std' => '','desc' => '','style' =>'');
    $new_field = array_merge($new_field, $args);
    $this->_fields[] = $new_field;
  }
  
  
  /**
   *  Add Text Field to meta box
   *  @author Ohad Raz
   *  @since 1.0
   *  @access public
   *  @param $id string  field id, i.e. the meta key
   *  @param $args mixed|array
   *    'name' => // field name/label string optional
   *    'desc' => // field description, string optional
   *    'std' => // default value, string optional
   *    'style' =>   // custom style for field, string optional
   *    'validate_func' => // validate function, string optional
   *   @param $repeater bool  is this a field inside a repeatr? true|false(default) 
   */
  public function addUpload($id,$args){
    $new_field = array('type' => 'upload','id'=> $id,'std' => '','desc' => '','style' =>'','name' => 'Text Field');
    $new_field = array_merge($new_field, $args);
    $this->_fields[] = $new_field;
  }
  
  /**
   *  Add Text Field to meta box
   *  @author Ohad Raz
   *  @since 1.0
   *  @access public
   *  @param $id string  field id, i.e. the meta key
   *  @param $args mixed|array
   *    'name' => // field name/label string optional
   *    'desc' => // field description, string optional
   *    'std' => // default value, string optional
   *    'style' =>   // custom style for field, string optional
   *    'validate_func' => // validate function, string optional
   *   @param $repeater bool  is this a field inside a repeatr? true|false(default) 
   */
  public function addText($id,$args){
    $new_field = array('type' => 'text','id'=> $id,'std' => '','desc' => '','style' =>'','name' => 'Text Field');
    $new_field = array_merge($new_field, $args);
    $this->_fields[] = $new_field;
  }

  /**
   *  Add Hidden Field to meta box
   *  @author Ohad Raz
   *  @since 0.1.3
   *  @access public
   *  @param $id string  field id, i.e. the meta key
   *  @param $args mixed|array
   *    'name' => // field name/label string optional
   *    'desc' => // field description, string optional
   *    'std' => // default value, string optional
   *    'style' =>   // custom style for field, string optional
   *    'validate_func' => // validate function, string optional
   *   @param $repeater bool  is this a field inside a repeatr? true|false(default) 
   */
  public function addHidden($id,$args){
    $new_field = array('type' => 'hidden','id'=> $id,'std' => '','desc' => '','style' =>'','name' => 'Text Field');
    $new_field = array_merge($new_field, $args);
    $this->_fields[] = $new_field;
  }
  
  /**
   *  Add Paragraph to meta box
   *  @author Ohad Raz
   *  @since 0.1.3
   *  @access public
   *  @param $id string  field id, i.e. the meta key
   *  @param $value  paragraph html
   *  @param $repeater bool  is this a field inside a repeatr? true|false(default) 
   */
  public function addParagraph($id,$args){
    $new_field = array('type' => 'paragraph','id'=> $id,'value' => '');
    $new_field = array_merge($new_field, $args);
    $this->_fields[] = $new_field;
  }
    
  /**
   *  Add Checkbox Field to meta box
   *  @author Ohad Raz
   *  @since 1.0
   *  @access public
   *  @param $id string  field id, i.e. the meta key
   *  @param $args mixed|array
   *    'name' => // field name/label string optional
   *    'desc' => // field description, string optional
   *    'std' => // default value, string optional
   *    'validate_func' => // validate function, string optional
   *  @param $repeater bool  is this a field inside a repeatr? true|false(default) 
   */
  public function addCheckbox($id,$args){
    $new_field = array('type' => 'checkbox','id'=> $id,'std' => '','desc' => '','style' =>'','name' => 'Checkbox Field');
    $new_field = array_merge($new_field, $args);
    $this->_fields[] = $new_field;
  }

  /**
   *  Add CheckboxList Field to meta box
   *  @author Ohad Raz
   *  @since 1.0
   *  @access public
   *  @param $id string  field id, i.e. the meta key
   *  @param $options (array)  array of key => value pairs for select options
   *  @param $args mixed|array
   *    'name' => // field name/label string optional
   *    'desc' => // field description, string optional
   *    'std' => // default value, string optional
   *    'validate_func' => // validate function, string optional
   *  @param $repeater bool  is this a field inside a repeatr? true|false(default)
   *  
   *   @return : remember to call: $checkbox_list = get_post_meta(get_the_ID(), 'meta_name', false); 
   *   which means the last param as false to get the values in an array
   */
  public function addCheckboxList($id,$options,$args){
    $new_field = array('type' => 'checkbox_list','id'=> $id,'std' => '','desc' => '','style' =>'','name' => 'Checkbox List Field','options' =>$options,'multiple' => true,);
    $new_field = array_merge($new_field, $args);
    $this->_fields[] = $new_field;
  }
  
  /**
   *  Add Textarea Field to meta box
   *  @author Ohad Raz
   *  @since 1.0
   *  @access public
   *  @param $id string  field id, i.e. the meta key
   *  @param $args mixed|array
   *    'name' => // field name/label string optional
   *    'desc' => // field description, string optional
   *    'std' => // default value, string optional
   *    'style' =>   // custom style for field, string optional
   *    'validate_func' => // validate function, string optional
   *  @param $repeater bool  is this a field inside a repeatr? true|false(default) 
   */
  public function addTextarea($id,$args){
    $new_field = array('type' => 'textarea','id'=> $id,'std' => '','desc' => '','style' =>'','name' => 'Textarea Field');
    $new_field = array_merge($new_field, $args);
    $this->_fields[] = $new_field;
  }
  
  /**
   *  Add Select Field to meta box
   *  @author Ohad Raz
   *  @since 1.0
   *  @access public
   *  @param $id string field id, i.e. the meta key
   *  @param $options (array)  array of key => value pairs for select options  
   *  @param $args mixed|array
   *    'name' => // field name/label string optional
   *    'desc' => // field description, string optional
   *    'std' => // default value, (array) optional
   *    'multiple' => // select multiple values, optional. Default is false.
   *    'validate_func' => // validate function, string optional
   *  @param $repeater bool  is this a field inside a repeatr? true|false(default) 
   */
  public function addSelect($id,$options,$args){
    $new_field = array('type' => 'select','id'=> $id,'std' => array(),'desc' => '','style' =>'','name' => 'Select Field','multiple' => false,'options' => $options);
    $new_field = array_merge($new_field, $args);
    $this->_fields[] = $new_field;
  }
  
  
  /**
   *  Add Radio Field to meta box
   *  @author Ohad Raz
   *  @since 1.0
   *  @access public
   *  @param $id string field id, i.e. the meta key
   *  @param $options (array)  array of key => value pairs for radio options
   *  @param $args mixed|array
   *    'name' => // field name/label string optional
   *    'desc' => // field description, string optional
   *    'std' => // default value, string optional
   *    'validate_func' => // validate function, string optional 
   *  @param $repeater bool  is this a field inside a repeatr? true|false(default)
   */
  public function addRadio($id,$options,$args){
    $new_field = array('type' => 'radio','id'=> $id,'std' => array(),'desc' => '','style' =>'','name' => 'Radio Field','options' => $options);
    $new_field = array_merge($new_field, $args);
    $this->_fields[] = $new_field;
  }


  /**
   *  Add WYSIWYG Field to meta box
   *  @author Ohad Raz
   *  @since 1.0
   *  @access public
   *  @param $id string  field id, i.e. the meta key
   *  @param $args mixed|array
   *    'name' => // field name/label string optional
   *    'desc' => // field description, string optional
   *    'std' => // default value, string optional
   *    'style' =>   // custom style for field, string optional Default 'width: 300px; height: 400px'
   *    'validate_func' => // validate function, string optional 
   *  @param $repeater bool  is this a field inside a repeatr? true|false(default)
   */
  public function addWysiwyg($id,$args){
    $new_field = array('type' => 'wysiwyg','id'=> $id,'std' => '','desc' => '','style' =>'width: 300px; height: 400px','name' => 'WYSIWYG Editor Field');
    $new_field = array_merge($new_field, $args);
    $this->_fields[] = $new_field;
  }
  
  /**
   *  Add Taxonomy Field to meta box
   *  @author Ohad Raz
   *  @since 1.0
   *  @access public
   *  @param $id string  field id, i.e. the meta key
   *  @param $options mixed|array options of taxonomy field
   *    'taxonomy' =>    // taxonomy name can be category,post_tag or any custom taxonomy default is category
   *    'type' =>  // how to show taxonomy? 'select' (default) or 'checkbox_list'
   *    'args' =>  // arguments to query taxonomy, see http://goo.gl/uAANN default ('hide_empty' => false)  
   *  @param $args mixed|array
   *    'name' => // field name/label string optional
   *    'desc' => // field description, string optional
   *    'std' => // default value, string optional
   *    'validate_func' => // validate function, string optional 
   *  @param $repeater bool  is this a field inside a repeatr? true|false(default)
   */
  public function addTaxonomy($id,$options,$args){
    $temp = array(
      'args' => array('hide_empty' => 0),
      'tax' => 'category',
      'type' => 'select');
    $options = array_merge($temp,$options);
    $new_field = array('type' => 'taxonomy','id'=> $id,'desc' => '','name' => 'Taxonomy Field','options'=> $options);
    $new_field = array_merge($new_field, $args);
    $this->_fields[] = $new_field;
  }

  /**
   *  Add posts Field to meta box
   *  @author Ohad Raz
   *  @since 1.0
   *  @access public
   *  @param $id string  field id, i.e. the meta key
   *  @param $options mixed|array options of taxonomy field
   *    'post_type' =>    // post type name, 'post' (default) 'page' or any custom post type
   *    'type' =>  // how to show posts? 'select' (default) or 'checkbox_list'
   *    'args' =>  // arguments to query posts, see http://goo.gl/is0yK default ('posts_per_page' => -1)  
   *  @param $args mixed|array
   *    'name' => // field name/label string optional
   *    'desc' => // field description, string optional
   *    'std' => // default value, string optional
   *    'validate_func' => // validate function, string optional 
   *  @param $repeater bool  is this a field inside a repeatr? true|false(default)
   */
  public function addPosts($id,$options,$args){
    $post_type = isset($options['post_type'])? $options['post_type']: (isset($args['post_type']) ? $args['post_type']: 'post');
    $q = array('posts_per_page' => -1, 'post_type' => $post_type);
    $temp = array('post_type' =>$post_type,'type'=>'select','args'=>$q);
    $options = array_merge($temp,$options);
    $new_field = array('type' => 'posts','id'=> $id,'desc' => '','name' => 'Posts Field','options'=> $options);
    $new_field = array_merge($new_field, $args);
    $this->_fields[] = $new_field;
  }
  
  /**
   * Finish Declaration of Meta Box
   * @author Ohad Raz
   * @since 1.0
   * @access public
   */
  public function Finish() {
    $this->add_missed_values();
  }
  
  /**
   * Helper function to check for empty arrays
   * @author Ohad Raz
   * @since 1.5
   * @access public
   * @param $args mixed|array
   */
  public function is_array_empty($array){
    if (!is_array($array))
      return true;
    
    foreach ($array as $a){
      if (is_array($a)){
        foreach ($a as $sub_a){
          if (!empty($sub_a) && $sub_a != '')
            return false;
        }
      }else{
        if (!empty($a) && $a != '')
          return false;
      }
    }
    return true;
  }


  /**
   * load_textdomain 
   * @author Ohad Raz
   * @since 2.9.4
   * @return void
   */
  public function load_textdomain(){
    //In themes/plugins/mu-plugins directory
    load_textdomain( 'mmb', dirname(__FILE__) . '/lang/' . get_locale() .'mo' );
  }
} // End Class

endif; // End Check Class Exists