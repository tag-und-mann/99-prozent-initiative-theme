<?php

get_header(); ?>

    <main class="default-page">

        <div class="triangle-top">
            <?php set_query_var( 'bg_color', '#ffffff' ); ?>
            <?php get_template_part( 'template-parts/lines/content', 'header-line' ); ?>
        </div>


        <section class="container-min error-404">

            <button onclick="history.back()" class="button button-border-red btn-back"><?php echo __('Zurück', 'economiesuisse') ?></button>

        </section>

    </main>

<?php get_template_part( 'template-parts/content', 'weitere-informationen' ); ?>

<?php set_query_var( 'forms_block_bg_color', 'gray' ); ?>
<?php set_query_var( 'form_block_show_line', true ); ?>
<?php get_template_part( 'template-parts/content', 'forms-block' ); ?>

<?php set_query_var( 'testimonials_block_show_line', true ); ?>
<?php get_template_part( 'template-parts/content', 'testimonials-block' ); ?>


<?php get_footer();

