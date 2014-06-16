<?php
/**
 * Title and description or other content shown above loop on categories, archives, etc.
 *
 * Hierarchy information: http://codex.wordpress.org/Template_Hierarchy
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

// Show only on loop multiple
if ( is_singular() ) return;

do_action('churchy_before_loop_header');

/**************************************
 * BLOG POSTS
 **************************************/

// Show page title and content before loop when static front page used and "Posts page" is specified
// Possibility: Simplify by making this condition cause Blog tempate to load with "Posts page" $post global?
if ( ctfw_is_posts_page() ) : ?>

	<h1 class="churchy-main-title"><?php churchy_title_paged( get_post_field( 'post_title', get_queried_object_id() ) ); ?></h1>

	<?php if ( $content = apply_filters( 'the_content', get_post_field( 'post_content', get_queried_object_id() ) ) ) : ?>
		<div class="churchy-entry-content">
			<?php echo $content; ?>
		</div>
	<?php endif; ?>

<?php

/**************************************
 * BLOG TAXONOMIES
 **************************************/

elseif ( is_category() ) : ?>

	<h1 class="churchy-main-title"><?php churchy_title_paged( single_cat_title( '', false ) ); ?></h1>

	<div class="churchy-entry-content">
		<?php echo category_description(); ?>
	</div>

<?php elseif ( is_tag() ) : ?>

	<h1 class="churchy-main-title"><?php churchy_title_paged( sprintf( __( "'%s' tagged posts", 'churchy' ), single_tag_title( '', false ) ) ); ?></h1>

<?php

/**************************************
 * CUSTOM TAXONOMY
 **************************************/

elseif ( is_tax() ) : ?>

	<?php

	// Title format depends on taxonomy; default shows taxonomy alone
	$taxonomy = get_query_var( 'taxonomy' );
	$taxonomy_titles = array(
		/* translators: %s represents sermon topic */
		'ctc_sermon_topic' 		=> _x( 'Sermons on %s', 'sermon topic', 'churchy' ),
		/* translators: %s represents Bible book */
		'ctc_sermon_book' 		=> _x( 'Sermons on %s', 'sermon book', 'churchy' ),
		/* translators: %s represents sermon speaker name */
		'ctc_sermon_speaker' 	=> __( 'Sermons by %s', 'churchy' ),
		/* translators: %s represents sermon tag term */
		'ctc_sermon_tag' 		=> __( "'%s' tagged sermons", 'churchy' ),
	);
	$taxonomy_title = isset( $taxonomy_titles[$taxonomy] ) ? $taxonomy_titles[$taxonomy] : '%s';

	?>

	<h1 class="churchy-main-title"><?php churchy_title_paged( sprintf( $taxonomy_title, single_term_title( '', false ) ) ); ?></h1>

	<div class="churchy-entry-content">
		<?php echo term_description( '', get_query_var( 'taxonomy' ) ); ?>
	</div>

<?php

/**************************************
 * AUTHOR ARCHIVE
 **************************************/

elseif ( is_author() ) : ?>

	<h1 class="churchy-main-title"><?php echo churchy_title_paged( sprintf( __( "Posts by %s", 'churchy' ), get_the_author() ) ); ?></h1>

<?php

/**************************************
 * SEARCH RESULTS
 **************************************/

?>

<?php elseif ( is_search() ) : ?>

	<h1 class="churchy-main-title"><?php churchy_title_paged( sprintf( __( "Search results for '%s'", 'churchy' ), get_search_query() ) ); ?></h1>

	<div class="churchy-entry-content">
		<?php
		/* translators: %d is number of matches, %s is search term */
		echo sprintf( _n( 'There is %d match for %s.', 'There are %d matches for %s.', $wp_query->found_posts, 'churchy' ), $wp_query->found_posts, '<i>' . get_search_query() . '</i>' );
		?>
	</div>

<?php

/**************************************
 * DATE ARCHIVE
 **************************************/

elseif ( is_day() || is_month() || is_year() ) : ?>

	<?php

	// Date format
	if ( is_day() ) {
		$date = get_the_date();
	} else if ( is_month() ) {
		$date = get_the_date( _x( 'F Y', 'monthly archives date format', 'churchy' ) );
	} else if ( is_year() ) {
		$date = get_the_date( _x( 'Y', 'yearly archives date format', 'churchy' ) );
	}

	// Title format depends on post type
	$post_type = get_post_type();
	$archive_titles = array(
		/* translators: %s represents date */
		'post'			=> __( 'Posts from %s', 'churchy' ),
		/* translators: %s represents date */
		'ctc_sermon'	=> __( 'Sermons from %s', 'churchy' ),
	);
	$archive_title = isset( $archive_titles[$post_type] ) ? $archive_titles[$post_type] : '%s';

	?>

	<h1 class="churchy-main-title"><?php churchy_title_paged( sprintf( $archive_title, $date ) ); ?></h1>

<?php

/**************************************
 * POST TYPE ARCHIVE
 **************************************/

// When page template not used to output post type items, post type name shown at top

elseif ( is_post_type_archive() ) : ?>

	<h1 class="churchy-main-title"><?php churchy_title_paged( post_type_archive_title( '', false ) ); ?></h1>

<?php

/**************************************
 * GENERIC ARCHIVE
 **************************************/

// This is used when nothing higher up is suitable

elseif ( is_archive() ) : ?>

	<h1 class="churchy-main-title"><?php churchy_title_paged( __( 'Archives', 'churchy' ) ); ?></h1>

<?php

elseif ( is_404() ) : ?>

	<h1 class="churchy-main-title"><?php _e( 'Not Found', 'churchy' ); ?></h1>

	<div class="churchy-entry-content">
		<?php _e( 'Sorry, the page or file you tried to access was not found.', 'churchy' ); ?>
	</div>

<?php endif; ?>

<?php do_action('churchy_after_loop_header'); ?>