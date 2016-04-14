<?php

add_action( 'init', 'remove_editor_init' );

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
       if (  'about.php' === $template_file || 'contact.php' === $template_file ) {
           remove_post_type_support( 'page', 'editor' );
           // Other features can also be removed in addition to the editor. See: https://codex.wordpress.org/Function_Reference/remove_post_type_support.
       }
    }
}

?>
