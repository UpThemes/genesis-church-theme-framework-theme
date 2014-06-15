<?php
/**
 * Attachment Header Meta (Full and Short)
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

?>

<header class="uplifted-entry-header uplifted-clearfix">

	<div class="uplifted-entry-title-meta">

		<?php if ( ctfw_has_title() ) : ?>
			<h1 class="uplifted-entry-title<?php if ( is_singular( get_post_type() ) ) : ?> uplifted-main-title<?php endif; ?>">
				<?php uplifted_post_title(); // will be linked on short ?>
			</h1>
		<?php endif; ?>

		<ul class="uplifted-entry-meta">

			<li class="uplifted-attachment-date">
				<i class="genericon genericon-month"></i>
				<time datetime="<?php esc_attr( the_time( 'c' ) ); ?>"><?php printf( __( 'Uploaded %s', 'uplifted' ), '<span>' . ctfw_post_date( array( 'return' => true ) ) . '</span>' ); ?></time>
			</li>

			<?php if ( $post->post_parent ) : ?>
				<li class="uplifted-entry-parent">
					<i class="genericon genericon-category"></i>
					<a href="<?php echo esc_url( get_permalink( $post->post_parent ) ); ?>" title="<?php echo esc_attr( get_the_title( $post->post_parent ) ); ?>"><?php echo get_the_title( $post->post_parent ); ?></a>
				</li>
			<?php endif; ?>

			<?php if ( uplifted_show_comments() ) : ?>
				<li class="uplifted-entry-comments-link">
					<i class="genericon genericon-comment"></i>
					<?php uplifted_comments_link(); ?>
				</li>
			<?php endif; ?>

		</ul>

	</div>

</header>
