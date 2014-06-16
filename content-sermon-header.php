<?php
/**
 * Post Header Meta (Full and Short)
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

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

			<ul class="churchy-entry-meta">

				<li class="churchy-entry-date">
					<i class="genericon genericon-month"></i>
					<time datetime="<?php esc_attr( the_time( 'c' ) ); ?>"><?php ctfw_post_date(); ?></time>
				</li>

				<?php if ( $speakers = get_the_term_list( $post->ID, 'ctc_sermon_speaker', '', __( ', ', 'churchy' ) ) ) : ?>
					<li class="churchy-entry-byline churchy-sermon-speaker">
						<i class="genericon genericon-user"></i>
						<?php echo $speakers; ?>
					</li>
				<?php endif; ?>

				<?php if ( $topics = get_the_term_list( $post->ID, 'ctc_sermon_topic', '', __( ', ', 'churchy' ) ) ) : ?>
					<li class="churchy-entry-category churchy-sermon-topic">
						<i class="genericon genericon-category"></i>
						<?php echo $topics; ?>
					</li>
				<?php endif; ?>

				<?php if ( $books = get_the_term_list( $post->ID, 'ctc_sermon_book', '', __( ', ', 'churchy' ) ) ) : ?>
					<li class="churchy-entry-category churchy-sermon-book">
						<i class="genericon genericon-book"></i>
						<?php echo $books; ?>
					</li>
				<?php endif; ?>

				<?php if ( churchy_show_comments() ) : ?>
					<li class="churchy-entry-comments-link">
						<i class="genericon genericon-comment"></i>
						<?php churchy_comments_link(); ?>
					</li>
				<?php endif; ?>

			</ul>

		</div> <!-- /churchy-entry-title-meta -->

	</header>
