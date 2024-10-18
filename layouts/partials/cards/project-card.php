<?php
	$new = get_field( 'new' );
	$price = get_field( 'price' );
	$task = get_field( 'task' );
	$done = get_field( 'done' );
?>
<li class="project-card <?php echo $args['class']; ?>">
	<?php if ( $new ) : ?>
		<div class="project-card__new">Новый проект</div>
	<?php endif; ?>

	<div class="project-card__img">
		<?php
			if ( get_the_post_thumbnail_url() ) {
				the_post_thumbnail( 'full' );
			} else {
				echo wp_get_attachment_image( 31, 'full', false );
			}
		?>
	</div>

	<div class="project-card__title"><?php the_title(); ?></div>

	<div class="project-card__price"><?php echo number_format( $price, 0, '', ' ' ) . ' руб.'; ?></div>

	<div class="project-card__info">
		<?php if ( $task ) : ?>
			<div class="project-card__label">Задача</div>

			<div class="project-card__task"><?php echo $task; ?></div>
		<?php endif; ?>

		<?php if ( $done ) : ?>
			<div class="project-card__label">Было сделано</div>

			<div class="project-card__text"><?php echo $done; ?></div>
		<?php endif; ?>

		<div class="project-card__buttons">
			<button class="btn project-card__order" type="button" data-fancybox data-src="#callback">
				Заказать проект
				<svg width="12" height="12"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
			</button>

			<button class="btn btn--transparent project-card__question" type="button" data-fancybox data-src="#question">Задать вопрос</button>
		</div>
	</div>
</li>
