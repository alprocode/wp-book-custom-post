<?php 

function aj_book_taxonomy() {
    $labels = array(

        'name'              => _x( 'Categories', 'taxonomy general name', 'ajbook' ),

        'singular_name'     => _x( 'Category', 'taxonomy singular name', 'ajbook' ),

        'menu_name'         => __( 'Categories', 'ajbook' ),

        'search_items'      => __( 'Search Categories', 'ajbook' ),

        'all_items'         => __( 'All Categories', 'ajbook' ),

        'parent_item'       => __( 'Parent Category', 'ajbook' ),

        'parent_item_colon' => __( 'Parent Category:', 'ajbook' ),

        'edit_item'         => __( 'Edit Category', 'ajbook' ),

        'update_item'       => __( 'Update Category', 'ajbook' ),

        'add_new_item'      => __( 'Add New Category', 'ajbook' ),

        'new_item_name'     => __( 'New Category Name', 'ajbook' ),

    );

    $args = array(

        'hierarchical'      => true,

        'labels'            => $labels,

        'show_ui'           => true,

        'show_admin_column' => true,

        'query_var'         => true,

        'show_in_rest'      => true,

        'rewrite'           => array( 'slug' => 'book_cat' ),

    );

    register_taxonomy( 'book_cat', array('book'), $args );
}
add_action('init', 'aj_book_taxonomy');