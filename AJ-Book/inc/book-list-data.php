<?php 

// Add columns to data table
 
function aj_book_add_columns( $columns ) {

    unset($columns['date']);
    unset($columns['author']);
    unset($columns['taxonomy-book_cat']);

    $columns['image']                   = __('Cover', 'ajbook');
    $columns['release_year']            = __('Release Year', 'ajbook');
    $columns['book_type']              = __('Book Type', 'ajbook');
    $columns['author']                  = __('Posted By', 'ajbook');
    $columns['taxonomy-book_cat']      = __('Categories', 'ajbook');
    $columns['date']                    = __('Published On', 'ajbook');

    return $columns;
}
add_action( 'manage_book_posts_columns', 'aj_book_add_columns' );

//Output Table Column Values
 
function output_column_content( $column, $post_id ) {

    switch( $column ) {
        case 'image' :
            echo get_the_post_thumbnail($post_id, 'cover-thumbnail');
            break;
        case 'release_year' :
            echo get_post_meta( $post_id, '_aj_book_release_year', true );
            break;
        case 'book_type' :
            echo get_post_meta( $post_id, '_aj_book_type', true );
            break;

        default: 
            break;
    }

}
add_filter('manage_book_posts_custom_column', 'output_column_content', 10, 2);
add_image_size('cover-thumbnail', 50);

//Making Columns Sortable

function ajbook_make_book_columns_sortable( $columns ) {
    $columns['release_year']    = 'release_year';
    $columns['book_type']      = 'book_type';

    return $columns;
}
add_filter('manage_edit-book_sortable_columns', 'ajbook_make_book_columns_sortable');

//Columns sorting logic
 
function aj_book_columns_sorting_logic( $query ) {

    if( ! is_admin() || ! $query->is_main_query() ) {
        return;
    }

    if( 'release_year' === $query->get('orderby') ) {
        $query->set('orderby', 'meta_value');
        $query->set('meta_key', '_aj_book_release_year');
    }

    if( 'book_type' === $query->get('orderby') ) {
        $query->set('orderby', 'meta_value');
        $query->set('meta_key', '_aj_book_type');
    }

}
add_action( 'pre_get_posts', 'aj_book_columns_sorting_logic' );