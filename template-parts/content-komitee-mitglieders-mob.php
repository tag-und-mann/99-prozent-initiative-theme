<?php
global $sitepress;
$sitepress->switch_lang(ICL_LANGUAGE_CODE);

$persons = new WP_Query([
    'post_type' => 'person',
    'posts_per_page' => 5,
    'meta_key'=>'person_nachname',
    'orderby'=>'meta_value',
    'post_status' => 'publish',
    'suppress_filters' => false,
    'order'    => 'ASC',
    'meta_query' => [
        [
            'relation' => 'AND',
            [
                'key' => 'person_approved',
                'compare' => '=',
                'value' => '1',
            ],
        ],
    ]
]);

?>


<div class="komitee-persons-mob">


    <?php if($persons->post_count): ?>

        <div class="persons-mob">
            <?php set_query_var( 'persons', $persons ); ?>
            <?php get_template_part( 'template-parts/content', 'komitee-mitglieders-loop-mob' ); ?>
        </div>


        <div class="get-more-persons-mob">

            <div class="posts-loader">
                <div class="lds-dual-ring"></div>
            </div>

            <div class="link">
                <a href="#" class="button button-background-red button-aktuell-page <?php echo $persons->post_count > 4 ? 'show-more-btn' : 'hide-more-btn'; ?>">
                    <div>
                        <span><?php echo __('Mehr laden', 'economiesuisse') ?></span>
                    </div>
                </a>
            </div>
        </div>

        <script>
            new ScrollMagic.Scene({
                triggerElement: ".get-more-persons-mob",
                triggerHook: 0.9,
                offset: 0
            })
                .setClassToggle(".get-more-persons-mob", "visibleBlock")
                .addTo(controller);
        </script>

    <?php endif; ?>
    <?php wp_reset_postdata(); ?>


</div>