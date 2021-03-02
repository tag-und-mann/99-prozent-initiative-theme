<?php if( have_rows('home_argumente_list') ): ?>
    <section class="home-argumente-block">

        <svg class="home_argumente_line_with_arrow" preserveAspectRatio="none" viewBox="0 0 581 156" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="Desktop" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="Landingpage" transform="translate(67.000000, -2779.000000)">
                    <g id="Group-13" transform="translate(-66.120017, 2782.331315)">
                        <polygon id="Triangle" fill="#FFFFFF" transform="translate(558.120017, 131.168685) rotate(12.000000) translate(-558.120017, -131.168685) " points="558.120017 114.668685 576.120017 147.668685 540.120017 147.668685"></polygon>
                        <polyline id="Path-4" stroke="#FFFFFF" stroke-width="4" points="0 100.435182 330.981105 -1.42108547e-13 345.752726 111.668685 479.120017 74.1466065 523.366915 111.668685 555.752726 137.668685"></polyline>
                    </g>
                </g>
            </g>
        </svg>

        <div class="container-main">
            <div class="home-argumente-block-content">

                <div class="title-block">
                    <p class="sub-heading1 text-white"><?php echo __('Argumente', 'economiesuisse') ?></p>
                    <h2 class="heading1 text-blue"><?php echo get_field('home_argumente_title'); ?></h2>
                </div>

                <script>
                    new ScrollMagic.Scene({
                        triggerElement: ".home-argumente-block .title-block",
                        triggerHook: 0.9,
                        offset: 0
                    })
                        .setClassToggle(".home-argumente-block .title-block", "visibleBlock")
                        .addTo(controller);
                </script>

                <div class="arguments">

                    <?php $r = 1; $p = 1; while ( have_rows('home_argumente_list') ) : the_row(); ?>

                        <div class="argument delay-<?php echo $p; ?>" data-counter="<?php echo $r; ?>">
                            <div class="argument-top">
                                <div class="argument-number"><p><?php echo $r; ?>.</p></div>
                                <div class="argument-title"><?php echo apply_filters('the_content', get_sub_field('titel')); ?></div>
                                <div class="argument-text"><?php echo apply_filters('the_content', get_sub_field('text')); ?></div>
                            </div>

                            <div class="argument-btn">
                                <div class="open">
                                    <a href="#" class="button button-background-orange-text-white">
                                        <div>
                                            <span><?php echo __('Mehr lesen', 'economiesuisse') ?></span>
                                        </div>
                                    </a>
                                </div>
                                <div class="close">
                                    <a href="#" class="button button-background-orange-text-white">
                                        <div>
                                            <span><?php echo __('Schliessen', 'economiesuisse') ?></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <script>
                            new ScrollMagic.Scene({
                                triggerElement: ".home-argumente-block .argument[data-counter='<?php echo $r; ?>']",
                                triggerHook: 0.9,
                                offset: 0
                            })
                                .setClassToggle(".home-argumente-block .argument[data-counter='<?php echo $r; ?>']", "visibleBlock")
                                .addTo(controller);
                        </script>

                    <?php $r++; $p++; if($p > 3){$p = 1;} endwhile; ?>
                </div>

                <?php if(get_field('home_argumente_link')):  ?>
                    <div class="link" style="display: none">
                        <a href="<?php echo get_field('home_argumente_link'); ?>" class="button button-background-blue-text-white button-argumente-block">
                            <div>
                                <span><?php echo __('Mehr erfahren', 'economiesuisse') ?></span>
                              </div>
                        </a>
                    </div>

                    <script>
                        new ScrollMagic.Scene({
                            triggerElement: ".home-argumente-block .link",
                            triggerHook: 0.9,
                            offset: 0
                        })
                            .setClassToggle(".home-argumente-block .link", "visibleBlock")
                            .addTo(controller);
                    </script>
                <?php endif;  ?>
            </div>
        </div>
    </section>
<?php endif; ?>