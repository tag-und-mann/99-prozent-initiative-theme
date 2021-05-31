<div class="mobile-menu">

    <div class="mobile-menu-top">
        <div class="container-main">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/burger-close.svg" class="burger-close" />
        </div>
    </div>

    <div class="mobile-menu-content">
        <div class="container-main">

            <div class="mobile-menu-content-inner">

                <div class="menu">
                    <?php navigation_main_menu(); ?>
                </div>

                <div class="lang-and-socials">
                    <!-- lang-switcher is in three places: content-header-navigation and footer -->
                    <div class="lang-switcher">

                        <?php
                        if(is_dynamic_sidebar('lang_switcher')){
                            dynamic_sidebar('lang_switcher');
                        }
                        ?>

                    </div>

                    <div class="socials">
                        <?php get_template_part( 'template-parts/content', 'socials' ); ?>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>


<nav class="nav <?php echo isset($header_slider_type) && $header_slider_type == 'news' ? 'nav-home-white' : ''; ?>">
    <div class="container-main navigation-container">
        <?php if(ICL_LANGUAGE_CODE == 'fr'): ?>
            <a href="<?php echo home_url(); ?>" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-regular_FR.png" /></a>
        <?php elseif(ICL_LANGUAGE_CODE == 'it'): ?>
            <a href="<?php echo home_url(); ?>" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-regular_IT.png" /></a>
        <?php else: ?>
            <a href="<?php echo home_url(); ?>" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-regular.svg" /></a>
        <?php endif; ?>

        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/burger.svg" class="burger-open" />

        <div class="nav-left">
            <div class="menu">
                <?php navigation_main_menu(); ?>
            </div>


<!--          lang-switcher is in three places: content-header-navigation and footer -->

            <div class="lang-switcher">

                <?php
                if(is_dynamic_sidebar('lang_switcher')){
                    dynamic_sidebar('lang_switcher');
                }
                ?>

            </div>

            <div class="socials">
                <?php get_template_part( 'template-parts/content', 'socials' ); ?>
            </div>
        </div>
    </div>
</nav>

<?php if(!is_front_page()): ?>
    <div class="nav-line"></div>
<?php endif; ?>