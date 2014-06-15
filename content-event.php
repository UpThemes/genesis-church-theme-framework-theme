<?php
/**
 * Event content for:
 *
 * 1. Full / Single
 * 2. Short / Multiple
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

// Get data
// $date (localized range), $start_date, $end_date, $time, $venue, $address, $show_directions_link, $directions_url, $map_lat, $map_lng, $map_type, $map_zoom
extract( ctfw_event_data() );

/*************************************
 * 1. FULL / SINGLE
 *************************************/

if ( is_singular( get_post_type() ) ) :

	$google_map = ctfw_google_map( array(
		'latitude'	=> $map_lat,
		'longitude'	=> $map_lng,
		'type'		=> $map_type,
		'zoom'		=> $map_zoom
	) );

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'uplifted-entry-full uplifted-event-full' ); ?>>

		<?php get_template_part( 'content-event-header' ); ?>

		<?php if ( $google_map ) : ?>
			<div class="uplifted-event-full-map">
				<?php echo $google_map; ?>
			</div>
		<?php endif; ?>

		<?php if ( $directions_url ) : ?>
			<div class="uplifted-event-full-direction">
				<a href="<?php echo esc_url( $directions_url ); ?>" target="_blank" class="uplifted-button">
					<i class="genericon genericon-location"></i>
					<?php _ex( 'Get Directions', 'event', 'uplifted' ); ?>
				</a>
			</div>
		<?php endif; ?>

		<?php if ( ctfw_has_content() ) : // might not be any content, so let header sit flush with bottom ?>

			<div class="uplifted-entry-content uplifted-clearfix">

				<?php the_content(); ?>

				<?php do_action( 'uplifted_after_content' ); ?>

			</div>

		<?php endif; ?>

		<?php get_template_part( 'content-footer-full' ); // multipage nav, term lists, "Edit" button, etc. ?>
    
  </div> <!-- /uplifted-content-meta -->
  
	</article>

<?php

/*************************************
 * 2. SHORT / MULTIPLE
 *************************************/

else :

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'uplifted-entry-short uplifted-event-short' ); ?>>

		<?php get_template_part( 'content-event-header' ); ?>

		<?php if ( ctfw_has_excerpt() || ctfw_has_more_tag() ) : ?>
			<div class="uplifted-entry-content uplifted-clearfix">
				<?php uplifted_short_content(); // output excerpt or post content up until <!--more--> quicktag used ?>
			</div>
		<?php endif; ?>

		<?php get_template_part( 'content-footer-short' ); // show appropriate button(s) ?>
    
  </div> <!-- /uplifted-content-meta -->
  
	</article>

<?php endif; ?>