<?php
/**
 * Template Name: Galleries
 *
 * This template outputs a list of pages that use the Gallery template and [gallery] shortcode.
 * It uses a combination of the .gallery class for columns and .churchy-caption-image for representing pages.
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

// Prepare gallery content to output
function churchy_galleries_after_content() {

	// Get gallery posts/pages
	$galley_posts = ctfw_gallery_posts( array(
		'orderby'	=> 'date',
		'order'		=> 'desc'
	) );

	?>

	<?php if ( ! empty( $galley_posts ) ) : ?>

		<div class="churchy-galleries-list gallery gallery-columns-<?php if ( churchy_sidebar_enabled() ) : ?>2<?php else : ?>3<?php endif; ?>">

			<?php foreach ( $galley_posts as $post_id => $post_data ) : ?>

				<?php
				// Use featured image or if none, first image in gallery
				$image_id = false;
				if ( has_post_thumbnail( $post_id ) ) { // use featured image
					$image_id = get_post_thumbnail_id( $post_id );
				} elseif ( ! empty( $post_data['image_ids'][0] ) ) { // use first image from first gallery in content
					$image_id = $post_data['image_ids'][0];
				}
				?>

				<div class="churchy-galleries-item gallery-item churchy-caption-image <?php if ( ! $image_id ) : ?> churchy-caption-image-no-image<?php endif; ?>">

					<a href="<?php echo esc_url( get_permalink( $post_data['post']->ID ) ); ?>" title="<?php echo esc_attr( get_the_title( $post_data['post']->ID ) ); ?>">

						<?php if ( $image_id ) : // valid image specified ?>
							<?php echo wp_get_attachment_image( $image_id, 'churchy-rect-large', false, array( 'class' => 'churchy-image') ); ?>
						<?php else : // use transparent placeholder thumbnail of proper proportion ?>
							<img class="gallery-icon" src="<?php echo apply_filters( 'churchy_thumb_placeholder_url', CTFW_THEME_URL . '/images/thumb-placeholder.png' ); ?>">
						<?php endif; ?>

						<div class="churchy-caption-image-caption">

							<div class="churchy-caption-image-title">
								<?php
								$title_max_chars = churchy_sidebar_enabled() ? 30 : 50; // a little less when there is sidebar (thmbnails become smaller on responsive)
								$title = ctfw_shorten( get_the_title( $post_data['post']->ID ), $title_max_chars );
								echo wptexturize( $title );
								?>
							</div>

							<?php if ( isset( $post_data['image_count'] ) ) : ?>
								<div class="churchy-caption-image-description">
									<?php printf( _n( '1 Photo', '%d Photos', $post_data['image_count'], 'churchy' ), $post_data['image_count'] ); ?>
								</div>
							<?php endif; ?>

						</div>

					</a>

				</div>

			<?php endforeach; ?>

		</div>

	<?php endif; ?>

	<?php

}

// Insert content after the_content() in content.php
add_action( 'churchy_after_content', 'churchy_galleries_after_content' );

// Load main template to show the page
locate_template( 'index.php', true );
