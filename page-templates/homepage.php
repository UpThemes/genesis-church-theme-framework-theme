<?php
/* Template Name: Homepage */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

remove_action( 'genesis_loop', 'genesis_do_loop' );
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
remove_action( 'genesis_sidebar_alt', 'genesis_do_sidebar_alt' );
add_action( 'genesis_loop', 'churchy_do_homepage' );

locate_template( 'index.php', true );