<?php

function theme_setup() {
  // Menus
  register_nav_menu( 'main', 'Main Menu' );
  register_nav_menu( 'mobile_main', 'Mobile Main Menu' );
  register_nav_menu( 'footer', 'Footer Menu' );
  // RSS Feed
  add_theme_support( 'automatic-feed-links' );
  // Thumbnails
  add_theme_support( 'post-thumbnails' );
  add_image_size( 'thumb', 150, 150, true ); // Normal thumbnail size
  add_image_size( 'large-thumb', 300, 300, true ); // Large thumbnail size 
  add_image_size( 'featured-img', 740, 420, true ); // Featured Image size 
  add_image_size( 'background-img', 1400, 700, true ); // Featured Image size 
}
add_action( 'after_setup_theme', 'theme_setup' );

// Enqueue styles
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
  wp_enqueue_style( 'main', get_stylesheet_directory_uri().'/css/main.css', false, '1.2.1' );
}

// Enqueue scripts
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );
function theme_enqueue_scripts() {
  wp_deregister_script( 'jquery' ); // Deregister to put jQuery into footer
  wp_register_script( 'jquery', get_stylesheet_directory_uri().'/js/jquery.min.js', false, null);
  wp_enqueue_script( 'jquery' ); // Re-register jQuery
  wp_enqueue_script( 'jquery-ui', get_stylesheet_directory_uri().'/js/jquery-ui.js', 'jquery', NULL, false );
  wp_enqueue_script( 'modernizr', get_stylesheet_directory_uri().'/js/application.min.js', 'jquery', NULL, true );
  wp_enqueue_script( 'theme-functions', get_stylesheet_directory_uri().'/js/functions.js', 'jquery', NULL , true );
}

// Disable Emoji Loading
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Disable WP Embed
function my_deregister_scripts() {
 wp_dequeue_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );

// Update Checker
require 'plugin-update-checker/plugin-update-checker.php';
	$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://github.com/olospo/moorland-fuels',
    __FILE__
);

$myUpdateChecker->setAuthentication('937e9437377421d55251f14d4696212fc450efdc');
$myUpdateChecker->setBranch('master');

// Options Page

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> true,
		'menu_position'       => 20,
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}

// Excerpt Length
function excerpt_length($length) {
  return 30;
}
add_filter('excerpt_length', 'excerpt_length');

// Read More after excerpt
function new_excerpt_more($more) {
  global $post;
	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Get ID from Page Name
function ID_from_page_name($page_name)
{
	global $wpdb;
	$page_name_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$page_name."'");
	return $page_name_id;
}


// Pagination
function numeric_posts_nav() {
	if( is_singular() )
		return;
	global $wp_query;
	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;
	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );
	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;
	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}
	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}
	echo '<div class="pagination"><ul>' . "\n";
	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li class="prev">%s</li>' . "\n", get_previous_posts_link('< Previous Page') );
	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}
	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}
	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";
		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}
	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li class="next">%s</li>' . "\n", get_next_posts_link('Next Page >') );
	echo '</ul></div>' . "\n";
}
// This stuff fixes the pagination issue with custom posts. 
function remove_page_from_query_string($query_string)
{ 
    if ($query_string['name'] == 'page' && isset($query_string['page'])) {
        unset($query_string['name']);
        // 'page' in the query_string looks like '/2', so i'm spliting it out
        list($delim, $page_index) = split('/', $query_string['page']);
        $query_string['paged'] = $page_index;
    }      
    return $query_string;
}
add_filter('request', 'remove_page_from_query_string');
function fix_category_pagination($qs){
	if(isset($qs['category_name']) && isset($qs['paged'])){
		$qs['post_type'] = get_post_types($args = array(
			'public'   => true,
			'_builtin' => false
		));
		array_push($qs['post_type'],'post');
	}
	return $qs;
}
add_filter('request', 'fix_category_pagination');

// Remove Menu Items 
function remove_menus(){
  remove_menu_page( 'edit-comments.php' );          //Comments
  remove_menu_page( 'tools.php' );                  //Tools
}
add_action( 'admin_menu', 'remove_menus' );

function custom_post_type() {
  
  // Services Post Type
	$labels = array(
		'name'                => _x( 'Services', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Service', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Services', 'text_domain' ),
		'all_items'           => __( 'All Services', 'text_domain' ),
		'view_item'           => __( 'View Service', 'text_domain' ),
		'add_new_item'        => __( 'Add New Service', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Service', 'text_domain' ),
		'update_item'         => __( 'Update Service', 'text_domain' ),
		'search_items'        => __( 'Search Services', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'Services', 'text_domain' ),
		'description'         => __( 'Moorland Fuels Services', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom fields' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-admin-tools',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'services', $args );
	
	// Tanks Post Type
	$labels = array(
		'name'                => _x( 'Tanks', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Tank', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Tanks', 'text_domain' ),
		'all_items'           => __( 'All Tank', 'text_domain' ),
		'view_item'           => __( 'View Tank', 'text_domain' ),
		'add_new_item'        => __( 'Add New Tank', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Tank', 'text_domain' ),
		'update_item'         => __( 'Update Tank', 'text_domain' ),
		'search_items'        => __( 'Search Tanks', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'Tanks', 'text_domain' ),
		'description'         => __( 'Moorland Fuels Tanks', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom fields' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 21,
		'menu_icon'           => 'dashicons-filter',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'tanks', $args );
		
}
// Hook into the 'init' action
add_action( 'init', 'custom_post_type', 0 );

add_action( 'init', 'custom_taxonomy', 0 );

function custom_taxonomy() {
 
  $labels = array(
    'name' => _x( 'Types', 'taxonomy general name' ),
    'singular_name' => _x( 'Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Types' ),
    'all_items' => __( 'All Types' ),
    'parent_item' => __( 'Parent Type' ),
    'parent_item_colon' => __( 'Parent Type:' ),
    'edit_item' => __( 'Edit Type' ), 
    'update_item' => __( 'Update Type' ),
    'add_new_item' => __( 'Add New Type' ),
    'new_item_name' => __( 'New Type Name' ),
    'menu_name' => __( 'Types' ),
  ); 	
 
  register_taxonomy('types',array('tanks'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'type' ),
  ));
}

// CPT Menu Item

add_filter('nav_menu_css_class', 'current_type_nav_class', 10, 2);
function current_type_nav_class($classes, $item) {
  // Get post_type for this post
  $post_type = get_query_var('post_type');

  // Go to Menus and add a menu class named: {custom-post-type}-menu-item
  // This adds a 'current_page_parent' class to the parent menu item
  if( in_array( $post_type.'-menu-item', $classes ) )
      array_push($classes, 'current_page_parent');

  return $classes;
}

class childNav extends Walker_page {
  public function start_el(&$output, $page, $depth = 0, $args = array(), $current_page = 0) {
    if($depth)
        $indent = str_repeat("\t", $depth);
    else
        $indent = '';
    extract($args, EXTR_SKIP);
    $css_class = array('page_item');
    if(!empty($current_page)) {
        $_current_page = get_page( $current_page );
        $children = get_children('post_parent='.$page->ID);
        if(count($children) != 0) {
            $css_class[] = 'hasChildren';
        }
        if(isset($_current_page->ancestors) && in_array($page->ID, (array) $_current_page->ancestors))
            $css_class[] = 'current_page_ancestor';
        if($page->ID == $current_page)
            $css_class[] = 'current_page_item';
        elseif($_current_page && $page->ID == $_current_page->post_parent)
            $css_class[] = 'current_page_parent';
    } elseif($page->ID == get_option('page_for_posts')) {
        $css_class[] = 'current_page_parent';
    }
    $css_class = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );
    if($page->ID == $current_page) {
        $output .= $indent .'<li class="' . $css_class . '"><a href="' . get_permalink($page->ID) . '">' . $page->post_title .'</a>';
    } else {
        $output .= $indent .'<li class="' . $css_class . '"><a href="' . get_permalink($page->ID) . '">' . $page->post_title .'</a>';
    }
  }
}

// Add CPT to Search

add_filter( 'pre_get_posts', 'cpt_search' );
/**
 * This function modifies the main WordPress query to include an array of 
 * post types instead of the default 'post' post type.
 *
 * @param object $query  The original query.
 * @return object $query The amended query.
 */
function cpt_search( $query ) {
  if ( $query->is_search ) {
    $query->set( 'post_type', array( 'post', 'tanks', 'services' ) );
  }
  return $query;  
}

?>