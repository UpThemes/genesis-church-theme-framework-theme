<?php
/**
 * WordPress Feature Support
 *
 * @package    Uplifted
 * @subpackage Includes
 * @copyright  Copyright (c) 2014, upthemes.com
 * @link       http://upthemes.com/themes/churchy
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @since      1.0
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Add theme support for WordPress features
 *
 * @since 1.0
 */
function churchy_add_theme_support_wp() {

	add_theme_support( 'nav-menus' );

	load_theme_textdomain( 'churchy', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	// Add support for a variety of post formats
	add_theme_support( 'post-formats', array( 'video', 'aside', 'link', 'gallery', 'status', 'quote', 'image' ) );

	//add_editor_style( array( get_template_directory_uri() . '/editor-style.css', churchy_fonts_url() ) );

	// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	add_theme_support( 'post-thumbnails' );

}

add_action( 'after_setup_theme', 'churchy_add_theme_support_wp' );