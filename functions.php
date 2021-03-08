<?php
function my_theme_enqueue_styles() {
 
    $parent_style = 'default';
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function create_posttype() {
  register_post_type( 'doctor',
    array(
      'labels' => array(
        'name' => __( 'Doctors' ),
        'singular_name' => __( 'Doctor' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'doctors'),
      'taxonomies'          => array( 'category' ),	
      'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'post-formats' ),
    )
  );
  register_post_type( 'video',
    array(
      'labels' => array(
        'name' => __( 'Videos' ),
        'singular_name' => __( 'Video' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'videos'),
      'taxonomies'          => array( 'category' ),	
      'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'post-formats'),
    )
  );
  // register_post_type( 'event',
  //   array(
  //     'labels' => array(
  //       'name' => __( 'Events' ),
  //       'singular_name' => __( 'Event' )
  //     ),
  //     'public' => true,
  //     'has_archive' => true,
  //     'rewrite' => array('slug' => 'events'),
  //     'taxonomies'          => array( 'category' ),	
  //     'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields','post-formats' ),
  //   )
  // );
}


add_action( 'init', 'create_posttype' );

?>