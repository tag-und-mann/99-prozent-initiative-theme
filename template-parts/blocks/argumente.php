<?php

/**
 * Argumente Block Template.
 */

$id = 'argumente-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}


$className = 'argumente-gutenberg-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}


$bild_pos = get_field('argumente_gb_bild_links_oder_rechts');
$title = get_field('argumente_gb_title');
$text = get_field('argumente_gb_text');


$number = get_field('argumente_gb_number');
$bild = get_field('argumente_gb_bild');

$bild_url = '';
if($bild){
    $bild_url = $bild['sizes']['medium'];
}

$bild_or_number = get_field('argumente_gb_nummer_oder_bild');

$counter = uniqid();

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

    <div class="argumente-block-content">

        <?php if($bild_pos == 'right'): ?>
            <div class="image-container image-container-mob" data-counter="<?php echo $counter; ?>">
                <div class="image">
                    <?php if($bild_or_number == 'Bild'): ?>
                        <?php if($bild): ?>
                            <img src="<?php echo $bild_url; ?>">
                        <?php endif; ?>
                    <?php else: ?>
                        <p><?php echo $number; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if($bild_pos == 'left'): ?>
            <div class="image-container image-container-left" data-counter="<?php echo $counter; ?>">
                <div class="image">
                    <?php if($bild_or_number == 'Bild'): ?>
                        <?php if($bild): ?>
                            <img src="<?php echo $bild_url; ?>">
                        <?php endif; ?>
                    <?php else: ?>
                        <p><?php echo $number; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="text-container <?php echo $bild_pos == 'left' ? 'padding-left' : 'padding-right'; ?>" data-counter="<?php echo $counter; ?>">
            <?php if($title): ?>
                <p class="title"><?php echo $title; ?></p>
            <?php endif; ?>

            <div class="text">
                <?php echo apply_filters('the_content', $text); ?>
            </div>
        </div>

        <?php if($bild_pos == 'right'): ?>
            <div class="image-container image-container-right image-container-desk" data-counter="<?php echo $counter; ?>">
                <div class="image">
                    <?php if($bild_or_number == 'Bild'): ?>
                        <?php if($bild): ?>
                            <img src="<?php echo $bild_url; ?>">
                        <?php endif; ?>
                    <?php else: ?>
                        <p><?php echo $number; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

    </div>

</div>

<script>
    jQuery( function( $ ) {

        var controller = new ScrollMagic.Controller();

        new ScrollMagic.Scene({
            triggerElement: ".argumente-gutenberg-block .image-container.image-container-left[data-counter='<?php echo $counter; ?>']",
            triggerHook: 0.9,
            offset: 0
        })
            .setClassToggle(".argumente-gutenberg-block .image-container.image-container-left[data-counter='<?php echo $counter; ?>']", "visibleBlock")
            .addTo(controller);

        new ScrollMagic.Scene({
            triggerElement: ".argumente-gutenberg-block .image-container.image-container-right[data-counter='<?php echo $counter; ?>']",
            triggerHook: 0.9,
            offset: 0
        })
            .setClassToggle(".argumente-gutenberg-block .image-container.image-container-right[data-counter='<?php echo $counter; ?>']", "visibleBlock")
            .addTo(controller);

        new ScrollMagic.Scene({
            triggerElement: ".argumente-gutenberg-block .image-container.image-container-mob[data-counter='<?php echo $counter; ?>']",
            triggerHook: 0.9,
            offset: 0
        })
            .setClassToggle(".argumente-gutenberg-block .image-container.image-container-mob[data-counter='<?php echo $counter; ?>']", "visibleBlock")
            .addTo(controller);

        new ScrollMagic.Scene({
            triggerElement: ".argumente-gutenberg-block .text-container[data-counter='<?php echo $counter; ?>']",
            triggerHook: 0.9,
            offset: 0
        })
            .setClassToggle(".argumente-gutenberg-block .text-container[data-counter='<?php echo $counter; ?>']", "visibleBlock")
            .addTo(controller);

    });
</script>
