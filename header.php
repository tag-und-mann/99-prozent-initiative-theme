<!doctype html>
<html lang="de">
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
        <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon_fr.png" sizes="48x48">
    <?php elseif(ICL_LANGUAGE_CODE == 'it'): ?>
        <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon_it.png" sizes="48x48">
    <?php else: ?>
        <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png" sizes="48x48">
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

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-MBPD4LZ');</script>
    <!-- End Google Tag Manager -->
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '4081630918557671');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=4081630918557671&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Facebook Pixel Code -->

    <script type="text/javascript">
        var MTUserId='2555c086-8ff6-47ec-8a1e-c45b8f10c050';
        var MTFontIds = new Array();

        MTFontIds.push("5924659"); // Cocogoose Narrows W03 Compressed Regular
        MTFontIds.push("5924750"); // Cocogoose Narrows W03 Compressed Bold
        (function() {
            var mtTracking = document.createElement('script');
            mtTracking.type='text/javascript';
            mtTracking.async='true';
            mtTracking.src='<?php echo get_template_directory_uri(); ?>/assets/js/mtiFontTrackingCode.js';

            (document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(mtTracking);
        })();
    </script>
</head>
<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src=https://www.googletagmanager.com/ns.html?id=GTM-MBPD4LZ
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<script>
    var controller = new ScrollMagic.Controller();

    let max_posts = null;
    let max_posts_mob = null;
</script>

<div class="point-1400px"></div>
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




