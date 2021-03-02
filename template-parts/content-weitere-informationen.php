<?php if(have_rows('weitere_informationen_links')):  ?>

    <section class="weitere-informationen">

        <div class="<?php echo is_single() ? 'container-main' : 'container-min'; ?>">

            <h4 class="weitere-informationen-title"><?php echo __('Weitere Informationen', 'economiesuisse') ?></h4>


            <div class="links">

                <?php $k = 1; while(have_rows('weitere_informationen_links')): the_row(); ?>

                    <?php
                    if(get_sub_field('link_email_oder_file') == 'link'){
                        $url = get_sub_field('link_url');
                        $download = '';
                    }elseif(get_sub_field('link_email_oder_file') == 'email'){
                        $url = 'mailto:' . get_sub_field('email');
                        $download = '';
                    }else{
                        $url = get_sub_field('file')['url'];
                        $download = 'download';
                    }
                    ?>

                    <a href="<?php echo $url; ?>" <?php echo get_sub_field('link_email_oder_file') != 'email' ? 'target="_blank"' : ''?>  <?php echo $download; ?> class="<?php echo  $k % 2 == 0 ? 'right' : 'left'?>">

                        <?php if(get_sub_field('link_email_oder_file') == 'link' || get_sub_field('link_email_oder_file') == 'email'): ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/link.svg">
                        <?php else: ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/download.svg">
                        <?php endif; ?>

                        <span>
                            <?php echo get_sub_field('link_title', get_the_ID()); ?>
                            <?php if(get_sub_field('link_email_oder_file') == 'file'): ?>
                                (<?php echo getFileSize( get_sub_field('file', get_the_ID())['ID'] ); ?>)
                            <?php endif; ?>
                        </span>
                    </a>

                    <?php $k++; endwhile; ?>

            </div>

        </div>
    </section>

    <script>
        new ScrollMagic.Scene({
            triggerElement: ".weitere-informationen .weitere-informationen-title",
            triggerHook: 0.9,
            offset: 0
        })
            .setClassToggle(".weitere-informationen .weitere-informationen-title", "visibleBlock")
            .addTo(controller);

        new ScrollMagic.Scene({
            triggerElement: ".weitere-informationen .links",
            triggerHook: 0.9,
            offset: 0
        })
            .setClassToggle(".weitere-informationen .links", "visibleBlock")
            .addTo(controller);
    </script>

<?php endif; ?>