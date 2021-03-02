<div class="aktuell-nav">
    <div class="filters">

        <div class="filters-hidden">
            <div class="top">
                <p class="margin-bottom-0">
                    <span><?php echo __('Beiträge Filtern', 'economiesuisse') ?> </span>
                    <span class="filters-count"></span>
                    <i class="fa fa-angle-up" aria-hidden="true"></i>
                </p>

                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/filters-close.svg" class="close-posts-filter-menu">
            </div>

            <div class="all-tags">
                <p class="margin-bottom-0"><?php echo __('Kategorie', 'economiesuisse') ?>:</p>
                <div>
                    <ul>
                        <?php
                        $all_tags = get_tags();
                        if ($all_tags){
                            foreach ($all_tags as $tag){
                                echo '<li class="filter-tag" data-filter="0" data-id="' . $tag->term_id . '">' . $tag->name . '</li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>

        <a
            href="#"
            class="button button-border-red button-text-small open-posts-filter-menu"
        >
            <div>
                <span><?php echo __('Beiträge Filtern', 'economiesuisse') ?> </span>
                <span class="filters-count"></span>
                <i class="fa fa-angle-down" aria-hidden="true"></i>
            </div>
        </a>
    </div>

    <div class="search">
        <input type="text" placeholder="<?php echo __('Suche', 'economiesuisse') ?>" >
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/search.svg">
    </div>
</div>

<script>
    new ScrollMagic.Scene({
        triggerElement: ".aktuell-nav",
        triggerHook: 0.9,
        offset: 0
    })
        .setClassToggle(".aktuell-nav", "visibleBlock")
        .addTo(controller);
</script>