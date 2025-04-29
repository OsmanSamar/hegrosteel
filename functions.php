<?php

// Require Bootstrap navbar walker
require_once('class-wp-bootstrap-navwalker.php');

// Require ACF functions
require_once('functions-acf.php');

// Include js and css
function enqueue_scripts() {
    if(!is_admin()){
        wp_enqueue_style('style', get_stylesheet_directory_uri() . '/css/styles.min.css', array(), '1.0');

        wp_enqueue_script('script', get_stylesheet_directory_uri() . '/js/script.min.js', array('jquery'), '1.0', true);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');
add_action('login_enqueue_scripts', 'enqueue_scripts');


// Register navbar
function register_menu() {
    register_nav_menu('header-menu',__( 'Header Menu' ));
    register_nav_menu('footer-menu', __('Footer Menu'));

}
add_action( 'init', 'register_menu' );

// Return images directory
function get_images_url($filename = ''){
    if (strlen($filename) > 0 && $filename[0] != '/') $filename = '/'.$filename;
    return get_stylesheet_directory_uri().'/images'.$filename;
}

// Remove admin menu items
function remove_menus(){
    remove_menu_page('edit.php');
    remove_menu_page('link-manager.php');
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'remove_menus');
//add_filter('acf/settings/show_admin', '__return_false');

// Add thumbnail support
function thumbnails(){
    add_theme_support( 'post-thumbnails', array('post', 'page','project') );
}
add_action( 'init', 'thumbnails' );

// Rename thumbnails
function change_featured_image_labels( $labels ) {
	$labels->featured_image 	    = 'Header afbeelding';
	$labels->set_featured_image 	= 'Header afbeelding instellen';
	$labels->remove_featured_image 	= 'Verwijder header afbeelding';
	$labels->use_featured_image 	= 'Gebruik als header afbeelding';

	return $labels;
}
add_filter( 'post_type_labels_page', 'change_featured_image_labels', 10, 1 );

function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function create_project_post_type()
{

    register_post_type(
        'project',
        // CPT Options
        array(
            'labels' => array(
                'name' => __('project'),
                'singular_name' => __('projecten')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'projecten'),
            'show_in_rest' => false,
            'publicly_queryable' => true,
            'supports' => ['title', 'thumbnail']
        )
    );
}
add_action('init', 'create_project_post_type');

function create_categories_taxonomy()
{
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name' => 'Project Categorieën',
        'singular_name' => 'Project Categorie',
        'search_items' => 'Search Categories',
        'all_items' => 'All Categories',
        'parent_item' => 'Parent Category',
        'parent_item_colon' => 'Parent Category:',
        'edit_item' => 'Edit Category',
        'update_item' => 'Update Category',
        'add_new_item' => 'Add New Category',
        'new_item_name' => 'New Category Name',
        'menu_name' => 'Categories',
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'project-category'),
    );

    register_taxonomy('project_category', 'project', $args);

      // Add new taxonomy, make it hierarchical (like categories)
      $labels2 = array(
        'name' => 'plaats',
        'singular_name' => 'plaats',
        'search_items' => 'Search plaats',
        'all_items' => 'All plaats',
        'parent_item' => 'Parent plaats',
        'parent_item_colon' => 'Parent plaats:',
        'edit_item' => 'Edit plaats',
        'update_item' => 'Update plaats',
        'add_new_item' => 'Add New plaats',
        'new_item_name' => 'New plaats Name',
        'menu_name' => 'Categories',
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels2,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'plaats'),
    );

    register_taxonomy('plaats', 'project', $args);

}
add_action('init', 'create_categories_taxonomy');