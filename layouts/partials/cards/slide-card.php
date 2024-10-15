<li class="slide-card <?php echo $args['class']; ?>">
	<div class="slide-card__img"><?php echo wp_get_attachment_image( $args['img'] ? $args['img'] : 31, 'large', false ); ?></div>

	<?php if ( $args['title'] ) : ?>
		<div class="slide-card__title"><?php echo $args['title']; ?></div>
	<?php endif; ?>

	<?php if ( $args['text'] ) : ?>
		<div class="slide-card__text"><?php echo $args['text']; ?></div>
	<?php endif; ?>
</li>
