<?php
$title = $args['title'] ?? null;
$small_text = ! empty( $title['small-text'] ) ? $title['small-text'] : '';
$type = ! empty( $title['type'] ) ? $title['type'] : '';
$text = ! empty( $title['text'] ) ? $title['text'] : '';
$link_url = ! empty( $title['link']['url'] ) ? $title['link']['url'] : '';
$link_target = ! empty( $title['link']['target'] ) ? $title['link']['target'] : '_self';
$link_title = ! empty( $title['link']['title'] ) ? $title['link']['title'] : 'Подробнее';
$controls = ! empty( $args['controls'] ) ? $args['controls'] : false;

if ( $title ) :
	?>

	<div class="title <?php echo ! empty( $args['class'] ) ? $args['class'] : ''; ?>">
		<?php if ( $small_text ) : ?>
			<div class="title__small-text"><?php echo $small_text; ?></div>
		<?php endif; ?>

		<?php
			echo sprintf(
				'<%1$s class="title__text">%2$s</%1$s>',
				$type,
				$text,
			);
		?>

		<?php if ( ! $controls && $link_url ) : ?>
			<a href="<?php echo $link_url; ?>" class="btn-underline title__link" target="<?php echo $link_target; ?>"><?php echo $link_title; ?></a>
		<?php endif; ?>

		<?php if ( $controls ) : ?>
			<?php $class = str_replace( '__title', '', $args['class'] ); ?>

			<div class="controls title__controls <?php echo $class . '__controls'; ?>">
				<div class="controls__prev <?php echo $class . '__prev'; ?>">
					<svg width="7" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-controls-arrow"></use></svg>
				</div>

				<div class="controls__next <?php echo $class . '__next'; ?>">
					<svg width="7" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-controls-arrow"></use></svg>
				</div>
			</div>
		<?php endif; ?>
	</div>

	<?php
endif;
