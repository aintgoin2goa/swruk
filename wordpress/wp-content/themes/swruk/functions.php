<?php
add_filter('xmlrpc_enabled', '__return_false');



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
    $env_host = getenv('SWRUK_STATIC_HOST');
    $prod_host = '//static.swruk.org';
	$host = $env_host ? $env_host : $prod_host;
	echo "{$host}/{$file}?v=" . STATIC_ASSET_VERSION;
}

function swruk_action_url($action){
	echo "/wp-content/themes/swruk/actions/{$action}.php";
}

add_action( 'init', 'remove_editor_init' );
add_action( 'widgets_init', 'init_widget' );

function galleria($atts){
    $output =  '<div class="galleria">';
    foreach(explode(',', $atts['ids']) as $id){
        $output .= '<a href="' . wp_get_attachment_url($id) . '">';
        $output .= '<img src="' . wp_get_attachment_thumb_url($id) .'" />';
        $output .= '</a>';
    }
    $output .= '</div>';

    return $output;
}

function my_gallery_shortcode( $output = '', $atts, $instance ) {
	$return = $output; // fallback

	// retrieve content of your own gallery function
	$my_result = galleria( $atts );

	// boolean false = empty, see http://php.net/empty
	if( !empty( $my_result ) ) {
		$return = $my_result;
	}

	return $return;
}

add_filter( 'post_gallery', 'my_gallery_shortcode', 10, 3 );

?>