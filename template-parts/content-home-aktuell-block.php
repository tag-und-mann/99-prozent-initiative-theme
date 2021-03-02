<?php

$posts = get_field('home_aktuell_beitrage');
$quiz = get_field('home_aktuell_quiz');
$quizID = null;
$max_posts = 3;

$r = 0;

if(is_array($quiz)){
    $quizID = get_field('home_aktuell_quiz')[0];
    $max_posts = 2;
}

?>

<?php if(is_array($quiz) || is_array($posts)): ?>
<section class="home-aktuell-block">

    <div class="container-main">
        <div class="home-aktuell-block-content">

            <div class="title-block">
                <p class="sub-heading1 text-orange"><?php echo __('Aktuell', 'economiesuisse') ?></p>
                <h2 class="heading1 text-blue"><?php echo get_field('home_aktuell__title'); ?></h2>
            </div>

            <script>
                new ScrollMagic.Scene({
                    triggerElement: ".home-aktuell-block .title-block",
                    triggerHook: 0.9,
                    offset: 0
                })
                    .setClassToggle(".home-aktuell-block .title-block", "visibleBlock")
                    .addTo(controller);
            </script>

            <div class="posts">
                <?php if($quizID): $r++; ?>

                    <?php set_query_var( 'counter', $r ); ?>
                    <?php set_query_var( 'counter_class', $r ); ?>
                    <?php set_query_var( 'type', 'quiz' ); ?>
                    <?php set_query_var( 'post_id', $quizID ); ?>
                    <?php set_query_var( 'cols', 2 ); ?>
                    <?php set_query_var( 'img_pos', 'top' ); ?>
                    <?php get_template_part( 'template-parts/content', 'card-img-top' ); ?>

                    <script>
                        new ScrollMagic.Scene({
                            triggerElement: ".home-aktuell-block .card-container[data-counter='<?php echo $r; ?>']",
                            triggerHook: 0.9,
                            offset: 0
                        })
                            .setClassToggle(".home-aktuell-block .card-container[data-counter='<?php echo $r; ?>']", "visibleBlock")
                            .addTo(controller);
                    </script>
                <?php endif; ?>

                <?php if(is_array($posts)): ?>
                    <?php $i = 1; foreach ($posts as $key => $post_id): ?>

                        <?php

                        $img_pos = $i % 2 != 0 ? 'top' : 'bottom';
                        $type = get_field('post_type', $post_id);

                        ?>

                        <?php if($max_posts > $key): $r++; ?>

                            <?php if(!$quizID && $key == 0): ?>

                                <?php set_query_var( 'counter', $r ); ?>
                                <?php set_query_var( 'counter_class', $r ); ?>
                                <?php set_query_var( 'type', $type ); ?>
                                <?php set_query_var( 'post_id', $post_id ); ?>
                                <?php set_query_var( 'cols', 2 ); ?>
                                <?php set_query_var( 'img_pos', 'top' ); ?>
                                <?php get_template_part( 'template-parts/content', 'card-img-top' ); ?>

                                <script>
                                    new ScrollMagic.Scene({
                                        triggerElement: ".home-aktuell-block .card-container[data-counter='<?php echo $r; ?>']",
                                        triggerHook: 0.9,
                                        offset: 0
                                    })
                                        .setClassToggle(".home-aktuell-block .card-container[data-counter='<?php echo $r; ?>']", "visibleBlock")
                                        .addTo(controller);
                                </script>
                            <?php continue; endif; ?>


                            <?php set_query_var( 'counter', $r ); ?>
                            <?php set_query_var( 'counter_class', $r ); ?>
                            <?php set_query_var( 'type', $type ); ?>
                            <?php set_query_var( 'post_id', $post_id ); ?>
                            <?php set_query_var( 'cols', 1 ); ?>
                            <?php set_query_var( 'img_pos', 'top' ); ?>
                            <?php get_template_part( 'template-parts/content', 'card-img-top' ); ?>

                            <script>
                                new ScrollMagic.Scene({
                                    triggerElement: ".home-aktuell-block .card-container[data-counter='<?php echo $r; ?>']",
                                    triggerHook: 0.9,
                                    offset: 0
                                })
                                    .setClassToggle(".home-aktuell-block .card-container[data-counter='<?php echo $r; ?>']", "visibleBlock")
                                    .addTo(controller);
                            </script>

                        <?php endif; ?>

                    <?php $i++; endforeach;?>
                <?php endif; ?>

            </div>


            <div class="link link-main">
                <a href="<?php echo get_field('home_aktuell_link'); ?>" class="button button-background-blue-text-white button-aktuell-block">
                    <div>
                        <span><?php echo __('Mehr laden', 'economiesuisse') ?></span>
                    </div>
                </a>
            </div>

            <script>
                new ScrollMagic.Scene({
                    triggerElement: ".home-aktuell-block .link-main",
                    triggerHook: 0.9,
                    offset: 0
                })
                    .setClassToggle(".home-aktuell-block .link-main", "visibleBlock")
                    .addTo(controller);
            </script>

        </div>
    </div>

    <div class="triangle-top">
        <svg
                preserveAspectRatio="none"
                xmlns:svg="http://www.w3.org/2000/svg"
                xmlns="http://www.w3.org/2000/svg"
                width="508.1897mm"
                height="115.86013mm"
                viewBox="0 0 508.1897 115.86013"
                version="1.1"
                id="svg8">
            <defs
                    id="defs2">
                <linearGradient
                        id="linearGradient2800"
                        osb:paint="solid">
                    <stop
                            style="stop-color:#008000;stop-opacity:1;"
                            offset="0"
                            id="stop2798" />
                </linearGradient>
                <filter
                        style="color-interpolation-filters:sRGB"
                        id="filter2832">
                    <feGaussianBlur
                            stdDeviation="34.8689 2"
                            result="blur"
                            id="feGaussianBlur2830" />
                </filter>
            </defs>
            <metadata
                    id="metadata5">
                <rdf:RDF>
                    <cc:Work
                            rdf:about="">
                        <dc:format>image/svg+xml</dc:format>
                        <dc:type
                                rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
                        <dc:title></dc:title>
                    </cc:Work>
                </rdf:RDF>
            </metadata>
            <g
                    id="layer1"
                    transform="translate(119.63704,-70.263669)"
                    style="fill:#fff;fill-opacity:1;fill-rule:evenodd;stroke:none;stroke-opacity:1">
                <path
                        style="fill:#fff;stroke:none;stroke-width:0.26458300000000001px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1;fill-opacity:1;fill-rule:evenodd"
                        d="M -119.50447,185.99151 H 388.49554 L 263.26438,126.02605 172.22066,136.78984 128.717,110.32886 81.625416,126.92303 30.048918,105.84394 l -58.30387,0.89698 -30.945901,-36.327786 -60.097837,16.145687 z"
                        id="path911" />
            </g>
            <g
                    id="layer1-3-0"
                    transform="translate(160.55653,256.71563)"
                    style="fill:#000000;fill-opacity:1;fill-rule:evenodd;stroke:#000000;stroke-opacity:1">
                <path
                        style="fill:#000000;fill-opacity:1;fill-rule:evenodd;stroke:#000000;stroke-width:0.264583px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
                        d="m -119.27852,97.193851 57.116961,-15.533941 30.90697,35.98226 61.320975,-1.89232 50.927356,22.51009 47.312188,-16.8049 44.14891,27.48096 90.04891,-13.105 106.76909,50.16051 h 19.2227 L 263.26438,126.02605 172.22066,136.78984 128.717,110.32886 81.625416,126.92303 30.048918,105.84394 l -58.30387,0.89698 -30.945901,-36.327786 -60.097837,16.145687 z"
                        id="path911-9-5" />
            </g>
            <g
                    id="layer1-3-5"
                    transform="translate(826.46931,-42.453094)"
                    style="fill:#ffffff;fill-opacity:1;fill-rule:evenodd;stroke:#000000;stroke-opacity:1">
                <path
                        style="fill:#ffffff;fill-opacity:1;fill-rule:evenodd;stroke:#000000;stroke-width:0.264583px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
                        d="m -118.63944,91.442148 57.116959,-15.533941 30.90697,35.982263 61.320975,-1.89232 50.927356,22.51009 47.31219,-16.8049 44.14891,27.48096 90.04891,-13.105 115.07711,55.59267 10.2756,0.31954 -125.23116,-59.96546 -91.04372,10.76379 -43.50366,-26.46098 -47.091584,16.59417 -51.576498,-21.07909 -58.30387,0.89698 -30.945901,-36.327786 -60.097837,16.145687 z"
                        id="path911-9-7" />
            </g>
            <g
                    id="Group-10"
                    transform="matrix(0.35245612,0,0,0.35166278,-4.7513486,0.149465)"
                    style="fill:none;fill-rule:evenodd;stroke:none;stroke-width:1">
                <polyline
                        id="Path-2"
                        stroke="#ff2d18"
                        stroke-width="4"
                        points="0 48.7130173 188.230556 -8.52651283e-14 271 100.14968 440 100.14968 583 158.142739 720 111.962491 840 185.63724 1099.86109 158.142739 1365 285.324689" />
                <polygon
                        id="Triangle"
                        fill="#ff2d18"
                        points="1366,263.66712 1384,296.66712 1348,296.66712 1361.8955,283.04817 " />
            </g>
        </svg>
    </div>
</section>
<?php endif; ?>