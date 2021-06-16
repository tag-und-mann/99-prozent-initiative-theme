<?php

$header_slider_type = get_field('home_header_slider');

if($header_slider_type == 'custom'){
    $header_slider_rows = 'home_header_slider_custom';
}else{
    $header_slider_rows = 'home_header_slider_posts';
}
?>


<?php set_query_var( 'header_slider_type', $header_slider_type ); ?>
<?php get_template_part( 'template-parts/content', 'header-navigation' ); ?>

<header class="home-header">

    <div class="home-header-slider">

        <?php if( have_rows($header_slider_rows) ): ?>
            <?php while ( have_rows($header_slider_rows) ) : the_row(); ?>

                <?php

                if($header_slider_type == 'news'){
                    $post_id = get_sub_field('post')[0];
                    $bg_img_url = get_field('header_bild', $post_id)['url'];
                    $header_text_font_size = '';
                    $header_text_line_height  = '';
                }else{
                    $bg_img_url = get_sub_field('bild') ? get_sub_field('bild')['url'] : '';
                    $header_text_color = '';
                }

                $header_text_font_size = get_sub_field('font_size');
                $header_text_line_height = (int)get_sub_field('font_size') + 16;
                ?>

                <div class="home-header-bg home-header-bg-news">

                    <div class="home-header-bg-image <?php echo $bg_img_url ? 'show-relative' : ''; ?>" style="background-image: url('<?php echo $bg_img_url; ?>')"></div>

                    <div class="triangle-top">
                        <?php set_query_var( 'bg_color', '#e8e8e8' ); ?>
                        <?php get_template_part( 'template-parts/lines/content', 'header-line' ); ?>
                    </div>

                    <div class="home-header-bg-filter"></div>

                    <div class="container-main">

                        <?php if($header_slider_type == 'custom'): ?>
                            <div class="home-header-content-news <?php echo $bg_img_url ? '' : 'full'; ?>">
                                <div>
                                    <?php if(is_array(get_sub_field('link')) && get_post_type(get_sub_field('link')[0]) == 'post' ): ?>
                                        <p class="date"><?php echo getFormatedDate(date('j-n-Y', strtotime(get_post(get_sub_field('link')[0])->post_date)), ICL_LANGUAGE_CODE); ?></p>
                                    <?php endif; ?>

                                    <h1 class="title" style="
                                            font-size: <?php echo $header_text_font_size . 'px'; ?>;
                                            line-height: <?php echo $header_text_line_height . 'px'; ?>;"
                                    >
                                        <span style="line-height: <?php echo $header_text_line_height . 'px'; ?>;">
                                            <?php echo get_sub_field('text'); ?>
                                        </span>
                                    </h1>

                                    <?php if(is_array(get_sub_field('link'))): ?>
                                        <a href="<?php echo get_permalink(get_sub_field('link')[0]); ?>" class="button button-background-blue-text-white">
                                           <div>
                                               <span><?php echo __('Weiterlesen', 'economiesuisse') ?></span>
                                           </div>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="home-header-content-news">
                                <div>
                                    <p class="date"><?php echo getFormatedDate(date('j-n-Y', strtotime(get_post(get_sub_field('link')[0])->post_date)), ICL_LANGUAGE_CODE); ?></p>

                                    <h1 class="title" style="
                                            font-size: <?php echo $header_text_font_size . 'px'; ?>;
                                            line-height: <?php echo $header_text_line_height . 'px'; ?>;"
                                    >
                                        <span>
                                            <?php echo get_the_title($post_id); ?>
                                        </span>
                                    </h1>

                                    <div class="link">
                                        <?php if(get_sub_field('show_button')): ?>
                                            <a href="<?php echo get_the_permalink($post_id); ?>" class="button button-background-blue-text-white">
                                                <div>
                                                    <span><?php echo __('Weiterlesen', 'economiesuisse') ?></span>
                                                </div>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>

    </div>

</header>

