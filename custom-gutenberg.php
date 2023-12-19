<?php
/*
 * Plugin Name:       Custom Gutenberg
 * Plugin URI:        /
 * Description:       Testing out customization methods for the built-in WordPress block editor
 * Version:           0.0.1
 * Requires at least: 6.4.2
 * Requires PHP:      8.1.23
 * Author:            Jim Floss
 * Author URI:        /
 * License:           MIT License
 * License URI:       https://www.mit.edu/~amini/LICENSE.md
 * Update URI:        /
 * Text Domain:       custom-gutenberg
 * Domain Path:       /languages
 */

 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
 }

 if( ! class_exists('Cust_Gute_Plugin')){
    class Cust_Gute_Plugin {
        public static function init() {
            
        }
    }

    Cust_Gute_Plugin::init();
 }