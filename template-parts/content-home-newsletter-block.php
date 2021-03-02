<?php if(get_field('newsletter_formidable_form_shortcode_id', 'option')): ?>
<section class="home-newsletter-block">
    <div class="container-main">
        <div class="home-newsletter-block-content">
            <div class="title-block">
                <p class="sub-heading1 text-orange"><?php echo __('Newsletter', 'economiesuisse') ?></p>
                <h2 class="heading1 text-blue"><?php echo get_field('newsletter_form_text', 'option'); ?></h2>
            </div>

            <script>
                new ScrollMagic.Scene({
                    triggerElement: ".home-newsletter-block .title-block",
                    triggerHook: 0.9,
                    offset: 0
                })
                    .setClassToggle(".home-newsletter-block .title-block", "visibleBlock")
                    .addTo(controller);
            </script>

            <div class="open-btn-block">
                <div class="open-btn"><?php echo __('Formular ausfüllen', 'economiesuisse') ?></div>
            </div>

            <div class="form">
                <?php echo do_shortcode('[formidable id='. get_field('newsletter_formidable_form_shortcode_id', 'option') . ']'); ?>
                <div class="close-btn-block">
                    <div class="close-btn"><?php echo __('Schliessen', 'economiesuisse') ?></div>
                </div>
            </div>

            <script>
                new ScrollMagic.Scene({
                    triggerElement: ".home-newsletter-block .form",
                    triggerHook: 0.9,
                    offset: 0
                })
                    .setClassToggle(".home-newsletter-block .form", "visibleBlock")
                    .addTo(controller);
            </script>

            </div>
        </div>
    </div>
</section>
<?php endif; ?>