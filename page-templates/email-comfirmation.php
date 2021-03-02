<?php
/*
Template Name: Email Bestätigung
*/

get_header(); ?>

<?php

if(isset($_GET['id']) && isset($_GET['email'])){
    $p_id = (int)wp_strip_all_tags($_GET['id']);
    $p_email = wp_strip_all_tags($_GET['email']);

    $person = new WP_Query([
        'post_type' => 'person',
        'posts_per_page' => 1,
        'p' => $p_id,
        'suppress_filters' => false,
        'meta_query' => [
            [
                'relation' => 'AND',
                [
                    'key' => 'person_email',
                    'compare' => '=',
                    'value' => $p_email,
                ],
            ],
        ]
    ]);

    if($person->post_count && !get_field('person_email_approved', $p_id)) {

        update_field('person_email_approved', 1, $p_id);
    }
}

?>


<?php while ( have_posts() ) : the_post(); ?>

    <main class="default-page">

        <div class="triangle-top">
            <?php set_query_var( 'bg_color', '#ffffff' ); ?>
            <?php get_template_part( 'template-parts/lines/content', 'header-line' ); ?>
        </div>

        <section class="container-min">
            <div class="title-block">
                <h1><?php the_title(); ?></h1>

                <div class="divider"></div>
            </div>

            <div class="content">
                <?php the_content(); ?>
            </div>

            <script>
                new ScrollMagic.Scene({
                    triggerElement: ".default-page .title-block",
                    triggerHook: 0.9,
                    offset: 0
                })
                    .setClassToggle(".default-page .title-block", "visibleBlock")
                    .addTo(controller);

                new ScrollMagic.Scene({
                    triggerElement: ".default-page .content",
                    triggerHook: 0.9,
                    offset: 0
                })
                    .setClassToggle(".default-page .content", "visibleBlock")
                    .addTo(controller);
            </script>
        </section>

    </main>

    <?php set_query_var( 'forms_block_bg_color', 'gray' ); ?>
    <?php set_query_var( 'form_block_show_line', true ); ?>
    <?php get_template_part( 'template-parts/content', 'forms-block' ); ?>

    <?php set_query_var( 'testimonials_block_show_line', true ); ?>
    <?php get_template_part( 'template-parts/content', 'testimonials-block' ); ?>

<?php endwhile; ?>

<?php get_footer();