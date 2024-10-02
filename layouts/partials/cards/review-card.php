<?php
	$type = get_field( 'type' );
	$photo = get_field( 'photo' );
	$rating = get_field( 'rating' );
	$text = get_field( 'text' );
	$video = get_field( 'video' );

	$item_classes = 'review-card';
	$item_classes .= $type === 'video' ? ' review-card--video' : ' corner-border';
	$args['class'] ? $item_classes .= ' ' . $args['class'] : '';
?>
<li class="<?php echo $item_classes; ?>">
	<?php if ( $type === 'video' ) : ?>
		<div class="review-card__video-info">
			<div class="review-card__video-label">Видеоотзыв</div>

			<div class="review-card__video-button">
				<svg width="25" height="29"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-play"></use></svg>
			</div>
		</div>
	<?php else : ?>
		<div class="corner-border__helper"></div>
	<?php endif; ?>

	<div class="review-card__info">
		<div class="review-card__info-photo">
			<?php echo wp_get_attachment_image( $photo ? $photo : 262, 'thumbnail', false ); ?>
		</div>

		<div class="review-card__info-name"><?php the_title(); ?></div>

		<div class="review-card__info-date"><?php echo get_the_date( 'd/m/Y' ); ?></div>

		<div class="review-card__info-rating">
			<?php for ( $i = 0; $i < 5; $i++ ) : ?>
				<svg class="review-card__info-star<?php echo $i < $rating ? ' review-card__info-star--colored' : ''; ?>" width="15" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-star"></use></svg>
			<?php endfor; ?>
		</div>
	</div>

	<?php if ( $type === 'text' && $text ) : ?>
		<div class="review-card__text">
			<?php
				if ( mb_strlen( $text, 'utf-8' ) > 320 ) {
					echo mb_substr( $text, 0, 320 ) . '...';
				} else {
					echo $text;
				}
			?>
		</div>

		<?php if ( mb_strlen( $text, 'utf-8' ) > 320 ) : ?>
			<button class="btn-underline review-card__button" type="button" data-fancybox data-src="#review-<?php the_ID(); ?>">Читать далее</button>

			<div class="modal review-card__modal" id="review-<?php the_ID(); ?>"><?php echo $text; ?></div>
		<?php endif; ?>
	<?php else : ?>
		<a href="<?php echo $video[$video['type']]; ?>" class="review-card__video" data-fancybox="review-video-<?php the_ID(); ?>">
			<?php echo wp_get_attachment_image( $video['preview'] ? $video['preview'] : 31, 'large', false ); ?>
		</a>
	<?php endif; ?>
</li>
