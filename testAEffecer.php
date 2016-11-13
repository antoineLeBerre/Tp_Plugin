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
add_settings_field(
	'myprefix_setting-id',
	'This is the setting title',
	'myprefix_setting_callback_function',
	'general',
	'myprefix_settings-section-name',
	array( 'label_for' => 'myprefix_setting-id' )
);
// lier le lien du menu à la page d'options
function afficher_lien_menu() 
{
  if (function_exists('add_options_page')) 
  {
  	$plugin_page_options = add_options_page('Nom du Lien', 'Nom du Plugin', 'administrator', 'identifiant_unique_du_plugin',
  		'fonction_de_la_page_options');
  }
}
add_action("admin_menu", 'afficher_lien_menu');

// la page des options
function fonction_de_la_page_options() {

  if (!current_user_can('administrator'))  {
    wp_die( __('You do not have sufficient permissions to access this page.') );
  }

  echo '<div class="wrap">';
  echo '<p>Ceci est l\'endroit où placer le formulaire des options.</p>';
  echo '</div>';

}