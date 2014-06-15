<?php
/**
 * Sermon content for:
 *
 * 1. Full / Single
 * 2. Short / Multiple
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

// Get sermon data:
// $has_full_text		True if full text of sermon was provided as post content
// $video_player		Embed code generated from uploaded file, URL for file on other site, page on oEmbed-supported site such as YouTube, or manual embed code (HTML or shortcode)
// $video_download_url 	URL for download link (available only for local files, "Save As" will be forced)
// $audio_player		Same as video
// $audio_download_url 	Same as video
// $pdf_download_url 	URL for download link (local or externally hosted, but "Save As" forced only if local)
extract( ctfw_sermon_data() );

// Show buttons if need to switch between video and audio players or have at least one download link
$show_buttons = false;
if ( ( $video_player && $audio_player ) || $video_download_url || $audio_download_url || $pdf_download_url ) {
	$show_buttons = true;
}

/*************************************
 * 1. FULL / SINGLE
 *************************************/

if ( is_singular( get_post_type() ) ) :

	// Player request (?player=audio or ?player=video)
	// Optionally show and scroll to a specific player
	$player_request = '';
	if (
		isset( $_GET['player'] ) // query string is requesting a specific player
		&& (
			( 'video' == $_GET['player'] && $video_player )		// request is for video player and video player exists
			|| ( 'audio' == $_GET['player'] && $audio_player )	// request is for audio player and audio player exists
		)
	) {
		$player_request = $_GET['player'];
	}

	// Determine which player to show
	$show_player = '';
	if ( $player_request ) {
		$show_player = $player_request;
	} elseif ( $video_player ) {
		$show_player = 'video';
	} elseif ( $audio_player ) {
		$show_player = 'audio';
	}

	// Scroll to player requested, if any
	if ( $player_request ) {

		add_action( 'wp_footer', 'uplifted_sermon_player_scroll' );

		function uplifted_sermon_player_scroll() {

echo <<< HTML
<script>
jQuery(document).ready(function($) {
	$.smoothScroll({
		scrollTarget: '#uplifted-sermon-full-media',
		offset: -60,
		easing: 'swing',
		speed: 800
	});
});
</script>
HTML;

		}

	}

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'uplifted-entry-full uplifted-sermon-full' ); ?>>

		<!-- a working Header containing Sermon meta, will be changing -->

		<header class="uplifted-entry-header">

			<div class="uplifted-entry-title-meta">

				<?php if ( ctfw_has_title() ) : ?>
					<h1 class="uplifted-entry-title<?php if ( is_singular( get_post_type() ) ) : ?> uplifted-main-title<?php endif; ?>">
						<?php uplifted_post_title(); // will be linked on short ?>
					</h1>
				<?php endif; ?>

				<ul class="uplifted-entry-meta">

					<li class="uplifted-entry-date uplifted-content-icon">
						<time datetime="<?php esc_attr( the_time( 'c' ) ); ?>"><?php ctfw_post_date(); ?></time>
					</li>

					<?php if ( $speakers = get_the_term_list( $post->ID, 'ctc_sermon_speaker', '', __( ', ', 'uplifted' ) ) ) : ?>
						<li class="uplifted-entry-byline uplifted-sermon-speaker uplifted-content-icon">
							<?php echo $speakers; ?>
						</li>
					<?php endif; ?>

				</ul>

			</div> <!-- /uplifted-entry-title-meta -->



			<!-- Sermon Media -->
			<?php
			// Show media player and buttons only if post is not password protected
			if ( ( $show_player || $show_buttons ) && ! post_password_required() ) :
			?>

				<div id="uplifted-sermon-full-media">

					<?php
					// Show player if have video or audio player
					if ( $show_player ) : ?>

						<div id="uplifted-sermon-full-player">

							<?php if ( 'video' == $show_player ) : ?>
							<div id="uplifted-sermon-full-video-player">
								<?php echo $video_player; ?>
							</div>
							<?php endif; ?>

							<?php if ( 'audio' == $show_player ) : ?>
							<div id="uplifted-sermon-full-audio-player">

								<?php if ( has_post_thumbnail() ) : ?>
									<div class="uplifted-entry-image">
										<?php uplifted_post_image(); ?>
									</div>
								<?php endif; ?>

								<?php echo $audio_player ?>

							</div>
							<?php endif; ?>

						</div><!-- /uplifted-sermon-full-player -->

					<?php endif; ?>

					<?php
					// Show buttons if need to switch between video and audio players or have at least one download link
					if ( $show_buttons ) :
					?>

					<div class="uplifted-list-buttons-container clearfix">

						<ul class="uplifted-list-buttons">

							<?php

							// Make sure there is no whitespace between items since they are inline-block

							if ( $video_player && 'audio' == $show_player ) : // have video player but currently showing audio
								?><li id="uplifted-sermon-full-video-player-button" class="media-toggle">
									<a href="?player=video">
										<i class="genericon genericon-video"></i>
										<?php _e( 'Show Video Player', 'uplifted' ); ?>
									</a>
								</li><?php
							endif;

							if ( $audio_player && 'video' == $show_player ) : // have audio player but currently showing video
								?><li id="uplifted-sermon-full-audio-player-button" class="media-toggle">
									<a href="?player=audio">
										<i class="genericon genericon-audio"></i>
										<?php _e( 'Show Audio Player', 'uplifted' ); ?>
									</a>
								</li><?php
							endif;
							?>

						</ul>

						<ul class="uplifted-list-buttons">

							<?php

							// Make sure there is no whitespace between items since they are inline-block

							if ( $video_download_url ) :
								?><li id="uplifted-sermon-full-video-download-button" class="media-download">
									<a href="<?php echo esc_url( $video_download_url ); ?>" title="<?php echo esc_attr( __( 'Download Video', 'uplifted' ) ); ?>">
										<i class="genericon genericon-cloud-download"></i>
										<?php _e( 'Save Video', 'uplifted' ); ?>
									</a>
								</li><?php
							endif;

							if ( $audio_download_url ) :
								?><li id="uplifted-sermon-full-audio-download-button" class="media-download">
									<a href="<?php echo esc_url( $audio_download_url ); ?>" title="<?php echo esc_attr( __( 'Download Audio', 'uplifted' ) ); ?>">
										<i class="genericon genericon-cloud-download"></i>
										<?php _e( 'Save Audio', 'uplifted' ); ?>
									</a>
								</li><?php
							endif;

							if ( $pdf_download_url ) :
								?><li id="uplifted-sermon-full-pdf-download-button" class="media-download">
									<a href="<?php echo esc_url( $pdf_download_url ); ?>" title="<?php echo esc_attr( __( 'Download PDF', 'uplifted' ) ); ?>">
										<i class="genericon genericon-cloud-download"></i>
										<?php _e( 'Save PDF', 'uplifted' ); ?>
									</a
								></li><?php
							endif;

							?>

						</ul>

						<?php endif; ?>

					</div><!-- /uplifted-list-buttons-container -->

				</div><!-- /uplifted-sermon-full-media -->

			<?php endif; ?> <!-- end full-media if statement -->

		</header>
		<!-- a working Header containing Sermon meta, will be changing -->

		<div class="row">

			<div class="single-sermon-content large-8 column">

				<?php if ( ctfw_has_content() || ctfw_has_excerpt() ) : ?>

					<div class="uplifted-entry-content clearfix">

						<?php the_content(); ?>

						<?php if ( ! ctfw_has_content() ) the_excerpt(); // if no content, show excerpt if there is one ?>

						<?php do_action( 'uplifted_after_content' ); ?>

					</div>

				<?php endif; ?>

			</div><!-- /single-sermon-content -->

			<div class="single-sermon-meta-sidebar large-4 column">

				<div class="uplifted-entry-title-meta">

					<?php if ( ctfw_has_title() ) : ?>
						<h3>
							<?php uplifted_post_title(); // will be linked on short ?>
						</h3>
					<?php endif; ?>

					<ul class="uplifted-entry-meta">

						<li class="uplifted-entry-date">
							<i class="genericon genericon-month"></i>
							<time datetime="<?php esc_attr( the_time( 'c' ) ); ?>"><?php ctfw_post_date(); ?></time>
						</li>

						<?php if ( $speakers = get_the_term_list( $post->ID, 'ctc_sermon_speaker', '', __( ', ', 'uplifted' ) ) ) : ?>
							<li class="uplifted-entry-byline uplifted-sermon-speaker">
								<i class="genericon genericon-user"></i>
								<?php echo $speakers; ?>
							</li>
						<?php endif; ?>

						<?php if ( $topics = get_the_term_list( $post->ID, 'ctc_sermon_topic', '', __( ', ', 'uplifted' ) ) ) : ?>
							<li class="uplifted-entry-category uplifted-sermon-topic">
								<i class="genericon genericon-category"></i>
								<?php echo $topics; ?>
							</li>
						<?php endif; ?>

						<?php if ( $books = get_the_term_list( $post->ID, 'ctc_sermon_book', '', __( ', ', 'uplifted' ) ) ) : ?>
							<li class="uplifted-entry-category uplifted-sermon-book">
								<i class="genericon genericon-book"></i>
								<?php echo $books; ?>
							</li>
						<?php endif; ?>

						<?php if ( uplifted_show_comments() ) : ?>
							<li class="uplifted-entry-comments-link">
								<i class="genericon genericon-comment"></i>
								<?php uplifted_comments_link(); ?>
							</li>
						<?php endif; ?>

					</ul>

				</div> <!-- /uplifted-entry-title-meta -->

			</div><!-- /single-sermon-meta -->

		</div><!-- /row -->

	</article>

<?php

/*************************************
 * 2. SHORT / MULTIPLE
 *************************************/

else :

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'uplifted-entry-short uplifted-sermon-short' ); ?>>

		<?php get_template_part( 'content-sermon-header' ); ?>

		<?php if ( ctfw_has_excerpt() || ctfw_has_more_tag() ) : ?>
			<div class="uplifted-entry-content clearfix">
				<?php uplifted_short_content(); // output excerpt or post content up until <!--more--> quicktag used ?>
			</div>
		<?php endif; ?>

		<?php get_template_part( 'content-footer-short' ); // show appropriate button(s) ?>

		</div> <!-- /uplifted-content-meta -->

	</article>

<?php endif; ?>