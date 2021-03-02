<?php
/*
Template Name: Komitee
*/

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <main>

        <section class="komitee-page">

            <div class="triangle-top">
                <?php set_query_var( 'bg_color', '#e8e8e8' ); ?>
                <?php get_template_part( 'template-parts/lines/content', 'header-line' ); ?>
            </div>

            <div class="komitee-page-content">

                <div class="container-main">

                    <?php get_template_part( 'template-parts/content', 'komitee-nav-desk' ); ?>

                    <?php get_template_part( 'template-parts/content', 'komitee-nav-mob' ); ?>

                </div>

                <div class="komitee-mitglieders-container">
                    <div class="loader-fade-block">
                        <div class="posts-loader">
                            <div class="lds-dual-ring"></div>
                        </div>
                    </div>
                    <?php get_template_part( 'template-parts/content', 'komitee-mitglieders-desk' ); ?>
                </div>

                <script>
                    new ScrollMagic.Scene({
                        triggerElement: ".komitee-mitglieders-container",
                        triggerHook: 0.9,
                        offset: 0
                    })
                        .setClassToggle(".komitee-mitglieders-container", "visibleBlock")
                        .addTo(controller);
                </script>

                <div class="komitee-mitglieders-container-mob">
                    <div class="loader-fade-block">
                    </div>
                    <?php get_template_part( 'template-parts/content', 'komitee-mitglieders-mob' ); ?>
                </div>

            </div>

        </section>

    </main>

    <?php set_query_var( 'forms_block_bg_color', 'orange' ); ?>
    <?php set_query_var( 'form_block_show_line', true ); ?>
    <?php get_template_part( 'template-parts/content', 'forms-block' ); ?>

    <?php set_query_var( 'testimonials_block_show_line', true ); ?>
    <?php get_template_part( 'template-parts/content', 'testimonials-block' ); ?>

<?php endwhile; ?>

<?php get_footer();