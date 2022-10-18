<?php
/**
 * Plugin Name:       Custom Paragraph List
 * Description:       Add custom setting to default paragraph block
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            ESS
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       custom-paragraph-list
 *
 * @package           create-block
 */

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! defined( 'CUSTOM_ATTRIBUTES_PATH' ) ) {
    define( 'CUSTOM_ATTRIBUTES_PATH', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'CUSTOM_ATTRIBUTES_URL' ) ) {
    define( 'CUSTOM_ATTRIBUTES_URL', plugin_dir_url( __FILE__ ) );
}

function custom_attributes_editor_scripts() {
    wp_register_script(
        'custom-attributes',
        CUSTOM_ATTRIBUTES_URL . 'build/index.js',
        [ 'wp-blocks', 'wp-dom', 'wp-dom-ready', 'wp-edit-post' ],
        filemtime( CUSTOM_ATTRIBUTES_PATH . 'build/index.js' )
    );
    wp_enqueue_script( 'custom-attributes' );
}
add_action( 'enqueue_block_editor_assets', 'custom_attributes_editor_scripts' );