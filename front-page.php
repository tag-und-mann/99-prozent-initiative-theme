<?php
/**
 * Front page
 */

get_header(); ?>


<main>

    <?php set_query_var( 'forms_block_bg_color', 'gray' ); ?>
    <?php set_query_var( 'form_block_show_line', false ); ?>
    <?php get_template_part( 'template-parts/content', 'forms-block' ); ?>

    <?php get_template_part( 'template-parts/content', 'home-darum-gehts-block' ); ?>

    <?php get_template_part( 'template-parts/content', 'home-argumente-block' ); ?>

    <?php get_template_part( 'template-parts/content', 'home-aktuell-block' ); ?>

    <?php get_template_part( 'template-parts/content', 'home-newsletter-block' ); ?>

    <?php set_query_var( 'testimonials_block_show_line', false ); ?>
    <?php get_template_part( 'template-parts/content', 'testimonials-block' ); ?>

    <?php get_template_part( 'template-parts/content', 'logos-block' ); ?>


</main>


<?php get_footer();
