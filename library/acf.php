<?php
/**
 * Everything that is related to ACF plugin
 */

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' 	=> 'General data',
        'menu_title'	=> 'General data',
        'menu_slug' 	=> 'theme-options-gd',
        'capability'	=> 'edit_posts',
        'redirect'		=> false,
    ));
}

