<?php
session_start();
/*
 * @package WordPress
 * @subpackage Base_Theme
 */

$content_width = 586;				// Defines maximum width of images in posts
add_editor_style();					// Allows editor-style.css to configure editor visual style.

require_once (dirname (__FILE__) . '/_theme-options.php');

$westcott_theme_options = get_option("westcott_theme_options");

add_action('after_setup_theme', 'westcott_setup');
function westcott_setup() {
	global $westcott_theme_options;
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );	
}

register_sidebar( array(
	'name' => 'Left Sidebar Home',
	'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );

register_sidebar( array(
	'name' => 'Left Sidebar Page',
	'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );

register_sidebar( array(
	'name' => 'Left Sidebar Products',
	'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="page-name">',
	'after_title' => '</h3>',
) );

register_sidebar( array(
	'name' => 'Right Sidebar',
	'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
) );

function westcott_auto_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'westcott_auto_excerpt_more' );

function show_posted_in() {
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
	} else {
		$posted_in = 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
	}
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}

function short_content($content,$sz = 500,$more = '...') {
	if (strlen($content)<$sz) return $content;
	$p = strpos($content, " ",$sz);
    if (!$p) return $content;
        $content = strip_tags($content);
        if (strlen($content)<$sz) return $content;
        $p = strpos($content, " ",$sz);
        if (!$p) return $content;
	return substr($content, 0, $p).$more;
}

function get_page_id($title) {
  $page_params = get_page_by_title($title);
  if ($page_params) {
	return $page_params->ID;
  }
  return '';
}

function get_thumb($iurl, $iw = '', $ih = '', $zc = '') {
  $thumb = '';
  if (is_numeric($iurl)) { $iurl = get_attach_url($iurl); }
  if (strlen($iurl)) {
    $thumb = get_bloginfo('template_url').'/tt.php?src='.$iurl;
    if (strlen($iw)) { $thumb .= '&w='.$iw; }
    if (strlen($ih)) { $thumb .= '&h='.$ih; }
    if (strlen($zc)) { $thumb .= '&zc='.$zc; }
  }
  return $thumb;
}

function get_attach_url($aid) {
  global $wpdb;
  return $wpdb->get_var("select guid from ".$wpdb->prefix."posts where ID = '".$aid."'");
}
