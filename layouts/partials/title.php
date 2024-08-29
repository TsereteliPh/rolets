<?php
if ( ! empty( $args['title']['text'] ) ) {
	$class = str_replace( '__title', '', $args['class'] );

	$format = '
		<div class="title %1$s">
			<div class="title__small-text">%2$s</div>

			<%3$s class="title__text">%4$s</%3$s>
	';

	if ( ! $args['controls'] && $args['title']['link']['url'] ) {
		$format .= '<a href="%5$s" class="btn-underline title__link" target="%6$s">%7$s</a>';
	}

	if ( $args['controls'] ) {
		$format .= '
			<div class="controls title__controls ' . $class . '__controls">
				<div class="controls__prev ' . $class . '__prev">
					<svg width="7" height="14"><use xlink:href="' . get_template_directory_uri() . '/assets/images/sprite.svg#icon-controls-arrow"></use></svg>
				</div>

				<div class="controls__next ' . $class . '__next">
					<svg width="7" height="14"><use xlink:href="' . get_template_directory_uri() . '/assets/images/sprite.svg#icon-controls-arrow"></use></svg>
				</div>
			</div>
		';
	}

	$format .= '</div>';
	echo sprintf(
		$format,
		$args['class'],
		$args['title']['small-text'],
		$args['title']['type'],
		$args['title']['text'],
		$args['title']['link']['url'],
		$args['title']['link']['target'],
		$args['title']['link']['title'],
	);
}
