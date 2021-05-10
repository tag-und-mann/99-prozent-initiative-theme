<?php

function getFileSize($file_id){
    $bytes = filesize( get_attached_file($file_id) );
    $s = array('b', 'KB', 'MB', 'GB');
    $e = floor(log($bytes)/log(1024));
    return sprintf('%.1f '.$s[$e], ($bytes/pow(1024, floor($e))));
}



function my_get_posts($count, $tags_ids = [], $exclude_ids = [], $search = '', $lang='de'){
    global $sitepress;
    $sitepress->switch_lang($lang);

    $posts = get_posts([
        'post_type' => 'post',
        'posts_per_page' => $count,
        'post_status' => 'publish',
        'fields'    => 'ids',
        'suppress_filters' => false,
        'tag__in' => $tags_ids,
        'exclude' => $exclude_ids,
        's' => $search,
//        'orderby' => 'rand',
    ]);

    return $posts;
}

function max_posts_count($tags_ids = [], $exclude_ids = [], $search = '', $lang='de'){
    global $sitepress;
    $sitepress->switch_lang($lang);

    $posts_max = count(get_posts([
        'post_type' => 'post',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'fields'    => 'ids',
        'suppress_filters' => false,
        'tag__in' => $tags_ids,
        'exclude' => $exclude_ids,
        's' => $search,
    ]));

    return $posts_max;
}

function get_all_testimonials_random($posts_per_page = 10, $lang='de'){

    global $sitepress;
    $sitepress->switch_lang($lang);

    $testimonials_random = get_posts([
        'fields'    => 'ids',
        'post_type' => 'person',
        'posts_per_page' => $posts_per_page,
        'post_status' => 'publish',
        'meta_query' => [
            'relation' => 'AND',
            [
                'key' => 'person_testimonial_approved',
                'compare' => '=',
                'value' => '1',
            ],                            [
                'key' => 'person_testimonial_show',
                'compare' => '=',
                'value' => '1',
            ],
        ],
        'orderby' => 'rand',
        'suppress_filters' => false,
    ]);

    return $testimonials_random;
}


function get_rand_testimonial($testimonials_random, $last_two_used_testimonials){

    if(count($testimonials_random) < 1){
        return [0, []];
    }

    if(count($testimonials_random) < 2){
        return [$testimonials_random[0], []];
    }



    if(count($last_two_used_testimonials) > 3){
        array_shift($last_two_used_testimonials);
    }

    $temp = true;
    $k = 1;

    $id = null;

    while ($temp && $k < 15) {
        $rand_key = array_rand($testimonials_random, 1);
        $id = $testimonials_random[$rand_key];

        if (!in_array($id, $last_two_used_testimonials)) {
            array_push($last_two_used_testimonials, $id);

            $temp = false;
        }

        $k++;
    }

    return [$id, $last_two_used_testimonials];
}


function getTranslatedMonth($month, $lang){
    if($lang == 'it') {
        switch ($month) {
            case '1':
                $month = 'Gennaio';
                break;
            case '2':
                $month = 'Febbraio';
                break;
            case '3':
                $month = 'Marzo';
                break;
            case '4':
                $month = 'Aprile';
                break;
            case '5':
                $month = 'Maggio';
                break;
            case '6':
                $month = 'Giugno';
                break;
            case '7':
                $month = 'Luglio';
                break;
            case '8':
                $month = 'Agosto';
                break;
            case '9':
                $month = 'Settembre';
                break;
            case '10':
                $month = 'Ottobre';
                break;
            case '11':
                $month = 'Novembre';
                break;
            case '12':
                $month = 'Dicembre';
                break;
        }
    }


    if($lang == 'de') {
        switch ($month) {
            case '1':
                $month = 'Januar';
                break;
            case '2':
                $month = 'Februar';
                break;
            case '3':
                $month = 'März';
                break;
            case '4':
                $month = 'April';
                break;
            case '5':
                $month = 'Mai';
                break;
            case '6':
                $month = 'Juni';
                break;
            case '7':
                $month = 'Juli';
                break;
            case '8':
                $month = 'August';
                break;
            case '9':
                $month = 'September';
                break;
            case '10':
                $month = 'Oktober';
                break;
            case '11':
                $month = 'November';
                break;
            case '12':
                $month = 'Dezember';
                break;
        }
    }

    if($lang == 'fr') {
        switch ($month) {
            case '1':
                $month = 'Janvier ';
                break;
            case '2':
                $month = 'Février';
                break;
            case '3':
                $month = 'Mars';
                break;
            case '4':
                $month = 'Avril';
                break;
            case '5':
                $month = 'Mai';
                break;
            case '6':
                $month = 'Juin';
                break;
            case '7':
                $month = 'Juillet';
                break;
            case '8':
                $month = 'Août';
                break;
            case '9':
                $month = 'Septembre';
                break;
            case '10':
                $month = 'Octobre';
                break;
            case '11':
                $month = 'Novembre';
                break;
            case '12':
                $month = 'Décembre';
                break;
        }
    }

    return $month;
}


function getFormatedDate($date, $lang){
    $date_arr = explode('-', $date);

    if($lang == 'de'){
        return $date_arr[0] . '. ' . getTranslatedMonth($date_arr[1], $lang) . ' ' . $date_arr[2];
    }

    return $date_arr[0] . ' ' . getTranslatedMonth($date_arr[1], $lang) . ' ' . $date_arr[2];
}

