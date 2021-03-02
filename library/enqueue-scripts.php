<?php
/**
 * Enqueue all styles and scripts
 */


if ( ! function_exists( 'foundationpress_scripts' ) ) :
	function foundationpress_scripts() {

		// Enqueue the main Stylesheet
        wp_enqueue_style('fontawesome-css', get_template_directory_uri() . '/assets/css/font-awesome.min.css');

        wp_enqueue_style('slick-stylesheet', get_stylesheet_directory_uri() . '/assets/slick/slick.css');
        wp_enqueue_style('slick-theme-stylesheet', get_stylesheet_directory_uri() . '/assets/slick/slick-theme.css');

        wp_enqueue_style('main-style', get_template_directory_uri() . '/style.css');

        wp_enqueue_style('main-theme-style', get_template_directory_uri() . '/assets/css/app.css');


		// Enqueue scripts
        wp_enqueue_script('scrollMagicjs', get_template_directory_uri() . '/assets/js/ScrollMagic.min.js', ['jquery'] , '', false);

        wp_enqueue_script('slick-js', get_template_directory_uri() . '/assets/slick/slick.js', array('jquery'), '', false);
        wp_enqueue_script('matchHeight-js', get_template_directory_uri() . '/assets/js/jquery.matchHeight-min.js', array('jquery'), '', false);

        wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery'), '', true );
        wp_localize_script('main-js', 'economiesuisseData', ['root_url' => get_template_directory_uri(), 'ajax_url' =>  admin_url('admin-ajax.php'), 'language' =>  ICL_LANGUAGE_CODE]);

    }

	add_action( 'wp_enqueue_scripts', 'foundationpress_scripts' );
endif;


function editor_enqueue() {
    wp_enqueue_style('editor-theme-style', get_template_directory_uri() . '/assets/css/editor.css');
    wp_enqueue_script('scrollMagicjs-editor', get_template_directory_uri() . '/assets/js/ScrollMagic.min.js', ['jquery'] , '', false);
}

add_action( 'enqueue_block_editor_assets', 'editor_enqueue' );
