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
	<div class="uplifted-entry-image">
		<?php uplifted_post_image(); ?>
	</div>
<?php endif; ?>

<div class="uplifted-content-meta">

	<header class="uplifted-entry-header uplifted-clearfix">

		<div class="uplifted-entry-title-meta">

			<?php if ( ctfw_has_title() ) : ?>
				<h1 class="uplifted-entry-title<?php if ( is_singular( get_post_type() ) ) : ?> uplifted-main-title<?php endif; ?>">
					<?php uplifted_post_title(); // will be linked on short ?>
				</h1>
			<?php endif; ?>

			<?php if ( $date || $time || $venue || $address ) : ?>

				<ul class="uplifted-entry-meta">

					<?php if ( $date ) : ?>
						<li class="uplifted-entry-date uplifted-event-full-date">
							<i class="genericon genericon-month"></i>
							<?php echo esc_html( $date ); ?>
						</li>
					<?php endif; ?>

					<?php if ( $time ) : ?>
						<li class="uplifted-event-full-time">
							<i class="genericon genericon-time"></i>
							<?php echo nl2br( wptexturize( $time ) ); ?>
						</li>
					<?php endif; ?>

					<?php if ( $venue ) : ?>
						<li class="uplifted-event-full-venue">
							<i class="genericon genericon-home"></i>
							<?php echo esc_html( $venue ); ?>
						</li>
					<?php endif; ?>

					<?php if ( $address ) : ?>
						<li class="uplifted-event-full-address">
							<i class="genericon genericon-location"></i>
							<?php echo nl2br( wptexturize( $address ) ); ?>
						</li>
					<?php endif; ?>

				</ul>

			<?php endif; ?>

		</div> <!-- /uplifted-entry-title-meta -->

	</header>
