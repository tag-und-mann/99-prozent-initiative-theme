<?php

/**
 * Custom button Block Template.
 */

$id = 'custo-button-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}


$className = 'custom-button-gutenberg-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}


$button = get_field('custom_button_link');

$counter = uniqid();

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>"  data-counter="<?php echo $counter; ?>">

    <?php if($button): ?>
        <a href="<?php echo $button['url']; ?>" class="button button-border-red" target="<?php echo $button['target']; ?>">
            <div>
                <span><?php echo $button['title']; ?></span>
            </div>
        </a>
    <?php endif; ?>

</div>

<script>
    jQuery( function( $ ) {

        var controller = new ScrollMagic.Controller();

        new ScrollMagic.Scene({
            triggerElement: ".custom-button-gutenberg-block[data-counter='<?php echo $counter; ?>']",
            triggerHook: 0.9,
            offset: 0
        })
            .setClassToggle(".custom-button-gutenberg-block[data-counter='<?php echo $counter; ?>']", "visibleBlock")
            .addTo(controller);
    });
</script>