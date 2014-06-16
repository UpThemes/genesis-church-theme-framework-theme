<?php
/**
 * Post Header Meta (Full and Short)
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

// Get data
// $address, $show_directions_link, $directions_url, $phone, $times, $map_lat, $map_lng, $map_type, $map_zoom
extract( ctfw_location_data() );

?>

<?php if ( has_post_thumbnail() ) : ?>
	<div class="churchy-entry-image">
		<?php churchy_post_image(); ?>
	</div>
<?php endif; ?>

<div class="churchy-content-meta">

	<header class="churchy-entry-header clearfix">

		<div class="churchy-entry-title-meta">

			<?php if ( ctfw_has_title() ) : ?>
				<h1 class="churchy-entry-title<?php if ( is_singular( get_post_type() ) ) : ?> churchy-main-title<?php endif; ?>">
					<?php churchy_post_title(); // will be linked on short ?>
				</h1>
			<?php endif; ?>

			<ul class="churchy-entry-meta">

				<?php if ( $address ) : ?>
					<li class="churchy-location-address">
						<i class="genericon genericon-location"></i>
						<?php echo nl2br( wptexturize( $address ) ); ?>
					</li>
				<?php endif; ?>

				<?php if ( $phone ) : ?>
					<li class="churchy-location-phone">
						<i class="genericon genericon-phone"></i>
						<?php echo esc_html( $phone ); ?>
					</li>
				<?php endif; ?>

				<?php if ( $times ) : ?>
					<li class="churchy-location-times">
						<i class="genericon genericon-time"></i>
						<?php echo nl2br( wptexturize( $times ) ); ?>
					</li>
				<?php endif; ?>

			</ul>

		</div> <!-- /churchy-entry-title-meta -->

	</header>
