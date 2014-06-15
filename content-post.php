<?php
/**
 * Blog post content for:
 *
 * 1. Full / Single
 * 2. Short / Multiple
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/*************************************
 * 1. FULL / SINGLE
 *************************************/

if ( is_singular( get_post_type() ) ) :

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'uplifted-entry-full uplifted-blog-full' ); ?>>

		<?php get_template_part( 'content-post-header' ); ?>

		<div class="uplifted-entry-content uplifted-clearfix">

			<?php the_content(); ?>

			<?php do_action( 'uplifted_after_content' ); ?>

		</div>

		<?php get_template_part( 'content-footer-full' ); // multipage nav, term lists, "Edit" button, etc. ?>

  </div> <!-- /uplifted-content-meta -->
  
	</article>

<?php

/*************************************
 * 2. SHORT / MULTIPLE
 *************************************/

else :

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'uplifted-entry-short uplifted-blog-short' ); ?>>

		<?php get_template_part( 'content-post-header' ); ?>

		<?php if ( ctfw_has_excerpt() || ctfw_has_more_tag() ) : ?>
			<div class="uplifted-entry-content uplifted-clearfix">
				<?php uplifted_short_content(); // output excerpt or post content up until <!--more--> quicktag used ?>
			</div>
		<?php endif; ?>

		<?php get_template_part( 'content-footer-short' ); // show appropriate button(s) ?>

  </div> <!-- /uplifted-content-meta -->
  
	</article>

<?php endif; ?>