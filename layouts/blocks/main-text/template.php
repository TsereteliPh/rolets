<section class="main-text">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'main-text__title',
			'title' => get_sub_field( 'title' )
		) ); ?>

		<?php
			$indent = get_sub_field( 'indent' );
			$text = get_sub_field( 'text' );
			$img = get_sub_field( 'img' );
			$video = get_sub_field( 'video' );

			$classes = 'main-text__content';
			( $indent && ! $img ) ? $classes .= ' main-text__content--indent' : '';
			$img ? $classes .= ' main-text__content--grid' : '';
		?>

		<div class="<?php echo $classes; ?>">
			<?php if ( $text ) : ?>
				<div class="main-text__text"><?php echo $text; ?></div>
			<?php endif; ?>

			<?php if ( $video['link'] || $video['file'] ) : ?>
				<a href="<?php echo $video[$video['type']]; ?>" class="main-text__video" data-fancybox="main-text-<?php echo $args['block_id']; ?>">
					<?php echo wp_get_attachment_image( $video['preview'] ? $video['preview'] : 31, 'large', false ); ?>

					<button class="btn-play" type="button" aria-label="Воспроизвести видео">
						<svg width="55" height="64"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-play"></use></svg>
					</button>
				</a>
			<?php endif; ?>

			<?php if ( $img ) : ?>
				<div class="main-text__img">
					<?php echo wp_get_attachment_image( $img, 'full', false ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
