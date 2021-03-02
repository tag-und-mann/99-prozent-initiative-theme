<?php

add_filter('show_admin_bar', '__return_false');


function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_init', 'my_remove_admin_menus' );




function economiesuisse_block_categories( $categories, $post ) {
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'economiesuisse-category',
                'title' => __( 'Meine Blöcke', 'my-plugin' ),
            ),
        )
    );
}
add_filter( 'block_categories', 'economiesuisse_block_categories', 10, 2 );



add_filter( 'manage_post_posts_columns', 'set_custom_edit_post_columns' );
function set_custom_edit_post_columns($columns) {
    $columns['Columns'] = __( 'Columns', 'economiesuisse' );

    return $columns;
}


add_action( 'manage_post_posts_custom_column' , 'custom_post_column', 10, 2 );
function custom_post_column( $column, $post_id ) {
    switch ( $column ) {
        case 'Columns' :
            $cols = 1;
            if(get_field( 'karte_saulen', $post_id ) == '2'){
                $cols = 2;
            }
            echo $cols;
            break;
    }
}


add_action( 'phpmailer_init', 'send_smtp_email' );
function send_smtp_email( $phpmailer ) {
    $phpmailer->isSMTP();
    $phpmailer->Host       = get_field('phpmailer_host', 'option');
    $phpmailer->SMTPAuth   = get_field('phpmailer_SMTPAuth', 'option');
    $phpmailer->Port       = get_field('phpmailer_port', 'option');
    $phpmailer->SMTPSecure = get_field('phpmailer_SMTPSecure', 'option');
    $phpmailer->Username   = get_field('phpmailer_username', 'option');
    $phpmailer->Password   = get_field('phpmailer_password', 'option');
    $phpmailer->From       = get_field('phpmailer_from', 'option');
    $phpmailer->FromName   = get_field('phpmailer_fromName', 'option');
}


add_action( 'init', 'my_custom_taxonomy_rest_support', 50 );
function my_custom_taxonomy_rest_support()
{
    global $wp_taxonomies;

    $tax_name = 'post_tag';
    if (isset($wp_taxonomies[$tax_name])) {
        $wp_taxonomies[$tax_name]->hierarchical = true;
    }
}
