<?php
/**
 * Register Menus
 *
 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus#Examples
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

register_nav_menus(
	array(
		'main_menu'  => esc_html__( 'Main menu', '' ),
		'footer_menu'  => esc_html__( 'Footer menu', '' ),
	)
);


/**
 * Navigation - Menu in header
 *
 */
if ( ! function_exists( 'navigation_main_menu' ) ) {
	function navigation_main_menu() {
		wp_nav_menu(
			array(
                'theme_location' => 'main_menu',
				'container'      => false,
                'container_class'=>'',
				'menu_class'     => '',
			)
		);
	}
}

/**
 * Navigation - Menu in footer
 *
 */
if ( ! function_exists( 'navigation_footer_menu' ) ) {
    function navigation_footer_menu() {
        wp_nav_menu(
            array(
                'theme_location' => 'footer_menu',
                'container'      => false,
                'container_class'=>'',
                'menu_class'     => '',
            )
        );
    }
}


