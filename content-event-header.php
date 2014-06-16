<?php
/**
 * Post Header Meta (Full and Short)
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

// Get data
// $date (localized range), $start_date, $end_date, $time, $venue, $address, $show_directions_link, $directions_url, $map_lat, $map_lng, $map_type, $map_zoom
extract( ctfw_event_data() );

?>

<?php if ( has_post_thumbnail() ) : ?>
	<div class="churchy-entry-image">
		<?php churchy_post_image(); ?>
	</div>
<?php endif; ?>

<div class="churchy-content-meta">

	<header class="churchy-entry-header churchy-clearfix">

		<div class="churchy-entry-title-meta">

			<?php if ( ctfw_has_title() ) : ?>
				<h1 class="churchy-entry-title<?php if ( is_singular( get_post_type() ) ) : ?> churchy-main-title<?php endif; ?>">
					<?php churchy_post_title(); // will be linked on short ?>
				</h1>
			<?php endif; ?>

			<?php if ( $date || $time || $venue || $address ) : ?>

				<ul class="churchy-entry-meta">

					<?php if ( $date ) : ?>
						<li class="churchy-entry-date churchy-event-full-date">
							<i class="genericon genericon-month"></i>
							<?php echo esc_html( $date ); ?>
						</li>
					<?php endif; ?>

					<?php if ( $time ) : ?>
						<li class="churchy-event-full-time">
							<i class="genericon genericon-time"></i>
							<?php echo nl2br( wptexturize( $time ) ); ?>
						</li>
					<?php endif; ?>

					<?php if ( $venue ) : ?>
						<li class="churchy-event-full-venue">
							<i class="genericon genericon-home"></i>
							<?php echo esc_html( $venue ); ?>
						</li>
					<?php endif; ?>

					<?php if ( $address ) : ?>
						<li class="churchy-event-full-address">
							<i class="genericon genericon-location"></i>
							<?php echo nl2br( wptexturize( $address ) ); ?>
						</li>
					<?php endif; ?>

				</ul>

			<?php endif; ?>

		</div> <!-- /churchy-entry-title-meta -->

	</header>
