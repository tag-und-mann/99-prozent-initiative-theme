<?php
global $sitepress;
$sitepress->switch_lang(ICL_LANGUAGE_CODE);

$persons = new WP_Query([
    'post_type' => 'person',
    'posts_per_page' => -1,
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


<div class="komitee-persons">

    <div class="head-row">
        <div class="container-main">
            <div class="person-row-content">
                <div class="vorname"><?php echo __('Vorname', 'economiesuisse'); ?></div>
                <div class="nachname"><?php echo __('Nachname', 'economiesuisse'); ?></div>
                <div class="funktion"><?php echo __('Funktion', 'economiesuisse'); ?></div>
                <div class="partei"><?php echo __('Unternehmen / Partei', 'economiesuisse'); ?></div>
                <div class="ort"><?php echo __('Ort', 'economiesuisse'); ?></div>
            </div>
        </div>
    </div>

    <?php if($persons->post_count): ?>

        <div class="persons">
            <?php set_query_var( 'persons', $persons ); ?>
            <?php get_template_part( 'template-parts/content', 'komitee-mitglieders-loop' ); ?>
        </div>

    <?php endif; ?>
    <?php wp_reset_postdata(); ?>


</div>