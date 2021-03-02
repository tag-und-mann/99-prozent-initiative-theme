<?php if( have_rows('home_logos') ): ?>
    <section class="home-logos-block">

        <div class="container-main">
            <div class="home-logos-content">

                <div class="title-block">
                    <p class="sub-heading1 text-orange"><?php echo __('Gegner der Initiative', 'economiesuisse') ?></p>
                    <h2 class="heading1 text-white"><?php echo get_field('home_logo_titel'); ?></h2>

                    <div class="divider"></div>
                </div>

                <script>
                    new ScrollMagic.Scene({
                        triggerElement: ".home-logos-block .title-block",
                        triggerHook: 0.9,
                        offset: 0
                    })
                        .setClassToggle(".home-logos-block .title-block", "visibleBlock")
                        .addTo(controller);
                </script>

                <div class="logos logos-desk">
                    <?php while ( have_rows('home_logos') ) : the_row(); ?>
                        <div class="logo">

                            <?php if(get_sub_field('bild', get_the_ID())): ?>
                                <div class="picture">
                                    <img src="<?php echo get_sub_field('bild', get_the_ID()); ?>">
                                </div>
                            <?php endif; ?>

                        </div>
                    <?php  endwhile; ?>
                </div>

                <script>
                    new ScrollMagic.Scene({
                        triggerElement: ".home-logos-block .logos-desk",
                        triggerHook: 0.9,
                        offset: 0
                    })
                        .setClassToggle(".home-logos-block .logos-desk", "visibleBlock")
                        .addTo(controller);
                </script>

                <div class="logos logos-mob">
                    <?php $g = 1; while ( have_rows('home_logos') ) : the_row(); ?>
                        <div class="logo <?php echo $g > 3 ? 'logo-hidden' : ''; ?>" data-counter="<?php echo $g; ?>">

                            <?php if(get_sub_field('bild', get_the_ID())): ?>
                                <div class="picture">
                                    <img src="<?php echo get_sub_field('bild', get_the_ID()); ?>">
                                </div>
                            <?php endif; ?>

                        </div>

                        <script>
                            new ScrollMagic.Scene({
                                triggerElement: ".home-logos-block .logos-mob .logo[data-counter='<?php echo $g; ?>']",
                                triggerHook: 0.9,
                                offset: 0
                            })
                                .setClassToggle(".home-logos-block .logos-mob .logo[data-counter='<?php echo $g; ?>']", "visibleBlock")
                                .addTo(controller);
                        </script>
                    <?php $g++; endwhile; ?>

                    <div class="link">
                        <a href="#" class="button button-border-red logos-more-btn">
                            <div>
                                <span><?php echo __('Mehr laden', 'economiesuisse') ?></span>
                            </div>
                        </a>
                    </div>

                    <script>
                        new ScrollMagic.Scene({
                            triggerElement: ".home-logos-block .logos-mob .link",
                            triggerHook: 0.9,
                            offset: 0
                        })
                            .setClassToggle(".home-logos-block .logos-mob .link", "visibleBlock")
                            .addTo(controller);
                    </script>
                </div>

            </div>
        </div>
    </section>
<?php endif; ?>