<?php
/**
 * Attachment Header Meta (Full and Short)
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

?>

<header class="churchy-entry-header churchy-clearfix">

	<div class="churchy-entry-title-meta">

		<?php if ( ctfw_has_title() ) : ?>
			<h1 class="churchy-entry-title<?php if ( is_singular( get_post_type() ) ) : ?> churchy-main-title<?php endif; ?>">
				<?php churchy_post_title(); // will be linked on short ?>
			</h1>
		<?php endif; ?>

		<ul class="churchy-entry-meta">

			<li class="churchy-attachment-date">
				<i class="genericon genericon-month"></i>
				<time datetime="<?php esc_attr( the_time( 'c' ) ); ?>"><?php printf( __( 'Uploaded %s', 'churchy' ), '<span>' . ctfw_post_date( array( 'return' => true ) ) . '</span>' ); ?></time>
			</li>

			<?php if ( $post->post_parent ) : ?>
				<li class="churchy-entry-parent">
					<i class="genericon genericon-category"></i>
					<a href="<?php echo esc_url( get_permalink( $post->post_parent ) ); ?>" title="<?php echo esc_attr( get_the_title( $post->post_parent ) ); ?>"><?php echo get_the_title( $post->post_parent ); ?></a>
				</li>
			<?php endif; ?>

			<?php if ( churchy_show_comments() ) : ?>
				<li class="churchy-entry-comments-link">
					<i class="genericon genericon-comment"></i>
					<?php churchy_comments_link(); ?>
				</li>
			<?php endif; ?>

		</ul>

	</div>

</header>
