<?php
	$title = get_sub_field( 'title' );
	$video = get_sub_field( 'video' );
?>
<section class="video">
	<div class="container--large video__container">
		<?php
			if ( $title ) {
				echo sprintf(
					'<%1$s class="video__title">%2$s</%1$s>',
					$title['type'],
					$title['text']
				);
			}
		?>

		<?php if ( $video ) : ?>
			<a href="<?php echo $video[$video['type']]; ?>" class="video__link" data-fancybox="video-<?php echo $args['block_id']; ?>">
				<?php echo wp_get_attachment_image( $video['preview'], 'full', false ); ?>

				<button class="btn-play video__button" type="button" aria-label="Воспроизвести видео">
					<svg width="55" height="64"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-play"></use></svg>
				</button>
			</a>
		<?php endif; ?>
	</div>
</section>
