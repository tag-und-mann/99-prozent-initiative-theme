<?php
/*
Template Name: Aktuell
*/

get_header(); ?>


<?php while ( have_posts() ) : the_post(); ?>

    <main>

        <section class="aktuell-page">

            <div class="container-main">
                <div class="aktuell-page-content">

                    <?php get_template_part( 'template-parts/content', 'aktuell-nav-desk' ); ?>

                    <div class="aktuell-posts-container">

                        <div class="loader-fade-block">
                            <div class="posts-loader">
                                <div class="lds-dual-ring"></div>
                            </div>
                        </div>

                        <?php get_template_part( 'template-parts/content', 'aktuell-posts' ); ?>
                        <?php get_template_part( 'template-parts/content', 'aktuell-posts-mob' ); ?>

                        <div class="aktuell-filters-mob-icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/filter-icon.svg">
                        </div>

                    </div>
                </div>
            </div>

            <?php get_template_part( 'template-parts/content', 'aktuell-nav-mob' ); ?>

        </section>

    </main>

    <?php set_query_var( 'forms_block_bg_color', 'orange' ); ?>
    <?php set_query_var( 'form_block_show_line', true ); ?>
    <?php get_template_part( 'template-parts/content', 'forms-block' ); ?>

    <?php set_query_var( 'testimonials_block_show_line', true ); ?>
    <?php get_template_part( 'template-parts/content', 'testimonials-block' ); ?>

<?php endwhile; ?>

<?php get_footer();