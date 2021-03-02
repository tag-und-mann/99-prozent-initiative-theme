<?php
$quiz = get_field('aktuell_quiz');
$quizID = null;

if(is_array($quiz)){
    $quizID = get_field('aktuell_quiz')[0];
}

$posts = my_get_posts(12, [], [], '', ICL_LANGUAGE_CODE);

$posts_max = max_posts_count([], [], '', ICL_LANGUAGE_CODE);

$testimonials_random = get_all_testimonials_random(10, ICL_LANGUAGE_CODE);

$last_two_used_testimonials = [];

?>


<div class="aktuell-posts">


<?php
// ALMOST THE SAME CODE IS IN FUNCTION.PHP FILE
$columns = 0;
$row = 1;
$red_cards = 0;
$red_cards_in_row_2 = false;
$red_cards_in_row_3 = false;
$red_cards_in_row_pos_2 = false;
$red_cards_in_row_pos_3 = false;
$red_cards_in_row_pos_4 = false;
$posts_count = 0;
$r = 0;
$p = 0;

if($quizID):
    $columns = 2;
    $r++;
    $p++;
?>
    <?php set_query_var( 'counter', $r ); ?>
    <?php set_query_var( 'counter_class', $p ); ?>
    <?php set_query_var( 'type', 'quiz' ); ?>
    <?php set_query_var( 'post_id', $quizID ); ?>
    <?php set_query_var( 'cols', 2 ); ?>
    <?php set_query_var( 'img_pos', 'top' ); ?>
    <?php get_template_part( 'template-parts/content', 'card-img-top' ); ?>

    <script>
        new ScrollMagic.Scene({
            triggerElement: ".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']",
            triggerHook: 0.9,
            offset: 0
        })
            .setClassToggle(".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']", "visibleBlock")
            .addTo(controller);
    </script>

<?php endif; ?>


<?php $i = 1; foreach($posts as $key => $post_id): ?>

    <?php
    if(!$quizID){
        $img_pos = $i % 2 == 0 ? 'top' : 'bottom';
    }else{
        $img_pos = $i % 2 != 0 ? 'top' : 'bottom';
    }
//    $img_pos = $i % 2 != 0 ? 'top' : 'bottom';
    $type = get_field('post_type', $post_id);
    ?>

    <?php
    // if the red card is important
    if(($columns == 1 || $columns == 3) && (int)get_field('karte_saulen', $posts[$key]) == 2){

        if($row < 4 && $columns < 5) {
            list ($testimonial_id, $last_two_used_testimonials) = get_rand_testimonial($testimonials_random, $last_two_used_testimonials);
            if($testimonial_id){
                $red_cards++;
                $columns++;
                $r++;
                $p++;

                set_query_var( 'testimonial_id', $testimonial_id);
                set_query_var( 'counter', $r );
                set_query_var( 'counter_class', $p );
                get_template_part('template-parts/content', 'card-testimonial'); ?>

                <script>
                    new ScrollMagic.Scene({
                        triggerElement: ".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']",
                        triggerHook: 0.9,
                        offset: 0
                    })
                        .setClassToggle(".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']", "visibleBlock")
                        .addTo(controller);
                </script>
        <?php } ?>

        <?php

        if($row == 2){
                $red_cards_in_row_pos_2 = true;
            }
        }
    }

    // the red card is just a wish, if there are less than 2 red cards
    // row 1
    if($row == 1 && $red_cards < 2 && $columns == 3  && (int)get_field('karte_saulen', $posts[$key]) != 2){
        list ($testimonial_id, $last_two_used_testimonials) = get_rand_testimonial($testimonials_random, $last_two_used_testimonials);
        if($testimonial_id){
            $columns++;
            $r++;
            $p++;

            $red_cards++;

            set_query_var( 'testimonial_id', $testimonial_id);
            set_query_var( 'counter', $r );
            set_query_var( 'counter_class', $p );
            get_template_part('template-parts/content', 'card-testimonial'); ?>

            <script>
                new ScrollMagic.Scene({
                    triggerElement: ".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']",
                    triggerHook: 0.9,
                    offset: 0
                })
                    .setClassToggle(".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']", "visibleBlock")
                    .addTo(controller);
            </script>
    <?php } ?>
    <?php
    }

    // row 2
    if($row == 2 && $red_cards < 2 && $columns == 1  && (int)get_field('karte_saulen', $posts[$key]) != 2){

        list ($testimonial_id, $last_two_used_testimonials) = get_rand_testimonial($testimonials_random, $last_two_used_testimonials);
        if($testimonial_id){
            $columns++;
            $r++;
            $p++;
            $red_cards_in_row_2 = true;
            $red_cards_in_row_pos_2 = true;

            $red_cards++;

            set_query_var( 'testimonial_id', $testimonial_id);
            set_query_var( 'counter', $r );
            set_query_var( 'counter_class', $p );
            get_template_part('template-parts/content', 'card-testimonial'); ?>

            <script>
                new ScrollMagic.Scene({
                    triggerElement: ".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']",
                    triggerHook: 0.9,
                    offset: 0
                })
                    .setClassToggle(".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']", "visibleBlock")
                    .addTo(controller);
            </script>
    <?php } ?>
    <?php
    }

    if($row == 2 && $red_cards < 2 && $columns == 2 && (int)get_field('karte_saulen', $posts[$key]) != 2 && !$red_cards_in_row_2){
        list ($testimonial_id, $last_two_used_testimonials) = get_rand_testimonial($testimonials_random, $last_two_used_testimonials);
        if($testimonial_id){
        $columns++;
        $r++;
        $p++;
        $red_cards_in_row_2 = true;
        $red_cards_in_row_pos_3 = true;

        $red_cards++;

        set_query_var( 'testimonial_id', $testimonial_id);
        set_query_var( 'counter', $r );
        set_query_var( 'counter_class', $p );
        get_template_part('template-parts/content', 'card-testimonial'); ?>

        <script>
            new ScrollMagic.Scene({
                triggerElement: ".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']",
                triggerHook: 0.9,
                offset: 0
            })
                .setClassToggle(".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']", "visibleBlock")
                .addTo(controller);
        </script>
    <?php } ?>

    <?php
    }

    if($row == 2 && $red_cards < 2 && $columns == 3  && (int)get_field('karte_saulen', $posts[$key]) != 2 && !$red_cards_in_row_2){
        list ($testimonial_id, $last_two_used_testimonials) = get_rand_testimonial($testimonials_random, $last_two_used_testimonials);
        if($testimonial_id){
            $columns++;
            $r++;
            $p++;
            $red_cards_in_row_2 = true;
            $red_cards_in_row_pos_4 = true;

            $red_cards++;

            set_query_var( 'testimonial_id', $testimonial_id);
            set_query_var( 'counter', $r );
            set_query_var( 'counter_class', $p );
            get_template_part('template-parts/content', 'card-testimonial'); ?>

            <script>
                new ScrollMagic.Scene({
                    triggerElement: ".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']",
                    triggerHook: 0.9,
                    offset: 0
                })
                    .setClassToggle(".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']", "visibleBlock")
                    .addTo(controller);
            </script>
    <?php } ?>
    <?php
    }

    // row 3
    if($row == 3 && $red_cards < 2 && $columns == 1  && (int)get_field('karte_saulen', $posts[$key]) != 2 && !$red_cards_in_row_pos_2){
        list ($testimonial_id, $last_two_used_testimonials) = get_rand_testimonial($testimonials_random, $last_two_used_testimonials);
        if($testimonial_id){
            $columns++;
            $r++;
            $p++;
            $red_cards_in_row_3 = true;

            $red_cards++;

            set_query_var( 'testimonial_id', $testimonial_id);
            set_query_var( 'counter', $r );
            set_query_var( 'counter_class', $p );
            get_template_part('template-parts/content', 'card-testimonial'); ?>

            <script>
                new ScrollMagic.Scene({
                    triggerElement: ".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']",
                    triggerHook: 0.9,
                    offset: 0
                })
                    .setClassToggle(".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']", "visibleBlock")
                    .addTo(controller);
            </script>
    <?php } ?>

    <?php
    }

    if($row == 3 && $red_cards < 2 && $columns == 2 && (int)get_field('karte_saulen', $posts[$key]) != 2 && !$red_cards_in_row_3 && !$red_cards_in_row_pos_3){
        list ($testimonial_id, $last_two_used_testimonials) = get_rand_testimonial($testimonials_random, $last_two_used_testimonials);
        if($testimonial_id){
            $columns++;
            $r++;
            $p++;
            $red_cards_in_row_3 = true;

            $red_cards++;


            set_query_var( 'testimonial_id', $testimonial_id);
            set_query_var( 'counter', $r );
            set_query_var( 'counter_class', $p );
            get_template_part('template-parts/content', 'card-testimonial'); ?>

            <script>
                new ScrollMagic.Scene({
                    triggerElement: ".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']",
                    triggerHook: 0.9,
                    offset: 0
                })
                    .setClassToggle(".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']", "visibleBlock")
                    .addTo(controller);
            </script>
    <?php } ?>
    <?php

}

    if($row == 3 && $red_cards < 2 && $columns == 3  && (int)get_field('karte_saulen', $posts[$key]) != 2 && !$red_cards_in_row_3 && !$red_cards_in_row_pos_4){
        list ($testimonial_id, $last_two_used_testimonials) = get_rand_testimonial($testimonials_random, $last_two_used_testimonials);
        if($testimonial_id){
            $columns++;
            $r++;
            $p++;
            $red_cards_in_row_3 = true;

            $red_cards++;

            set_query_var( 'testimonial_id', $testimonial_id);
            set_query_var( 'counter', $r );
            set_query_var( 'counter_class', $p );
            get_template_part('template-parts/content', 'card-testimonial'); ?>

            <script>
                new ScrollMagic.Scene({
                    triggerElement: ".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']",
                    triggerHook: 0.9,
                    offset: 0
                })
                    .setClassToggle(".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']", "visibleBlock")
                    .addTo(controller);
            </script>
    <?php } ?>

    <?php
    }

    ?>

    <!-- posts cards -->

    <?php

    if(!$quizID && $i == 1){
        $columns = 2;
   }else{
        $columns += get_field('karte_saulen', $post_id) == '1' ? 1 : 2;
   }


    if($columns > 4){
        $row++;
        $columns = 0;
        $p = 0;

        $columns += get_field('karte_saulen', $post_id) == '1' ? 1 : 2;
     }

    ?>


   <?php if($row < 4):  ?>


        <!-- the post card if the quiz is not selected -->
       <?php if(!$quizID && $i == 1): $posts_count++; $r++; $p++; ?>

            <?php set_query_var( 'counter', $r ); ?>
            <?php set_query_var( 'counter_class', $p ); ?>
            <?php set_query_var( 'type', $type ); ?>
            <?php set_query_var( 'post_id', $post_id); ?>
            <?php set_query_var( 'cols', 2 ); ?>
            <?php set_query_var( 'img_pos', 'top' ); ?>
            <?php get_template_part( 'template-parts/content', 'card-img-top' ); ?>

            <script>
                new ScrollMagic.Scene({
                    triggerElement: ".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']",
                    triggerHook: 0.9,
                    offset: 0
                })
                    .setClassToggle(".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']", "visibleBlock")
                    .addTo(controller);
            </script>

       <?php else: $posts_count++; $r++; $p++; ?>

            <?php set_query_var( 'counter', $r ); ?>
            <?php set_query_var( 'counter_class', $p ); ?>
            <?php set_query_var( 'type', $type ); ?>
            <?php set_query_var( 'post_id', $post_id ); ?>
            <?php set_query_var( 'cols', get_field('karte_saulen', $post_id) == '1' ? 1 : 2 ); ?>
            <?php set_query_var( 'img_pos', $img_pos ); ?>
            <?php get_template_part( 'template-parts/content', 'card-img-' . $img_pos ); ?>

            <script>
                new ScrollMagic.Scene({
                    triggerElement: ".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']",
                    triggerHook: 0.9,
                    offset: 0
                })
                    .setClassToggle(".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']", "visibleBlock")
                    .addTo(controller);
            </script>

        <?php endif; ?>
    <?php endif; ?>

<?php $i++; endforeach; wp_reset_postdata(); ?>
</div>

<script>
    max_posts = <?php echo $posts_max; ?>;
</script>


<div class="link-container get-more-posts">

    <div class="posts-loader">
        <div class="lds-dual-ring"></div>
    </div>

    <div class="link">
        <a href="#" class="button button-background-red button-aktuell-page <?php echo $posts_max > $posts_count ? 'show-more-btn' : 'hide-more-btn'; ?>">
            <div>
                <span><?php echo __('Mehr laden', 'economiesuisse') ?></span>
            </div>
        </a>
    </div>
</div>
