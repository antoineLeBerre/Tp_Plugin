<?php 

require_once (DIR_PLUGIN.'/inc/admin/alb_insert.php');

/*function plugin_admin_menu()
{
	add_menu_page('Generate', __("Generate", "plugin_textdomain"), 'activate_plugins', 'settings_api_test', 'alb_form_user');
    add_submenu_page('settings_api_test', "User", __('User', 'plugin_textdomain'), "manage_options", 'alb_form_user');
    }
add_action( 'admin_menu', 'plugin_admin_menu');
*/
add_action( 'admin_action_wpse10500', 'wpse10500_admin_action' );
function wpse10500_admin_action()
{
    // Do your stuff here
    wp_redirect( $_SERVER['HTTP_REFERER'] );
    var_dump(wp_redirect( $_SERVER['HTTP_REFERER'] ));
    exit();
}
add_action( 'admin_menu', 'wpse10500_admin_menu' );
function wpse10500_admin_menu()
{
    add_menu_page('Generate', __("Generate", "plugin_textdomain"), 'activate_plugins', 'settings_api_test', 'alb_form_user');
    add_submenu_page('settings_api_test', "User", __('User', 'plugin_textdomain'), "manage_options", 'alb_form_user');
}
/*function wpse10500_do_page()
{
?>
    <form method="POST" action="<?php echo admin_url( 'admin.php' ); ?>">
        <input type="hidden" name="action" value="wpse10500" />
        <input type="submit" value="Do it!" />
    </form>
<?php
} **/
function alb_form_user()
{ ?>
	<h2>Generate user</h2>
	<form id='form_user' methode='POST' action='<?php echo admin_url("admin.php"); ?>'>
	<input type='hidden' name='action' value='admins'>
	<table>
	<tr>
	<td>
	<label for=number_user>Quantiter : </label>
	</td>
	<td>
	<input type='number' name='number_user' min='0' max='' value='0'/>
	</td>
	</tr>
	<td>
	<label for=role_user>Role : </label>
	</td>
	<td>
	<select name=role_user>
	<option id='administrator'>Administrator</option>
	<option id='editor'>Editor</option>
	<option id='author'>Author</option>
	<option id='suscribor'>Suscribor</option>
	<option id='contribuor'>Contribuor</option>
	</td>
	</tr>
	</table>
	<input type='submit' value='Submit'/>
	</form>
<?php }

//add_action( 'wp', 'alb_insert' );
