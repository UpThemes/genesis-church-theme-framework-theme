<?php
/**
 * Full Content Footer
 *
 * Multipage nav, taxonomy terms, admin Edit link, etc. for full display of different post types.
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

// Collect term lists (categories, tags, etc.) for specific post types
$term_lists = array();

// Blog Terms
if ( is_singular( 'post' ) ) {

	// Blog Tags
	/* translators: used between list items, there is a space after the comma */
	if ( $list = get_the_tag_list( '', __( ', ', 'uplifted' ) ) ) {
		$term_lists[] = sprintf( __( 'Tagged with %s', 'uplifted' ), $list );
	}

}

// Sermon Tags and Series
elseif ( is_singular( 'ctc_sermon' ) ) {

	// Series
	/* translators: used between list items, there is a space after the comma */
	if ( $list = get_the_term_list( $post->ID, 'ctc_sermon_series', '', __( ', ', 'uplifted' ) ) ) {
		$term_lists[] = sprintf( __( 'Series: %s', 'uplifted' ), $list );
	}

	// Sermon Tags
	/* translators: used between list items, there is a space after the comma */
	if ( $list = get_the_term_list( $post->ID, 'ctc_sermon_tag', '', __( ', ', 'uplifted' ) ) ) {
		$term_lists[] = sprintf( __( 'Tagged with %s', 'uplifted' ), $list );
	}

}

?>

<?php
// Have footer content to show?
if ( ( ctfw_is_multipage() && ! post_password_required() ) || ! empty( $term_lists ) || ctfw_can_edit_post() ) :
?>

	<footer class="uplifted-entry-footer clearfix">

		<?php
		// "Pages: 1 2 3" when <!--nextpage--> used
		if ( ctfw_is_multipage() && ! post_password_required() ) :
		?>
			<div class="uplifted-entry-footer-item">
				<?php
				wp_link_pages( array(
					'before'	=> '<div class="uplifted-entry-page-nav"><span>' . __( 'Pages:', 'uplifted' ) . '</span>',
					'after'		=> '</div>'
				) );
				?>
			</div>
		<?php endif; ?>

		<?php
		// Term lists (categories, tags, etc.)
		if ( ! empty( $term_lists ) ) :
		?>

			<div class="uplifted-entry-footer-item">

				<?php foreach ( $term_lists as $term_list ) : ?>
				<div class="uplifted-entry-footer-terms">
					<?php echo $term_list; ?>
				</div>
				<?php endforeach; ?>

			</div>

		<?php endif; ?>

		<?php
		// "Edit" link for privileged user
		if ( ctfw_can_edit_post() ) :
		?>

			<div class="uplifted-entry-footer-item">

				<?php
				$post_type_obj = get_post_type_object( $post->post_type );
				/* translators: %1$s is icon, %1$s is post type singular name */
				edit_post_link(
					sprintf(
						__( ' Edit %1$s', 'uplifted' ), // Link text format
						$post_type_obj->labels->singular_name // Post type name
					)
				);
				?>

			</div>

		<?php endif; ?>

	</footer>

<?php endif; ?>