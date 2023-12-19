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

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

/**
 * Currently plugin version. - https://semver.org
 */
define('CGP_VERSION', '0.0.1');

function activate_cgp()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-custom-gutenberg-activator.php';
	CGP_Activator::activate();
}

function deactivate_cgp()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-custom-gutenberg-deactivator.php';
	CGP_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_cgp');
register_deactivation_hook(__FILE__, 'deactivate_cgp');

require plugin_dir_path(__FILE__) . 'includes/class-custom-gutenberg.php';

function run_cgp()
{

	$cgp = new CGP();
	$cgp->run();
}
run_cgp();
