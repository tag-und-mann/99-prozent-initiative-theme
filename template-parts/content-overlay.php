<div class="overlay-container">
    <div class="nav-line"></div>
    <div class="container-main">
        <div class="overlay-container-inner">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/overlay-close.svg" class="overlay-close">

            <div class="container-form">
                <div class="newsletter">
                    <div class="overlay-header-text">
                        <h1 class="title"><?php echo get_field('newsletter_form_titel', 'option'); ?></h1>

                        <div class="text">
                            <?php echo apply_filters('the_content', get_field('newsletter_form_text', 'option')); ?>
                        </div>
                    </div>

                    <div class="form">
                        <?php echo do_shortcode('[formidable id='. get_field('newsletter_formidable_form_shortcode_id', 'option') . ']'); ?>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>