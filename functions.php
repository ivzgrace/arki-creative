<?php 
/** functions **/

// Register Custom Navigation Walker
require_once('wp-bootstrap-navwalker.php');

if ( ! isset( $content_width ) )
    $content_width = 1050; /* pixels */
 
 /* set-up theme*/
if ( ! function_exists( 'myfirsttheme_setup' ) ) :

    function luisatheme_setup() {
     
        /**
         * Add default posts and comments RSS feed links to <head>.
         */
        add_theme_support( 'automatic-feed-links' );
     
        /**
         * Enable support for post thumbnails and featured images.
         */
        add_theme_support( 'post-thumbnails' );
     
        register_nav_menus( array(
            'primary'   => __( 'Primary Menu', 'luisatheme' ),
            'footer' => __('Footer Menu', 'luisatheme' )
        ) );
     
        add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );

        register_sidebar( array(
            'name' => __( 'Main Sidebar', 'luisatheme' ),
            'id' => 'sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => "</aside>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ) );
        register_sidebar( array(
            'name' => __( 'Arki on TV Sidebar', 'luisatheme' ),
            'id' => 'sidebar-arkitv',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => "</aside>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ) );

    }
endif; // myfirsttheme_setup

add_action( 'after_setup_theme', 'luisatheme_setup' );
/* end of setup */

/* add assets */
function my_assets() {
    wp_enqueue_style( 'responsive', get_stylesheet_directory_uri() . '/css/bootstrap.min.css' );
    wp_enqueue_style( 'bxslider', get_stylesheet_directory_uri() . '/css/jquery.bxslider.min.css' );
    wp_enqueue_style( 'theme-style', get_stylesheet_directory_uri(). '/css/theme.css');
    
    if(!is_admin()){
        //wp_deregister_script('jquery');  
        //wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', FALSE, '3.2.1', TRUE); 
        wp_enqueue_script( 'jquery');


        wp_register_script('responsive-script', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.7', TRUE); 
        wp_enqueue_script( 'responsive-script');

        wp_register_script('slider', get_stylesheet_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), '4.2.7', TRUE); 
        wp_enqueue_script( 'slider');

        wp_register_script('theme-scripts', get_stylesheet_directory_uri() . '/js/theme-scripts.js', array('jquery'), '1.0', TRUE);
        wp_enqueue_script( 'theme-scripts');
   }
}

add_action( 'wp_enqueue_scripts', 'my_assets' );
/* end */

/* add custom field to portfolios */

function portfolio_init() {
    $labels = array(
        'name'               => _x( 'Portfolio', 'post type general name'),
        'menu_name'          => _x( 'Portfolio', 'admin menu'),
        'add_new'            => _x( 'Add New', 'portfolios'),
        'add_new_item'       => __( 'Add New Portfolio')
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'portfolios'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        'supports' => array(
            'title',
            'editor',
            'revisions',
            'thumbnail',)
        );
		
    register_post_type( 'portfolios', $args );
	
	register_post_type(
		'press', array(
		  'labels' => array('name' => __( 'Press Media' ), 'singular_name' => __( 'Press Media' ), 'add_new_item'       => __( 'Add New Media') ),
		  'public' => true,
		  'show_ui' => true,
		  'capability_type' => 'post',
		  'rewrite' => array('slug' => 'media'),
		  'has_archive' => true,
		  'query_var' => true,
          'menu_icon' => 'dashicons-admin-post',
		  'supports' => array('title', 'editor', 'revisions' , 'thumbnail')
		)
	 );
     register_post_type(
        'episode', array(
          'labels' => array('name' => __( 'Episode' ), 'singular_name' => __( 'Episode' ), 'add_new_item'       => __( 'Add New Episode') ),
          'public' => true,
          'show_ui' => true,
          'capability_type' => 'post',
          'rewrite' => array('slug' => 'episode'),
          'has_archive' => true,
          'query_var' => true,
          'menu_icon' => 'dashicons-admin-post',
          'supports' => array('title', 'editor', 'revisions' , 'thumbnail')
        )
     );
}
add_action( 'init', 'portfolio_init' );


add_filter( 'rwmb_meta_boxes', 'portfolio_meta_boxes' );

function portfolio_meta_boxes( $meta_boxes ) {
    $prefix = 'rw_';
    // 1st meta box Portfolio
    $meta_boxes[] = array(
        'title'      => __( 'Gallery', 'textdomain' ),
        'post_types' => array( 'portfolios' ),
        'fields'     => array(
            array(
                'name'             => esc_html__( 'Upload Photos', $prefix ),
                'id'               => $prefix . "plupload",
                'type'             => 'plupload_image',
                // Delete image from Media Library when remove it from post meta?
                // Note: it might affect other posts if you use same image for multiple posts
                'force_delete'     => false,
                // Maximum image uploads
                'max_file_uploads' => 50,
                // Display the "Uploaded 1/50 files" status
                'max_status'       => true,
            ),
        )
    );


	
	 // 2nd meta box Media
	 $meta_boxes[] = array(
        'title'      => __( 'Media Published', 'textdomain' ),
        'post_types' => array('press'),
        'fields' => array(
            array(
                'name'  => __( 'Date', 'textdomain' ),
                'desc'  => 'Format: Month Year',
                'id'    => $prefix . 'datepub',
                'type'  => 'text',
                'std'   => 'February 2017',
            ),
        )
    );

     $meta_boxes[] = array(
        'title'      => __( 'List of Images', 'textdomain' ),
        'post_types' => array('episode'),
        'fields'     => array(
            array(
                'name'             => esc_html__( 'Upload Images', $prefix ),
                'id'               => $prefix . "epupload",
                'type'             => 'plupload_image',
                // Delete image from Media Library when remove it from post meta?
                // Note: it might affect other posts if you use same image for multiple posts
                'force_delete'     => false,
                // Maximum image uploads
                'max_file_uploads' => 50,
                // Display the "Uploaded 1/50 files" status
                'max_status'       => true,
            ),
        )
    );
	
	
    return $meta_boxes;
}
/* end of metaboxes */

/* portfolio thumbnails */
add_theme_support( 'post-thumbnails', array( 'portfolios','press', 'episode') );;
add_image_size( 'portfolio-thumb', 375, 220, true ); // Crop Mode
add_image_size( 'press-thumb', 183, 259, true ); // Crop Mode
add_image_size( 'arki-thumb', 600, 400, true ); // Crop Mode
