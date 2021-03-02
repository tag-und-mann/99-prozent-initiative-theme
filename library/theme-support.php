<?php
/**
 * Register theme support for languages, menus, post-thumbnails, post-formats etc.
 */

if ( ! function_exists( 'foundationpress_theme_support' ) ) :
	function foundationpress_theme_support() {

		// Add menu support
		add_theme_support( 'menus' );

		// Add post thumbnail support
		add_theme_support( 'post-thumbnails' );

        // Let WordPress manage the document title
        add_theme_support( 'title-tag' );

        add_theme_support( 'responsive-embeds' );

        // Disable Custom Colors
        add_theme_support( 'disable-custom-colors' );

        // Our colors
        add_theme_support( 'editor-color-palette', [
            [
                'name' => __("Weiss", "economiesuisse"),
                'slug' => 'white',
                'color' => '#ffffff',
            ],
            [
                'name' => __("Rot", "economiesuisse"),
                'slug' => 'red',
                'color' => '#DE0B1C',
            ],
        ] );
	}

	add_action( 'after_setup_theme', 'foundationpress_theme_support' );
endif;

function add_svg_to_upload_mimes( $upload_mimes ) {
    $upload_mimes['svg'] = 'image/svg+xml';
    $upload_mimes['svgz'] = 'image/svg+xml';
    return $upload_mimes;
}
add_filter( 'upload_mimes', 'add_svg_to_upload_mimes', 10, 1 );