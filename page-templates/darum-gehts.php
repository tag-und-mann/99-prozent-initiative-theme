<?php
/*
Template Name: Darum gehts
*/

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <main>

        <section class="container-full">
            <?php the_content(); ?>
        </section>

    </main>

    <?php set_query_var( 'forms_block_bg_color', get_field('newsletter_block_color') ); ?>
    <?php set_query_var( 'form_block_show_line', false ); ?>
    <?php get_template_part( 'template-parts/content', 'forms-block' ); ?>

    <?php set_query_var( 'testimonials_block_show_line', true ); ?>
    <?php get_template_part( 'template-parts/content', 'testimonials-block' ); ?>

<?php endwhile; ?>

<?php get_footer();