<?php
$quiz = get_field('aktuell_quiz');
$quizID = null;

if(is_array($quiz)){
    $quizID = get_field('aktuell_quiz')[0];
}

$posts = my_get_posts(3, [], [], '', ICL_LANGUAGE_CODE);

$posts_max = max_posts_count([], [], '', ICL_LANGUAGE_CODE);

?>


<div class="aktuell-posts-mob" id="aktuell-posts-mob">


<?php
// ALMOST THE SAME CODE IS IN FUNCTION.PHP FILE
$posts_count = 0;

if($quizID):
    $i = 2;
    $posts_count++;

    set_query_var( 'counter', $posts_count );
    set_query_var( 'counter_class', 0 );
    set_query_var( 'type', 'quiz' );
    set_query_var( 'post_id', $quizID );
    set_query_var( 'cols', 1 );
    set_query_var( 'img_pos', 'top' );
    get_template_part( 'template-parts/content', 'card-img-top' );

    ?>

    <script>
        new ScrollMagic.Scene({
            triggerElement: ".aktuell-posts-mob .card-container[data-counter='<?php echo $posts_count; ?>']",
            triggerHook: 0.9,
            offset: 0
        })
            .setClassToggle(".aktuell-posts-mob .card-container[data-counter='<?php echo $posts_count; ?>']", "visibleBlock")
            .addTo(controller);
    </script>

<?php
else:
    $i = 1;
endif;

foreach($posts as $key => $post_id):

    $type = get_field('post_type', $post_id);

    // posts cards
    if($i < 4):
        $posts_count++;

        set_query_var( 'counter', $posts_count );
        set_query_var( 'counter_class', 0 );
        set_query_var( 'type', $type );
        set_query_var( 'post_id', $post_id);
        set_query_var( 'cols', 1 );
        set_query_var( 'img_pos', 'top' );
        get_template_part( 'template-parts/content', 'card-img-top' );

        ?>

        <script>
            new ScrollMagic.Scene({
                triggerElement: ".aktuell-posts-mob .card-container[data-counter='<?php echo $posts_count; ?>']",
                triggerHook: 0.9,
                offset: 0
            })
                .setClassToggle(".aktuell-posts-mob .card-container[data-counter='<?php echo $posts_count; ?>']", "visibleBlock")
                .addTo(controller);
        </script>

    <?php
    endif;

$i++; endforeach; wp_reset_postdata();

?>

</div>

<script>
    max_posts_mob = <?php echo $posts_max; ?>;
</script>

<div class="link-container-mob get-more-posts-mob">

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

<script>
    new ScrollMagic.Scene({
        triggerElement: ".get-more-posts-mob",
        triggerHook: 0.9,
        offset: 0
    })
        .setClassToggle(".get-more-posts-mob", "visibleBlock")
        .addTo(controller);
</script>