<?php

/**
 * Darum gehts Block Template.
 */

$id = 'darum-gehts-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}


$className = 'darum-geths-gutenberg-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}


$text = get_field('darum_gehts_block__list');
$rows_count = count(get_field('darum_gehts_block__list'));

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

    <div class="triangle-top">
        <?php set_query_var( 'bg_color', '#ffffff' ); ?>
        <?php get_template_part( 'template-parts/lines/content', 'header-line' ); ?>
    </div>

    <?php $i = 1; while ( have_rows('darum_gehts_block__list') ) : the_row(); ?>

        <div class="block-bg <?php echo $i != 1 ? 'block-bg-narrow' : ''; ?> <?php echo $i == $rows_count ? 'block-bg-last' : ''; ?> <?php echo $i % 2 != 0 ? 'block-bg-white' : 'block-bg-grey'; ?> ">

            <div class="container-main">
                <div class="darum-gehts-block-content">
                    <div class="left" data-counter="<?php echo $i; ?>">
                        <h2>
                            <span><?php the_sub_field('number'); ?></span>
                            <?php the_sub_field('titel'); ?>
                        </h2>
                    </div>

                    <div class="right" data-counter="<?php echo $i; ?>">
                        <div class="text-regular">
                            <?php echo apply_filters('the_content', get_sub_field('text_regular')); ?>
                        </div>

                        <div class="text-bold">
                            <?php echo apply_filters('the_content', get_sub_field('text_bold')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            jQuery( function( $ ) {

                var controller = new ScrollMagic.Controller();

                new ScrollMagic.Scene({
                    triggerElement: ".darum-geths-gutenberg-block .darum-gehts-block-content .left[data-counter='<?php echo $i; ?>']",
                    triggerHook: 0.9,
                    offset: 0
                })
                    .setClassToggle(".darum-geths-gutenberg-block .darum-gehts-block-content .left[data-counter='<?php echo $i; ?>']", "visibleBlock")
                    .addTo(controller);

                new ScrollMagic.Scene({
                    triggerElement: ".darum-geths-gutenberg-block .darum-gehts-block-content .right[data-counter='<?php echo $i; ?>']",
                    triggerHook: 0.9,
                    offset: 0
                })
                    .setClassToggle(".darum-geths-gutenberg-block .darum-gehts-block-content .right[data-counter='<?php echo $i; ?>']", "visibleBlock")
                    .addTo(controller);

            });
        </script>

    <?php $i++; endwhile; ?>

    <div class="triangle-bottom" style="background-color: <?php echo count(get_field('darum_gehts_block__list')) % 2 == 0 ? '#e8e8e8' : '#ffffff'; ?>">
        <?php set_query_var( 'bg_color', get_field('newsletter_block_color', get_the_ID()) ? get_field('newsletter_block_color', get_the_ID()) : '#e8e8e8'); ?>
        <?php get_template_part( 'template-parts/lines/content', 'default-line' ); ?>
    </div>

</section>

