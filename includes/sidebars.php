<?php
/**
 * Sidebar Functions
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

/**********************************
 * REGISTER SIDEBARS
 **********************************/

/**
 * Register sidebars
 *
 * Also see churchy_sidebar_restrictions() below to restrict which widgets a sidebar allows.
 * Using ctcom- prefix common to all churchthemes.com themes to assist with theme switching.
 *
 * @since 1.0
 */
function churchy_register_sidebars() {

	// Home Slider
	register_sidebar( array(
		'id'			=> 'ctcom-home-slider',
		'name'			=> _x( 'Homepage Slider', 'widget area', 'churchy' ),
		'description' 	=> __( 'Add CT Slide widgets to show in the homepage slider.', 'churchy' ),
		'before_widget'	=> '',
		'after_widget'	=> '',
		'before_title' 	=> '',
		'after_title' 	=> '',
	) );

	// Home Highlights
	register_sidebar( array(
		'id'			=> 'ctcom-home-highlights',
		'name'			=> _x( 'Homepage Highlights', 'widget area', 'churchy' ),
		'description' 	=> __( 'Add CT Highlight widgets to show on the homepage by the slider (two can be shown).', 'churchy' ),
		'before_widget'	=> '',
		'after_widget'	=> '',
		'before_title' 	=> '',
		'after_title' 	=> '',
	) );

	// Home Bottom
	register_sidebar( array(
		'id'			=> 'ctcom-home-bottom',
		'name'			=> _x( 'Homepage Bottom', 'widget area', 'churchy' ),
		'description' 	=> __( 'These show at the bottom of the homepage.', 'churchy' ),
		'before_widget'	=> '<div class="large-4 column"><section id="%1$s" class="churchy-widget churchy-home-widget %2$s">',
		'after_widget'	=> '</section></div>',
		'before_title' 	=> '<h4 class="widget-title widgettitle">',
		'after_title' 	=> '</h4>',
	) );

	// Page Sidebar
	register_sidebar( array(
		'id'			=> 'ctcom-page', // correspond to content type in includes/content.php
		'name'			=> __( 'Page Sidebar', 'churchy' ),
		'description' 	=> sprintf(
								__( 'These widgets show on the side of pages using the default template.', 'churchy' ),
								'http://wordpress.org/extend/plugins/simple-page-sidebars'
							),
		'before_widget'	=> '<section id="%1$s" class="widget churchy-widget churchy-sidebar-widget %2$s">',
		'after_widget'	=> '</section>',
		'before_title' 	=> '<h4 class="widget-title widgettitle">',
		'after_title' 	=> '</h4>',
	) );

	// Sermons
	register_sidebar( array(
		'id'			=> 'ctcom-sermon', // correspond to content type in includes/content.php
		'name'			=> __( 'Sermons Sidebar', 'churchy' ),
		'description' 	=> __( 'These widgets show on the side of sermon pages.', 'churchy' ),
		'before_widget'	=> '<section id="%1$s" class="widget churchy-widget churchy-sidebar-widget %2$s">',
		'after_widget'	=> '</section>',
		'before_title' 	=> '<h4 class="widget-title widgettitle">',
		'after_title' 	=> '</h4>',
	) );

	// Events
	register_sidebar( array(
		'id'			=> 'ctcom-event', // correspond to content type in includes/content.php
		'name'			=> __( 'Events Sidebar', 'churchy' ),
		'description' 	=> __( 'These widgets show on the side of event pages.', 'churchy' ),
		'before_widget'	=> '<section id="%1$s" class="widget churchy-widget churchy-sidebar-widget %2$s">',
		'after_widget'	=> '</section>',
		'before_title' 	=> '<h4 class="widget-title widgettitle">',
		'after_title' 	=> '</h4>',
	) );

	// People
	register_sidebar( array(
		'id'			=> 'ctcom-people', // correspond to content type in includes/content.php
		'name'			=> __( 'People Sidebar', 'churchy' ),
		'description' 	=> __( 'These widgets show on the side of people pages.', 'churchy' ),
		'before_widget'	=> '<section id="%1$s" class="widget churchy-widget churchy-sidebar-widget %2$s">',
		'after_widget'	=> '</section>',
		'before_title' 	=> '<h4 class="widget-title widgettitle">',
		'after_title' 	=> '</h4>',
	) );

	// Locations
	register_sidebar( array(
		'id'			=> 'ctcom-location', // correspond to content type in includes/content.php
		'name'			=> __( 'Locations Sidebar', 'churchy' ),
		'description' 	=> __( 'These widgets show on the side of locations content.', 'churchy' ),
		'before_widget'	=> '<section id="%1$s" class="widget churchy-widget churchy-sidebar-widget %2$s">',
		'after_widget'	=> '</section>',
		'before_title' 	=> '<h4 class="widget-title widgettitle">',
		'after_title' 	=> '</h4>',
	) );

	// Gallery
	register_sidebar( array(
		'id'			=> 'ctcom-gallery', // correspond to content type in includes/content.php
		'name'			=> __( 'Gallery Sidebar', 'churchy' ),
		'description' 	=> __( 'These widgets show on the side of gallery pages.', 'churchy' ),
		'before_widget'	=> '<section id="%1$s" class="widget churchy-widget churchy-sidebar-widget %2$s">',
		'after_widget'	=> '</section>',
		'before_title' 	=> '<h4 class="widget-title widgettitle">',
		'after_title' 	=> '</h4>',
	) );

	// Blog
	register_sidebar( array(
		'id'			=> 'ctcom-blog', // correspond to content type in includes/content.php
		'name'			=> __( 'Blog Sidebar', 'churchy' ),
		'description' 	=> __( 'These widgets show on the side of blog content.', 'churchy' ),
		'before_widget'	=> '<section id="%1$s" class="widget churchy-widget churchy-sidebar-widget %2$s">',
		'after_widget'	=> '</section>',
		'before_title' 	=> '<h4 class="widget-title widgettitle">',
		'after_title' 	=> '</h4>',
	) );

	// Contact
	register_sidebar( array(
		'id'			=> 'ctcom-contact', // correspond to content type in includes/content.php
		'name'			=> __( 'Contact Sidebar', 'churchy' ),
		'description' 	=> __( 'These widgets show on the side of the contact page.', 'churchy' ),
		'before_widget'	=> '<section id="%1$s" class="widget churchy-widget churchy-sidebar-widget %2$s">',
		'after_widget'	=> '</section>',
		'before_title' 	=> '<h4 class="widget-title widgettitle">',
		'after_title' 	=> '</h4>',
	) );

	// Search
	register_sidebar( array(
		'id'			=> 'ctcom-search', // correspond to content type in includes/content.php
		'name'			=> __( 'Search Sidebar', 'churchy' ),
		'description' 	=> __( 'These widgets show on the side of search results.', 'churchy' ),
		'before_widget'	=> '<section id="%1$s" class="widget churchy-widget churchy-sidebar-widget %2$s">',
		'after_widget'	=> '</section>',
		'before_title' 	=> '<h4 class="widget-title widgettitle">',
		'after_title' 	=> '</h4>',
	) );

}

add_action( 'widgets_init', 'churchy_register_sidebars' );

/**********************************
 * RESTRICT SIDEBARS/WIDGETS
 **********************************/

/**
 * Sidebar widget restrictions
 *
 * Restrictions based on which widgets a sidebar allows or disallows.
 * A limit can be set for the number of widgets a sidebar will show.
 * The framework receives this data via the churchy_sidebar_widget_restrictions filter.
 *
 * Also see the converse (Widget sidebar restrictions) - both are necessary in consideration
 * of widgets and sidebars added by plugins or child theming
 *
 * Must use add_theme_support( 'ctfw_sidebar_widget_restrictions' ).
 *
 * @since 1.0
 * @param array $restrictions
 * @return array Restrictions configuration
 */
function churchy_sidebar_widget_restrictions( $restrictions ) {

	$restrictions = array(

		// Home Slider
		'ctcom-home-slider' => array(
			'include_widgets' 	=> array( 'ctfw-slide' ), // allow only these widgets (empty to allow all)
			'exclude_widgets' 	=> array(), // never allow these widgets
			'limit' 			=> false, // do not show more than this on front-end
		),

		// Home Highlights
		'ctcom-home-highlights' => array(
			'include_widgets' 	=> array( 'ctfw-highlight' ), // allow only these widgets (empty to allow all)
			'exclude_widgets' 	=> array(), // never allow these widgets
			'limit' 			=> 2, // do not show more than this on front-end
		),

		// Home Bottom
		'ctcom-home-bottom' => array(
			'include_widgets' 	=> array(), // allow only these widgets (empty to allow all)
			'exclude_widgets' 	=> array( 'ctfw-slide' ), // never allow these widgets
			'limit' 			=> false, // do not show more than this on front-end
		),

		// Page Sidebar
		'ctcom-page' => array(
			'include_widgets' 	=> array(), // allow only these widgets (empty to allow all)
			'exclude_widgets' 	=> array( 'ctfw-slide' ), // never allow these widgets
			'limit' 			=> false, // do not show more than this on front-end
		),

		// Sermons
		'ctcom-sermon' => array(
			'include_widgets' 	=> array(), // allow only these widgets (empty to allow all)
			'exclude_widgets' 	=> array( 'ctfw-slide' ), // never allow these widgets
			'limit' 			=> false, // do not show more than this on front-end
		),

		// Events
		'ctcom-events' => array(
			'include_widgets' 	=> array(), // allow only these widgets (empty to allow all)
			'exclude_widgets' 	=> array( 'ctfw-slide' ), // never allow these widgets
			'limit' 			=> false, // do not show more than this on front-end
		),

		// People
		'ctcom-people' => array(
			'include_widgets' 	=> array(), // allow only these widgets (empty to allow all)
			'exclude_widgets' 	=> array( 'ctfw-slide' ), // never allow these widgets
			'limit' 			=> false, // do not show more than this on front-end
		),

		// Locations
		'ctcom-locations' => array(
			'include_widgets' 	=> array(), // allow only these widgets (empty to allow all)
			'exclude_widgets' 	=> array( 'ctfw-slide' ), // never allow these widgets
			'limit' 			=> false, // do not show more than this on front-end
		),

		// Gallery
		'ctcom-gallery' => array(
			'include_widgets' 	=> array(), // allow only these widgets (empty to allow all)
			'exclude_widgets' 	=> array( 'ctfw-slide' ), // never allow these widgets
			'limit' 			=> false, // do not show more than this on front-end
		),

		// Blog
		'ctcom-blog' => array(
			'include_widgets' 	=> array(), // allow only these widgets (empty to allow all)
			'exclude_widgets' 	=> array( 'ctfw-slide' ), // never allow these widgets
			'limit' 			=> false, // do not show more than this on front-end
		),

		// Contact
		'ctcom-contact' => array(
			'include_widgets' 	=> array(), // allow only these widgets (empty to allow all)
			'exclude_widgets' 	=> array( 'ctfw-slide' ), // never allow these widgets
			'limit' 			=> false, // do not show more than this on front-end
		),

		// Search
		'ctcom-search' => array(
			'include_widgets' 	=> array(), // allow only these widgets (empty to allow all)
			'exclude_widgets' 	=> array( 'ctfw-slide' ), // never allow these widgets
			'limit' 			=> false, // do not show more than this on front-end
		),

	);

	return $restrictions;

}

add_filter( 'ctfw_sidebar_widget_restrictions', 'churchy_sidebar_widget_restrictions' );

/**
 * Widget sidebar restrictions
 *
 * Restrictions based on which sidebars a widget allows or disallows itself to be used in.
 * The framework receives this data via the churchy_widget_sidebar_restrictions filter.
 *
 * Also see the converse (Sidebar widget restrictions) - both are necessary in consideration
 * of widgets and sidebars added by plugins or child theming.
 *
 * @since 1.0
 * @param array $restrictions
 * @return array Restrictions configuration
 */
function churchy_widget_sidebar_restrictions( $restrictions ) {

	$restrictions = array(

		// Categories Widget
		'ctfw-categories' => array(
			'include_sidebars' => array(), // allow in only these sidebars (empty to allow in all)
			'exclude_sidebars' => array( 'ctcom-home-slider', 'ctcom-home-highlights' ), // never allow in these sidebars
		),

		// Posts Widget
		'ctfw-posts' => array(
			'include_sidebars' => array(), // allow in only these sidebars (empty to allow in all)
			'exclude_sidebars' => array( 'ctcom-home-slider', 'ctcom-home-highlights' ), // never allow in these sidebars
		),

		// Sermons Widget
		'ctfw-sermons' => array(
			'include_sidebars' => array(), // allow in only these sidebars (empty to allow in all)
			'exclude_sidebars' => array( 'ctcom-home-slider', 'ctcom-home-highlights' ), // never allow in these sidebars
		),

		// Events Widget
		'ctfw-events' => array(
			'include_sidebars' => array(), // allow in only these sidebars (empty to allow in all)
			'exclude_sidebars' => array( 'ctcom-home-slider', 'ctcom-home-highlights' ), // never allow in these sidebars
		),

		// Gallery Widget
		'ctfw-gallery' => array(
			'include_sidebars' => array(), // allow in only these sidebars (empty to allow in all)
			'exclude_sidebars' => array( 'ctcom-home-slider', 'ctcom-home-highlights' ), // never allow in these sidebars
		),

		// People Widget
		'ctfw-people' => array(
			'include_sidebars' => array(), // allow in only these sidebars (empty to allow in all)
			'exclude_sidebars' => array( 'ctcom-home-slider', 'ctcom-home-highlights' ), // never allow in these sidebars
		),

		// Locations Widget
		'ctfw-locations' => array(
			'include_sidebars' => array(), // allow in only these sidebars (empty to allow in all)
			'exclude_sidebars' => array( 'ctcom-home-slider', 'ctcom-home-highlights' ), // never allow in these sidebars
		),

		// Archives Widget
		'ctfw-archives' => array(
			'include_sidebars' => array(), // allow in only these sidebars (empty to allow in all)
			'exclude_sidebars' => array( 'ctcom-home-slider', 'ctcom-home-highlights' ), // never allow in these sidebars
		),

		// Giving Widget
		'ctfw-giving' => array(
			'include_sidebars' => array(), // allow in only these sidebars (empty to allow in all)
			'exclude_sidebars' => array( 'ctcom-home-slider', 'ctcom-home-highlights' ), // never allow in these sidebars
		),

		// Slide Widget
		'ctfw-slide' => array(
			'include_sidebars' => array( 'ctcom-home-slider' ), // allow in only these sidebars (empty to allow in all)
			'exclude_sidebars' => array(), // never allow in these sidebars
		),

		// Highlight Widget
		'ctfw-highlight' => array(
			'include_sidebars' => array(), // allow in only these sidebars (empty to allow in all)
			'exclude_sidebars' => array( 'ctcom-home-slider' ), // never allow in these sidebars
		),

	);

	return $restrictions;

}

add_filter( 'ctfw_widget_sidebar_restrictions', 'churchy_widget_sidebar_restrictions' );

/**********************************
 * SHOWING SIDEBARS
 **********************************/

/**
 * Get ID of sidebar to be shown
 *
 * @since 1.0
 * @return string Sidebar ID
 */
function churchy_sidebar_id() {

	// Based on current content type (sermon, event, etc.)
	$id = 'ctcom-' . ctfw_current_content_type();

	return apply_filters( 'churchy_sidebar_id', $id );

}

/**
 * Check if sidebar is enabled
 *
 * True if current content type has sidebar with widgets and post/page "Hide Sidebar" not set.
 * Use this before showing sidebar and to make layout adjustments to accommodate sidebar.
 *
 * @since 1.0
 * @global object Post object
 * @return bool Whether or not sidebar is enabled
 */
function churchy_sidebar_enabled() {

	global $post;

	$enabled = false;

	// Sidebar exists and has widgets
	if ( is_active_sidebar( churchy_sidebar_id() ) ) {

		$enabled = true;

		// Attachment
		if ( is_attachment() ) {

			// Get parent post's ID to inherit its "Hide Sidebar" option
			if ( ! empty( $post->post_parent ) ) {
				$post_id = $post->post_parent;
			}

		}

		// Single post or page
		elseif ( is_singular() ) {
			$post_id = $post->ID; // simply check its own setting
		}

		// Non singular content (archives, taxonomies, etc.)
		else {

			// Inherit "Hide Sidebar" from newest page using page template specific to current content type
			$post_id = ctfw_get_page_id_by_template( ctfw_current_content_type_data( 'page_templates' ) );

		}

		// Disable sidebar based on a post's "Hide Sidebar" option
		if ( ! empty( $post_id ) ) {

			$hide_sidebar = get_post_meta( $post_id, '_ctcom_hide_sidebar', true );

			if ( ! empty( $hide_sidebar ) ) {
				$enabled = false;
			}

		}

	}

	return apply_filters( 'churchy_sidebar_enabled', $enabled );

}
