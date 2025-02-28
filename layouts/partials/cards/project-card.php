<?php
	$new = get_field( 'new' );
	$price = get_field( 'price' );
	$task = get_field( 'task' );
	$content_type = get_field( 'content_type' );
	$done_text = get_field( 'done_text' );
	$done_characteristics = get_field( 'done_characteristics' );
	$gallery = get_field( 'gallery' );
?>
<li class="project-card <?php echo $args['class']; ?>" id="project-<?php the_ID(); ?>">
	<div class="project-card__mobile-title"><?php the_title(); ?></div>

	<div class="project-card__gallery">
		<div class="swiper project-card__gallery-slider">
			<ul class="reset-list swiper-wrapper">
				<?php if ( $gallery ) : ?>
					<?php foreach ( $gallery as $key => $image ) : ?>
						<li class="project-card__gallery-item swiper-slide" data-thumb="<?php echo $key; ?>">
							<a href="<?php echo $image['url']; ?>" class="project-card__gallery-link" data-fancybox="gallery-<?php the_ID(); ?>">
								<?php echo wp_get_attachment_image( $image['id'], 'large', false ); ?>
							</a>
						</li>
					<?php endforeach; ?>
				<?php else : ?>
					<li class="project-card__gallery-item swiper-slide">
						<a class="project-card__gallery-link">
							<?php echo wp_get_attachment_image( 31, 'large', false ); ?>
						</a>
					</li>
				<?php endif; ?>
			</ul>

			<div class="pagination project-card__gallery-pagination"></div>

			<div class="controls project-card__gallery-controls">
				<div class="controls__prev">
					<svg width="7" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-controls-arrow"></use></svg>
				</div>

				<div class="controls__next">
					<svg width="7" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-controls-arrow"></use></svg>
				</div>
			</div>

			<button class="btn btn--secondary project-card__gallery-button" type="button" data-fancybox data-src="#callback">
				Хочу так же
				<svg width="16" height="16"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow"></use></svg>
			</button>

			<?php if ( $new ) : ?>
				<div class="project-card__gallery-new">Новый проект</div>
			<?php endif; ?>
		</div>
	</div>

	<div class="project-card__content">
		<div class="project-card__title"><?php the_title(); ?></div>

		<?php if ( $price ) : ?>
			<div class="project-card__price"><?php echo number_format( $price, 0, ',', ' ' ); ?> руб.</div>
		<?php endif; ?>

		<div class="project-card__task">
			<div class="project-card__label">Задача</div>
			<?php echo $task;?>
		</div>

		<div class="project-card__done">
			<div class="project-card__label">Было сделано</div>

			<?php if ( $content_type === 'text' ) : ?>
				<div class="project-card__done-text"><?php echo $done_text; ?></div>
			<?php else : ?>
				<ul class="reset-list project-card__done-characteristics">
					<?php foreach ( $done_characteristics as $characteristic ) :?>
                        <li class="project-card__done-characteristic">
                            <div class="project-card__done-characteristic-label"><?php echo $characteristic['label'];?></div>
                            <div class="project-card__done-characteristic-value"><?php echo $characteristic['value'];?></div>
                        </li>
                    <?php endforeach;?>
				</ul>
			<?php endif; ?>
		</div>

		<?php if ( $gallery ) : ?>
			<ul class="reset-list project-card__small-gallery">
				<?php foreach ( $gallery as $key => $image ) : ?>
					<li class="project-card__small-gallery-item<?php echo $key === 0 ? ' active' : ''; ?>" data-slide="<?php echo $key; ?>">
						<?php echo wp_get_attachment_image( $image['id'], 'medium', false ); ?>
					</li>
				<?php endforeach;?>
			</ul>
		<?php endif; ?>
	</div>
</li>
