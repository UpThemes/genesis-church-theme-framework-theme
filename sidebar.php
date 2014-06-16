<?php
/**
 * Load the appropriate sidebar for content being shown.
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

// Show if exists, has widgets and is not disabled via post/page Layout Options
if ( churchy_sidebar_enabled() ) : ?>

	<aside class="sidebar sidebar-primary widget-area" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">

		<?php do_action( 'churchy_before_sidebar_widgets' ); ?>

		<?php dynamic_sidebar( churchy_sidebar_id() ); ?>

		<?php do_action( 'churchy_after_sidebar_widgets' ); ?>

	</aside>

<?php endif; ?>