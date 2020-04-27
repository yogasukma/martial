<?php

add_theme_support( 'post-thumbnails' );

register_nav_menus(
    array(
        'homepage-menu' => __( 'Home page Menu' ),
        'sidebar-menu' => __( 'Sidebar Menu' )
    )
);

add_filter('the_generator', 'martial_remove_wp_version');
add_filter( 'script_loader_src', 'martial_remove_cache_parameter', 15, 1 ); 
add_filter( 'style_loader_src', 'martial_remove_cache_parameter', 15, 1 );
add_filter( 'excerpt_more', 'martial_excerpt_link' );
add_filter( 'get_the_archive_title', 'martial_custom_archive_title');
add_filter('comment_form_default_fields', 'remove_website_url_on_comment');

add_action( 'after_setup_theme', 'title_tag' );
add_action( 'wp_enqueue_scripts', 'loading_css' );

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'rest_output_link_wp_head' );
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('template_redirect', 'rest_output_link_header', 11, 0);
remove_action ( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );

function martial_remove_cache_parameter( $src ) { 
	$parts = explode( '?', $src ); 
	return $parts[0]; 
} 

function martial_remove_wp_version() {
	return '';
}

function loading_css() {
    wp_enqueue_style( 'martial-stylesheet', get_stylesheet_uri() );
}

function martial_excerpt_link( $more ) {
    if ( ! is_single() ) {
        $more = sprintf( ' <a class="read-more" href="%1$s">%2$s</a>',
            get_permalink( get_the_ID() ),
            __( '&rarr;', 'martial' )
        );
    }
 
    return $more;
}

function title_tag() {
    add_theme_support( 'title-tag' );
 }

function martial_custom_archive_title ($title) {    
    if ( is_category() ) {    
            $title = single_cat_title( '', false );    
        } elseif ( is_tag() ) {    
            $title = single_tag_title( '', false );    
        } elseif ( is_author() ) {    
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;    
        } elseif ( is_tax() ) { //for custom post types
            $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
        } elseif (is_post_type_archive()) {
            $title = post_type_archive_title( '', false );
        }
    return $title;    
}

function remove_website_url_on_comment($fields)
{
    if(isset($fields['url'])) {
        unset($fields['url']);
        
        return $fields;
    }
}