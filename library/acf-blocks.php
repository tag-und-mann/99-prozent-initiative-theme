<?php

function register_acf_block_types() {

    acf_register_block_type(array(
        'name'              => 'darum_gehts',
        'title'             => __('Darum gehts'),
        'render_template'   => 'template-parts/blocks/darum_gehts.php',
        'category'          => 'economiesuisse-category',
        'icon'              => 'menu',
        'keywords'          => array( 'Darum gehts', 'list' ),
        'mode'              => 'edit',
    ));

    acf_register_block_type(array(
        'name'              => 'argumente',
        'title'             => __('Argumente'),
        'render_template'   => 'template-parts/blocks/argumente.php',
        'category'          => 'economiesuisse-category',
        'icon'              => 'menu',
        'keywords'          => array( 'Argumente', 'list', 'bild', 'image' ),
        'mode'              => 'edit',
    ));

    acf_register_block_type(array(
        'name'              => 'slider',
        'title'             => __('Slider'),
        'render_template'   => 'template-parts/blocks/slider.php',
        'category'          => 'economiesuisse-category',
        'icon'              => 'menu',
        'keywords'          => array( 'Slider', 'Carousel', 'bild', 'image', 'video' ),
        'mode'              => 'edit',
    ));

    acf_register_block_type(array(
        'name'              => 'quiz',
        'title'             => __('Quiz'),
        'render_template'   => 'template-parts/blocks/quiz.php',
        'category'          => 'economiesuisse-category',
        'icon'              => 'menu',
        'keywords'          => array( 'Quiz' ),
        'mode'              => 'edit',
    ));

    acf_register_block_type(array(
        'name'              => 'custom_button',
        'title'             => __('Custom Button'),
        'render_template'   => 'template-parts/blocks/custom_button.php',
        'category'          => 'economiesuisse-category',
        'icon'              => 'menu',
        'keywords'          => array( 'button', 'link' ),
        'mode'              => 'edit',
        'supports'          => [
            'align' => false,
        ]
    ));
}

if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
}


