<?php

 ini_set( 'upload_max_size' , '8M' );
 ini_set( 'post_max_size', '8M');
 ini_set( 'max_execution_time', '300' );

include 'static_asset_version.php';

if(getenv('WP_ENV' !== 'production')){
	update_option( 'siteurl', 'http://swruk.local' );
    update_option( 'home', 'http://swruk.local' );
}


function remove_editor_init() {
    // If not in the admin, return.
    if ( ! is_admin() ) {
       return;
    }

    // Get the post ID on edit post with filter_input super global inspection.
    $current_post_id = filter_input( INPUT_GET, 'post', FILTER_SANITIZE_NUMBER_INT );
    // Get the post ID on update post with filter_input super global inspection.
    $update_post_id = filter_input( INPUT_POST, 'post_ID', FILTER_SANITIZE_NUMBER_INT );

    // Check to see if the post ID is set, else return.
    if ( isset( $current_post_id ) ) {
       $post_id = absint( $current_post_id );
    } else if ( isset( $update_post_id ) ) {
       $post_id = absint( $update_post_id );
    } else {
       return;
    }

    // Don't do anything unless there is a post_id.
    if ( isset( $post_id ) ) {
       // Get the template of the current post.
       $template_file = get_post_meta( $post_id, '_wp_page_template', true );


       // Example of removing page editor for page-your-template.php template.
       if (  'about.php' === $template_file ||
       		 'contact.php' === $template_file ||
             'write.php' === $template_file ||
             'event.php' === $template_file
       ) {
           remove_post_type_support( 'page', 'editor' );
           // Other features can also be removed in addition to the editor. See: https://codex.wordpress.org/Function_Reference/remove_post_type_support.
       }
    }
}

function init_widget(){
	register_sidebar( array(
    		'name'          => 'Write To Them Widget',
    		'id'            => 'write_to_them',
    		'before_widget' => '<div>',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>',
    	) );
}

function swruk_asset_file($file){
	if(getenv('WP_ENV') === 'localdev'){
		$host = 'http://swrukstatic.local';
	}else{
		$host = 'http://static.swruk.org';
	}

	echo "{$host}/{$file}?v=" . STATIC_ASSET_VERSION;
}

function swruk_action_url($action){
	echo "/wp-content/themes/swruk/actions/{$action}.php";
}

add_filter( 'fu_is_debug', '__return_true' );
add_action( 'init', 'remove_editor_init' );
add_action( 'widgets_init', 'init_widget' );

?>

