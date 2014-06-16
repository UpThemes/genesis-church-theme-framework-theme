<?php
/**
 * Homepage Highlights "Sidebar"
 * Intended for use with the CT Highlight widget.
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

?>

<?php if ( is_active_sidebar( 'ctcom-home-highlights' ) ) : ?>

    <?php do_action( 'churchy_before_home_highlights' ); ?>

	<div id="ctcom-home-highlights">

		<?php dynamic_sidebar( 'ctcom-home-highlights' ); ?>

	</div>

    <?php do_action( 'churchy_after_home_highlights' ); ?>

<?php endif; ?>