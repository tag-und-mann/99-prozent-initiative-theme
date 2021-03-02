<?php

$post_id = get_field('aktuell_kopfzeile_beitrag');

global $sitepress;
$sitepress->switch_lang(ICL_LANGUAGE_CODE);

if(is_array($post_id)){
    $post_id = $post_id[0];
}else{
    $latest_post = get_posts( [
        'fields'    => 'ids',
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 1,
        'suppress_filters' => false,
    ]);

    $post_id = $latest_post[0];
}

$header_bg = get_field('header_bild', $post_id);
$header_bg_url = '';
$header_text_color = get_field('page_header_text_color', $post_id);

if($header_bg){
    $header_bg_url = $header_bg['sizes']['large'];
}
?>

<header class="single-header aktuell" style="background-image: url('<?php echo $header_bg_url; ?>')">

    <div class="triangle-top">
        <?php set_query_var( 'bg_color', '#e8e8e8' ); ?>
        <?php get_template_part( 'template-parts/lines/content', 'header-line' ); ?>
    </div>

    <div class="home-header-bg-filter"></div>

    <div class="container-main">
        <div class="container-header-text single-header-content">
            <div>

                <h2 class="page-title" style="color: <?php echo $header_text_color; ?>">
                    <?php echo get_the_title(); ?>
                </h2>

                <h1 class="title" style="color: <?php echo $header_text_color; ?>">
                    <span>
                        <?php echo get_the_title($post_id); ?>

                    </span>
                </h1>

                <p class="text" style="color: <?php echo $header_text_color; ?>">
                    <?php echo get_field('page_header_text', $post_id); ?>
                </p>

                <div class="link">
                    <a
                            href="<?php echo get_the_permalink($post_id); ?>"
                            class="button button-border-white"
                            style="color: <?php echo $header_text_color; ?>; border: 2px solid <?php echo $header_text_color; ?>;   background-image: linear-gradient(
                                    to right,
                                    <?php echo $header_text_color === '#ffffff' ? $header_text_color : '#ffffff'; ?>,
                                    <?php echo $header_text_color === '#ffffff' ? $header_text_color : '#ffffff'; ?> 50%,
                                    transparent 50%);"
                    >
                        <div>
                            <span><?php echo __('Weiterlesen', 'economiesuisse') ?></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>