<?php

$count = 2;
$tags = get_the_tags( get_the_ID() );

if(get_post_type() == 'quiz'){
    $tags = get_the_terms(get_the_ID(), 'quiz_tag');
}else{
    $tags = get_the_terms(get_the_ID(), 'post_tag');
}

$tags_slugs = '';

if($tags) {
    foreach ($tags as $tag) {
        $tags_slugs = $tags_slugs . $tag->slug . ',';
    }
}

$related_posts = get_posts( [
    'fields'    => 'ids',
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 2,
    'exclude' => [get_the_ID()],
    'suppress_filters' => false,
    'tax_query' => [
        [
            'taxonomy' => 'post_tag',
            'field' => 'slug',
            'terms' => explode(',', trim($tags_slugs, ',')),
        ]
    ]
]);


$latest_posts = [];

if(count($related_posts) < 2){

    $temp = '';

    foreach ($related_posts as $related_post) {
        $temp = $temp . $related_post . ',';
    }

    $temp = $temp . get_the_ID();

    $latest_posts = get_posts( [
        'fields'    => 'ids',
        'post_type' => 'post',
        'post_status' => 'publish',
        'suppress_filters' => false,
        'posts_per_page' => 2 - count($related_posts),
        'exclude' => array_merge( explode(',', $temp)),
    ]);
}



$ids = array_merge($related_posts, $latest_posts);

$final_posts = new WP_Query( [
    'post__in'  => $ids,
    'orderby' => 'post__in',
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 2,
    'suppress_filters' => false,
] );

?>

<div class="single-sidebar-inner-container">
    <div class="single-sidebar-content">
        <?php if($final_posts->have_posts()): ?>
            <h3><?php echo __('Dies könnte Sie auch interessieren', 'economiesuisse') ?>:</h3>

            <?php while ($final_posts->have_posts()): $final_posts->the_post(); ?>
                <div class="sidebar-post">
                    <?php
                    $img_col_1 = get_field('bild_1_columns', get_the_ID());
                    $img_url = null;

                    if($img_col_1){
                        $img_url = $img_col_1['sizes']['sidebar-post'];
                    }

                    if($img_url == null){
                        $img_full = get_field('header_bild', get_the_ID());

                        if($img_full){
                            $img_url = $img_full['sizes']['sidebar-post'];
                        }
                    }
                    ?>

                    <?php if($img_url): ?>
                        <img src="<?php echo $img_url; ?>">
                    <?php endif; ?>

                    <div class="sidebar-post-content">

                        <p class="date"><?php echo get_the_date('d.m.Y'); ?></p>

                        <h4 class="title"><?php echo get_the_title(get_the_ID()); ?></h4>

                    </div>

                    <div class="link">
                        <a href="<?php the_permalink(); ?>" class="card-button button-border-white button-sidebar-post">
                            <div>
                                <span>
                                    <?php if(get_field('post_type', get_the_ID()) == 'video'): ?>
                                        <?php echo __('Video anschauen', 'economiesuisse') ?>
                                    <?php else: ?>
                                        <?php echo __('Weiterlesen', 'economiesuisse') ?>
                                    <?php endif; ?>
                                </span>
                            </div>
                        </a>
                    </div>

                </div>
            <?php endwhile; ?>
        <?php endif; wp_reset_postdata(); ?>

    </div>
</div>
