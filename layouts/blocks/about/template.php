<section class="container--large about">
	<div class="container">
		<div class="about__info">
			<h2 class="about__title">О компании</h2>

			<?php if ( get_sub_field( 'text' ) ) : ?>
				<div class="about__text"><?php the_sub_field( 'text' ); ?></div>
			<?php endif; ?>
		</div>

		<div class="about__content">
			<svg class="about__logo" width="560" height="144"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-logo"></use></svg>

			<?php
				$employee = get_sub_field( 'employee' );
				if ( $employee ) :
					?>

					<div class="about__employee">
						<div class="about__employee-info">
							<?php echo $employee['name']; ?>
							<span><?php echo $employee['job_title']; ?></span>
						</div>

						<?php if ( $employee['photo'] ) : ?>
							<div class="about__employee-photo"><?php echo wp_get_attachment_image( $employee['photo'], 'large', false ); ?></div>
						<?php endif; ?>
					</div>

					<?php
				endif;
			?>

			<div class="about__extra">
				<?php if ( get_sub_field( 'extra' ) ) : ?>
					<div class="about__extra-text"><?php the_sub_field( 'extra' ); ?></div>
				<?php endif; ?>

				<?php
					$link = get_sub_field( 'link' );
					if ( $link ) :
						?>

						<a href="<?php echo $link['url']; ?>" class="btn btn--transparent about__extra-link" target="<?php echo $link['target']; ?>">
							<?php echo $link['title']; ?>
							<svg width="12" height="12"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
						</a>

						<?php
					endif;
				?>
			</div>
		</div>
	</div>
</section>
