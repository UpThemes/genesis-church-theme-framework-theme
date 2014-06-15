<?php
/**
 * Person post content for:
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

	<?php get_template_part( 'content-person-header' ); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'uplifted-entry-full uplifted-person-full' ); ?>>

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

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'uplifted-entry-short uplifted-person-short' ); ?>>

		<?php get_template_part( 'content-person-header' ); ?>

		<!-- <?php get_template_part( 'content-footer-short' ); // show appropriate button(s) ?> -->

	</div> <!-- /uplifted-content-meta -->

	</article>

<?php endif; ?>