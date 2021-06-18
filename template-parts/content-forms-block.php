<?php
$triagnle_color = '#ffffff';
if($forms_block_bg_color == 'orange'){
    $triagnle_color = '#cc1719';
}

if($forms_block_bg_color == 'white'){
    $triagnle_color = '#ffffff';
}

if($forms_block_bg_color == 'gray'){
    $triagnle_color = '#e8e8e8';
}

if(is_single() || is_404()){
    $triagnle_color = '#e8e8e8';
}

?>

<section class="forms-block <?php echo $forms_block_bg_color; ?>">

    <?php if($form_block_show_line): ?>
        <div class="triangle-top">
            <?php set_query_var( 'bg_color', $triagnle_color ); ?>
            <?php get_template_part( 'template-parts/lines/content', 'default-line' ); ?>
        </div>
    <?php endif; ?>

    <div class="container-main">
        <div class="forms-block-content">
            <div class="title-block">
                <p class="sub-heading1"><?php echo __('Jetzt', 'economiesuisse') ?></p>
                <h2 class="heading1"><?php echo __('Helfen auch Sie mit!', 'economiesuisse') ?></h2>
            </div>

            <div class="form" data-counter='1'>
                <?php echo do_shortcode('[formidable id='. get_field('komitee_formidable_form_shortcode_id', 'option') . ']'); ?>
            </div>

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