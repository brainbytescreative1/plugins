<?php
/**
 * BBC Custom Snippets
 *
 * @package       BBCCUSTOMS
 * @author        Brain Bytes Creative
 * @version       2.0.0
 *
 * @wordpress-plugin
 * Plugin Name:   BBC Custom Snippets
 * Plugin URI:    https://www.brainbytescreative.com/
 * Description:   Short PHP snippets for simple functionality for Brain Bytes Creative websites.
 * Version:       1.0.1
 * Author:        Brain Bytes Creative
 * Author URI:    https://www.brainbytescreative.com/
 * Text Domain:   bbc-custom-snippets
 * Domain Path:   /languages
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( !class_exists('acf') ) {

    add_filter('includes/acf/settings/path', 'acf_settings_path');
    function acf_settings_path( $path ) {
        $path = plugin_dir_path( __FILE__ ) . 'includes/acf/';
        return $path;
    }

    add_filter('includes/acf/settings/dir', 'acf_settings_dir');
    function acf_settings_dir( $path ) {
        $dir = plugin_dir_url( __FILE__ ) . 'includes/acf/';
        return $dir;
    }

    add_filter('includes/acf/settings/show_admin', '__return_true');

    include_once( plugin_dir_path( __FILE__ ) . 'includes/acf/acf.php' );

    add_filter('includes/acf/settings/save_json', 'acf_json_save_point');
    function acf_json_save_point( $path ) {
        $path = plugin_dir_path( __FILE__ ) . 'acf-json/';
        return $path;
    }

    add_filter('includes/acf/settings/load_json', 'acf_json_load_point');

    add_filter( 'site_transient_update_plugins', 'cysp_stop_acf_update_notifications', 11 );
    function cysp_stop_acf_update_notifications( $value ) {
        unset( $value->response[ plugin_dir_path( __FILE__ ) . 'includes/acf/acf.php' ] );
        return $value;
    }

} else {

}

function acf_json_load_point( $paths ) {
    $paths[] = plugin_dir_path( __FILE__ ) . 'acf-json';
    return $paths;
}

function bbc_acf_json_load_point( $paths ) {
    unset($paths[0]);

    $paths[] = plugin_dir_path( __FILE__ ) . '/acf-json';

    return $paths;    
}
add_filter( 'acf/settings/load_json', 'bbc_acf_json_load_point' );


function bbc_custom_initialize_functions(){
    include_once( __DIR__ . '/functions/bbc-schema.php');
}
add_action( 'init', 'bbc_custom_initialize_functions', 10 );

add_action( 'init', 'bbc_schema_plugin_functions', 10 );