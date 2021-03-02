<?php
// quiz
add_action( 'init', 'quiz_posts' );
function quiz_posts() {
    $labels = array(
        'name'                 => _x( 'Quiz', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'        => _x( 'Quiz', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'            => _x( 'Quiz', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'       => _x( 'Quiz', 'your-plugin-textdomain' ),
        'add_new'              => _x( 'Erstellen Quiz', 'your-plugin-textdomain' ),
        'add_new_item'         => __( 'Erstellen Quiz ', 'your-plugin-textdomain' ),
        'new_item'             => __( 'New Quiz', 'your-plugin-textdomain' ),
        'edit_item'            => __( 'Edit Quiz', 'your-plugin-textdomain' ),
        'view_item'            => __( 'View Quiz', 'your-plugin-textdomain' ),
        'all_items'            => __( 'Alles Quiz', 'your-plugin-textdomain' ),
        'search_items'         => __( 'Search Quiz', 'your-plugin-textdomain' ),
        'parent_item_colon'    => __( 'Parent Quiz:', 'your-plugin-textdomain' ),
        'not_found'            => __( 'Kein Quiz gefunden.', 'your-plugin-textdomain' ),
        'not_found_in_trash'   => __( 'Kein Quiz im Papierkorb gefunden.', 'your-plugin-textdomain' )
    );

    $args = array(
        'show_in_rest'              => true,
        'labels'             		=> $labels,
        'description'        		=> __( '', 'your-plugin-textdomain' ),
        'public'             		=> true,
        'publicly_queryable' 	    => true,
        'show_ui'            		=> true,
        'show_in_menu'       	    => true,
        'query_var'          	    => true,
        'rewrite'            		=> array( 'slug' => 'quiz' ),
        'capability_type'    	    => 'post',
        'map_meta_cap'              =>true,
        'has_archive'        	    => true,
        'hierarchical'       		=> false,
        'menu_position'      	    => null,
        'supports'           		=> array('title', 'editor'),
        'menu_icon'                 => 'dashicons-welcome-write-blog'
    );
    register_post_type( 'quiz', $args );

    register_taxonomy('quiz_tag','quiz', [
        'labels' => [
            'name'               => _x( 'Tag', 'post type general name', 'your-plugin-textdomain' ),
            'singular_name'      => _x( 'Tag', 'post type singular name', 'your-plugin-textdomain' ),
            'menu_name'          => _x( 'Tags', 'admin menu', 'your-plugin-textdomain' ),
            'name_admin_bar'     => _x( 'Tag', 'add new on admin bar', 'your-plugin-textdomain' ),
            'add_new'            => _x( 'Add Tag', 'your-plugin-textdomain' ),
            'add_new_item'       => __( 'Add Tag ', 'your-plugin-textdomain' ),
            'new_item'           => __( 'New Tag', 'your-plugin-textdomain' ),
            'edit_item'          => __( 'Edit Tag', 'your-plugin-textdomain' ),
            'view_item'          => __( 'View Tag', 'your-plugin-textdomain' ),
            'all_items'          => __( 'All Tags', 'your-plugin-textdomain' ),
            'search_items'       => __( 'Search Tags', 'your-plugin-textdomain' ),
            'parent_item_colon'  => __( 'Parent Tags:', 'your-plugin-textdomain' ),
            'not_found'          => __( 'No Tags found.', 'your-plugin-textdomain' ),
            'not_found_in_trash' => __( 'No Tags found in Trash.', 'your-plugin-textdomain' )],
        'description'            => __( 'Description.', 'your-plugin-textdomain' ),
        'hierarchical'      => false,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,    // Needed for tax to appear in Gutenberg editor.
        'public'      => true,

    ] );

}



// person
add_action( 'init', 'person_posts' );
function person_posts() {
    $labels = array(
        'name'                 => _x( 'Personen', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'        => _x( 'Person', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'            => _x( 'Personen', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'       => _x( 'Person', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'              => _x( 'Add Person', 'your-plugin-textdomain' ),
        'add_new_item'         => __( 'Add Person ', 'your-plugin-textdomain' ),
        'new_item'             => __( 'New Person', 'your-plugin-textdomain' ),
        'edit_item'            => __( 'Edit Person', 'your-plugin-textdomain' ),
        'view_item'            => __( 'View Person', 'your-plugin-textdomain' ),
        'all_items'            => __( 'Alle Personen', 'your-plugin-textdomain' ),
        'search_items'         => __( 'Search Person', 'your-plugin-textdomain' ),
        'parent_item_colon'    => __( 'Parent Personen:', 'your-plugin-textdomain' ),
        'not_found'            => __( 'Kein Person gefunden.', 'your-plugin-textdomain' ),
        'not_found_in_trash'   => __( 'Keine Personen im Papierkorb gefunden.', 'your-plugin-textdomain' )
    );

    $args = array(
        'show_in_rest'              => true,
        'labels'             		=> $labels,
       'public'             		=> true,
        'publicly_queryable' 	    => true,
        'show_ui'            		=> true,
        'show_in_menu'       	    => true,
        'query_var'          	    => true,
        'rewrite'            		=> array( 'slug' => 'person' ),
        'capability_type'    	    => 'post',
        'map_meta_cap'              =>true,
        'has_archive'        	    => false,
        'hierarchical'       		=> false,
        'menu_position'      	    => null,
        'supports'           		=> array('title'),
        'menu_icon'                 => 'dashicons-groups'
    );
    register_post_type( 'person', $args );

}

add_filter( 'manage_person_posts_columns', 'set_custom_edit_person_columns' );
function set_custom_edit_person_columns($columns) {
    $columns['Komiteemitglied auf Webseite anzeigen'] = __( 'Komiteemitglied auf Webseite anzeigen', 'your_text_domain' );
    $columns['Komitee member'] = __( 'Komitee member', 'your_text_domain' );
    $columns['Testimonial bestätigen'] = __( 'Testimonial bestätigen', 'your_text_domain' );
    $columns['Testimonial auf Webseite anzeigen'] = __( 'Testimonial auf Webseite anzeigen', 'your_text_domain' );
    $columns['Testimonial member'] = __( 'Testimonial member', 'your_text_domain' );
    $columns['Newsletter abonnieren'] = __( 'Newsletter abonnieren', 'your_text_domain' );
    $columns['Genehmigte E-Mail'] = __( 'Genehmigte E-Mail', 'your_text_domain' );

    return $columns;
}


add_action( 'manage_person_posts_custom_column' , 'custom_person_column', 10, 2 );
function custom_person_column( $column, $post_id ) {
    switch ( $column ) {
        case 'Testimonial bestätigen' :
            $status = 'Waiting';
            if(get_field( 'person_testimonial_approved', $post_id ) == 1){
                $status = 'Ja';
            }

            if(get_field( 'person_testimonial_approved', $post_id ) == 0){
                $status = 'Nein';
            }
            echo $status;
            break;
        case 'Testimonial auf Webseite anzeigen' :
            if(get_field( 'person_testimonial_show', $post_id ) == 1){
                $status_show = 'Ja';
            }else{
                $status_show = 'Nein';
            }
            echo $status_show;
            break;
        case 'Komiteemitglied auf Webseite anzeigen' :
            if(get_field( 'person_approved', $post_id ) == 1){
                $status_show = 'Ja';
            }else{
                $status_show = 'Nein';
            }
            echo $status_show;
            break;
        case 'Newsletter abonnieren' :
            if(get_field( 'person_newsletter_abonnieren', $post_id ) == 1){
                $status_show = 'Ja';
            }else{
                $status_show = 'Nein';
            }
            echo $status_show;
            break;
        case 'Genehmigte E-Mail' :
            if(get_field( 'person_email_approved', $post_id ) == 1){
                $status_show = 'Ja';
            }else{
                $status_show = 'Nein';
            }
            echo $status_show;
            break;


        case 'Komitee member' :
            if(get_field( 'person_komitee_member', $post_id ) == 1){
                $status_show = 'Ja';
            }else{
                $status_show = 'Nein';
            }
            echo $status_show;
            break;
        case 'Testimonial member' :
            if(get_field( 'person_testimonial_member', $post_id ) == 1){
                $status_show = 'Ja';
            }else{
                $status_show = 'Nein';
            }
            echo $status_show;
            break;
    }
}



add_action( 'pre_get_posts', 'my_sort_custom_column_query' );
function my_set_sortable_columns( $columns )
{
    $columns['Testimonial bestätigen'] = 'Testimonial bestätigen';
    $columns['Testimonial auf Webseite anzeigen'] = 'Testimonial auf Webseite anzeigen';
    $columns['Komiteemitglied auf Webseite anzeigen'] = 'Komiteemitglied auf Webseite anzeigen';
    $columns['Newsletter abonnieren'] = 'Newsletter abonnieren';
    $columns['Genehmigte E-Mail'] = 'Genehmigte E-Mail';
    $columns['Testimonial member'] = 'Testimonial member';
    $columns['Komitee member'] = 'Komitee member';

    return $columns;
}



add_filter( 'manage_edit-person_sortable_columns', 'my_set_sortable_columns' );
function my_sort_custom_column_query( $query )
{
    $orderby = $query->get( 'orderby' );

    if ( 'Testimonial bestätigen' == $orderby ) {
        $query->set( 'meta_key', 'person_testimonial_approved' );
        $query->set( 'orderby', 'meta_value' );
    }

    if ( 'Testimonial auf Webseite anzeigen' == $orderby ) {
        $query->set( 'meta_key', 'person_testimonial_show' );
        $query->set( 'orderby', 'meta_value' );
    }

    if ( 'Komiteemitglied auf Webseite anzeigen' == $orderby ) {

        $query->set( 'meta_key', 'person_approved' );
        $query->set( 'orderby', 'meta_value' );
    }

    if ( 'Newsletter abonnieren' == $orderby ) {
        $query->set( 'meta_key', 'person_newsletter_abonnieren' );
        $query->set( 'orderby', 'meta_value' );
    }

    if ( 'Genehmigte E-Mail' == $orderby ) {
        $query->set( 'meta_key', 'person_email_approved' );
        $query->set( 'orderby', 'meta_value' );
    }

    if ( 'Komitee member' == $orderby ) {
        $query->set( 'meta_key', 'person_komitee_member' );
        $query->set( 'orderby', 'meta_value' );
    }

    if ( 'Testimonial member' == $orderby ) {
        $query->set( 'meta_key', 'person_testimonial_member' );
        $query->set( 'orderby', 'meta_value' );
    }

}