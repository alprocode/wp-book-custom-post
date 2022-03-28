<?php 

///Create Book Post Type
 
function aj_book_post_type() {
    $labels = array(

        'name'                  => _x( 'Books', 'Post type general name', 'ajbook' ),

        'singular_name'         => _x( 'Book', 'Post type singular name', 'ajbook' ),

        'menu_name'             => _x( 'Books', 'Admin Menu text', 'ajbook' ),

        'name_admin_bar'        => _x( 'Book', 'Add New on Toolbar', 'ajbook' ),

        'add_new'               => __( 'Add New', 'ajbook' ),

        'add_new_item'          => __( 'Add New Book', 'ajbook' ),

        'new_item'              => __( 'New Book', 'ajbook' ),

        'edit_item'             => __( 'Edit Book', 'ajbook' ),

        'view_item'             => __( 'View Book', 'ajbook' ),

        'all_items'             => __( 'All Books', 'ajbook' ),

        'search_items'          => __( 'Search Books', 'ajbook' ),

        'parent_item_colon'     => __( 'Parent Books:', 'ajbook' ),

        'not_found'             => __( 'No book found.', 'ajbook' ),

        'not_found_in_trash'    => __( 'No book found in Trash.', 'ajbook' ),

        'featured_image'        => _x( 'Book Cover Image', '', 'ajbook' ),

        'set_featured_image'    => _x( 'Set cover image', '', 'ajbook' ),

        'remove_featured_image' => _x( 'Remove cover image', '', 'ajbook' ),

        'use_featured_image'    => _x( 'Use as cover image', '', 'ajbook' ),

        'archives'              => _x( 'Book archives', '', 'ajbook' ),

        'insert_into_item'      => _x( 'Insert into book', '', 'ajbook' ),

        'uploaded_to_this_item' => _x( 'Uploaded to this book', '', 'ajbook' ),

        'filter_items_list'     => _x( 'Filter books list', '', 'ajbook' ),

        'items_list_navigation' => _x( 'Books list navigation', '', 'ajbook' ),

        'items_list'            => _x( 'Books list', '', 'ajbook' ),

    );

    $args = array(

        'labels'             => $labels,

        'public'             => true,

        'publicly_queryable' => true,

        'show_ui'            => true,

        'show_in_menu'       => true,

        'query_var'          => true,

        'rewrite'            => array( 'slug' => 'book' ),

        'capability_type'    => 'post',

        'has_archive'        => true,

        'hierarchical'       => false,

        'menu_position'      => null,

        'show_in_rest'       => true,

        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        
        'menu_icon'          =>  'dashicons-book',

    );

    register_post_type( 'book', $args );
}

add_action( 'init', 'aj_book_post_type' );

/**
 * Update title placeholder
 */
function ajbook_update_book_title_placeholder() {
    $screen = get_current_screen();
    if( 'book' === $screen->post_type ) {
        $title = 'Add Book Title Here';
    }

    return $title;
}
add_filter('enter_title_here', 'ajbook_update_book_title_placeholder');