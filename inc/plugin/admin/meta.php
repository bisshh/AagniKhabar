<?php

function techie_save_postdata( $post_id ){

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return;
    if(!isset($_POST['techie_noncename'])){
        return;
    }
    if ( !wp_verify_nonce( $_POST['techie_noncename'], basename( __FILE__ ) ) )
        return;

    if ( 'post' == $_POST['post_type'] )
    {
        if ( !current_user_can( 'edit_page', $post_id ) )
            return;
    }
    else
    {
        if ( !current_user_can( 'edit_post', $post_id ) )
            return;
    }

    $techie_data = !is_null($_POST['techie_field'])?$_POST['techie_field']:0;

    update_post_meta($post_id, 'techie_field', $techie_data);
}