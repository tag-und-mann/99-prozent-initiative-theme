<?php

$card_picture = get_field('bild_' . $cols . '_columns', $post_id) ? get_field('bild_' . $cols . '_columns', $post_id)['sizes']['card-' . $cols . '-col'] : null;
$card_picture_mob = get_field('bild_1_columns', $post_id) ? get_field('bild_1_columns', $post_id)['sizes']['card-1-col'] : null;

if(!$card_picture){
    $header_picture = get_field('header_bild', $post_id);

    if($header_picture){
        $card_picture = $header_picture['sizes']['card-' . $cols . '-col'];
    }
}

if(!$card_picture_mob){
    $header_picture = get_field('header_bild', $post_id);

    if($header_picture){
        $card_picture_mob = $header_picture['sizes']['card-1-col'];
    }
}


if($type == 'quiz' || $type == 'video' || $type == 'mix'){
    $divider_color = 'white';
}else{
    $divider_color = 'red';
}

if($type == 'quiz' || $type == 'mix'){
    $button_class = 'button-card-border-white';
}elseif($type == 'video'){
    $button_class = 'button-card-background-white-border-white';
}else{
    $button_class = 'button-card-background-white';
}

if($type == 'quiz' || $type == 'mix'){
    $card_bg_color = 'red';
}elseif($type == 'video'){
    $card_bg_color = 'black';
}else{
    $card_bg_color = 'white';
}

if($type == 'mix'){
    $type = 'post';
}

?>

<div class="card-container card-<?php echo $cols; ?>-col card-simple delay-<?php echo $counter_class; ?>" data-id="<?php echo $post_id; ?>" data-img="<?php echo $img_pos; ?>" data-counter="<?php echo $counter; ?>">
    <a href="<?php echo get_the_permalink($post_id); ?>" class="card card-bg<?php echo '-' . $card_bg_color; ?>">

        <div class="card-content-wrapper">

            <div>

                <div class="card-picture card-picture-mob">

                    <div class="tags-container-on-picture"></div>

                    <?php if($card_picture): ?>
                        <div class="card-image card-image-desk" style="background-image: url('<?php echo $card_picture; ?>')"></div>
                    <?php endif; ?>

                    <?php if($card_picture_mob): ?>
                        <div class="card-image card-image-mob" style="background-image: url('<?php echo $card_picture_mob; ?>')"></div>
                    <?php endif; ?>
                </div>

                <div class="card-content card-content-<?php echo $cols; ?> card-content-<?php echo $img_pos; ?>">

                    <p class="date date-<?php echo $cols; ?>"><?php echo date('d.m.Y', strtotime(get_post($post_id)->post_date)); ?></p>

                    <h3 class="title-<?php echo $cols; ?>"><?php echo get_the_title($post_id); ?></h3>

                </div>

            </div>


            <div>
                <div class="link link-<?php echo $cols; ?> link-<?php echo $img_pos; ?>">
                    <div class="tags">
                        <?php set_query_var( 'type', $type ); ?>
                        <?php set_query_var( 'post_id', $post_id ); ?>
                        <?php get_template_part( 'template-parts/content', 'tags' ); ?>
                    </div>
                </div>

                <div class="card-picture card-picture-desk">
                    <?php if($card_picture): ?>
                        <div class="card-image" style="background-image: url('<?php echo $card_picture; ?>')"></div>
                    <?php endif; ?>
                </div>

            </div>

        </div>

    </a>
</div>