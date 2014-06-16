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
	<div class="churchy-entry-image">
		<?php churchy_post_image(); ?>
	</div>
<?php endif; ?>

<div class="churchy-content-meta">

	<header class="churchy-entry-header clearfix">

		<div class="churchy-entry-title-meta">

			<?php if ( ctfw_has_title() ) : ?>
				<h1 class="churchy-entry-title<?php if ( is_singular( get_post_type() ) ) : ?> churchy-main-title<?php endif; ?>">
					<?php churchy_post_title(); // will be linked on short ?>
				</h1>
			<?php endif; ?>


			<ul class="churchy-entry-meta">

				<?php if ( $position ) : ?>
					<li class="churchy-person-position entry-meta-item">
						<i class="genericon genericon-user"></i>
						<?php echo esc_html( $position ); ?>
					</li>
				<?php endif; ?>

				<?php if ( $phone ) : ?>
					<li class="churchy-person-phone entry-meta-item">
						<i class="genericon genericon-phone"></i>
						<?php echo esc_html( $phone ); ?>
					</li>
				<?php endif; ?>


				<?php if ( $email || $urls ) : ?>

					<?php if ( $email ) : ?>
					<li class="churchy-person-email entry-meta-item">
						<i class="genericon genericon-mail"></i>
						<a href="mailto:<?php echo antispambot( $email, true ); ?>"><?php echo antispambot( $email ); ?></a>
					</li>
					<?php endif; ?>

				<?php endif; ?>

			</ul>

		</div> <!-- /churchy-entry-title-meta -->

	</header> <!-- /churchy-entry-header -->

<!-- </div>  /person-profile-card -->
