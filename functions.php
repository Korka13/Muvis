<?php 
// Register Nav Walker class_alias
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

// Theme Support

function wpb_theme_setup(){
    add_theme_support('post-thumbnails');
    // Nav Menus
    register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'THEMENAME' ),
) );

}

add_action('after_setup_theme','wpb_theme_setup');


// Excerpt Lenght control

function set_excerpt_length(){
    return 45;
}

add_filter('excerpt_length', 'set_excerpt_length');

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

add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="btn btn btn-outline-primary"';
}

function _category_dropdown_filter( $cat_args ) {
    $cat_args['show_option_none'] = __('Categorie');
    return $cat_args;
}
add_filter( 'widget_categories_dropdown_args', '_category_dropdown_filter' );

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