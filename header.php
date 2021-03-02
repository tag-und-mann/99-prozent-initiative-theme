<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="description" content="">

    <?php if(strpos(get_page_template_slug(), 'hidden') !== false): ?>
        <meta name="robots" content="noindex, nofollow">
    <?php endif; ?>


    <?php if(ICL_LANGUAGE_CODE == 'fr'): ?>
        <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/images/Nein_zur_UVI_favicon_fr.png" sizes="48x48">
    <?php elseif(ICL_LANGUAGE_CODE == 'it'): ?>
        <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/images/Nein_zur_UVI_favicon_it.png" sizes="48x48">
    <?php else: ?>
        <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/images/Nein_zur_UVI_favicon.png" sizes="48x48">
    <?php endif; ?>




    <?php
    global $post;

    if($post) {
        $id = $post->ID;
    }else{
        $id = null;
    }

    $share_title = get_the_title($id);
    $share_desc = get_field('seitenbeschreibung', $id);
    $share_url = get_the_permalink($id);
    $share_image = get_field('header_bild', get_the_ID()) ? get_field('header_bild', get_the_ID())['sizes']['medium'] : '';

    ?>

    <meta property="fb:app_id" content="<?php the_field('facebook_api_key', 'option')?>" />
    <meta property="og:site_name" content="<?php echo get_bloginfo('name') ?>" id="meta_site_name" />
    <meta property="og:title" content="<?php echo $share_title; ?>" id="meta_title" />
    <meta property="og:description" content="<?php echo $share_desc; ?>" id="meta_description" />
    <meta property="og:type" content="article">
    <meta property="og:url" content="<?php echo $share_url; ?>" id="meta_share_url" />
    <meta property="og:image" content="<?php echo $share_image; ?>"  id="meta_share_img" />


    <?php wp_head(); ?>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-99832845-8"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-99832845-8');
    </script>
</head>
<body <?php body_class(); ?>>

<script>
    var controller = new ScrollMagic.Controller();

    let max_posts = null;
    let max_posts_mob = null;
</script>

<div class="point-767px"></div>

<?php get_template_part( 'template-parts/content', 'overlay' ); ?>


<?php if(!is_front_page()): ?>
    <?php get_template_part( 'template-parts/content', 'header-navigation' ); ?>
<?php endif; ?>


<?php if(is_front_page()): ?>
    <?php get_template_part( 'template-parts/content', 'header-home' ); ?>
<?php endif; ?>

<?php if(is_page() && !is_front_page() && strpos(get_page_template_slug(), 'aktuell') === false || is_404()): ?>
    <?php get_template_part( 'template-parts/content', 'header-page' ); ?>
<?php endif; ?>

<?php if(is_single()): ?>
    <?php get_template_part( 'template-parts/content', 'header-single' ); ?>
<?php endif; ?>


<?php if(strpos(get_page_template_slug(), 'aktuell')): ?>
    <?php get_template_part( 'template-parts/content', 'header-aktuell' ); ?>
<?php endif; ?>




