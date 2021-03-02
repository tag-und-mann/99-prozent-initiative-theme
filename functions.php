<?php

/** ACF */
require_once( 'library/acf.php' );
require_once( 'library/acf-blocks.php' );

/** Enqueue scripts */
require_once( 'library/enqueue-scripts.php' );

/** Navigations */
require_once( 'library/navigation.php' );

/** Add theme support */
require_once( 'library/theme-support.php' );

/** Widgets */
require_once( 'library/widgets.php' );

/** filters and actions */
require_once( 'library/filters.php' );

/** custom post types */
require_once( 'library/cpt.php' );

/** help functions */
require_once( 'library/helpers.php' );

/** responsive images */
require_once( 'library/images_sizes.php' );

/** formidable */
require_once( 'library/formidable.php' );

/** remove editor dashboard menu
 */ define( 'DISALLOW_FILE_EDIT', true);

function remove_menus(){
    remove_menu_page( 'index.php' );                  //Dashboard
    remove_menu_page( 'formidable' );
    remove_menu_page( 'themes.php' );
    remove_menu_page( 'plugins.php' );
    remove_menu_page( 'users.php' );
    remove_menu_page( 'tools.php' );
    remove_menu_page( 'options-general.php' );
    remove_menu_page( 'edit.php?post_type=master-popups' );
}

if ( current_user_can( 'editor' ) ){
    add_action( 'admin_menu', 'remove_menus' );
}


// ajax
// posts desktop
add_action('wp_ajax_getMorePosts', 'economiesuisse_ajax_getMorePosts');
add_action('wp_ajax_nopriv_getMorePosts', 'economiesuisse_ajax_getMorePosts');
function economiesuisse_ajax_getMorePosts(){

    $exclude_ids =  explode(",", trim($_POST['ids'], ','));
    $max_posts =  sanitize_text_field($_POST['max_posts']);
    $last_img_post =  sanitize_text_field($_POST['last_img_post']);
    $last_counter =  sanitize_text_field($_POST['last_counter']);
    $lang =  sanitize_text_field($_POST['lang']);

    $posts = my_get_posts(4, [], $exclude_ids, '', $lang);

    $testimonials_random = get_all_testimonials_random(2, $lang);

    $columns = 0;
    $posts_count = 0;
    $r = $last_counter;
    $p = 0;

    ob_start();
    $i = 1;
    foreach($posts as $key => $post_id){
        if($last_img_post == 'top'){
            $img_pos = $i % 2 == 0 ? 'top' : 'bottom';
        }else{
            $img_pos = $i % 2 != 0 ? 'top' : 'bottom';
        }

        $type = get_field('post_type', $post_id);

        // if the red card is important
        if(($columns == 1 || $columns == 3) && (int)get_field('karte_saulen', $post_id) == 2){
            $columns++;

            $r++;
            $p++;

            $counter = $r;
            $counter_class = $p;

            if(count($testimonials_random) > 0){
//                $rand_key = array_rand($testimonials_random, 1);
//                $testimonial_id = $testimonials_random[$rand_key];
                $testimonial_id = $testimonials_random[0];
            }else{
                $testimonial_id = null;
            }

            include 'template-parts/content-card-testimonial.php'; ?>

        <script>
            new ScrollMagic.Scene({
                triggerElement: ".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']",
                triggerHook: 0.9,
                offset: 0
            })
                .setClassToggle(".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']", "visibleBlock")
                .addTo(controller);
        </script>

        <?php
        }

        if($columns < 4){
            $columns = $columns + (int)get_field('karte_saulen', $post_id);
            $posts_count++;

            $r++;
            $p++;

            $counter = $r;
            $counter_class = $p;

            $cols = get_field('karte_saulen', $post_id) == '1' ? 1 : 2;

            if($img_pos == 'top'){
                include 'template-parts/content-card-img-top.php';
            }else{
                include 'template-parts/content-card-img-bottom.php';
            }

            ?>

            <script>
                new ScrollMagic.Scene({
                    triggerElement: ".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']",
                    triggerHook: 0.9,
                    offset: 0
                })
                    .setClassToggle(".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']", "visibleBlock")
                    .addTo(controller);
            </script>

            <?php
        }

        $i++;
    }

    wp_reset_postdata();

    $output = ob_get_clean();

    $res = [
        'output' =>  $output,
        'count'  => $max_posts > $posts_count + count($exclude_ids) ? 1 : 0,
    ];

    echo json_encode($res);

    wp_die();

}


add_action('wp_ajax_getFilteredPosts', 'economiesuisse_ajax_getFilteredPosts');
add_action('wp_ajax_nopriv_getFilteredPosts', 'economiesuisse_ajax_getFilteredPosts');
function economiesuisse_ajax_getFilteredPosts(){

    if($_POST['tags_ids'] == ''){
        $tags_ids = [];
    }else{
        $tags_ids =  explode(",", trim($_POST['tags_ids'], ','));
    }

    $r = 0;
    $p = 0;

    $search =  sanitize_text_field($_POST['search']);

    $lang =  sanitize_text_field($_POST['lang']);


    $posts_max = max_posts_count($tags_ids, [], $search, $lang);

    $filtered_posts = my_get_posts(12, $tags_ids, [], $search, $lang);

    if(count($filtered_posts) < 13){

        $ids_exclude = [];
        foreach ($filtered_posts as $item){
            array_push($ids_exclude, $item);
        }


        $posts_additional = my_get_posts(12 - count($filtered_posts), [], $ids_exclude, '', $lang);
    }

    if(count($posts_additional)){
        $posts = array_merge($filtered_posts, $posts_additional);
    }else{
        $posts = $filtered_posts;
    }


    $testimonials_random = get_all_testimonials_random(10, $lang);

    // ALMOST THE SAME CODE IS IN CONTENT-AKTUELL-POSTS.PHP FILE
    $last_two_used_testimonials = [];

    $columns = 0;
    $row = 1;
    $red_cards = 0;
    $red_cards_in_row_2 = false;
    $red_cards_in_row_3 = false;
    $red_cards_in_row_pos_2 = false;
    $red_cards_in_row_pos_3 = false;
    $red_cards_in_row_pos_4 = false;
    $posts_count = 0;
    $r++;
    $p++;


    ob_start();
    $i = 1;
    foreach($posts as $key => $post_id){
        if($i == 1){
            $img_pos = 'top';
        }else{
            $img_pos = $i % 2 == 0 ? 'top' : 'bottom';
        }
//        $img_pos = $i % 2 != 0 ? 'top' : 'bottom';
        $type = get_field('post_type', $post_id);

        // if the red card is important
        if(($columns == 1 || $columns == 3) && (int)get_field('karte_saulen', $posts[$key]) == 2){
            if($row < 4 && $columns < 5) {
                list ($testimonial_id, $last_two_used_testimonials) = get_rand_testimonial($testimonials_random, $last_two_used_testimonials);
                if($testimonial_id) {
                    $red_cards++;
                    $columns++;
                    $r++;
                    $p++;
                    $counter = $r;
                    $counter_class = $p;

                    include 'template-parts/content-card-testimonial.php';

                    ?>
                    <script>
                        new ScrollMagic.Scene({
                            triggerElement: ".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']",
                            triggerHook: 0.9,
                            offset: 0
                        })
                            .setClassToggle(".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']", "visibleBlock")
                            .addTo(controller);
                    </script>
                    <?php
                }

                if($row == 2){
                    $red_cards_in_row_pos_2 = true;
                }
            }
        }

        // the red card is just a wish, if there are less than 2 red cards
        // row 1
        if($row == 1 && $red_cards < 2 && $columns == 3  && (int)get_field('karte_saulen', $posts[$key]) != 2){
            list ($testimonial_id, $last_two_used_testimonials) = get_rand_testimonial($testimonials_random, $last_two_used_testimonials);
            if($testimonial_id) {
                $columns++;
                $r++;
                $p++;
                $counter = $r;
                $counter_class = $p;

                $red_cards++;

                include 'template-parts/content-card-testimonial.php';

                ?>
                <script>
                    new ScrollMagic.Scene({
                        triggerElement: ".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']",
                        triggerHook: 0.9,
                        offset: 0
                    })
                        .setClassToggle(".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']", "visibleBlock")
                        .addTo(controller);
                </script>
                <?php
            }
        }

        // row 2
        if($row == 2 && $red_cards < 2 && $columns == 1  && (int)get_field('karte_saulen', $posts[$key]) != 2){
            list ($testimonial_id, $last_two_used_testimonials) = get_rand_testimonial($testimonials_random, $last_two_used_testimonials);
            if($testimonial_id) {
                $columns++;
                $r++;
                $p++;
                $counter = $r;
                $counter_class = $p;
                $red_cards_in_row_2 = true;
                $red_cards_in_row_pos_2 = true;

                $red_cards++;

                include 'template-parts/content-card-testimonial.php';

                ?>
                <script>
                    new ScrollMagic.Scene({
                        triggerElement: ".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']",
                        triggerHook: 0.9,
                        offset: 0
                    })
                        .setClassToggle(".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']", "visibleBlock")
                        .addTo(controller);
                </script>
                <?php
            }
        }

        if($row == 2 && $red_cards < 2 && $columns == 2 && (int)get_field('karte_saulen', $posts[$key]) != 2 && !$red_cards_in_row_2){
            list ($testimonial_id, $last_two_used_testimonials) = get_rand_testimonial($testimonials_random, $last_two_used_testimonials);
            if($testimonial_id) {
                $columns++;
                $r++;
                $p++;
                $counter = $r;
                $counter_class = $p;
                $red_cards_in_row_2 = true;
                $red_cards_in_row_pos_3 = true;

                $red_cards++;

                include 'template-parts/content-card-testimonial.php';

                ?>
                <script>
                    new ScrollMagic.Scene({
                        triggerElement: ".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']",
                        triggerHook: 0.9,
                        offset: 0
                    })
                        .setClassToggle(".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']", "visibleBlock")
                        .addTo(controller);
                </script>
                <?php
            }
        }

        if($row == 2 && $red_cards < 2 && $columns == 3  && (int)get_field('karte_saulen', $posts[$key]) != 2 && !$red_cards_in_row_2){
            list ($testimonial_id, $last_two_used_testimonials) = get_rand_testimonial($testimonials_random, $last_two_used_testimonials);
            if($testimonial_id) {
                $columns++;
                $r++;
                $p++;
                $counter = $r;
                $counter_class = $p;
                $red_cards_in_row_2 = true;
                $red_cards_in_row_pos_4 = true;

                $red_cards++;

                include 'template-parts/content-card-testimonial.php';

                ?>
                <script>
                    new ScrollMagic.Scene({
                        triggerElement: ".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']",
                        triggerHook: 0.9,
                        offset: 0
                    })
                        .setClassToggle(".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']", "visibleBlock")
                        .addTo(controller);
                </script>
                <?php
            }
        }

        // row 3
        if($row == 3 && $red_cards < 2 && $columns == 1  && (int)get_field('karte_saulen', $posts[$key]) != 2 && !$red_cards_in_row_pos_2){
            list ($testimonial_id, $last_two_used_testimonials) = get_rand_testimonial($testimonials_random, $last_two_used_testimonials);
            if($testimonial_id) {
                $columns++;
                $r++;
                $p++;
                $counter = $r;
                $counter_class = $p;
                $red_cards_in_row_3 = true;

                $red_cards++;

                include 'template-parts/content-card-testimonial.php';

                ?>
                <script>
                    new ScrollMagic.Scene({
                        triggerElement: ".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']",
                        triggerHook: 0.9,
                        offset: 0
                    })
                        .setClassToggle(".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']", "visibleBlock")
                        .addTo(controller);
                </script>
                <?php
            }
        }

        if($row == 3 && $red_cards < 2 && $columns == 2 && (int)get_field('karte_saulen', $posts[$key]) != 2 && !$red_cards_in_row_3 && !$red_cards_in_row_pos_3){
            list ($testimonial_id, $last_two_used_testimonials) = get_rand_testimonial($testimonials_random, $last_two_used_testimonials);
            if($testimonial_id) {
                $columns++;
                $r++;
                $p++;
                $counter = $r;
                $counter_class = $p;
                $red_cards_in_row_3 = true;

                $red_cards++;

                include 'template-parts/content-card-testimonial.php';

                ?>
                <script>
                    new ScrollMagic.Scene({
                        triggerElement: ".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']",
                        triggerHook: 0.9,
                        offset: 0
                    })
                        .setClassToggle(".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']", "visibleBlock")
                        .addTo(controller);
                </script>
                <?php
            }
        }

        if($row == 3 && $red_cards < 2 && $columns == 3  && (int)get_field('karte_saulen', $posts[$key]) != 2 && !$red_cards_in_row_3 && !$red_cards_in_row_pos_4){
            list ($testimonial_id, $last_two_used_testimonials) = get_rand_testimonial($testimonials_random, $last_two_used_testimonials);
            if($testimonial_id) {
                $columns++;
                $r++;
                $p++;
                $counter = $r;
                $counter_class = $p;
                $red_cards_in_row_3 = true;

                $red_cards++;

                include 'template-parts/content-card-testimonial.php';

                ?>
                <script>
                    new ScrollMagic.Scene({
                        triggerElement: ".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']",
                        triggerHook: 0.9,
                        offset: 0
                    })
                        .setClassToggle(".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']", "visibleBlock")
                        .addTo(controller);
                </script>
                <?php
            }
        }


        // posts cards

        if($i == 1){
            $columns = 2;
        }else{
            $columns += get_field('karte_saulen', $post_id) == '1' ? 1 : 2;
        }

        if($columns > 4){
            $row++;
            $p = 0;
            $columns = 0;

            $columns += get_field('karte_saulen', $post_id) == '1' ? 1 : 2;
        }


        if($row < 4) {

            if($i == 1){
                $posts_count++;
                $cols = 2;
            }else{
                $posts_count++;
                $cols = get_field('karte_saulen', $post_id) == '1' ? 1 : 2;
            }

            $r++;
            $p++;
            $counter = $r;
            $counter_class = $p;

            if ($img_pos == 'top') {
                include 'template-parts/content-card-img-top.php';
            } else {
                include 'template-parts/content-card-img-bottom.php';
            }

            ?>
            <script>
                new ScrollMagic.Scene({
                    triggerElement: ".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']",
                    triggerHook: 0.9,
                    offset: 0
                })
                    .setClassToggle(".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']", "visibleBlock")
                    .addTo(controller);
            </script>
        <?php
        }
        $i++;
    }

    wp_reset_postdata();

    $output = ob_get_clean();

    $res = [
        'output' =>  $output,
        'count'  => $posts_max > $posts_count ? 1 : 0,
        'max_posts'  => $posts_max,
    ];

    echo json_encode($res);

    wp_die();
}


add_action('wp_ajax_getMoreFilteredPosts', 'economiesuisse_ajax_getMoreFilteredPosts');
add_action('wp_ajax_nopriv_getMoreFilteredPosts', 'economiesuisse_ajax_getMoreFilteredPosts');
function economiesuisse_ajax_getMoreFilteredPosts(){

    $exclude_ids =  explode(",", trim($_POST['ids'], ','));
    $last_img_post =  sanitize_text_field($_POST['last_img_post']);
    $search =  sanitize_text_field($_POST['search']);
    $max_posts =  sanitize_text_field($_POST['max_posts']);
    $last_counter =  sanitize_text_field($_POST['last_counter']);
    $lang =  sanitize_text_field($_POST['lang']);


    if($_POST['tags_ids'] == ''){
        $tags_ids = [];
    }else{
        $tags_ids =  explode(",", trim($_POST['tags_ids'], ','));
    }

    $posts = my_get_posts(4, $tags_ids, $exclude_ids, $search, $lang);

    $testimonials_random = get_all_testimonials_random(2, $lang);

    $columns = 0;
    $posts_count = 0;
    $r = $last_counter;
    $p = 0;

    ob_start();
    $i = 1;
    foreach($posts as $key => $post_id){
        if($last_img_post == 'top'){
            $img_pos = $i % 2 == 0 ? 'top' : 'bottom';
        }else{
            $img_pos = $i % 2 != 0 ? 'top' : 'bottom';
        }

        $type = get_field('post_type', $post_id);

        // if the red card is important
        if(($columns == 1 || $columns == 3) && (int)get_field('karte_saulen', $post_id) == 2){
            $columns++;

            $r++;
            $p++;

            $counter = $r;
            $counter_class = $p;

            if(count($testimonials_random)){
//                $rand_key = array_rand($testimonials_random, 1);
//                $testimonial_id = $testimonials_random[$rand_key];
                $testimonial_id = $testimonials_random[0];
            }else{
                $testimonial_id = null;
            }

            include 'template-parts/content-card-testimonial.php';

            ?>

            <script>
                new ScrollMagic.Scene({
                    triggerElement: ".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']",
                    triggerHook: 0.9,
                    offset: 0
                })
                    .setClassToggle(".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']", "visibleBlock")
                    .addTo(controller);
            </script>

            <?php
        }

        if($columns < 4){
            $columns = $columns + (int)get_field('karte_saulen', $post_id);
            $posts_count++;

            $r++;
            $p++;

            $counter = $r;
            $counter_class = $p;

            $cols = get_field('karte_saulen', $post_id) == '1' ? 1 : 2;

            if($img_pos == 'top'){
                include 'template-parts/content-card-img-top.php';
            }else{
                include 'template-parts/content-card-img-bottom.php';
            }

            ?>

            <script>
                new ScrollMagic.Scene({
                    triggerElement: ".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']",
                    triggerHook: 0.9,
                    offset: 0
                })
                    .setClassToggle(".aktuell-posts .card-container[data-counter='<?php echo $r; ?>']", "visibleBlock")
                    .addTo(controller);
            </script>

            <?php
        }

        $i++;
    }

    wp_reset_postdata();

    $output = ob_get_clean();

    $res = [
        'output' =>  $output,
        'count'  => $max_posts > $posts_count + count($exclude_ids) ? 1 : 0,
        'max_posts'  => $max_posts,
    ];

    echo json_encode($res);

    wp_die();

}


// posts mob
add_action('wp_ajax_getMorePostsMob', 'economiesuisse_ajax_getMorePostsMob');
add_action('wp_ajax_nopriv_getMorePostsMob', 'economiesuisse_ajax_getMorePostsMob');
function economiesuisse_ajax_getMorePostsMob(){

    $exclude_ids =  explode(",", trim($_POST['ids'], ','));
    $max_posts =  sanitize_text_field($_POST['max_posts']);
    $last_img_post =  sanitize_text_field($_POST['last_img_post']);
    $last_counter =  sanitize_text_field($_POST['last_counter']);
    $lang =  sanitize_text_field($_POST['lang']);

    $posts = my_get_posts(3, [], $exclude_ids, '', $lang);

    $r = $last_counter;
    $counter_class = 0;

    ob_start();

    foreach($posts as $key => $post_id){

        $type = get_field('post_type', $post_id);

        $img_pos = 'top';

        $cols = 1;

        $r++;

        $counter = $r;

        include 'template-parts/content-card-img-top.php';

        ?>

        <script>
            new ScrollMagic.Scene({
                triggerElement: ".aktuell-posts-mob .card-container[data-counter='<?php echo $counter; ?>']",
                triggerHook: 0.9,
                offset: 0
            })
                .setClassToggle(".aktuell-posts-mob .card-container[data-counter='<?php echo $counter; ?>']", "visibleBlock")
                .addTo(controller);
        </script>

    <?php
    }

    wp_reset_postdata();

    $output = ob_get_clean();

    $res = [
        'output' =>  $output,
        'count'  => $max_posts > count($posts) + count($exclude_ids) ? 1 : 0,
    ];

    echo json_encode($res);

    wp_die();

}

add_action('wp_ajax_getFilteredPostsMob', 'economiesuisse_ajax_getFilteredPostsMob');
add_action('wp_ajax_nopriv_getFilteredPostsMob', 'economiesuisse_ajax_getFilteredPostsMob');
function economiesuisse_ajax_getFilteredPostsMob(){

    $lang =  sanitize_text_field($_POST['lang']);

    if($_POST['tags_ids'] == ''){
        $tags_ids = [];
    }else{
        $tags_ids =  explode(",", trim($_POST['tags_ids'], ','));
    }

    $r = 0;
    $counter_class = 0;

    $search =  sanitize_text_field($_POST['search']);

    $posts_max = max_posts_count($tags_ids, [], $search, $lang);

    $filtered_posts = my_get_posts(3, $tags_ids, [], $search, $lang);

    if(count($filtered_posts) < 3){

        $ids_exclude = [];
        foreach ($filtered_posts as $item){
            array_push($ids_exclude, $item);
        }


        $posts_additional = my_get_posts(3 - count($filtered_posts), [], $ids_exclude, '', $lang);
    }

    if(count($posts_additional)){
        $posts = array_merge($filtered_posts, $posts_additional);
    }else{
        $posts = $filtered_posts;
    }


    ob_start();
    foreach($posts as $key => $post_id){

        $type = get_field('post_type', $post_id);

        $img_pos = 'top';

        $cols = 1;

        $r++;

        $counter = $r;

        include 'template-parts/content-card-img-top.php';

        ?>

        <script>
            new ScrollMagic.Scene({
                triggerElement: ".aktuell-posts-mob .card-container[data-counter='<?php echo $counter; ?>']",
                triggerHook: 0.9,
                offset: 0
            })
                .setClassToggle(".aktuell-posts-mob .card-container[data-counter='<?php echo $counter; ?>']", "visibleBlock")
                .addTo(controller);
        </script>

    <?php
    }

    wp_reset_postdata();

    $output = ob_get_clean();

    $res = [
        'output' =>  $output,
        'count'  => $posts_max > count($posts) ? 1 : 0,
        'max_posts'  => $posts_max,
    ];

    echo json_encode($res);

    wp_die();
}

add_action('wp_ajax_getMoreFilteredPostsMob', 'economiesuisse_ajax_getMoreFilteredPostsMob');
add_action('wp_ajax_nopriv_getMoreFilteredPostsMob', 'economiesuisse_ajax_getMoreFilteredPostsMob');
function economiesuisse_ajax_getMoreFilteredPostsMob(){

    $exclude_ids =  explode(",", trim($_POST['ids'], ','));
    $search =  sanitize_text_field($_POST['search']);
    $max_posts =  sanitize_text_field($_POST['max_posts']);
    $last_counter =  sanitize_text_field($_POST['last_counter']);
    $lang =  sanitize_text_field($_POST['lang']);

    $r = $last_counter;
    $counter_class = 0;

    if($_POST['tags_ids'] == ''){
        $tags_ids = [];
    }else{
        $tags_ids =  explode(",", trim($_POST['tags_ids'], ','));
    }

    $posts = my_get_posts(3, $tags_ids, $exclude_ids, $search, $lang);


    ob_start();
    foreach($posts as $key => $post_id){

        $type = get_field('post_type', $post_id);

        $img_pos = 'top';

        $cols = 1;

        $r++;

        $counter = $r;

        include 'template-parts/content-card-img-top.php';

        ?>

        <script>
            new ScrollMagic.Scene({
                triggerElement: ".aktuell-posts-mob .card-container[data-counter='<?php echo $counter; ?>']",
                triggerHook: 0.9,
                offset: 0
            })
                .setClassToggle(".aktuell-posts-mob .card-container[data-counter='<?php echo $counter; ?>']", "visibleBlock")
                .addTo(controller);
        </script>

    <?php
    }

    wp_reset_postdata();

    $output = ob_get_clean();

    $res = [
        'output' =>  $output,
        'count'  => $max_posts > count($posts) + count($exclude_ids) ? 1 : 0,
        'max_posts'  => $max_posts,
    ];

    echo json_encode($res);

    wp_die();

}



// persons desk
add_action('wp_ajax_getFilteredPersons', 'economiesuisse_ajax_getFilteredPersons');
add_action('wp_ajax_nopriv_getFilteredPersons', 'economiesuisse_ajax_getFilteredPersons');
function economiesuisse_ajax_getFilteredPersons(){

    $mainSearch =  (array)$_POST['mainSearch'];
    $generalText = $_POST['generalText'];
    $lang =  sanitize_text_field($_POST['lang']);

    global $sitepress;
    $sitepress->switch_lang($lang);

    $meta_query = [
        'relation' => 'AND',
        [
            'key' => 'person_approved',
            'compare' => '=',
            'value' => '1',
        ],
    ];

    if(strlen(sanitize_text_field($generalText))){

        $temp_inner = ['relation' => 'OR'];

        foreach ($mainSearch as $key => $item){

                array_push($temp_inner, [
                    'key' => 'person_' . $key,
                    'compare' => 'LIKE',
                    'value' => sanitize_text_field($generalText),
                ]);

        }

        $temp = [];
        array_push($temp, $temp_inner);

    }else{

        $temp_inner = ['relation' => 'AND'];

        foreach ($mainSearch as $key => $item){
            if(strlen($item)){
                array_push($temp_inner, [
                    'key' => 'person_' . $key,
                    'compare' => 'LIKE',
                    'value' => sanitize_text_field($item),
                ]);
            }
        }

        $temp = [];
        array_push($temp, $temp_inner);
    }

    $persons = new WP_Query([
        'post_type' => 'person',
        'posts_per_page' => -1,
        'meta_key'=>'person_nachname',
        'orderby'=>'meta_value',
        'post_status' => 'publish',
        'suppress_filters' => false,
        'order'    => 'ASC',
        'meta_query' =>  array_merge($meta_query, $temp),
    ]);


    ob_start();

    include 'template-parts/content-komitee-mitglieders-loop-desk.php';

    wp_reset_postdata();

    $output = ob_get_clean();


    $res = [
        'output' =>  $output,
    ];

    echo json_encode($res);

    wp_die();
}

// persons mob
add_action('wp_ajax_getPersonsMob', 'economiesuisse_ajax_getPersonsMob');
add_action('wp_ajax_nopriv_getPersonsMob', 'economiesuisse_ajax_getPersonsMob');
function economiesuisse_ajax_getPersonsMob(){
    $generalText = $_POST['generalText'];
    $exclude_ids =  explode(",", trim($_POST['ids'], ','));
    $mainSearch =  (array)$_POST['mainSearch'];
    $lang =  sanitize_text_field($_POST['lang']);

    global $sitepress;
    $sitepress->switch_lang($lang);

    $meta_query = [
        'relation' => 'AND',
        [
            'key' => 'person_approved',
            'compare' => '=',
            'value' => '1',
        ],
    ];

    $temp = [];

    if(strlen(sanitize_text_field($generalText))){

        $temp_inner = ['relation' => 'OR'];

        foreach ($mainSearch as $key => $item){

            array_push($temp_inner, [
                'key' => 'person_' . $key,
                'compare' => 'LIKE',
                'value' => sanitize_text_field($generalText),
            ]);

        }

        array_push($temp, $temp_inner);
    }

    $persons = new WP_Query([
        'post_type' => 'person',
        'posts_per_page' => 5,
        'meta_key'=>'person_nachname',
        'orderby'=>'meta_value',
        'post_status' => 'publish',
        'suppress_filters' => false,
        'order'    => 'ASC',
        'meta_query' =>  array_merge($meta_query, $temp),
        'post__not_in'   => $exclude_ids,
    ]);


    ob_start();

    include 'template-parts/content-komitee-mitglieders-loop-mob.php';

    wp_reset_postdata();

    $output = ob_get_clean();


    $res = [
        'output' =>  $output,
        'count'  => $persons->post_count > 4 ? 1 : 0,
        '$persons'  => $persons->post_count ,
    ];

    echo json_encode($res);

    wp_die();
}

