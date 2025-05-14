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
    add_theme_support( 'post-thumbnails', array('post', 'page','project','vacature') );
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

//To create porjecten post
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


//
function create_vacature_post_type()
{

    register_post_type(
        'vacature',
        // CPT Options
        array(
            'labels' => array(
                'name' => __('vacature'),
                'singular_name' => __('vacatures')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'vacature'),
            'show_in_rest' => false,
            'publicly_queryable' => true,
            'supports' => ['title', 'thumbnail']
        )
    );
}
add_action('init', 'create_vacature_post_type');


//
function create_vacature_categories_taxonomy()
{
      //1 Add new taxonomy, make it hierarchical (like categories)
      $labels = array(
        'name' => 'salary',
        'singular_name' => 'salary',
        'search_items' => 'Search salary',
        'all_items' => 'All salary',
        'parent_item' => 'Parent salary',
        'parent_item_colon' => 'Parent salary:',
        'edit_item' => 'Edit salary',
        'update_item' => 'Update salary',
        'add_new_item' => 'Add New salary',
        'new_item_name' => 'New salary Name',
        'menu_name' => 'Salary',
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'salary'),
    );

    register_taxonomy('salary', 'vacature', $args);

  

      //2 Add new taxonomy, make it hierarchical (like categories)
      $labels2 = array(
        'name' => 'uren',
        'singular_name' => 'uren',
        'search_items' => 'Search uren',
        'all_items' => 'All uren',
        'parent_item' => 'Parent uren',
        'parent_item_colon' => 'Parent uren:',
        'edit_item' => 'Edit uren',
        'update_item' => 'Update uren',
        'add_new_item' => 'Add New uren',
        'new_item_name' => 'New uren Name',
        'menu_name' => 'Uren',
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels2,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'uren'),
    );

    register_taxonomy('uren', 'vacature', $args);



      //3Add new taxonomy, make it hierarchical (like categories)
      $labels3 = array(
        'name' => 'vakantiedagen',
        'singular_name' => 'vakantiedagen',
        'search_items' => 'Search vakantiedagen',
        'all_items' => 'All vakantiedagen',
        'parent_item' => 'Parent vakantiedagen',
        'parent_item_colon' => 'Parent vakantiedagen:',
        'edit_item' => 'Edit vakantiedagen',
        'update_item' => 'Update vakantiedagen',
        'add_new_item' => 'Add New vakantiedagen',
        'new_item_name' => 'New vakantiedagen Name',
        'menu_name' => 'Vakantiedagen',
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels3,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'vakantiedagen'),
    );

    register_taxonomy('vakantiedagen', 'vacature', $args);



      //4 Add new taxonomy, make it hierarchical (like categories)
      $labels4 = array(
        'name' => 'pensioenregeling',
        'singular_name' => 'pensioenregeling',
        'search_items' => 'Search pensioenregeling',
        'all_items' => 'All pensioenregeling',
        'parent_item' => 'Parent pensioenregeling',
        'parent_item_colon' => 'Parent pensioenregeling:',
        'edit_item' => 'Edit pensioenregeling',
        'update_item' => 'Update pensioenregeling',
        'add_new_item' => 'Add New pensioenregeling',
        'new_item_name' => 'New pensioenregeling Name',
        'menu_name' => 'Pensioenregeling',
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels4,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'pensioenregeling'),
    );

    register_taxonomy('pensioenregeling', 'vacature', $args);

}
add_action('init', 'create_vacature_categories_taxonomy');



add_action('rest_api_init', function () {
    register_rest_route('hegrosteel/v1', '/project', [
        'methods' => 'GET',
        'callback' => function () {
            $args = [
                'post_type' => 'project',
                'posts_per_page' => 8,
                'orderby' => 'date',
                'order' => 'DESC',
                'paged' => intval($_GET['page'] ?? 1),
                's' => $_GET['search'] ?? '',
                'meta_query' => [],
                'tax_query' => [],
            ];

            if(isset($_GET['project_category'])) {
                $args['tax_query'] = [
                    [
                        'taxonomy' => 'project_category',
                        'field' => 'slug',
                        'terms' => $_GET['project_category'],
                    ],
                ];
            }

            if(isset($_GET['plaats'])) {
                $args['tax_query'] = [
                    [
                        'taxonomy' => 'plaats',
                        'field' => 'slug',
                        'terms' => $_GET['plaats'],
                    ],
                ];
            }

          

            $query = new \WP_Query($args);
            $posts = $query->posts;

            $html = '';
            ob_start();
            foreach ($posts as $post) {
                get_template_part( 'components/projectcard', null, ['post'=>$post]);
            }
            $html = ob_get_clean();
            
            ob_start();
            get_template_part( 'components/pagination', null, ['paginator' => [
                'max_num_pages' => $query->max_num_pages,
                'current_page' => intval($_GET['page'] ?? 1),
            ]]);
            $pagination = ob_get_clean();
            return [
                'html' => $html,
                'count' => $query->found_posts,
                'pages' => $query->max_num_pages,
                'more' => $query->max_num_pages > ($_GET['page'] ?? 1),
                'pagination' => $pagination,
            ];
        },
        'permission_callback' => '__return_true',
    ]);
});
