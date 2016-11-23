<?php 

function _custom_plugin_init() {

	/*add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );*/

	 $args = [

		 'public' => true,
		 'label' => __( 'Message', 'textdomain' ),
		 "show_ui" => true
		];

	 register_post_type( 'message', $args);*/
}
add_action( 'init', '_custom_plugin_init' );