<?php
if ( have_rows('blocks') ) {
	$counters = array();
	while ( have_rows('blocks') ) {
		the_row();
		$layout = get_row_layout();
		if ( ! isset( $counters[$layout] ) ) {
			// initialize counter
			$counters[$layout] = 1;
		} else {
			// increase existing counter
			$counters[$layout]++;
		}

		get_template_part('layouts/blocks/' . $layout . '/template', null, array(
			'block_id' => $counters[$layout]
		));
	}
}
