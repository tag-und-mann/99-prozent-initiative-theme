<div class="aktuell-nav-mob">
    <div class="container-main">
        <div class="filters">

            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/filters-close.svg" class="close-posts-filter-menu-mob">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/filter-icon.svg" class="filter-icon">

            <div class="search">
                <div>
                    <input type="text" placeholder="<?php echo __('Suche', 'economiesuisse') ?>" >
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/search.svg">
                </div>
            </div>

            <div class="show-tags">
                <p class="margin-bottom-0">
                    <span><?php echo __('Beiträge Filtern', 'economiesuisse') ?></span>
                    <span class="filters-count"></span>
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                    <i class="fa fa-angle-up visible" aria-hidden="true"></i>
                </p>
            </div>

            <div class="all-tags">
                <p class="margin-bottom-0"><?php echo __('Kategorie', 'economiesuisse') ?>:</p>
                <div>
                    <ul>
                        <?php
                        $all_tags = get_tags();
                        if ($all_tags){
                            foreach ($all_tags as $tag){
                                echo '<li class="filter-tag-mob" data-filter="0" data-id="' . $tag->term_id . '">' . $tag->name . '</li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
