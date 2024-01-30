<?php
/**
 * BBC Custom Snippets
 *
 * @package       BBCSCHEMA
 * @author        Brain Bytes Creative
 * @version       1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:   BBC Schema
 * Plugin URI:    https://www.brainbytescreative.com/
 * Description:   Short PHP snippets for simple functionality for Brain Bytes Creative websites.
 * Version:       1.0.0
 * Author:        Brain Bytes Creative
 * Author URI:    https://www.brainbytescreative.com/
 * Text Domain:   bbc-custom-snippets
 * Domain Path:   /languages
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * HELPER COMMENT START
 * 
 * This file contains the logic required to run the plugin.
 * To add some functionality, you can simply define the WordPres hooks as followed: 
 * 
 * add_action( 'init', 'some_callback_function', 10 );
 * 
 * and call the callback function like this 
 * 
 * function some_callback_function(){}
 * 
 * HELPER COMMENT END
 */

// Include your custom code here.

function bbc_schema_plugin_functions(){
    if ( class_exists( 'ACF' ) ) {
    
        // create options page
        if( function_exists('acf_add_options_page') ) {
            
            acf_add_options_page(array(
                'page_title'    => 'Schema',
                'menu_title'    => 'Schema',
                'menu_slug'     => 'schema',
                'post_id' 		=> 'schema',
                'capability'    => 'edit_posts',
                'redirect'      => false,
                'icon_url' => 'dashicons-admin-site-alt3',
                'position' => 62,
            ));
            
        }
        
        // allow json file uploads
        function add_upload_mimes( $types ) { 
            $types['json'] = 'text/plain';
            $types['json'] = 'application/json';
            return $types;
        }
        add_filter( 'upload_mimes', 'add_upload_mimes' );
        
        // add parsed schema to <head>
        add_action('wp_head', 'bbc_add_schema_to_header');
        function bbc_add_schema_to_header(){
            
            // get post data
            global $post;
            
            if ( $post ) {

                $post_type = $post->post_type;
                $page_id = get_queried_object_id();
                
                // initialize schema arrays
                $schema_repeater = Array();
                $global_schema_repeater = Array();
                $post_schema_repeater = Array();
                
                // get global and post schema
                $global_schema_repeater = get_field('schema_repeater', 'schema');
                $post_schema_repeater = get_field('post_schema_repeater', $page_id);
                
                // determine if 'overwrite schema' option is checked on posts/pages
                $overwrite_schema = null;
                
                if ( ( $post_type == 'post' ) || ( $post_type == 'page' ) ) {
                    $post_schema_options = get_field('post_schema_options', $page_id);
                    
                    if ( $post_schema_options ) {
                        foreach ( $post_schema_options as $post_schema_option ) {
                            if ( $post_schema_option == 'overwrite' ) {
                                $overwrite_schema = true;
                            } else {
                                $overwrite_schema = false;
                            }
                        }
                    }
                }
                
                // logic for overwrite checked            
                if ( $overwrite_schema && $post_schema_repeater ) {
                    $schema_repeater = $post_schema_repeater;
                } elseif ( !$overwrite_schema ) {
                    if ( $global_schema_repeater && $post_schema_repeater ) {
                        $schema_repeater = array_merge($global_schema_repeater, $post_schema_repeater);
                    } elseif ( $global_schema_repeater ) {
                        $schema_repeater = $global_schema_repeater;
                    } elseif ( $post_schema_repeater ) {
                        $schema_repeater = $post_schema_repeater;
                    }
                }
                
                // add schema json to header
                if ( $schema_repeater !== null ) {

                    if ( (count($schema_repeater) !== 0) ) {
                    
                    echo '<!-- start schema -->';
                    echo "\r\n";
                    
                    foreach ( $schema_repeater as $schema ) {
                        
                        $schema_format = $schema['schema_format'];
                        
                        if ( $schema_format && ( $schema_format == 'JSON Upload' ) ) {
                            
                            $upload_schema_json = $schema['upload_schema_json'];
                            $schema_content = file_get_contents($upload_schema_json);
                            
                            echo '<script type="application/ld+json">';
                            
                                echo $schema_content;
                            
                            echo '</script>';
                            
                        }
                        
                        if ( $schema_format && ( $schema_format == 'Paste Code' ) ) {
                            
                            $paste_schema_code = $schema['paste_schema_code'];
            
                            echo '<script type="application/ld+json">';
                            
                                echo $paste_schema_code;
                            
                            echo '</script>';
                            
                        }
                        
                        echo "\r\n";
                
                    }
                    
                    echo '<!-- end schema -->';
                    echo "\r\n";

                    }
                    
                }
            }
        };
    }
}
add_action( 'init', 'bbc_schema_plugin_functions', 10 );