<?php
/**
* Churchy functions and definitions
*
* Sets up the theme and provides some helper functions. Some helper functions
* are used in the theme as custom template tags. Others are attached to action and
* filter hooks in WordPress to change core functionality.
*
* The first function, churchy_setup(), sets up the theme by registering support
* for various features in WordPress, such as a custom background and a navigation menu.
*
* When using a child theme (see http://codex.wordpress.org/Theme_Development and
* http://codex.wordpress.org/Child_Themes), you can override certain functions
* (those wrapped in a function_exists() call) by defining them first in your child theme's
* functions.php file. The child theme's functions.php file is included before the parent
* theme's file, so the child theme functions would be used.
*
* Functions that are not pluggable (not wrapped in function_exists()) are instead attached
* to a filter or action hook.
*
* For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
*
* @package Churchy
*/

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function churchy_setup() {
	$churchy = wp_get_theme();

	//* Child theme (do not remove)
	define( 'CHILD_THEME_NAME', 'Churchy' );
	define( 'CHILD_THEME_URL', 'https://upthemes.com/themes/churchy/' );
	define( 'CHILD_THEME_VERSION', $churchy->get( 'Version' ) );

	//* Remove our default theme options page and just use the Theme Customizer instead
	//define( 'UPFW_NO_THEME_OPTIONS_PAGE', true );

	//* Add HTML5 markup structure
	add_theme_support( 'html5' );

	//* Add viewport meta tag for mobile browsers
	add_theme_support( 'genesis-responsive-viewport' );

	//* Add support for custom background
	add_theme_support( 'custom-background' );

	//* Add support for 3-column footer widgets
	add_theme_support( 'genesis-footer-widgets', 3 );

	//* Enqueue the scripts and styles for Churchy.
	add_action( 'wp_enqueue_scripts', 'churchy_enqueue_scripts' );

	//* Include required files for Churchy.
	churchy_includes();
}
add_action( 'genesis_setup', 'churchy_setup', 15 );

/**
* Sets up Church Theme Framework
*/
function churchy_includes(){
	require_once( get_stylesheet_directory() . '/framework/framework.php' );
}