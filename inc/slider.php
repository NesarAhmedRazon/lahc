<?php
add_action( 'init', 'ritslider' );
/**
 * Register a iuidp2 post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function ritslider() {
	$labels = array(
		'name'               => _x( 'Slide', 'post type general name' ),
		'singular_name'      => _x( 'Slide', 'post type singular name' ),
		'menu_name'          => _x( 'Slide', 'admin menu' ),
		'name_admin_bar'     => _x( 'Slide', 'add new on admin bar' ),
		'add_new'            => _x( 'Add New', 'rslide' ),
		'add_new_item'       => __( 'Add New Slide' ),
		'new_item'           => __( 'New Slide' ),
		'edit_item'          => __( 'Edit Slide' ),
		'view_item'          => __( 'View Slide' ),
		'all_items'          => __( 'All Slide' ),
		'search_items'       => __( 'Search Slide' ),
		'parent_item_colon'  => __( 'Parent Slide:' ),
		'not_found'          => __( 'No Slide found.' ),
		'not_found_in_trash' => __( 'No Slide found in Trash.' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'rslide' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'menu_icon'   => 'dashicons-format-gallery',
		'supports'           => array( 'title','thumbnail' )
	);

	register_post_type( 'rslide', $args );
}
 
 
 if ( !function_exists('AddThumbColumn') && function_exists('add_theme_support') ) {
 
    // for post and page
    add_theme_support('post-thumbnails', array( 'rslide') );
 
    function AddThumbColumn($cols) {
        $cols['thumbnail'] = __('Slide');
        return $cols;
    }
 
    function AddThumbValue($column_name, $post_id) {
 
            $width = (int) 120;
            $height = (int) 120;
 
            if ( 'thumbnail' == $column_name ) {
                // thumbnail of WP 2.9
                $thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
                // image from gallery
                $attachments = get_children( array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' => 'image') );
                if ($thumbnail_id)
                    $thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
                elseif ($attachments) {
                    foreach ( $attachments as $attachment_id => $attachment ) {
                        $thumb = wp_get_attachment_image( $attachment_id, array($width, $height), true );
                    }
                }
                    if ( isset($thumb) && $thumb ) {
                        echo $thumb;
                    } else {
                        echo __('None');
                    }
            }
    }
 
    // for posts
    add_filter( 'manage_posts_columns', 'AddThumbColumn' );
    add_action( 'manage_posts_custom_column', 'AddThumbValue', 3, 2 );

   }
 


