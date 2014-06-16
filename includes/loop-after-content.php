<?php
/**
 * "Loop After Content" Functions
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

/*********************************
 * LOOP AFTER CONTENT
 *********************************/

/**
 * Get "loop after content" query
 *
 * @since 1.0
 * @return object WP_Query object
 */
function churchy_loop_after_content_query() {
	return apply_filters( 'churchy_loop_after_content_query', false );
}

/**
 * Check if "loop after content" is being used
 *
 * @since 1.0
 * @return bool Whether or not "loop after content" is used
 */
function churchy_loop_after_content_used() {

	$used = false;

	if ( churchy_loop_after_content_query() ) {
		$used = true;
	}

	return apply_filters( 'churchy_loop_after_content_used', $used );

}

/**
 * Output the loop by loading template
 *
 * @since 1.0
 * @global object $wp_query
 */
function churchy_loop_after_content_output() {

	global $wp_query;

	// Loop posts based on query from filter
	if ( $query = churchy_loop_after_content_query() ) {

		// Preserve original query for after loop
		$original_query = $wp_query;
		$wp_query = $query;

		// Loop posts with loop.php
		echo '<section id="churchy-loop-after-content" class="churchy-loop-after-content">';
		get_template_part( 'loop' );
		echo '</section>';

		// Restore original query
		$wp_query = $original_query;
		wp_reset_postdata(); // restore $post global in main query

	}

}

/**
 * Make loop content show after content
 *
 * @since 1.0
 */
function churchy_loop_after_content() {

	// Front-end only
	if ( ! is_admin() ) {

		// Make content available via action placed after content (see content.php)
		add_action( 'churchy_after_content', 'churchy_loop_after_content_output' );

	}

}

add_action( 'init', 'churchy_loop_after_content' );
