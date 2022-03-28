<?php 
/**
 * Plugin Name: AJ Book
 * Plugin URI: https://github.com/alprocode
 * Author: Alex JB
 * Author URI: http://alprocode.me
 * Version: 1.0.0
 * Description: Book Store Listing.
 */
if( !defined('ABSPATH') ) : exit(); endif;

/**
 * Define plugin constants
 */
define( 'AJBOOK_PATH', trailingslashit( plugin_dir_path(__FILE__) ) );
define( 'AJBOOK_URL', trailingslashit( plugins_url('/', __FILE__) ) );


 // Includes
 
require_once AJBOOK_PATH . '/inc/book-setting.php';

require_once AJBOOK_PATH . '/inc/book-taxonomy.php';

require_once AJBOOK_PATH . '/inc/book-info.php';

require_once AJBOOK_PATH . '/inc/book-list-data.php';

    