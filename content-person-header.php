<?php
/**
 * Post Header Meta (Full and Short)
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

// Get data
// $position, $phone, $email, $urls
extract( ctfw_person_data() );

?>

<!-- <div class="person-profile-card"> -->

<?php if ( has_post_thumbnail() ) : ?>
	<div class="uplifted-entry-image">
		<?php uplifted_post_image(); ?>
	</div>
<?php endif; ?>

<div class="uplifted-content-meta">

	<header class="uplifted-entry-header clearfix">

		<div class="uplifted-entry-title-meta">

			<?php if ( ctfw_has_title() ) : ?>
				<h1 class="uplifted-entry-title<?php if ( is_singular( get_post_type() ) ) : ?> uplifted-main-title<?php endif; ?>">
					<?php uplifted_post_title(); // will be linked on short ?>
				</h1>
			<?php endif; ?>


			<ul class="uplifted-entry-meta">

				<?php if ( $position ) : ?>
					<li class="uplifted-person-position entry-meta-item">
						<i class="genericon genericon-user"></i>
						<?php echo esc_html( $position ); ?>
					</li>
				<?php endif; ?>

				<?php if ( $phone ) : ?>
					<li class="uplifted-person-phone entry-meta-item">
						<i class="genericon genericon-phone"></i>
						<?php echo esc_html( $phone ); ?>
					</li>
				<?php endif; ?>


				<?php if ( $email || $urls ) : ?>

					<?php if ( $email ) : ?>
					<li class="uplifted-person-email entry-meta-item">
						<i class="genericon genericon-mail"></i>
						<a href="mailto:<?php echo antispambot( $email, true ); ?>"><?php echo antispambot( $email ); ?></a>
					</li>
					<?php endif; ?>

				<?php endif; ?>

			</ul>

		</div> <!-- /uplifted-entry-title-meta -->

	</header> <!-- /uplifted-entry-header -->

<!-- </div>  /person-profile-card -->
