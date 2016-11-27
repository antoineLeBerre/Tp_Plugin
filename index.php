<?php 
/*
Plugin Name: Generated article and user
Plugin URI:  https://developer.wordpress.org/plugins/the-basics/
Description: Basic WordPress Plugin Header Comment
Version:     0.0.1
Author:      Antoine Le Berre
Author URI:  https://developer.wordpress.org/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: wporg
Domain Path: /languages
*/
define("DIR_PLUGIN", plugin_dir_path(__FILE__));

require_once (DIR_PLUGIN).('/inc/admin/admin.php');

function lang_init() {
	load_plugin_textdomain( 'alb_domaine', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'lang_init' );