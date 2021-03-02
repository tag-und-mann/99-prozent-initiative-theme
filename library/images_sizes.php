<?php

// Add additional image sizes

function my_theme_images_support() {
    add_image_size( 'darum-gehts',  950, 605, true );
    add_image_size( 'home-argumente',  420, 400, true );
    add_image_size( 'card-2-col',  940, 560, true );
    add_image_size( 'card-1-col',  700, 606, true );
    add_image_size( 'testimonial',  700, 466, true );
    add_image_size( 'slider',  703, 383, true );
    add_image_size( 'sidebar-post',  400, 383, true );
 }
add_action( 'after_setup_theme', 'my_theme_images_support' );

