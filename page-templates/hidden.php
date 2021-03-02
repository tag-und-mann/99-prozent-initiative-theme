<?php
/*
Template Name: Passwortgeschützt
*/

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <main class="default-page">

        <div class="triangle-top">
            <svg viewBox="0 0 100 100" preserveAspectRatio="none">
                <polygon fill="#ffffff" points="0,100 100,0 100,100"/>
            </svg>
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

    <?php get_template_part( 'template-parts/content', 'forms-block' ); ?>

    <?php get_template_part( 'template-parts/content', 'testimonials-block' ); ?>

<?php endwhile; ?>

<?php get_footer();
