<?php
/**
 * BBC Custom Snippets
 *
 * @package       BBCCUSTOMS
 * @author        Brain Bytes Creative
 * @version       1.0.1
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
require_once 'widgets/current-year.php';
require_once 'widgets/gtm-population.php';