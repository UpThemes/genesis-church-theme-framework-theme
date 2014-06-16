<?php
/**
 * Church Theme Framework Feature Support
 *
 * The framework's features and widgets must be enabled and configured explicitly.
 *
 * Child Themes: Use get_theme_support() to get arguments, modify them, then call
 * add_theme_support(): http://codex.wordpress.org/Function_Reference/get_theme_support
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
 * Add theme support for framework features
 *
 * @since 1.0
 */
function churchy_add_theme_support_framework() {

	/**
	 * Setup
	 */

	// Require minimum version of WordPress
	// An admin notice is shown if old version is used
	add_theme_support( 'ctfw-wordpress-version', '3.6' );

	// Theme activation tasks
	add_theme_support( 'ctfw-after-activation', array(
		'flush_rewrite_rules'	=> true, // make sure friendly URL's work
		'notice'				=> sprintf( __( '<b>Next Steps:</b> Please continue reading the <a href="%s" target="_blank">Getting Started</a> guide for the next steps after theme activation.', 'churchy' ), 'http://churchthemes.com/guides/user/getting-started/' ),
		'hide_default_notice'	=> true // no need to be redundant
	) );

	// Load language file from wp-content/languages/themes/textdomain-locale.mo
	// It is absolutely best to keep it outside of theme to prevent loss during update
	add_theme_support( 'ctfw-load-translation' );

	/**
	 * Design
	 */

	// Prompt outdated Internet Explorer users to upgrade to a modern browser
	add_theme_support( 'ctfw-ie-unsupported', 7 ); // version 7 and earlier

	// Automatically form <title>
	add_theme_support( 'ctfw-auto-title' );

	// Enable non-content shortcodes
	// Handy for Customizer: [ctcom_site_name], [ctcom_rss_url], [ctcom_current_year]
 	add_theme_support( 'ctfw-non-content-shortcodes' );

	/**
	 * Posts
	 */

	// Add additional classes to post_class()
	// This will add useful classes like ctfw-has-image
	add_theme_support( 'ctfw-post-classes' );

	// Shorten comment author to keep long trackback titles in check
	add_theme_support( 'ctfw-shorten-comment-author', 50 );

	// Redirect post type archives to pages using specific page templates
	// Page templates must be specified with ctfw_content_types filter. See churchy_update_content_types().
	add_theme_support( 'ctfw-archive-redirection' );

	// Enable date archives for sermon posts
	// Flush rewrite rules (re-save permalinks) to take effect
	add_theme_support( 'ctfw-sermon-date-archive' );

	// Make group taxonomy archive order manually (like People template)
	add_theme_support( 'ctfw-people-group-manual-order' );

	// Prev/Next Event Sorting
	// This makes get_previous_post() and get_next_post() sort by event Start Date instead of Publish Date
	add_theme_support( 'ctfw-event-navigation' );

	// Prev/Next Person Sorting
	// This makes get_previous_post() and get_next_post() sort by manual order instead of Publish Date
	add_theme_support( 'ctfw-person-navigation' );

	// Prev/Next Location Sorting
	// This makes get_previous_post() and get_next_post() sort by manual order instead of Publish Date
	add_theme_support( 'ctfw-location-navigation' );

	/**
	 * Media
	 */

	// Show size notes under "Featured Image" for specific post types
	// Provide third argument to override the default message: 'The target image size is %s.'
	// Provide each item as array( 'size', 'message' ) instead of 'size' for post type-specific messages
	add_theme_support(
		'ctfw-featured-image-notes',
		array(
			'post'			=> 'post-thumbnail',
			'ctc_sermon'	=> 'post-thumbnail',
			'ctc_event'		=> 'post-thumbnail',
			'ctc_person'	=> 'post-thumbnail',
			'ctc_location'	=> 'post-thumbnail'
		),
		__( 'Optionally provide an image that is at least %s (it will be cropped/resized). An image exactly this size is ideal.', 'churchy' )
	);

	// Enable image upscaling (helpful for responsive themes)
	// Resized images will be made for all uploads, even if source is smaller than target
	add_theme_support( 'ctfw-image-upscaling' );

	// Use custom size for gallery thumbnails
	// This will be used when size attribute not specifically set on shortcode
	add_theme_support( 'ctfw-gallery-thumb-size', array(
		'3' => 'churchy-rect-large', 		// when 1 to 3 columns used
		'5' => 'churchy-rect-medium', 	// when 4 to 5 columns used
		'9' => 'churchy-rect-small',  	// when 6 to 9 columns used
	) );

	// Remove default gallery styles
	// It is better to do all styling in style.css and not rely on <style> that WordPress injects
	add_theme_support( 'ctfw-remove-gallery-styles' );

	// Automatically make video and audio embeds responsive
	// Uses FitVid.js and custom styles to assist WordPress core embeds, [video] and [audio]
	add_theme_support( 'ctfw-responsive-embeds' );

	// Generic embeds
	// This helps make embeds more generic by setting parameters to remove
	// related videos, set neutral colors, reduce branding, etc.
	add_theme_support( 'ctfw-generic-embeds' );

	// Force download of certain file types via ?download=path/filename.type
	// This prompts "Save As" -- handy for MP3, PDF, etc. Only works on local files.
	add_theme_support( 'ctfw-force-downloads' );

	/**
	 * Attachments
	 */

 	// Prevent WordPress from adding attachment image, link, etc. to the_content()
	// We show it manually using content-attachment.php
	add_theme_support( 'ctfw-remove-prepend-attachment' );

	// Attachment inherit discussion status
	// Inherit comment and ping statuses from parent post. If not attached to a post, discussion is disabled.
	add_theme_support( 'ctfw-attachment-inherit-discussion' );

	/**
	 * Admin
	 */

	// Remove and redirect Custom Background page to Customizer
	// Additional options are added for custom background there
	add_theme_support( 'ctfw-force-customizer-background' );

 	// Enable sidebar/widget restrictions
 	// Useful for keeping widgts in appropriate widget areas (e.g. Slide widgets)
 	// See includes/sidebars.php for configuration
 	add_theme_support( 'ctfw-sidebar-widget-restrictions' );

	// Show custom ordering tip under taxonomies list (very handy for People Groups)
	// Provide URL as second parameter to override the default recommended plugin
	add_theme_support( 'ctfw-taxonomy-order-note' );

	/**
	 * Import
	 */

	// Correct imported URL's in menu, content, widgets, etc.
	// Sample import files may have URLs from the dev site in menu, content, meta fields, etc.
	add_theme_support( 'ctfw-import-correct-urls', 'http://local.demos.upthemes.com/' . CTFW_THEME_SLUG );

	// Set homepage as static front page after import
	// If no static front and page using homepage template doesn't exist before import, set it
	// Page using blog template is set as Posts Page if nothing already set
	add_theme_support( 'ctfw-import-set-static-front', 'homepage.php' ); // homepage template

	// Set menu locations after import
	// If zero locations already set, sample menus (if exist) are set to appropriate location.
	// If at least one location is set, assume admin is done configuring.
	add_theme_support( 'ctfw-import-set-menu-locations', array(
	     'top'		=> 'top-menu', // menu slug from sample content file
	     'header'	=> 'header-menu',
	     'footer'	=> 'footer-menu'
	) );

	// Delete WordPress sample content before import
	// Move the sample post, page and comment that fresh WordPress installs have into Trash.
	add_theme_support( 'ctfw-import-delete-wp-content' );

}

add_action( 'after_setup_theme', 'churchy_add_theme_support_framework' );

/**
 * Add theme support for framework widgets
 *
 * Adding support for a framework widget will include its class, register the widget
 * and utilize the appropriate template in the widget-templates directory.
 *
 * If no fields are set, the default fields (typically all) will be used.
 * It is recommended to explicitly set fields to be used so that framework updates do
 * not introduce fields not supported by the theme.
 *
 * Related: See includes/sidebars.php for restricting widgets to specific sidebars as well
 * as restricting the number of widgets a sidebar can contain.
 *
 * @since 1.0
 */
function churchy_add_theme_support_framework_widgets() {

	// Categories Widget
	add_theme_support( 'ctfw-widget-categories', array(
		'fields' => array(
			'title',
			'taxonomy',
			'limit',
			'orderby',
			'order',
			'show_dropdown',
			'show_count',
			'show_hierarchy',
		),
		'field_overrides' => array(),
	) );

	// Posts Widget
	add_theme_support( 'ctfw-widget-posts', array(
		'fields' => array(
			'title',
			'category',
			'orderby',
			'order',
			'limit',
			'show_image',
			'show_author',
			'show_date',
			'show_excerpt',
		),
		'field_overrides' => array(),
	) );

	// Sermons Widget
	add_theme_support( 'ctfw-widget-sermons', array(
		'fields' => array(
			'title',
			'topic',
			'book',
			'series',
			'speaker',
			'orderby',
			'order',
			'limit',
			'show_image',
			'show_date',
			'show_topic',
			'show_book',
			'show_series',
			'show_speaker',
			'show_media_types',
			'show_excerpt',
		),
		'field_overrides' => array(),
	) );

	// Events Widget
	if( ! class_exists('TribeEvents') ) {
		add_theme_support( 'ctfw-widget-events', array(
			'fields' => array(
				'title',
				'timeframe',
				'limit',
				'show_image',
				'show_date',
				'show_time',
				'show_excerpt',
			),
			'field_overrides' => array(),
		) );
	}

	// Gallery Widget
	add_theme_support( 'ctfw-widget-gallery', array(
		'fields' => array(
			'title',
			'post_id', // post/page with gallery
			'orderby',
			'order',
			'limit',
			'thumb_size',
			'show_link',
		),
		'field_overrides' => array(),
	) );

	// Galleries Widget
	add_theme_support( 'ctfw-widget-galleries', array(
		'fields' => array(
			'title',
			'orderby',
			'order',
			'limit',
			'show_hierarchy',
		),
		'field_overrides' => array(),
	) );

	// People Widget
	add_theme_support( 'ctfw-widget-people', array(
		'fields' => array(
			'title',
			'group',
			'orderby',
			'order',
			'limit',
			'show_image',
			'show_position',
			'show_phone',
			'show_email',
			'show_icons',
			'show_excerpt',
		),
		'field_overrides' => array(),
	) );

	// Locations Widget
	add_theme_support( 'ctfw-widget-locations', array(
		'fields' => array(
			'title',
			'orderby',
			'order',
			'limit',
			'show_image',
			'show_address',
			'show_phone',
			'show_times',
			'show_map',
		),
		'field_overrides' => array(
			'show_image' => array(
				'default'	=> false // show map by default instead
			),
			'show_map' => array(
				'default'	=> true // show map by default instead
			)
		),
	) );

	// Archives Widget
	add_theme_support( 'ctfw-widget-archives', array(
		'fields' => array(
			'title',
			'post_type',
			'limit',
			'show_count',
			'show_dropdown',
		),
		'field_overrides' => array(
			'post_type' => array( // explicitly set post type options that this theme provides an archive for
				'options' => array(
					'post'			=> _x( 'Blog', 'archives widget', 'churchy' ),
					'ctc_sermon'	=> _x( 'Sermons', 'archives widget', 'churchy' ),
				),
			),
		),
	) );

	// Giving Widget
	add_theme_support( 'ctfw-widget-giving', array(
		'fields' => array(
			'title',
			'text',
			'button_text',
			'button_url',
		),
		'field_overrides' => array(),
	) );

	// Slide Widget
	add_theme_support( 'ctfw-widget-slide', array(
		'fields' => array(
			'title',
			'description',
			'click_url',
			'click_new',
			'image_id',
			'video',
		),
		'field_overrides' => array(
			'image_id' => array( // tell user image is required with this theme
				'after_name' => _x( '(Required)', 'slide widget image', 'churchy' ),
				'desc' => sprintf( __( 'Image cropped to %s.', 'churchy' ), ctfw_image_size_dimensions( 'churchy-slide' ) ),
			),
			'video' => array( // tell user which video URLs to use
				'desc' => __( 'To make this a video slide, enter a YouTube or Vimeo video page URL.', 'churchy' ),
			),
		),
	) );

	// Highlight Widget
	add_theme_support( 'ctfw-widget-highlight', array(
		'fields' => array(
			'title',
			'description',
			'click_url',
			'click_new',
			'image_id',
		),
		'field_overrides' => array(
			'image_id' => array(
				'desc' => sprintf( __( 'Image cropped to %s.', 'churchy' ), ctfw_image_size_dimensions( 'churchy-rect-large' ) ),
			),
		),
	) );

}

add_action( 'after_setup_theme', 'churchy_add_theme_support_framework_widgets' );

