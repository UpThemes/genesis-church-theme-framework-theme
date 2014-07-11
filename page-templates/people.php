<?php
/**
 * Template Name: People
 *
 * This shows a page with custom loop after the content.
 *
 * content.php outputs the page content.
 * content-person.php outputs content for each post in the loop.
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

// Query events that ended before today
function churchy_people_loop_after_content() {

	return new WP_Query( array(
		'post_type'			=> 'ctc_person',
		'paged'				=> ctfw_page_num(), // returns/corrects $paged so pagination works on static front page
		'orderby'			=> 'menu_order',
		'order'				=> 'ASC'
	) );

}

// Make query available via filter
add_filter( 'churchy_loop_after_content_query', 'churchy_people_loop_after_content' );
add_action( 'genesis_pre', 'churchy_loop_after_content_query' );
remove_action( 'genesis_loop', 'genesis_do_loop' );
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
remove_action( 'genesis_sidebar_alt', 'genesis_do_sidebar_alt' );
add_action( 'genesis_sidebar', 'churchy_sidebar' );
add_action( 'genesis_loop', 'churchy_do_loop' );
add_action( 'genesis_before_loop', 'churchy_loop_header' );

// Load main template to show the page
locate_template( 'index.php', true );
