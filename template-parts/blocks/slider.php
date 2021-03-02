<?php

/**
 * Darum gehts Block Template.
 */

$id = 'slider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}


$className = 'slider-gutenberg-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}


$slider_type = get_field('slider_gb_video_oder_bild');

if($slider_type == 'image'){
    $slider = 'slider_gb_bild';
}else{
    $slider = 'slider_gb_video';
}

$slider_id = uniqid();

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

    <div class="single-slider single-slider-<?php echo $slider_id; ?>">

        <?php while ( have_rows($slider) ) : the_row(); ?>

            <?php if($slider_type == 'image'): ?>
                <div class="media-bild">
                    <figure>
                        <img src="<?php echo get_sub_field('bild')['sizes']['slider']; ?>" alt="<?php echo get_sub_field('bild')['title']; ?>">
                        <figcaption><?php echo get_sub_field('text'); ?></figcaption>
                    </figure>
                </div>
            <?php else: ?>
                <div class="media-bild">
                    <figure>
                        <div class="video-wrapper">
                            <?php echo get_sub_field('video'); ?>
                        </div>
                        <figcaption><?php echo get_sub_field('text'); ?></figcaption>
                    </figure>
                </div>
            <?php endif; ?>

        <?php endwhile; ?>

    </div>

</div>

<script>
    jQuery( document ).ready( function($) {
        $('.single-slider-<?php echo $slider_id; ?>').slick({
            dots: true,
            infinite: true,
            speed: 500,
            fade: false,
            autoplaySpeed: 5000,
            cssEase: 'linear',
            autoplay: false,
            slidesToShow: 1,
            slidesToScroll: 1,
        });

        let sliderGbDotsWidth = $('.single-slider-<?php echo $slider_id; ?>  .slick-dots').innerWidth() / 2;

        getSliderArrowsPosition();

        $(window).resize(function(){
            getSliderArrowsPosition();
        });

        function getSliderArrowsPosition() {
            if($('.point-767px').css('display') === 'none'){
                $('.single-slider-<?php echo $slider_id; ?> .slick-next').css({
                    right: 'calc(50% - ' + sliderGbDotsWidth + 'px - 57px)',
                });
                $('.single-slider-<?php echo $slider_id; ?> .slick-prev').css({
                    left: 'calc(50% - ' + sliderGbDotsWidth + 'px - 57px)',
                });
            }else{
                $('.single-slider-<?php echo $slider_id; ?> .slick-next').css({
                    right: '0',
                });
                $('.single-slider-<?php echo $slider_id; ?> .slick-prev').css({
                    left: '0',
                });
            }
        }


    });
</script>