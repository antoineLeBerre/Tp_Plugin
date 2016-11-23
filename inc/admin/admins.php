<?php 

function plugin_admin_menu()
{
	add_menu_page('Generate', __("Generate", "plugin_textdomain"), 'activate_plugins', 'settings_api_test', 'alb_form_user');
    add_submenu_page('settings_api_test', "User", __('User', 'plugin_textdomain'), "manage_options", 'alb_form_user');
    }
add_action( 'admin_menu', 'plugin_admin_menu');


function alb_form_user()
{ 
	echo "<h2>Generate user</h2>";
	echo "<form id='form_user' methode='POST'";
	echo "<table>";
	echo "<tr>";
	echo "<td>";
	echo "<label for=number_user>Quantiter : </label>";
	echo "</td>";
	echo "<td>";
	echo "<input type='number' name=number_user min='0' max=''/>";
	echo "</td>";
	echo "</tr>";
	echo "<td>";
	echo "<label for=role_user>Role : </label>";
	echo "</td>";
	echo "<td>";
	echo "<select name=role_user>";
	echo "<option id='administrator'>Administrator</option>";
	echo "<option id='editor'>Editor</option>";
	echo "<option id='author'>Author</option>";
	echo "<option id='suscribor'>Suscribor</option>";
	echo "<option id='contribuor'>Contribuor</option>";
	echo "</td>";
	echo "</tr>";
	echo "</table>";
	echo "</form>";
}