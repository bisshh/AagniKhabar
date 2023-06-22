<?php
/*
 * Register Custom Advertisement post type
 */
 add_action('init', 'advertisement_post');
 
 function advertisement_post() {
	 register_post_type('advertisement',
	 	array(
			'labels' => array(
				'name' => 'Advertisements',
				'singular_name' => 'Advertisement',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Advertisement',
				'edit' => 'Edit',
				'edit_item' => 'Edit Advertisement',
				'new_item' => 'New Advertisement',
				'view' => 'View',
				'view_item' => 'View Advertisement',
				'search_items' => 'Search Advertisement',
				'not_found' => 'No Advertisements Found',
				'not_found_in_trash' => 'No Advertisement found in Trash',
				'parent' => 'Parent Advertisement'
			),
			
			'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'thumbnail' ),
			'has_archive'   => true,
			'show_ui' => true,
			'_builtin' => false,
            'taxonomies' => array( '' ),
            'has_archive' => true
		)
	 );
 }
 
 function advertisement_updated_messages( $messages ) {
	global $post, $post_ID;
	$messages['advertisement'] = array(
		0 => '', 
		1 => sprintf( __('Advertisement updated. <a href="%s">View advertisement</a>'), esc_url( get_permalink($post_ID) ) ),
		2 => __('Advertisement field updated.'),
		3 => __('Advertisement field deleted.'),
		4 => __('Advertisement updated.'),
		5 => isset($_GET['revision']) ? sprintf( __('Advertisement restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Advertisement published. <a href="%s">View advertisement</a>'), esc_url( get_permalink($post_ID) ) ),
		7 => __('Advertisement saved.'),
		8 => sprintf( __('Advertisement submitted. <a target="_blank" href="%s">Preview advertisement</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		9 => sprintf( __('Advertisement scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview advertisement</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
		10 => sprintf( __('Advertisement draft updated. <a target="_blank" href="%s">Preview advertisement</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);
	return $messages;
}
add_filter( 'post_updated_messages', 'advertisement_updated_messages' );


/**
 * Adds a meta box to the Directory editing screen for Company details
 */
function custom_link_meta() {
    add_meta_box( 'link_meta', 'Custom Link', 'link_meta_callback', 'advertisement' );
} // end custom_link_meta()
add_action( 'add_meta_boxes', 'custom_link_meta' );

/**
 * Outputs the content of the metabox
 */
function link_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'link_nonce' );
    $link_stored_meta = get_post_meta( $post->ID );
    ?>
 
        <p>
            <label for="meta-text" class="example-row-title">Custom  Link:</label>
            <input style="width:90%; height:35px;" placeholder="http://www.example.com" type="text" name="link" id="link" value="<?php echo $link_stored_meta['link'][0]; ?>" />
        </p>
 
    <?php
} // end example_meta_callback()

/**
 * Saves the custom meta input
 */
function link_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'link_nonce' ] ) && wp_verify_nonce( $_POST[ 'link_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'link' ] ) ) {
        update_post_meta( $post_id, 'link', sanitize_text_field( $_POST[ 'link' ] ) );
    }
 
} // end example_meta_save()
add_action( 'save_post', 'link_meta_save' );

/**
 * Create Category for Advertisement
 */
function sabaiko_online_taxonomies_advertisement() {
    $labels = array(
        'name'              => _x( 'Advertisement Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Advertisement Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Advertisement Categories', 'sabaiko_online'),
        'all_items'         => __( 'Advertisement Categories','sabaiko_online'),
        'parent_item'       => __( 'Parent Advertisement Category', 'sabaiko_online'),
        'parent_item_colon' => __( 'Parent Advertisement Category:' ,'sabaiko_online'),
        'edit_item'         => __( 'Edit Advertisement Category', 'sabaiko_online'), 
        'update_item'       => __( 'Update Advertisement Category', 'sabaiko_online'),
        'add_new_item'      => __( 'Add New Advertisement Category', 'sabaiko_online'),
        'new_item_name'     => __( 'New Advertisement Category', 'sabaiko_online'),
        'menu_name'         => __( 'Advertisement Categories', 'sabaiko_online'),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
		'show_ui' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'advertisement-category'),
    );
    register_taxonomy( 'advertisement-category', 'advertisement', $args );
}
add_action( 'init', 'sabaiko_online_taxonomies_advertisement', 0 );

/*
 * reture Advertise Image
 */
function advertisement_img(){
 $logo= get_the_post_thumbnail($post->ID);
	if($logo !="") {
		return $logo; 
	}
}
/*
 * reture Advertise Image
 */
function advertisement_link(){
 $custom = get_post_custom($post->ID);
    $link= $custom["link"][0];
    if($link !=""){
        return($link);
    }
}
?>