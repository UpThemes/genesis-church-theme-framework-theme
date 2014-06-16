<?php
/**
 * Homepage Slider "Sidebar"
 * Intended for use by the CT Slide widget.
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

?>

<?php if ( is_active_sidebar( 'ctcom-home-slider' ) ) : ?>

    <?php do_action( 'churchy_before_home_slider' ); ?>

	<div id="churchy-slider">

		<div id="churchy-slider-inner">

			<div class="flexslider">

				<ul class="slides">

					<?php dynamic_sidebar( 'ctcom-home-slider' ); ?>

				</ul>

			</div>

		</div>

	</div>

    <?php do_action( 'churchy_after_home_slider' ); ?>

<?php endif; ?>