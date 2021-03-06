<section class="forms-block <?php echo $forms_block_bg_color; ?>">

    <?php if($form_block_show_line): ?>
        <div class="triangle-top">
            <?php set_query_var( 'bg_color', '#ff2d18' ); ?>
            <?php get_template_part( 'template-parts/lines/content', 'default-line' ); ?>
        </div>
    <?php endif; ?>

    <div class="container-main">
        <div class="forms-block-content">
            <div class="title-block">
                <p class="sub-heading1"><?php echo __('Mitmachen', 'economiesuisse') ?></p>
                <h2 class="heading1"><?php echo __('Helfen auch Sie mit!', 'economiesuisse') ?></h2>
            </div>

            <div class="forms">

                <div class="form" data-counter="1">
                    <?php if(get_field('komitee_form_icon', 'option')): ?>
                        <img src="<?php echo get_field('komitee_form_icon', 'option'); ?>">
                    <?php endif; ?>

                    <div>
                        <p class="form-title"><?php echo get_field('komitee_form_titel', 'option'); ?></p>
                        <a href="#" class="button button-background-blue-text-white button-forms-block overlay-open" data-type="komitee" id="komitee-form_overlay">
                            <div>
                                <span><?php echo __('Mehr dazu', 'economiesuisse') ?></span>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="form" data-counter="2">
                    <?php if(get_field('testimonial_form_icon', 'option')): ?>
                        <img src="<?php echo get_field('testimonial_form_icon', 'option'); ?>">
                    <?php endif; ?>

                    <div>
                        <p class="form-title"><?php echo get_field('testimonial_form_titel', 'option'); ?></p>
                        <a href="#" class="button button-background-blue-text-white button-forms-block overlay-open" data-type="testimonial" id="testimonial-form_overlay">
                            <div>
                                <span><?php echo __('Mehr dazu', 'economiesuisse') ?></span>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="form" data-counter="3">
                    <?php if(get_field('newsletter_form_icon', 'option')): ?>
                        <img src="<?php echo get_field('newsletter_form_icon', 'option'); ?>">
                    <?php endif; ?>

                    <div>
                        <p class="form-title"><?php echo get_field('newsletter_form_titel', 'option'); ?></p>
                        <a href="#" class="button button-background-blue-text-white button-forms-block overlay-open" data-type="newsletter" id="newsletter-form_overlay">
                            <div>
                                <span><?php echo __('Mehr dazu', 'economiesuisse') ?></span>
                            </div>
                        </a>
                    </div>
                </div>

                <script>
                    new ScrollMagic.Scene({
                        triggerElement: ".forms-block-content .title-block",
                        triggerHook: 0.9,
                        offset: 0
                    })
                        .setClassToggle(".forms-block-content .title-block", "visibleBlock")
                        .addTo(controller);

                    new ScrollMagic.Scene({
                        triggerElement: ".forms-block-content .form[data-counter='1']",
                        triggerHook: 0.9,
                        offset: 0
                    })
                        .setClassToggle(".forms-block-content .form[data-counter='1']", "visibleBlock")
                        .addTo(controller);

                    new ScrollMagic.Scene({
                        triggerElement: ".forms-block-content .form[data-counter='2']",
                        triggerHook: 0.9,
                        offset: 0
                    })
                        .setClassToggle(".forms-block-content .form[data-counter='2']", "visibleBlock")
                        .addTo(controller);

                    new ScrollMagic.Scene({
                        triggerElement: ".forms-block-content .form[data-counter='3']",
                        triggerHook: 0.9,
                        offset: 0
                    })
                        .setClassToggle(".forms-block-content .form[data-counter='3']", "visibleBlock")
                        .addTo(controller);
                </script>
            </div>
        </div>
    </div>
</section>

<script>
    jQuery( function( $ ) {
        let forms_block_prev_el = $('.forms-block').prevAll('section');

        if(forms_block_prev_el.length === 0){
            forms_block_prev_el = $('main section');
        }

        if(forms_block_prev_el.length === 0){
            forms_block_prev_el = $('main');
        }

        if(forms_block_prev_el.css('background-color') !== 'rgba(0, 0, 0, 0)'){
            $('.forms-block').find('.triangle-top').css('background-color', forms_block_prev_el.css('background-color'));
        }else{
            $('.forms-block').find('.triangle-top').css('background-color', '#ffffff');
        }
    });
</script>