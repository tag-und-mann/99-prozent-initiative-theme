<?php
/*
Template Name: Mitmachen
*/

get_header(); ?>


<?php while ( have_posts() ) : the_post(); ?>

    <main>

        <section class="mitmachen-page">

            <div class="triangle-top">
                <?php set_query_var( 'bg_color', '#e8e8e8' ); ?>
                <?php get_template_part( 'template-parts/lines/content', 'header-line' ); ?>
            </div>


            <div class="mitmachen-page-content">

                <div class="container-main">
                    <div class="container-form">

                        <div class="form">
                            <?php echo do_shortcode('[formidable id='. get_field('mitmachen_formidable_form_shortcode_id', 'option') . ']'); ?>
                        </div>

                    </div>
                </div>

            </div>

            <script>
                new ScrollMagic.Scene({
                    triggerElement: ".mitmachen-page-content .form",
                    triggerHook: 0.9,
                    offset: 0
                })
                    .setClassToggle(".mitmachen-page-content .form", "visibleBlock")
                    .addTo(controller);
            </script>

        </section>

    </main>

    <?php set_query_var( 'forms_block_bg_color', get_field('newsletter_block_color') ); ?>
    <?php set_query_var( 'form_block_show_line', true ); ?>
    <?php get_template_part( 'template-parts/content', 'forms-block' ); ?>

    <?php set_query_var( 'testimonials_block_show_line', true ); ?>
    <?php get_template_part( 'template-parts/content', 'testimonials-block' ); ?>

<?php endwhile; ?>

<?php get_footer();