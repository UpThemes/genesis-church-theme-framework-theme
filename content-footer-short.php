<?php
/**
 * Short Content Footer
 *
 * Show appropriate button(s) beneath short display of post in loop.
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

// Post type
$post_type = get_post_type();

?>

<footer class="uplifted-entry-footer clearfix">

	<?php
	// Sermon Buttons
	if ( 'ctc_sermon' == $post_type ) :

		// Get sermon meta data
		// $has_full_text		True if full text of sermon was provided as post content
		// $video_player		Embed code generated from uploaded file, URL for file on other site, page on oEmbed-supported site such as YouTube, or manual embed code (HTML or shortcode)
		// $video_download_url 	URL for download link (available only for local files, "Save As" will be forced)
		// $audio_player		Same as video
		// $audio_download_url 	Same as video
		// $pdf_download_url 	URL for download link (local or externally hosted, but "Save As" forced only if local)
		extract( ctfw_sermon_data() );

	?>
	
	<a class="view-details" href="<?php the_permalink(); ?>">
				<?php if ( $has_full_text ) : ?>
					<?php _e( 'Read Full &rarr;', 'uplifted' ); ?>
				<?php else : ?>
					<?php _ex( 'View Details &rarr;', 'sermon button', 'uplifted' ); ?>
				<?php endif; ?>
			</a>
			
	<ul class="uplifted-entry-footer-item uplifted-list-buttons">

		<?php

		// Make sure there is no whitespace between items since they are inline-block

		?>
		
		<?php

		if ( $video_player || $video_download_url ) :
			?><li>
				<a href="<?php the_permalink(); ?><?php if ( $video_player ) : ?>?player=video<?php endif; ?>">
					<i class="genericon genericon-video"></i>
					<?php _e( 'Watch', 'uplifted' ); ?>
				</a>
			</li><?php
		endif;

		if ( $audio_player || $audio_download_url ) :
			?><li>
				<a href="<?php the_permalink(); ?><?php if ( $audio_player ) : ?>?player=audio<?php endif; ?>">
					<i class="genericon genericon-audio"></i>
					<?php _e( 'Listen', 'uplifted' ); ?>
				</a>
			</li><?php
		endif;

		if ( $pdf_download_url ) :
			?><li>
				<a href="<?php echo esc_url( $pdf_download_url ); ?>" title="<?php echo esc_attr( __( 'Download PDF', 'uplifted' ) ); ?>">
					<i class="genericon genericon-cloud-download"></i>
					<?php _e( 'PDF', 'uplifted' ); ?>
				</a>
			</li><?php
		endif;

		?>

	</ul>

	<?php
	// Location Buttons
	elseif ( 'ctc_location' == $post_type ) :

		// Get data
		// $address, $show_directions_link, $directions_url, $phone, $times, $map_lat, $map_lng, $map_type, $map_zoom
		extract( ctfw_location_data() );

	?>
	
	<a class="view-details" href="<?php the_permalink(); ?>"><?php _e( 'View Details &rarr;', 'uplifted' ); ?></a>
	
	<ul class="uplifted-entry-footer-item uplifted-list-buttons">

		<?php

		// Make sure there is no whitespace between items since they are inline-block

		if ( $directions_url ) :
			?><li><a href="<?php echo esc_url( $directions_url ); ?>" target="_blank"><i class="genericon genericon-location"></i><?php _e( 'Directions', 'uplifted' ); ?></a></li><?php
		endif;

		?>

	</ul>

	<?php
	// Event Buttons
	elseif ( 'ctc_event' == $post_type ) :

		// Get data
		// $date (localized range), $start_date, $end_date, $time, $venue, $address, $show_directions_link, $directions_url, $map_lat, $map_lng, $map_type, $map_zoom
		extract( ctfw_event_data() );

	?>
	
	<a class="view-details" href="<?php the_permalink(); ?>"><?php _e( 'View Details &rarr;', 'uplifted' ); ?></a>
	
	<ul class="uplifted-entry-footer-item uplifted-list-buttons">

		<?php

		// Make sure there is no whitespace between items since they are inline-block

		if ( $directions_url ) :
			?><li><a href="<?php echo esc_url( $directions_url ); ?>" target="_blank"><i class="genericon genericon-location"></i><?php _e( 'Directions', 'uplifted' ); ?></a></li><?php
		endif;

		?>

	</ul>

	<?php
	// Person Buttons
	elseif ( 'ctc_person' == $post_type ) :
	?>

		<?php if ( ctfw_has_content() ) : // show only if has bio content ?>
			<ul class="uplifted-entry-footer-item uplifted-list-buttons">
				<li><a href="<?php the_permalink(); ?>"><?php _e( 'Read Biography', 'uplifted' ); ?></a></li>
			</ul>
		<?php endif; ?>

	<?php
	// Gallery Page Button
	elseif ( 'page' == $post_type && CTFW_THEME_PAGE_TPL_DIR . '/gallery.php' == $post->page_template ) :
	?>

		<ul class="uplifted-entry-footer-item uplifted-list-buttons">

			<li>
				<a href="<?php the_permalink(); ?>">
					<i class="genericon genericon-gallery"></i>
					<?php _e( 'View Gallery', 'uplifted' ); ?>
				</a>
			</li>

		</ul>

	<?php
	// Generic Post Type Button
	else :

		$post_type_obj = get_post_type_object( $post->post_type );

	?>

		<div class="uplifted-entry-footer-item clearfix">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="uplifted-button">

				<?php
				// <!--more--> quicktag is used; show "Read More"
				if ( ctfw_has_more_tag() ) :
				?>

					<?php _e( 'Read More', 'uplifted' ); ?>

				<?php elseif ( ! empty( $post_type_obj->labels->singular_name ) ) :?>

					<?php
					/* translators: %s is post type name */
					printf( __( 'View %s', 'uplifted' ), $post_type_obj->labels->singular_name );
					?>

				<?php endif; ?>

			</a>
		</div>

	<?php endif; ?>

</footer>

