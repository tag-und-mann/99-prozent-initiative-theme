<?php



//add_action('frm_after_create_entry', 'economiesuisse_form_submit', 30, 2);
function economiesuisse_form_submit($entry_id, $form_id){


    $entry = FrmProEntriesController::show_entry_shortcode( array( 'id' => $entry_id, 'format' => 'array' ) );

    $l = '';

    foreach ($entry as $key => $value) {
        $temp = explode('-', $key);

        if ($temp[0] == 'formlang') {
            $l = $value;
        }
    }

    if($form_id == get_field($l . '_mitmachen_formidable_form_shortcode_id', 'option') ||
        $form_id == get_field($l . '_komitee_formidable_form_shortcode_id', 'option') ||
        $form_id == get_field($l . '_testimonial_formidable_form_shortcode_id', 'option') ||
        $form_id == get_field($l . '_newsletter_formidable_form_shortcode_id', 'option') ||

        $form_id == get_field( 'mitmachen_formidable_form_shortcode_id', 'option') ||
        $form_id == get_field('komitee_formidable_form_shortcode_id', 'option') ||
        $form_id == get_field('testimonial_formidable_form_shortcode_id', 'option') ||
        $form_id == get_field('newsletter_formidable_form_shortcode_id', 'option') ) {

        $entry_key_fixed = [];

        $foto_first_time = false;

        foreach ($entry as $key => $value) {
            $temp = explode('-', $key);

            if (is_string($value) && $temp[0] !== 'foto') {
                $val = wp_strip_all_tags($value);
            } else {
                $val = $value;
            }

            if ($temp[0] == 'data_agree' ||
                $temp[0] == 'newsletter_abonnieren' ||
                $temp[0] == 'mochte_1' ||
                $temp[0] == 'mochte_2' ||
                $temp[0] == 'mochte_3' ||
                $temp[0] == 'mochte_4' ||
                $temp[0] == 'komitee_member' ||
                $temp[0] == 'testimonial_member' ||
                $temp[0] == 'agree') {
                $val = 1;
            }


            if ($temp[0] == 'foto') {

                if (!$foto_first_time) {
                    $foto_first_time = true;
                } else {
                    continue;
                }
            }

            $entry_key_fixed['person_' . $temp[0]] = $val;
        }


        global $sitepress;
        $lang = $entry_key_fixed['person_formlang'];
        $sitepress->switch_lang($lang);

        $person = get_posts([
            'post_type' => 'person',
            'posts_per_page' => 1,
            'suppress_filters' => false,
            'meta_query' => [
                [
                    'relation' => 'AND',
                    [
                        'key' => 'person_email',
                        'compare' => '=',
                        'value' => $entry_key_fixed['person_email'],
                    ],
                ],
            ]
        ]);

        if (count($person)) {

            $newsletter = false;
            $komitee_member = false;
            $testimonial_member = false;

            $person_id = $person[0]->ID;

            foreach ($entry_key_fixed as $key => $value) {
                if ($key != 'person_anrede' && $key != 'person_vorname' && $key != 'person_nachname' && $key != 'person_email') {

                    if ($key == 'person_newsletter_abonnieren') {
                        $newsletter = true;
                    }

                    if ($key == 'person_komitee_member') {
                        $komitee_member = true;
                    }

                    if ($key == 'person_testimonial_member') {
                        $testimonial_member = true;
                    }

                    if ($key == 'person_testimonial_text') {
                        if (get_field('person_testimonial_text', $person_id) != $value) {
                            update_field('person_testimonial_approved', 0, $person_id);
                            update_field('person_testimonial_show', 0, $person_id);
                        }
                    }

                    if ($key == 'person_foto') {
                        if (get_field('person_foto', $person_id)['url'] != $value) {
                            update_field('person_testimonial_approved', 0, $person_id);
                            update_field('person_testimonial_show', 0, $person_id);
                        }
                    }

                    if ($key == 'person_funktion') {
                        if (get_field('person_funktion', $person_id) != $value) {
                            update_field('person_approved', 0, $person_id);
                        }
                    }

                    if ($key == 'person_ort') {
                        if (get_field('person_ort', $person_id) != $value) {
                            update_field('person_approved', 0, $person_id);
                        }
                    }

                    if ($key == 'person_partei') {
                        if (get_field('person_partei', $person_id) != $value) {
                            update_field('person_approved', 0, $person_id);
                        }
                    }


                    if ($key !== 'person_foto') {

                        update_field($key, $value, $person_id);

                    } else {

                        $filename = $entry_key_fixed['person_foto'];

                        $parent_post_id = $person_id;

                        $filetype = wp_check_filetype(basename($filename), null);

                        $wp_upload_dir = wp_upload_dir();

                        $attachment = array(
                            'guid' => $wp_upload_dir['url'] . '/' . basename($filename),
                            'post_mime_type' => $filetype['type'],
                            'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
                            'post_content' => '',
                            'post_status' => 'inherit',
                            'post_parent' => $person_id,
                        );

                        $attach_id = wp_insert_attachment($attachment, $filename, $parent_post_id);

                        require_once(ABSPATH . 'wp-admin/includes/image.php');

                        $attach_data = wp_generate_attachment_metadata($attach_id, $filename);
                        wp_update_attachment_metadata($attach_id, $attach_data);

                        update_field('person_foto', $attach_id, $person_id);

                        global $sitepress;
                        $default_language = $entry_key_fixed['person_formlang'];
                        $sitepress->set_element_language_details($attach_id, 'post_attachment', false, $default_language);
                    }

                }

                if (!$newsletter) {
                    update_field('person_newsletter_abonnieren', 0, $person_id);
                }

                if (!$komitee_member) {
                    update_field('person_komitee_member', 0, $person_id);
                    update_field('person_approved', 0, $person_id);
                }

                if (!$testimonial_member) {
                    update_field('person_testimonial_member', 0, $person_id);
                    update_field('person_testimonial_approved', 0, $person_id);
                    update_field('person_testimonial_show', 0, $person_id);
                }
            }

        } else {

            $post_data = array(
                'post_title' => wp_strip_all_tags($entry_key_fixed['person_vorname'] . ' ' . $entry_key_fixed['person_nachname'] . ': ' . $entry_key_fixed['person_email']),
                'post_status' => 'publish',
                'post_type' => 'person',
            );

            $person_id = wp_insert_post($post_data);


            $wpml_element_type = apply_filters('wpml_element_type', 'person');
            $get_language_args = array('element_id' => $person_id, 'element_type' => 'person');
            $original_post_language_info = apply_filters('wpml_element_language_details', null, $get_language_args);

            $set_language_args = array(
                'element_id' => $person_id,
                'element_type' => $wpml_element_type,
                'trid' => $original_post_language_info->trid,
                'language_code' => $entry_key_fixed['person_formlang'],
                'source_language_code' => $original_post_language_info->language_code
            );

            do_action('wpml_set_element_language_details', $set_language_args);

            foreach ($entry_key_fixed as $key => $value) {

                if ($key !== 'person_foto') {

                    update_field($key, $value, $person_id);

                } else {

                    $filename = $entry_key_fixed['person_foto'];

                    $parent_post_id = $person_id;

                    $filetype = wp_check_filetype(basename($filename), null);

                    $wp_upload_dir = wp_upload_dir();

                    $attachment = array(
                        'guid' => $wp_upload_dir['url'] . '/' . basename($filename),
                        'post_mime_type' => $filetype['type'],
                        'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
                        'post_content' => '',
                        'post_status' => 'inherit',
                        'post_parent' => $person_id,
                    );

                    $attach_id = wp_insert_attachment($attachment, $filename, $parent_post_id);

                    require_once(ABSPATH . 'wp-admin/includes/image.php');

                    $attach_data = wp_generate_attachment_metadata($attach_id, $filename);
                    wp_update_attachment_metadata($attach_id, $attach_data);

                    update_field('person_foto', $attach_id, $person_id);


                    global $sitepress;
                    $default_language = $entry_key_fixed['person_formlang'];
                    $sitepress->set_element_language_details($attach_id, 'post_attachment', false, $default_language);
                }
            }
        }

        if (!get_field('person_email_approved', $person_id)) {
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

            if ($entry_key_fixed['person_formlang'] == 'de') {
                $home_url = explode('?', home_url())[0] . '/';

                $link = $home_url . 'email-confirmation/?id=' . $person_id . '&email=' . get_field("person_email", $person_id);

                $msg = str_replace("[X]", $link, apply_filters('the_content', get_field('email_confirmation_text', 'option')));

                wp_mail(strip_tags(get_field('person_email', $person_id)), get_field('email_confirmation_titel', 'option'), $msg, $headers);

            } else {
                $home_url = explode('?', home_url())[0];

                $link = $home_url . '/email-confirmation/?id=' . $person_id . '&email=' . get_field("person_email", $person_id);

                $msg = str_replace("[X]", $link, apply_filters('the_content', get_field($entry_key_fixed['person_formlang'] . '_email_confirmation_text', 'option')));

                wp_mail(strip_tags(get_field('person_email', $person_id)), get_field($entry_key_fixed['person_formlang'] . '_email_confirmation_titel', 'option'), $msg, $headers);
            }
        }

    }
}


