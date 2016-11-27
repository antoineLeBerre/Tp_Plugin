<?php 

require_once (DIR_PLUGIN.'/inc/admin/alb_insert.php');

add_action( 'admin_action_alb', 'alb_admin_action' );
function alb_admin_action()
{
    // Do your stuff here
    if (!empty($_REQUEST['number_user']) ) {
         alb_insert_user($_REQUEST);
    }
    else{
        alb_insert_article($_REQUEST);
    }
    wp_redirect( $_SERVER['HTTP_REFERER'] );
    exit();
}

add_action( 'admin_menu', 'alb_admin_menu' );
function alb_admin_menu()
{
    add_menu_page('ALB_Generate', __("ALB_Generate", "alb_domaine"), 'activate_plugin', 'settings_api_test', 'alb_form_user');
    add_submenu_page('settings_api_test', "User", __('User', 'alb_domaine'), "manage_options", 'alb_form_user', 'alb_form_user');
    add_submenu_page('settings_api_test', "Article", __('Article', 'alb_domaine'), "manage_options", 'alb_form_article', 'alb_form_article');
}

function alb_form_user()
{
    require_once (DIR_PLUGIN.'/view/alb_form_user.php');
} 

function alb_form_article()
{
    global $wpdb;
    $users = $wpdb->get_results("SELECT display_name FROM $wpdb->users");
    require_once (DIR_PLUGIN.'/view/alb_form_article.php');

}