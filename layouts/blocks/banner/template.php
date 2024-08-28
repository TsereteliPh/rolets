<?php $type = get_sub_field( 'type' ); ?>
<section class="container--large banner banner--<?php echo $type; ?>">
	<div class="container banner__container">
		<?php if ( get_sub_field( 'bg' ) ) : ?>
			<div class="banner__img">
				<?php echo wp_get_attachment_image( get_sub_field( 'bg' ), 'full', false ); ?>
			</div>
		<?php endif; ?>

		<div class="banner__box">
			<svg class="banner__logo" width="125" height="32"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-logo"></use></svg>

			<?php
				$title = get_sub_field( 'title' );
				if ( $title ) {
					echo sprintf(
						'<%1$s class="banner__title">%2$s</%1$s>',
						$title['type'],
						$title['text']
					);
				}
			?>

			<?php if ( $type !== 'small' && get_sub_field( 'text' ) ) : ?>
				<div class="banner__text"><?php the_sub_field( 'text' ); ?></div>
			<?php endif; ?>

			<?php
				$link = get_sub_field( 'link' );
				if ( $link ) :
					?>

					<a href="<?php echo $link['url']; ?>" class="btn banner__link" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>

					<?php
				endif;
			?>
		</div>

	</div>
</section>
