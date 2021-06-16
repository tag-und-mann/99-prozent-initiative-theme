<footer>
    <div class="container-main footer-content">
        <div class="col-1">
            <a href="<?php echo home_url(); ?>" class="logo">
                <?php if(ICL_LANGUAGE_CODE == 'fr'): ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-footer-regular_FR.png" />
                <?php elseif(ICL_LANGUAGE_CODE == 'it'): ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-footer-regular_IT.png" />
                <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-footer-regular.svg" class="logo-de" />
                <?php endif; ?>
            </a>

            <div class="menu menu-mob">
                <?php navigation_footer_menu(); ?>
            </div>

            <div class="footer-lang-and-socials footer-lang-and-socials-mob">
                <!-- lang-switcher is in three places: content-header-navigation and footer -->
                <div class="lang-switcher">

                    <?php
                    if(is_dynamic_sidebar('lang_switcher')){
                        dynamic_sidebar('lang_switcher');
                    }
                    ?>

                </div>

                <div class="socials socials-desk">
                    <?php get_template_part( 'template-parts/content', 'socials' ); ?>
                </div>
            </div>

            <div class="link">
                <?php if(get_field('newsletter_formidable_form_shortcode_id', 'option')):  ?>
                    <div class="link">
                        <a href="#" class="button button-background-white button-footer overlay-open"  data-type="newsletter">
                            <div>
                                <span><?php echo __('Newsletter abonnieren', 'economiesuisse') ?></span>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
            </div>

            <div class="footer-lang-and-socials footer-lang-and-socials-desk">
                <!-- lang-switcher is in three places: content-header-navigation and footer -->
                <div class="lang-switcher">

                    <?php
                    if(is_dynamic_sidebar('lang_switcher')){
                        dynamic_sidebar('lang_switcher');
                    }
                    ?>

                </div>

                <div class="socials socials-desk">
                    <?php get_template_part( 'template-parts/content', 'socials' ); ?>
                </div>
            </div>
        </div>

        <script>
            new ScrollMagic.Scene({
                triggerElement: "footer .col-1",
                triggerHook: 0.9,
                offset: 0
            })
                .setClassToggle("footer .col-1", "visibleBlock")
                .addTo(controller);
        </script>

        <div class="col-2">
            <p class="footer-col-title"><?php echo __('Navigation', 'economiesuisse') ?></p>
            <div class="menu menu-desk">
                <?php navigation_footer_menu(); ?>
            </div>
        </div>

        <script>
            new ScrollMagic.Scene({
                triggerElement: "footer .col-2",
                triggerHook: 0.9,
                offset: 0
            })
                .setClassToggle("footer .col-2", "visibleBlock")
                .addTo(controller);
        </script>

        <div class="col-3">
            <p class="footer-col-title"><?php echo __('Kontakt', 'economiesuisse') ?></p>
            <?php if(get_field('footer_email', 'option')): ?>
                <a href="mailto:<?php echo get_field('footer_email', 'option'); ?>" class="email"><?php echo get_field('footer_email', 'option'); ?></a><br>
            <?php endif; ?>

            <?php if(get_field('footer_copyright', 'option')): ?>
                <div class="copyright"><?php echo apply_filters('the_content', get_field('footer_copyright', 'option')); ?></div>
            <?php endif; ?>

            <?php if(get_field('footer_datenschutzerklarung_link', 'option')): ?>
                <a href="<?php echo get_field('footer_datenschutzerklarung_link', 'option'); ?>" class="site-link"><?php echo get_field('footer_datenschutzerklarung', 'option'); ?></a>
            <?php endif; ?>
        </div>

        <script>
            new ScrollMagic.Scene({
                triggerElement: "footer .col-3",
                triggerHook: 0.9,
                offset: 0
            })
                .setClassToggle("footer .col-3", "visibleBlock")
                .addTo(controller);
        </script>
    </div>
</footer>


<?php wp_footer(); ?>

<?php if(is_front_page()): ?>
    <script>
        jQuery( document ).ready( function($) {
            const home_header_slider = $('.home-header-slider');
            home_header_slider.slick({
                dots: true,
                infinite: true,
                speed: 500,
                fade: true,
                autoplaySpeed: 5000,
                cssEase: 'linear',
                autoplay: false,
            });

            changeHomeHeaderSliderNavigationPosition();
            
            setTimeout(function () {
                changeHomeHeaderSliderNavigationPosition();
            }, 500);


            home_header_slider.find('.slick-next').on('click', function(event, slick, currentSlide){
                changeHomeHeaderSliderNavigationPosition();
            });

            home_header_slider.find('.slick-dots li').on('click', function(event, slick, currentSlide){
                changeHomeHeaderSliderNavigationPosition();
            });

            home_header_slider.find('.slick-prev').on('click', function(event, slick, currentSlide){
                changeHomeHeaderSliderNavigationPosition();
            });

            home_header_slider.on('swipe', function(event, slick, currentSlide){
                changeHomeHeaderSliderNavigationPosition();
            });

            $(window).resize(function(){
                changeHomeHeaderSliderNavigationPosition();
            });

            function changeHomeHeaderSliderNavigationPosition() {
                if($('.point-1400px').css('display') === 'none') {
                    let home_header_slider_content_height = home_header_slider.find('.slick-slide.slick-current').find('.container-main > div > div').height() + 120 + 40;
                    home_header_slider.find('.slick-dots').css('top', home_header_slider_content_height + 'px');
                    home_header_slider.find('.slick-prev').css('top', (home_header_slider_content_height / 2) + 'px');
                    home_header_slider.find('.slick-next').css('top', (home_header_slider_content_height / 2) + 'px');
                }else{
                    let home_header_slider_content_height = home_header_slider.find('.slick-slide.slick-current').find('.container-main > div > div').height() + 120 + 40;
                    home_header_slider.find('.slick-dots').css('top', '90%');
                    home_header_slider.find('.slick-prev').css('top', '90%');
                    home_header_slider.find('.slick-next').css('top', '90%');
                }
            }
        });
    </script>
<?php endif; ?>

<script>
    jQuery( document ).ready( function($) {
        $('.testimonials').slick({
            dots: true,
            infinite: true,
            speed: 500,
            fade: false,
            autoplaySpeed: 5000,
            cssEase: 'linear',
            autoplay: false,
            slidesToShow: 3,
            slidesToScroll: 3,
            responsive: [
                {
                    breakpoint: 920,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });

        $('.logos-desk').slick({
            dots: true,
            infinite: true,
            speed: 500,
            fade: false,
            autoplaySpeed: 5000,
            cssEase: 'linear',
            autoplay: false,
            slidesToShow: 5,
            slidesToScroll: 5,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                    }
                },
            ]
        });

        persons_slider($);

    });

    function persons_slider($){
        $('.persons').slick({
            dots: true,
            infinite: true,
            speed: 500,
            fade: true,
            autoplaySpeed: 5000,
            cssEase: 'linear',
            autoplay: false,
            slidesToShow: 1,
            slidesToScroll: 1,
        });

        let personsDotsWidth = $('.persons .slick-dots').innerWidth() / 2;


        $('.persons .slick-next').css({
            right: 'calc(50% - ' + personsDotsWidth + 'px - 44px)',
        });
        $('.persons .slick-prev').css({
            left: 'calc(50% - ' + personsDotsWidth + 'px - 44px)',
        });
    }
</script>


</body>
</html>
