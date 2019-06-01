<?php 
// Register Nav Walker class_alias
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

// Theme Support

function wpb_theme_setup(){
    add_theme_support('post-thumbnails');
    // Nav Menus
    register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'THEMENAME' ),
	'footer' => __( 'Footer Menu', 'THEMENAME' ),
) );

}

add_action('after_setup_theme','wpb_theme_setup');


// Excerpt Lenght control

function set_excerpt_length(){
    return 45;
}

add_filter('excerpt_length', 'set_excerpt_length');

// Widgets sidebar
function wpb_init_widgets($id){
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar',
        'description'   => 'Sidebar at the right of content. It is visible only on screen wider than 576px (No bootstrap xs class)',
        'before_widget' => '<div class="sidebar-module">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => 'Navbar',
        'id' => 'navbar',
        'description'   => 'Adds links to the collapsable navbar. visible only in screen smaller than 576px (bootstrap xs class). Good to substitute the sidebar',
        'before_widget' => '<div class="m-1 d-xs-inline d-sm-none nav-drop">',
        'after_widget' => '</div>',
        'before_title' => '<span class="d-none">',
        'after_title' => '</span>'
    ));

}

add_action('widgets_init', 'wpb_init_widgets');

// Pagination
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="btn btn btn-outline-primary"';
}

// Change “Select Category” Name Within Category Dropdown Widget

function _category_dropdown_filter( $cat_args ) {
    $cat_args['show_option_none'] = __('Categorie');
    return $cat_args;
}
add_filter( 'widget_categories_dropdown_args', '_category_dropdown_filter' );

// post enumeration
function Get_Post_Number($postID){
	$temp_query = $wp_query;
	$postNumberQuery = new WP_Query('orderby=date&order=<strong>DESC</strong>&posts_per_page=-1');
	$counter = 1;
	$postCount = 0;
	if($postNumberQuery->have_posts()) :
		while ($postNumberQuery->have_posts()) : $postNumberQuery->the_post();
			if ($postID == get_the_ID()){
				$postCount = $counter;
			} else {
				$counter++;
			}
	endwhile; endif;
	wp_reset_query();
	$wp_query = $temp_query;
	return $postCount;
}

// require Advanced Custom Fields plugin
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'muvis_register_required_plugins' );

function muvis_register_required_plugins() {

	$plugins = array(

		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name'               => 'TGM Example Plugin', // The plugin name.
			'slug'               => 'tgm-example-plugin', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/inc/advanced-custom-fields.5.8.0.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),


	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'muvis',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

	
	);

	tgmpa( $plugins, $config );
}

// Advanced Custom Fields configuration

if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array(
    'key' => 'group_5c7e45a630b0c',
    'title' => 'Film',
    'fields' => array(
      array(
        'key' => 'field_5ca5e7a4b0a9b',
        'label' => 'Durata',
        'name' => 'durata',
        'type' => 'text',
        'instructions' => 'per esempio "2 ore" o "123 minuti"',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
      ),
      array(
        'key' => 'field_5ca5ea85ae2af',
        'label' => 'Premi',
        'name' => 'premi',
        'type' => 'textarea',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'maxlength' => '',
        'rows' => '',
        'new_lines' => '',
      ),
      array(
        'key' => 'field_5c7e473e49d9a',
        'label' => 'Compra Qty',
        'name' => 'compra',
        'type' => 'number',
        'instructions' => '',
        'required' => 1,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => 0,
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'min' => '',
        'max' => '',
        'step' => '',
      ),
      array(
        'key' => 'field_5c7e6a39fa3cf',
        'label' => 'Link Compra 1',
        'name' => 'link_compra_1',
        'type' => 'link',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => array(
          array(
            array(
              'field' => 'field_5c7e473e49d9a',
              'operator' => '>',
              'value' => '0',
            ),
          ),
        ),
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'return_format' => 'array',
      ),
      array(
        'key' => 'field_5c7e6afdfa3d0',
        'label' => 'Link Compra 2',
        'name' => 'link_compra_2',
        'type' => 'link',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => array(
          array(
            array(
              'field' => 'field_5c7e473e49d9a',
              'operator' => '>',
              'value' => '1',
            ),
          ),
        ),
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'return_format' => 'array',
      ),
      array(
        'key' => 'field_5c7e6b3819f61',
        'label' => 'Link Compra 3',
        'name' => 'link_compra_3',
        'type' => 'link',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => array(
          array(
            array(
              'field' => 'field_5c7e473e49d9a',
              'operator' => '>',
              'value' => '2',
            ),
          ),
        ),
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'return_format' => 'array',
      ),
      array(
        'key' => 'field_5c7e6c2972390',
        'label' => 'Link Compra 4',
        'name' => 'link_compra_4',
        'type' => 'link',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => array(
          array(
            array(
              'field' => 'field_5c7e473e49d9a',
              'operator' => '>',
              'value' => '3',
            ),
          ),
        ),
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'return_format' => 'array',
      ),
      array(
        'key' => 'field_5c7e475449d9b',
        'label' => 'Satreaming Qty',
        'name' => 'satreaming',
        'type' => 'number',
        'instructions' => '',
        'required' => 1,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => 0,
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'min' => '',
        'max' => '',
        'step' => '',
      ),
      array(
        'key' => 'field_5c7e6c3572391',
        'label' => 'Link Streaming 1',
        'name' => 'link_streaming_1',
        'type' => 'link',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => array(
          array(
            array(
              'field' => 'field_5c7e475449d9b',
              'operator' => '>',
              'value' => '0',
            ),
          ),
        ),
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'return_format' => 'array',
      ),
      array(
        'key' => 'field_5c7e6c9772392',
        'label' => 'Link Streaming 2',
        'name' => 'link_streaming_2',
        'type' => 'link',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => array(
          array(
            array(
              'field' => 'field_5c7e475449d9b',
              'operator' => '>',
              'value' => '1',
            ),
          ),
        ),
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'return_format' => 'array',
      ),
      array(
        'key' => 'field_5c7e6cb572394',
        'label' => 'Link Streaming 3',
        'name' => 'link_streaming_3',
        'type' => 'link',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => array(
          array(
            array(
              'field' => 'field_5c7e475449d9b',
              'operator' => '>',
              'value' => '2',
            ),
          ),
        ),
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'return_format' => 'array',
      ),
      array(
        'key' => 'field_5c7e6cb972395',
        'label' => 'Link Streaming 4',
        'name' => 'link_streaming_4',
        'type' => 'link',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => array(
          array(
            array(
              'field' => 'field_5c7e475449d9b',
              'operator' => '>',
              'value' => '3',
            ),
          ),
        ),
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'return_format' => 'array',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'post',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
  ));
  
  endif;

  // Custom taxonomies
add_action( 'init', 'create_directors' );
function create_directors() {
 $labels = array(
    'name' => _x( 'Directors', 'taxonomy general name' ),
    'singular_name' => _x( 'Director', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Directors' ),
    'all_items' => __( 'All Directors' ),
    'edit_item' => __( 'Edit Director' ), 
    'update_item' => __( 'Update Director' ),
    'add_new_item' => __( 'Add New Director' ),
    'new_item_name' => __( 'New Director Name' ),
  ); 	
 
  register_taxonomy('director','post',array(
    'hierarchical' => false,
    'show_in_rest' => true,
    'public' => true,
    'labels' => $labels
  ));
}

add_action( 'init', 'create_cast' );
function create_cast() {
 $labels = array(
    'name' => _x( 'Cast', 'taxonomy general name' ),
    'singular_name' => _x( 'Actor', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Actors' ),
    'all_items' => __( 'All Actors' ),
    'edit_item' => __( 'Edit Actors' ), 
    'update_item' => __( 'Update Actors' ),
    'add_new_item' => __( 'Add New Actor' ),
    'new_item_name' => __( 'New Actor Name' ),
  ); 	
 
  register_taxonomy('cast','post',array(
    'hierarchical' => false,
    'show_in_rest' => true,
    'public' => true,
    'labels' => $labels
  ));
}

add_action( 'init', 'create_anno' );
function create_anno() {
 $labels = array(
    'name' => _x( 'Anno', 'taxonomy general name' ),
    'singular_name' => _x( 'Anno', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Anno' ),
    'all_items' => __( 'All Anno' ),
    'edit_item' => __( 'Edit Anno' ), 
    'update_item' => __( 'Update Anno' ),
    'add_new_item' => __( 'Add New Anno' ),
    'new_item_name' => __( 'New Anno Name' ),
  ); 	
 
  register_taxonomy('anno','post',array(
    'hierarchical' => false,
    'show_in_rest' => true,
    'public' => true,
    'labels' => $labels
  ));
}

add_action( 'init', 'create_country' );
function create_country() {
 $labels = array(
    'name' => _x( 'Country', 'taxonomy general name' ),
    'singular_name' => _x( 'Country', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Country' ),
    'all_items' => __( 'All Country' ),
    'edit_item' => __( 'Edit Country' ), 
    'update_item' => __( 'Update Country' ),
    'add_new_item' => __( 'Add New Country' ),
    'new_item_name' => __( 'New Country Name' ),
  ); 	
 
  register_taxonomy('country','post',array(
    'hierarchical' => false,
    'show_in_rest' => true,
    'public' => true,
    'labels' => $labels
  ));
}