<?php
/**
 * Default Page
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <main class="default-page">

        <div class="triangle-top">
            <?php set_query_var( 'bg_color', '#ffffff' ); ?>
            <?php get_template_part( 'template-parts/lines/content', 'header-line' ); ?>
        </div>

        <section class="container-min">
            <div class="title-block">
                <h1><?php the_title(); ?></h1>
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

    <?php get_template_part( 'template-parts/content', 'weitere-informationen' ); ?>

    <?php set_query_var( 'forms_block_bg_color', 'orange' ); ?>
    <?php set_query_var( 'form_block_show_line', true ); ?>
    <?php get_template_part( 'template-parts/content', 'forms-block' ); ?>

    <?php set_query_var( 'testimonials_block_show_line', true ); ?>
    <?php get_template_part( 'template-parts/content', 'testimonials-block' ); ?>

<?php endwhile; ?>

<?php get_footer();