<?php

/**
 * Add Metaboxx
 */
function ajbook_add_book_metaboxes()
{
    add_meta_box(
        'aj_book_metabox_id',
        'Book Detail',
        'aj_book_metaboxes_template',
        'book'
    );
}
add_action('add_meta_boxes', 'ajbook_add_book_metaboxes');

/**
 * Metabox Template
 */
function aj_book_metaboxes_template($post)
{
    $is_featured        = get_post_meta($post->ID, '_aj_book_is_featured', true);
    $book_type         = get_post_meta($post->ID, '_aj_book_type', true);
    $release_year       = get_post_meta($post->ID, '_aj_book_release_year', true);
    $author             = get_post_meta($post->ID, '_aj_book_author', true);
    $isbn_code         = get_post_meta($post->ID, '_aj_book_isbn_code', true);

?>
    <table>
        <tr>
            <td>Featured: </td>
            <td>
                <input type="checkbox" name="aj_book_is_featured" class="regular-text" value="1" <?php checked(1, ajbook_get_book_metavalues($is_featured)); ?> />
            </td>
        </tr>
        <tr>
            <td>Types or Genres: </td>
            <td>
                <select name="aj_book_type" class="regular-text">
                    <option value="">Select the Types or Genres</option>
                    <option value="action" <?php selected('action', ajbook_get_book_metavalues($book_type)); ?>>Action and Adventure</option>
                    <option value="classics" <?php selected('classics', ajbook_get_book_metavalues($book_type)); ?>>Classics</option>
                    <option value="comic" <?php selected('Comic', ajbook_get_book_metavalues($book_type)); ?>>Comic Book or Graphic Novel</option>
                    <option value="mystery" <?php selected('mystery', ajbook_get_book_metavalues($book_type)); ?>>Detective and Mystery</option>
                    <option value="fantasy" <?php selected('fantasy', ajbook_get_book_metavalues($book_type)); ?>>Fantasy</option>
                    <option value="hfiction" <?php selected('hfiction', ajbook_get_book_metavalues($book_type)); ?>>Historical Fiction</option>
                    <option value="horror" <?php selected('horror', ajbook_get_book_metavalues($book_type)); ?>>Horror</option>
                    <option value="lfiction" <?php selected('lfiction', ajbook_get_book_metavalues($book_type)); ?>>Literary Fiction</option>
                </select>
            </td>
        </tr>       
        <tr>
            <td>Year: <span class="dashicons dashicons-calendar-alt"></span></td>
            <td>
                <input type="text" class="regular-text" name="aj_book_release_year" value="<?php echo ajbook_get_book_metavalues($release_year); ?>" />
            </td>
        </tr>
        <tr>
            <td>Author: <span class="dashicons dashicons-admin-users"></span> </td>
            <td>
                <input type="text" class="regular-text" name="aj_book_author" value="<?php echo ajbook_get_book_metavalues($author); ?>" />
            </td>
        </tr>
        <tr>
            <td>ISBN: <span class="dashicons dashicons-text"></span> </td>
            <td>
                <input type="text" class="regular-text" name="aj_book_isbn_code" value="<?php echo ajbook_get_book_metavalues($isbn_code); ?>" />
            </td>
        </tr>
    </table>
<?php
}

//Save metabox values
 
function ajbook_save_move_metabox_values($post_id)
{
    if (isset($_POST['aj_book_is_featured'])) {
        update_post_meta($post_id, '_aj_book_is_featured', true);
    } else {
        update_post_meta($post_id, '_aj_book_is_featured', false);
    }
    if (isset($_POST['aj_book_type'])) {
        update_post_meta($post_id, '_aj_book_type', sanitize_text_field($_POST['aj_book_type']));
    }
    if (isset($_POST['aj_book_release_year'])) {
        update_post_meta($post_id, '_aj_book_release_year', sanitize_text_field($_POST['aj_book_release_year']));
    }
    if (isset($_POST['aj_book_author'])) {
        update_post_meta($post_id, '_aj_book_author', sanitize_text_field($_POST['aj_book_author']));
    }
    if (isset($_POST['aj_book_isbn_code'])) {
        update_post_meta($post_id, '_aj_book_isbn_code', sanitize_text_field($_POST['aj_book_isbn_code']));
    }
}
add_action('save_post', 'ajbook_save_move_metabox_values');

//Get the book metavalues

function ajbook_get_book_metavalues($value)
{
    if (isset($value) && !empty($value)) {
        return $value;
    } else {
        return '';
    }
}
