<?php
function theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
add_filter('widget_text', 'do_shortcode');

function world_lang_theme_js() {
    wp_enqueue_script( 'world_lang_theme_js', get_stylesheet_directory_uri() . '/js/world-lang.js', array( 'jquery' ), '1.0', true );
}

add_action('wp_enqueue_scripts', 'world_lang_theme_js');



//function to call first uploaded image in functions file
function main_image() {
$files = get_children('post_parent='.get_the_ID().'&post_type=attachment
&post_mime_type=image&order=desc');
  if($files) :
    $keys = array_reverse(array_keys($files));
    $j=0;
    $num = $keys[$j];
    $image=wp_get_attachment_image($num, 'large', true);
    $imagepieces = explode('"', $image);
    $imagepath = $imagepieces[1];
    $main=wp_get_attachment_url($num);
		$template=get_template_directory();
		$the_title=get_the_title();
    print "<img src='$main' alt='$the_title' class='frame' />";
  endif;
}

function custom_post_type_Module() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Modules', 'Post Type General Name', 'world_lang' ),
        'singular_name'       => _x( 'Module', 'Post Type Singular Name', 'world_lang' ),
        'menu_name'           => __( 'Modules', 'world_lang' ),
        'parent_item_colon'   => __( 'Parent Module', 'world_lang' ),
        'all_items'           => __( 'All Modules', 'world_lang' ),
        'view_item'           => __( 'View Module', 'world_lang' ),
        'add_new_item'        => __( 'Add New Module', 'world_lang' ),
        'add_new'             => __( 'Add New', 'world_lang' ),
        'edit_item'           => __( 'Edit Module', 'world_lang' ),
        'update_item'         => __( 'Update Module', 'world_lang' ),
        'search_items'        => __( 'Search Module', 'world_lang' ),
        'not_found'           => __( 'Module Not Found', 'world_lang' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'world_lang' ),
    );
    
// Set other options for Custom Post Type
    
    $args = array(
        'label'               => __( 'Modules', 'world_lang' ),
        'description'         => __( 'Building activities', 'world_lang' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'Module' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */  
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
         'show_in_rest'       => true,
    );
// Registering your Custom Post Type
    register_post_type( 'Modules', $args );

}   
add_action( 'init', 'custom_post_type_Module', 0 );

//Kultura Oembed attempt


 add_action( 'init', 'kaltura_add_oembed_handlers');
function kaltura_add_oembed_handlers(){
    wp_oembed_add_provider( 'https://vcu.mediaspace.kaltura.com//id/*', 'http://vcu.mediaspace.kaltura.com/oembed/', false );
}