<?php

$video_or_bild = get_field('home_darum_gehts_video_oder_bild');

?>

<section class="home-darum-gehts-block">

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
                        stroke="#cc1719"
                        stroke-width="4"
                        points="0 48.7130173 188.230556 -8.52651283e-14 271 100.14968 440 100.14968 583 158.142739 720 111.962491 840 185.63724 1099.86109 158.142739 1365 285.324689" />
                <polygon
                        id="Triangle"
                        fill="#cc1719"
                        points="1366,263.66712 1384,296.66712 1348,296.66712 1361.8955,283.04817 " />
            </g>
        </svg>
    </div>

    <div class="container-main">
        <div class="home-darum-gehts-block-content">

            <div class="content-block">

                <p class="sub-heading1 text-orange"><?php echo __("Darum geht's", 'economiesuisse') ?></p>
                <?php if(get_field('home_darum_gehts_title')): ?>
                    <h2 class="heading1 text-blue"><?php echo get_field('home_darum_gehts_title'); ?></h2>
                <?php endif;  ?>

                <div class="text">
                    <?php echo apply_filters('the_content', get_field('home_darum_gehts_text')); ?>
                </div>

                <?php if(get_field('home_darum_gehts_link')):  ?>
                    <div class="link" style="display: none">
                        <a href="<?php echo get_field('home_darum_gehts_link'); ?>" class="button button-background-blue-text-white button-darum-gehts-block">
                            <div>
                                <span><?php echo __('Mehr erfahren', 'economiesuisse') ?></span>
                            </div>
                        </a>
                    </div>
                <?php endif;  ?>
            </div>

            <div class="media-block">
                <?php if($video_or_bild == 'image'):  ?>

                    <?php if(get_field('home_darum_gehts_bild')):  ?>
                        <img src="<?php echo get_field('home_darum_gehts_bild')['sizes']['darum-gehts']; ?>">
                    <?php endif;  ?>

                <?php endif;  ?>

                <?php if($video_or_bild == 'video'):  ?>
                    <div class="media-video">

                        <?php if(get_field('home_darum_gehts_video_type') == 'youtube'):  ?>
                            <div id="player"></div>
                            <video class="video" playsinline poster="" id="darum-gehts-video" style="width: 0; height: 0">
                            </video>
                        <?php else:  ?>
                            <video class="video" playsinline poster="" id="darum-gehts-video">
                                <source src="<?php echo get_field('home_darum_gehts_video'); ?>" type="video/mp4">
                            </video>
                        <?php endif;  ?>


                        <?php $video_poster_url = get_field('home_darum_gehts_video_poster') ? get_field('home_darum_gehts_video_poster')['sizes']['darum-gehts'] : ''; ?>

                        <div class="card-img-video-play-block" id="home_darum_gehts_video_btn" style="background-image: url('<?php echo $video_poster_url; ?>')">
                            <svg class="play-video" viewBox="0 0 56 56" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>Group 8</title>
                                <g id="Desktop" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Landingpage" transform="translate(-946.000000, -2341.000000)">
                                        <g id="Group-8" transform="translate(946.000000, 2341.000000)">
                                            <rect id="Rectangle" fill="#cc1719" x="0" y="0" width="56" height="56"></rect>
                                            <polygon id="Triangle" fill="#FFFFFF" transform="translate(30.500000, 28.000000) rotate(90.000000) translate(-30.500000, -28.000000) " points="30.5 16 43 40 18 40"></polygon>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>

                    <script>
                        jQuery( function( $ ) {
                            var headerVideoPlayBtn = document.getElementById("home_darum_gehts_video_btn");
                            var headerVideo = document.getElementById("darum-gehts-video");

                            if(headerVideoPlayBtn && headerVideo) {
                                headerVideoPlayBtn.addEventListener("click", playPause);
                                headerVideo.addEventListener("click", playPause);
                            }

                            function playPause() {
                                if (headerVideo.paused) {
                                    headerVideo.play();
                                    <?php if(get_field('home_darum_gehts_video_type') == 'youtube'):  ?>
                                    playVideo();
                                    <?php endif;  ?>
                                    $(headerVideoPlayBtn).css('display', 'none');
                                    $(headerVideo).addClass('video-stop');
                                }
                                else  {
                                    headerVideo.pause();
                                    $(headerVideoPlayBtn).css('display', 'block');
                                    $(headerVideo).removeClass('video-stop');
                                }
                            }
                        });
                    </script>


                    <script>
                        // 2. This code loads the IFrame Player API code asynchronously.
                        var tag = document.createElement('script');

                        tag.src = "https://www.youtube.com/iframe_api";
                        var firstScriptTag = document.getElementsByTagName('script')[0];
                        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                        // 3. This function creates an <iframe> (and YouTube player)
                        //    after the API code downloads.
                        var player;
                        function onYouTubeIframeAPIReady() {
                            player = new YT.Player('player', {
                                height: '390',
                                width: '640',
                                videoId: "<?php echo get_field('home_darum_gehts_video'); ?>",
                                events: {
                                    'onReady': onPlayerReady,
                                    'onStateChange': onPlayerStateChange
                                }
                            });
                        }

                        // 4. The API will call this function when the video player is ready.
                        function onPlayerReady(event) {
                            event.target.stopVideo();
                        }

                        // 5. The API calls this function when the player's state changes.
                        //    The function indicates that when playing a video (state=1),
                        //    the player should play for six seconds and then stop.
                        var done = false;
                        function onPlayerStateChange(event) {
                            if (event.data == YT.PlayerState.PLAYING && !done) {
                                // setTimeout(stopVideo, 6000);
                                done = true;
                            }

                            if (event.data === YT.PlayerState.ENDED) {
                                player.playVideo();
                            }
                        }
                        function stopVideo() {
                            player.stopVideo();
                        }

                        function playVideo() {
                            player.playVideo();
                        }
                    </script>
                <?php endif;  ?>

                <?php if(get_field('home_darum_gehts_media_beschreibung')): ?>
                    <p class="media-desc"><?php echo get_field('home_darum_gehts_media_beschreibung'); ?></p>
                <?php endif;  ?>
            </div>

        </div>
    </div>
</section>

<script>
    new ScrollMagic.Scene({
        triggerElement: ".home-darum-gehts-block .content-block",
        triggerHook: 0.9,
        offset: 0
    })
        .setClassToggle(".home-darum-gehts-block .content-block", "visibleBlock")
        .addTo(controller);

    new ScrollMagic.Scene({
        triggerElement: ".home-darum-gehts-block .media-block",
        triggerHook: 0.9,
        offset: 0
    })
        .setClassToggle(".home-darum-gehts-block .media-block", "visibleBlock")
        .addTo(controller);

</script>
