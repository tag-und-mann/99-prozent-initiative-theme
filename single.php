<?php
/**
 * Single Post Page
 */

if(get_post_type() == 'person'){
    header("Location: ".get_bloginfo('url'));
    exit();
}

get_header(); ?>


<?php while ( have_posts() ) : the_post(); ?>

    <main class="single-post">


        <div class="container-main">

            <div class="single-container">

                <article class="single-main-content">
                    <?php the_content(); ?>

                    <div class="single-main-content-bottom">
                        <div class="divider"></div>

                        <div class="share-icons-bottom">
                            <?php set_query_var( 'color', '#DE0B1C' ); ?>
                            <?php get_template_part( 'template-parts/content', 'share-icons' ); ?>
                        </div>

                        <div class="link">
                            <div class="link">
                                <a href="<?php echo get_field('aktuell_seite_link', 'option'); ?>" class="button button-border-red button-single">
                                    <div>
                                       <span><?php echo __('Zurück zur Übersicht', 'economiesuisse') ?></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>

                <div class="single-sidebar">

                    <?php get_sidebar(); ?>

                    <div class="triangle-bottom">
                        <svg viewBox="0 0 100 100" preserveAspectRatio="none">
                            <polygon fill="#cc1719" points="0,0 100,0 0,100"/>
                        </svg>
                    </div>
                </div>

            </div>

        </div>

    </main>

    <?php get_template_part( 'template-parts/content', 'weitere-informationen' ); ?>

    <?php set_query_var( 'forms_block_bg_color', 'orange' ); ?>
    <?php set_query_var( 'form_block_show_line', true ); ?>
    <?php get_template_part( 'template-parts/content', 'forms-block' ); ?>

    <?php set_query_var( 'testimonials_block_show_line', true ); ?>
    <?php get_template_part( 'template-parts/content', 'testimonials-block' ); ?>

<?php endwhile; ?>

<?php get_footer();