<?php
if ( ! empty( $args['title']['text'] ) ) {
	$format = '
		<div class="title %1$s">
			<div class="title__small-text">%2$s</div>

			<%3$s class="title__text">%4$s</%3$s>
	';

	if ( $args['title']['link']['url'] ) {
		$format .= '<a href="%5$s" class="btn-underline title__link" target="%6$s">%7$s</a>';
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
