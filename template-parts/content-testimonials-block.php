<?php

$testimonials = new WP_Query([
    'post_type' => 'person',
    'posts_per_page' => -1,
    'orderby'=>'date',
    'post_status' => 'publish',
    'suppress_filters' => false,
    'meta_query' => [
        'relation' => 'AND',
        [
            'key' => 'person_testimonial_approved',
            'compare' => '=',
            'value' => '1',
        ],                            [
            'key' => 'person_testimonial_show',
            'compare' => '=',
            'value' => '1',
        ],
    ]
]);

if($testimonials->post_count == 0){
    $testimonials = new WP_Query([
        'post_type' => 'person',
        'posts_per_page' => -1,
        'orderby'   => 'rand',
        'post_status' => 'publish',
        'suppress_filters' => false,
        'meta_query' => [
            'relation' => 'AND',
            [
                'key' => 'person_testimonial_approved',
                'compare' => '=',
                'value' => '1',
            ],
        ]
    ]);
}

?>

<?php if($testimonials->post_count): ?>
    <section class="testimonials-block <?php echo $testimonials_block_show_line ? 'testimonials-block-padding-top-0' : ''; ?>">

        <?php if($testimonials_block_show_line): ?>
            <div class="triangle-top">
                <?php set_query_var( 'bg_color', '#45436c' ); ?>
                <?php get_template_part( 'template-parts/lines/content', 'default-line' ); ?>
            </div>
        <?php endif; ?>

        <div class="container-main">
            <div class="testimonials-content">

                <div class="title-block">
                    <p class="sub-heading1 text-orange"><?php echo __('Testimonials', 'economiesuisse') ?></p>
                    <h2 class="heading1 text-white"><?php echo get_field('testimonial_block_beschreibung', 'option')?></h2>
                </div>

                <script>
                    new ScrollMagic.Scene({
                        triggerElement: ".testimonials-block .title-block",
                        triggerHook: 0.9,
                        offset: 0
                    })
                        .setClassToggle(".testimonials-block .title-block", "visibleBlock")
                        .addTo(controller);
                </script>

                <div class="testimonials">
                    <?php while($testimonials->have_posts()): $testimonials->the_post(); ?>
                        <div class="testimonial">
                            <div class="testimonial-inner">
                                <div class="content-top">
                                    <?php if(get_field('person_foto', get_the_ID())): ?>
                                        <div class="picture picture-desk"
                                             style="background-image: url('<?php echo get_field('person_foto', get_the_ID())['sizes']['testimonial']; ?>');
                                                     background-position: <?php echo get_field('person_foto_position', get_the_ID()); ?>;"
                                        >
                                        </div>

                                        <div class="picture picture-mob">
                                            <img src="<?php echo get_field('person_foto', get_the_ID())['sizes']['testimonial']; ?>">
                                        </div>
                                    <?php endif; ?>

                                    <?php if(get_field('person_testimonial_text', get_the_ID())): ?>
                                        <p class="text text-black"><?php echo get_field('person_testimonial_text', get_the_ID()); ?></p>
                                    <?php endif; ?>
                                </div>

                                <div class="content-bottom">
                                    <p class="name text-orange">
                                        <?php echo get_field('person_vorname', get_the_ID()); ?>
                                        <?php echo get_field('person_nachname', get_the_ID()); ?>
                                    </p>
                                    <p class="function text-orange margin-bottom-0"><?php echo get_field('person_funktion', get_the_ID()); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>

                <script>
                    new ScrollMagic.Scene({
                        triggerElement: ".testimonials-block .testimonials",
                        triggerHook: 0.9,
                        offset: 0
                    })
                        .setClassToggle(".testimonials-block .testimonials", "visibleBlock")
                        .addTo(controller);
                </script>

            </div>
        </div>
    </section>

<script>
    jQuery( function( $ ) {
        const testimonials_block_prev_el = $('.testimonials-block').prevAll('section');
        $('.testimonials-block').find('.triangle-top').css('background-color', testimonials_block_prev_el.css('background-color'));
    });
</script>
<?php endif; ?>
