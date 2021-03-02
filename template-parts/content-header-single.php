<?php

$header_bg = get_field('header_bild');
$header_bg_url = '';
$header_text_color = get_field('page_header_text_color');

if($header_bg){
    $header_bg_url = $header_bg['sizes']['large'];
}
?>

<header class="single-header" style="background-image: url('<?php echo $header_bg_url; ?>')">

    <div class="home-header-bg-filter"></div>

    <div class="container-main">
        <div class="container-header-text single-header-content">
            <div>

                <h2 class="page-title" style="color: <?php echo $header_text_color; ?>">
                    <?php echo __('Aktuell', 'economiesuisse') ?>
                </h2>

                <h1 class="title" style="color: <?php echo $header_text_color; ?>">
                    <span>
                        <?php echo get_the_title(); ?>
                    </span>
                </h1>

                <p class="text" style="color: <?php echo $header_text_color; ?>">
                    <?php echo get_field('page_header_text'); ?>
                </p>

                <div class="share-icons">
                    <?php set_query_var( 'color', $header_text_color ); ?>
                    <?php get_template_part( 'template-parts/content', 'share-icons' ); ?>
                </div>
            </div>
        </div>
    </div>
</header>