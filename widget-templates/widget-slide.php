<?php
/**
 * Slide Widget Template
 *
 * Produces output for appropriate widget class in framework.
 * $this, $instance (sanitized field values) and $args are available.
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

// Slide has valid image
if ( wp_get_attachment_image_src( $instance['image_id'] ) ) :

	$video_url = $instance['video'];

?>

	<li<?php

		$li_classes = array();

		if ( $video_url ) {
			$li_classes[] = 'churchy-slide-video';
		}

		if ( $instance['click_url'] ) {
			$li_classes[] = 'churchy-slide-linked';
		}

		if ( $instance['click_new'] ) {
			$li_classes[] = 'churchy-slide-click-new'; // for JavaScript
		}

		if ( ! $instance['description'] ) {
			$li_classes[] = 'churchy-slide-no-description';
		}

		if ( ! empty( $li_classes ) ) {
			echo ' class="' . implode( ' ', $li_classes ). '"';
		}

	?>>

		<?php if ( $instance['click_url'] || $video_url ) : // image is linked ?>
			<a<?php if( $video_url ) echo ' class="oembed"'; ?> href="<?php echo esc_url( do_shortcode( $video_url ? $video_url : $instance['click_url'] ) ); // use video URL if is video slide ?>"<?php if ( $instance['click_new'] ) : ?> target="_blank"<?php endif; ?>>
		<?php endif; ?>

		<div class="flex-image-container">

				<?php echo wp_get_attachment_image( $instance['image_id'], 'churchy-slide', false, array( 'alt' => '', 'title' => '', 'class' => '' ) ); ?>

		</div>

		<?php if ( $instance['title'] || $instance['description'] || $video_url ) : // title or description provided ?>

			<div class="flex-caption">

				<div class="flex-position">

					<?php if ( $video_url ) : // show play button hover overlay for video slide ?>
						<div class="flex-play-overlay"></div><br>
					<?php endif; ?>

					<?php if ( $instance['title'] ) : // title provided ?>

						<?php if ( $instance['click_url'] ) : // slide is linked ?>

							<h2 class="flex-title"><?php echo $instance['title']; ?></h2>

						<?php else : // slide not linked ?>

							<h2 class="flex-title"><?php echo force_balance_tags( $instance['title'] ); // auto-close <b> tag to prevent messing up whole page ?></h2>

						<?php endif; ?>

					<?php endif; ?>

					<?php if ( $instance['description'] ) : // description provided ?>
						<div class="flex-description"><?php echo force_balance_tags( $instance['description'] ); // auto-close <b> tag to prevent messing up whole page ?></div>
					<?php endif; ?>

				</div>

			</div>

		<?php endif; ?>

		<?php if ( $instance['click_url'] || $video_url ) : // image is linked ?>
			</a>
		<?php endif; ?>

	</li>

<?php

endif;