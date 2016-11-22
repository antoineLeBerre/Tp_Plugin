<?php
/**
 * This page shows the procedural or functional example
 *
 * OOP way example is given on the "settings-api.php" file.
 *
 * @version 0.4.2
 * @author Tareq Hasan <tareq@weDevs.com>
 * @author Amaury Balmer <amaury@beapi.fr>
 * @link https://github.com/herewithme/wordpress-settings-api-class
 */
require_once (DIR_PLUGIN.'/library/class.settings-api.php');
require_once (DIR_PLUGIN.'/inc/admin/generator.php');
/**
 * Registers settings section and fields
 */

if ( !function_exists( 'wedevs_admin_init' ) ):
    function wedevs_admin_init() {
        $name = generateRandomString(5);
        $test = generate_Name();
        $sections = array(
            array(
                'id' => 'wedevs_users',
                'title' => __( 'Generate users', 'wedevs' ),
                'desc' => __( 'Generate one or more users', 'wedevs' ),
                'tab_label' => __( 'Users', 'wedevs' ),
            ),
            array(
                'id' => 'wedevs_articles',
                'title' => __( 'Generate articles', 'wedevs' ),
                'desc' => __( 'Generate one or more articles', 'wedevs' ),
                'tab_label' => __( 'Articles', 'wedevs' ),
            )
        );
        $name = generateRandomString(5);
        $fields = array(
            'wedevs_users' => array(
                array(
                    'name' => 'number',
                    'label' => $name,//__( 'Number', 'wedevs' ),
                    'desc' => __( 'How many users you want ?', 'wedevs' ),
                    'desc_type' => 'block',
                    'type' => 'number',
                    'min' => 0,
                    'max' => 50,
                    'default' => '0'
                ),
                array(
                    'name' => 'selectbox',
                    'label' => __( 'Roles', 'wedevs' ),
                    'desc' => __( 'What kind of roles you want ?', 'wedevs' ),
                    'type' => 'select',
                    'options' => array(
                        'administrator' => __( 'Administrator', 'wedevs' ),
                        'editor' => __( 'Editor', 'wedevs' ),
                        'author' => __( 'Author', 'wedevs' ),
                        'suscribor' => __( 'Suscribor', 'wedevs' ),
                        'contribuor' => __( 'Contribuor', 'wedevs' )
                    )
                )
            ),
            'wedevs_articles' => array(
                array(
                    'name' => 'text',
                    'label' => __( 'Text Input', 'wedevs' ),
                    'desc' => __( 'Text input description', 'wedevs' ),
                    'type' => 'text',
                    'default' => 'Title'
                ),
                array(
                    'name' => 'textarea',
                    'label' => __( 'Textarea Input', 'wedevs' ),
                    'desc' => __( 'Textarea description', 'wedevs' ),
                    'type' => 'textarea'
                ),
                array(
                    'name' => 'checkbox',
                    'label' => __( 'Checkbox', 'wedevs' ),
                    'desc' => __( 'Checkbox Label', 'wedevs' ),
                    'type' => 'checkbox'
                ),
                array(
                    'name' => 'radio',
                    'label' => __( 'Radio Button', 'wedevs' ),
                    'desc' => __( 'A radio button', 'wedevs' ),
                    'type' => 'radio',
                    'default' => 'no',
                    'options' => array(
                        'yes' => 'Yes',
                        'no' => 'No'
                    )
                ),
                array(
                    'name' => 'multicheck',
                    'label' => __( 'Multile checkbox', 'wedevs' ),
                    'desc' => __( 'Multi checkbox description', 'wedevs' ),
                    'type' => 'multicheck',
                    'default' => array( 'one' => 'one', 'four' => 'four' ),
                    'options' => array(
                        'one' => 'One',
                        'two' => 'Two',
                        'three' => 'Three',
                        'four' => 'Four'
                    )
                ),
                array(
                    'name' => 'selectbox',
                    'label' => __( 'A Dropdown', 'wedevs' ),
                    'desc' => __( 'Dropdown description', 'wedevs' ),
                    'type' => 'select',
                    'options' => array(
                        'yes' => 'Yes',
                        'no' => 'No'
                    )
                ),
                array(
                    'name' => 'password',
                    'label' => __( 'Password', 'wedevs' ),
                    'desc' => __( 'Password description', 'wedevs' ),
                    'type' => 'password',
                    'default' => ''
                ),
                array(
                    'name' => 'file',
                    'label' => __( 'File', 'wedevs' ),
                    'desc' => __( 'File description', 'wedevs' ),
                    'type' => 'file',
                    'default' => ''
                )
            )
        );
        global $my_settings_api;
        $my_settings_api = new WeDevs_Settings_API;
        //set sections and fields
        $my_settings_api->set_sections( $sections );
        $my_settings_api->set_fields( $fields );
        //initialize them
        $my_settings_api->admin_init();
    }
endif;
add_action( 'admin_init', 'wedevs_admin_init' );
if ( !function_exists( 'wedevs_admin_menu' ) ):
    /**
     * Register the plugin page
     */
    function wedevs_admin_menu() {
        add_options_page( 'Settings API', 'Settings API', 'manage_options', 'settings_api_test', 'wedevs_plugin_page' );
    }
endif;
add_action( 'admin_menu', 'wedevs_admin_menu' );
/**
 * Display the plugin settings options page
 */
if ( !function_exists( 'wedevs_plugin_page' ) ):
    function wedevs_plugin_page() {
        global $my_settings_api;
        
        echo '<div id="icon-options-general" class="icon32"><br /></div>';
        echo '<div class="wrap">';
        settings_errors();
        $my_settings_api->show_navigation();
        $my_settings_api->show_forms();
        echo '</div>';
    }
endif;